<?php echo 'hello'   ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($categorys as $category): ?>
    <tr>
        <td><?php echo $category['Category']['id']; ?></td>
        <td>
            <?php  //echo $this->Html->link($category['Category']['category_name'],array('controller' => 'categorys', 'action' => 'view', $category['Category']['id']));
            echo $category['Category']['category_name']
            ?>
        </td>
        <td>
                     <?php
                     echo $this->Html->link(
                                                'Edit',
                                                array('action' => 'edit', $category['Category']['id'])
                                            );
                    ?>
        </td>
         <td>
                     <?php
                       echo $this->Form->postLink(
                                            'Delete',
                                            array('action' => 'delete', $category['Category']['id']),
                                            array('confirm' => 'Are you sure?')
                                        );
                     ?>
         </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($category); ?>
</table>
<?php echo $this->Html->Link('add Category', array('action'=>'add'))  ?>