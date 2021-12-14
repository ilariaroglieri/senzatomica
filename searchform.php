<div class="flex-row spacing-p-t-2 spacing-p-b-2">
  <div class="d-whole">
    <form class="searchform d-flex" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <input type="text" class="search-field" name="s" placeholder="<?php _e ('Cerca','sa_theme'); ?>">
      <input type="hidden" name="post_type[]" value="post" />     
      <button type="submit" class="btn" value="Cerca"><?php _e ('Cerca','sa_theme'); ?></button>
    </form>
  </div>
</div>