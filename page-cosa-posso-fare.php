<?php get_header(); ?>

<section class="content" id="content-page">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="container">
        <h2 class="uppercase condensed italic s-huge t-center spacing-b-1"><?php the_title(); ?></h2>

        <?php if( have_rows('sezione_cosa_posso_fare') ): ?>
          <div class="d-flex v-center">
            <?php $i = 0; ?>
            <?php while( have_rows('sezione_cosa_posso_fare') ): the_row(); ?>
              <!-- 3 sezioni cosa posso fare -->
              <?php 
              $title = get_sub_field('titolo_sezione_cpf'); 
              ?>

              <h3 class="button light uppercase <?php if ($i == 0): echo 'active'; endif; ?>"><?= $title; ?></h3>

              <?php $i++; ?>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>

    </article>

  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>


<?php get_footer(); ?>