<?php


class WP_Customizer_Settings {

    public function __construct(){
        add_action('customize_register', array($this, 'customize_register_sections'));
    }

    public function customize_register_sections( $wp_customize ){
        
        $wp_customize->add_section('template-header', array(
            'title'=>'Nastavení šablony',
            'priority'=>1,
            'description'=>__('Nastavení informací v šabloně', 'uveryhypoteky')
        ));

        //Adress
        $wp_customize->add_setting('template-header-adress', array(
            'default'=>'',
            'sanitize_callback'=>array($this, 'sanitize_custom_text')
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'template-header-adress-control', array(
            'label'=>'Adresa',
            'type'=>'textarea',
            'section'=>'template-header',
            'setting'=>'template-header-adress'
        )));

    }

    //Sanitize
    public function sanitize_custom_text($input){
        return filter_var($input, FILTER_SANITIZE_STRING);
    }

}