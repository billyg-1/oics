<?php
/**
 * BuddyPress - Groups Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */

/**
 * Fires before the display of a group's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_group_header' );

?>

<div id="item-actions">

	<?php if ( bp_group_is_visible() ) : ?>

        <?php

		/**
		 * Fires after the display of the group's administrators.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_after_group_menu_admins' );

		if ( bp_group_has_moderators() ) :

			/**
			 * Fires before the display of the group's moderators, if there are any.
			 *
			 * @since 1.1.0
			 */
			do_action( 'bp_before_group_menu_mods' ); ?>

			<h3><?php esc_html_e( 'Group Mods' , 'pallikoodam' ); ?></h3>

			<?php bp_group_list_mods();

			/**
			 * Fires after the display of the group's moderators, if there are any.
			 *
			 * @since 1.1.0
			 */
			do_action( 'bp_after_group_menu_mods' );

		endif;

	endif; ?>

</div><!-- #item-actions -->

<?php if ( ! bp_disable_group_avatar_uploads() ) : ?>
	<div id="item-header-avatar">
		<a href="<?php echo esc_url( bp_get_group_permalink() ); ?>" class="bp-tooltip" data-bp-tooltip="<?php echo esc_attr( bp_get_group_name() ); ?>" title="<?php echo esc_attr( bp_get_group_name() ); ?>">

			<?php bp_group_avatar(); ?>

		</a>
	</div><!-- #item-header-avatar -->
<?php endif; ?>

<div id="item-header-content">
	<span class="highlight"><?php bp_group_type(); ?></span>
	<span class="activity" data-livestamp="<?php bp_core_iso8601_date( bp_get_group_last_active( 0, array( 'relative' => false ) ) ); ?>"><?php printf( esc_html__( 'active %s', 'pallikoodam' ), bp_get_group_last_active() ); ?></span>

	<?php

	/**
	 * Fires before the display of the group's header meta.
	 *
	 * @since 1.2.0
	 */
	do_action( 'bp_before_group_header_meta' ); ?>

	<div id="item-meta">

		<?php bp_group_description(); ?>

		<div id="item-buttons">

			<?php

			/**
			 * Fires in the group header actions section.
			 *
			 * @since 1.2.6
			 */
			do_action( 'bp_group_header_actions' ); ?>

		</div><!-- #item-buttons -->

		<?php

		/**
		 * Fires after the group header actions section.
		 *
		 * @since 1.2.0
		 */
		do_action( 'bp_group_header_meta' ); ?>

	</div>
    
	<h3><?php esc_html_e( 'Group Admins', 'pallikoodam' ); ?></h3>
	<?php bp_group_list_admins(); ?>
    
</div><!-- #item-header-content -->

<?php

/**
 * Fires after the display of a group's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_group_header' );  ?>

<div id="template-notices" role="alert" aria-atomic="true">
	<?php

	/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
	do_action( 'template_notices' ); ?>

</div>