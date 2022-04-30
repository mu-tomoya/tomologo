<?php
require_once( __DIR__ . '/vendor/autoload.php' );
use Abraham\TwitterOAuth\TwitterOAuth;


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
//REST API 無効化
function disable_rest_api() {
    return new WP_Error( 'disabled', __( 'REST API is disabled.' ), array( 'status' => rest_authorization_required_code() ) );
}

//Twitter投稿
function tweet_post_article($new_status, $old_status, $post) {
    if($new_status === 'publish' && $old_status !== 'publish' && $post->post_type === 'post') {
        $tweet = "ブログを更新しました「{$post->post_title}」\n\n" .get_permalink($post->ID);
        $twitter = new TwitterOAuth(TWITTER_CONSUMER_KEY,TWITTER_CONSUMER_SECRET,TWITTER_ACCESS_TOKEN_KEY,TWITTER_ACCESS_TOKEN_SECRET);
        $twitter->post('statuses/update', ['status' => $tweet]);
    }
}

add_filter('navigation_markup_template', 'custom_pagination_html');
//add_filter( 'rest_authentication_errors', 'disable_rest_api' );
add_filter('transition_post_status','tweet_post_article',1,3);