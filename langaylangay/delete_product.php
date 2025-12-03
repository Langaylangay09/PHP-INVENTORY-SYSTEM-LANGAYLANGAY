<?php
include 'database.php';

if (isset($_GET['id'])) {

    $product_id = intval($_GET['id']);

    $sql = "DELETE FROM products WHERE product_ID = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product deleted successfully.'); 
        window.location.href='index.php#Products';</script>";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
