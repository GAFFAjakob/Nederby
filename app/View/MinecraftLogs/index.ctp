<div class="minecraftLogs index">
	<h2><?php echo __('Minecraft Logs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
	</tr>
	<?php
	foreach ($minecraftLogs as $minecraftLog): ?>
	<tr>
		<td><?php echo h($minecraftLog['MinecraftLog']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($minecraftLog['User']['username'], array('controller' => 'users', 'action' => 'view', $minecraftLog['User']['id'])); ?>
		</td>
		<td><?php echo h($minecraftLog['MinecraftLog']['content']); ?>&nbsp;</td>
		<td><?php echo h($minecraftLog['MinecraftLog']['modified']); ?>&nbsp;</td>
		<td><?php echo h($minecraftLog['MinecraftLog']['created']); ?>&nbsp;</td>
		
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
