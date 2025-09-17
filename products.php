<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header('Location: index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products - Tech Store</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      margin: 0;
      padding: 0;
      text-align: center;
    }
    header {
      background: #0077cc;
      color: white;
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h2 {
      margin: 0;
    }
    .header-buttons {
      display: flex;
      gap: 10px;
    }
    .header-buttons a {
      padding: 10px 16px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
    }
    .cart-btn {
      background: #ff9900;
      color: white;
    }
    .cart-btn:hover {
      background: #e68a00;
    }
    .logout-btn {
      background: #fff;
      color: #0077cc;
      border: 2px solid #fff;
    }
    .logout-btn:hover {
      background: #e6e6e6;
      color: #005fa3;
    }
    .products {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin: 40px auto;
      flex-wrap: wrap;
      max-width: 1000px;
    }
    .product {
      background: #fff;
      padding: 15px;
      width: 200px;
      border-radius: 8px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }
    .product img {
      max-width: 100%;
      border-radius: 4px;
    }
    .product h3 {
      font-size: 16px;
      margin: 10px 0 5px;
    }
    .product p {
      font-size: 14px;
      color: #333;
    }
    .product input[type="number"] {
      width: 60px;
      padding: 5px;
      margin: 5px 0;
    }
    .product button {
      background: #0077cc;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
    }
    .product button:hover {
      background: #005fa3;
    }
  </style>
</head>
<body>
  <header>
    <h2>Welcome, <?php echo $_SESSION['login_user']; ?>!</h2>
    <div class="header-buttons">
      <a href="cart.php" class="cart-btn">🛒 Go to Cart</a>
      <a href="logout.php" class="logout-btn">Logout</a>
    </div>
  </header>

<div class="products">
  <div class="product">
    <img src="https://gazin-images.gazin.com.br/T0KR3UySGO0yukakrsJ4MqiLHAM=/1920x/filters:format(webp):quality(75)/https://gazin-marketplace.s3.amazonaws.com/midias/imagens/2024/09/notebook-lenovo-ideapad-1-i3-w11-4gb-256gb-ssd-156-82vy000tbr-102409030550.jpg" alt="Laptop">
    <h3>Gaming Laptop</h3>
    <p>$900</p>
    <form action="add.php" method="post">
      <input type="hidden" name="product" value="Gaming Laptop">
      <input type="hidden" name="price" value="900">
      <input type="number" name="quantity" min="1" value="1">
      <button type="submit">Add to Cart</button>
    </form>
  </div>

  <div class="product">
    <img src="https://m.media-amazon.com/images/I/61qpQ7ZsSmL.jpg" alt="Mouse">
    <h3>Wireless Mouse</h3>
    <p>$30</p>
    <form action="add.php" method="post">
      <input type="hidden" name="product" value="Wireless Mouse">
      <input type="hidden" name="price" value="30">
      <input type="number" name="quantity" min="1" value="1">
      <button type="submit">Add to Cart</button>
    </form>
  </div>

  <div class="product">
    <img src="https://m.media-amazon.com/images/I/61FR1BJ71IL.jpg" alt="Keyboard">
    <h3>Mechanical Keyboard</h3>
    <p>$80</p>
    <form action="add.php" method="post">
      <input type="hidden" name="product" value="Mechanical Keyboard">
      <input type="hidden" name="price" value="80">
      <input type="number" name="quantity" min="1" value="1">
      <button type="submit">Add to Cart</button>
    </form>
  </div>
</div>
</body>
</html>
