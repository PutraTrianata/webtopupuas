<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran - NotFaceN Store</title>
  <style>
    /* Reset and Base Styles */
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

    /* Header Styles */
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

    nav ul li a:hover, 
    nav ul li a.active {
        border-bottom: 2px solid white;
    }

    .header-icons {
        display: flex;
        align-items: center;
    }

    .header-icons a {
        color: white;
        margin-left: 20px;
        font-size: 1.5rem;
        text-decoration: none;
    }

    /* Payment Container */
    .payment-container {
        max-width: 800px;
        margin: 40px auto;
        background-color: rgba(0,0,0,0.5);
        border-radius: 20px;
        overflow: hidden;
    }

    .payment-header {
        background-color: #555;
        padding: 15px 20px;
        font-size: 1.2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .payment-header .order-number {
        font-size: 0.9rem;
        opacity: 0.7;
    }

    .payment-content {
        padding: 30px;
    }

    .payment-tabs {
        display: flex;
        margin-bottom: 20px;
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    .payment-tab {
        padding: 10px 20px;
        cursor: pointer;
        position: relative;
    }

    .payment-tab.active {
        font-weight: bold;
    }

    .payment-tab.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #e63946;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .section {
        margin-bottom: 30px;
    }

    .section-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .payment-method-options {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-bottom: 25px;
    }

    .payment-option {
        background-color: rgba(0,0,0,0.3);
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .payment-option:hover,
    .payment-option.selected {
        background-color: rgba(255,255,255,0.1);
    }

    .payment-option img {
        height: 40px;
        margin-bottom: 10px;
        object-fit: contain;
    }

    /* Bank Transfer Instructions */
    .bank-instructions {
        background-color: rgba(0,0,0,0.3);
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .bank-details {
        margin-bottom: 15px;
    }

    .bank-account {
        background-color: rgba(255,255,255,0.1);
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 15px;
    }

    .account-number {
        font-size: 1.2rem;
        font-weight: bold;
        margin: 10px 0;
    }

    .copy-button {
        background-color: #333;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 0.9rem;
        margin-left: 10px;
    }

    .copy-button:hover {
        background-color: #444;
    }

    .instructions-list {
        margin-top: 15px;
    }

    .instructions-list li {
        margin-bottom: 10px;
        margin-left: 20px;
    }

    /* Order Summary */
    .order-summary {
        background-color: rgba(0,0,0,0.3);
        border-radius: 10px;
        padding: 20px;
    }

    .order-details {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .order-total {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
        font-size: 1.1rem;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid rgba(255,255,255,0.2);
    }

    /* Countdown */
    .countdown-container {
        text-align: center;
        margin: 20px 0;
    }

    .countdown {
        font-size: 1.8rem;
        font-weight: bold;
        color: #e63946;
    }

    .countdown-text {
        margin-top: 5px;
        font-size: 0.9rem;
        opacity: 0.8;
    }

    /* Buttons */
    .buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    .btn {
        padding: 12px 30px;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
        border: none;
    }

    .btn-back {
        background-color: #555;
        color: white;
    }

    .btn-back:hover {
        background-color: #777;
    }

    .btn-confirm {
        background-color: #e63946;
        color: white;
    }

    .btn-confirm:hover {
        background-color: #ff4d5e;
    }

    /* QR Code */
    .qr-container {
        display: flex;
        justify-content: center;
        margin: 30px 0;
    }

    .qr-code {
        width: 200px;
        height: 200px;
        background-color: white;
        padding: 10px;
        border-radius: 10px;
    }

    /* Upload Receipt */
    .upload-section {
        background-color: rgba(0,0,0,0.3);
        border-radius: 10px;
        padding: 20px;
        margin-top: 30px;
    }

    .upload-box {
        border: 2px dashed rgba(255,255,255,0.3);
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        margin: 20px 0;
        cursor: pointer;
    }

    .upload-icon {
        font-size: 3rem;
        margin-bottom: 15px;
    }

    .upload-text {
        margin-bottom: 15px;
    }

    .upload-btn {
        background-color: #555;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 8px 15px;
        cursor: pointer;
    }

    .upload-btn:hover {
        background-color: #777;
    }

    #receipt-upload {
        display: none;
    }

    /* Footer */
    footer {
        margin: 50px;
        padding-top: 30px;
        border-top: 1px solid rgba(255,255,255,0.2);
        text-align: center;
    }

    /* Icons */
    .icon-search::before {
        content: "🔍";
    }

    .icon-user::before {
        content: "👤";
    }

    .icon-cart::before {
        content: "🛒";
    }

    .icon-bank::before {
        content: "🏦";
    }

    .icon-wallet::before {
        content: "👛";
    }

    .icon-card::before {
        content: "💳";
    }

    .icon-upload::before {
        content: "📤";
    }
  </style>
</head>
<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran - NotFaceN Store</title>
  <!-- Styles... (unchanged, same as your full code) -->
  <style>
    /* [Your existing CSS here, unchanged] */
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
      <a href="#" class="icon-search"></a>
      <a href="#" class="icon-user"></a>
      <a href="#" class="icon-cart"></a>
    </div>
  </header>

  <div class="payment-container">
    <div class="payment-header">
      <div>Pembayaran</div>
      <div class="order-number" id="order-number"></div>
    </div>

    <div class="payment-content">
      <!-- Payment tabs, bank transfer etc (unchanged) -->

      <!-- Form Start -->
      <form action="payment-success.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="order_id" id="hidden-order-id">

        <div class="upload-section">
          <div class="section-title">Upload Bukti Pembayaran</div>
          <div class="upload-box" onclick="document.getElementById('receipt-upload').click()">
            <div class="upload-icon icon-upload"></div>
            <div class="upload-text">Klik untuk upload atau drag & drop file</div>
            <button class="upload-btn" type="button">Pilih File</button>
            <input type="file" id="receipt-upload" name="receipt" accept="image/*" required>
          </div>
          <p style="text-align: center; font-size: 0.9rem;">Format file: JPG, PNG, PDF (Max: 5MB)</p>
        </div>

        <div class="buttons">
          <button class="btn btn-back" type="button" onclick="window.history.back()">KEMBALI</button>
          <button class="btn btn-confirm" type="submit">KONFIRMASI PEMBAYARAN</button>
        </div>
      </form>
      <!-- Form End -->

    </div>
  </div>

  <footer>
    <div class="divider"></div>
    <p>© 2025 NotFaceN Store. All Rights Reserved.</p>
  </footer>

  <script>
    function getURLParams() {
      const urlParams = new URLSearchParams(window.location.search);
      const params = {};
      for (const [key, value] of urlParams.entries()) {
        params[key] = value;
      }
      return params;
    }

    document.addEventListener('DOMContentLoaded', function () {
      const params = getURLParams();
      const orderId = params.order_id || 'NFN' + Math.floor(1000000 + Math.random() * 9000000);
      document.getElementById('order-number').textContent = 'Order #' + orderId;
      document.getElementById('hidden-order-id').value = orderId;

      // Initialize countdown and tab switching etc (your existing logic)
    });
  </script>
</body>
</html>
