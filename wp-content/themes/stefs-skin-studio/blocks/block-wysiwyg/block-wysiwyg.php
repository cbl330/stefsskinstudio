<?php
// Fetch the WYSIWYG content from ACF
$content = get_field('custom_wysiwyg');
?>

<section class="wysiwyg-block py-5">
    <div class="container">
        <?php if ($content): ?>
            <div class="wysiwyg-content">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .wysiwyg-block {
    background-color: #fff;
    color: #333;
    line-height: 1.8;
}

.wysiwyg-block h1,
.wysiwyg-block h2,
.wysiwyg-block h3 {
    color: #333;
    margin-bottom: 1.5rem;
    font-weight: bold;
}

.wysiwyg-block p {
    margin-bottom: 1rem;
}

.wysiwyg-block ul,
.wysiwyg-block ol {
    margin-bottom: 1.5rem;
    padding-left: 1.5rem;
}

.wysiwyg-block ul li,
.wysiwyg-block ol li {
    margin-bottom: 0.5rem;
}

.wysiwyg-block a {
    color: #e96a69;
    text-decoration: underline;
}

.wysiwyg-block a:hover {
    color: #d95858;
    text-decoration: none;
}
</style>