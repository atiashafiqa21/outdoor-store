<?php
include 'koneksi.php';

  if (isset($_GET['id'])) {

    $id = ($_GET["id"]);

    $query = "SELECT * FROM product WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);

       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='product.php';</script>";
       }
  } else {

    echo "<script>alert('Masukkan data id.');window.location='product.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD product dengan gambar - Gilacoding</title>
    <link rel="stylesheet" href="master.css">
    <style type="text/css">
      * {
        font-family: 'Poppins', sans-serif;
      }
      h1 {
        text-transform: uppercase;
        color: #ffffff;
        margin-top: 30px;
      }
    button {
          background-color: #1C1C1C;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border-radius: 10px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ffffff;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit product <?php echo $data['nama_product']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id product yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Nama product</label>
          <input type="text" name="nama_product" value="<?php echo $data['nama_product']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" />
        </div>
        <div>
          <label>Harga Beli</label>
         <input type="text" name="harga" required=""value="<?php echo $data['harga']; ?>" />
        </div>
        <div>
          <label>Gambar product</label>
          <img src="gambar/<?php echo $data['gambar_product']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar_product" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar product</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>