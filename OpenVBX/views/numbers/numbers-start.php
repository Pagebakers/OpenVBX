<?php
	$class = 'numbers-blank';
	if($count_real_numbers > 0)
	{
		$class .= ' hide';
	}
?>
<div class="<?php echo $class; ?>">
	<h2><?php echo lang('numbers_blank'); ?></h2>
	<p><?php echo lang('numbers_blank_description'); ?></p>
	<button class="add-button add number"><span><?php echo lang('get_a_number'); ?></span></button>
</div>