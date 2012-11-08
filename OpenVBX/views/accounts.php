<div class="vbx-content-main">

		<div class="vbx-content-menu vbx-content-menu-top">
			<h2 class="vbx-content-heading"><?php echo lang('users'); ?></h2>
			<ul class="user-groups-menu vbx-menu-items-right">
				<li class="menu-item"><button id="button-add-user" class="inline-button add-button"><span><?php echo lang('add_user'); ?></span></button></li>
				<li class="menu-item"><button id="button-add-group" class="inline-button add-button"><span><?php echo lang('add_group'); ?></span></button></li>
			</ul>
		</div><!-- .vbx-content-menu -->
			
		<div class="yui-ge accounts-section">
			<div class="yui-u first">	

				<div id="user-container">
				<h3><?php echo lang('users'); ?></h3>
				<p><?php echo lang('drag_user'); ?>Drag a user into a group to add them.</p>

				<ul class="user-list">
				<?php $admin = OpenVBX::getCurrentUser(); ?>
				<?php if(isset($users)): 
					foreach($users as $user): ?>
				<li class="user" rel="<?php echo $user->id ?>">
					<div class="user-utilities">
						<img class="gravatar" src="<?php
							if ($gravatars)
							{
								echo gravatar_url($user->email, 30, $default_avatar);
							}
							else
							{
								echo $default_avatar;
							}
						?>" width="30" height="30" />
						<?php if($user->id != $admin->id): ?>
						<a class="user-edit" href="<?php echo site_url('/account/user/'.$user->id); ?>"><span class="replace"><?php echo lang('edit'); ?></span></a>
						<a class="user-remove" href="#remove"><span class="replace"><?php echo lang('remove'); ?></span></a>
						<?php endif; ?>
					</div>
					<div class="user-info">
						<p class="user-name"><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></p>
						<p class="user-email"><?php echo $user->email ?></p>
						<?php if ($user->is_admin): ?>
							<p class="user-administrator"><?php echo lang('administrator'); ?></p>
						<?php endif; ?>
					</div>
				</li>
				<?php 
					endforeach; 
				endif; ?>
				<li class="user" rel="prototype" style="display:none;">
					<div class="user-utilities">
						<img class="gravatar" src="<?php echo $default_avatar; ?>" width="30" height="30" />
						<a class="user-edit" href="#edit"><span class="replace"><?php echo lang('edit'); ?></span></a>
						<a class="user-remove" href="#remove"><span class="replace"><?php echo lang('remove'); ?></span></a>
					</div>
					<div class="user-info">
						<p class="user-name">(prototype)</p>
						<p class="user-email"></p>
					</div>
				</li>
				</ul>
				</div><!-- #user-container -->

			</div><!-- .yui-u .first -->
			
			<div class="yui-u">

				<div id="group-container">
				<h3><?php echo lang('groups'); ?></h3>
				<p><?php echo lang('select_group'); ?></p>

				<ul class="group-list">
				<?php if(isset($groups)) foreach($groups as $group_id => $group): ?>
					<li class="group" rel="<?php echo $group_id ?>">
							<img class="group-counter-loader hide" src="<?php echo asset_url('assets/i/ajax-loader-circle.gif'); ?>" alt="<?php echo lang('loading'); ?>" />
							<span class="group-counter"><?php echo count($group->users) ?></span>

							<div class="group-utilities">
								<a class="group-edit" href="#edit"><?php echo lang('edit_group'); ?></a>
								<a class="group-remove" href="#remove"><?php echo lang('remove_group'); ?></a>
							</div>

							<div class="group-info">
								<p class="group-name"><?php echo $group->name; ?></p>
							</div>

							<ul class="members">
							<?php foreach($group->users as $user): ?>
								<li rel="<?php echo $user->user_id; ?>">
									<?php if(!empty($user->first_name)) : ?>
									<span><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></span>
									<?php else: ?>
									<span><?php echo $user->email; ?></span>
									<?php endif;?>
									<a class="remove"><?php echo lang('remove'); ?></a>
								</li>
							<?php endforeach; ?>
							</ul>

					</li><?php endforeach; ?>

					<li class="group" rel="prototype" style="display:none;">
						<span class="group-counter">0</span>
						<div class="group-utilities">
							<a class="group-edit" href="#"><?php echo lang('edit_group'); ?></a>
							<a class="group-remove" href="#"><?php echo lang('remove_group'); ?></a>
						</div>

						<div class="group-info">
							<p class="group-name">(Prototype)</p>
						</div>
						<ul class="members"></ul>
					</li>
				</ul>
				</div><!-- #group-container -->

			</div><!-- .yui-u -->

		</div><!-- .yui-ge 3/4, 1/4 -->

</div><!-- .vbx-content-main -->

<div id="accounts-dialogs" style="display: none;">
	<div id="dialog-invite-user" title="<?php echo lang('invite_user'); ?>" class="hide dialog">
		<div class="error-message hide"></div>
		<form class="vbx-form" onsubmit="return false;">
			<fieldset class="vbx-input-container">
			<label class="field-label"><?php echo lang('email'); ?>
				<input type="text" class="medium" name="email" value="" />
			</label>
			</fieldset>
		</form>
	</div>

	<div id="dialog-google-app-sync" title="Use Google Apps for Domains" class="hide dialog">
		<div class="error-message hide"></div>
		<form class="vbx-form" onsubmit="return false;">
			<p><?php echo lang('email_for_google_apps'); ?></p>
			<fieldset class="vbx-input-container">
			<label class="field-label"><?php echo lang('email'); ?>
				<input type="text" class="medium" name="email" value="" />
			</label>
			<label class="field-label"><?php echo lang('password'); ?>
				<input type="password" class="medium" name="password" value="" />
			</label>
			</fieldset>
		</form>
	</div>

	<?php include("user_group_dialogs.php"); ?>

	<div id="dialog-delete" title="<?php echo lang('delete'); ?>" class="hide dialog">
		<div class="error-message hide"></div>
		<div id="dConfirmMsg">
			<p><?php echo lang('delete_confirm'); ?></p>
		</div>
	</div>
</div>