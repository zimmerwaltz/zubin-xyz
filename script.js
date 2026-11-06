/* ========================
   Global App Bootstrap
   ======================== */

let hasBoundGlobalHandlers = false;
let hasInitializedBarba = false;
let hasBoundCustomCursor = false;
let hasBoundTestimonialToggleBreakpoint = false;
let activePageLoadProgress = null;
let headerContrastFrame = 0;
const projectChapterNavigationControllers = new WeakMap();
const lazyImagePreloadObservers = new WeakMap();
const LAZY_IMAGE_PRELOAD_SELECTOR = '[data-barba="container"]';

const DARK_BACKGROUND_LUMINANCE_THRESHOLD = 0.179;
const IMAGE_SAMPLE_SIZE = 64;
const imageSampleCanvases = new WeakMap();
const warnedImageSampling = new WeakSet();

/* ========================
   Ripple Effect
   ======================== */

const RIPPLE_DURATION_MS = 600;
let rippleActiveUntil = 0;

function initializeRipple() {
    // Single delegated listener on document — works across Barba page transitions.
    document.addEventListener('click', (e) => {
        const target = e.target.closest('button, [role="button"], .btn');
        if (!target) {
            return;
        }

        const rect = target.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height) * 2;
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const wave = document.createElement('span');
        wave.classList.add('btn-ripple-wave');

        // CSS custom properties carry the dynamic positional data.
        // Background-color inherits from the button's currentColor.
        wave.style.setProperty('--ripple-size', `${size}px`);
        wave.style.setProperty('--ripple-x', `${x}px`);
        wave.style.setProperty('--ripple-y', `${y}px`);
        wave.style.setProperty('--ripple-duration', `${RIPPLE_DURATION_MS}ms`);

        target.appendChild(wave);
        rippleActiveUntil = Date.now() + RIPPLE_DURATION_MS;

        wave.addEventListener('animationend', () => wave.remove(), { once: true });
    });
}

function updateActiveNavOnScroll() {
    if (!document.body.classList.contains('page-home') || document.body.classList.contains('page-project-case-study')) {
        return;
    }

    const sections = document.querySelectorAll('section[id]');
    const navItems = document.querySelectorAll('.nav-item');

    let current = '';
    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        if (window.scrollY >= sectionTop - 200) {
            current = section.getAttribute('id');
        }
    });

    navItems.forEach((item) => {
        item.classList.remove('active');
        const itemHash = new URL(item.href, window.location.href).hash;
        if (itemHash === `#${current}`) {
            item.classList.add('active');
        }
    });
}

