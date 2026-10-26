<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elevating the retail shopping experience - project case study by Zubin Charles.">
    <title>Elevating the retail shopping experience | Zubin Charles</title>
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
    <main data-barba="container" data-barba-namespace="project-retail-shopping-experience" tabindex="-1">
        <?php
        $previous_project_href = "./the-digital-runway-to-indias-youngest-airline.php";
        $previous_project_name = "The digital runway to India’s youngest airline.";
        $next_project_href = "./streamlining-service-operations-for-field-engineers.php";
        $next_project_name = "Streamlining Service Operations For Field Engineers.";
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
                    <h1 class="page-title">Elevating the retail shopping experience.</h1>
                    <div class="project-case-cover">
                        <img src="../assets/images/elevating-the-retail-shopping-experience/project-cover.png" alt="E-commerce shopping experience showcased across four mobile devices">
                    </div>
                </div>

                <div class="project-case-meta-grid" aria-label="Project metadata">
                    <div class="read-only">
                        <p class="read-only__title">Domain</p>
                        <p class="read-only__value">E-Commerce</p>
                    </div>
                    <div class="read-only">
                        <p class="read-only__title">Year</p>
                        <p class="read-only__value">2021</p>
                    </div>
                    <div class="read-only">
                        <p class="read-only__title">Timeline</p>
                        <p class="read-only__value">4 Weeks</p>
                    </div>
                    <div class="read-only">
                        <p class="read-only__title">Role</p>
                        <p class="read-only__value">Senior UI/UX Designer</p>
                    </div>
                    <div class="read-only">
                        <p class="read-only__title">Team</p>
                        <p class="read-only__value">2 Designers</p>
                    </div>
                    <div class="read-only">
                        <p class="read-only__title">Tool</p>
                        <p class="read-only__value">Miro and Figma Design</p>
                    </div>
                    <div class="read-only project-case-meta-item-wide">
                        <p class="read-only__title">Activities</p>
                        <p class="read-only__value">Workshop, User Research, Heuristic Analysis, Journey Mapping, IA, Wireframing, Visual Designs and Prototyping.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-section project-case-process" aria-label="Desig n process">
            <div class="home-shell project-case-process-shell">
                <div class="project-case-process-graphic" aria-hidden="true">
                    <?php include "../assets/images/process-four-leaf.svg"; ?>
                </div>
                <div class="project-case-process-content">
                    <div class="project-section-copy copy-left copy-light">
                        <h2>The process</h2>
                    </div>
                    <ol class="project-case-process-list">
                        <li>
                            <p class="project-case-process-step">01</p>
                            <div>
                                <h2 class="type-body-xl-regular">Discover</h2>
                                <p class="type-body-lg-regular">User interviews, empathy maps, persona creation, product research</p>
                            </div>
                        </li>
                        <li>
                            <p class="project-case-process-step">02</p>
                            <div>
                                <h2 class="type-body-xl-regular">Define</h2>
                                <p class="type-body-lg-regular">Defining the key problem statement and hypotheses to test.</p>
                            </div>
                        </li>
                        <li>
                            <p class="project-case-process-step">03</p>
                            <div>
                                <h2 class="type-body-xl-regular">Ideate</h2>
                                <p class="type-body-lg-regular">Brainstorming ideas across the key verticals identified.</p>
                            </div>
                        </li>
                        <li>
                            <p class="project-case-process-step">04</p>
                            <div>
                                <h2 class="type-body-xl-regular">Prototype</h2>
                                <p class="type-body-lg-regular">Prototyping and presenting to the key stakeholders and re-iterating based on feedback.</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </section>

        <section class="home-section project-case-problem project-case-dark" aria-label="Problem statement">
            <div class="home-shell project-case-problem-shell">
                <div class="project-case-problem-intro">
                    <div class="project-case-problem-graphic" aria-hidden="true">
                        <?php include "../assets/images/problem-statement.svg"; ?>
                    </div>
                    <div class="project-section-copy copy-left copy-dark">
                        <h2>The challenge</h2>
                        <p>To <b><i>onboard new customers</i></b> and <b><i>engage existing customers</i></b> by creating a connected digital experience that facilitates discovery of products, shopping seamlessly across stores and e-commerce and enjoying the privileges of being a premium membership holder.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-section project-case-workshop" aria-label="Workshop">
            <div class="home-shell project-case-workshop-shell">
                <h2 class="project-case-workshop-title">Workshop</h2>
                <div class="project-case-workshop-day">
                    <div class="project-case-workshop-intro">
                        <h3 class="project-case-workshop-day-title">
                            <span>Day</span>
                            <span>01</span>
                        </h3>
                        <p class="project-case-workshop-description">Team introductions / Review workshop objectives / Product intent &amp; vision / Business needs / User personas &amp; interviews / Strategic direction</p>
                    </div>
                    <div class="project-case-workshop-images">
                        <figure>
                            <img src="../assets/images/elevating-the-retail-shopping-experience/day-01-01.png" alt="Product intent and vision workshop board with six experience goals">
                        </figure>
                        <figure>
                            <img src="../assets/images/elevating-the-retail-shopping-experience/day-01-02.png" alt="Workshop affinity map grouping customer opportunities and experience ideas">
                        </figure>
                        <figure>
                            <img src="../assets/images/elevating-the-retail-shopping-experience/day-01-03.png" alt="Brand perception map of desired shopping experience attributes">
                        </figure>
                        <figure>
                            <img src="../assets/images/elevating-the-retail-shopping-experience/day-01-04.png" alt="Customer says, thinks, does, and feels empathy map">
                        </figure>
                    </div>
                </div>
                <div class="project-case-workshop-day">
                    <div class="project-case-workshop-intro">
                        <h3 class="project-case-workshop-day-title">
                            <span>Day</span>
                            <span>02</span>
                        </h3>
                        <p class="project-case-workshop-description">Mapping strengths and weaknesses / Affinity mapping, sailboat framework for team alignment</p>
                    </div>
                    <div class="project-case-workshop-images project-case-workshop-images-three">
                        <figure>
                            <img src="../assets/images/elevating-the-retail-shopping-experience/day-02-01.png" alt="Workshop findings highlighting incomplete product information on product detail pages">
                        </figure>
                        <figure>
                            <img src="../assets/images/elevating-the-retail-shopping-experience/day-02-02.png" alt="Workshop boards covering the loyalty program and brand proposition">
                        </figure>
                        <figure>
                            <img src="../assets/images/elevating-the-retail-shopping-experience/day-02-03.png" alt="Sailboat framework mapping workshop strengths, weaknesses, and opportunities">
                        </figure>
                    </div>
                </div>
                <div class="project-case-workshop-day">
                    <div class="project-case-workshop-intro">
                        <h3 class="project-case-workshop-day-title">
                            <span>Day</span>
                            <span>03</span>
                        </h3>
                        <p class="project-case-workshop-description">Competitor benchmarking / Brainstorming using HMWs</p>
                    </div>
                    <div class="project-case-workshop-images">
                        <figure>
                            <img src="../assets/images/elevating-the-retail-shopping-experience/day-03-01.png" alt="Competitor benchmarking across fashion and retail brands">
                        </figure>
                        <figure>
                            <img src="../assets/images/elevating-the-retail-shopping-experience/day-03-02.png" alt="Brainstorming workshop board with how-might-we ideas">
                        </figure>
                    </div>
                </div>
                <div class="project-case-workshop-day">
                    <div class="project-case-workshop-intro">
                        <h3 class="project-case-workshop-day-title">
                            <span>Day</span>
                            <span>04</span>
                        </h3>
                        <p class="project-case-workshop-description">Feature prioritization matrix / Roadmap ahead</p>
                    </div>
                    <div class="project-case-workshop-images project-case-workshop-images-single">
                        <figure>
                            <img src="../assets/images/elevating-the-retail-shopping-experience/day-04-01.png" alt="Feature prioritization matrix plotting proposed retail features by impact and effort">
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-section project-case-personas" aria-labelledby="project-case-personas-title">
            <div class="home-shell project-case-personas-shell">
                <div class="project-case-personas-header">
                    <h2 class="project-case-personas-title" id="project-case-personas-title">Personas</h2>
                    <div class="project-case-personas-metrics-list" role="list">
                        <div class="project-case-personas-metric" role="listitem">
                            <p class="metric-number project-case-personas-metric-value">770</p>
                            <p class="type-body-xl-regular project-case-personas-metric-label">Minutes</p>
                        </div>
                        <div class="project-case-personas-metric" role="listitem">
                            <p class="metric-number project-case-personas-metric-value">13</p>
                            <p class="type-body-xl-regular project-case-personas-metric-label">Participants</p>
                        </div>
                        <div class="project-case-personas-metric" role="listitem">
                            <p class="metric-number project-case-personas-metric-value">8</p>
                            <p class="type-body-xl-regular project-case-personas-metric-label">Topics</p>
                        </div>
                        <div class="project-case-personas-metric" role="listitem">
                            <p class="metric-number project-case-personas-metric-value">5</p>
                            <p class="type-body-xl-regular project-case-personas-metric-label">Personas</p>
                        </div>
                        <div class="project-case-personas-metric" role="listitem">
                            <p class="metric-number project-case-personas-metric-value">70+</p>
                            <p class="type-body-xl-regular project-case-personas-metric-label">Insights</p>
                        </div>
                    </div>
                </div>
                <?php
                $personas = [
                    [
                        "image" => "persona-01.png",
                        "alt" => "Woman browsing on her phone at a cafe",
                        "age" => "Female, 30–40 yrs old",
                        "location" => "First Citizen User, Tier 1 City",
                        "traits" => ["Socially connected", "Fashionable", "Value driven"],
                    ],
                    [
                        "image" => "persona-02.png",
                        "alt" => "Man shopping online at home beside delivery packages",
                        "age" => "Male, 35–40 yrs old",
                        "location" => "First Citizen User, Tier 1 City",
                        "traits" => ["High spender", "Nostalgia driven", "Long time customer"],
                    ],
                    [
                        "image" => "persona-03.png",
                        "alt" => "Woman browsing clothes in a store",
                        "age" => "Female, 40–45 yrs old",
                        "location" => "Non First Citizen User, Tier 1 City",
                        "traits" => ["Extrovert", "Style expert"],
                    ],
                    [
                        "image" => "persona-04.png",
                        "alt" => "Woman browsing on her phone in a cafe",
                        "age" => "Female, 25–30 yrs old",
                        "location" => "First Citizen User, Tier 2 City",
                        "traits" => ["Deal seeker", "Outgoing"],
                    ],
                    [
                        "image" => "persona-05.png",
                        "alt" => "Man seated at a retail counter with delivery packages",
                        "age" => "Male, 45-55 years old",
                        "location" => "Non First Citizen User, Tier 2 City",
                        "traits" => ["Frequent shopper", "Former FC member", "Brand loyalist."],
                    ],
                ];
                ?>
                <div class="project-case-personas-cards">
                    <?php foreach ($personas as $persona): ?>
                        <article class="project-case-persona-card">
                            <img
                                class="project-case-persona-image"
                                src="../assets/images/elevating-the-retail-shopping-experience/<?= htmlspecialchars($persona["image"], ENT_QUOTES, "UTF-8") ?>"
                                alt="<?= htmlspecialchars($persona["alt"], ENT_QUOTES, "UTF-8") ?>"
                                loading="lazy"
                            >
                            <div class="project-case-persona-details">
                                <p class="project-case-persona-age"><?= htmlspecialchars($persona["age"], ENT_QUOTES, "UTF-8") ?></p>
                                <p class="project-case-persona-location"><?= htmlspecialchars($persona["location"], ENT_QUOTES, "UTF-8") ?></p>
                                <ul class="project-case-persona-traits" aria-label="Persona traits">
                                    <?php foreach ($persona["traits"] as $trait): ?>
                                        <li><?= htmlspecialchars($trait, ENT_QUOTES, "UTF-8") ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="home-section project-case-wireframes" aria-labelledby="project-case-wireframes-title">
            <div class="home-shell project-case-wireframes-shell">
                <div class="project-case-wireframes-header">
                    <h2 class="project-case-wireframes-title" id="project-case-wireframes-title">Wireframes</h2>
                    <p class="type-body-xl-regular project-case-wireframes-description">
                        We showcased wireframes built for critical screens with an intent to communicate the intended experience and get a buy-in.
                    </p>
                </div>
                <figure class="project-case-wireframes-visual">
                    <img
                        src="../assets/images/elevating-the-retail-shopping-experience/wireframes.png"
                        alt="Six retail app wireframes showing product discovery, product details, category navigation, and customer loyalty screens"
                        width="2400"
                        height="1872"
                        loading="lazy"
                    >
                </figure>
            </div>
        </section>

        <section class="home-section project-case-dark project-case-visual-designs" aria-label="Visual designs">
            <div class="home-shell project-case-visual-shell">
                <div class="project-section-copy copy-left copy-light">
                    <h2>Visual Designs</h2>
                    <p>A glimpse into some of the key screens.</p>
                </div>
                <div class="project-case-visual-main">
                    <img src="../assets/images/elevating-the-retail-shopping-experience/visual-design-main.png" alt="Key screens from the retail shopping experience app">
                </div>
            </div>
        </section>

        <section class="home-section project-case-onboarding" aria-labelledby="project-case-onboarding-title">
            <div class="home-shell project-case-onboarding-shell">
                <div class="project-case-onboarding-header">
                    <h2 class="project-case-onboarding-title" id="project-case-onboarding-title">Onboarding for the masses</h2>
                    <p class="type-body-xl-regular project-case-onboarding-description">
                        Getting to know customers as early as possible to onboard them onto a more rewarding experience.
                    </p>
                </div>
                <div class="project-case-onboarding-grid">
                    <figure class="project-case-onboarding-screen">
                        <img
                            src="../assets/images/elevating-the-retail-shopping-experience/onboarding-01.png"
                            alt="Onboarding screen asking who users usually shop for"
                            width="384"
                            height="745"
                            loading="lazy"
                        >
                    </figure>
                    <figure class="project-case-onboarding-screen">
                        <img
                            src="../assets/images/elevating-the-retail-shopping-experience/onboarding-02.png"
                            alt="Onboarding screen asking what users like shopping for"
                            width="384"
                            height="745"
                            loading="lazy"
                        >
                    </figure>
                    <figure class="project-case-onboarding-screen">
                        <img
                            src="../assets/images/elevating-the-retail-shopping-experience/onboarding-03.png"
                            alt="Onboarding screen asking users which brands they like"
                            width="384"
                            height="745"
                            loading="lazy"
                        >
                    </figure>
                </div>
            </div>
        </section>

        <section class="home-section project-case-segregation" aria-labelledby="project-case-segregation-title">
            <div class="home-shell project-case-segregation-shell">
                <figure class="project-case-segregation-art">
                    <img
                        src="../assets/images/elevating-the-retail-shopping-experience/clear-segregation.png"
                        alt="Retail app navigation screen with customer account details and clearly separated store categories and stories"
                        width="1080"
                        height="2093"
                        loading="lazy"
                    >
                </figure>
                <div class="project-case-segregation-copy">
                    <h2 class="project-case-segregation-title" id="project-case-segregation-title">Clear segregation for better discovery.</h2>
                    <p>Dedicated sections to entice different types of buyers.</p>
                </div>
            </div>
        </section>

        <section class="home-section project-case-key-screens" aria-label="Retail screen showcases">
            <div class="home-shell project-case-key-screens-shell">
                <article class="project-case-key-screen-card project-case-key-screen-card-featured" aria-labelledby="project-case-key-screen-luxe-title">
                    <img
                        class="project-case-key-screen-backdrop"
                        src="../assets/images/elevating-the-retail-shopping-experience/luxe.png"
                        alt=""
                        aria-hidden="true"
                        loading="lazy"
                    >
                    <div class="project-case-key-screen-content">
                        <p class="type-body-xl-regular project-case-key-screen-title" id="project-case-key-screen-luxe-title">
                            Putting the extra into the ordinary with LUXE
                        </p>
                        <figure class="project-case-key-screen-image">
                            <img
                                src="../assets/images/elevating-the-retail-shopping-experience/luxe.png"
                                alt="LUXE retail shopping app screen"
                                width="984"
                                height="1967"
                                loading="lazy"
                            >
                        </figure>
                    </div>
                </article>
                <article class="project-case-key-screen-card" aria-labelledby="project-case-key-screen-bargains-title">
                    <img
                        class="project-case-key-screen-backdrop"
                        src="../assets/images/elevating-the-retail-shopping-experience/bargains.png"
                        alt=""
                        aria-hidden="true"
                        loading="lazy"
                    >
                    <div class="project-case-key-screen-content">
                        <p class="type-body-xl-regular project-case-key-screen-title" id="project-case-key-screen-bargains-title">
                            BARGA%NS store for value seeking shopaholics
                        </p>
                        <figure class="project-case-key-screen-image">
                            <img
                                src="../assets/images/elevating-the-retail-shopping-experience/bargains.png"
                                alt="BARGA%NS retail app screen featuring value shopping and discounted products"
                                width="984"
                                height="1967"
                                loading="lazy"
                            >
                        </figure>
                    </div>
                </article>
                <article class="project-case-key-screen-card" aria-labelledby="project-case-key-screen-home-title">
                    <img
                        class="project-case-key-screen-backdrop"
                        src="../assets/images/elevating-the-retail-shopping-experience/ss-home.png"
                        alt=""
                        aria-hidden="true"
                        loading="lazy"
                    >
                    <div class="project-case-key-screen-content">
                        <p class="type-body-xl-regular project-case-key-screen-title" id="project-case-key-screen-home-title">
                            Give your home a personality of its own
                        </p>
                        <figure class="project-case-key-screen-image">
                            <img
                                src="../assets/images/elevating-the-retail-shopping-experience/ss-home.png"
                                alt="Retail app home screen featuring home furnishings and shopping categories"
                                width="984"
                                height="1967"
                                loading="lazy"
                            >
                        </figure>
                    </div>
                </article>
                <article class="project-case-key-screen-card" aria-labelledby="project-case-key-screen-inhouse-title">
                    <img
                        class="project-case-key-screen-backdrop"
                        src="../assets/images/elevating-the-retail-shopping-experience/ss-inhouse.png"
                        alt=""
                        aria-hidden="true"
                        loading="lazy"
                    >
                    <div class="project-case-key-screen-content">
                        <p class="type-body-xl-regular project-case-key-screen-title" id="project-case-key-screen-inhouse-title">
                            Dedicated showcase for in-house brands
                        </p>
                        <figure class="project-case-key-screen-image">
                            <img
                                src="../assets/images/elevating-the-retail-shopping-experience/ss-inhouse.png"
                                alt="Retail app screen showcasing in-house fashion brands and collections"
                                width="984"
                                height="1967"
                                loading="lazy"
                            >
                        </figure>
                    </div>
                </article>
            </div>
        </section>

        <section class="home-section project-case-loyalty" aria-labelledby="project-case-loyalty-title">
            <div class="home-shell project-case-loyalty-shell">
                <header class="project-case-loyalty-header">
                    <div class="project-case-loyalty-intro">
                        <h2 class="project-case-loyalty-title" id="project-case-loyalty-title">
                            A first class First Citizen experience.
                        </h2>
                        <p class="type-body-xl-regular project-case-loyalty-subtitle">
                            Taking the First Citizen experience up a notch.
                        </p>
                    </div>
                    <ul class="project-case-loyalty-tiers" aria-label="First Citizen membership tiers">
                        <li><img src="../assets/images/elevating-the-retail-shopping-experience/crown-gold.svg" alt="Gold loyalty tier" width="52" height="52"></li>
                        <li><img src="../assets/images/elevating-the-retail-shopping-experience/crown-black.svg" alt="Black loyalty tier" width="52" height="52"></li>
                        <li><img src="../assets/images/elevating-the-retail-shopping-experience/crown-platinum.svg" alt="Platinum loyalty tier" width="52" height="52"></li>
                        <li><img src="../assets/images/elevating-the-retail-shopping-experience/crown-silver.svg" alt="Silver loyalty tier" width="52" height="52"></li>
                        <li><img src="../assets/images/elevating-the-retail-shopping-experience/crown-blue.svg" alt="Blue loyalty tier" width="52" height="52"></li>
                    </ul>
                </header>
                <div class="project-case-loyalty-features">
                    <article class="project-case-loyalty-feature">
                        <p class="type-body-xl-regular project-case-loyalty-description">
                            View your points at a glance. Notifications for exclusive sales.
                        </p>
                        <figure class="project-case-loyalty-screen">
                            <img
                                src="../assets/images/elevating-the-retail-shopping-experience/fc-01.png"
                                alt="First Citizen membership screen showing loyalty points, account details, and reminders"
                                width="888"
                                height="1836"
                                loading="lazy"
                            >
                        </figure>
                    </article>
                    <article class="project-case-loyalty-feature">
                        <p class="type-body-xl-regular project-case-loyalty-description">
                            Personalised experiences like birthday offers and live events.
                        </p>
                        <figure class="project-case-loyalty-screen project-case-loyalty-screen-compact">
                            <img
                                src="../assets/images/elevating-the-retail-shopping-experience/fc-02.png"
                                alt="First Citizen app screen featuring birthday celebrations and member experiences"
                                width="920"
                                height="1902"
                                loading="lazy"
                            >
                        </figure>
                    </article>
                    <article class="project-case-loyalty-feature">
                        <p class="type-body-xl-regular project-case-loyalty-description">
                            Exclusive offers and vouchers for loyalty members.
                        </p>
                        <figure class="project-case-loyalty-screen">
                            <img
                                src="../assets/images/elevating-the-retail-shopping-experience/fc-03.png"
                                alt="First Citizen app screen featuring exclusive beauty, brand, entertainment, and category offers"
                                width="888"
                                height="1836"
                                loading="lazy"
                            >
                        </figure>
                    </article>
                    <article class="project-case-loyalty-feature">
                        <p class="type-body-xl-regular project-case-loyalty-description">
                            Early access to brand launches.
                        </p>
                        <figure class="project-case-loyalty-screen">
                            <img
                                src="../assets/images/elevating-the-retail-shopping-experience/fc-04.png"
                                alt="First Citizen app screen showing early access to a Gucci brand offer for Gold members"
                                width="888"
                                height="1836"
                                loading="lazy"
                            >
                        </figure>
                    </article>
                </div>
            </div>
        </section>

        <section class="home-section project-case-mobile-gallery" aria-labelledby="project-case-mobile-gallery-title">
            <div class="home-shell project-case-mobile-gallery-shell">
                <header class="project-case-mobile-gallery-header">
                    <h2 class="project-case-mobile-gallery-title" id="project-case-mobile-gallery-title">
                        Personalised for everyone.
                    </h2>
                    <p class="type-body-xl-regular project-case-mobile-gallery-description">
                        Combining insightful data with engaging copy to personalise the experience for returning as well as new users.
                    </p>
                </header>
            </div>
            <figure class="project-case-mobile-gallery-art">
                <img
                    src="../assets/images/elevating-the-retail-shopping-experience/mobile-screens.png"
                    alt="A stylized collage of mobile retail app screens showing shopping, loyalty, and personalised features"
                    width="2880"
                    height="6452"
                    loading="lazy"
                >
            </figure>
        </section>

        <?php include "../include/project-up-next.php"; ?>

        <footer class="footer home-footer" id="contact" role="contentinfo">
            <?php include "../include/footer.php"; ?>
        </footer>
    </main>
    <script src="../script.js"></script>
</body>
</html>
