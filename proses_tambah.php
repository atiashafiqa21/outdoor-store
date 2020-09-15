<?php
include 'koneksi.php';

  $nama_product   = $_POST['nama_product'];
  $deskripsi     = $_POST['deskripsi'];
  $harga         = $_POST['harga'];
  $gambar_product = $_FILES['gambar_product']['name'];


//berjalan ketika ada gambar product
if($gambar_product != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_product); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_product']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_product; //
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                 
                  $query = "INSERT INTO product (nama_product, deskripsi, harga, gambar_product) VALUES ('$nama_product', '$deskripsi', $harga, '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    
                    echo "<script>alert('Data berhasil ditambah.');window.location='product.php';</script>";
                  }

            } else {     
             
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_product.php';</script>";
            }
} else {
   $query = "INSERT INTO product (nama_product, deskripsi, harga, gambar_product) VALUES ('$nama_product', '$deskripsi', $harga', null)";
                  $result = mysqli_query($koneksi, $query);
                
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    
                    echo "<script>alert('Data berhasil ditambah.');window.location='product.php';</script>";
                  }
}

 