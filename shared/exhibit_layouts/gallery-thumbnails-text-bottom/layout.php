<?php 
	//Name: Thumbnail Gallery;
	//Description: Displays a gallery of up to 12 items;
	//Author: Jeremy Boggs; 
?>

<div class="gallery-thumbnails-text-bottom">
<div class="primary">
	<?php if($item=page_item(1)):?>

	<div class="exhibit-item">
	<?php $item = page_item(1); ?>
	<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
</div>
<?php endif; ?>
<?php if($item=page_item(2)): ?>
<div class="exhibit-item">
	<?php $item = page_item(2); ?>
	<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
</div>
<?php endif; ?>
<?php if($item=page_item(3)):?>
<div class="exhibit-item">
	<?php $item = page_item(3); ?>
	<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
</div>
<?php endif; ?>
<?php if($item=page_item(4)):?>
<div class="exhibit-item">
	<?php $item = page_item(4); ?>
	<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
</div>
<?php endif; ?>
<?php if($item = page_item(5)):?>
<div class="exhibit-item">
	<?php $item = page_item(5); ?>
	<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
</div>
<?php endif; ?>
	<?php if($item = page_item(6)):?>
	<div class="exhibit-item">
		<?php $item = page_item(6); ?>
		<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
	</div>
	<?php endif; ?>
	<?php if($item = page_item(7)):?>
	<div class="exhibit-item">
		<?php $item = page_item(7); ?>
		<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
	</div>
	<?php endif; ?>
	<?php if($item = page_item(8)):?>
	<div class="exhibit-item">
		<?php $item = page_item(8); ?>
		<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
	</div>
	<?php endif; ?>
	<?php if($item = page_item(9)):?>
	<div class="exhibit-item">
		<?php $item = page_item(9); ?>
		<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
	</div>
	<?php endif; ?>
	<?php if($item = page_item(10)):?>
	<div class="exhibit-item">
		<?php $item = page_item(10); ?>
		<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
	</div>
	<?php endif; ?>
	<?php if($item = page_item(11)):?>
	<div class="exhibit-item">
		<?php $item = page_item(11); ?>
		<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
	</div>
	<?php endif; ?>
	<?php if($item = page_item(12)):?>
	<div class="exhibit-item">
		<?php $item = page_item(12); ?>
		<?php echo exhibit_thumbnail($item, array('class'=>'permalink')); ?>
	</div>
	<?php endif; ?>
	</div>
	<div class="secondary">
	<div class="exhibit-text">
	<?php echo page_text(1); ?>
	</div>
	</div>

</div>