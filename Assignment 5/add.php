<?php
include 'db_connect.php';
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
if (isset($_POST['add'])) {
    $name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $conn->query("INSERT INTO inventory (item_name, quantity, price) VALUES ('$name', '$quantity', '$price')");
    header("Location: display.php");
}
?>
<form method="POST">
    <input type="text" name="item_name" placeholder="Item Name" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <input type="text" name="price" placeholder="Price" required>
    <button type="submit" name="add">Add Item</button>
</form>
