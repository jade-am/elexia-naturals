<?php

$values = cs_compose_values(
    array(
        'image_source_file'     => cs_value( '', 'all', false ),
        'image_source_retina'   => cs_value( false, 'all', false ),
        'image_source_width'    => cs_value( '', 'all', false ),
        'image_source_height'   => cs_value( '', 'all', false ),
        'image_source_has_link' => cs_value( false, 'all', false ),
        'image_source_has_info' => cs_value( false, 'all', false ),
        'image_source_alt'      => cs_value( '', 'all', false ),

        '_elexia_image_file'          => cs_value( '', 'all', false ),
        
        '_elexia_image_position'      => cs_value( 'relative', 'all', true ),
        '_elexia_image_vertical_p'    => cs_value( '', 'all', true ),
        '_elexia_image_horizontal_p'  => cs_value( '', 'all', true ),

    ),
    'omega'
);

function elexia_image_source_style() {
    
    ob_start();
    ?>

        .$_el {
            position: $_elexia_image_position;

            @if $_elexia_image_horizontal_p != '' {
                left: $_elexia_image_horizontal_p;
            }

            @if $_elexia_image_vertical_p != '' {
                top: $_elexia_image_vertical_p;
            }
        }

        .$_el img {
            width: $_elexia_image_width;

            @if $_elexia_image_rotate != '' {
                transform: rotate( $_elexia_image_rotate );
            }
        }



    <?php
    
    return ob_get_clean();

}

function elexia_element_builder_setup_image_source() {

    $control_nav = array(
        'hero-section-image-source'           => __( 'Elexia Image', '__elexia__' ),
        //'hero-section-image-source:setup'     => __( 'Setup', '__elexia__' ),
        //'hero-section-image-source:position'  => __( 'Position', '__elexia__' ),
        //'hero-section-image-source:animations'=> __( 'Animations', '__elexia__' ),
    );

    $control_setup_image = array(
        'type'  => 'group',
        'label' => __( 'Image Setup', '__elexia__' ),
        'group' => 'hero-section-image-source:setup',
        'controls' => array(
            array(
                'key'  => '_elexia_image_file',
                'type'  => 'image-source',
                'label' => __( 'Source', '__elexia__' ),
            ),
        )
    );

    $control_image_position = array(
        'type'  => 'group',
        'label' => __( 'Position Settings', '__elexia__' ),
        'group' => 'hero-section-image-source:position',        
        'controls' => array(
            array(
                'key'   => '_elexia_image_position',
                'type'  => 'choose',
                'label' => __( 'Position', '__elexia__' ),
                'options' => array(
                  'choices' => array(
                    array( 'value' => 'relative',  'label' => __( 'Relative', '__elexia__' ) ),
                    array( 'value' => 'absolute',  'label' => __( 'Absolute', '__elexia__' ) ),
                  ),
                )
            ),
            array(
                'type'     => 'group',
                'label'    => __( 'Positions', '__elexia__' ),
                'controls' => array(
                    array(
                        'key'  => '_elexia_image_vertical_p',
                        'type' => 'text',
                        'options' => array(
                            'placeholder' => __( 'Vertical', '__elexia__' ),                                       
                        ),
                    ),
                    array(
                        'key'  => '_elexia_image_horizontal_p',
                        'type' => 'text',
                        'options' => array(
                            'placeholder' => __( 'Horizontal', '__elexia__' ),                                       
                        )
                    )
                ),
                'condition'     => array( '_elexia_image_position' => 'absolute' ),
            )
        )
    );

    return cs_compose_controls(
        array(
            'control_nav' => $control_nav,
            'controls'      => array( $control_setup_image , $control_image_position ),
            'controls_std_content' => array( $control_setup_image, $control_image_position ),
        ),
        cs_partial_controls( 'omega' )
    );
}

// Define Element
// =============================================================================

$data = array(
    'title'   => __( 'Image', '__elexia__' ),
    'values'  => $values,
    'builder' => 'elexia_element_builder_setup_image_source',
    'render'  => 'elexia_element_render_image_source',
    'style'   => 'elexia_image_source_style',
    'options' => array(
        'library'   => false,
        'child'     => true,
        'label_key' => 'image_source_content',
    )
);
  
  

// Register Module
// =============================================================================

cs_register_element( 'hero-section-image-source', $data );

function elexia_element_render_image_source( $data ) {

    extract( $data );

    $atts = cs_atts( array(
        'class'         => cs_attr_class( $style_id, 'hero-section-image-source', $class ),
        'data-element'  => 'element'
    ) );

    $output = "<figure $atts>"
                ."<img src='$_elexia_image_file' alt='$image_source_alt' />"
             ."</figure>";

    return $output;

}