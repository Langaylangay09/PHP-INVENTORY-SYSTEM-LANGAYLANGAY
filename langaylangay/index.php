<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-sariPH</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="container">

    <nav class="nav">
      <div class="nav-logo">
        <h1>E-sariPH</h1>
      </div>

      <div class="nav-links">
        <a href="#Home">Home</a>
        <a href="#Products">Products</a>
        <a href="#Socials">Socials</a>
        <a href="#About">About Us</a>
      </div>

      <div class="nav-search">
        <input type="text" placeholder="Search">
        <button>Search</button>
      </div>
    </nav>


    <section id="Home" class="hero">
      <div class="hero-intro">
        <h1>
          “A fast and convenient way for everyday essentials. 
          Order what you need anytime and have it delivered right to your doorstep.”
        </h1>
        <button><a href="#Products">Shop Now!</a></button>
      </div>

      <div class="hero-image">
        <img src="beverages.png" alt="Beverages">
        <img src="chips.png" alt="Chips">
      </div>
    </section>


    <section class="product" id="Products">
      <h1>PRODUCTS</h1>

        <div class="category-container">
        <?php
        
        include 'database.php';

       
        $cat_sql = "SELECT * FROM categories";
        $cat_result = $conn->query($cat_sql);

        if ($cat_result && $cat_result->num_rows > 0) {
            while($cat = $cat_result->fetch_assoc()) {
                echo "<div class='categories'>
                        
                      </div>";
            }
        } else {
            echo "No categories found";
        }
        ?>
    </div>

    <div class="products-container">
    <?php
    $sql = "
        SELECT products.*, categories.category_Name 
        FROM products 
        LEFT JOIN categories 
        ON products.category_ID = categories.category_ID
    ";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

          
            switch($row['product_Name']) {
                case 'Potato chips':
                  $image = 'potato chips.jpg';
                  break;
                case 'Corn chips':
                  $image = 'corn chips.jpg';
                  break;
                case 'Soda':
                  $image = 'soda.jpg';
                  break;
                case 'Wheat cracker':
                  $image = 'wheat cracker.jpg';
                  break;
                case 'Fita':
                  $image = 'fita.jpg';
                  break;
                case 'Fanta':
                  $image = 'fanta.png';
                  break;
                case 'Kit Kat':
                  $image = 'kit kat.jpg';
                  break; 
                case 'Gummy bears':
                  $image = 'gummy bears.jpg';
                  break;           
                default:
                  $image = 'images/default.png'; // fallback image
                  break;
                }
            echo "<div class='products'>
        <div class='edit-delete'>
            <a class='edit-btn' href='edit_product.php?id=" . $row['product_ID'] . "'>Edit</a>

            <a class='delete-btn' 
               href='delete_product.php?id=" . $row['product_ID'] . "' 
               onclick=\"return confirm('Are you sure you want to delete this product?');\">
               Delete
            </a>
        </div>

        <h4>Name: " . htmlspecialchars($row["product_Name"]) . "</h4>
        <h4>Category: " . htmlspecialchars($row["category_Name"]) . "</h4>
        <p>Quantity: " . htmlspecialchars($row["product_Quantity"]) . "</p>
        <p>Price: " . htmlspecialchars($row["product_Price"]) . "</p>

        <div class='product-img'>
            <img 
                src='" . $image . "' 
                alt='" . htmlspecialchars($row['product_Name']) . "' 
                title='" . htmlspecialchars($row['product_Name']) . "' 
                width='150' 
                height='150'>
        </div>
      </div>";

        }
    } else {
        echo "No products found";
    }
    ?>
</div>

      </section>


  <section id="Socials" class="Socials">
  <h1>SOCIALS</h1>

  <div class="social-links">
    <a href="https://www.facebook.com/" target="_blank">
      <img src="fb-logo.png" alt="Facebook" class="social-icon"> Facebook
    </a>
    <a href="https://workspace.google.com/intl/en-US/gmail/" target="_blank">
      <img src="gmail-logo.png" alt="Gmail" class="social-icon"> Gmail
    </a>
    <a href="https://www.instagram.com/" target="_blank">
      <img src="instagram-logo.png" alt="Instagram" class="social-icon"> Instagram
    </a>
  </div>

  <p>Coming soon...</p>
</section>


    <section id="About" class="about">
  <h1>About Us</h1>


  <div class="about-text">
    <p>
      E-sariPH is your one-stop online store for everyday essentials. 
      We make shopping simple, fast, and convenient. Order your favorite products anytime 
      and have them delivered straight to your doorstep.
    </p>
    <p>
      Our mission is to provide quality products and excellent service to make your life easier. 
      We are committed to customer satisfaction and a seamless online shopping experience.
    </p>
  </div>


  <div class="about-socials">
    <a href="https://www.facebook.com/" target="_blank">
      <img src="fb-logo.png" alt="Facebook" class="social-icon"> Facebook
    </a>
    <a href="https://www.instagram.com/" target="_blank">
      <img src="instagram-logo.png" alt="Instagram" class="social-icon"> Instagram
    </a>
  </div>
</section>

  </div>

</body>

</html>
