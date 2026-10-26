<?php
$next_project_href = $next_project_href ?? "../index2.html#product-design";
$next_project_name = $next_project_name ?? "Brewing a better retail experience for coffee lovers.";
?>
<section class="project-up-next" aria-label="Next project">
    <a class="project-up-next-link" href="<?php echo htmlspecialchars($next_project_href, ENT_QUOTES, 'UTF-8'); ?>">
        <span class="project-up-next-label">
            <span>Next</span>
            <span class="project-up-next-icon icon-mask icon-chevron-right" aria-hidden="true"></span>
        </span>
        <span class="project-up-next-name"><?php echo htmlspecialchars($next_project_name, ENT_QUOTES, 'UTF-8'); ?></span>
    </a>
</section>
