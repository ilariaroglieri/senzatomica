<?php get_header();
$term = get_queried_object(); ?>

<section class="content" id="content-archive">

  <?php include('title-stripe.php') ?>

  <?php include('keywords-stripe.php') ?>

  <?php include('dynamic-stripe.php') ?>

  <?php $excerpt = get_field('testo_in_evidenza', $term); ?>
  <div class="container">
    <?php if ($excerpt): ?>
      <div class="d-flex flex-row t-column">
        <div class="d-one-twelfth t-whole"></div>
        <div class="d-ten-twelfth t-whole text-content spacing-b-2">
          <h3 class="s-big normal italic"><?php echo $excerpt; ?></h3>
        </div>
        <div class="d-one-twelfth t-whole"></div>
      </div>
    <?php endif; ?>

    <div class="d-flex flex-row t-column">
      <div class="d-one-twelfth t-whole"></div>
      <div class="d-ten-twelfth t-whole text-content s-medium wysiwyg wysiwyg paragraph-space">
        <?php echo category_description(); ?>
      </div>
      <div class="d-one-twelfth t-whole"></div>
    </div>
  </div>

  <?php if ( have_posts() ) : ?>
    <?php $i = 0; ?>
    <div class="posts-flow container-fluid d-flex wrap spacing-p-t-4">
      <?php while ( have_posts() ) : the_post(); ?>
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