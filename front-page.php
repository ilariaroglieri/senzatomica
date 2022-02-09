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
        </div>
      </div>
    <?php endif; ?>

    <div class="intro half-height container t-center d-flex d-column">
      <?php
        $subtitle = get_field('sottotitolo');
        $payoff = get_field('payoff');
        $payoffMobile = get_field('payoff_mobile');
        $sommario = get_field('sommario');
      ?>

      <div class="payoff spacing-t-4 d-flex t-column flex-row">
        <div class="d-one-twelfth t-whole"></div>
        <div class="d-ten-twelfth t-whole">
          <img class="desk-only" src="<?php echo $payoff['url']; ?>" title="<?= $subtitle; ?>" />
          <img class="mob-only" src="<?php echo $payoffMobile['url']; ?>" title="<?= $subtitle; ?>" />
        </div>
        <div class="d-one-twelfth t-whole"></div>
      </div>

      <div class="summary spacing-t-2 d-flex t-column flex-row">
        <div class="d-two-twelfth t-whole"></div>
        <div class="d-eight-twelfth t-whole">
          <span class="sans s-medium-resp"><?= $sommario; ?></span>
        </div>
        <div class="d-two-twelfth t-whole"></div>
      </div>
    </div>

    <!-- immagine -->
    <?php
    $immagini_intro = get_field('immagini_intro');
    if( $immagini_intro ): ?>
      <div class="container intro-images p-relative spacing-b-3">
        <img src="<?php echo esc_url( $immagini_intro['immagine_principale']['url'] ); ?>" alt="<?php echo esc_attr( $immagini_intro['immagine_principale']['alt'] ); ?>" />
        <img class="secondary-image p-absolute hidden" src="<?php echo esc_url( $immagini_intro['immagine_hover']['url'] ); ?>" alt="<?php echo esc_attr( $immagini_intro['immagine_hover']['alt'] ); ?>" />
      </div>
    <?php endif; ?>

    <!-- news IN EVIDENZA -->
    <?php if( have_rows('latest_news') ): ?>
      <div class="news border-top spacing-p-t-1 spacing-p-b-2">  
        <div class="page-title container-fluid marquee">
          <!-- <div class="inner"> -->
            <h1 class="extended uppercase s-medium">Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;Ultime Notizie&nbsp;&nbsp;&nbsp;</h1>
          <!-- </div> -->
        </div>

        <?php include('keywords-stripe.php'); ?>

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
              <h3 class="s-big"><?php the_content(); ?></h3>
            </div>
            <div class="d-one-twelfth t-whole"></div>
          </div>
      </div>
    </div>

    <?php include('dynamic-stripe.php') ?>

    <div class="container-fluid d-flex v-center spacing-b-3 spacing-b-2 border-top border-bottom">
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
              $img = get_sub_field('img_social_sharing'); 
              $color = get_sub_field('colore'); 
              $j++;
            ?>

            <div class="slice-content d-flex d-column" data-slice="slice-<?php echo $j; ?>" style="background-color: <?php echo $color; ?>">
              <img class="close" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/close.svg" alt="close" />
              <h3 class="title sans s-big-resp spacing-b-1"><?= $title; ?></h3>
              <p class="text serif s-big-resp spacing-t-1"><?= $quote; ?></p>
              <p class="mono s-small"><?= $author; ?></p>

              <!-- SOCIAL SHARING-->
              <div class="button-row center d-flex">
                <a class="button black uppercase share-fb" href="#" data-img="<?= $img['url']; ?>" data-quote="<?php echo $quote; echo "\r\n \r\n"; echo $author; ?>">Share on FB</a>
                <a class="button black uppercase share-tw" target="_blank" href="http://twitter.com/share?text=<?php echo $quote; echo "\r\n \r\n"; echo $author; ?>&url=<?php echo get_permalink(); ?>">Share on Twitter</a>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="container-fluid d-flex spacing-p-b-3">
      <div class="container">
        <h3 class="s-big normal italic t-center"><?php the_field('contribute'); ?></h3>
      </div>
    </div>

    <?php include('cpf-link.php'); ?>
    <?php include('perche-link.php'); ?>

    <!-- image banner -->
    <?php 
      $imageBanner = get_field('banner_immagine'); 
      $coloreBanner = get_field('background_banner'); 
    ?>

    <?php if ($imageBanner): ?>
      <div class="container-fluid d-flex spacing-p-t-3 spacing-p-b-3 border-top border-bottom black" style="background-color: <?php echo $coloreBanner; ?>">
        <div class="container">
          <img class="title-svg" src="<?php echo $imageBanner['url']; ?>" alt="<?php echo $imageBanner['title'] ?>"/>
        </div>
      </div>
    <?php endif; ?>


    <!-- coppia di countdown -->
    <?php $showCountdown = get_field('mostra_countdown'); ?>

    <?php if ($showCountdown == 1): ?>
      <div class="countdown container-fluid spacing-t-4 spacing-p-b-1 spacing-p-t-1 border-top border-bottom">
        <div class="flex-row d-flex t-center">
          <div class="d-whole">
            <h3 class="s-big sans italic t-center">Dal primo test nucleare sono passati:</h3>
          </div>
        </div>
      </div>

      <div class="countdown container-fluid">
        <div class="flex-row d-flex t-center wrap">
          <div class="d-three-twelfth-pad m-half-pad spacing-p-b-2 spacing-p-t-2 border-right d-flex d-column border-bottom">
            <span id="FTyears" class="s-huge extended"></span>
            <span class="sans s-regular">Anni</span>
          </div>
          <div class="d-three-twelfth-pad m-half-pad spacing-p-b-2 spacing-p-t-2 border-right d-flex d-column border-bottom">
            <span id="FTdays" class="s-huge normal"></span>
            <span class="sans s-regular">Giorni</span>
          </div>
          <div class="d-two-twelfth-pad m-one-third-pad spacing-p-b-2 spacing-p-t-2 border-right d-flex d-column border-bottom">
            <span id="FThours" class="s-huge condensed"></span>
            <span class="sans s-regular">Ore</span>
          </div>
          <div class="d-two-twelfth-pad m-one-third-pad spacing-p-b-2 spacing-p-t-2 border-right d-flex d-column border-bottom">
            <span id="FTminutes" class="s-huge xcondensed"></span>
            <span class="sans s-regular">Minuti</span>
          </div>
          <div class="d-two-twelfth-pad m-one-third-pad spacing-p-b-2 spacing-p-t-2 d-flex d-column border-bottom">
            <span id="FTseconds" class="s-huge xcondensed"></span>
            <span class="sans s-regular">Secondi</span>
          </div>
        </div>
      </div>

      <div class="countdown container-fluid spacing-p-b-1 spacing-p-t-1 border-bottom">
        <div class="d-whole t-center">
          <span class="s-regular mono">Bomba di Hiroshima</span>
        </div>
      </div>

      <?php 
        $testData = get_field('data_ultimo_test_nucleare');
        $testTime = get_field('ora_ultimo_test_nucleare');
        $testCaption = get_field('didascalia_test');
      ?>
      <div class="countdown container-fluid spacing-p-b-1 spacing-p-t-1 border-bottom">
        <div class="flex-row d-flex t-center">
          <div class="d-whole">
            <h3 class="s-big sans italic t-center">Dall'ultimo test nucleare sono passati:</h3>
          </div>
        </div>
      </div>

      <div class="countdown container-fluid">
        <div class="countdown-test-date d-none"><?= $testData; ?></div>
        <div class="countdown-test-time d-none"><?= $testTime; ?></div>
        <div class="flex-row d-flex t-center wrap">
          <div class="d-three-twelfth-pad m-half-pad spacing-p-b-2 spacing-p-t-2 border-right d-flex d-column border-bottom">
            <span id="years" class="s-huge extended"></span>
            <span class="sans s-regular">Anni</span>
          </div>
          <div class="d-three-twelfth-pad m-half-pad spacing-p-b-2 spacing-p-t-2 border-right d-flex d-column border-bottom">
            <span id="days" class="s-huge normal"></span>
            <span class="sans s-regular">Giorni</span>
          </div>
          <div class="d-two-twelfth-pad m-one-third-pad spacing-p-b-2 spacing-p-t-2 border-right d-flex d-column border-bottom">
            <span id="hours" class="s-huge condensed"></span>
            <span class="sans s-regular">Ore</span>
          </div>
          <div class="d-two-twelfth-pad m-one-third-pad spacing-p-b-2 spacing-p-t-2 border-right d-flex d-column border-bottom">
            <span id="minutes" class="s-huge xcondensed"></span>
            <span class="sans s-regular">Minuti</span>
          </div>
          <div class="d-two-twelfth-pad m-one-third-pad spacing-p-b-2 spacing-p-t-2 d-flex d-column border-bottom">
            <span id="seconds" class="s-huge xcondensed"></span>
            <span class="sans s-regular">Secondi</span>
          </div>
        </div>
      </div>

      <div class="countdown container-fluid spacing-b-4 spacing-p-b-1 spacing-p-t-1 border-bottom">
        <div class="d-whole t-center">
          <span class="s-regular mono"><?= $testCaption; ?></span>
        </div>
      </div>
    <?php endif; ?>

    <div class="container">
      <a class="button uppercase bigger" href="https://www.instagram.com/senzatomica_official/" target="_blank">Instagram</a>
      <?php echo do_shortcode('[instagram-feed num=4 cols=4 showfollow=false]'); ?>
    </div>

    <div class="container spacing-b-3">
      <a class="button uppercase bigger" href="https://www.youtube.com/user/senzatomica" target="_blank">Youtube</a>
      <?php echo do_shortcode('[youtube-feed num=2 showheader=false itemspacing="15px"] '); ?>
    </div>
  
  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>

<?php get_footer(); ?>