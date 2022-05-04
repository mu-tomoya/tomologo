<!DOCTYPE html>
<html lang="ja">

<head>
    <?php get_header(); ?> 
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <meta name="twitter:title" content="<?php the_title(); ?> | TOMOLOGO" />
        <meta name="twitter:image" content="<?php has_post_thumbnail()?the_post_thumbnail_url('large'):bloginfo('template_url').'/images/no-image.gif' ?>" />
        <title><?php the_title();?> | TOMOLOGO</title>
    <?php endwhile;  endif; ?>   
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/single.css">
</head>

<body>
    <?php wp_head(); ?>
    <?php get_template_part('include/header') ?>
    <article class="single-article">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php output_breadcrumb();?>
                <time class="post-date">公開日：<?php the_time('Y/m/d');?></time>
                <h1 class="single-title"><?php the_title(); ?></h1>
                <?php if (has_post_thumbnail()) : ?>
                    <img class="single-thumbnail" src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
                <?php else : ?>
                    <img class="single-no-image" src="<?php bloginfo('template_url') ?>/images/no-image.gif" alt="no-img" />
                <?php endif; ?>
                <div class="single-content"><?php the_content(); ?></div>
        <?php endwhile; endif; ?>
    </article>
    <?php get_template_part('include/footer') ?>
    <?php wp_footer(); ?>
</body>

</html>