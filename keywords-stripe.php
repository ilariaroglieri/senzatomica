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
  </div>
<?php endif; ?>