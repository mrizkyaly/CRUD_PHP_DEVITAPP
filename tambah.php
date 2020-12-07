<form class="admin_form" method="post" enctype="multipart/form-data">
    <fieldset>
    <legend><b>Tambah Artikel</b></legend>
        <label><b>Judul :</b></label>
        <input type="text" name="judul" placeholder="judul kamu..." />
        <br><br>
        <label><b>Gambar</b></label><br>
        <input type="file" class="form-control" name="gambar">
        <br><br>
        <label><b>Kontent :</b></label>
        <br>
        <textarea  cols="30" rows="10" name="konten" placeholder="Masukkan Kontent" ></textarea>
        <br><br>
        <button type="submit" name="submit">submit</button>
    </fieldset>
</form>