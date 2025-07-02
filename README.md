📄 cv_creator – Tugas 10
Aplikasi web sederhana berbasis PHP dan MySQL untuk mengelola data CV (Curriculum Vitae) dan pengalaman kerja. Aplikasi ini merupakan implementasi tugas akhir mata kuliah Pemrograman Web (Tugas 10) dengan fitur CRUD (Create, Read, Update, Delete) lengkap, tampilan user-friendly.

👨‍🎓 Dibuat Oleh
Nama: Dhafin Kurniawan
NRP : 5054231016
Mata Kuliah: Pemrograman Web
Tugas: Tugas 10 – CRUD CV Creator

✨ Fitur Utama
✍️ Tambah data CV lengkap: nama, email, nomor HP, alamat, dan foto profil.

🧾 Tambah pengalaman kerja terkait CV.

📋 Lihat semua daftar CV dan detailnya.

✏️ Edit data CV & pengalaman kerja.

❌ Hapus data CV atau pengalaman kerja.

📥 Upload foto profil CV.

📄 Generate tampilan data CV dalam bentuk rapi.

🎨 Tampilan antarmuka modern dan responsive (tanpa framework eksternal).

🛠️ Teknologi yang Digunakan
Bahasa Pemrograman: PHP

Database: MySQL

Tampilan UI: HTML, CSS (custom)

## Tools

- **phpMyAdmin** untuk pengelolaan database
- **XAMPP** untuk menjalankan server lokal (Apache + MySQL)

## Struktur Folder

```
cv_creator/
├── index.php        # Halaman utama: daftar CV
├── add.php          # Form tambah data CV
├── edit.php         # Form edit data CV
├── delete.php       # Hapus CV
├── view.php         # Lihat detail CV + pengalaman kerja
├── process.php      # Proses tambah & edit data
├── config.php       # Koneksi ke database
├── pdf.php          # (Opsional) Generate PDF
├── assets/          # Folder gambar, foto profil, dll
│   └── uploads/     # Tempat menyimpan foto profil
```

## Struktur Database

```sql
CREATE DATABASE cv_creator;
USE cv_creator;

CREATE TABLE cv (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(15),
  address TEXT,
  profile_photo VARCHAR(255)
);

CREATE TABLE experience (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cv_id INT,
  position VARCHAR(100),
  company VARCHAR(100),
  duration VARCHAR(100),
  description TEXT,
  FOREIGN KEY (cv_id) REFERENCES cv(id)
);
```


🖼️ Contoh Tampilan
![image](https://github.com/user-attachments/assets/e0fa32cc-f980-4b5c-8b5e-e84eb08b78a2)
![image](https://github.com/user-attachments/assets/154eaa68-a795-4a2e-929c-ac040ab8c947)
![image](https://github.com/user-attachments/assets/1b83410d-49bb-4fc1-8afd-d5ad53e545e7)




📌 Cara Menjalankan
Clone repositori ini atau download dalam bentuk .zip

Simpan folder cv_creator ke dalam direktori htdocs (jika pakai XAMPP).

Import database cv_creator melalui phpMyAdmin.

Jalankan localhost/cv_creator di browser.

Gunakan form untuk menambah, mengedit, atau menghapus data CV.

