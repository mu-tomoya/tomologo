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


//Twitter投稿
function tweet_post_article($new_status, $old_status, $post) {
    if($new_status === 'publish' && $old_status !== 'publish' && $post->post_type === 'post') {
        $tweet = "ブログを更新しました「{$post->post_title}」\n\n" .get_permalink($post->ID);
        $twitter = new TwitterOAuth(TWITTER_CONSUMER_KEY,TWITTER_CONSUMER_SECRET,TWITTER_ACCESS_TOKEN_KEY,TWITTER_ACCESS_TOKEN_SECRET);
        $twitter->post('statuses/update', ['status' => $tweet]);
    }
}

function filter_rest_endpoints( $endpoints ) {
    /* REST APIで投稿一覧取得を無効にする */
    if ( isset( $endpoints['/wp/v2/posts'] ) ) {
        unset( $endpoints['/wp/v2/posts'] );
    }
    /* REST APIで投稿記事取得（単記事）を無効にする */
    if ( isset( $endpoints['/wp/v2/posts/(?P<id>[d]+)'] ) ) {
        unset( $endpoints['/wp/v2/posts/(?P<id>[d]+)'] );
    }
    /* REST APIでユーザー情報取得を無効にする */
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P<id>[d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P<id>[d]+)'] );
    }
    return $endpoints;
}


/**
 * パンくずリスト
 */

function output_breadcrumb() {
    $home = "<li><a href='".get_bloginfo('url')."'><i class='home fa-solid fa-house'></i>ホーム</a></li>";
    echo '<ul class="breadcrumb">';
    if(is_archive()) {
        $cat = get_queried_object();
        $cat_id = $cat->parent;
        $cat_list = array();
        while($cat_id != 0) {
            $cat = get_category( $cat_id );
            $cat_link = get_category_link( $cat_id );
            array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
            $cat_id = $cat->parent;
        }
        echo $home;
        foreach ($cat_list as $value) {
            echo $value;
        }
        the_archive_title('<li>', '</li>');
    }
    elseif(is_single()) {
        $cat = get_the_category( );
        if(isset($cat[0]->cat_ID)) $cat_id = $cat[0]->cat_ID;
        $cat_list = array();
        while($cat_id!=0) {
            $cat=get_category($cat_id);
            $cat_link = get_category_link($cat_id);
            array_unshift($cat_list,'<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>');
            $cat_id = $cat->parent;
        }
        echo $home;
        foreach($cat_list as $value) {
            echo $value;
        }
        the_title('<li>','</li>');
    } 
    echo "</ul>";
}

add_filter('navigation_markup_template', 'custom_pagination_html');
add_filter('transition_post_status','tweet_post_article',1,3);
add_filter( 'rest_endpoints', 'filter_rest_endpoints', 10, 1 );