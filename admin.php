<?php
  include ("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Artikel</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
  <div class="wrapper">
      <header>                    
          <img src="images/logo-devitapp.png" id="photo_header" />
          <h1 id="title">Belajar HTML</h1>
          <nav>
              <!-- Disini nanti dibuat menu nya -->
              <ul>
                  <!-- disini dibuat untuk membuat bagan menu -->
                  <li><a href="index.php">Home</a></li>
                  <li><a href="admin.php">Artikel</a></li>
              </ul>
          </nav>
      </header>
      <section class="courses">
        <?php
          if (isset($_GET['id']))
          {
            require_once('edit.php');
          }
          else
          {
            require_once('tambah.php');
          }
        ?>

        <?php
          if (isset($_POST['submit']))
          {
            $judul = $_POST['judul'];
            $nama_file = $_FILES['gambar']['name'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = './images/';
            $konten = $_POST['konten'];

            move_uploaded_file($source, $folder.$nama_file);

            $insert = mysqli_query($conn, "INSERT INTO tb_artikel VALUES (NULL, '$judul', '$nama_file', '$konten')");

            if ($insert)
            {
                header('location:admin.php');
            }
            else 
            {
                echo "insert gagal";
            }
          }
        ?>

        <?php
          if (isset($_POST['update']))
          {
              $judul = $_POST['judul'];
              $nama_file = $_FILES['gambar']['name'];
              $source = $_FILES['gambar']['tmp_name'];
              $folder = './images/';
              $konten = $_POST['konten'];

              if ($nama_file != '')
              {
                  move_uploaded_file($source, $folder.$nama_file);
                  $update = mysqli_query($conn, "UPDATE tb_artikel SET judul='".$judul."', gambar='".$nama_file."', konten='".$konten."' WHERE id='".$_GET['id']."'");

                  if ($update)
                  {
                      header('location:admin.php');
                  }
                  else 
                  {
                      echo "data gagal di update";
                  }
              }
              else 
              {
                  $update = mysqli_query($conn, "UPDATE tb_artikel SET judul='".$judul."', konten='".$konten."' WHERE id='".$_GET['id']."'");
                  
                  if ($update)
                  {
                      header('location:admin.php');
                  }
                  else 
                  {
                      echo "data gagal di update";
                  }
              }
          }
        ?>
          <br><br>
          <div>
              <table border="1" class="admin_form" style="text-align: center;">
                <tr>
                  <th>Judul</th>
                  <th>Gambar</th>
                  <th>Kontent</th>
                  <th>Aksi</th>
                </tr>
                <?php
                  $query = mysqli_query($conn, "SELECT * FROM tb_artikel");
                  while ($row = mysqli_fetch_array($query))
                  {
                ?>
                  <tr> 
                    <td><?php echo $row['judul'] ?></td>
                    <td><img src="images/<?php echo $row['gambar'] ?>" width="100px" height="100px"> </td>
                    <td><?php echo $row['konten'] ?></td>
                    <td>
                      <a href="?id=<?php echo $row['id'] ?>">Edit</a> |
                      <a href="delete.php?id=<?php echo $row['id'] ?>">Hapus</a>
                    </td>
                  </tr>
                <?php
                  } 
                ?>
                <!-- <tr>
                  <td>Jill</td>
                  <td>Smith</td>
                  <td>50</td>
                  <td>
                    <button>Hapus</button>
                    <button>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Eve</td>
                  <td>Jackson</td>
                  <td>94</td>
                  <td>
                    <button>Hapus</button>
                    <button>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>John</td>
                  <td>Doe</td>
                  <td>80</td>
                  <td>
                    <button>Hapus</button>
                    <button>Delete</button>
                  </td>
                </tr> -->
              </table>
          </div>
      </section>
      <footer>
          <!-- Ini nanti dibuat footer yang biasanya dipake untuk credit-->
          &copy; 2019 Belajar Web || DevITApp
      </footer>
    </div>
</body>
</html>