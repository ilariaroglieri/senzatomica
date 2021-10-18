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

    <article id="post-<?php the_ID(); ?>" <?php post_class('container t-center d-flex d-column'); ?>>
      <?php
        $subtitle = get_field('sottotitolo');
        $sommario = get_field('sommario');
      ?>

      <div class="variable-type spacing-t-2 d-flex flex-row">
        <div class="d-one-twelfth t-whole"></div>
        <div class="d-ten-twelfth t-whole">
          <h2 class="normal s-large uppercase"><?= $subtitle; ?></h2>
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
    </article>
  
  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>

<?php get_footer(); ?>