<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul>
		<?php bp_group_admin_tabs(); ?>
	</ul>
</div><!-- .item-list-tabs -->

<form action="<?php bp_group_admin_form_action(); ?>" name="group-settings-form" id="group-settings-form" class="standard-form" method="post" enctype="multipart/form-data">

<?php

/**
 * Fires inside the group admin form and before the content.
 *
 * @since BuddyPress (1.1.0)
 */
do_action( 'bp_before_group_admin_content' ); ?>

<?php /* Edit Group Details */ ?>
<?php if ( bp_is_group_admin_screen( 'edit-details' ) ) : ?>

	<?php

	/**
	 * Fires before the display of group admin details.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_before_group_details_admin' ); ?>

	<label for="group-name"><?php esc_html_e( 'Group Name (required)', 'pallikoodam' ); ?></label>
	<input type="text" name="group-name" id="group-name" value="<?php bp_group_name(); ?>" aria-required="true" />

	<label for="group-desc"><?php esc_html_e( 'Group Description (required)', 'pallikoodam' ); ?></label>
	<textarea name="group-desc" id="group-desc" aria-required="true"><?php bp_group_description_editable(); ?></textarea>

	<?php

	/**
	 * Fires after the group description admin details.
	 *
	 * @since BuddyPress (1.0.0)
	 */
	do_action( 'groups_custom_group_fields_editable' ); ?>

	<p>
		<label for="group-notify-members">
			<input type="checkbox" name="group-notify-members" value="1" /> <?php esc_html_e( 'Notify group members of these changes via email', 'pallikoodam' ); ?>
		</label>
	</p>

	<?php

	/**
	 * Fires after the display of group admin details.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_after_group_details_admin' ); ?>

	<p><input type="submit" value="<?php esc_attr_e( 'Save Changes', 'pallikoodam' ); ?>" id="save" name="save" /></p>
	<?php wp_nonce_field( 'groups_edit_group_details' ); ?>

<?php endif; ?>

<?php /* Manage Group Settings */ ?>
<?php if ( bp_is_group_admin_screen( 'group-settings' ) ) : ?>

	<?php

	/**
	 * Fires before the group settings admin display.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_before_group_settings_admin' ); ?>

	<?php if ( bp_is_active( 'forums' ) ) : ?>

		<?php if ( bp_forums_is_installed_correctly() ) : ?>

			<div class="checkbox">
				<label><input type="checkbox" name="group-show-forum" id="group-show-forum" value="1"<?php bp_group_show_forum_setting(); ?> /> <?php esc_html_e( 'Enable discussion forum', 'pallikoodam' ); ?></label>
			</div>

			<hr />

		<?php endif; ?>

	<?php endif; ?>

	<h4><?php esc_html_e( 'Privacy Options', 'pallikoodam' ); ?></h4>

	<div class="radio">
		<label>
			<input type="radio" name="group-status" value="public"<?php bp_group_show_status_setting( 'public' ); ?> />
			<strong><?php esc_html_e( 'This is a public group', 'pallikoodam' ); ?></strong>
			<ul>
				<li><?php esc_html_e( 'Any site member can join this group.', 'pallikoodam' ); ?></li>
				<li><?php esc_html_e( 'This group will be listed in the groups directory and in search results.', 'pallikoodam' ); ?></li>
				<li><?php esc_html_e( 'Group content and activity will be visible to any site member.', 'pallikoodam' ); ?></li>
			</ul>
		</label>

		<label>
			<input type="radio" name="group-status" value="private"<?php bp_group_show_status_setting( 'private' ); ?> />
			<strong><?php esc_html_e( 'This is a private group', 'pallikoodam' ); ?></strong>
			<ul>
				<li><?php esc_html_e( 'Only users who request membership and are accepted can join the group.', 'pallikoodam' ); ?></li>
				<li><?php esc_html_e( 'This group will be listed in the groups directory and in search results.', 'pallikoodam' ); ?></li>
				<li><?php esc_html_e( 'Group content and activity will only be visible to members of the group.', 'pallikoodam' ); ?></li>
			</ul>
		</label>

		<label>
			<input type="radio" name="group-status" value="hidden"<?php bp_group_show_status_setting( 'hidden' ); ?> />
			<strong><?php esc_html_e( 'This is a hidden group', 'pallikoodam' ); ?></strong>
			<ul>
				<li><?php esc_html_e( 'Only users who are invited can join the group.', 'pallikoodam' ); ?></li>
				<li><?php esc_html_e( 'This group will not be listed in the groups directory or search results.', 'pallikoodam' ); ?></li>
				<li><?php esc_html_e( 'Group content and activity will only be visible to members of the group.', 'pallikoodam' ); ?></li>
			</ul>
		</label>
	</div>

	<hr />

	<h4><?php esc_html_e( 'Group Invitations', 'pallikoodam' ); ?></h4>

	<p><?php esc_html_e( 'Which members of this group are allowed to invite others?', 'pallikoodam' ); ?></p>

	<div class="radio">
		<label>
			<input type="radio" name="group-invite-status" value="members"<?php bp_group_show_invite_status_setting( 'members' ); ?> />
			<strong><?php esc_html_e( 'All group members', 'pallikoodam' ); ?></strong>
		</label>

		<label>
			<input type="radio" name="group-invite-status" value="mods"<?php bp_group_show_invite_status_setting( 'mods' ); ?> />
			<strong><?php esc_html_e( 'Group admins and mods only', 'pallikoodam' ); ?></strong>
		</label>

		<label>
			<input type="radio" name="group-invite-status" value="admins"<?php bp_group_show_invite_status_setting( 'admins' ); ?> />
			<strong><?php esc_html_e( 'Group admins only', 'pallikoodam' ); ?></strong>
		</label>
 	</div>

	<hr />

	<?php

	/**
	 * Fires after the group settings admin display.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_after_group_settings_admin' ); ?>

	<p><input type="submit" value="<?php esc_attr_e( 'Save Changes', 'pallikoodam' ); ?>" id="save" name="save" /></p>
	<?php wp_nonce_field( 'groups_edit_group_settings' ); ?>

<?php endif; ?>

<?php /* Group Avatar Settings */ ?>
<?php if ( bp_is_group_admin_screen( 'group-avatar' ) ) : ?>

	<?php if ( 'upload-image' == bp_get_avatar_admin_step() ) : ?>

			<p><?php esc_html_e("Upload an image to use as a profile photo for this group. The image will be shown on the main group page, and in search results.", 'pallikoodam' ); ?></p>

			<p>
				<input type="file" name="file" id="file" />
				<input type="submit" name="upload" id="upload" value="<?php esc_attr_e( 'Upload Image', 'pallikoodam' ); ?>" />
				<input type="hidden" name="action" id="action" value="bp_avatar_upload" />
			</p>

			<?php if ( bp_get_group_has_avatar() ) : ?>

				<p><?php esc_html_e( "If you'd like to remove the existing group profile photo but not upload a new one, please use the delete group profile photo button.", 'pallikoodam' ); ?></p>

				<?php bp_button( array( 'id' => 'delete_group_avatar', 'component' => 'groups', 'wrapper_id' => 'delete-group-avatar-button', 'link_class' => 'edit', 'link_href' => bp_get_group_avatar_delete_link(), 'link_title' => esc_html__( 'Delete Group Profile Photo', 'pallikoodam' ), 'link_text' => esc_html__( 'Delete Group Profile Photo', 'pallikoodam' ) ) ); ?>

			<?php endif; ?>

			<?php
			/**
			 * Load the Avatar UI templates
			 *
			 * @since  BuddyPress (2.3.0)
			 */
			bp_avatar_get_templates(); ?>

			<?php wp_nonce_field( 'bp_avatar_upload' ); ?>

	<?php endif; ?>

	<?php if ( 'crop-image' == bp_get_avatar_admin_step() ) : ?>

		<h4><?php esc_html_e( 'Crop Profile Photo', 'pallikoodam' ); ?></h4>

		<img src="<?php bp_avatar_to_crop(); ?>" id="avatar-to-crop" class="avatar" alt="<?php esc_attr_e( 'Profile photo to crop', 'pallikoodam' ); ?>" />

		<div id="avatar-crop-pane">
			<img src="<?php bp_avatar_to_crop(); ?>" id="avatar-crop-preview" class="avatar" alt="<?php esc_attr_e( 'Profile photo preview', 'pallikoodam' ); ?>" />
		</div>

		<input type="submit" name="avatar-crop-submit" id="avatar-crop-submit" value="<?php esc_attr_e( 'Crop Image', 'pallikoodam' ); ?>" />

		<input type="hidden" name="image_src" id="image_src" value="<?php bp_avatar_to_crop_src(); ?>" />
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />

		<?php wp_nonce_field( 'bp_avatar_cropstore' ); ?>

	<?php endif; ?>

