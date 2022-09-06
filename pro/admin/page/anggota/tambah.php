
<h1 class="mt-4">Tambah Data Anggota</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">tambah data anggota</li>
</ol>
<div class="card-header mb-5">
	
	<form action="config/checkingPost.php" method="post">
    <div class="form-group">
        <input type="hidden" name="cek" value="anggota">
        <input type="hidden" name="act" value="create">
        <label class="small mb-1" for="nim">NIM</label>
        <input class="form-control" required="required" id="nim" name="nim" type="number" placeholder="Masukan NIM Anda"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_anggota">Nama</label>
        <input class="form-control" required="required" id="nama_anggota" name="nama_anggota" type="text" placeholder="Masukan Nama Lengkap Anda"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="tempat_lahir">Tempat Lahir</label>
        <input class="form-control" required="required" id="tempat_lahir" name="tempat_lahir" type="text" placeholder="Masukan Tempat Kelahiran"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jk">Jenis Kelamin</label>
        <div class="custom-control custom-radio">
          <input type="radio" required="required" id="customRadio1" name="jk" value="L" class="custom-control-input">
          <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" required="required" id="customRadio2" name="jk" class="custom-control-input" value="P">
          <label class="custom-control-label" for="customRadio2">Perempuan</label>
        </div>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jumlah_buku">Prodi</label>
        <select name="prodi" required="required" id="prodi" class="form-control">
            <option value="">-- Pilih Prodi --</option>
            <option value="Manajemen">Manajemen</option>
            <option value="Akuntansi">Akuntansi</option>
            <option value="manajemen Perpajakan">Manajemen Perpajakan</option>
            <option value="Management Informatika">Management Informatika</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Psikologi">Psikologi</option>
            <option value="Bahasa Inggris">Bahasa Inggris</option>
        </select>
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
    </div>
	</form>
</div>