<h1>Blog posts</h1>
<?php echo $this->Html->link(
    'Logout',
    array('controller' => 'users', 'action' => 'logout')
); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($products as $product): ?>
    <tr>
        <td><?php echo $product['products']['id']; ?></td>
        <td>
            <?php  echo $this->Html->link($product['products']['product_name'],array('controller' => 'products', 'action' => 'view', $product['products']['id']));
          //  echo $product['Product']['product_name'];

            ?>
        </td>
        <td>
                    <?php
                        echo $this->Html->link(
                            'Edit',
                            array('action' => 'edit', $product['products']['id'])
                        );
                    ?>
         </td>
         <td>
                  <?php
                                echo $this->Form->postLink(
                                    'Delete',
                                    array('action' => 'delete', $product['products']['id']),
                                    array('confirm' => 'Are you sure?')
                                );
                            ?>
         </td>
        <td><?php echo $product['products']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
<?php echo $this->Html->link(
    'Add Product',
    array('controller' => 'products', 'action' => 'add')
); ?>

<?php echo $this->Html->link(
    'Add Users',
    array('controller' => 'users', 'action' => 'add')
); ?>