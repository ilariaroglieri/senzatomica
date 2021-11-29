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

      <div class="spacing-t-4 d-flex t-column flex-row">
        <div class="d-one-twelfth t-whole"></div>
        <div class="d-ten-twelfth t-whole">
          <img src="<?php echo $payoff['url']; ?>" title="<?= $subtitle; ?>" />
        </div>
        <div class="d-one-twelfth t-whole"></div>
      </div>

      <div class="summary spacing-t-2 d-flex t-column flex-row">
        <div class="d-two-twelfth t-whole"></div>
        <div class="d-eight-twelfth t-whole">
          <span class="sans s-regular"><?= $sommario; ?></span>
        </div>
        <div class="d-two-twelfth t-whole"></div>
      </div>
    </div>

    <!-- news IN EVIDENZA -->
    <?php if( have_rows('latest_news') ): ?>
      <div class="news border-top spacing-p-t-1 spacing-p-b-2">  
        <div class="page-title container-fluid marquee">
          <!-- <div class="inner"> -->
            <h1 class="extended uppercase s-medium">Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;</h1>
          <!-- </div> -->
        </div>

        <div id="latest_news" class="container posts-flow spacing-p-t-3">
          <div class="d-flex flex-row wrap">
            <?php while( have_rows('latest_news') ) : the_row(); ?>
              <?php 

              $post = get_sub_field('news');
              setup_postdata($post);

              include('loop-single-post.php');

              wp_reset_postdata(); ?>
            <?php endwhile; ?>
          </div>
        </div>
        <div class="container t-center">
          <a href="<?php echo get_page_link( get_page_by_title( 'Notizie' )->ID ); ?>" class="button bigger uppercase">Vai alle news</a>
        </div>
      </div>
    <?php endif; ?>

    <!-- editor content -->
    <div id="main-claim" class="container-fluid border-top">
      <div class="container wysiwyg serif s-medium spacing-t-3 spacing-b-4 paragraph-space">
          <div class="d-flex flex-row t-column">
            <div class="d-one-twelfth t-whole"></div>
            <div class="d-ten-twelfth t-whole text-content s-medium wysiwyg paragraph-space spacing-t-3 spacing-b-3">
              <h3 class="s-medium"><?php the_content(); ?></h3>
            </div>
            <div class="d-one-twelfth t-whole"></div>
          </div>
      </div>
    </div>

    <?php include('dynamic-stripe.php') ?>

    <div class="container-fluid d-flex v-center spacing-b-3 border-top border-bottom">
      <?php if( have_rows('magic_wheel') ): ?>
        <div id="question-wheel-container" class="d-whole-pad d-flex center d-column">
          <p class="sans s-medium uppercase spacing-b-2 spacing-p-t-2 ">Gira la ruota</p>

          <div class="p-relative">
            <div class="arrow-left"></div>
            <div id="question-wheel" class="spacing-b-1">
              <?php $i = 0; ?>
              <?php while( have_rows('magic_wheel') ): the_row(); ?>
                <?php
                  $color = get_sub_field('colore'); 
                  $i++;
                ?>

                <div class="slice" id="slice-<?php echo $i; ?>" style="background-color: <?php echo $color; ?>">
                </div>
              <?php endwhile; ?>
            </div>
          </div>

          <p class="button wheel-button uppercase">Leggi una frase</p>
        </div>

        <div class="slice-container d-half-no-pad">
          <?php $j = 0; ?>
          <?php while( have_rows('magic_wheel') ): the_row(); ?>
            <?php
              $title = get_sub_field('titolo_frase'); 
              $quote = get_sub_field('frase'); 
              $author = get_sub_field('firma'); 
              $color = get_sub_field('colore'); 
              $j++;
            ?>

            <div class="slice-content d-flex d-column" data-slice="slice-<?php echo $j; ?>" style="background-color: <?php echo $color; ?>">
              <img class="close" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/close.svg" alt="close" />
              <h3 class="title sans s-medium"><?= $title; ?></h3>
              <p class="text serif s-medium"><?= $quote; ?></p>
              <p class="mono s-small"><?= $author; ?></p>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="container-fluid d-flex spacing-p-b-3">
      <div class="container">
        <h3 class="s-big sans italic t-center"><?php the_field('contribute'); ?></h3>
      </div>
    </div>

    <?php include('cpf-link.php'); ?>
    <?php include('perche-link.php'); ?>

    <div class="countdown container-fluid spacing-b-3 border-top border-bottom">
      <div class="flex-row d-flex t-center">
        <p class="d-whole s-huge condensed" id="years"></p>
      </div>
    </div>
  
  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>

<?php get_footer(); ?>