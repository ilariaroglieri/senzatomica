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
          <div class="d-ten-twelfth t-whole text-content s-big wysiwyg paragraph-space spacing-t-3 spacing-b-3">
            <?php the_content(); ?>
          </div>
          <div class="d-one-twelfth t-whole"></div>
        </div>
      </div>

      <?php if( have_rows('righe_box_colorati') ): ?>
        <?php while( have_rows('righe_box_colorati') ): the_row(); ?>
            <?php if( get_row_layout() == 'riga_box_singolo' ): ?>
            <?php 
              $svg = get_sub_field('immagine_titolo_svg'); 
              $title = get_sub_field('titolo'); 
              $color = get_sub_field('colore'); 
              $excerpt = get_sub_field('testo_grande'); 
              $text = get_sub_field('testo'); 
              $link = get_sub_field('link'); 
            ?>

            <div class="container-fluid" style="background-color: <?php echo $color; ?>">
              <div class="container spacing-p-t-4 spacing-p-b-4">
                <div class="d-flex flex-row t-column">
                  <div class="d-whole">
                    <img src="<?php echo $svg['url']; ?>" alt="<?php echo $title; ?>"/>
                  </div>
                </div>
              </div>
            </div>

            <?php elseif( get_row_layout() == 'riga_box_doppio' ): ?>
              
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