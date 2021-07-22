<?php

// =============================================================================
// VIEWS/INTEGRITY/WP-HEADER.PHP
// -----------------------------------------------------------------------------
// Header output for Integrity.
// =============================================================================

if ( is_front_page() ) :
    //$masthead_class = x_masthead_class();
    $masthead_class = 'masthead masthead-stacked';
else :
    $masthead_class = 'masthead masthead-inline';
endif;

?>

<?php x_get_view( 'global', '_header' ); ?>

  <?php x_get_view( 'global', '_slider-above' ); ?>

  <header class="<?php echo $masthead_class; ?>" role="banner">
    <?php x_get_view( 'global', '_topbar' ); ?>
    <?php x_get_view( 'global', '_navbar' ); ?>
    <?php x_get_view( 'integrity', '_breadcrumbs' ); ?>
  </header>

  <?php x_get_view( 'global', '_slider-below' ); ?>
  <?php x_get_view( 'integrity', '_landmark-header' ); ?>