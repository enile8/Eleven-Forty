<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package elevenforty
 */
?>
	</div><!-- #main -->

	<footer class="row" role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<div id="site-info" class="sixcol">
            <?php /* Replace default text if option is set */
			if( get_option('of_footer_left') == 'true'){
				echo get_option('of_footer_left_text');
			} else { 
			?>
				<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            <?php } ?>
			</div><!-- #site-info -->
<<<<<<< .merge_file_7iriST
				
                <?php if( get_option('of_footer_right') == 'true'){ ?>
                	<div id="site-generator" class="sixcol last">
					<?php echo get_option('of_footer_right_text'); ?>
					<br/><a href="http://enile8.github.com/elevenforty" title="1140 CSS Framework Theme for WordPress" rel="generator">Eleven Forty WordPress Theme</a>
                    </div> <!-- #site-generator -->
				<?php } else { ?>
                <div id="site-generator" class="sixcol last">
                <?php do_action( 'elevenforty_credits' ); ?>
				<a href="http://enile8.github.com/elevenforty" title="1140 CSS Framework Theme for WordPress" rel="generator">Eleven Forty WordPress Theme</a>
                </div><!-- #site-generator -->
                <?php } ?>
=======

			<div id="site-generator" class="sixcol last">
				<a href="http://enile8.github.com/elevenforty" title="1140 CSS Framework Theme for WordPress" rel="generator">Eleven Forty WordPress Theme</a>
			</div><!-- #site-generator -->
>>>>>>> .merge_file_PA7NbT

		</div><!-- #colophon -->
	</footer><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
