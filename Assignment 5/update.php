<?php
include 'db_connect.php';
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $conn->query("UPDATE inventory SET item_name='$name', quantity='$quantity', price='$price' WHERE id=$id");
    header("Location: display.php");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM inventory WHERE id=$id")->fetch_assoc();
?>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="item_name" value="<?php echo $result['item_name']; ?>" required>
    <input type="number" name="quantity" value="<?php echo $result['quantity']; ?>" required>
    <input type="text" name="price" value="<?php echo $result['price']; ?>" required>
    <button type="submit" name="update">Update Item</button>
</form>
