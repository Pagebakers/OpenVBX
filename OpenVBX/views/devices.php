<div class="vbx-content-main">

		<div class="vbx-content-menu vbx-content-menu-top">
			<h2 class="vbx-content-heading"><?php echo lang('Devices'); ?></h2>
			<ul class="vbx-menu-items-right <?php if(empty($devices)): ?><?php echo lang('hide'); ?><?php endif; ?>">
				<li class="menu-item"><button class="add-device add-button"><span><?php echo lang('add_device'); ?></span></button></li>
			</ul>
		</div><!-- .vbx-content-menu -->


		<div class="devices-blank <?php if(!empty($devices)): ?><?php echo lang('hide'); ?><?php endif; ?>">
			<h2><?php echo lang('devices_blank'); ?></h2>
			<p><?php echo lang('devices_blank_description'); ?></p>
			<button class="add-device add-button"><span><?php echo lang('add_device'); ?></span></button>
		</div>


	<div class="vbx-content-container">

		<div class="vbx-content-section">
		<form class="vbx-form" action="">

		<div class="device-container">
		<h3><?php echo lang('devices'); ?></h3>
		<p><?php echo lang('devices_help'); ?></p>
		<ol class="device-list <?php if(empty($devices)): ?><?php echo lang('hide'); ?><?php endif; ?>">
			<?php foreach($devices as $device): 
				if ($device->id == 0) { continue; } ?>
			<li class="phone device enabled ui-state-default" rel="<?php echo $device->id ?>">
				<fieldset class="vbx-input-complex">

					<label class="field-label-inline left">
						<div class="device-type phone-type"><span class="replace"><?php echo lang('phone'); ?></span></div>
						<p class="device-name"><?php echo htmlentities($device->name); ?></p>
					</label>

					<p class="device-value"><?php echo format_phone($device->value); ?></p>

					<label class="field-label-inline left">
						<input type="checkbox" class="enable-sms checkbox" <?php echo $device->sms == 1? 'checked="checked"'  :'' ?> />
						<?php echo lang('sms_notifications'); ?>
					</label>

					<a href="" class="action trash" title="Delete"><span class="replace"><?php echo lang('delete'); ?></span></a>

					<div class="device-status">
						<a href="" class="<?php echo ($device->is_active == 1)? 'enabled' : 'disabled' ?> on"><?php echo lang('on'); ?></a>
						<a href="" class="<?php echo ($device->is_active == 0)? 'enabled' : 'disabled' ?> off"><?php echo lang('off'); ?></a>
						<input type="checkbox" class="enable-device checkbox" value="1" <?php echo ($device->is_active == 1)? 'checked="checked"' : '' ?> />
					</div>

				</fieldset>
			</li>
			<?php endforeach; ?>

			<li class="prototype hide">
				<fieldset class="vbx-input-complex">
					<label class="field-label-inline left">
						<div class="device-type phone-type"><span class="replace"><?php echo lang('phone'); ?></span></div>
						<p class="device-name"></p>
					</label>

					<p class="device-value"></p>

					<label class="field-label-inline left">
						<input type="checkbox" class="enable-sms checkbox" checked="checked"/>
						<?php echo lang('sms_notifications'); ?>
					</label>

					<a href="" class="action trash" title="Delete"><span class="replace"><?php echo lang('delete'); ?></span></a>
					<!-- <a href="" class="action edit" title="Edit"><span class="replace">Edit</span></a> -->

					<div class="device-status">
						<a href="" class="enabled on"><?php echo lang('on'); ?></a>
						<a href="" class="disabled off"><?php echo lang('off'); ?></a>
						<input type="checkbox" class="enable-device checkbox" value="1" checked="checked" />
					</div>

				</fieldset>
			</li>
		</ol>

		<div class="no-devices <?php if(!empty($devices)): ?><?php echo lang('hide'); ?><?php endif; ?>">
			<p><?php echo lang('no_devices_setup'); ?></p>
		</div><!-- .no-devices -->

		</div><!-- .device-container -->
		</form>

		<div class="application-container">
			<div class="application">
				<img class="app-icon" src="<?php echo ASSET_ROOT ?>/i/iphone-icon-58.png" alt="<?php echo lang('openvbx_for_iphone'); ?>" />
				<h4 class="app-name"><?php echo lang('openvbx_for_iphone'); ?></h4>
				<p class="app-desc"><?php echo lang('openvbx_for_iphone_description'); ?></p>
				<form>
					<fieldset class="vbx-input-container">
						<button class="email-button"><span><?php echo lang('start_quick_install'); ?></span></button>
					</fieldset>
				</form>
			</div><!-- .application -->
		</div><!-- .application-container -->

		</div><!-- .vbx-content-section -->


	</div><!-- .vbx-content-container -->


</div><!-- .vbx-content-main -->



<div id="dialog-number" style="display: none;" class="new number dialog" title="<?php echo lang('add_devices'); ?>">
		<div class="hide error-message"></div>
		<div class="vbx-form">
			<fieldset class="vbx-input-container">
				<label class="field-label"><?php echo lang('device_name'); ?>
					<input type="text" class="medium" name="number[name]" value="" />
				</label>
			</fieldset>

			<fieldset class="vbx-input-container">
				<label class="field-label"><?php echo lang('phone_number') ;?>
					<input type="text" class="medium" name="number[value]" value="" />
				</label>
			</fieldset>
		</div>
</div>

<div id="dialog-email" style="display: none;" class="email dialog" title="<?php echo lang('openvbx_for_iphone_install'); ?>">
	<p><?php echo sprintf(lang('quick_install_guide_iphone_email'), $user->email); ?></p>
</div>


