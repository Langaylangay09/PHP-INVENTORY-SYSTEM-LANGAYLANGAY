<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="container">
    <nav class="nav">
      <div class="nav-logo">
        <h1>My Shop</h1>
      </div>
      <div class="nav-links">
        <a href="">Shop</a>
        <a href="">About</a>
        <a href="">Values</a>
        <a href="">Contacts</a>
      </div>
      <div class="nav-search">
        <input type="text" placeholder="Search">
        <button>Search</button>
      </div>
    </nav>
    <section class="hero">
      <div class="hero-intro">
        <h1>Products for my Sari Sari Store for Sale!</h1>
        <button>Shop Now!</button>
      </div>
      <div class="hero-image">
        <img src="https://imgs.search.brave.com/kZ3OfKaLbQd5BqH3crLphivWbt82sUnnzUalqCh2pGI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvMTI5/MDU0MTk5Ny9waG90/by9jb2xvci1zd2F0/Y2gtZmFubmVkLW91/dC5qcGc_cz02MTJ4/NjEyJnc9MCZrPTIw/JmM9dWNJQ3ZpcmQ5/MlNWVnRjSGxTeDJl/NzRySjExZ2M0UUlq/MTVEVnlmbHBDdz0" alt="">
      </div>
    </section>
    <section class="products">


      <?php
      include 'database.php';

      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<div class='product'>
                <h4>Name: " . $row["name"] . "</h4>
                <p>Price: " . $row["price"] . "</p>
                <p>Quantity: " . $row["quantity"] . "</p>
              </div>
          ";
        }
      } else {
        echo "0 results";
      }

      ?>
    </section>
  </div>


</body>

</html>