<?php endif; ?>

<?php /* Manage Group Members */ ?>
<?php if ( bp_is_group_admin_screen( 'manage-members' ) ) : ?>

	<?php

	/**
	 * Fires before the group manage members admin display.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_before_group_manage_members_admin' ); ?>

	<div class="bp-widget">
		<h4><?php esc_html_e( 'Administrators', 'pallikoodam' ); ?></h4>

		<?php if ( bp_has_members( '&include='. bp_group_admin_ids() ) ) : ?>

		<ul id="admins-list" class="item-list single-line">

			<?php while ( bp_members() ) : bp_the_member(); ?>
			<li>
				<?php echo bp_core_fetch_avatar( array( 'item_id' => bp_get_member_user_id(), 'type' => 'thumb', 'width' => 30, 'height' => 30, 'alt' => sprintf( esc_html__( 'Profile picture of %s', 'pallikoodam' ), bp_get_member_name() ) ) ); ?>
				<h5>
					<a href="<?php bp_member_permalink(); ?>"> <?php bp_member_name(); ?></a>
					<?php if ( count( bp_group_admin_ids( false, 'array' ) ) > 1 ) : ?>
					<span class="small">
						<a class="button confirm admin-demote-to-member" href="<?php bp_group_member_demote_link( bp_get_member_user_id() ); ?>"><?php esc_html_e( 'Demote to Member', 'pallikoodam' ); ?></a>
					</span>
					<?php endif; ?>
				</h5>
			</li>
			<?php endwhile; ?>

		</ul>

		<?php endif; ?>

	</div>

	<?php if ( bp_group_has_moderators() ) : ?>
		<div class="bp-widget">
			<h4><?php esc_html_e( 'Moderators', 'pallikoodam' ); ?></h4>

			<?php if ( bp_has_members( '&include=' . bp_group_mod_ids() ) ) : ?>
				<ul id="mods-list" class="item-list single-line">

					<?php while ( bp_members() ) : bp_the_member(); ?>
					<li>
						<?php echo bp_core_fetch_avatar( array( 'item_id' => bp_get_member_user_id(), 'type' => 'thumb', 'width' => 30, 'height' => 30, 'alt' => sprintf( esc_html__( 'Profile picture of %s', 'pallikoodam' ), bp_get_member_name() ) ) ); ?>
						<h5>
							<a href="<?php bp_member_permalink(); ?>"> <?php bp_member_name(); ?></a>
							<span class="small">
								<a href="<?php bp_group_member_promote_admin_link( array( 'user_id' => bp_get_member_user_id() ) ); ?>" class="button confirm mod-promote-to-admin" title="<?php esc_attr_e( 'Promote to Admin', 'pallikoodam' ); ?>"><?php esc_html_e( 'Promote to Admin', 'pallikoodam' ); ?></a>
								<a class="button confirm mod-demote-to-member" href="<?php bp_group_member_demote_link( bp_get_member_user_id() ); ?>"><?php esc_html_e( 'Demote to Member', 'pallikoodam' ); ?></a>
							</span>
						</h5>
					</li>
					<?php endwhile; ?>

				</ul>

			<?php endif; ?>
		</div>
	<?php endif ?>


	<div class="bp-widget">
		<h4><?php esc_html_e('Members', 'pallikoodam'); ?></h4>

		<?php if ( bp_group_has_members( 'per_page=15&exclude_banned=0' ) ) : ?>

			<?php if ( bp_group_member_needs_pagination() ) : ?>

				<div class="pagination no-ajax">

					<div id="member-count" class="pag-count">
						<?php bp_group_member_pagination_count(); ?>
					</div>

					<div id="member-admin-pagination" class="pagination-links">
						<?php bp_group_member_admin_pagination(); ?>
					</div>

				</div>

			<?php endif; ?>

			<ul id="members-list" class="item-list single-line">
				<?php while ( bp_group_members() ) : bp_group_the_member(); ?>

					<li class="<?php bp_group_member_css_class(); ?>">
						<?php bp_group_member_avatar_mini(); ?>

						<h5>
							<?php bp_group_member_link(); ?>

							<?php if ( bp_get_group_member_is_banned() ) esc_html_e( '(banned)', 'pallikoodam' ); ?>

							<span class="small">

							<?php if ( bp_get_group_member_is_banned() ) : ?>

								<a href="<?php bp_group_member_unban_link(); ?>" class="button confirm member-unban" title="<?php esc_attr_e( 'Unban this member', 'pallikoodam' ); ?>"><?php esc_html_e( 'Remove Ban', 'pallikoodam' ); ?></a> | 

							<?php else : ?>

								<a href="<?php bp_group_member_ban_link(); ?>" class="button confirm member-ban" title="<?php esc_attr_e( 'Kick and ban this member', 'pallikoodam' ); ?>"><?php esc_html_e( 'Kick &amp; Ban', 'pallikoodam' ); ?></a> | <a href="<?php bp_group_member_promote_mod_link(); ?>" class="button confirm member-promote-to-mod" title="<?php esc_attr_e( 'Promote to Mod', 'pallikoodam' ); ?>"><?php esc_html_e( 'Promote to Mod', 'pallikoodam' ); ?></a> | <a href="<?php bp_group_member_promote_admin_link(); ?>" class="button confirm member-promote-to-admin" title="<?php esc_attr_e( 'Promote to Admin', 'pallikoodam' ); ?>"><?php esc_html_e( 'Promote to Admin', 'pallikoodam' ); ?></a> |

							<?php endif; ?>

								<a href="<?php bp_group_member_remove_link(); ?>" class="button confirm" title="<?php esc_attr_e( 'Remove this member', 'pallikoodam' ); ?>"><?php esc_html_e( 'Remove from group', 'pallikoodam' ); ?></a>

								<?php

								/**
								 * Fires inside the display of a member admin item in group management area.
								 *
								 * @since BuddyPress (1.1.0)
								 */
								do_action( 'bp_group_manage_members_admin_item' ); ?>

							</span>
						</h5>
					</li>

				<?php endwhile; ?>
			</ul>

		<?php else: ?>

			<div id="message" class="info">
				<p><?php esc_html_e( 'This group has no members.', 'pallikoodam' ); ?></p>
			</div>

		<?php endif; ?>

	</div>

	<?php

	/**
	 * Fires after the group manage members admin display.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_after_group_manage_members_admin' ); ?>

<?php endif; ?>

<?php /* Manage Membership Requests */ ?>
<?php if ( bp_is_group_admin_screen( 'membership-requests' ) ) : ?>

	<?php

	/**
	 * Fires before the display of group membership requests admin.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_before_group_membership_requests_admin' ); ?>

		<div class="requests">

			<?php bp_get_template_part( 'groups/single/requests-loop' ); ?>

		</div>

	<?php

	/**
	 * Fires after the display of group membership requests admin.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_after_group_membership_requests_admin' ); ?>

<?php endif; ?>

<?php

/**
 * Fires inside the group admin template.
 *
 * Allows plugins to add custom group edit screens.
 *
 * @since BuddyPress (1.1.0)
 */