function parseCssColor(color) {
    const rgbMatch = color.match(/^rgba?\((.+)\)$/i);
    if (rgbMatch) {
        const components = rgbMatch[1].match(/[-+]?(?:\d*\.)?\d+%?/g);
        if (!components || components.length < 3) {
            return null;
        }

        const parseChannel = (value) => {
            const parsed = Number.parseFloat(value);
            return value.endsWith('%') ? parsed * 2.55 : parsed;
        };
        const alphaComponent = components[3];

        return {
            red: parseChannel(components[0]),
            green: parseChannel(components[1]),
            blue: parseChannel(components[2]),
            alpha: alphaComponent
                ? Math.min(1, Math.max(0, Number.parseFloat(alphaComponent) / (alphaComponent.endsWith('%') ? 100 : 1)))
                : 1
        };
    }

    const hexMatch = color.match(/^#([\da-f]{3,8})$/i);
    if (!hexMatch) {
        return null;
    }

    let hex = hexMatch[1];
    if (hex.length === 3 || hex.length === 4) {
        hex = [...hex].map((digit) => `${digit}${digit}`).join('');
    }
    if (hex.length !== 6 && hex.length !== 8) {
        return null;
    }

    return {
        red: Number.parseInt(hex.slice(0, 2), 16),
        green: Number.parseInt(hex.slice(2, 4), 16),
        blue: Number.parseInt(hex.slice(4, 6), 16),
        alpha: hex.length === 8 ? Number.parseInt(hex.slice(6, 8), 16) / 255 : 1
    };
}

function getGradientAverageColor(backgroundImage) {
    const colors = (backgroundImage.match(/rgba?\([^)]*\)|#[\da-f]{3,8}\b/gi) || [])
        .map(parseCssColor)
        .filter(Boolean);

    if (colors.length === 0) {
        return null;
    }

    return colors.reduce((average, color) => ({
        red: average.red + color.red / colors.length,
        green: average.green + color.green / colors.length,
        blue: average.blue + color.blue / colors.length,
        alpha: average.alpha + color.alpha / colors.length
    }), { red: 0, green: 0, blue: 0, alpha: 0 });
}

function compositeColors(foreground, background) {
    return {
        red: foreground.red * foreground.alpha + background.red * (1 - foreground.alpha),
        green: foreground.green * foreground.alpha + background.green * (1 - foreground.alpha),
        blue: foreground.blue * foreground.alpha + background.blue * (1 - foreground.alpha),
        alpha: 1
    };
}

function getImageObjectPositionOffset(position, freeSpace, axis) {
    const components = position.trim().split(/\s+/);
    const component = components[axis] || '50%';

    if (component === 'left' || component === 'top') {
        return 0;
    }
    if (component === 'right' || component === 'bottom') {
        return freeSpace;
    }
    if (component === 'center') {
        return freeSpace / 2;
    }
    if (component.endsWith('%')) {
        return freeSpace * Number.parseFloat(component) / 100;
    }
    if (component.endsWith('px')) {
        return Number.parseFloat(component);
    }

    return freeSpace / 2;
}

function getImagePixelAtPoint(image, x, y) {
    if (!image.complete || image.naturalWidth === 0 || image.naturalHeight === 0) {
        return null;
    }

    const sourceUrl = new URL(image.currentSrc || image.src, document.baseURI);
    if (!['data:', 'blob:'].includes(sourceUrl.protocol) && sourceUrl.origin !== window.location.origin) {
        if (!warnedImageSampling.has(image)) {
            console.warn('Skipping header contrast sampling for a cross-origin image:', sourceUrl.href);
            warnedImageSampling.add(image);
        }
        return null;
    }

    const bounds = image.getBoundingClientRect();
    const localX = x - bounds.left;
    const localY = y - bounds.top;
    if (localX < 0 || localY < 0 || localX > bounds.width || localY > bounds.height) {
        return null;
    }

    const style = window.getComputedStyle(image);
    const naturalWidth = image.naturalWidth;
    const naturalHeight = image.naturalHeight;
    let renderedWidth = bounds.width;
    let renderedHeight = bounds.height;

    if (style.objectFit === 'contain' || style.objectFit === 'cover' || style.objectFit === 'scale-down' || style.objectFit === 'none') {
        let scale = style.objectFit === 'none'
            ? 1
            : style.objectFit === 'cover'
                ? Math.max(bounds.width / naturalWidth, bounds.height / naturalHeight)
                : Math.min(bounds.width / naturalWidth, bounds.height / naturalHeight);

        if (style.objectFit === 'scale-down') {
            scale = Math.min(1, scale);
        }
        renderedWidth = naturalWidth * scale;
        renderedHeight = naturalHeight * scale;
    }

    const offsetX = getImageObjectPositionOffset(style.objectPosition, bounds.width - renderedWidth, 0);
    const offsetY = getImageObjectPositionOffset(style.objectPosition, bounds.height - renderedHeight, 1);
    const sourceX = (localX - offsetX) * naturalWidth / renderedWidth;
    const sourceY = (localY - offsetY) * naturalHeight / renderedHeight;
    if (sourceX < 0 || sourceY < 0 || sourceX >= naturalWidth || sourceY >= naturalHeight) {
        return null;
    }

    const source = image.currentSrc || image.src;
    let cachedCanvas = imageSampleCanvases.get(image);
    if (!cachedCanvas || cachedCanvas.source !== source) {
        const canvas = document.createElement('canvas');
        canvas.width = IMAGE_SAMPLE_SIZE;
        canvas.height = IMAGE_SAMPLE_SIZE;
        const context = canvas.getContext('2d', { willReadFrequently: true });
        if (!context) {
            return null;
        }
        context.drawImage(image, 0, 0, IMAGE_SAMPLE_SIZE, IMAGE_SAMPLE_SIZE);
        cachedCanvas = { canvas, context, source };
        imageSampleCanvases.set(image, cachedCanvas);
    }

    const pixelX = Math.min(IMAGE_SAMPLE_SIZE - 1, Math.floor(sourceX / naturalWidth * IMAGE_SAMPLE_SIZE));
    const pixelY = Math.min(IMAGE_SAMPLE_SIZE - 1, Math.floor(sourceY / naturalHeight * IMAGE_SAMPLE_SIZE));
    let pixel;
    try {
        pixel = cachedCanvas.context.getImageData(pixelX, pixelY, 1, 1).data;
    } catch (error) {
        if (error.name !== 'SecurityError') {
            throw error;
        }
        console.warn('Unable to sample image pixels for header contrast:', sourceUrl.href);
        imageSampleCanvases.delete(image);
        return null;
    }

    return {
        red: pixel[0],
        green: pixel[1],
        blue: pixel[2],
        alpha: pixel[3] / 255 * Number.parseFloat(style.opacity)
    };
}

function getColorLuminance(color) {
    const linearize = (channel) => {
        const normalized = channel / 255;
        return normalized <= 0.04045
            ? normalized / 12.92
            : ((normalized + 0.055) / 1.055) ** 2.4;
    };

    return (
        0.2126 * linearize(color.red)
        + 0.7152 * linearize(color.green)
        + 0.0722 * linearize(color.blue)
    );
}

function getBackgroundLuminance(elements, x, y, header) {
    const backgroundLayers = [];

    for (const element of elements) {
        if (element === header || header.contains(element)) {
            continue;
        }

        const style = window.getComputedStyle(element);
        if (element instanceof HTMLImageElement) {
            const imageColor = getImagePixelAtPoint(element, x, y);
            if (imageColor) {
                imageColor.alpha = Math.min(1, Math.max(0, imageColor.alpha));
                backgroundLayers.push(imageColor);
            }
        }

        const gradientColor = getGradientAverageColor(style.backgroundImage);
        const backgroundColor = parseCssColor(style.backgroundColor);
        const opacity = Math.min(1, Math.max(0, Number.parseFloat(style.opacity)));

        if (gradientColor) {
            gradientColor.alpha *= opacity;
            backgroundLayers.push(gradientColor);
        }
        if (backgroundColor && backgroundColor.alpha > 0) {
            backgroundColor.alpha *= opacity;
            backgroundLayers.push(backgroundColor);
        }
        if (backgroundLayers.some((layer) => layer.alpha >= 1)) {
            break;
        }
    }

    let background = { red: 255, green: 255, blue: 255, alpha: 1 };
    for (let index = backgroundLayers.length - 1; index >= 0; index -= 1) {
        background = compositeColors(backgroundLayers[index], background);
    }

    return getColorLuminance(background);
}

function updateHeaderContrast() {
    const header = document.querySelector('.header');
    const navMenu = header?.querySelector('.nav-menu');
    if (!header || !navMenu) {
        return;
    }

    const headerBounds = header.getBoundingClientRect();
    const menuBounds = navMenu.getBoundingClientRect();
    const sampleY = Math.min(
        window.innerHeight - 1,
        Math.max(0, headerBounds.top + headerBounds.height / 2)
    );
    const sampleXPositions = [0.2, 0.5, 0.8].map(
        (ratio) => menuBounds.left + menuBounds.width * ratio
    );
    const luminances = sampleXPositions.map((x) => getBackgroundLuminance(
        document.elementsFromPoint(x, sampleY),
        x,
        sampleY,
        header
    ));

    const averageLuminance = luminances.length
        ? luminances.reduce((total, luminance) => total + luminance, 0) / luminances.length
        : 1;
    header.classList.toggle(
        'is-over-dark-background',
        averageLuminance < DARK_BACKGROUND_LUMINANCE_THRESHOLD
    );
}

function scheduleHeaderContrastUpdate() {
    if (headerContrastFrame) {
        return;
    }

    headerContrastFrame = window.requestAnimationFrame(() => {
        headerContrastFrame = 0;
        updateHeaderContrast();
    });
}

function updateActiveNavItem(element) {
    document.querySelectorAll('.nav-item').forEach((item) => {
        item.classList.remove('active');
    });
    element.classList.add('active');
}

function initializeAnchorNavigation(root = document) {
    root.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        if (anchor.closest('[data-project-chapter-navigation]')) {
            return;
        }

        if (anchor.dataset.scrollBound === 'true') {
            return;
        }

        anchor.addEventListener('click', (e) => {
            const href = anchor.getAttribute('href');
            if (!href || href.length <= 1) {
                return;
            }

            const target = document.querySelector(href);
            if (!target) {
                return;
            }

            e.preventDefault();
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            updateActiveNavItem(anchor);
        });

        anchor.dataset.scrollBound = 'true';
    });
}

