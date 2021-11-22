<?php get_header(); ?>

<section class="content" id="content-page">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="container">
        <h2 class="uppercase condensed italic s-gigantic t-center spacing-b-1"><?php the_title(); ?></h2>

        <?php if( have_rows('sezione_cosa_posso_fare') ): ?>
          <div class="cpf-selector d-flex v-center">
            <?php $i = 0; ?>
            <?php while( have_rows('sezione_cosa_posso_fare') ): the_row(); ?>
              <!-- titoli 3 sezioni cosa posso fare -->
              <?php 
              $title = get_sub_field('titolo_sezione_cpf'); 
              ?>

              <h3 class="button light uppercase <?php if ($i == 0): echo 'active'; endif; ?>"><?= $title; ?></h3>

              <?php $i++; ?>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>


     <?php if( have_rows('sezione_cosa_posso_fare') ): ?>
        <?php $i = 0; ?>
        <?php while( have_rows('sezione_cosa_posso_fare') ): the_row(); ?>
          <!-- 3 sezioni cosa posso fare -->
          <?php 
          $title = get_sub_field('titolo_sezione_cpf'); 
          ?>

          <div data-section="<?= $title; ?>" class="container-section <?php if ($i == 0): echo 'active'; endif; ?>">

            <?php if( have_rows('tipo_sezione') ): ?>
              <?php while( have_rows('tipo_sezione') ): the_row(); ?>
                <?php 
                  $title = get_sub_field('titolo_sezione'); 
                  $titleSize = get_sub_field('dimensione_titolo'); 
                  $listType = get_sub_field('stile_lista'); 
                  $color = get_sub_field('colore'); 
                ?>

                <div class="container-fluid" style="background-color: <?php echo $color; ?>">
                  <div class="container full-height spacing-p-t-3 spacing-p-b-3">
                    <!-- titolo + lista link -->
                    <?php if( get_row_layout() == 'titolo_lista_link' ): ?>
                      <h4 class="uppercase xcondensed <?php echo $titleSize; ?>"><?= $title; ?></h4>

                    <?php elseif( get_row_layout() == 'contattaci' ): ?>
                      <h4 class="uppercase xcondensed <?php echo $titleSize; ?>"><?= $title; ?></h4>
                    <?php endif; ?>
                  </div>
                </div>

              <?php endwhile; ?>
            <?php endif; ?>

          </div>

          <?php $i++; ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </article>

  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>


<?php get_footer(); ?>