<?php
include 'config.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM cv WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "CV tidak ditemukan.";
    exit;
}

$cv = mysqli_fetch_assoc($result);

// Ambil pengalaman kerja
$exp_query = "SELECT * FROM experience WHERE cv_id = $id";
$exp_result = mysqli_query($conn, $exp_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail CV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2c3e50;
        }

        .section-title {
            margin-top: 30px;
            font-size: 18px;
            font-weight: bold;
            color: #34495e;
        }

        .photo {
            margin-top: 15px;
        }

        .photo img {
            width: 150px;
            border-radius: 10px;
            border: 2px solid #ccc;
        }

        .btn-back {
            display: inline-block;
            margin-top: 25px;
            text-decoration: none;
            padding: 8px 16px;
            background: #3498db;
            color: white;
            border-radius: 5px;
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        strong {
            color: #2d3436;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Detail CV: <?= htmlspecialchars($cv['name']) ?></h2>

    <p><strong>Email:</strong> <?= htmlspecialchars($cv['email']) ?></p>
    <p><strong>Telepon:</strong> <?= htmlspecialchars($cv['phone']) ?></p>
    <p><strong>Alamat:</strong> <?= htmlspecialchars($cv['address']) ?></p>

    <div class="photo">
        <p><strong>Foto:</strong></p>
        <?php if (!empty($cv['profile_photo']) && file_exists('uploads/' . $cv['profile_photo'])): ?>
            <img src="uploads/<?= htmlspecialchars($cv['profile_photo']) ?>" alt="Foto Profil">
        <?php else: ?>
            <p><em>Tidak ada foto.</em></p>
        <?php endif; ?>
    </div>

    <div class="section-title">Pengalaman Kerja</div>
    <?php if (mysqli_num_rows($exp_result) > 0): ?>
        <ul>
            <?php while ($exp = mysqli_fetch_assoc($exp_result)): ?>
                <li>
                    <strong><?= htmlspecialchars($exp['position']) ?> di <?= htmlspecialchars($exp['company']) ?></strong><br>
                    <?= htmlspecialchars($exp['duration']) ?><br>
                    <?= htmlspecialchars($exp['description']) ?>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p><em>Tidak ada pengalaman kerja.</em></p>
    <?php endif; ?>

    <a href="index.php" class="btn-back">← Kembali</a>
</div>

</body>
</html>
