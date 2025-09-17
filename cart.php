<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header('Location: index.html');
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart - Tech Store</title>
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
      flex-wrap: wrap;
    }
    header h2 {
      margin: 0;
    }
    .header-buttons {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }
    .header-buttons a {
      padding: 10px 16px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
    }
    .btn-back {
      background: #ff9900;
      color: white;
    }
    .btn-back:hover {
      background: #e68a00;
    }
    .btn-clean {
      background: #cc0000;
      color: white;
    }
    .btn-clean:hover {
      background: #990000;
    }
    .btn-logout {
      background: #fff;
      color: #0077cc;
      border: 2px solid #fff;
    }
    .btn-logout:hover {
      background: #e6e6e6;
      color: #005fa3;
    }
    table {
      width: 90%;
      margin: 30px auto;
      border-collapse: collapse;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
    }
    th {
      background: #0077cc;
      color: white;
    }
    tfoot td {
      font-weight: bold;
    }
    a.remove-link {
      color: #cc0000;
      text-decoration: none;
      font-weight: bold;
    }
    a.remove-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <header>
    <h2>Welcome, <?php echo $_SESSION['login_user']; ?>!</h2>
    <div class="header-buttons">
      <a href="products.php" class="btn-back">⬅ Back to Products</a>
      <a href="clean.php" class="btn-clean">🗑 Clear Cart</a>
      <a href="logout.php" class="btn-logout">Logout</a>
    </div>
  </header>

  <h1>Your Cart</h1>

  <?php if (count($_SESSION['cart']) > 0): ?>
    <table>
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION['cart'] as $index => $item): 
          $subtotal = $item['price'] * $item['quantity'];
          $total += $subtotal;
        ?>
        <tr>
          <td><?php echo htmlspecialchars($item['product']); ?></td>
          <td>$<?php echo number_format($item['price'], 2); ?></td>
          <td><?php echo $item['quantity']; ?></td>
          <td>$<?php echo number_format($subtotal, 2); ?></td>
          <td><a href="remove.php?index=<?php echo $index; ?>" class="remove-link">Remove</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3">Total</td>
          <td colspan="2">$<?php echo number_format($total, 2); ?></td>
        </tr>
      </tfoot>
    </table>
  <?php else: ?>
    <p>Your cart is empty.</p>
  <?php endif; ?>
</body>
</html>
