<?php
include 'koneksi.php';

  $id = $_POST['id'];
  $nama_product   = $_POST['nama_product'];
  $deskripsi     = $_POST['deskripsi'];
  $harga    = $_POST['harga'];
  $gambar_product = $_FILES['gambar_product']['name'];

  if($gambar_product != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_product); 
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_product']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_product; 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                   
                   $query  = "UPDATE product SET nama_product = '$nama_product', deskripsi = '$deskripsi', harga = '$harga', gambar_product = '$nama_gambar_baru'";
                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      
                      echo "<script>alert('Data berhasil diubah.');window.location='product.php';</script>";
                    }
              } else {     
                  echo "<script>alert('Maaf, ekstensi gambar yang diizinkan hanya jpg atau png.');window.location='tambah_product.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang productnya kita edit
      $query  = "UPDATE product SET nama_product = '$nama_product', deskripsi = '$deskripsi', harga = '$harga'";
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($koneksi, $query);

      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {

          echo "<script>alert('Data berhasil diubah.');window.location='product.php';</script>";
      }
    }
