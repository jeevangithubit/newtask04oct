<h2>Shopping Cart</h2>

<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>
        <?php foreach($cart as $item){ ?>
        <tr>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><?php echo $item['qyt']; ?></td>
            <td>
                <a href="<?php echo base_url('web/delete/'.$item['id']); ?>">Remove</a>
            </td>
        </tr>
        <?php } ?>
    
</table>
