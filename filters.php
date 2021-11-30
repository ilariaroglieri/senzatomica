<div class="filters d-flex t-column flex-row spacing-p-t-2">
  <div class="filter d-flex d-four-twelfth t-whole spacing-p-b-2">
    <span class="button bigger uppercase"><?php _e ('Data','sa_theme'); ?></span>
    <div id="date-select" class="custom-select select-date d-flex">

      <select name="date" id="year">
        <option value="0"><?php _e ('Tutti','sa_theme'); ?></option>
        <?php wp_get_archives( array( 'type' => 'yearly', 'format' => 'option', 'show_post_count' => 0 ) ); ?>
      </select>

    </div>
  </div>
  

  <div class="filter d-flex d-four-twelfth t-whole spacing-p-b-2">
    <span class="button bigger uppercase"><?php _e ('Tipologia','sa_theme'); ?></span>
    <div id="theme-select" class="custom-select select-cat d-flex">
      <?php $themes = get_terms( array(
        'taxonomy' => 'post_contents_type',
        'hide_empty' => true,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      ) );

      if ( $themes ) : ?>
        <select name="post_contents_type" id="post_contents_type">
          <option value="0"><?php _e ('Tutti','sa_theme'); ?></option>
          <?php foreach( $themes as $theme ) : ?>
            <option value="<?php echo $theme->slug; ?>" id="term-id-<?php echo $theme->term_id; ?>"><?php echo $theme->name; ?></option>
          <?php endforeach; ?>
        </select>
      <?php endif;
      wp_reset_postdata(); ?>
    </div>
  </div>

  <div class="filter d-flex d-four-twelfth t-whole spacing-p-b-2">
    <span class="button bigger uppercase"><?php _e ('Tema','sa_theme'); ?></span>
    
    <div id="category-select" class="custom-select select-cat d-flex">
      <?php $cats = get_terms( array(
        'taxonomy' => 'category',
        'exclude' => array(1),
        'hide_empty' => true,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      ) );

      if ( $cats ) : ?>
        <select name="category" id="category">
          <option value="0"><?php _e ('Tutti','sa_theme'); ?></option>
          <?php foreach( $cats as $cat ) : ?>
            <option value="<?php echo $cat->slug; ?>" id="term-id-<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></option>
          <?php endforeach; ?>
        </select>
      <?php endif;
      wp_reset_postdata(); ?>
    </div>
  </div>

</div>