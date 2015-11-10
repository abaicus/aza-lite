<!-- =========================
BLOG SECTION
============================== -->
<?php 

$heading = get_theme_mod('aza_blog_title', 'LATEST NEWS');

$subheading = get_theme_mod('aza_blog_subheading', 'Keep your users in touch with your latest blog posts and updates.');

?> 
           

        <section id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                             <?php
                    if(!empty($heading)) {
                        echo '<h1>'.esc_html__($heading).'</h1>';    
                    }?>
                        <div class="separator" <?php echo ( get_theme_mod( 'aza_separator_blog_top' ) ) ? "" : "style='display:none!important;'" ?>></div>
                     <?php
                                if(!empty($subheading)) {
                                echo '<p class="blog-p">'.esc_html__($subheading).'</p>';    
                        }?>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row row-centered text-center">
                
                
                
	<?php if ( have_posts() ) : ?>
    <?php query_posts("showposts=2"); ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/blog-posts', get_post_format() );
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php wp_reset_query(); ?>

		<?php endif; ?>



 </div>
            </div>


        </section>