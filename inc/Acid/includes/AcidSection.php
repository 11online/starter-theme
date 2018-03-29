<?php

if ( ! class_exists( 'AcidSection' ) ) {

    class AcidSection implements AcidComponent {

        private $id;
        private $section;
        private $panel;
        private $priority;

        public function __construct( $panel = null, $id, $section ) {
            
            $this->section = $section;
            $this->id = $id;
            $this->panel = $panel;
            $this->priority = isset($section['priority']) ? $section['priority'] : 30;
            
            $this->render();
            
        }
        
        public function __get( $name ) {
            return isset( $this->section[ $name ] ) ? $this->section[ $name ] : false;
        }
        
        public function render() {
            
            global $wp_customize;
            
            $wp_customize->add_section( $this->id, array(
                'title'                 => $this->title,
                'description'           => $this->description,
                'panel'                 => $this->panel,
                'priority'              => $this->priority
            ) );
            
            foreach( $this->options as $option_id => $option ) {
                
                $this->create_option( $option_id, $option );
               
            }
            
        }
        
        private function create_option( $option_id, $option ) {
            
            $option = new AcidOption( $this->id, $option_id, $option );
            
        }
        
        
    }


}
