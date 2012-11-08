<h3 class="vbx-table-section-header vbx-header-other-numbers"><?php echo lang('numbers_other_domain'); ?> <a class="toggle-link"  href="#vbx-other-numbers"><span class="show"><?php echo lang('show'); ?></span><span class="hide"><?php echo lang('hide'); ?></span></a></h3>
<div id="vbx-other-numbers" class="vbx-numbers-section" style="display: none;">
	<div class="vbx-numbers-section-info">
	  <?php echo lang('numbers_section_info'); ?>
	</div>
	<table class="phone-numbers-table vbx-items-grid" data-type="other">
		<thead>
			<tr class="items-head">
				<th class="incoming-number-phone"><?php echo lang('phone_number'); ?></th>
				<th class="incoming-number-flow"></th>
				<th class="incoming-number-caps"><?php echo lang('capabilities'); ?></th>
				<th class="incoming-number-delete">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($other_numbers as $item): 
				$classname = 'items-row';
				if (in_array($item->id, $highlighted_numbers))
				{
					$classname .= ' highlight-row';
				}
				if ($item->id == 'Sandbox')
				{
					$classname .= ' sandbox-row';
				}
			?>
			<tr rel="<?php echo $item->id; ?>" class="<?php echo $classname; ?>">
				<td class="incoming-number-phone"> 
					<?php if ($item->id == 'Sandbox'): /* Sandbox */?>
						<span class="sandbox-label">SANDBOX</span>
					<?php elseif ($item->phone_formatted != $item->name): /* Sandbox */ ?>
						<span class="number-label"><?php echo $item->name; ?></span>
					<?php endif; /* Sandbox */ ?>
					<?php 
						echo $item->phone; 
						echo !empty($item->pin)? ' '.lang('pin').': '.$item->pin : '';
					?> <a href="#<?php echo $item->id; ?>" class="incoming-number-details-toggle toggle-link">details</a>
					<br />
					<ul id="other-details-<?php echo $item->id; ?>" class="incoming-number-other-detail" style="display: none;">
						<?php if (!empty($item->url)): ?>
							<li><b><?php echo lang('url'); ?>:</b> <?php echo $item->url; ?></li>
						<?php endif; ?>
						<?php if (!empty($item->smsUrl)): ?>
							<li><b><?php echo lang('sms_url'); ?>:</b> <?php echo $item->smsUrl; ?></li>
						<?php endif; ?>
					</ul>
				</td>
				<td class="incoming-number-flow">
					<?php
						$settings = array(
							'name' => 'flow_id',
							'id' => 'flow_select_'.$item->id
						);
						$flow_options['-'] = lang('import_number');
						echo t_form_dropdown($settings, $flow_options);
					?>
					<span class="status"><?php echo $item->status ?></span>
				</td>
				<td class="incoming-number-caps">
					<?php 
						if (!empty($item->capabilities))
						{
							echo implode(', ', $item->capabilities);
						}
					?>
				</td>
				<td class="incoming-number-delete">
				<?php if(empty($item->pin)): ?>
					<a href="numbers/delete/<?php echo $item->id; ?>" class="action trash delete"><span class="replace"><?php echo lang('delete'); ?></span></a>
				<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div><!-- /.vbx-numbers-section -->