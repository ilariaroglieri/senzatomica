<?php get_header(); ?>

<?php 
$cptQuery = new WP_Query( array(
  'post_type'         => 'post',
  'posts_per_page'    => -1,
  'order'             => 'DESC',
  ));
?>

<section class="content" id="content-archive-page">
  <div class="page-title container-fluid">
    <h1 class="extended uppercase s-medium"> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?></h1>
    <h1 class="extended uppercase s-medium"> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?> <?php the_title(); ?></h1>
  </div>

  <?php if( have_rows('parole_chiave') ): ?>
    <div class="page-keywords container-fluid">
      <h3 class="normal uppercase s-huge">
        <?php while( have_rows('parole_chiave') ) : the_row(); ?>
          <?php $keyword = get_sub_field('parola_chiave'); ?>

          <span><?php echo $keyword; ?></span>
        <?php endwhile; ?>
      </h3>
      <h3 class="normal uppercase s-huge">
        <?php while( have_rows('parole_chiave') ) : the_row(); ?>
          <?php $keyword = get_sub_field('parola_chiave'); ?>

          <span><?php echo $keyword; ?></span>
        <?php endwhile; ?>
      </h3>
    </div>
  <?php endif; ?>

  <?php if ( $cptQuery->have_posts() ) : ?>
    <div class="container d-flex wrap">
      <?php while ( $cptQuery->have_posts() ) : $cptQuery->the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('d-one-third'); ?>>
          <?php if ( has_post_thumbnail() ) : ?>  
            <a href="<?php the_permalink() ?>">          
              <?php the_post_thumbnail(); ?>
            </a>
          <?php endif; ?>
          <h2 class="entry-title"><a class="serif s-medium" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        </article>
    
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