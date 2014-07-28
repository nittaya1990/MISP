<div class="sharingGroups form">
<?php echo $this->Form->create('SharingGroup'); ?>
	<fieldset>
		<legend><?php echo __('Add Sharing Group'); ?></legend>
	<?php
		echo $this->Form->input('name');
        //echo $this->Form->input('uuid');
        echo $this->Form->input('sharable');
		echo $this->Form->input('description', array('class' => 'input-xxlarge', 'div' => 'clear'));
	?>
	</fieldset>
<?php echo $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
</div>
<?php
    echo $this->element('side_menu', array('menuList' => 'admin', 'menuItem' => 'addSharingGroup'));
?>