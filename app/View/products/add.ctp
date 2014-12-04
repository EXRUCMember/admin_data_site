<h1>Add Product</h1>
<?php $cate_name = array();
      $cate_id = array();
?>
<?php foreach ($categorys as $category): ?>
<?php
  array_push($cate_name, $category['Category']['category_name']);
  array_push($cate_id, $category['Category']['id']);
  ?>
<?php endforeach; ?>
<?php $option = array_combine($cate_id,$cate_name); ?>

<?php
echo $this->Form->create('Product',array('type' => 'file'));
echo $this->Form->input('product_name');
echo $this->Form->input('product_description', array('rows' => '3'));
echo $this->Form->input('product_price');
echo $this->Form->input('product_discount');
echo $this->Form->input('product_color');
echo $this->Form->input('product_size');
echo $this->Form->input('product_image',array('type' => 'file'));
echo $this->Form->input('cate_id', array(
            'options' => $option
        ));
// need CATEGORIES
echo $this->Form->end('Save Product');
?>