<?php $items = items(); ?>
<div id="detailed">
<?php foreach($items as $key => $item):?>
<div class="item">
	<h2><?php link_to_item($item); ?></h2>

	<div class="meta">
		<ul>
			<li><span class="fieldname">Creator:</span> <?php echo h($item->creator); ?></li>
			<li><span class="fieldname">Added:</span> <?php echo h($item->added); ?></li>
				<?php if($item->Collection->exists()): ?>
			<li><span class="fieldname">Collection:</span> <?php echo h($item->Collection->name); ?></li>
			<?php endif; ?>
			<li><span class="fieldname">Public</span> <?php checkbox(array('name'=>"items[$item->id][public]",'class'=>"make-public"), $item->public); ?></li>
			<li><span class="fieldname">Featured</span> <?php checkbox(array('name'=>"items[$item->id][featured]",'class'=>"make-featured"), $item->featured); ?>
			<?php hidden(array('name'=>"items[$item->id][id]"), $item->id); ?>	
				</li>
		</ul>
	</div>
	<div class="description">

	<?php if (has_thumbnail($item) == null): ?>
		<?php echo nls2p(snippet($item->description, 0, 300)); ?>
		<?php else: ?>
		<a class="thumbnail" href="<?php echo uri('items/show/'.$item->id); ?>"><?php thumbnail($item);?></a> 
		<?php echo nls2p(snippet($item->description, 0, 100)); ?>
	<?php endif; ?>
	</div>

</div>
<?php endforeach; ?>
</div>