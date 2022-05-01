<!DOCTYPE html>
<html lang="ja">

<head>
    <?php get_header(); ?>
    <title>お問い合わせ | TOMOLOGO</title>
</head>

<body>
    <?php wp_head(); ?>
    <?php esc_html(get_template_part('include/header')) ?>
    <main class="main">
        <div class="articles">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
            <?php endwhile;
            endif; ?>
        </div>
    </main>
    <?php esc_html(get_template_part('include/footer')); ?>
    <?php wp_footer(); ?>
</body>

</html>