function initializeScrollToTop() {
    const scrollTopBtn = document.querySelector('.scroll-to-top');
    if (!scrollTopBtn || scrollTopBtn.dataset.bound === 'true') {
        return;
    }

    const updateVisibility = () => {
        if (window.scrollY > 300) {
            scrollTopBtn.style.opacity = '1';
            scrollTopBtn.style.pointerEvents = 'auto';
        } else {
            scrollTopBtn.style.opacity = '0';
            scrollTopBtn.style.pointerEvents = 'none';
        }
    };

    window.addEventListener('scroll', updateVisibility);
    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    scrollTopBtn.style.opacity = '0';
    scrollTopBtn.style.pointerEvents = 'none';
    scrollTopBtn.style.transition = 'opacity 0.3s ease';
    scrollTopBtn.dataset.bound = 'true';
}

function initializeProjectChapterNavigation(root = document) {
    const navigation = root.querySelector('[data-project-chapter-navigation]');
    if (!navigation) {
        return;
    }

    projectChapterNavigationControllers.get(navigation)?.abort();

    const chapterToggle = navigation.querySelector('.project-chapter-navigation__current');
    const chapterMenu = navigation.querySelector('.project-chapter-navigation__menu');
    const chapterLabel = navigation.querySelector('.project-chapter-navigation__current-label');
    const progressBar = navigation.querySelector('.project-chapter-navigation__progress');
    const progressFill = navigation.querySelector('.project-chapter-navigation__progress-fill');
    const topButton = navigation.querySelector('.project-chapter-navigation__top');
    const chapterLinks = [...navigation.querySelectorAll('[data-project-chapter-link]')];
    const chapters = chapterLinks
        .map((link) => ({
            link,
            section: document.getElementById(link.hash.slice(1)),
            indicator: link.querySelector('[data-project-chapter-indicator]')
        }))
        .filter((chapter) => chapter.section);

    if (!chapterToggle || !chapterMenu || !chapterLabel || !progressBar || !progressFill || !topButton || chapters.length === 0) {
        console.error('Project chapter navigation is missing required controls or chapter targets.');
        return;
    }

    if (chapters.length !== chapterLinks.length) {
        console.error('Project chapter navigation contains links without matching sections.');
        return;
    }

    if (chapters.some(({ indicator }) => !indicator?.dataset.completeSrc || !indicator.dataset.upcomingSrc)) {
        console.error('Project chapter navigation is missing a chapter status icon.');
        return;
    }

    const controller = new AbortController();
    const { signal } = controller;
    projectChapterNavigationControllers.set(navigation, controller);
    const progressEnd = root.querySelector('[data-project-chapter-end]') || chapters[chapters.length - 1].section;
    let updateFrame = 0;

    const closeMenu = (restoreFocus = false) => {
        chapterMenu.hidden = true;
        chapterToggle.setAttribute('aria-expanded', 'false');
        chapterToggle.setAttribute('aria-label', 'Open project chapters');
        topButton.setAttribute('aria-label', 'Back to top');
        scheduleUpdate();
        if (restoreFocus) {
            chapterToggle.focus({ preventScroll: true });
        }
    };

    let labelText = null;
    let labelIndex = -1;
    let labelAnimation = null;

    // Old label slides out and fades; the new one slides in from the opposite side (direction follows scroll)
    const setChapterLabel = (text, index) => {
        if (text === labelText) {
            return;
        }

        const direction = index >= labelIndex ? 1 : -1;
        const isInitial = labelText === null;
        labelText = text;
        labelIndex = index;
        labelAnimation?.cancel();

        if (isInitial || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            chapterLabel.textContent = text;
            return;
        }

        const slideOut = chapterLabel.animate(
            [
                { transform: 'translateY(0)', opacity: 1 },
                { transform: `translateY(${-direction * 100}%)`, opacity: 0 }
            ],
            { duration: 150, easing: 'ease-in' }
        );
        labelAnimation = slideOut;
        slideOut.onfinish = () => {
            chapterLabel.textContent = labelText;
            labelAnimation = chapterLabel.animate(
                [
                    { transform: `translateY(${direction * 100}%)`, opacity: 0 },
                    { transform: 'translateY(0)', opacity: 1 }
                ],
                { duration: 200, easing: 'ease-out' }
            );
        };
    };

    const updateNavigation = () => {
        const activeLine = window.scrollY + Math.min(window.innerHeight * 0.35, 200);
        let activeChapter = chapters[0];

        chapters.forEach((chapter) => {
            const chapterTop = chapter.section.getBoundingClientRect().top + window.scrollY;
            if (chapterTop <= activeLine) {
                activeChapter = chapter;
            }
        });

        const activeChapterIndex = chapters.indexOf(activeChapter);
        setChapterLabel(activeChapter.link.textContent.trim(), activeChapterIndex);
        const showTopButton = activeChapterIndex > 0 || chapterToggle.getAttribute('aria-expanded') === 'true';
        topButton.classList.toggle('is-hidden', !showTopButton);
        const projectStart = chapters[0].section.getBoundingClientRect().top + window.scrollY;
        const projectEnd = progressEnd.getBoundingClientRect().bottom + window.scrollY;
        const isProjectComplete = window.scrollY + window.innerHeight >= projectEnd;
        const navigationTop = window.innerHeight - navigation.offsetHeight;
        const isPastProject = window.scrollY + navigationTop >= projectEnd;
        if (isPastProject !== navigation.classList.contains('is-hidden')) {
            navigation.classList.toggle('is-hidden', isPastProject);
            if (isPastProject && chapterToggle.getAttribute('aria-expanded') === 'true') {
                closeMenu(false);
            }
        }

        chapters.forEach(({ link, indicator }, index) => {
            if (link === activeChapter.link) {
                link.setAttribute('aria-current', 'location');
            } else {
                link.removeAttribute('aria-current');
            }

            const isComplete = index < activeChapterIndex || (isProjectComplete && index === chapters.length - 1);
            const iconSource = isComplete ? indicator.dataset.completeSrc : indicator.dataset.upcomingSrc;
            if (indicator.getAttribute('src') !== iconSource) {
                indicator.setAttribute('src', iconSource);
            }
        });

        const scrollableDistance = Math.max(projectEnd - projectStart - window.innerHeight, 1);
        const progress = Math.min(1, Math.max(0, (window.scrollY - projectStart) / scrollableDistance));
        const percentage = Math.round(progress * 100);

        progressFill.style.transform = `scaleX(${progress})`;
        progressBar.setAttribute('aria-valuenow', String(percentage));
        progressBar.setAttribute('aria-valuetext', `${percentage}% of case study`);
    };

    const scheduleUpdate = () => {
        if (updateFrame) {
            return;
        }
        updateFrame = window.requestAnimationFrame(() => {
            updateFrame = 0;
            updateNavigation();
        });
    };

    const handlePageScroll = () => {
        if (chapterToggle.getAttribute('aria-expanded') === 'true') {
            closeMenu(chapterMenu.contains(document.activeElement));
        }
        scheduleUpdate();
    };

    signal.addEventListener('abort', () => {
        if (updateFrame) {
            window.cancelAnimationFrame(updateFrame);
        }
        labelAnimation?.cancel();
    }, { once: true });

    chapterToggle.addEventListener('click', () => {
        const isExpanded = chapterToggle.getAttribute('aria-expanded') === 'true';
        chapterMenu.hidden = isExpanded;
        if (!isExpanded) {
            const activeChapterLink = chapterMenu.querySelector('[aria-current="location"]');
            if (activeChapterLink) {
                const activeLinkBounds = activeChapterLink.getBoundingClientRect();
                const menuBounds = chapterMenu.getBoundingClientRect();
                const scrollTop =
                    chapterMenu.scrollTop +
                    activeLinkBounds.top +
                    activeLinkBounds.height / 2 -
                    menuBounds.top -
                    chapterMenu.clientHeight / 2;
                const behavior = window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth';
                chapterMenu.scrollTo({ top: scrollTop, behavior });
            }
        }
        chapterToggle.setAttribute('aria-expanded', String(!isExpanded));
        chapterToggle.setAttribute('aria-label', isExpanded ? 'Open project chapters' : 'Close project chapters');
        topButton.setAttribute('aria-label', isExpanded ? 'Back to top' : 'Close chapter navigation');
        scheduleUpdate();
    }, { signal });

    navigation.addEventListener('click', (event) => {
        const chapterLink = event.target.closest('[data-project-chapter-link]');
        if (!chapterLink) {
            return;
        }
        closeMenu(true);
    }, { signal });

    document.addEventListener('click', (event) => {
        if (!navigation.contains(event.target) && chapterToggle.getAttribute('aria-expanded') === 'true') {
            closeMenu();
        }
    }, { signal });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && chapterToggle.getAttribute('aria-expanded') === 'true') {
            closeMenu(true);
        }
    }, { signal });

    topButton.addEventListener('click', () => {
        if (chapterToggle.getAttribute('aria-expanded') === 'true') {
            closeMenu(true);
            return;
        }

        const behavior = window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth';
        window.history.replaceState(
            window.history.state,
            '',
            `${window.location.pathname}${window.location.search}#hero`
        );
        window.scrollTo({ top: 0, behavior });
    }, { signal });

    window.addEventListener('scroll', handlePageScroll, { passive: true, signal });
    window.addEventListener('resize', scheduleUpdate, { passive: true, signal });
    updateNavigation();
}

