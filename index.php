<?php
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotFaceN Store - Gaming Top-up</title>
    <link rel="stylesheet" href="stylehomepage.css">
</head>
<body>
    <!-- Header -->
    <header>
        <a href="index.php" class="logo">NotFaceN STORE</a>
        <nav>
            <ul>
                <li><a href="index.php" class="active">TopUp</a></li>
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

    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-text">
            <h1>TopUp Game</h1>
            <p>Layanan Tercepat dan Termurah</p>
            <p>24 Jam</p>
        </div>
        <a href="#" class="order-btn">Order Here</a>
    </div>

    <!-- Game List -->
    <div class="game-categories">
        <?php
        $query = "SELECT * FROM games";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $slug = $row['slug'] ? $row['slug'] . ".html" : "#";
                echo '
                <a href="' . $slug . '" class="game-card">
                    <div class="game-logo">
                        <img src="' . $row['image_path'] . '" alt="' . $row['game_name'] . '">
                    </div>
                    <div class="game-title">' . htmlspecialchars($row['game_name']) . '</div>
                </a>';
            }
        } else {
            echo "<p style='color: white; text-align: center;'>Belum ada game tersedia.</p>";
        }
        ?>
    </div>

    <!-- Footer -->
    <footer>
        <div class="divider"></div>
    </footer>
</body>
</html>
