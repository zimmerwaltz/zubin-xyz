<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Coming Soon - Zubin Charles">
    <meta name="author" content="Zubin Charles">
    <title>Coming Soon - Zubin Charles</title>
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
    <style>
        .coming-soon-title {
            font-family: var(--s-font-secondary-font-family);
            font-size: var(--r-font-display-d3-font-size);
            font-weight: var(--r-font-display-weight-regular);
            line-height: var(--r-font-display-d3-line-height);
            color: var(--c-text-color-default-0);
            margin: 0;
            letter-spacing: var(--r-font-display-d3-letter-spacing);
        }

        .coming-soon-title span {
            display: block;
        }

        .coming-soon-logo {
            width: 120px;
            height: 120px;
            flex-shrink: 0;
            object-fit: contain;
            display: block;
        }

        .coming-soon-heading,
        .coming-soon-subheading {
            font-family: var(--s-font-primary-font-family);
            font-size: var(--r-font-body-body-lg-d-font-size);
            font-weight: var(--s-font-primary-weight-medium);
            line-height: var(--r-font-body-body-lg-d-line-height);
            color: var(--c-text-color-default-0);
            margin: 0;
            letter-spacing: var(--s-font-primary-letter-spacing-compact);
        }

        .coming-soon-frame {
            min-height: 100vh;
            background-color: var(--c-surface-color-default-light-2);
        }

        .coming-soon-layout {
            width: 100%;
            min-height: 100vh;
        }

        .coming-soon-left {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: var(--s-spacing-640);
        }

        .coming-soon-right {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            gap: var(--r-jumper-lg-sm);
            padding: 0 var(--r-jumper-3xl-md);
        }

        .coming-soon-content {
            display: grid;
            gap: var(--r-jumper-lg-sm);
            width: 100%;
        }

        .coming-soon-copy {
            display: grid;
            gap: var(--r-jumper-lg-sm);
        }

        .coming-soon-buttons {
            display: grid;
            gap: var(--r-jumper-sm-sm);
            width: 100%;
        }

        .coming-soon-secondary-group {
            display: flex;
            flex-direction: row;
            gap: var(--r-jumper-sm-sm);
            width: 100%;
            align-items: center;
        }

        .coming-soon-button {
            width: 100%;
            min-height: var(--c-button-global-height);
        }

        .coming-soon-button .btn-icon {
            width: var(--s-icon-size-sm);
            height: var(--s-icon-size-sm);
        }

        .coming-soon-icon-button {
            min-height: var(--c-button-global-height);
        }

        .coming-soon-icon-button .btn-icon {
            width: var(--s-icon-size-sm);
            height: var(--s-icon-size-sm);
        }

        @media (max-width: 1024px) {
            .coming-soon-title {
                font-size: clamp(3.5rem, 9vw, 5rem);
                line-height: 1.1;
            }
        }

        @media (max-width: 640px) {
            .coming-soon-title {
                font-size: clamp(2.75rem, 16vw, 4rem);
                line-height: 1;
            }

            .coming-soon-logo {
                width: 88px;
                height: 88px;
            }

            .coming-soon-left {
                padding: var(--s-spacing-240);
            }

            .coming-soon-right {
                padding: 0 var(--s-spacing-240) var(--s-spacing-240);
            }

            .coming-soon-secondary-group {
                flex-direction: column;
                align-items: stretch;
            }
        }

        @media (min-width: 768px) {
            .coming-soon-left {
                padding: var(--s-spacing-640);
            }

            .coming-soon-right {
                padding: 0 var(--r-jumper-xl-md);
            }
        }

        @media (min-width: 1024px) {
            .coming-soon-layout {
                display: grid;
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            }

            .coming-soon-right {
                padding: 0 var(--r-jumper-3xl-md);
            }
        }
    </style>
</head>
<body data-barba="wrapper">
    <main data-barba="container" data-barba-namespace="coming-soon" tabindex="-1">
        <header class="header" role="banner">
            <?php include "include/header.php"; ?>
        </header>
    <section class="coming-soon-frame" data-node-id="3342:4621">
        <div class="coming-soon-layout" data-node-id="3342:4621-layout">
            <!-- Left Section: Image -->
           
            <!-- Right Section: Content -->
            <div class="coming-soon-right" data-node-id="3342:4624">
                <div class="coming-soon-content" data-node-id="3342:4625">
                    
                    <div class="coming-soon-copy">
                        <p class="coming-soon-heading" data-node-id="3342:4631">Stay Tuned! I'm cooking.</p>
                    </div>
                </div>

            

                    <div class="coming-soon-secondary-group" data-node-id="3342:6017">
                        <a href="." class="btn btn-outline coming-soon-button flex-1" data-node-id="3342:4635" data-annotations="Link to portfolio">
                            <span>Return Home</span>
                        </a>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer home-footer" id="contact" role="contentinfo">
            <?php include "include/footer.php"; ?>
        </footer>
    </main>

    <script src="node_modules/@barba/core/dist/barba.umd.js"></script>
    <script src="script.js"></script>
</body>
</html>