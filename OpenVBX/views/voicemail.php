<div class="vbx-content-main">

	<div class="vbx-content-menu vbx-content-menu-top">
		<h2 class="vbx-content-heading"><?php echo lang('voicemail'); ?></h2>
	</div><!-- .vbx-content-menu -->

	<div class="voicemail-blank <?php echo empty($voicemail_say) && empty($voicemail_play)? '' : lang('hide') ?>">
		<h2><?php echo lang('voicemail_blank'); ?></h2>
		<p><?php echo lang('voicemail_blank_description'); ?></p>
	</div>	

	<div class="vbx-content-container">
		<div class="vbx-content-section">
			<div class="vbx-form">
				<h3><?php echo lang('voicemail'); ?></h3>
				<div class="voicemail-container">
					<div class="voicemail-icon standard-icon"><span class="replace"><?php echo lang('voicemail'); ?></span></div>
					<div class="voicemail-label"><?php echo lang('greeting'); ?></div>
					<div class="voicemail-picker">
						<?php
							 $widget = new AudioSpeechPickerWidget(
											'voicemail', 
											$voicemail_mode, 
											$voicemail_say, 
											$voicemail_play, 
											'user_id:'.$this->session->userdata('user_id')
										);
							echo $widget->render();
						?>
					</div>
				</div><!-- .voicemail-container -->
			</div>
		</div><!-- .vbx-content-section -->
	</div><!-- .vbx-content-container -->
	
</div><!-- .vbx-content-main -->
