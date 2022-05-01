<!DOCTYPE html>
<html lang="ja">

<head>
    <?php get_header(); ?>
    <title>TOMOLOGO</title>
    <meta name=”twitter:title” content="TOMOLOGO" />
    <meta name="twitter:image" content="<?php bloginfo('template_url')?>/images/logo.png"/>
</head>

<body>
    <?php wp_head(); ?>
    <?php esc_html(get_template_part('include/header')) ?>
    <main class="main">
        <div class="articles">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php esc_html(get_template_part('loop-content')); ?>
            <?php endwhile;
            endif; ?>
        </div>
        <?php the_posts_pagination(
            array(
                'mid_size' => 1,
                'prev_next' => true,
                'prev_text' => '&lt;',
                'next_text' => '&gt',
                'type' => 'list'
            )
        ) ?>
    </main>
    <?php esc_html(get_template_part('include/footer')); ?>
    <?php wp_footer(); ?>
</body>

</html>