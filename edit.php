<form class="admin_form" method="post" enctype="multipart/form-data">
    <fieldset>
    <legend><b>Edit Artikel</b></legend>
    <?php
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM tb_artikel WHERE id='$id'");
        
        while ($row = mysqli_fetch_array($query))
        {
    ?>
        <label><b>Judul :</b></label>
        <input type="text" name="judul" value="<?php echo $row['judul'] ?>" />
        <br><br>
        <label><b>Gambar</b></label><br>
        <img src="images/<?php echo $row['gambar']?>" width="100" height="auto" alt="gambar lama">
        <input type="file" class="form-control" name="gambar">
        <br><br>
        <label><b>Kontent :</b></label>
        <br>
        <textarea  cols="30" rows="10" name="konten"><?php echo $row['konten']?></textarea>
        <br><br>
        <button type="submit" name="update">submit</button>
    </fieldset>
    <?php
        }
    ?>
</form>