<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Driving smarter evidence based healthcare decisions - project case study by Zubin Charles.">
    <title>Driving smarter evidence based healthcare decisions | Zubin Charles</title>
    <link rel="stylesheet" href="../assets/fonts/fonts.css">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <link rel="stylesheet" href="../styles.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BVJSF0ZLMS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-BVJSF0ZLMS');
    </script>
</head>
<body class="page-home page-project-case-study" data-barba="wrapper">
    <main data-barba="container" data-barba-namespace="project-evidence" tabindex="-1">
        <?php
        $previous_project_href = "./streamlining-service-operations-for-field-engineers.php";
        $previous_project_name = "Streamlining Service Operations For Field Engineers.";
        $next_project_href = "./brewing-a-better-retail-experience-for-coffee-lovers.php";
        $next_project_name = "Brewing a better retail experience for coffee lovers.";
        ?>
         <header class="header" role="banner">
            <?php include "../include/header.php"; ?>
        </header>

        <section class="home-section project-case-hero" id="hero" aria-label="Project overview">
            <div class="home-shell project-case-hero-shell">
                <div class="project-case-top-actions">
                    <a href="../product_design.php" class="btn btn-outline">
                        <span class="btn-icon icon-mask icon-chevron-left" aria-hidden="true"></span>
                        <span>All Projects</span>
                    </a>
                    <div class="project-case-project-nav">
                        <div class="project-case-nav-control" data-tooltip="Previous Project">
                            <a href="<?php echo htmlspecialchars($previous_project_href, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline project-case-icon-button" aria-label="<?php echo htmlspecialchars('Previous project: ' . $previous_project_name, ENT_QUOTES, 'UTF-8'); ?>">
                                <span class="btn-icon icon-mask icon-chevron-left" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="project-case-nav-control" data-tooltip="Next Project">
                            <a href="<?php echo htmlspecialchars($next_project_href, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline project-case-icon-button" aria-label="<?php echo htmlspecialchars('Next project: ' . $next_project_name, ENT_QUOTES, 'UTF-8'); ?>">
                                <span class="btn-icon icon-mask icon-chevron-right" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="project-case-hero-copy">
                    <h1 class="page-title">Driving smarter evidence based healthcare decisions.</h1>
                    <div class="project-case-cover">
                        <img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/project-cover.png" alt="Mobile-first biomarker decision support experience showcased on device">
                    </div>
                </div>

                <div class="project-case-meta-grid" aria-label="Project metadata">
                    <div class="read-only">
                        <p class="read-only__title">Domain</p>
                        <p class="read-only__value">Healthcare &amp; Life Sciences.</p>
                    </div>
                    <div class="read-only">
                        <p class="read-only__title">Year</p>
                        <p class="read-only__value">2025</p>
                    </div>
                    <div class="read-only">
                        <p class="read-only__title">Timeline</p>
                        <p class="read-only__value">1 Week</p>
                    </div>
                    <div class="read-only">
                        <p class="read-only__title">Role</p>
                        <p class="read-only__value">UI/UX Designer</p>
                    </div>
                    <div class="read-only">
                        <p class="read-only__title">Team</p>
                        <p class="read-only__value">1 Designer</p>
                    </div>
                    <div class="read-only">
                        <p class="read-only__title">Tool</p>
                        <p class="read-only__value">Figma Design</p>
                    </div>
                    <div class="read-only project-case-meta-item-wide">
                        <p class="read-only__title">Activities</p>
                        <p class="read-only__value">Secondary Research, Wireframing, Visual Designs, Prototyping.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-section project-case-process" aria-label="Design process">
            <div class="home-shell project-case-process-shell">
                <div class="project-case-process-graphic" aria-hidden="true">
                    <?php include "../assets/images/process.svg"; ?>
                </div>
                <div class="project-case-process-content">
                    <div class="project-section-copy copy-left copy-light">
                        <h2>The process</h2>
                    </div>
                    <ol class="project-case-process-list">
                        <li>
                            <p class="project-case-process-step">01</p>
                            <div>
                                <h2 class="type-body-xl-regular">Requirement Gathering</h2>
                                <p class="type-body-lg-regular">Understanding user needs and technical constraints.</p>
                            </div>
                        </li>
                        <li>
                            <p class="project-case-process-step">02</p>
                            <div>
                                <h2 class="type-body-xl-regular">High-Fidelity Design</h2>
                                <p class="type-body-lg-regular">Creating detailed, polished UI mockups.</p>
                            </div>
                        </li>
                        <li>
                            <p class="project-case-process-step">03</p>
                            <div>
                                <h2 class="type-body-xl-regular">Prototype</h2>
                                <p class="type-body-lg-regular">Interactive models to test and validate the user experience.</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </section>

        <section class="home-section project-case-problem" aria-label="Problem statement">
            <div class="home-shell project-case-problem-shell">
                <div class="project-case-problem-intro">
                    <div class="project-case-problem-graphic">
                        <?php include "../assets/images/problem-statement.svg"; ?>
                    </div>
                    <div class="project-section-copy copy-left copy-light">
                        <h2>Problem statement</h2>
                        <p>Healthcare professionals often struggle to <b><i>interpret specialised biomarker</i></b> test results due to a lack of accessible, credible, and clinically relevant digital resources which affects their ability to confidently diagnose and prescribe treatments, ultimately limiting the adoption of the biomarker test.</p>
                    </div>
                </div>
                <div class="project-case-problem-user">
                    <div class="project-case-problem-user-media">
                        <img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/problem-visual.jpg" alt="Healthcare practitioner reviewing patient data">
                    </div>
                    <aside class="project-case-problem-user-quote">
                        <p>“As a healthcare professional, I want quick, reliable information to guide my patients with the right treatment”</p>
                    </aside>
                </div>  
            </div>
        </section>

        <section class="home-section project-case-challenges" aria-label="Challenges">
            <div class="home-shell project-case-challenges-shell">
                <div class="project-case-challenge-art" aria-hidden="true">
                    <?php include "../assets/images/challenges.svg"; ?>
                </div>
                <div class="project-case-challenges-content">
                     <div class="project-section-copy copy-left copy-light">
                        <h2>Challenges</h2>
                    </div>
                    <div class="project-case-challenges-grid">
                        <ul class="project-case-challenge-list">
                            <li>Diagnostic workflows are fragmented across departments.</li>
                            <li>Clinicians lacked fast access to explainable result interpretation.</li>
                            <li>Research links and treatment evidence were not integrated in one flow.</li>
                            <li>Sales and field teams had no unified digital story for test value.</li>
                            <li>Adoption dropped when interpretation took too long in consultation settings.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-section project-case-dark project-case-visual-designs" aria-label="Visual designs">
            <div class="home-shell project-case-visual-shell">
                 <div class="project-section-copy copy-left copy-light">
                    <h2>Visual Designs</h2>
                    <p>A glimpse into some of the key screens.</p>
                </div>
                <div class="project-case-visual-main">
                    <img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/visual-design-main.png" alt="Primary application keyscreen">
                </div>
            </div>
        </section>

        <section class="home-section project-case-duo" aria-label="Biomarker interpretation screens">
            <div class="project-case-section-header">
                <img class="project-case-app-logo" src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/app-logo.png" alt="Biomarker decision support app logo">
                <h2 class="project-case-sans-heading">Biomarker Test Result Interpretation</h2>
            </div>
            <div class="project-case-duo-screens">
                <div class="project-case-duo-col project-case-duo-col-light">
                    <div class="project-case-duo-inner">
                        <div class="project-case-screen-card">
                            <p class="type-body-lg-regular">Quick access to initiate test interpretation.</p>
                            <img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/biomarker-screen-1.png" alt="Screen showing biomarker interpretation start point">
                        </div>
                    </div>
                </div>
                <div class="project-case-duo-col project-case-duo-col-stack">
                    <div class="project-case-duo-inner">
                        <div class="project-case-screen-card">
                            <p class="type-body-lg-regular">Upload a report to begin or access saved reports.</p>
                            <img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/biomarker-screen-2.png" alt="Screen for uploading reports and saved report access">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-section project-case-breakdown" aria-label="Visual breakdown of test results">
            <div class="project-case-section-header">
                <img class="project-case-app-logo" src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/nucleous-orbit.svg" alt="Biomarker decision support app logo">
                <h2 class="project-case-sans-heading">Visual breakdown of Test Results</h2>
            </div>
            <div class="home-shell project-case-breakdown-shell">
                <div class="project-case-breakdown-grid">
                    <article class="project-case-breakdown-item">
                        <img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/breakdown-1.png" alt="Visual breakdown of biomarker levels in app">
                        <p class="type-body-lg-regular">Visual breakdown of biomarker levels.</p>
                    </article>
                    <article class="project-case-breakdown-item project-case-breakdown-item-mid">
                        <img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/breakdown-2.png" alt="Screen linking biomarker results to clinical guidelines">
                        <p class="type-body-lg-regular">Linked to clinical guidelines and studies.</p>
                    </article>
                    <article class="project-case-breakdown-item project-case-breakdown-item-low">
                        <img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/breakdown-3.png" alt="Screen showing evidence-based treatment options">
                        <p class="type-body-lg-regular">Evidence-based treatment options.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="home-section project-case-testimonials" aria-label="User testimonials">
            <div class="home-shell project-case-testimonials-shell">
                <div class="project-case-testimonials-header project-section-copy copy-light">
                    <h2>What users have to say?</h2>
                    <p>2.3K downloads registered.</p>
                </div>
                <div class="project-case-testimonials-grid">
                    <article class="project-case-testimonial">
                        <p class="project-case-testimonial-quote">The app has been a huge success and is a great addition to a clinician digital resources. It compliments the existing procalcitonin.com website and training portal by adding in-depth clinical guidance at the physicians fingertips.</p>
                        <div class="project-case-testimonial-notch" aria-hidden="true"><img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/figma-testimonial-notch-1.svg" alt=""></div>
                        <div class="project-case-testimonial-author">
                            <p>PCT Regional Marketing Manager</p>
                            <span>North America Region</span>
                        </div>
                    </article>
                    <article class="project-case-testimonial">
                        <p class="project-case-testimonial-quote">I would like to briefly share our very positive experience with the PCT app. I consider it very practical, intuitive and clinically relevant. We consider the app to be a very valuable resource to support the initiatives that we are working together.</p>
                        <div class="project-case-testimonial-notch" aria-hidden="true"><img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/figma-testimonial-notch-1.svg" alt=""></div>
                        <div class="project-case-testimonial-author">
                            <p>Medical Affairs Latin America</p>
                            <span>Siemens Healthineers</span>
                        </div>
                    </article>
                    <article class="project-case-testimonial">
                        <p class="project-case-testimonial-quote">The PCT app has become an integral part of a customer conversations. It is an ideal compliment to our clinical trainings and effectively supports our clinical demand activities</p>
                        <div class="project-case-testimonial-notch" aria-hidden="true"><img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/figma-testimonial-notch-1.svg" alt=""></div>
                        <div class="project-case-testimonial-author">
                            <p>Senior Manager</p>
                            <span>Clinical Customer Development and Regional Lead</span>
                        </div>
                    </article>
                    <article class="project-case-testimonial">
                        <p class="project-case-testimonial-quote">The PCT app is a strategic digital solution that enhances the value of the proton test in daily clinical practice designed as a high impact educational tool. It facilitates the understanding and proper use of PCT.</p>
                        <div class="project-case-testimonial-notch" aria-hidden="true"><img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/figma-testimonial-notch-1.svg" alt=""></div>
                        <div class="project-case-testimonial-author">
                            <p>Product Manager Andean Region</p>
                            <span>Siemens Healthineers</span>
                        </div>
                    </article>
                    <article class="project-case-testimonial">
                        <p class="project-case-testimonial-quote">The app has become a valuable resource for a US license partners when engaging with their clinical customers, feedback consistently highlights its concise user friendly format</p>
                        <div class="project-case-testimonial-notch" aria-hidden="true"><img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/figma-testimonial-notch-1.svg" alt=""></div>
                        <div class="project-case-testimonial-author">
                            <p>NORAM License Partner Manager</p>
                            <span>PCT</span>
                        </div>
                    </article>
                    <button class="project-case-testimonial-mark" type="button" aria-expanded="false" aria-label="Show more testimonials">
                        <img src="../assets/images/quote.svg" alt="">
                        <span class="icon-mask icon-chevron-down" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </section>

        <section class="home-section project-case-dark project-case-impact" aria-label="The impact">
            <div class="home-shell project-case-impact-shell">
                <div class="project-case-impact-device">
                    <img src="../assets/images/driving-smarter-evidence-based-healthcare-decisions/the-impact.png" alt="Device composition presenting key experience visuals">
                </div>
                <div class="home-section-header-copy project-case-intro-copy project-case-impact-copy">
                    <h2>The impact</h2>
                    <p>The app gives healthcare practitioners clear, science-backed guidance based on biomarker results. It's designed to be quick, trustworthy, and easy to navigate.</p>
                </div>
                <ul class="project-case-impact-list">
                    <li><span class="project-case-impact-icon icon-mask icon-plus" aria-hidden="true"></span><span>Increased confidence among clinicians in using the biomarker test.</span></li>
                    <li><span class="project-case-impact-icon icon-mask icon-plus" aria-hidden="true"></span><span>Enhanced efficiency for sales teams in communicating value.</span></li>
                    <li><span class="project-case-impact-icon icon-mask icon-plus" aria-hidden="true"></span><span>Improved adoption rates of the test.</span></li>
                </ul>
            </div>
        </section>

        

        <?php include "../include/project-up-next.php"; ?>

         <footer class="footer home-footer" id="contact" role="contentinfo">
            <?php include "../include/footer.php"; ?>
        </footer>
    </main>
    <script src="../script.js"></script>
</body>
</html>