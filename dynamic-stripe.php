<!-- striscia dinamica -->
<?php if (have_rows('striscia_dinamica')):
  $counter = 0; ?>
    <div class="dynamic-stripe container-fluid spacing-b-3" data-speed="-2.5">
      <div class="inner">
        <?php while( have_rows('striscia_dinamica') ) : the_row(); ?>
          <?php 
          $counter++;
          $text = get_sub_field('testo_striscia');
          $link = get_sub_field('link_alla_pagina');
          ?>

          
          <a class="no-border sans uppercase s-regular" href="<?php if ($link): echo esc_url($link['url']); else: echo '#'; endif; ?>" aria-label="Link to page: <?php echo $text; ?>" aria-describedby="<?php echo $text; ?>">
            <?php echo $text; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </a>
        <?php endwhile; ?>
      </div>
      <div class="inner">
        <?php while( have_rows('striscia_dinamica') ) : the_row(); ?>
          <?php 
          $counter++;
          $text = get_sub_field('testo_striscia');
          $link = get_sub_field('link_alla_pagina');
          ?>

          
          <a class="no-border sans uppercase s-regular" href="<?php if ($link): echo esc_url($link['url']); else: echo '#'; endif; ?>" aria-label="Link to page: <?php echo $text; ?>" aria-describedby="<?php echo $text; ?>">
            <?php echo $text; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </a>
        <?php endwhile; ?>
      </div>
    </div>
<?php endif; ?>