<fieldset class="audio-choice vbx-input-container">
	<input type="hidden" name="<?php echo $name ?>_say" value="<?php echo $say ?>" />
	<input type="hidden" name="<?php echo $name ?>_play" value="<?php echo $play ?>" />
	<input type="hidden" name="<?php echo $name ?>_mode" value="<?php echo $mode ?>" />

	<input type="hidden" name="<?php echo $name ?>_tag" value="<?php echo $tag ?>" />

	<input type="hidden" name="<?php echo $name ?>_caller_id" value="<?php echo $caller_id ?>" />

	<?php if (!empty($play) && $hasValue): ?>
		<input type="hidden" name="show_player_with_url" value="<?php echo $play; ?>" />
	<?php endif; ?>

	<div class="audio-choice-selector" style="display: <?php echo (!$hasValue ? 'block' : 'none') ?>">
		<a href="" class="action close audio-choice-close-button" style="display: none;"><span class="replace"><?php echo lang('close'); ?></span></a>
		
		<div class="audio-choice-selector-item-wrapper">
			<div class="padding-and-border">
				<a href="read-text" class="audio-choice-selector-item">
					<span class="title"><?php echo lang('read_text'); ?></span><br />
					<span class="description"><?php echo lang('like_a_robot'); ?></span>
				</a>
			</div>
		</div>

		<div class="audio-choice-selector-item-wrapper">
			<div class="padding-and-border">
				<a href="upload" class="audio-choice-selector-item">
					<span class="title"><?php echo lang('upload'); ?></span><br />
					<span class="description"><?php echo lang('an_mp3_file'); ?></span>
				</a>
			</div>
		</div>

		<div class="audio-choice-selector-item-wrapper">
			<div class="padding-and-border">
				<a href="record" class="audio-choice-selector-item">
					<span class="title"><?php echo lang('record'); ?></span><br />
					<span class="description"><?php echo lang('using_a_phone'); ?></span>
				</a>
			</div>
		</div>

		<div class="audio-choice-selector-item-wrapper">
			<div class="padding-and-border last">
				<a href="library" class="audio-choice-selector-item">
					<span class="title"><?php echo lang('choose'); ?></span><br />
					<span class="description"><?php echo lang('from_your_library'); ?></span>
				</a>
			</div>
		</div>
	</div>
	
	<div class="audio-choice-editor" style="display: none;">
		<div class="audio-choice-editor-padding" style="padding: 10px;">
			<div class="audio-choice-read-text" style="display: none;">
				<div class="title-bar">
					<span class="editor-label"><?php echo lang('read_text_like_a_robot'); ?></span>
					<a href="" class="action close audio-choice-close-button"><span class="replace"><?php echo lang('close'); ?></span></a>
				</div>
				<br />
				<fieldset class="vbx-input-complex vbx-input-container" style="align: center;">
					<label class="field-label">
						<textarea class="voicemail-text"></textarea>
					</label>
				</fieldset>
				<button type="submit" class="inline-button submit-button"><span><?php echo lang('save'); ?></span></button>
				<br /><br />
			</div>
			
			<div class="audio-choice-upload" style="display: none;">
				<div class="title-bar">
					<span class="editor-label"><?php echo lang('upload_mp3'); ?></span>
					<a href="" class="action close audio-choice-close-button"><span class="replace"><?php echo lang('close'); ?></span></a>
				</div>
				<div style="height: 68px;">
					<div class="upload-bar-container" style="display: none;">
						<div class="description"><?php echo lang('uploading'); ?></div>
						<div class="upload-bar">
							<div class="upload-progress-bar">
							</div>
						</div>
						<br />
					</div>
					<div class="swfupload-container">
						<div class="explanation">
							<br />
							<span class="title"><?php echo sprintf(lang('click_select_file'), ini_get('upload_max_filesize')); ?></span><br />
							<span class="description"><?php echo lang('from_local_computer'); ?></span>
						</div>
					</div>
					<div class="swfupload-control">
						<input type="button" class="button" />
					</div>
				</div>
			</div>

			<div class="audio-choice-record" style="display: none;">
				<div class="title-bar">
					<span class="editor-label"><?php echo lang('record_using_phone'); ?></span>
					<a href="" class="action close audio-choice-close-button"><span class="replace"><?php echo lang('close'); ?></span></a>
				</div>
				<br />

				<div class="input">
					<div>
						<div class="error hide"></div>
						<table>
							<tr>
								<td colspan="2">
									<div style="padding-left: 20px; padding-right: 20px">
										<span class="description"><?php echo lang('record_using_phone_description'); ?></span>
									</div>
									<br />
								</td>
							</tr>
							<tr>
								<td style="vertical-align: bottom;">
									<label class="field-label">
										<?php echo lang('phone_number'); ?>:
										<input type="text" class="medium" name="number" value="<?php echo($first_device_phone_number); ?>" />
									</label>
								</td>
								<td style="vertical-align: bottom;">
									<button type="submit" class="inline-button submit-button"><span><?php echo lang('call_record'); ?></span></button>
								</td>
							</tr>
						</table>
					</div>
				</div>

				<div class="status scheduling" style="display: none;">
					<table><tr>
						<td valign="middle" style="vertical-align: middle;"><img src="<?php echo asset_url('assets/i/ajax-loader.gif')?>" alt="..." />&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td valign="middle" style="vertical-align: middle;"><?php echo lang('please_wait'); ?></td>
					</tr></table>
				</div>

				<div class="status in-call" style="display: none;">
					<table><tr>
						<td valign="middle" style="vertical-align: middle;"><img src="<?php echo asset_url('assets/i/ajax-loader.gif')?>" alt="..." />&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td valign="middle" style="vertical-align: middle;"><?php echo lang('calling_device'); ?></td>
					</tr></table>
				</div>
			</div>

			<div class="audio-choice-library" style="display: none;">
				<div class="title-bar">
					<span class="editor-label"><?php echo lang('choos_from_library'); ?></span>
					<a href="" class="action close audio-choice-close-button"><span class="replace"><?php echo lang('close'); ?></span></a>
				</div>

				<div class="empty-container" style="display: <?php echo ((count($library) == 0) ? 'block' : 'none'); ?>">
					<div class="description"><?php echo lang('no_recordings'); ?></div>
				</div>

				<div class="chooser-container" style="display: <?php echo ((count($library) > 0) ? 'block' : 'none'); ?>">
					<fieldset class="vbx-input-container">
						<select name="library">
							<option value=""><?php echo lang('choose_recording'); ?></option>
							<?php foreach ($library as $item): ?>
								<option value="<?php echo $item->url; ?>" title="<?php echo strtotime($item->created); ?>"><?php echo $item->label; ?></option>
							<?php endforeach; ?>
						</select>
						<br />
						<table class="player library-player" style="display: none;"><tr>
							<td>
								<a class="play playback-button library-play-button" href=""><span class="replace"><?php echo lang('play'); ?></span></a>
								<a class="pause playback-button library-pause-button" href=""><span class="replace"><?php echo lang('pause'); ?></span></a>
							</td>
							<td class="player-cell">
								<div class="player-bar library-player-bar">
									<div class="load-bar library-load-bar">
										<div class="play-bar library-play-bar"></div>
									</div>
								</div>
							</td>
							<td>
								&nbsp;&nbsp;
							</td>
							<td>
								<div class="library-play-time"><img src="<?php echo asset_url('assets/i/ajax-loader.gif')?>" alt="..." /></div>
							</td>
						</tr></table>
						<br />
						<button type="submit" class="inline-button submit-button"><span><?php echo lang('set_as_recording'); ?></span></button>
					</fieldset>
				</div>
			</div>
		</div>
	</div>

	<div class="audio-choice-current-value" style="display: <?php echo ($hasValue ? 'block' : 'none'); ?>">
		<div class="audio-choice-play-audio" style="display: <?php echo (!empty($play) ? 'block' : 'none'); ?>;">
			<table style="width: 100%"><tr>
				<td class="left-indicator">
					<b><?php echo lang('play_recording'); ?></b>
				</td>
				<td class="middle">
					<table class="player current-player" style="width: 100% !important;"><tr>
						<td>
							<a class="play playback-button current-play-button" href=""><span class="replace"><?php echo lang('play'); ?></span></a>
							<a class="pause playback-button current-pause-button" href=""><span class="replace"><?php echo lang('pause'); ?></span></a>
						</td>
						<td class="player-cell">
							<div class="player-bar current-player-bar">
								<div class="load-bar current-load-bar">
									<div class="play-bar current-play-bar"></div>
								</div>
							</div>
						</td>
						<td>
							&nbsp;&nbsp;
						</td>
						<td>
							<div class="current-play-time"><img src="<?php echo asset_url('assets/i/ajax-loader.gif')?>" alt="..." /></div>
						</td>
					</tr></table>
				</td>
				<td class="right-indicator">
					<a href="" class="change title"><?php echo lang('edit'); ?></a>
				</td>
			</tr></table>
		</div>

		<div class="audio-choice-read-text" style="display: <?php echo (!empty($say) ? 'block' : 'none'); ?>;">
			<table style="width: 100%"><tr>
				<td class="left-indicator">
					<b><?php echo lang('Read text'); ?></b>
				</td>
				<td class="middle">
					<span class="read-text"><?php echo $say; ?></span>
				</td>
				<td class="right-indicator">
					<a href="" class="change title"><?php echo lang('edit'); ?></a>
				</td>
			</tr></table>
			
		</div>
	</div>
	
</fieldset>
