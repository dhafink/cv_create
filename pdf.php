<?php
  require('fpdf.php');
  
  class PDF extends FPDF {
    function Header() {
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(190, 10, 'Curriculum Vitae', 0, 1, 'C');
    }
    
    function Footer() {
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
  }

  // Ambil data dari database dan buat PDF
  $pdf = new PDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial', '', 12);
  
  $id = $_GET['id'];
  $result = mysqli_query($conn, "SELECT * FROM cv WHERE id=$id");
  $cv = mysqli_fetch_assoc($result);
  
  $pdf->Cell(40, 10, 'Nama: ' . $cv['name']);
  $pdf->Ln();
  $pdf->Cell(40, 10, 'Email: ' . $cv['email']);
  $pdf->Ln();
  $pdf->Cell(40, 10, 'Telepon: ' . $cv['phone']);
  $pdf->Ln();
  $pdf->Cell(40, 10, 'Alamat: ' . $cv['address']);
  
  $pdf->Output();
?>
