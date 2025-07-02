<?php
include 'config.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM cv WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data CV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f2f2f2;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="email"],
        form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 4px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form input[type="file"] {
            margin-top: 5px;
        }

        .btn-submit {
            margin-top: 20px;
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            border: none;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #219150;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data CV</h2>
    <form method="POST" action="process.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <label for="name">Nama:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>

        <label for="phone">Nomor Telepon:</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>" required>

        <label for="address">Alamat:</label>
        <textarea name="address" rows="3" required><?= htmlspecialchars($data['address']) ?></textarea>

        <label for="profile_photo">Foto Profil:</label>
        <input type="file" name="profile_photo">
        <?php if (!empty($data['profile_photo']) && file_exists("uploads/" . $data['profile_photo'])): ?>
            <p><img src="uploads/<?= $data['profile_photo'] ?>" width="120" style="margin-top:10px; border-radius:8px;"></p>
        <?php endif; ?>

        <button type="submit" name="update_cv" class="btn-submit">Update</button>
    </form>
</div>

</body>
</html>
