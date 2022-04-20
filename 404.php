<!DOCTYPE html>
<html lang="ja">

<head>
    <?php get_header(); ?>
</head>

<body class="font-sans">
    <?php wp_head(); ?>
    <?php esc_html(get_template_part('include/header')) ?>
    <main class="main">
        <h1>お探しのページは見つかりませんでした</h1>
    </main>
    <?php esc_html(get_template_part('include/footer')); ?>
    <?php wp_footer(); ?>
</body>

</html>