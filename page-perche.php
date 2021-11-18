<?php get_header(); ?>

<section class="content" id="content-page">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="container">
        <h2 class="uppercase extended italic s-huge t-center spacing-b-1"><?php the_title(); ?></h2>
        <?php if ( has_post_thumbnail() ) : ?>  
          <?php the_post_thumbnail(); ?>
        <?php endif; ?>

        <div class="d-flex flex-row t-column">
          <div class="d-one-twelfth t-whole"></div>
          <div class="d-ten-twelfth t-whole text-content spacing-t-3">
            <h3 class="s-big normal italic"><?php the_excerpt(); ?></h3>
          </div>
          <div class="d-one-twelfth t-whole"></div>
        </div>
        

        <div class="d-flex flex-row t-column">
          <div class="d-one-twelfth t-whole"></div>
          <div class="d-ten-twelfth t-whole text-content s-medium wysiwyg paragraph-space spacing-t-3 spacing-b-3">
            <?php the_content(); ?>
          </div>
          <div class="d-one-twelfth t-whole"></div>
        </div>
      </div>

      <?php if( have_rows('righe_box_colorati') ): ?>
        <?php while( have_rows('righe_box_colorati') ): the_row(); ?>
          <!-- single BOX -->
          <?php if( get_row_layout() == 'riga_box_singolo' ): ?>
            <?php 
              $svg = get_sub_field('immagine_titolo_svg'); 
              $title = get_sub_field('titolo'); 
              $color = get_sub_field('colore'); 
              $excerpt = get_sub_field('testo_grande'); 
              $text = get_sub_field('testo'); 
              $link = get_sub_field('link'); 
            ?>

            <div class="colored-box one p-relative">
              <div class="title-container full-height container-fluid t-center" data-role="single" style="background-color: <?php echo $color; ?>">
                <div class="container full-height spacing-p-t-4 spacing-p-b-2">
                  <img class="title-svg" src="<?php echo $svg['url']; ?>" alt="<?php echo $title; ?>"/>
                  <p class="button black biggest mono">+</p>
                </div>
              </div>

              <div class="text-container hidden p-absolute container-fluid" data-role="single" style="background-color: <?php echo $color; ?>">
                <div class="container spacing-p-t-4 spacing-p-b-2" data-role="single">
                  <div class="d-flex flex-row t-column centered">
                    <div class="d-whole">
                      <div class="text-content d-flex start d-column hidden p-relative">
                        <img class="close" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/close.svg" alt="close" />
                        <h4 class="condensed s-large uppercase spacing-b-2"><?= $title; ?></h4>
                        <h5 class="excerpt serif-text s-medium spacing-b-2"><?= $excerpt; ?></h5>
                        <div class="wysiwyg paragraph-space s-regular serif-text"><?= $text; ?></div>

                        <?php if ($link): ?>
                          <a class="button black" href="<?php echo $link['url']; ?>">Leggi di più</a>
                        <?php endif; ?>

                        <div class="more mob-only" style="background-color: <?php echo $color; ?>"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- MULTIPLE BOXES -->
            <?php elseif( get_row_layout() == 'riga_box_doppio' ): ?>
              <?php if ( have_rows('box_singolo') ): ?>
                <div class="container-fluid colored-box multi p-relative">
                  <?php $i = 0; ?>
                  <?php while( have_rows('box_singolo') ): the_row(); ?>
                    <?php 
                      $i++;
                      $color = get_sub_field('colore');
                    ?>

                    <div class="background half" data-role="<?php if ($i == 1): ?>first<?php else: ?>last<?php endif; ?>" style="background-color: <?php echo $color; ?>">
                    </div>
                  <?php endwhile; ?>

                    <div class="container">
                      <div class="d-flex flex-row m-column">
                        <?php $j = 0; ?>
                        <?php while( have_rows('box_singolo') ): the_row(); ?>
                          <?php 
                            $j++;
                            $svg = get_sub_field('immagine_titolo_svg'); 
                            $title = get_sub_field('titolo'); 
                            $color = get_sub_field('colore'); 
                            $excerpt = get_sub_field('testo_grande'); 
                            $text = get_sub_field('testo'); 
                            $link = get_sub_field('link'); 
                          ?>
                          <div class="inner-box d-flex d-half m-whole-pad p-relative" data-color="<?php echo $color; ?>">
                            <div class="title-container t-center spacing-p-t-4 spacing-p-b-2" data-role="<?php if ($j == 1): ?>first<?php else: ?>last<?php endif; ?>" >
                              <img class="title-svg"src="<?php echo $svg['url']; ?>" alt="<?php echo $title; ?>"/>
                              <p class="button black biggest mono">+</p>
                            </div>

                            <div class="text-container" data-role="<?php if ($j == 1): ?>first<?php else: ?>last<?php endif; ?>">
                              <div class="text-content p-relative d-flex start d-column hidden spacing-t-4 spacing-p-b-2">
                                <img class="close" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/close.svg" alt="close" />
                                <h4 class="condensed s-large uppercase spacing-b-2"><?= $title; ?></h4>
                                <h5 class="excerpt serif-text s-medium spacing-b-2"><?= $excerpt; ?></h5>
                                <div class="wysiwyg paragraph-space s-regular serif-text"><?= $text; ?></div>

                                <?php if ($link): ?>
                                  <a class="button black" href="<?php echo $link['url']; ?>">Leggi di più</a>
                                <?php endif; ?>

                                <div class="more mob-only" style="background-color: <?php echo $color; ?>"></div>
                              </div>
                            </div>
                          </div>
                        <?php endwhile; ?>
                      </div>
                    </div>
                  
                </div>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      
      
    </article>

  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>


<?php get_footer(); ?>