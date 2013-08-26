<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
	<!-- <div id="secondary" class="widget-area" role="complementary" style="text-align:center;">
	<a href="http://book.akahoshitakuya.com/u/281406" title="タオルケットの最近読んだ本"><img src="http://img.bookmeter.com/bp_image/640/282/281406.jpg" border="0" alt="タオルケットの最近読んだ本"></a>
	</div> -->