function destroyProjectChapterNavigation(root = document) {
    const navigation = root.querySelector('[data-project-chapter-navigation]');
    if (!navigation) {
        return;
    }

    const controller = projectChapterNavigationControllers.get(navigation);
    if (controller) {
        controller.abort();
        projectChapterNavigationControllers.delete(navigation);
    }
}

function initializeTestimonialToggle(root = document) {
    const toggles = root.querySelectorAll('.project-case-testimonial-mark, .testimonial-card-mark');
    if (toggles.length === 0) {
        return;
    }

    const breakpoint = window.matchMedia('(max-width: 768px)');
    const syncAvailability = () => {
        document.querySelectorAll('.project-case-testimonial-mark, .testimonial-card-mark').forEach((toggle) => {
            const grid = toggle.closest('.project-case-testimonials-grid, .home-testimonials-grid');
            if (!grid) {
                return;
            }

            toggle.disabled = !breakpoint.matches;
            if (!breakpoint.matches) {
                grid.classList.remove('is-expanded');
                toggle.setAttribute('aria-expanded', 'false');
                toggle.setAttribute('aria-label', 'Show more testimonials');
            }
        });
    };

    syncAvailability();
    if (!hasBoundTestimonialToggleBreakpoint) {
        breakpoint.addEventListener('change', syncAvailability);
        hasBoundTestimonialToggleBreakpoint = true;
    }

    toggles.forEach((toggle) => {
        if (toggle.dataset.bound === 'true') {
            return;
        }

        toggle.addEventListener('click', () => {
            const grid = toggle.closest('.project-case-testimonials-grid, .home-testimonials-grid');
            if (!breakpoint.matches || !grid) {
                return;
            }

            const isExpanded = grid.classList.toggle('is-expanded');
            toggle.setAttribute('aria-expanded', String(isExpanded));
            toggle.setAttribute('aria-label', `${isExpanded ? 'Hide' : 'Show'} more testimonials`);
        });
        toggle.dataset.bound = 'true';
    });
}

