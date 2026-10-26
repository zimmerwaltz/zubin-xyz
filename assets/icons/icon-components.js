const ICON_NAMES = [
    'arrow-right',
    'behance',
    'chevron-left',
    'chevron-right',
    'chevron-up',
    'cv',
    'download',
    'email',
    'human',
    'instagram',
    'linkedin',
    'logo-mark',
    'machine',
    'medium',
    'phone',
    'plus',
    'quote',
    'view-portfolio'
];

export function createIconComponent(iconName, { size = 20, className = '', label = '' } = {}) {
    if (!ICON_NAMES.includes(iconName)) {
        throw new Error(`Unknown icon: ${iconName}`);
    }

    const span = document.createElement('span');
    span.className = `icon-mask icon-${iconName} ${className}`.trim();
    span.style.display = 'inline-flex';
    span.style.width = `${size}px`;
    span.style.height = `${size}px`;

    if (label) {
        span.setAttribute('role', 'img');
        span.setAttribute('aria-label', label);
    } else {
        span.setAttribute('aria-hidden', 'true');
    }

    return span;
}

export function listAvailableIcons() {
    return [...ICON_NAMES];
}
