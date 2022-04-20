<article class="card" <?php post_class('article-list'); ?>>
  <a href="<?php the_permalink(); ?>">
    <div class="img-wrap">
      <!--画像を追加-->
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail(
          'post-thumbnail',
          array(
            'class' => "card-thumbnail"
          )
        ); ?>
      <?php else : ?>
        <img class="no-image card-thumbnail" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/no-image.gif" alt="no-img" />
      <?php endif; ?>
  </a>
  <!--カテゴリー-->
  <?php
  $category = get_the_category();
  $slug = $category[0]->slug;
  $cat_name = $category[0]->cat_name;

  ?>
  <a href="<?php echo home_url() . "/category/" . esc_html($slug) ?>">
    <h2 class="card-category slug-<?php echo esc_html($slug); ?>">
      <?php echo esc_html($cat_name) ?>
    </h2>
  </a>
  <a href="<?php the_permalink() ?>">
    <!--タイトル-->
    <h2 class="card--title"><?php echo esc_html(wp_trim_words(get_the_title(), 20, '...')); ?></h2>
    <!--投稿日を表示-->
    <span class="article-date">
      <i class="far fa-clock"></i>
      <time datetime="<?php echo esc_html(get_the_date('Y-m-d')); ?>">
        <?php echo esc_html(get_the_date()); ?>
      </time>
    </span>
  </a>
</article>