<?php
include 'db_connect.php';
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM inventory WHERE id=$id");
    header("Location: display.php");
}
?>
