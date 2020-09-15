<?php
  include('koneksi.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Product | Out Door</title>
    <link rel="stylesheet" href="master.css">
    <style type="text/css">
      * {
        font-family: 'Poppins', sans-serif;
      }
      h1 {
        text-transform: uppercase;
        color: #ffffff;
        margin-top: 65px;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0px;
      width: 80%;
      margin: 0px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        background-color: #fff;
        border: solid 1px #DDEEEE;
        color: #1C1C1C;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    table tbody td a {
          color: #1C1C1C;
    }
    </style>
  </head>
  <body>
  <div class="container">
            <nav>
                <input type="checkbox" id="nav" class="hidden">
                <label for="nav" class="nav-btn">
                    <i></i>
                    <i></i>
                    <i></i>
                </label>
                <div class="logo">
                    <a href="index.php">Out Door</a>
                </div>
                <div class="nav-wrapper">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="product.php">Products</a></li>
                    </ul>
                </div>
                <div class="nav-logout">
                    <ul style="float: right; padding: 0px; margin-right: 16px;">
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    <center><h1>Product</h1><center>
    <center><a href="tambah_product.php">+ &nbsp; Add Product</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Product</th>
          <th>Description</th>
          <th>Price</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM product ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_product']; ?></td>
          <td><?php echo substr($row['deskripsi'], 0, 30); ?>...</td>
          <td>Rp <?php echo $row['harga']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_product']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>