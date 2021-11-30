<?php get_header(); ?>

<section class="content" id="content-archive-news">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php include('title-stripe.php') ?>

    <?php include('keywords-stripe.php') ?>

    <div class="container">
       <div class="d-flex flex-row t-column">
          <div class="d-one-twelfth t-whole"></div>
          <div class="d-ten-twelfth t-whole text-content spacing-t-3">
            <h3 class="s-big normal italic"><?php the_excerpt(); ?></h3>
          </div>
          <div class="d-one-twelfth t-whole"></div>
        </div>

      <div class="d-flex flex-row t-column">
        <div class="d-one-twelfth t-whole"></div>
        <div class="d-ten-twelfth t-whole text-content s-medium wysiwyg wysiwyg paragraph-space spacing-t-2 spacing-b-3">
          <?php the_content(); ?>
        </div>
        <div class="d-one-twelfth t-whole"></div>
      </div>
    </div>

  <?php endwhile; ?>


  <div class="container">
    <?php include('filters.php') ?>
  </div>

  <div class="posts-flow hidden container-fluid d-flex wrap spacing-p-t-4">

  </div>

  <?php else: ?>

    <div class="container">
      <h2>Woops...</h2>
      <p>Sorry, no posts found.</p>
    </div>

  <?php endif; ?>
</section>

<?php get_footer(); ?>