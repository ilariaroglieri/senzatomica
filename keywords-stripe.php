<?php if (is_category()): 
  $term = get_queried_object();
  if( have_rows('parole_chiave', $term) ): ?>
    <div class="page-keywords container-fluid spacing-b-2">
      <h3 class="normal uppercase s-huge variable-type">
        <?php while( have_rows('parole_chiave', $term) ) : the_row(); ?>
          <?php $keyword = get_sub_field('parola_chiave'); ?>

          <span><?php echo $keyword; ?>&nbsp;</span>
        <?php endwhile; ?>
        <?php while( have_rows('parole_chiave', $term) ) : the_row(); ?>
          <?php $keyword = get_sub_field('parola_chiave'); ?>

          <span><?php echo $keyword; ?>&nbsp;</span>
        <?php endwhile; ?>
      </h3>
    </div>
  <?php endif; ?>
<?php else: ?>
  <?php if( have_rows('parole_chiave') ): ?>
    <div class="page-keywords container-fluid spacing-b-2">
      <h3 class="normal uppercase s-huge variable-type">
        <?php while( have_rows('parole_chiave') ) : the_row(); ?>
          <?php $keyword = get_sub_field('parola_chiave'); ?>

          <span><?php echo $keyword; ?>&nbsp;</span>
        <?php endwhile; ?>
        <?php while( have_rows('parole_chiave') ) : the_row(); ?>
          <?php $keyword = get_sub_field('parola_chiave'); ?>

          <span><?php echo $keyword; ?>&nbsp;</span>
        <?php endwhile; ?>
      </h3>
    </div>
  <?php endif; ?>
<?php endif; ?>