function initializeIntersectionObserver(root = document) {
    const options = { threshold: 0.1, rootMargin: '0px 0px -100px 0px' };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, options);

    root.querySelectorAll('.metric-item, .testimonial-card, .skill-item').forEach((element) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(element);
    });
}

function initializeButtonEffects(root = document) {
    root.querySelectorAll('.btn').forEach((button) => {
        button.style.transform = '';
    });
}

function initializeSectionIntroTransitions(root = document) {
    const sections = [
        ...(root.matches?.('.home-section, .product-design-section') ? [root] : []),
        ...root.querySelectorAll('.home-section, .product-design-section')
    ];
    if (sections.length === 0) {
        return;
    }

    const firstSection = sections[0];
    if (firstSection) {
        firstSection.classList.add('is-visible');
    }

    if (!('IntersectionObserver' in window)) {
        sections.forEach((section) => section.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0,
        rootMargin: '0px 0px -10% 0px'
    });

    sections.forEach((section, index) => {
        if (index === 0) {
            return;
        }

        section.classList.remove('is-visible');
        observer.observe(section);
    });
}

function initializeCustomCursor() {
    if (hasBoundCustomCursor) {
        return;
    }

    if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        return;
    }

    const cursor = document.querySelector('.custom-cursor');
    if (!cursor) {
        return;
    }

    hasBoundCustomCursor = true;

    const hoverSelector = 'a, button, .btn, [role="button"], .nav-item, .home-brand-card, .home-project-card, .product-design-project-card, .testimonial-card';
    let activeHoverTarget = null;

    const clearActiveHoverTarget = () => {
        if (!activeHoverTarget) {
            return;
        }

        activeHoverTarget.classList.remove('cursor-emoji-target');
        activeHoverTarget = null;
    };

    document.addEventListener('mousemove', (event) => {
        const target = event.target instanceof Element ? event.target : null;
        const hoverTarget = target ? target.closest(hoverSelector) : null;

        cursor.style.transform = `translate3d(${event.clientX + 12}px, ${event.clientY + 10}px, 0)`;

        if (hoverTarget) {
            if (activeHoverTarget !== hoverTarget) {
                clearActiveHoverTarget();
                activeHoverTarget = hoverTarget;
                activeHoverTarget.classList.add('cursor-emoji-target');
            }
            cursor.classList.add('is-hovering');
        } else {
            clearActiveHoverTarget();
            cursor.classList.remove('is-hovering');
        }
    });

    document.addEventListener('mouseleave', () => {
        clearActiveHoverTarget();
        cursor.classList.remove('is-hovering');
    });
}

