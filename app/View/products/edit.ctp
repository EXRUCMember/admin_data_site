<h1>Edit Product</h1>
<?php
echo $this->Form->create('Product');
echo $this->Form->input('product_name');
echo $this->Form->input('product_description', array('rows' => '3'));
echo $this->Form->input('product_price');
echo $this->Form->input('product_discount');
echo $this->Form->input('product_color');
echo $this->Form->input('product_size');
//echo $this->Form->input('product_image');
// need CATEGORIES
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Product');
?>