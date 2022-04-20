<?php
add_theme_support('custom-logo');
add_theme_support('wp-block-styles');
add_action('init', function () {
    add_theme_support('post-thumbnails');
});


//ページネーション
function custom_pagination_html($template)
{
    $template = '
    <nav class="pagination" role="navigation">
        %3$s
    </nav>';
    return $template;
}

add_filter('navigation_markup_template', 'custom_pagination_html');
