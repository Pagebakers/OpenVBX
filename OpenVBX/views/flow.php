<?php
if(isset($flow_data)) printf('<script type="text/javascript">var flow_data = %s;</script>', json_encode($flow_data));
?>
<div id="prototypes">
	<?php foreach($applets as $applet): ?>
	<div id="prototype-<?php echo $applet->id ?>" class="flow-instance content-section <?php echo $applet->id ?> <?php echo $applet->css_class_name ?> hide">
		<a href="" class="minimize action close-flow-instance" title="<?php echo lang('minimize'); ?>"><span class="replace"><?php echo lang('minimize'); ?></span></a>
		<h2 class="applet-name"><?php echo $applet->name ?></h2>
		<div class="settings-panel">
			<?php echo $applet->render($flow->id); ?>
		</div><!-- .settings-panel -->
	</div><!-- .content-section -->
	<?php endforeach; ?>
	
</div><!-- #prototypes -->

<div id="flow-meta">
	  <div id="flow-<?php echo $flow->id ?>" class="flow-id"></div>
</div><!-- #flow-meta -->

<div action="<?php echo site_url('flows/save'); ?>" method="post" class="vbx-form <?php echo $editor_type ?>">
	<input type="hidden" name="flow-name" class="flow-name" value="<?php echo $flow->name?>" />
	<input type="hidden" name="flow-id" class="flow-id" value="<?php echo $flow->id?>" />
	<div class="vbx-content-container">

	<div class="yui-ge">

		<div class="yui-u first">

		<div id="flowline">

		<div id="instances">

			<table id="instance-table">

				<tr id="instance-row">

					<?php foreach($flow_data as $instance_id => $instance): ?>
					<?php $applet = isset($applets[$instance->type]) ? $applets[$instance->type] : null; ?>
					<?php if(is_object($applet)): ?>
					<?php $template = $applet->render($flow->id, $instance); ?>
					<td class="instance-cell">
						<form>
						<div id="<?php echo $instance->id ?>" rel="<?php echo $applet->id ?>" class="flow-instance <?php echo $applet->id ?> <?php echo $applet->css_class_name ?> hide">
							<?php if($instance_id != "start"): ?>
							<a href="" class="minimize action close-flow-instance" title="Minimize"><span class="replace"><?php echo lang('minimize'); ?></span></a>
							<?php endif; ?>
							<h2 class="applet-name"><?php echo ($editor_type == 'voice')? $applet->voice_title : (($editor_type == 'sms')? $applet->sms_title : $applet->title); ?></h2>
							<div class="settings-panel vbx-applet">
								<?php echo $template ?>
								<a class="view-source" target="_new" href="<?php echo site_url('twiml/applet/'.$editor_type.'/'.$flow->id.'/'.$instance->id) ?>"><?php echo lang('view_twiml'); ?></a>
							</div><!-- .settings-panel -->
						</div><!-- .flow-instance -->
						</form>
					</td><!-- .instance-cell -->

					<?php endif; ?>
					<?php endforeach; ?>

				</tr><!-- #instance-row -->

			</table><!-- #instance-table -->

		</div><!-- #instances -->

		</div><!-- #flowline -->

		</div> <!-- .yui-u .first -->

		<div class="yui-u">

			<div id="items-toolbox">
			<?php $type = substr_replace($editor_type, strtoupper(substr($editor_type, 0, 1)), 0, 1); ?>
			<h3><?php echo $type; ?> <?php echo lang('applets'); ?></h3>
				<?php foreach($applets as $applet) : ?>
				<?php if(!$applet->disabled && $applet->visible === true && in_array($editor_type, $applet->type)): ?>
				<a rel="<?php echo $applet->id ?>" class="applet-item" title="<?php echo $applet->description ?>">
					 <span id="<?php echo $applet->id ?>" class="applet-icon" style="background: url(<?php echo $applet->icon_url ?>) no-repeat center center;">
						<span class="replace"><?php echo ($editor_type == 'voice')? $applet->voice_name : (($editor_type == 'sms')? $applet->sms_name : $applet->name); ?></span>
					 </span>
					 <span class="applet-name"><?php echo ($editor_type == 'voice')? $applet->voice_name : (($editor_type == 'sms')? $applet->sms_name : $applet->name); ?></span>
				</a>
				<?php endif; ?>
				<?php endforeach; ?>
			</div>

		</div>

	</div><!-- .yui-ge 3/4, 1/4 -->
		
	</div><!-- .content-container -->
	<div id="dialog-templates" style="display: none">
		<div id="dialog-app-delete" class="dialog hide" title="<?php echo lang('delete_applet'); ?>">
			<p><?php echo lang('delete_applet_confirm'); ?></p>
		</div>

		<div id="dialog-save-as" class="dialog" title="<?php echo lang('save_as'); ?>">
			<p><?php echo lang('save_as_flow'); ?></p>
			<div class="vbx-input-container">
				<label class="field-label"><?php echo lang('flow_name'); ?>
					<input type="text" class="medium" name="name" value="" />
				</label>
			</div>
		</div>

		<div id="dialog-select-audio" class="dialog hide" title="<?php echo lang('select_audio'); ?>">
		</div>

		<div id="dialog-replace-applet" class="dialog hide" title="<?php echo lang('replace_applet'); ?>">
			<p><?php echo lang('replace_applet_confirm'); ?></p>
		</div>

		<div id="dialog-remove-applet" class="dialog hide" title="<?php echo lang('remove_applet'); ?>">
			<p><?php echo lang('remove_applet_confirm'); ?></p>
		</div>

		<div id="dialog-close" class="dialog hide" title="<?php echo lang('flow_modified'); ?>">
			<p><?php echo lang('flow_modified_confirm'); ?></p>
		</div>
	</div>
</div>

<?php include("user_group_dialogs.php"); ?>
