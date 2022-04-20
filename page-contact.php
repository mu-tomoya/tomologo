<!DOCTYPE html>
<html lang="ja">

<head>
    <?php get_header(); ?>
</head>

<body>
    <?php wp_head(); ?>
    <?php esc_html(get_template_part('include/header')) ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
    <?php endwhile;
    endif; ?>
    <?php esc_html(get_template_part('include/footer')); ?>
    <?php wp_footer(); ?>
</body>

</html>