<?php
    include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Belajar HTML</title>
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
        <section>
            <div class="pembungkus_article">
                <?php
                    $query = mysqli_query($conn, "SELECT judul,gambar,SUBSTRING_INDEX(konten, ' ', -15)as konten FROM tb_artikel");
                    while ($row = mysqli_fetch_array($query))
                    {
                ?>
                <!-- Disini nanti dibuat isi nya-->
                
                    <article>
                        <figure>
                            <img src="images/<?php echo $row['gambar'] ?>" alt="gambar" />
                        </figure>
                        <hgroup>
                            <h2><b><?php echo $row['judul'] ?></b></h2>
                            <p id="author">Developer: ITATS Application</p>
                        </hgroup>
                        <p id="content"><?php echo $row['konten'] ?></p>
                    </article>
                
                <?php
                    }
                ?>
            </div>
            <div class="profile">
                <h2><b>About Me</b></h2>
                <div id="bungkus_biodata">
                    <img src="images/logo-devitapp.png" width="50px" height="50px" alt="gambar" id="photo_profile" />
                    <p id="biodata_profile">
                        Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : DevITApp
                        <br>
                        Jenis Kelamin : Laki - Laki
                        <br>
                        Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : JL. Mleto 1/12C
                        <br>
                        No Telp. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : 08321241
                        <br>
                    </p>
                </div>
            </div>
        </section>
        <footer>
            <!-- Ini nanti dibuat footer yang biasanya dipake untuk credit-->
            &copy; 2019 Belajar Web || DevITApp
        </footer>
    </div>
</body>
</html>