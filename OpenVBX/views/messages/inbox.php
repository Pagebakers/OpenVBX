	<div class="vbx-content-main">

		<?php if(empty($items)): ?>

		<div class="vbx-content-container">
			<div class="vbx-content-section">
				<div class="messages-blank">
					<h2><?php echo sprintf(lang('messages_blank'), $group_name); ?></h2>
					<p><?php echo sprintf(lang('messages_blank_description'), $group_name); ?></p>
				</div>
			</div><!-- .vbx-content-section -->
		</div><!-- .vbx-content-container -->

		<?php else: ?>
			
		<div class="vbx-content-menu vbx-content-menu-top">
			<ul class="inbox-menu vbx-menu-items-left">
				<li class="menu-item"><a href="" class="dropdown-select-button link-button"><span><?php echo lang('select'); ?></span></a>
					<ul class="hide">
						<li><a class="select select-all" href=""><?php echo lang('select_all'); ?></a></li>
						<li><a class="select select-none" href=""><?php echo lang('select_none'); ?></a></li>
						<li><a class="select select-read" href=""><?php echo lang('select_read'); ?></a></li>
						<li><a class="select select-unread" href=""><?php echo lang('select_unred'); ?></a></li>
					</ul>
				</li>
				<li class="menu-item"><a href="" class="delete-button link-button"><span><?php echo lang('delete'); ?></span></a></li>
			</ul><!-- .vbx-menu-items -->

			<?php echo $pagination; ?>
		</div><!-- .vbx-content-menu -->



		<table border="0" class="vbx-items-grid">
			<tbody>
				<?php foreach($items as $item): ?>
				<tr rel="<?php echo $item['id'] ?>" class="message-row <?php echo ($item['type']=='sms')? 'sms-type' : 'call-type'?> <?php echo ($item['unread'])? 'unread' : 'read'?>">
					<td class="message-select">
						<div style="padding: 6px">
							<input type="checkbox" name="message[id][]" value="<?php echo $item['id'] ?>" />
						</div>
					</td>
					<td class="message-caller message-details-link">
						<span class="phone-number"><?php echo $item['caller'] ?></span>
						<a href="<?php echo site_url("messages/details/{$item['id']}")?>" class="quick-call-button"><span class="replace"><?php echo $item['caller'] ?></span></a>
						<?php if($item['type'] == 'sms'): ?>
						<a href="<?php echo site_url("messages/details/{$item['id']}")?>" class="quick-sms-button"><span class="replace"><?php echo $item['caller'] ?></span></a>
						<?php endif; ?>

						<div id="quick-call-popup-<?php echo $item['id'] ?>" class="quick-call-popup hide">
							<a href="" class="close action toggler"><span class="replace"><?php echo lang('close'); ?></span></a>
							<p class="call-to-phone"><?php echo $item['caller'] ?></p>
							<ul class="caller-id-phone">
								<li><a href="<?php echo site_url("messages/details/{$item['id']}/callback") ?>" class="call"><?php echo lang('call'); ?><span class="to hide"><?php echo $item['caller'] ?></span> <span class="callerid hide"><?php echo $item['called'] ?></span><span class="from hide"><?php echo isset($user_numbers[0])? $user_numbers[0]->value : '' ?></span></a></li>
							</ul>
						</div>

						<?php if($item['type'] == 'sms'): ?>
						<div id="quick-sms-popup-<?php echo $item['id'] ?>" class="quick-sms-popup hide">
							<a href="" class="close action sms-toggler"><span class="replace"><?php echo lang('close'); ?></span></a>
							<input class="sms-message" type="text" name="content" />
							<span class="count">160</span>
							<button class="send-button" rel="<?php echo $item['id'] ?>"><span><?php echo lang('send'); ?></span></button>
							<img class="sending-sms-loader hide" src="<?php echo asset_url('assets/i/ajax-loader.gif')?>" alt="..." />
							<p class="sms-to-phone hide"><?php echo $item['caller'] ?></p>
							<p class="from-phone hide"><?php echo $item['called'] ?></p>
						</div>
						<?php endif; ?>
					</td>
					<td class="message-playback">
						<?php if($item['type'] != 'sms'): ?>
						<a id="play-<?php echo $item['id'] ?>" href="<?php echo site_url("messages/details/{$item['id']}") ?>" class="play playback-button quick-play">
							<span class="replace"><?php echo lang('play'); ?></span>
							<span class="call-duration"><?php echo $item['recording_length'] ?></span>
						</a>
						<?php endif; ?>
					</td>
					<td class="message-content message-details-link">
							<span class="transcript"><?php echo $item['short_summary'] ?></span>
							<table id="player-<?php echo $item['id'] ?>" class="player" style="display: none;">
								<tr>
								<td width="100%">
									<div id="player-bar-<?php echo $item['id']?>" class="player-bar">
										<div id="load-bar-<?php echo $item['id']?>" class="load-bar">
											<div id="play-bar-<?php echo $item['id']?>" class="play-bar"></div>
										</div>
									</div>
								</td>
								<td>
									<div class="play-time"><img src="<?php echo asset_url('assets/i/ajax-loader.gif')?>" alt="..." /></div>
								</td>
							</tr></table>
					</td>
					<td class="message-owner">
						<?php if($item['type'] == 'voice'): ?>
						<?php if($item['owner_type'] == 'group'): ?>

						<a href="" class="unassigned assign-button"><span class="replace"><?php echo lang('assign_to'); ?></span></a>
						<span class="owner-name" title="<?php echo format_name($item['assigned_user']) ?>">
							<?php 
								if (!empty($item['assigned_user'])) {
									echo format_name_as_initials($item['assigned_user']);
								} 
							?>
						</span>

						<div class="assign-to-popup hide">
							<a href="" class="close action toggler"><span class="replace"><?php echo lang('close'); ?></span></a>
							<p class="popup-label"><?php echo lang('assign_to'); ?></p>
							<ul class="assign-user-list">
								<?php foreach($active_users as $u): ?>
								<li class="<?php echo ($u->id == $item['assigned'])? 'assigned ' : ''?>user"><a rel="<?php echo $u->id?>" href=""><?php echo format_name($u) . ' (' . format_name_as_initials($u) . ')' ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>

						<?php endif; ?>
						<?php endif; ?>

					</td>
					<td class="message-status message-details-link">
						<?php if($item['type'] == 'voice'): ?>
						<span class="<?php echo $item['ticket_status'] ?>-status message-status-label"><span class="replace"><?php echo lang('open'); ?></span></span>
						<?php endif;?>
					</td>
					<td class="message-timestamp message-details-link">
						<div class="unformatted-absolute-timestamp hide">
							<?php echo strtotime($item['received_time']) ?>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table><!-- .vbx-items-grid -->

		<div class="vbx-content-menu vbx-content-menu-bottom">
			<ul class="inbox-menu vbx-menu-items">
				<li class="menu-item"><a href="" class="dropdown-select-button link-button"><span><?php echo lang('select'); ?></span></a>
					<ul class="hide">
						<li><a class="select select-all" href=""><?php echo lang('select_all'); ?></a></li>
						<li><a class="select select-none" href=""><?php echo lang('select_none'); ?></a></li>
						<li><a class="select select-read" href=""><?php echo lang('select_read'); ?></a></li>
						<li><a class="select select-unread" href=""><?php echo lang('select_unread'); ?></a></li>
					</ul>
				</li>
				<li class="menu-item"><a href="" class="delete-button link-button"><span><?php echo lang('delete'); ?></span></a></li>
			</ul><!-- .vbx-menu-items -->

			<?php echo $pagination; ?>
		</div><!-- .vbx-content-menu -->

		<?php endif; ?>

	</div><!-- .vbx-content-main -->