function animateSkillBars(root = document) {
    const skillBars = root.querySelectorAll('.home-skill-bar');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const bar = entry.target;
                const fill = bar.querySelector('.skill-fill');
                const terminal = bar.querySelector('.skill-terminal');
                const level = Number.parseFloat(bar.dataset.skillLevel || '0');

                if (!fill || !terminal) {
                    observer.unobserve(bar);
                    return;
                }

                fill.style.width = '0';
                terminal.style.left = '0';

                setTimeout(() => {
                    fill.style.width = `${level}%`;
                    terminal.style.left = `${level}%`;
                }, 100);
                observer.unobserve(bar);
            }
        });
    }, { threshold: 0.5 });

    skillBars.forEach((bar) => observer.observe(bar));
}

function animateCounters(root = document) {
    const numbers = root.querySelectorAll('.metric-number');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting || entry.target.classList.contains('counted')) {
                return;
            }

            entry.target.classList.add('counted');
            const target = entry.target;
            const text = target.textContent.trim();
            const match = text.match(/\d+/);

            if (!match) {
                observer.unobserve(target);
                return;
            }

            const finalNumber = parseInt(match[0], 10);
            const duration = 1500;
            const increment = finalNumber / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += increment;
                if (current >= finalNumber) {
                    target.textContent = text;
                    clearInterval(timer);
                } else {
                    const suffix = text.includes('+') ? '+' : text.includes('%') ? '%' : '';
                    target.textContent = `${Math.floor(current)}${suffix}`;
                }
            }, 16);

            observer.unobserve(target);
        });
    }, { threshold: 0.5 });

    numbers.forEach((number) => observer.observe(number));
}

function initializeParallax(root = document) {
    const parallaxElements = root.querySelectorAll('[data-parallax]');
    if (parallaxElements.length === 0) {
        return;
    }

    const onScroll = () => {
        parallaxElements.forEach((element) => {
            const scrollY = window.scrollY;
            const elementTop = element.offsetTop;
            const distance = scrollY - elementTop;
            if (distance > -window.innerHeight && distance < elementTop) {
                element.style.transform = `translateY(${distance * 0.5}px)`;
            }
        });
    };

    window.addEventListener('scroll', onScroll);
}

function initializeMyWorkDotGrid(root = document) {
    const section = root.querySelector('.home-my-work, .product-design-work');
    if (!section || section.dataset.dotGridBound === 'true') {
        return;
    }

    const supportsFinePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    if (!supportsFinePointer) {
        section.dataset.dotGridBound = 'true';
        return;
    }

    let targetX = 0;
    let targetY = 0;
    let currentX = 0;
    let currentY = 0;
    let rafId = null;

    const animate = () => {
        currentX += (targetX - currentX) * 0.14;
        currentY += (targetY - currentY) * 0.14;

        section.style.setProperty('--dot-offset-x', `${currentX.toFixed(2)}px`);
        section.style.setProperty('--dot-offset-y', `${currentY.toFixed(2)}px`);

        const stillMoving = Math.abs(targetX - currentX) > 0.05 || Math.abs(targetY - currentY) > 0.05;
        if (stillMoving) {
            rafId = requestAnimationFrame(animate);
        } else {
            rafId = null;
        }
    };

    const updateOffsets = (clientX, clientY) => {
        const rect = section.getBoundingClientRect();
        if (rect.width === 0 || rect.height === 0) {
            return;
        }

        const normalizedX = ((clientX - rect.left) / rect.width) - 0.5;
        const normalizedY = ((clientY - rect.top) / rect.height) - 0.5;

        targetX = normalizedX * 52;
        targetY = normalizedY * 46;

        if (rafId === null) {
            rafId = requestAnimationFrame(animate);
        }
    };

    section.addEventListener('mousemove', (event) => {
        updateOffsets(event.clientX, event.clientY);
    });

    section.addEventListener('mouseleave', () => {
        targetX = 0;
        targetY = 0;
        if (rafId === null) {
            rafId = requestAnimationFrame(animate);
        }
    });

    section.dataset.dotGridBound = 'true';
}

function initializeMyWorkStackScrollMotion(root = document) {
    const section = root.querySelector('.home-my-work');
    if (!section || section.dataset.stackMotionBound === 'true') {
        return;
    }

    const layers = Array.from(section.querySelectorAll('.home-my-work-layer'));
    if (layers.length === 0) {
        section.dataset.stackMotionBound = 'true';
        return;
    }

    const multipliers = [0.38, 0.62, 0.86, 1.12, 1.36, 1.6];
    const desktopMotion = window.matchMedia('(min-width: 1201px)');
    let ticking = false;

    const update = () => {
        if (!desktopMotion.matches) {
            layers.forEach((layer) => layer.style.setProperty('--layer-offset-y', '0px'));
            ticking = false;
            return;
        }

        const rect = section.getBoundingClientRect();
        const viewportHeight = window.innerHeight || document.documentElement.clientHeight;

        const progress = (viewportHeight - rect.top) / (viewportHeight + rect.height);
        const centered = Math.max(-0.5, Math.min(0.5, progress - 0.5));

        layers.forEach((layer, index) => {
            const multiplier = multipliers[index] ?? multipliers[multipliers.length - 1];
            const offset = centered * 300 * multiplier;
            layer.style.setProperty('--layer-offset-y', `${offset.toFixed(2)}px`);
        });

        ticking = false;
    };

    const onScrollOrResize = () => {
        if (ticking) {
            return;
        }
        ticking = true;
        requestAnimationFrame(update);
    };

    window.addEventListener('scroll', onScrollOrResize, { passive: true });
    window.addEventListener('resize', onScrollOrResize, { passive: true });
    update();

    section.dataset.stackMotionBound = 'true';
}

