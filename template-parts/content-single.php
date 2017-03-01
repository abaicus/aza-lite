<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aza-lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="aza-post-meta" itemprop="datePublished" datetime="<?php the_time( 'Y-m-d\TH:i:sP' ); ?>" title="<?php the_time( _x( 'l, F j, Y, g:i a', 'post time format', 'aza-lite' ) ); ?>">
			<?php echo get_the_date('F j, Y');?>
		</div>

		<div class="entry-meta list-post-entry-meta">
				<span itemprop="author" itemtype="http://schema.org/Person" class="entry-author post-author">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" rel="author"><i class="fa fa-user"></i><?php the_author(); ?> </a>
				</span>
			<span class="posted-in" itemprop="articleSection">
				<i class="fa fa-tags"></i>
				<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'aza-lite' ) );
				$pos = strpos($categories_list, ',');
				if ( $pos ) {
					echo substr($categories_list, 0, $pos);
				} else {
					echo $categories_list;
				}
				?>
				</span>

			<i class="fa fa-comments"></i><a href="<?php comments_link(); ?>" class="post-comments"><?php comments_number( esc_html__('No comments', 'aza-lite'), esc_html__('One comment', 'aza-lite'), esc_html__('% comments', 'aza-lite') ); ?>
			</a>
		</div><!-- .entry-meta -->
	</header>
	<div class="featured-image">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>

	</div>
	<!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aza-lite' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php aza_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

