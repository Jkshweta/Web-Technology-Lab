<?php
include 'db_connect.php';
include 'navbar.php';
?>
<link rel="stylesheet" type="text/css" href="style.css">

<h2>Inventory Management System</h2>

<!-- Add Item -->
<form method="POST">
    <input type="text" name="item_name" placeholder="Item Name" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <input type="text" name="price" placeholder="Price" required>
    <button type="submit" name="add">Add Item</button>
</form>

<?php
// Insert Item
if (isset($_POST['add'])) {
    $name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $conn->query("INSERT INTO inventory (item_name, quantity, price) VALUES ('$name', '$quantity', '$price')");
    header("Location: index.php");
}
?>

<!-- Display Items -->
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
                <a href="index.php?delete=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
                <a href="index.php?update=<?php echo $row['id']; ?>" class="update-btn">Update</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php
// Delete Item
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM inventory WHERE id=$id");
    header("Location: index.php");
}

// Update Item
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $item = $conn->query("SELECT * FROM inventory WHERE id=$id")->fetch_assoc();
?>
    <h2>Update Item</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="item_name" value="<?php echo $item['item_name']; ?>" required>
        <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" required>
        <input type="text" name="price" value="<?php echo $item['price']; ?>" required>
        <button type="submit" name="update">Update Item</button>
    </form>
<?php
}

// Process Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $conn->query("UPDATE inventory SET item_name='$name', quantity='$quantity', price='$price' WHERE id=$id");
    header("Location: index.php");
}
?>