function initializeMyWorkStackHoverDepth(root = document) {
    const section = root.querySelector('.home-my-work');
    const visual = section?.querySelector('.home-my-work-visual');
    if (!visual || visual.dataset.hoverDepthBound === 'true') {
        return;
    }
    visual.dataset.hoverDepthBound = 'true';

    const canHover = window.matchMedia('(min-width: 641px) and (hover: hover) and (pointer: fine)');
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    const layers = Array.from(visual.querySelectorAll('.home-my-work-layer'));
    if (layers.length === 0) {
        return;
    }

    const maxDepth = 70;
    const falloff = 320;
    const current = layers.map(() => 0);
    const target = layers.map(() => 0);
    let frame = 0;

    const tick = () => {
        let settled = true;
        layers.forEach((layer, index) => {
            current[index] += (target[index] - current[index]) * 0.12;
            if (Math.abs(target[index] - current[index]) < 0.05) {
                current[index] = target[index];
            } else {
                settled = false;
            }
            layer.style.setProperty('--layer-offset-z', `${current[index].toFixed(2)}px`);
        });
        frame = settled ? 0 : requestAnimationFrame(tick);
    };

    const start = () => {
        if (!frame) {
            frame = requestAnimationFrame(tick);
        }
    };

    // Cards closer to the pointer come forward along the z axis
    visual.addEventListener('pointermove', (event) => {
        if (!canHover.matches || reduceMotion.matches) {
            return;
        }
        layers.forEach((layer, index) => {
            const rect = layer.getBoundingClientRect();
            const distance = Math.hypot(
                event.clientX - (rect.left + rect.width / 2),
                event.clientY - (rect.top + rect.height / 2)
            );
            target[index] = maxDepth * Math.max(0, 1 - distance / falloff);
        });
        start();
    });

    visual.addEventListener('pointerleave', () => {
        target.fill(0);
        start();
    });
}

function getViewportSize() {
    return {
        width: Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0),
        height: Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0)
    };
}

function debounce(func, wait) {
    let timeout;
    return function debounced(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func(...args), wait);
    };
}

function initializeMobileMenu(root = document) {
    const viewport = getViewportSize();
    if (viewport.width > 768) {
        return;
    }

    const navMenu = root.querySelector('.nav-menu');
    if (navMenu) {
        navMenu.setAttribute('aria-label', 'Navigation menu');
    }
}

function smoothScroll(target, duration = 1000) {
    const startPosition = window.scrollY;
    const targetPosition = target.offsetTop;
    const distance = targetPosition - startPosition;
    let start = null;

    const animation = (currentTime) => {
        if (start === null) start = currentTime;
        const elapsed = currentTime - start;
        const progress = Math.min(elapsed / duration, 1);

        const ease = progress < 0.5
            ? 2 * progress * progress
            : -1 + (4 - 2 * progress) * progress;

        window.scrollTo(0, startPosition + distance * ease);

        if (progress < 1) {
            requestAnimationFrame(animation);
        }
    };

    requestAnimationFrame(animation);
}

function bindGlobalHandlers() {
    if (hasBoundGlobalHandlers) {
        return;
    }

    hasBoundGlobalHandlers = true;

    window.addEventListener('scroll', updateActiveNavOnScroll);

    window.addEventListener('resize', debounce(() => {
        console.log('Window resized');
    }, 250));

    document.addEventListener('keydown', (e) => {
        if ((e.altKey || e.metaKey) && e.key === 'm') {
            const mainContent = document.querySelector('main') || document.querySelector('section');
            if (mainContent) {
                mainContent.focus();
                smoothScroll(mainContent, 600);
            }
        }
    });

    document.addEventListener('keydown', () => {
        document.body.classList.add('keyboard-nav');
    });

    document.addEventListener('mousedown', () => {
        document.body.classList.remove('keyboard-nav');
    });

    initializeRipple();
    initializeCustomCursor();

    const sectionObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const sectionId = entry.target.getAttribute('id');
                if (sectionId) {
                    console.log('Section viewed:', sectionId);
                }
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('section[id]').forEach((section) => {
        sectionObserver.observe(section);
    });
}

function initializePageFeatures(container = document) {
    initializeLazyImagePreloading(container);
    initializeAnchorNavigation(container);
    initializeProjectChapterNavigation(container);
    initializeScrollToTop();
    initializeTestimonialToggle(container);
    initializeIntersectionObserver(container);
    initializeSectionIntroTransitions(container);
    initializeButtonEffects(container);
    animateSkillBars(container);
    animateCounters(container);
    initializeParallax(container);
    initializeMyWorkDotGrid(container);
    initializeMyWorkStackScrollMotion(container);
    initializeMyWorkStackHoverDepth(container);
    initializeMobileMenu(container);
    updateActiveNavOnScroll();
}

function initializeLazyImagePreloading(root = document) {
    const pageContainer = root.matches?.(LAZY_IMAGE_PRELOAD_SELECTOR)
        ? root
        : root.querySelector(LAZY_IMAGE_PRELOAD_SELECTOR);

    if (!pageContainer || !('IntersectionObserver' in window)) {
        return;
    }

    lazyImagePreloadObservers.get(pageContainer)?.disconnect();

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            }

            entry.target.loading = 'eager';
            observer.unobserve(entry.target);
        });
    }, { rootMargin: '2000px 0px' });

    pageContainer.querySelectorAll('img[loading="lazy"]').forEach((image) => {
        observer.observe(image);
    });

    lazyImagePreloadObservers.set(pageContainer, observer);
}

