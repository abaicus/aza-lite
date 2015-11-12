<!-- =========================
TEAM SECTION
============================== -->
<?php 

$heading = get_theme_mod('aza_team_title', 'OUR TEAM');

$subheading = get_theme_mod('aza_team_subheading', 'Present your team members and their role in the company.');

$team_content = get_theme_mod ('aza_team_content',json_encode(
         array(
                array("image_url"     => aza_get_file('/images/team1.png'), 
                      "title"         => esc_html__("Jane Doe"),
                      "subtitle"      => esc_html__("Project Supervisor"),
                      "color"         => esc_html__("#f0b57c"),
                      "text"          => esc_html__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.")),        
                array("image_url"     => aza_get_file('/images/team2.png'), 
                      "title"         => esc_html__("Ola Nordmann"),   
                      "subtitle"      => esc_html__("Web Designer"),
                      "color"         => esc_html__("#4bb992"),
                      "text"          => esc_html__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.")),      
                array("image_url"     => aza_get_file('/images/team3.png'),
                      "title"         => esc_html__("Average Joe"),   
                      "subtitle"      => esc_html__("Front End Developer"),
                      "color"         => esc_html__("#349ae0"),
                      "text"          => esc_html__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.")),      
                array("image_url"     => aza_get_file('/images/team4.png'), 
                      "title"         => esc_html__("Joe Bloggs"),
                      "subtitle"      => esc_html__("UX Designer"),
                      "color"         => esc_html__("#887caf"),
                      "text"          => esc_html__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.")),      
            ) ) ) ;

$team_content_decoded = json_decode($team_content);

$button_text = get_theme_mod('aza_team_button_text', 'Work with us')


?>    
           
<section id="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-centered text-center">
                        <?php
                    if(!empty($heading)) {
                        echo '<h1>'.esc_html__($heading).'</h1>';    
                    }?>
                    <div class="separator" <?php echo ( get_theme_mod( 'aza_separator_team_top' ) ) ? "" : "style='display:none!important;'" ?>></div>
                     <?php
                                if(!empty($subheading)) {
                                echo '<p class = "team-p">'.esc_html__($subheading).'</p>';    
                        }?>
                    </div>
                </div>
                
                <div class="row team-row text-center">


              <?php
                    
                if(!empty($team_content)) { 
    $team_content_decoded = json_decode($team_content); 
    if(!empty($team_content_decoded)) { 
        foreach($team_content_decoded as $team_content) { 
            echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center team-member">
                        <div class="team-picture">
                            <div class="team-member-image" style="background-image: url(' .esc_url($team_content -> image_url).')"></div>
                            <div class="team-picture-overlay">
                                <p class="team-description">'.esc_html__($team_content -> text).'</p>
                            </div>
                        </div>
                        <div class="separator-team"></div>
                        <h4 class="team-name1" style = " color:'.esc_html__($team_content -> color).'">'.esc_html__($team_content -> title).'</h4>
                        <p>'.esc_html__($team_content -> subtitle).'</p>
                    </div>';
            
              
        }}}
                    ?>

            </div>
     
        
         
            <div class="separator" <?php echo ( get_theme_mod( 'aza_separator_team_bottom' ) ) ? "" : "style='display:none!important;'" ?>></div>
        
             <?php
                        if(!empty($button_text))
                        {
                        echo '<div class="col-lg-12 col-centered text-center">';
                        echo '<button type="button" class="btn features-btn">'.esc_html__($button_text).'</button></div>';
                        }
                    ?>  
                </div>

                

        </section>