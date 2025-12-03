<?php
include 'database.php';

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM products WHERE product_ID = $product_id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Product not found.";
    exit;
}

$product = $result->fetch_assoc();

$cat_sql = "SELECT * FROM categories";
$cat_result = $conn->query($cat_sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['product_Name'];
    $category = $_POST['category_ID'];
    $quantity = $_POST['product_Quantity'];
    $price = $_POST['product_Price'];

    $update_sql = "
        UPDATE products SET 
            product_Name='$name', 
            category_ID='$category', 
            product_Quantity='$quantity', 
            product_Price='$price' 
        WHERE product_ID=$product_id
    ";

    if ($conn->query($update_sql)) {
        echo "Product updated successfully.";
        echo "<br><a href='index.php'>Go back to products</a>";
        exit;
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="edit-product-container">
<h1>Edit Product</h1>
<form method="POST" action="">
    <label>Product Name:</label><br>
    <input type="text" name="product_Name" value="<?php echo htmlspecialchars($product['product_Name']); ?>" required><br><br>

    <label>Category:</label><br>
    <select name="category_ID" required>
        <?php while($cat = $cat_result->fetch_assoc()) { ?>
            <option value="<?php echo $cat['category_ID']; ?>" 
                <?php if($cat['category_ID'] == $product['category_ID']) echo "selected"; ?>>
                <?php echo htmlspecialchars($cat['category_Name']); ?>
            </option>
        <?php } ?>
    </select><br><br>

    <label>Quantity:</label><br>
    <input type="number" name="product_Quantity" value="<?php echo $product['product_Quantity']; ?>" required><br><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="product_Price" value="<?php echo $product['product_Price']; ?>" required><br><br>

    <button type="submit">Update Product</button>
</form>
</div>
</body>
</html>
