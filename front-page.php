<?php get_header(); ?>

<section class="content" id="content-home">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php $images = get_field('immagini_griglia');
      if( $images ): ?>
        <div id="image-grid" class="d-grid container-fluid p-absolute full-width full-height">
          <?php foreach( $images as $image ): ?>
            <div class="grid-item">
              <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['title']); ?>" />
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </article>
  
  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>

<?php get_footer(); ?>