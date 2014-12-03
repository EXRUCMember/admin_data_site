
<?php
echo $this->Form->create('Category');
echo $this->Form->input('category_name');
echo $this->Form->input('category_description', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Category');
?>