do_action( 'groups_custom_edit_steps' ); ?>

<?php /* Delete Group Option */ ?>
<?php if ( bp_is_group_admin_screen( 'delete-group' ) ) : ?>

	<?php

	/**
	 * Fires before the display of group delete admin.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_before_group_delete_admin' ); ?>

	<div id="message" class="info">
		<p><?php esc_html_e( 'WARNING: Deleting this group will completely remove ALL content associated with it. There is no way back, please be careful with this option.', 'pallikoodam' ); ?></p>
	</div>

	<label><input type="checkbox" name="delete-group-understand" id="delete-group-understand" value="1" onclick="if(this.checked) { document.getElementById('delete-group-button').disabled = ''; } else { document.getElementById('delete-group-button').disabled = 'disabled'; }" /> <?php esc_html_e( 'I understand the consequences of deleting this group.', 'pallikoodam' ); ?></label>

	<?php

	/**
	 * Fires after the display of group delete admin.
	 *
	 * @since BuddyPress (1.1.0)
	 */
	do_action( 'bp_after_group_delete_admin' ); ?>

	<div class="submit">
		<input type="submit" disabled="disabled" value="<?php esc_attr_e( 'Delete Group', 'pallikoodam' ); ?>" id="delete-group-button" name="delete-group-button" />
	</div>

	<?php wp_nonce_field( 'groups_delete_group' ); ?>

<?php endif; ?>

<?php /* This is important, don't forget it */ ?>
	<input type="hidden" name="group-id" id="group-id" value="<?php bp_group_id(); ?>" />

<?php

/**
 * Fires inside the group admin form and after the content.
 *
 * @since BuddyPress (1.1.0)
 */
do_action( 'bp_after_group_admin_content' ); ?>

</form><!-- #group-settings-form -->

