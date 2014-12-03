<?php
class Product extends AppModel {
    public $validate = array(
        'product_name' => array(
            'rule' => 'notEmpty'
        ),
        'product_description' => array(
            'rule' => 'notEmpty'
        )
    );
    public function isOwnedBy($product, $user) {
        return $this->field('id', array('id' => $product, 'user_id' => $user)) !== false;
    }
}
?>