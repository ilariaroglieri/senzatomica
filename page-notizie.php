<?php get_header(); ?>

<?php 
$cptQuery = new WP_Query( array(
  'post_type'         => 'post',
  'posts_per_page'    => -1,
  'order'             => 'DESC',
  'ignore_sticky_posts' => 1
  ));
?>

<section class="content" id="content-archive-news">

  <?php include('title-stripe.php') ?>

  <?php include('keywords-stripe.php') ?>

  <?php include('dynamic-stripe.php') ?>

  <?php if ( $cptQuery->have_posts() ) : ?>
    <?php $i = 0; ?>
    <div class="posts-flow container-fluid d-flex wrap spacing-p-t-4">
      <?php while ( $cptQuery->have_posts() ) : $cptQuery->the_post(); ?>


        <?php include('loop-single-post.php'); ?>
     
    
      <?php endwhile; ?>
    </div>

  <?php else: ?>

    <div class="container">
      <h2>Woops...</h2>
      <p>Sorry, no posts found.</p>
    </div>

  <?php endif; ?>
</section>

<?php get_footer(); ?>