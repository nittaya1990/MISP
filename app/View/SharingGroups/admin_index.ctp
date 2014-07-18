<div class="sharingGroups index">
	<h2><?php echo __('Sharing Groups'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped table-condensed">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('uuid'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($sharingGroups as $sharingGroup): ?>
	<tr>
		<td><?php echo h($sharingGroup['SharingGroup']['id']); ?>&nbsp;</td>
		<td><b><?php echo h($sharingGroup['SharingGroup']['name']); ?></b>&nbsp;<br>
            <?php echo implode(', ', Set::extract('/Organisation/name', $sharingGroup));?>
        </td>
        <td><?php echo h($sharingGroup['SharingGroup']['uuid']); ?>&nbsp;</td>
		<td><?php echo h($sharingGroup['SharingGroup']['description']); ?>&nbsp;</td>
		<td class="short action-links">
			<?php
			echo $this->Html->link('', array('admin' => true, 'action' => 'edit', $sharingGroup['SharingGroup']['id'],), array('class' => 'icon-edit', 'title' => 'Edit'));
			echo $this->Form->postLink('', array('admin' => true, 'action' => 'delete', $sharingGroup['SharingGroup']['id']), array('class' => 'icon-trash', 'title' => 'Delete'), __('Are you sure you want to delete # %s?', $sharingGroup['SharingGroup']['id']));
			?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pagination">
		<ul>
	<?php
		echo $this->Paginator->prev('&laquo; ' . __('previous'), array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'class' => 'prev disabled', 'escape' => false, 'disabledTag' => 'span'));
		echo $this->Paginator->numbers(array('modulus' => 20, 'separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'span'));
		echo $this->Paginator->next(__('next') . ' &raquo;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'class' => 'next disabled', 'escape' => false, 'disabledTag' => 'span'));
	?>
</ul>
	</div>
</div>

<?php echo $this->element('side_menu', array('menuList' => 'admin', 'menuItem' => 'indexSharingGroup'));?>