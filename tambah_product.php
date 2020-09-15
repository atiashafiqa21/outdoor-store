<?php
  include('koneksi.php'); 
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Product | Out Door</title>
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
        <h1>Add Product</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Nama product</label>
          <input type="text" name="nama_product" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi" />
        </div>
        <div>
          <label>Harga</label>
         <input type="text" name="harga" required="" />
        </div>
        <div>
          <label>Gambar product</label>
         <input type="file" name="gambar_product" required="" />
        </div>
        <div>
         <button type="submit">Simpan Product</button>
        </div>
        </section>
      </form>
  </body>
</html>