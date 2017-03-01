<?php
if( !function_exists( 'aza_ribbon_section' ) ) {

    function aza_ribbon_section() {

        $frontpage_ribbon_toggle = get_theme_mod( 'frontpage_ribbon_toggle', false );
        if( ( bool ) $frontpage_ribbon_toggle === true ) {
            return;
        }

        $aza_buttons_type = get_theme_mod ('aza_ribbon_layout', '2');
        $text =  get_theme_mod('aza_ribbon_text');
        $button_link = get_theme_mod('aza_ribbon_button_link', '#');
        $button_text = get_theme_mod('aza_ribbon_button_text');

        ?>

        <section id="ribbon">
            <div class="container">
                <div class="row ribbon-row">
                    <?php
                    switch ( $aza_buttons_type ) {
                        case '1':
                            if( ! empty( $button_text ) ) { ?>
                                <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12 text-center">
                                    <a href="<?php echo esc_url( $button_link ); ?>" class="btn features-btn">
                                        <?php echo esc_html( $button_text ); ?>
                                    </a>
                                </div>
                            <?php }

                            if( ! empty( $text ) ) { ?>
                                <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12 text-center">
                                    <h3> <?php echo wp_kses_post( $text ); ?></h3>
                                </div>
                            <?php }
                            break;

                        case '2':
                            if( ! empty( $text ) ) { ?>
                                <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12 text-center">
                                    <h3><?php echo wp_kses_post( $text ); ?></h3></div>
                            <?php }

                            if( ! empty( $button_text ) ) { ?>
                                <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12 text-center">
                                    <a href="<?php echo esc_html( $button_link ); ?>" class="btn features-btn">
                                        <?php echo esc_html ( $button_text ); ?>
                                    </a>
                                </div>
                            <?php }

                            break;
                    }
                    ?>
                </div>
            </div>
        </section>

    <?php }

}