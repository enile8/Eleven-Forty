<?php
/**
 * The abovecontent widget areas.
 *
 */
?>

<?php
	/* The abovecontent widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'first-abovecontent-widget-area'  )
		&& ! is_active_sidebar( 'second-abovecontent-widget-area' )
		&& ! is_active_sidebar( 'third-abovecontent-widget-area'  )
		&& ! is_active_sidebar( 'fourth-abovecontent-widget-area' )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

			<div id="abovecontent-widget-area" role="complementary">

<?php if ( is_active_sidebar( 'first-abovecontent-widget-area' ) ) : ?>
				<div id="first" class="widget-area <?php echo get_option('of_firstAF_sidebar_class'); ?>">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'first-abovecontent-widget-area' ); ?>
					</ul>
				</div><!-- #first .widget-area -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'second-abovecontent-widget-area' ) ) : ?>
				<div id="second" class="widget-area <?php echo get_option('of_secondAF_sidebar_class'); ?>">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'second-abovecontent-widget-area' ); ?>
					</ul>
				</div><!-- #second .widget-area -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'third-abovecontent-widget-area' ) ) : ?>
				<div id="third" class="widget-area <?php echo get_option('of_thirdAF_sidebar_class'); ?>">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'third-abovecontent-widget-area' ); ?>
					</ul>
				</div><!-- #third .widget-area -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'fourth-abovecontent-widget-area' ) ) : ?>
				<div id="fourth" class="widget-area <?php echo get_option('of_fourthAF_sidebar_class'); ?>">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'fourth-abovecontent-widget-area' ); ?>
					</ul>
				</div><!-- #fourth .widget-area -->
<?php endif; ?>

			</div><!-- #abovecontent-widget-area -->
