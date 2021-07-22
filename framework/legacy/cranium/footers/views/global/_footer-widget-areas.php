<?php

// =============================================================================
// VIEWS/GLOBAL/_FOOTER-WIDGET-AREAS.PHP
// -----------------------------------------------------------------------------
// Outputs the widget areas for the footer.
// =============================================================================

$n = x_get_option( 'x_footer_widget_areas' );

?>

<footer class="x-colophon above-top support" role="contentinfo">
    <img class="p-absolute a-bottom a-left" src="<?php echo get_stylesheet_directory_uri(); ?>/images/above-footer-1.png" />
    <div class="x-container max width">
      <?php
      $c = 3;
      $i = 0; while ( $i < $c ) : $i++;

        $last = ( $i == $c ) ? ' last' : '';

        echo '<div class="x-column x-md x-1-' . $c . $last . '">';
          dynamic_sidebar( 'ups-sidebar-above-footer-' . $i );
        echo '</div>';

      endwhile;

      ?>
    </div>
    <img class="p-absolute a-top a-right" src="<?php echo get_stylesheet_directory_uri(); ?>/images/above-footer-2.png" style="right: -45px;" />
    <img class="p-absolute a-bottom a-right" src="<?php echo get_stylesheet_directory_uri(); ?>/images/above-footer-3.png" />
</footer>        

<?php if ( $n != 0 ) : ?>

  <footer class="x-colophon top" role="contentinfo">
    <div class="x-container max width">

      <?php

      $i = 0; while ( $i < $n ) : $i++;

        $last = ( $i == $n ) ? ' last' : '';

        echo '<div class="x-column x-md x-1-' . $n . $last . '">';
          dynamic_sidebar( 'footer-' . $i );
        echo '</div>';

      endwhile;

      ?>

    </div>
  </footer>

<?php endif; ?>