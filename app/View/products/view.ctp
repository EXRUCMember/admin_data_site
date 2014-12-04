<h1><?php echo h($product['Product']['product_name']); ?></h1>

<p><small>Created: <?php echo $product['Product']['created']; ?></small></p>

<p><?php echo h($product['Product']['product_description']); ?></p>

 <?php  echo $this->Html->image('uploads/' . $product['Product']['product_image'],array('alt'=>'advertisement', 'height'=>'100','width'=>'100')); ?>