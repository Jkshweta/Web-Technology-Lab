<?php
include 'db_connect.php';
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
$result = $conn->query("SELECT * FROM inventory");
?>
<table>
    <tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['item_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td>
                <a href="delete.php?delete=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
                <a href="update.php?id=<?php echo $row['id']; ?>" class="update-btn">Update</a>
            </td>
        </tr>
    <?php } ?>
</table>
