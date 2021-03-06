<?php get_header();

global $wp_query;
$total_results = $wp_query->found_posts;
?>

<section class="content" id="content-search">
  <?php include('title-stripe.php'); ?>

  <?php if( have_posts() ): ?>
    <div class="posts-flow container-fluid d-flex wrap spacing-p-t-4">
		  <?php while( have_posts() ) : the_post(); ?>
  			<?php include('loop-single-post.php'); ?>
      <?php endwhile;?>
    </div>

  <?php else: ?>
    <div class="container spacing-p-t-4">
      <div class="d-flex spacing-p-t-2 spacing-p-b-4">
        <div class="d-whole">
          <h3 class="s-large condensed spacing-p-t-half spacing-p-b-half"><?php _e ("Nessun risultato trovato per '",'sa_theme'); the_search_query(); _e (" Riprova:'",'sa_theme'); ?></h3>
          <?php include('searchform.php'); ?>
        </div>
      </div>
    </div>  

  <?php endif; ?>

</section>

<?php get_footer(); ?>