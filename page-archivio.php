<?php get_header(); ?>

<section class="content" id="content-archive-news">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php include('title-stripe.php') ?>

    <?php include('keywords-stripe.php') ?>

    <div class="container">
       <div class="d-flex flex-row t-column">
          <div class="d-one-twelfth t-whole"></div>
          <div class="d-ten-twelfth t-whole text-content spacing-t-3">
            <h3 class="s-medium serif-text italic"><?php the_excerpt(); ?></h3>
          </div>
          <div class="d-one-twelfth t-whole"></div>
        </div>

      <div class="d-flex flex-row t-column">
        <div class="d-one-twelfth t-whole"></div>
        <div class="d-ten-twelfth t-whole text-content serif-text s-regular wysiwyg paragraph-space spacing-t-2 spacing-b-3">
          <?php the_content(); ?>
        </div>
        <div class="d-one-twelfth t-whole"></div>
      </div>
    </div>

  <?php endwhile; ?>

  <?php 
  $cptQuery = new WP_Query( array(
    'post_type'         => 'post',
    'posts_per_page'    => -1,
    'order'             => 'DESC',
    'ignore_sticky_posts' => 1
    ));
  ?>

  <?php include('filters.php') ?>

  <?php if ( $cptQuery->have_posts() ) : ?>
  <div class="posts-flow container-fluid d-flex wrap spacing-p-t-4">
    <?php while ( $cptQuery->have_posts() ) : $cptQuery->the_post(); ?>
      <?php echo 'post'; ?>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>

  <?php else: ?>

    <div class="container">
      <h2>Woops...</h2>
      <p>Sorry, no posts found.</p>
    </div>

  <?php endif; ?>
</section>

<?php get_footer(); ?>