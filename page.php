<?php get_header(); ?>

<section class="content" id="content-single">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="container-fluid">
        <?php include('title-stripe.php') ?>

        <?php include('keywords-stripe.php') ?>
      </div>

      <div class="container">
        <?php if ( has_post_thumbnail() ) : ?>  
          <?php the_post_thumbnail(); ?>
        <?php endif; ?>

        <div class="d-flex flex-row t-column">
          <div class="d-one-twelfth t-whole"></div>
          <div class="d-ten-twelfth t-whole text-content s-medium wysiwyg paragraph-space spacing-t-3 spacing-b-3">
            <?php the_content(); ?>
          </div>
          <div class="d-one-twelfth t-whole"></div>
        </div>
      </div>

      <!-- contatti page -->
      <?php if( have_rows('gruppo_senzatomica') ): ?>
        <div class="container spacing-b-3">
          <?php while( have_rows('gruppo_senzatomica') ): the_row(); 
            $groupName = get_sub_field('nome_gruppo'); ?>
            <div class="d-flex flex-row">
              <div class="d-whole spacing-b-1">
                <h3 class="condensed uppercase s-medium"><?= $groupName; ?></h3>
              </div>
            </div>
            <div class="d-flex flex-row wrap">

              <?php if( have_rows('membro_senzatomica') ): while( have_rows('membro_senzatomica') ): the_row(); ?>
                <?php
                $img = get_sub_field('ritratto');
                $name = get_sub_field('nome');
                $role = get_sub_field('qualifica');
                ?>

                <div class="staff_sa border d-three-twelfth t-half m-whole spacing-b-3">
                  <img class="spacing-b-1" src="<?php echo $img['url']; ?>" alt="<?php echo $name; ?>" />
                  <h4 class="sans s-small"><?= $name; ?></h4>
                  <p class="sans s-small"><?= $role; ?></p>
                </div>

              <?php endwhile; endif; ?>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

    </article>

  <?php endwhile; else: ?>

    <h2>Woops...</h2>
    <p>Sorry, no posts found.</p>

  <?php endif; ?>

</section>


<?php get_footer(); ?>