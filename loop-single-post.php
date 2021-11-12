<article id="post-<?php the_ID(); ?>" <?php post_class('d-three-twelfth t-whole'); ?> data-group=''>
  <?php if ( has_post_thumbnail() ) : ?>  
    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
    <a class="img-link d-block no-border spacing-b-1" href="<?php the_permalink() ?>" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">          
    </a>
  <?php endif; ?>
  <h2 class="entry-title"><a class="serif s-medium" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <a class="button no-border" href="<?php the_permalink(); ?>"><?php _e ("Leggi l'articolo", 'senzatomica_theme'); ?></a>
</article>