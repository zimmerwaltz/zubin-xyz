<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A seasoned UX architect dedicated crafting intuitive interfaces across diverse sectors including healthcare, insurance, life sciences ecommerce and travel.">
    <title>Zubin Charles - Home</title>
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
<body class="page-home page-home-v2" data-barba="wrapper">
    <main data-barba="container" data-barba-namespace="home-v2" tabindex="-1">
        <header class="header" role="banner">
            <?php include "include/header.php"; ?>
        </header>

        <section class="home-section home-hero" id="hero" aria-label="Hero">
            <div class="home-shell home-hero-layout">
                <div class="home-hero-visual">
                    <div class="home-hero-portrait-panel">
                        <div class="home-hero-orbit" aria-hidden="true">
                            <img class="logo-circular" src="assets/images/logo-circular.svg" alt="Zubin Charles mark">
                        </div>
                        <div class="home-hero-portrait">
                            <img src="assets/images/home/headshot-effect.png" alt="Stylized portrait of Zubin Charles">
                        </div>
                    </div>
                </div>

                <div class="home-hero-copy">
                    <p class="home-section-kicker type-caption-lg-bold">UX Architect &amp; Product Design Lead</p>
                    <div class="home-hero-heading-group">
                        <h1 class="home-hero-title">
                            <span class="home-title-line">Zubin Charles</span>
                            <!-- <span class="home-title-line">Charles</span> -->
                        </h1>
                        <!-- <p class="home-hero-intro type-body-lg-medium">A seasoned UX architect dedicated to crafting intuitive interfaces across healthcare, insurance, life sciences, ecommerce, and travel.</p> -->
                        <p class="home-hero-support type-body-lg-regular">A seasoned UX architect dedicated crafting intuitive interfaces across diverse sectors including healthcare, insurance, life sciences  ecommerce and travel.</p>
                    </div>
                    <div class="home-hero-ctas">
                        <!-- <a href="product_design.php" class="btn btn-primary home-hero-button">
                            <span>View My Work</span>
                            <span class="btn-icon icon-mask icon-arrow-right" aria-hidden="true"></span>
                        </a> -->
                        <a href="https://www.linkedin.com/in/zubin-charles-62b400b8/" target="_blank" rel="noopener noreferrer" class="btn btn-outline home-hero-button">
                            <span>Connect on LinkedIn</span>
                            <span class="btn-icon icon-mask icon-linkedin" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        

        <section class="home-section home-my-work" id="product-design" aria-label="My work">
            <div class="home-shell home-my-work-layout">
                <div class="home-my-work-copy-block">
                    <!-- <h2 class="home-my-work-title">Product Design</h2> -->
                    <h2 class="home-section-title">Product Design</h2>
                    <p class="home-my-work-copy type-body-lg-regular">A curated collection of work across domains.</p>
                    <a href="product_design.php" class="btn btn-primary home-my-work-button">
                        <span>View Projects</span>
                        <span class="btn-icon icon-mask icon-arrow-right" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="home-my-work-visual" aria-hidden="true">
                    <div class="home-my-work-stack">
                        <?php for ($card = 1; $card <= 6; $card++): ?>
                            <?php
                            $desktopImage = (($card - 1) % 4) + 1;
                            $mobileImage = $card;
                            $revealImage = 5 + (($card - 1) % 2);
                            ?>
                            <div class="home-my-work-layer home-my-work-layer-<?php echo $card; ?>">
                                <div class="home-my-work-flip">
                                    <picture class="home-my-work-face home-my-work-face-front">
                                        <source media="(min-width: 1201px)" srcset="assets/images/home/project-card/project-<?php echo $desktopImage; ?>.png">
                                        <img src="assets/images/home/project-card/project-<?php echo $mobileImage; ?>.png" alt="" loading="lazy">
                                    </picture>
                                    <img class="home-my-work-face home-my-work-face-back" src="assets/images/home/project-card/project-<?php echo $revealImage; ?>.png" alt="" loading="lazy">
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="home-section home-work" id="featured-projects" aria-label="Product design work">
            <div class="home-shell">
                <div class="home-section-header">
                    <div class="home-section-header-copy">
                        <p class="home-section-kicker type-caption-lg-bold">Product Design</p>
                        <h2 class="home-section-title">A curated body of work built for high-stakes products.</h2>
                        <p class="type-body-lg-regular">From platform redesigns to service journeys, the work focuses on systems thinking, polished execution, and measurable clarity for both users and teams.</p>                        
                    </div>
                    <a href="#contact" class="btn btn-outline home-section-button">
                        <span>View All Projects</span>
                        <span class="btn-icon icon-mask icon-arrow-right" aria-hidden="true"></span>
                    </a>
                </div>

                <div class="home-project-grid">
                    <article class="home-project-card">
                        <div class="home-project-media">
                            <img src="assets/images/home/project-card/project-1.png" alt="A frontal shot of a mobile app home page" loading="lazy">
                        </div>
                        <div class="home-project-body">
                            <div class="home-project-meta">
                                <span class="home-project-tag">Healthcare &amp; Life Sciences</span>
                                <span class="home-project-year">2025</span>
                            </div>
                            <h3 class="home-project-title">Streamlining Service Operations For Field Engineers.</h3>
                        </div>
                    </article>
                    <article class="home-project-card">
                        <a href="/projects/driving-smarter-evidence-based-healthcare-decisions.php">
                            <div class="home-project-media">
                                <img src="assets/images/home/project-card/project-2.png" alt="A sideways shot of a mobile app home screen" loading="lazy">
                            </div>
                            <div class="home-project-body">
                            
                                    <div class="home-project-meta">
                                        <span class="home-project-tag">Healthcare &amp; Life Sciences</span>
                                        <span class="home-project-year">2025</span>
                                    </div>
                                    <h3 class="home-project-title">Driving Smarter Evidence Based Healthcare Decisions.</h3>   
                            </div>
                        </a> 
                    </article>
                    <article class="home-project-card">
                        <div class="home-project-media">
                            <img src="assets/images/home/project-card/project-3.png" alt="A top down shot of an app screen open on a phone " loading="lazy">
                        </div>
                        <div class="home-project-body">
                            <div class="home-project-meta">
                                <span class="home-project-tag">Food &amp; Beverage Retail</span>
                                <span class="home-project-year">2022</span>
                            </div>
                            <h3 class="home-project-title">Brewing A Better Retail Experience for Coffee Lovers.</h3>
                        </div>
                    </article>
                    <article class="home-project-card">
                        <div class="home-project-media">
                            <img src="assets/images/home/project-card/project-4.png" alt="A phone laying on a table with a streaming app open" loading="lazy">
                        </div>
                        <div class="home-project-body">
                            <div class="home-project-meta">
                                <span class="home-project-tag">OTT</span>
                                <span class="home-project-year">2022</span>
                            </div>
                            <h3 class="home-project-title">Envisioning A Seamless Streaming Experience.</h3>
                             <p class="type-body-lg-regular">Structured information architecture and interface logic so expert users could move faster without sacrificing accuracy.</p> 
                        </div>
                    </article>
                    <article class="home-project-card">
                        <div class="home-project-media">
                            <img src="assets/images/home/project-card/project-5.png" alt="Aerial view of an airplane on a runway" loading="lazy">
                        </div>
                        <div class="home-project-body">
                            <div class="home-project-meta">
                                <span class="home-project-tag">Air Travel</span>
                                <span class="home-project-year">2021</span>
                            </div>
                            <h3 class="home-project-title">The Digital Runway to India’s Youngest Airline.</h3>
                        </div>
                    </article>
                    <article class="home-project-card">
                        <div class="home-project-media">
                            <img src="assets/images/home/project-card/project-6.png" alt="A laptop displaying an e-commerce website" loading="lazy">
                        </div>
                        <div class="home-project-body">
                            <div class="home-project-meta">
                                <span class="home-project-tag">E-Commerce</span>
                                <span class="home-project-year">2021</span>
                            </div>
                            <h3 class="home-project-title">Elevating The Retail Shopping Experience.</h3>
                        </div>
                    </article>
                </div>
            </div>
        </section> -->

        

        <section class="home-section home-credentials" id="credentials" aria-label="Education and skills">
            <div class="home-shell">
                <section class="home-panel home-skills-panel" aria-labelledby="skills-title">
                    <p class="home-section-kicker type-caption-lg-bold">A Skillset You Can Bet On</p>
                    <h2 class="home-section-title" id="skills-title">Core strengths across research, structure, and interface craft.</h2>
                    <div class="skills-grid home-skills-grid">
                        <div class="skill-item home-skill-item">
                            <div class="skill-name type-h6-regular"><span>User Research</span><span>7/10</span></div>
                            <div class="home-skill-bar" data-skill-level="70" role="img" aria-label="User Research 7 out of 10">
                                <span class="home-skill-track" aria-hidden="true"></span>
                                <span class="skill-fill" aria-hidden="true"></span>
                                <span class="skill-terminal" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="skill-item home-skill-item">
                            <div class="skill-name type-h6-regular"><span>User Journey Mapping</span><span>9/10</span></div>
                            <div class="home-skill-bar" data-skill-level="90" role="img" aria-label="User Journey Mapping 9 out of 10">
                                <span class="home-skill-track" aria-hidden="true"></span>
                                <span class="skill-fill" aria-hidden="true"></span>
                                <span class="skill-terminal" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="skill-item home-skill-item">
                            <div class="skill-name type-h6-regular"><span>Information Architecture</span><span>9/10</span></div>
                            <div class="home-skill-bar" data-skill-level="90" role="img" aria-label="Information Architecture 9 out of 10">
                                <span class="home-skill-track" aria-hidden="true"></span>
                                <span class="skill-fill" aria-hidden="true"></span>
                                <span class="skill-terminal" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="skill-item home-skill-item">
                            <div class="skill-name type-h6-regular"><span>Wireframing</span><span>9/10</span></div>
                            <div class="home-skill-bar" data-skill-level="90" role="img" aria-label="Wireframing 9 out of 10">
                                <span class="home-skill-track" aria-hidden="true"></span>
                                <span class="skill-fill" aria-hidden="true"></span>
                                <span class="skill-terminal" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="skill-item home-skill-item">
                            <div class="skill-name type-h6-regular"><span>Visual Design</span><span>8/10</span></div>
                            <div class="home-skill-bar" data-skill-level="80" role="img" aria-label="Visual Design 8 out of 10">
                                <span class="home-skill-track" aria-hidden="true"></span>
                                <span class="skill-fill" aria-hidden="true"></span>
                                <span class="skill-terminal" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="skill-item home-skill-item">
                            <div class="skill-name type-h6-regular"><span>Prototyping</span><span>7/10</span></div>
                            <div class="home-skill-bar" data-skill-level="70" role="img" aria-label="Prototyping 7 out of 10">
                                <span class="home-skill-track" aria-hidden="true"></span>
                                <span class="skill-fill" aria-hidden="true"></span>
                                <span class="skill-terminal" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="skill-item home-skill-item">
                            <div class="skill-name type-h6-regular"><span>Product Strategy</span><span>6/10</span></div>
                            <div class="home-skill-bar" data-skill-level="60" role="img" aria-label="Product Strategy 6 out of 10">
                                <span class="home-skill-track" aria-hidden="true"></span>
                                <span class="skill-fill" aria-hidden="true"></span>
                                <span class="skill-terminal" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="skill-item home-skill-item">
                            <div class="skill-name type-h6-regular"><span>User Testing</span><span>5/10</span></div>
                            <div class="home-skill-bar" data-skill-level="50" role="img" aria-label="User Testing 5 out of 10">
                                <span class="home-skill-track" aria-hidden="true"></span>
                                <span class="skill-fill" aria-hidden="true"></span>
                                <span class="skill-terminal" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <section class="home-section home-achievements" aria-label="Key achievements">
            <!-- <div class="home-achievements-bg" aria-hidden="true">
                <img src="assets/images/home/zubin-glitch.png" alt="a glitched out image of a person" loading="lazy">
            </div> -->
            <div class="home-shell home-achievements-layout">
                <div class="home-achievements-copy">
                    <p class="home-section-kicker type-caption-lg-bold">Key Achievements</p>
                    <h2 class="home-section-title">Outcomes that moved the business, not just the interface.</h2>
                    <p class="type-body-lg-regular">My work has consistently combined UX craft with delivery pressure, stakeholder alignment, and product maturity across enterprise and consumer-facing teams.</p>
                </div>
                <div class="home-metrics-grid">
                    <div class="metric-item"><span class="metric-number type-display-d3">40+</span><p class="metric-label type-h6-regular">Digital Projects Delivered</p></div>
                    <div class="metric-item"><span class="metric-number type-display-d3">12+</span><p class="metric-label type-h6-regular">Global Markets Served</p></div>
                    <div class="metric-item"><span class="metric-number type-display-d3">06</span><p class="metric-label type-h6-regular">Industries Covered</p></div>
                    <div class="metric-item"><span class="metric-number type-display-d3">10+</span><p class="metric-label type-h6-regular">Brands Served</p></div>
                    <div class="metric-item"><span class="metric-number type-display-d3">07</span><p class="metric-label type-h6-regular">Designers Mentored</p></div>
                    <div class="metric-item"><span class="metric-number type-display-d3">15%</span><p class="metric-label type-h6-regular">Faster Feature Delivery</p></div>
                    <div class="metric-item"><span class="metric-number type-display-d3">8.8+</span><p class="metric-label type-h6-regular">CSAT Score</p></div>
                    <div class="metric-item"><span class="metric-number type-display-d3">03</span><p class="metric-label type-h6-regular">Awards Won</p></div>
                </div>
            </div>
        </section>

        <section class="home-section home-brands" aria-label="Brands">
            <div class="home-shell">
                <div class="home-section-header home-section-header-centered">
                    <div class="home-section-header-copy">
                        <p class="home-section-kicker type-caption-lg-bold">Brands I Have Built For</p>
                        <h2 class="home-section-title">Trusted where usability had to perform under real business pressure.</h2>
                    </div>
                </div>
                <div class="home-brands-grid">
                    <div class="home-brand-card"><img src="assets/images/home/brands/thermo-fisher-logo.png" alt="Thermo Fisher Scientific" class="brand-logo" loading="lazy"></div>
                    <div class="home-brand-card"><img src="assets/images/home/brands/sunteck-realty-logo.png" alt="Sunteck Realty" class="brand-logo" loading="lazy"></div>
                    <div class="home-brand-card"><img src="assets/images/home/brands/shoppers-stop-logo.png" alt="Shoppers Stop" class="brand-logo" loading="lazy"></div>
                    <div class="home-brand-card"><img src="assets/images/home/brands/akasa-air-logo.png" alt="Akasa Air" class="brand-logo" loading="lazy"></div>
                    <div class="home-brand-card"><img src="assets/images/home/brands/cio-klub-logo.png" alt="CIO Klub" class="brand-logo" loading="lazy"></div>
                    <div class="home-brand-card"><img src="assets/images/home/brands/jk-shahj-logo.png" alt="JK Shahj brand mark" class="brand-logo" loading="lazy"></div>
                    <div class="home-brand-card"><img src="assets/images/home/brands/bupa-logo.png" alt="Bupa logo" class="brand-logo" loading="lazy"></div>
                    <div class="home-brand-card"><img src="assets/images/home/brands/itr-logo.png" alt="ITR logo" class="brand-logo" loading="lazy"></div>
                    <div class="home-brand-card"><img src="assets/images/home/brands/reliance-nippon-logo.png" alt="Reliance Nippon logo" class="brand-logo" loading="lazy"></div>
                </div>
            </div>
        </section>

        <section class="home-section home-testimonials" id="testimonials" aria-label="Testimonials">
            <!-- <div class="home-testimonials-bg" aria-hidden="true">
                <img src="assets/images/home/headshot-effect.png" alt="">
            </div> -->
            <div class="home-shell home-testimonials-inner">
                <div class="testimonials-heading-group">
                    <div class="home-section-header-copy">
                        <p class="home-section-kicker type-caption-lg-bold">Recommendations</p>
                        <h2 class="home-section-title">Vetted by the experts.</h2>
                    </div>
                </div>
                <div class="home-testimonials-grid">
                    <article class="testimonial-card">
                        <p class="testimonial-text type-body-lg-regular">Zubin's work on the designs has been phenomenal. The business greatly appreciated the quality and design, which directly reflected his effort and attention to detail. The teamwork, ownership, and dedication stood out throughout.</p>
                        <div class="testimonial-card-notch" aria-hidden="true"><img src="assets/images/driving-smarter-evidence-based-healthcare-decisions/figma-testimonial-notch-1.svg" alt=""></div>
                        <div class="testimonial-author">
                            <p class="testimonial-author-name type-h6-regular">Rajkiran V.</p>
                            <div class="testimonial-author-meta">
                                <a href="https://www.linkedin.com/in/rajkiran-vajreshwari-1402296" target="_blank" rel="noopener noreferrer" class="testimonial-linkedin-link" aria-label="Rajkiran V. on LinkedIn">
                                    <span class="testimonial-linkedin-icon icon-mask icon-linkedin" aria-hidden="true"></span>
                                </a>
                                <p class="testimonial-author-role type-body-md-inter-regular">Sr Manager at Thermo Fisher</p>
                            </div>
                        </div>
                    </article>
                    <article class="testimonial-card">
                        <p class="testimonial-text type-body-lg-regular">It was a pleasure working with Zubin Charles. He combines strong UX expertise with excellent leadership, keeping teams aligned and delivering thoughtful, user-focused solutions. His collaborative and approachable nature makes him someone I’d gladly recommend to any organization.</p>
                        <div class="testimonial-card-notch" aria-hidden="true"><img src="assets/images/driving-smarter-evidence-based-healthcare-decisions/figma-testimonial-notch-1.svg" alt=""></div>
                        <div class="testimonial-author">
                            <p class="testimonial-author-name type-h6-regular">Jitin Lamba</p>
                            <div class="testimonial-author-meta">
                                <a href="https://www.linkedin.com/in/jitin-lamba-b7290515/?isSelfProfile=false" target="_blank" rel="noopener noreferrer" class="testimonial-linkedin-link" aria-label="Jitin Lamba on LinkedIn">
                                    <span class="testimonial-linkedin-icon icon-mask icon-linkedin" aria-hidden="true"></span>
                                </a>
                                <p class="testimonial-author-role type-body-md-inter-regular">Project Lead - UX at Persistent</p>
                            </div>
                        </div>
                    </article>
                    <article class="testimonial-card">
                        <p class="testimonial-text type-body-lg-regular">Fantastic work, especially within such a short timeline. The team really went above and beyond, and the collaboration was exceptional.</p>
                        <div class="testimonial-card-notch" aria-hidden="true"><img src="assets/images/driving-smarter-evidence-based-healthcare-decisions/figma-testimonial-notch-1.svg" alt=""></div>
                        <div class="testimonial-author">
                            <p class="testimonial-author-name type-h6-regular">Prajakta Roshankhede</p>
                            <div class="testimonial-author-meta">
                                <a href="https://www.linkedin.com/in/prajakta-roshankhede/?isSelfProfile=false" target="_blank" rel="noopener noreferrer" class="testimonial-linkedin-link" aria-label="Prajakta Roshankhede on LinkedIn">
                                    <span class="testimonial-linkedin-icon icon-mask icon-linkedin" aria-hidden="true"></span>
                                </a>
                                <p class="testimonial-author-role type-body-md-inter-regular">Senior Engg Lead at Persistent</p>
                            </div>
                        </div>
                    </article>
                    <article class="testimonial-card">
                        <p class="testimonial-text type-body-lg-regular">Zubin is knowledgeable, extremely hardworking, and brings strong UX expertise into every project. He designed and created our product's UI and UX independently, always pushing for a better end product. He would be an asset to any organization.</p>
                        <div class="testimonial-card-notch" aria-hidden="true"><img src="assets/images/driving-smarter-evidence-based-healthcare-decisions/figma-testimonial-notch-1.svg" alt=""></div>
                        <div class="testimonial-author">
                            <p class="testimonial-author-name type-h6-regular">Shraddha Kelkar</p>
                            <div class="testimonial-author-meta">
                                <a href="https://www.linkedin.com/in/shraddhav/" target="_blank" rel="noopener noreferrer" class="testimonial-linkedin-link" aria-label="Shraddha Kelkar on LinkedIn">
                                    <span class="testimonial-linkedin-icon icon-mask icon-linkedin" aria-hidden="true"></span>
                                </a>
                                <p class="testimonial-author-role type-body-md-inter-regular">Product Owner at Honeywell</p>
                            </div>
                        </div>
                    </article>
                    <article class="testimonial-card">
                        <p class="testimonial-text type-body-lg-regular">Zubin is skilled, creative, and deeply invested in understanding business context before shaping the UX. He brought wireframes to life with clarity and care, and his passion for the craft consistently raised the quality of the outcome.</p>
                        <div class="testimonial-card-notch" aria-hidden="true"><img src="assets/images/driving-smarter-evidence-based-healthcare-decisions/figma-testimonial-notch-1.svg" alt=""></div>
                        <div class="testimonial-author">
                            <p class="testimonial-author-name type-h6-regular">Dhairya Thanawala</p>
                            <div class="testimonial-author-meta">
                                <a href="https://www.linkedin.com/in/dhairyathanawala/" target="_blank" rel="noopener noreferrer" class="testimonial-linkedin-link" aria-label="Dhairya Thanawala on LinkedIn">
                                    <span class="testimonial-linkedin-icon icon-mask icon-linkedin" aria-hidden="true"></span>
                                </a>
                                <p class="testimonial-author-role type-body-md-inter-regular">Sr Business Analyst at Thermo Fisher</p>
                            </div>
                        </div>
                    </article>
                    <button class="testimonial-card-mark" type="button" aria-expanded="false" aria-label="Show more testimonials">
                        <img src="assets/images/quote.svg" alt="">
                        <span class="icon-mask icon-chevron-down" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </section>

        <footer class="footer home-footer" id="contact" role="contentinfo">
            <?php include "include/footer.php"; ?>
        </footer>
    </main>
    <script src="script.js"></script>
</body>
</html>
