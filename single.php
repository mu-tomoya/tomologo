<!DOCTYPE html>
<html lang="ja">

<head>
    <?php get_header(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/single.css">
</head>

<body>
    <?php wp_head(); ?>
    <?php get_template_part('include/header') ?>
    <article class="single-article">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php if (has_post_thumbnail()) : ?>
                    <img class="single-thumbnail" src="<?php the_post_thumbnail_url('large'); ?>" alt="サムネイル">
                <?php else : ?>
                    <img class="single-no-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/no-image.gif" alt="no-img" />
                <?php endif; ?>
                <h1 class="single-title"><?php the_title(); ?></h1>
                <div class="single-content"><?php the_content(); ?></div>
        <?php endwhile;
        endif; ?>
    </article>
    <?php get_template_part('include/footer') ?>
    <?php wp_footer(); ?>
</body>

</html>