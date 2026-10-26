/* ========================
   Global App Bootstrap
   ======================== */

let hasBoundGlobalHandlers = false;
let hasInitializedBarba = false;
let hasBoundCustomCursor = false;
let hasBoundTestimonialToggleBreakpoint = false;
let activePageLoadProgress = null;

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

function updateActiveNavItem(element) {
    document.querySelectorAll('.nav-item').forEach((item) => {
        item.classList.remove('active');
    });
    element.classList.add('active');
}

function initializeAnchorNavigation(root = document) {
    root.querySelectorAll('a[href^="#"]').forEach((anchor) => {
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

function initializeTestimonialToggle(root = document) {
    const quoteToggle = root.querySelector('.project-case-testimonial-mark');
    const grid = root.querySelector('.project-case-testimonials-grid');

    if (!quoteToggle || !grid || quoteToggle.dataset.bound === 'true') {
        return;
    }

    const breakpoint = window.matchMedia('(max-width: 768px)');
    const syncAvailability = () => {
        const activeToggle = document.querySelector('.project-case-testimonial-mark');
        const activeGrid = document.querySelector('.project-case-testimonials-grid');
        if (!activeToggle || !activeGrid) {
            return;
        }

        activeToggle.disabled = !breakpoint.matches;
        if (!breakpoint.matches) {
            activeGrid.classList.remove('is-expanded');
            activeToggle.setAttribute('aria-expanded', 'false');
            activeToggle.setAttribute('aria-label', 'Show more testimonials');
        }
    };

    syncAvailability();
    if (!hasBoundTestimonialToggleBreakpoint) {
        breakpoint.addEventListener('change', syncAvailability);
        hasBoundTestimonialToggleBreakpoint = true;
    }

    quoteToggle.addEventListener('click', () => {
        if (!breakpoint.matches) {
            return;
        }

        const isExpanded = grid.classList.toggle('is-expanded');
        quoteToggle.setAttribute('aria-expanded', String(isExpanded));
        quoteToggle.setAttribute('aria-label', `${isExpanded ? 'Hide' : 'Show'} more testimonials`);
    });
    quoteToggle.dataset.bound = 'true';
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

    const multipliers = [0.38, 0.62, 0.86, 1.12];
    let ticking = false;

    const update = () => {
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
    initializeAnchorNavigation(container);
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
    initializeMobileMenu(container);
    updateActiveNavOnScroll();
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
