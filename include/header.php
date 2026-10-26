<div class="header-inner">
    <?php
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
    $currentDirectory = basename(dirname($_SERVER['SCRIPT_NAME']));
    $isProductDesignPage = $currentPage === 'product_design.php';
    $isProjectCasePage = $currentDirectory === 'projects';
    $isHomePage = !$isProductDesignPage && !$isProjectCasePage;
    ?>
    <a href="../#hero" class="logo home-brand" aria-label="Zubin Charles home">
        <img class="home-brand-mark" src="../assets/images/home/logo-circle-menu.svg" alt="Zubin Charles logo">
    </a>
    <nav class="nav-menu" aria-label="Main navigation">
        <a href="../#hero" class="nav-item<?= $isHomePage ? ' active' : '' ?>"<?= $isHomePage ? ' aria-current="page"' : '' ?>>Home</a>
        <a href="../product_design.php" class="nav-item<?= $isProductDesignPage ? ' active' : '' ?>"<?= $isProductDesignPage ? ' aria-current="page"' : '' ?>>Product&nbsp; Design</a>
        <!-- <a href="#contact" class="nav-item">Contact</a> -->
    </nav>
</div>