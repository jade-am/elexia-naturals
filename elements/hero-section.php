<?php

// Values
// =============================================================================

$values = cs_compose_values(
    array(

    ),
    'omega'
);
  

// Style
// =============================================================================

function elexia_element_style_animated_images() {

    ob_start();
    ?>

            
    <?php return ob_get_clean();

}

// Builder Setup
// =============================================================================

function elexia_element_builder_setup_animated_images() {

    // Individual Controls
    // -------------------

    $control_animated_images_sortable = array(
        'type'       => 'sortable',
        'label'      => __( 'Add Images', '__elexia__' ),
        'group'      => 'elexia-animated-images:setup'
    );



    $control_animated_images_options = array(
        'type'  => 'group',
        'label' => __( 'Setup', '__elexia__' ),
        'group' => 'elexia-animated-images:setup',
        'controls' => array(

        )
    );
    
    // Compose Controls
    // -------------------


    return cs_compose_controls(
        array(
            'controls' => array(
                $control_animated_images_sortable,
                //$control_animated_images_options       
            ),
            'control_nav' => array(
                'elexia-animated-images'              => __( 'Images', '__elexia__' ),
                //'elexia-animated-images:setup'        => __( 'Setup', '__elexia__' )
        
            )
        ),
        cs_partial_controls( 'omega' )

    );

}



// Render
// =============================================================================

function elexia_element_render_animated_images( $data ) {

    extract( $data );

    $atts_elexia_hero = cs_atts( array(
        'class'         => x_attr_class( array( $style_id, 'elexia-element', 'elexia-hero-section', $class, $_display_on ) ),
        'id'            => $id
      ) );

    foreach ( $data['_modules'] as $key => $image ) {
        $images[] = x_element_decorate( $image, $data );
    }

    $data['images'] = $images;

    //echo '<pre>';
    //    print_r($data['images']);
    //echo '</pre>';

    ob_start(); 
    
    ?>

        <div <?php echo $atts_elexia_hero; ?>>

            <?php foreach ( $data['images'] as $key => $image ) : ?>
                <?php
                    $style = '';
                    $position = $image['_elexia_image_position'];

                    if( $position === 'absolute' ) {
                        $style = 'style="position: absolute; top: ' .$image['_elexia_image_vertical_p'] .'; left: '  .$image['_elexia_image_horizontal_p'] .';"';
                    }
                ?>

                <img src="<?php echo cs_resolve_image_source( $image['_elexia_image_file'] ); ?>" <?php echo $style != '' ? $style : ''; ?>/>

            <?php endforeach; ?>

        </div>

    <?php return ob_get_clean();

}

  



// Define Element
// =============================================================================

$data = array(
    'title'     => __( 'Hero Section', '__elexia__' ),
    'values'    => $values,
    'builder'   => 'elexia_element_builder_setup_animated_images',
    'style'     => 'elexia_element_style_animated_images',
    'render'    => 'elexia_element_render_animated_images',
    'options'   => array(
      'default_children' => array(
        array( '_type' => 'hero-section-image-source' ),
        array( '_type' => 'hero-section-image-source' ),
        array( '_type' => 'hero-section-image-source' ),
      ),
      'add_new_element' => array( '_type' => 'hero-section-image-source' ),
      'valid_children' => array( 'hero-section-image-source' ),
      'render_children' => false
    )
);

// Register Module
// =============================================================================

cs_register_element( 'elexia-animated-images', $data );