function destroyLazyImagePreloading(container) {
    const observer = lazyImagePreloadObservers.get(container);
    if (!observer) {
        return;
    }

    observer.disconnect();
    lazyImagePreloadObservers.delete(container);
}

/* ========================
   Barba Integration
   ======================== */

const PAGE_NAMESPACES = ['home', 'coming-soon', 'design-system'];
const FADE_IN_DURATION_MS = 480;

function prepareContainerForFade(container) {
    if (!container) {
        return;
    }

    container.style.opacity = '0';
    container.style.willChange = 'opacity';
}

function runFadeIn(container, duration = FADE_IN_DURATION_MS) {
    return new Promise((resolve) => {
        if (!container) {
            resolve();
            return;
        }

        prepareContainerForFade(container);
        container.style.transition = `opacity ${duration}ms ease-in-out`;

        requestAnimationFrame(() => {
            container.style.opacity = '1';
            setTimeout(() => {
                container.style.willChange = '';
                resolve();
            }, duration);
        });
    });
}

function initializeBarba() {
    if (hasInitializedBarba || !window.barba) {
        return;
    }

    const wrapper = document.querySelector('[data-barba="wrapper"]');
    const container = document.querySelector('[data-barba="container"]');
    if (!wrapper || !container) {
        return;
    }

    hasInitializedBarba = true;

    // The namespace is set in each page HTML on the container element:
    // <main data-barba="container" data-barba-namespace="home|coming-soon|design-system">.
    prepareContainerForFade(container);

    window.barba.init({
        prevent: ({ el, href }) => {
            if (!el || !href) return false;
            if (el.target === '_blank' || el.hasAttribute('download')) return true;
            if (href.startsWith('mailto:') || href.startsWith('tel:')) return true;
            if (href.startsWith('#')) return true;
            return false;
        },
        transitions: [
            {
                name: 'namespace-fade-in',
                to: {
                    namespace: PAGE_NAMESPACES
                },
                async leave() {
                    // Wait for any in-flight ripple to finish before the page
                    // transition cuts the DOM, preventing an abrupt visual snap.
                    const remaining = rippleActiveUntil - Date.now();
                    if (remaining > 0) {
                        await new Promise((resolve) => setTimeout(resolve, remaining));
                    }
                },
                async once(data) {
                    await runFadeIn(data.next.container);
                },
                async enter(data) {
                    await runFadeIn(data.next.container);
                }
            }
        ]
    });

    window.barba.hooks.before(() => {
        startPageLoadProgress();
    });

    window.barba.hooks.beforeLeave((data) => {
        destroyProjectChapterNavigation(data.current.container);
        destroyLazyImagePreloading(data.current.container);
    });

    window.barba.hooks.after(() => {
        finishPageLoadProgress();
    });

    window.barba.hooks.afterEnter((data) => {
        window.scrollTo({ top: 0, left: 0, behavior: 'auto' });
        initializePageFeatures(data.next.container);
    });
}

function startPageLoadProgress() {
    if (activePageLoadProgress) {
        window.clearTimeout(activePageLoadProgress.revealTimer);
        window.clearTimeout(activePageLoadProgress.finishTimer);
        window.clearTimeout(activePageLoadProgress.removeTimer);
    }

    let progress = document.querySelector('.page-load-progress');
    if (!progress) {
        progress = document.createElement('div');
        progress.className = 'page-load-progress';
        progress.setAttribute('aria-hidden', 'true');

        const indicator = document.createElement('span');
        indicator.className = 'page-load-progress__indicator';
        progress.appendChild(indicator);
        document.body.prepend(progress);
    }

    progress.classList.remove('is-visible', 'is-complete');

    const state = {
        progress,
        startedAt: performance.now(),
        wasShown: false,
        isFinishing: false,
        revealTimer: 0,
        finishTimer: 0,
        removeTimer: 0
    };
    activePageLoadProgress = state;

    state.revealTimer = window.setTimeout(() => {
        if (activePageLoadProgress !== state) {
            return;
        }

        state.wasShown = true;
        progress.classList.add('is-visible');
    }, 150);

    return state;
}

function finishPageLoadProgress(state = activePageLoadProgress) {
    if (!state || activePageLoadProgress !== state || state.isFinishing) {
        return;
    }

    state.isFinishing = true;
    const remainingDisplayTime = Math.max(
        0,
        2500 - (performance.now() - state.startedAt)
    );

    state.finishTimer = window.setTimeout(() => {
        if (activePageLoadProgress !== state) {
            return;
        }

        if (!state.wasShown) {
            state.progress.remove();
            activePageLoadProgress = null;
            return;
        }

        state.progress.classList.add('is-complete');
        state.removeTimer = window.setTimeout(() => {
            if (activePageLoadProgress !== state) {
                return;
            }

            state.progress.remove();
            activePageLoadProgress = null;
        }, 360);
    }, remainingDisplayTime);
}

function initializePageLoadProgress() {
    const initialProgress = startPageLoadProgress();
    const finishInitialLoad = () => finishPageLoadProgress(initialProgress);

    if (document.readyState === 'complete') {
        finishInitialLoad();
    } else {
        window.addEventListener('load', finishInitialLoad, { once: true });
    }
}

function bootstrap() {
    bindGlobalHandlers();
    initializePageLoadProgress();
    initializePageFeatures(document);
    initializeBarba();
    console.log('Portfolio website loaded successfully');
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bootstrap);
} else {
    bootstrap();
}
