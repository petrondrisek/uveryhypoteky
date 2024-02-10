<?php

    final class Page_widget extends WP_Widget {
        private $db;

        function __construct() {
            parent::__construct(
                'Page_widget',
                esc_html__( 'Stránka / Příspěvek', 'uh_page' ),
                array( 'description' => esc_html__( 'Zobrazí obsah stránky nebo příspěvku', 'uh_page' ), )
            );
        }
        
        public function widget( $args, $instance ) {
            global $wpdb;
            $id = $instance["id"]; 
            $post = get_post($id); 
            $content = apply_filters('the_content', $post->post_content); 
            
            echo $content;  
        }
                
        public function form( $instance ) {
            $posts = get_posts(
                array(
                    'post_type' => array("post", "page")
                )
            );

            ?>
                <label for="<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>"><?php esc_attr_e( 'Příspěvek / Stránka', 'uh_page' ); ?> </label> 
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'id' ) ); ?>">
                    <?php
                        foreach($posts as $post)
                            echo '<option value="'.$post->ID.'" '.($post->ID == $instance["id"] ? "Selected" : "").'>'.$post->post_title.'</option>';
                    ?>
                </select>
            <?php
        }
            
        public function update( $new_instance, $old_instance ) {
            return $new_instance;    
        }

    }

?>