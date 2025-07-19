<?php
include 'koneksi.php';

if (isset($_GET['order_id'])) {
  $order_id = $_GET['order_id'];
  $update = $conn->prepare("UPDATE transactions SET status = 'completed' WHERE transaction_id = ?");
  $update->bind_param("s", $order_id);
  $update->execute();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran Berhasil - NotFaceN Store</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Arial', sans-serif;
    }

    body {
      background-color: #8b1f1f;
      color: white;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 50px;
    }

    .logo {
      font-size: 2rem;
      font-weight: bold;
      font-family: 'Impact', sans-serif;
      color: white;
      text-decoration: none;
    }

    nav ul {
      display: flex;
      list-style: none;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
      padding: 10px 5px;
      border-bottom: 2px solid transparent;
      transition: border-bottom 0.3s;
    }

    nav ul li a:hover {
      border-bottom: 2px solid white;
    }

    .header-icons a {
      color: white;
      margin-left: 20px;
      font-size: 1.5rem;
      text-decoration: none;
    }

    .success-container {
      max-width: 800px;
      margin: 40px auto;
      background-color: rgba(0,0,0,0.5);
      border-radius: 20px;
      text-align: center;
      padding-bottom: 30px;
    }

    .success-header {
      background-color: #555;
      padding: 15px 20px;
      font-size: 1.2rem;
      display: flex;
      justify-content: space-between;
    }

    .success-header .order-number {
      font-size: 0.9rem;
      opacity: 0.7;
    }

    .success-content {
      padding: 40px 30px;
    }

    .success-icon {
      width: 100px;
      height: 100px;
      background-color: #4CAF50;
      border-radius: 50%;
      margin: 0 auto 30px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 3rem;
    }

    .success-title {
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 15px;
      color: #4CAF50;
    }

    .success-message {
      font-size: 1.1rem;
      margin-bottom: 30px;
      line-height: 1.5;
    }

    .estimated-time {
      background-color: rgba(0,0,0,0.3);
      border-radius: 10px;
      padding: 15px;
      margin: 20px auto;
      max-width: 600px;
    }

    .estimated-time-title {
      font-size: 1rem;
      margin-bottom: 5px;
    }

    .estimated-time-value {
      font-size: 1.5rem;
      font-weight: bold;
      color: #e63946;
    }

    .buttons {
      margin-top: 30px;
      display: flex;
      justify-content: center;
    }

    .btn {
      padding: 12px 30px;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      border: none;
      text-decoration: none;
      color: white;
      background-color: #e63946;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #ff4d5e;
    }

    footer {
      margin: 50px;
      padding-top: 30px;
      border-top: 1px solid rgba(255,255,255,0.2);
      text-align: center;
    }

    .icon-check::before {
      content: "✓";
    }
  </style>
</head>
<body>

  <header>
    <a href="index.php" class="logo">NotFaceN STORE</a>
    <nav>
      <ul>
        <li><a href="index.php">TopUp</a></li>
        <li><a href="#">Cek Transaksi</a></li>
        <li><a href="#">Berita</a></li>
      </ul>
    </nav>
    <div class="header-icons">
      <a href="#" title="Cari">🔍</a>
      <a href="#" title="Akun">👤</a>
      <a href="#" title="Keranjang">🛒</a>
    </div>
  </header>

  <div class="success-container">
    <div class="success-header">
      <div>Pembayaran Berhasil</div>
      <div class="order-number" id="order-number"></div>
    </div>

    <div class="success-content">
      <div class="success-icon"><span class="icon-check"></span></div>
      <div class="success-title">Terima Kasih!</div>
      <div class="success-message">
        Pembayaran Anda telah berhasil dikonfirmasi.<br>
        Proses TopUp sedang diproses dan akan segera selesai.
      </div>

      <div class="estimated-time">
        <div class="estimated-time-title">Estimasi Waktu Proses</div>
        <div class="estimated-time-value">5-15 menit</div>
      </div>

      <div class="buttons">
        <a href="index.php" class="btn">KEMBALI KE BERANDA</a>
      </div>
    </div>
  </div>

  <footer>
    <p>© 2025 NotFaceN Store. All Rights Reserved.</p>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const urlParams = new URLSearchParams(window.location.search);
      const orderId = urlParams.get('order_id') || 'NFN' + Math.floor(1000000 + Math.random() * 9000000);
      document.getElementById('order-number').textContent = 'Order #' + orderId;
    });
  </script>
</body>
</html>
