<h1>Blog posts</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($products as $product): ?>
    <tr>
        <td><?php echo $product['Product']['id']; ?></td>
        <td>
            <?php // echo $this->Html->link($product['Product']['product_name'],array('controller' => 'products', 'action' => 'view', $products['Product']['id']));
            echo $product['Product']['product_name']
            ?>
        </td>
        <td><?php echo $product['Product']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($product); ?>
</table>