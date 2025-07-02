<?php 
include 'config.php'; 
$query = mysqli_query($conn, "SELECT * FROM cv");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data CV</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            padding: 40px;
        }

        h2 {
            color: #333;
        }

        a.button {
            display: inline-block;
            padding: 10px 18px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        a.button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .action-buttons a {
            margin-right: 8px;
            padding: 6px 12px;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        .edit {
            background-color: #ffc107;
        }

        .edit:hover {
            background-color: #e0a800;
        }

        .delete {
            background-color: #dc3545;
        }

        .delete:hover {
            background-color: #c82333;
        }

        .view {
            background-color: #17a2b8;
        }

        .view:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>
    <h2>Daftar CV</h2>
    <a class="button" href="add.php">+ Tambah Data</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['name'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['phone'] ?></td>
                <td class="action-buttons">
                    <a class="view" href="view.php?id=<?= $data['id'] ?>">Lihat</a>
                    <a class="edit" href="edit.php?id=<?= $data['id'] ?>">Edit</a>
                    <a class="delete" href="delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
