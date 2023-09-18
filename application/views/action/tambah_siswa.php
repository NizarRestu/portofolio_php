<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <style>
        .m{
            margin-top: 10%;
        }
    </style>
</head>
<body>
<main class="d-flex flex-nowrap">
<?php $this->load->view('component/sidebar')?>
<div class="overflow-y-auto container ">
<div class="container w-75 m p-3">
        <h3 class="text-center">Tambah</h3>
        <form action="<?php echo base_url('siswa/aksi_tambah_siswa') ?>" enctype="multipart/form-data"
                        method="post" class="row">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3 col-6">
                <label for="alamat" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn">
            </div>          
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Kelas</label>
                <select name="id_kelas" class="form-select">
                    <option selected>Pilih Kelas</option>
                    <?php foreach ($kelas as $row): ?>
                    <option value="<?php echo $row->id ?>"><?php echo $row->tingkat_kelas . ' ' . $row->jurusan_kelas ?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="mb-3 col-6">
            <label for="gender" class="form-label">Gender</label>
            <br>
            <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="gender" value="Laki-Laki">
  <label class="form-check-label" for="gender">Laki-Laki</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="gender" value="Perempuan">
  <label class="form-check-label" for="gender">Perempuan</label>
</div>
            </div>
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary px-3" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>