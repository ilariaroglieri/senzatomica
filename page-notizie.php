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
  <div class="page-title container-fluid marquee" data-speed="-2">
    <div class="inner">
      <h1 class="extended uppercase s-medium"><?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;</h1>
    </div>
    <div class="inner">
      <h1 class="extended uppercase s-medium"><?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;</h1>
    </div>
  </div>

  <?php if( have_rows('parole_chiave') ): ?>
    <div class="page-keywords container-fluid marquee spacing-b-2" data-speed="-3">
      <div class="inner">
        <h3 class="normal uppercase s-huge variable-type">
          <?php while( have_rows('parole_chiave') ) : the_row(); ?>
            <?php $keyword = get_sub_field('parola_chiave'); ?>

            <span><?php echo $keyword; ?>&nbsp;</span>
          <?php endwhile; ?>
        </h3>
      </div>
      <div class="inner">
        <h3 class="normal uppercase s-huge variable-type">
          <?php while( have_rows('parole_chiave') ) : the_row(); ?>
            <?php $keyword = get_sub_field('parola_chiave'); ?>

            <span><?php echo $keyword; ?>&nbsp;</span>
          <?php endwhile; ?>
        </h3>
      </div>
      
    </div>
  <?php endif; ?>

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