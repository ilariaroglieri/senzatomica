<?php get_header(); ?>

<section class="content" id="content-single">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
      <a href="<?php echo get_page_link( get_page_by_title( 'Notizie' )->ID ); ?>" class="button uppercase">Torna alle Notizie</a>
      <h2 class="serif s-big spacing-b-1"><?php the_title(); ?></h2>
      <p class="caption spacing-b-2"><?php the_date(); ?></p>
      <?php if ( has_post_thumbnail() ) : ?>  
        <?php the_post_thumbnail(); ?>
      <?php endif; ?>

      <div class="d-flex flex-row t-column">
        <div class="d-one-twelfth t-whole"></div>
        <div class="d-ten-twelfth t-whole text-content s-regular wysiwyg paragraph-space spacing-t-3 spacing-b-3">
          <?php the_content(); ?>
        </div>
        <div class="d-one-twelfth t-whole"></div>
      </div>
      
      <div class="navigation d-flex space-between">
          <span class="navi uppercase previous"><?php previous_post_link( '%link','Precedente', false ); ?></span>
          <span class="navi uppercase next"><?php next_post_link( '%link','Successiva', false ); ?></span>
      </div>
    </article>

  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>


<?php get_footer(); ?>