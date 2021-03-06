<?php

// =============================================================================
// VIEWS/INTEGRITY/WP-FOOTER.PHP
// -----------------------------------------------------------------------------
// Footer output for Integrity.
// =============================================================================

?>

  <?php x_get_view( 'global', '_footer', 'widget-areas' ); ?>

  <?php if ( x_get_option( 'x_footer_bottom_display' ) == '1' ) : ?>

    <footer class="x-colophon bottom" role="contentinfo">
      <div class="x-container max width">

        <?php if ( x_get_option( 'x_footer_menu_display' ) == '1' ) : ?>
          <?php x_get_view( 'global', '_nav', 'footer' ); ?>
        <?php endif; ?>
        <?php if ( x_get_option( 'x_footer_social_display' ) == '1' ) : ?>
          <?php x_social_global(); ?>
        <?php endif; ?>

        <?php if ( x_get_option( 'x_footer_content_display' ) == '1' ) : ?>
          <div class="x-colophon-content">
            <?php echo apply_filters( 'cs_expand_content', x_get_option( 'x_footer_content' ) ); ?>
            <span class="pull-left">&copy; <?php echo date("Y"); ?>. All Rights Reserved. </span>
            <span class="pull-right">Designed and Developed by <a href="https://jadealombro.com/" target="_blank">Jade</a></span>
          </div>
        <?php endif; ?>

      </div>
    </footer>

  <?php endif; ?>

<?php x_get_view( 'global', '_footer' ); ?>