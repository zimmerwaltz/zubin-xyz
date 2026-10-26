<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zubin Charles living design system and component playground.">
    <title>Design System | Zubin Charles</title>
    <link rel="stylesheet" href="assets/fonts/fonts.css">
    <link rel="stylesheet" href="assets/css/tailwind.css">
    <link rel="stylesheet" href="styles.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BVJSF0ZLMS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-BVJSF0ZLMS');
    </script>
</head>
<body class="design-system-page" data-barba="wrapper">
    <main data-barba="container" data-barba-namespace="design-system" tabindex="-1">
        <div class="design-system-shell">
            <header class="design-system-header">
                <p class="type-caption-lg-bold">Design System</p>
                <h1>Component playground</h1>
                <p class="type-body-lg-regular">A living reference for the website's production components and tokens.</p>
            </header>

            <section class="design-system-section" aria-labelledby="button-heading">
                <div class="design-system-section-heading">
                    <p class="type-caption-lg-bold">Components</p>
                    <h2 id="button-heading">Button</h2>
                    <p class="type-body-lg-regular">Inventory of the Button component variants and states defined in Figma.</p>
                </div>

                <div class="design-system-button-list">
                    <article class="design-system-button-row">
                        <h3>primary</h3>
                        <a href="#primary-button" class="btn btn-primary">
                            <span>Button</span>
                            <span class="btn-icon icon-mask icon-arrow-right" aria-hidden="true"></span>
                        </a>
                    </article>

                    <article class="design-system-button-row">
                        <h3>secondary</h3>
                        <a href="#secondary-button" class="btn btn-secondary-solid">
                            <span>Button</span>
                            <span class="btn-icon icon-mask icon-arrow-right" aria-hidden="true"></span>
                        </a>
                    </article>

                    <article class="design-system-button-row">
                        <h3>outline</h3>
                        <a href="#outline-button" class="btn btn-outline">
                            <span>Button</span>
                            <span class="btn-icon icon-mask icon-arrow-right" aria-hidden="true"></span>
                        </a>
                    </article>

                    <article class="design-system-button-row design-system-button-row--unavailable">
                        <h3>success</h3>
                        <p class="type-body-lg-regular">Not implemented in production.</p>
                    </article>
                </div>

                <div class="design-system-state-list" aria-labelledby="button-states-heading">
                    <h3 id="button-states-heading">Supported states</h3>
                    <dl class="design-system-state-inventory">
                        <div>
                            <dt>primary</dt>
                            <dd>enabled, disabled, hover, focus, pressed</dd>
                        </div>
                        <div>
                            <dt>secondary</dt>
                            <dd>enabled, hover, focus, pressed</dd>
                        </div>
                        <div>
                            <dt>outline</dt>
                            <dd>enabled, hover, focus, pressed</dd>
                        </div>
                        <div>
                            <dt>success</dt>
                            <dd>enabled, hover, focus, pressed</dd>
                        </div>
                    </dl>
                    <p class="type-body-lg-regular">The production styles expose hover, focus-visible, active, and disabled behavior where implemented. Figma’s disabled variant exists only for primary.</p>
                    <a href="#disabled-button" class="btn btn-primary" aria-disabled="true">
                        <span>Disabled</span>
                        <span class="btn-icon icon-mask icon-arrow-right" aria-hidden="true"></span>
                    </a>
                </div>
            </section>

            <section class="design-system-section" aria-labelledby="text-link-heading">
                <div class="design-system-section-heading">
                    <p class="type-caption-lg-bold">Components</p>
                    <h2 id="text-link-heading">Text Link</h2>
                    <p class="type-body-lg-regular">Production text links support Figma large, medium, and small sizes with an optional icon.</p>
                </div>

                <div class="design-system-text-link-list">
                    <a href="#text-link-large" class="text-link text-link--large">
                        <span class="text-link__icon icon-mask icon-plus" aria-hidden="true"></span>
                        <span>Text Link</span>
                    </a>
                    <a href="#text-link-medium" class="text-link text-link--medium">
                        <span class="text-link__icon icon-mask icon-plus" aria-hidden="true"></span>
                        <span>Text Link</span>
                    </a>
                    <a href="#text-link-small" class="text-link text-link--small">
                        <span class="text-link__icon icon-mask icon-plus" aria-hidden="true"></span>
                        <span>Text Link</span>
                    </a>
                    <a href="#text-link-disabled" class="text-link text-link--large" aria-disabled="true">
                        <span class="text-link__icon icon-mask icon-plus" aria-hidden="true"></span>
                        <span>Text Link</span>
                    </a>
                </div>
            </section>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>
