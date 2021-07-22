<?php

// =============================================================================
// VIEWS/GLOBAL/_TOPBAR.PHP
// -----------------------------------------------------------------------------
// Includes topbar output.
// =============================================================================

?>

<?php if ( x_get_option( 'x_topbar_display' ) == '1' ) : ?>

  <div class="x-topbar">
    <div class="x-topbar-inner x-container max width">
      <?php if ( x_get_option( 'x_topbar_content' ) != '' ) : ?>
      <p class="p-info"><?php echo x_get_option( 'x_topbar_content' ); ?></p>
      <?php endif; ?>
      <ul class="x-nav x-hide-sm x-hide-xs x-hide-md">
        <li class="menu-item current-menu-parent x-menu-item x-menu-item-woocommerce">
            <a href="<?php echo x_get_cart_link(); ?>" class="x-btn-navbar-woocommerce">
                <?php echo (x_woocommerce_navbar_cart()); ?>
            </a>
        </li>
      </ul>      
      <?php x_social_global(); ?>
    </div>
  </div>

<?php endif; ?>

<?php echo do_shortcode('[t4b-ticker]'); ?>