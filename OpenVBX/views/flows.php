<div class="vbx-content-main vbx-flows">

		<div class="vbx-content-menu vbx-content-menu-top">
			<h2 class="vbx-content-heading"><?php echo lang('flows'); ?></h2>
			<?php if(!empty($items)): ?>
			<ul class="flows-menu vbx-menu-items-right">
				<li class="menu-item"><button class="add-button add-flow" type="button"><span><?php echo lang('new_flow'); ?></span></button></li>
			</ul>
			<?php endif; ?>
			<?php echo $pagination; ?>
		</div><!-- vbx-content-menu -->

		<?php if(!empty($items)): ?>

		<div class="vbx-table-section">
		<table id="flows-table" class="vbx-items-grid">
			<thead>
				<tr class="items-head">
					<th class="flow-name"><?php echo lang('name'); ?></th>
					<th class="flow-numbers"><?php echo lang('phone_numbers'); ?></th>
					<th class="flow-voice"><?php echo lang('call_flow'); ?></th>
					<th class="flow-sms"><?php echo lang('sms_flow'); ?></th>
					<th class="flow-delete"><?php echo lang('delete'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($items as $item): ?>
				<tr id="flow-<?php echo $item['id']?>" class="items-row <?php if(in_array($item['id'], $highlighted_flows)): ?>highlight-row<?php endif; ?>">
					<td>
						<span class="flow-name-display"><?php echo $item['name']; ?></span>
						<span class="flow-name-edit" style="display: none;">
							<input type="text" name="flow_name" value="<?php echo $item['name'] ?>" data-orig-value="<?php echo $item['name']; ?>"/>
							<button name="save" value="Save" data-action="/flows/edit/<?php echo $item['id']; ?>" class="submit-button"><span><?php echo lang('save'); ?></span></button>
							<span class="sep">|</span> <a href="#cancel" class="flow-name-edit-cancel"><?php echo lang('cancel'); ?></a>
						</span>
					</td>
					<?php if(empty($item['numbers'])): ?>
					<td>None</td>
					<?php else: ?>
					<td><?php echo implode(', ', $item['numbers']); ?></td>
					<?php endif; ?>
					<td><a href="<?php echo site_url("flows/edit/{$item['id']}"); ?>#flowline/start"><?php echo is_null($item['voice_data'])? lang('create') : lang('edit') ?> <?php echo lang('call_flow'); ?></a></td>
					<td><a href="<?php echo site_url("flows/sms/{$item['id']}"); ?>#flowline/start"><?php echo is_null($item['sms_data'])? lang('create') : lang('edit') ?> <?php echo lang('sms_flow'); ?></a></td>
					<td class="flow-delete"><a href="flows/edit/<?php echo $item['id'];?>" class="trash action" title="<?php echo lang('delete'); ?>"><span class="replace"><?php echo lang('delete'); ?></span></a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table><!-- .vbx-items-grid -->
		</div><!-- .vbx-table-section -->

		<?php else: ?>

		<div class="vbx-content-container">
				<div class="flows-blank">
						<h2><?php echo lang('flows_blank'); ?></h2>
						<p><?php echo lang('flows_blank_description'); ?></p>
						<button class="add-button add-flow" type="button"><span><?php echo lang('new_flow'); ?></span></button>			
				</div>
			<div class="vbx-content-section">
			</div><!-- .vbx-content-section -->
		</div><!-- .vbx-content-container -->

		<?php endif; ?>

</div><!-- .vbx-content-main -->

<div id="dialog-templates" style="display: none">
	<div id="dAddFlow" title="<?php echo lang('add_new_flow'); ?>" class="dialog">
		<form action="<?php echo site_url('flows'); ?>" method="post" class="vbx-form">
			<fieldset class="vbx-input-container">
			<label class="field-label"><?php echo lang('flow_name'); ?>
			<input type="text" name="name" class="medium" />
			</label>
			</fieldset>
		</form>
	</div>

	<div id="dDeleteFlow" title="<?php echo lang('delete_flow'); ?>" class="dialog">
		<p><?php echo lang('delete_flow_confirm'); ?></p>
	</div>

	<div id="dCopyFlow" title="<?php echo lang('copy_flow'); ?>" class="dialog">
		<form action="#" method="post" class="vbx-form">
			<fieldset class="vbx-input-container">
			<label class="field-label"><?php echo lang('copy_flow_name'); ?>
			<input type="text" name="name" class="medium" />
			</label>
			</fieldset>
		</form>
	</div>
</div>