<?php
include 'config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Upload foto
$profile_photo = '';
if ($_FILES['profile_photo']['name'] != '') {
    $profile_photo = 'assets/uploads/' . basename($_FILES['profile_photo']['name']);
    move_uploaded_file($_FILES['profile_photo']['tmp_name'], $profile_photo);
}

$query = "INSERT INTO cv (name, email, phone, address, profile_photo) 
          VALUES ('$name', '$email', '$phone', '$address', '$profile_photo')";

$result = mysqli_query($conn, $query);

// Ambil ID CV
$cv_id = mysqli_insert_id($conn);

// Simpan pengalaman kerja
if (!empty($_POST['position'])) {
    foreach ($_POST['position'] as $i => $pos) {
        $company = $_POST['company'][$i];
        $duration = $_POST['duration'][$i];
        $desc = $_POST['description'][$i];

        $query_exp = "INSERT INTO experience (cv_id, position, company, duration, description) 
                      VALUES ('$cv_id', '$pos', '$company', '$duration', '$desc')";
        mysqli_query($conn, $query_exp);
    }
}

if ($result) {
    echo "Data berhasil disimpan. <a href='index.php'>Kembali</a>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}
?>
