<?php get_header(); ?>

<section class="content" id="content-home">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php $images = get_field('immagini_griglia');
    if( $images ): ?>
      <div id="image-grid-container" class="container-fluid p-absolute full-width full-height">
        <div id="image-grid" class="d-grid">
          <?php foreach( $images as $image ): ?>
            <div class="grid-item">
              <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['title']); ?>" />
            </div>
          <?php endforeach; ?>
          <?php foreach( $images as $image ): ?>
            <div class="grid-item">
              <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['title']); ?>" />
            </div>
          <?php endforeach; ?>
          <?php foreach( $images as $image ): ?>
            <div class="grid-item">
              <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['title']); ?>" />
            </div>
          <?php endforeach; ?>
          <?php foreach( $images as $image ): ?>
            <div class="grid-item">
              <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['title']); ?>" />
            </div>
          <?php endforeach; ?>
          <?php foreach( $images as $image ): ?>
            <div class="grid-item">
              <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['title']); ?>" />
            </div>
          <?php endforeach; ?>
          <?php foreach( $images as $image ): ?>
            <div class="grid-item">
              <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['title']); ?>" />
            </div>
          <?php endforeach; ?>
          <?php foreach( $images as $image ): ?>
            <div class="grid-item">
              <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['title']); ?>" />
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <div class="intro half-height container t-center d-flex d-column">
      <?php
        $subtitle = get_field('sottotitolo');
        $payoff = get_field('payoff');
        $sommario = get_field('sommario');
      ?>

      <div class="spacing-t-4 d-flex flex-row">
        <div class="d-one-twelfth t-whole"></div>
        <div class="d-ten-twelfth t-whole">
          <img src="<?php echo $payoff['url']; ?>" title="<?= $subtitle; ?>" />
        </div>
        <div class="d-one-twelfth t-whole"></div>
      </div>

      <div class="summary spacing-t-2 d-flex flex-row">
        <div class="d-two-twelfth t-whole"></div>
        <div class="d-eight-twelfth t-whole">
          <p class="sans s-regular"><?= $sommario; ?></p>
        </div>
        <div class="d-two-twelfth t-whole"></div>
      </div>
    </div>

    <!-- news IN EVIDENZA -->
    <?php if( have_rows('latest_news') ): ?>
      <div class="news border-top spacing-p-t-1 spacing-p-b-2">  
        <div class="page-title container-fluid marquee" data-speed="-2">
          <div class="inner">
            <h1 class="extended uppercase s-medium">Ultime Notizie&nbsp;Ultime Notizie&nbsp;Ultime Notizie&nbsp;Ultime Notizie&nbsp;Ultime Notizie&nbsp;Ultime Notizie&nbsp;Ultime Notizie&nbsp;</h1>
          </div>
        </div>

        <div id="latest_news" class="container t-center posts-flow spacing-p-t-2">
          <?php while( have_rows('latest_news') ) : the_row(); ?>
            <?php 

            $post = get_sub_field('news');
            setup_postdata($post);

            include('loop-single-post.php');

            wp_reset_postdata(); ?>
          <?php endwhile; ?>
        </div>
        <div class="container t-center">
          <a href="<?php echo get_page_link( get_page_by_title( 'Notizie' )->ID ); ?>" class="button bigger uppercase">Vai alle news</a>
        </div>
      </div>
    <?php endif; ?>

    <!-- editor content -->
    <div id="main-claim" class="container-fluid border-top">
      <div class="container wysiwyg serif s-large spacing-t-3 spacing-b-4 paragraph-space">
          <?php the_content(); ?>
      </div>
    </div>

    <?php include('dynamic-stripe.php') ?>
  
  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>

<?php get_footer(); ?>