<?php get_header(); ?>

<?php 
$cptQuery = new WP_Query( array(
  'post_type'         => 'post',
  'posts_per_page'    => 20,
  'order'             => 'DESC',
  'ignore_sticky_posts' => 1
  ));
?>

<section class="content" id="content-archive-page">
  <div class="page-title container-fluid marquee" data-speed="-2">
    <div class="inner">
      <h1 class="extended uppercase s-medium"><?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;<?php the_title(); ?>&nbsp;</h1>
    </div>
  </div>

  <?php if( have_rows('parole_chiave') ): ?>
    <div class="page-keywords container-fluid marquee" data-speed="-3">
      <div class="inner">
        <h3 class="normal uppercase s-huge">
          <?php while( have_rows('parole_chiave') ) : the_row(); ?>
            <?php $keyword = get_sub_field('parola_chiave'); ?>

            <?php echo $keyword; ?>&nbsp;
          <?php endwhile; ?>
        </h3>
      </div>
      
    </div>
  <?php endif; ?>

  <?php if ( $cptQuery->have_posts() ) : ?>
    <?php $i = 0; ?>
    <div class="posts-flow container d-grid spacing-p-t-4">
      <?php while ( $cptQuery->have_posts() ) : $cptQuery->the_post(); ?>
        <?php $classes = get_post_class($post); ?>

          <!-- <?php if ($i == 0) : ?>
            <div class="three-row">
          <?php endif; ?>

              <?php if (in_array('category-documenti-storici', $classes)) : ?>
                <?php echo 'sono speciale'; ?>
              <?php endif; ?> -->

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( has_post_thumbnail() ) : ?>  
                  <a class="img-link d-block no-border spacing-b-1" href="<?php the_permalink() ?>">          
                    <?php the_post_thumbnail(); ?>
                  </a>
                <?php endif; ?>
                <h2 class="entry-title"><a class="serif s-medium" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <a class="button no-border" href="<?php the_permalink(); ?>"><?php _e ("Leggi l'articolo", 'senzatomica_theme'); ?></a>
              </article>

          <!-- <?php $i++; ?>
          <?php if ($i == 3) : $i = 0; ?>
            </div>
          <?php endif; ?>
 -->
       
    
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