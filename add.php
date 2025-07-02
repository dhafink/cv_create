<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data CV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f0f0f5;
        }

        h2, h3 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            max-width: 700px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .experience-group {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 6px;
        }

        button,
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            margin-top: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover,
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Form Tambah Data CV</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <label>Nama:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Telepon:</label>
        <input type="text" name="phone" required>

        <label>Alamat:</label>
        <textarea name="address" rows="3" required></textarea>

        <label>Foto Profil:</label>
        <input type="file" name="profile_photo">

        <h3>Pengalaman Kerja</h3>
        <div id="experience-fields">
            <div class="experience-group">
                <input type="text" name="position[]" placeholder="Jabatan" required>
                <input type="text" name="company[]" placeholder="Perusahaan" required>
                <input type="text" name="duration[]" placeholder="Durasi (misal: 2020–2023)" required>
                <textarea name="description[]" placeholder="Deskripsi kerja" rows="3" required></textarea>
            </div>
        </div>
        <button type="button" onclick="addExperience()">➕ Tambah Pengalaman</button>
        <br><br>
        <input type="submit" value="Simpan Data">
    </form>

    <script>
        function addExperience() {
            const container = document.getElementById("experience-fields");
            const group = document.createElement("div");
            group.classList.add("experience-group");
            group.innerHTML = `
                <input type="text" name="position[]" placeholder="Jabatan" required>
                <input type="text" name="company[]" placeholder="Perusahaan" required>
                <input type="text" name="duration[]" placeholder="Durasi (misal: 2020–2023)" required>
                <textarea name="description[]" placeholder="Deskripsi kerja" rows="3" required></textarea>
            `;
            container.appendChild(group);
        }
    </script>
</body>
</html>
