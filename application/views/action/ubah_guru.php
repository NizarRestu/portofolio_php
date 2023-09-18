<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Siswa</title>
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
        <h3 class="text-center">Ubah</h3>
        <?php foreach ($guru as $row):  $gender= $row->gender;?>
        <form action="<?php echo base_url('guru/aksi_ubah_guru') ?>" enctype="multipart/form-data"
                        method="post" class="row">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row->id ?>">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama Guru</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row->nama_guru ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="alamat" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nisn" name="nik" value="<?php echo $row->nik ?>">
            </div>          
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">mapel</label>
                <select name="id_mapel" class="form-select">
                    <option value="<?php echo $row->id_mapel ?>"><?php echo tampil_full_mapel_byid($row->id_mapel)?></option>
                    <?php foreach ($mapel as $row): ?>
                    <option value="<?php echo $row->id ?>"><?php echo $row->nama_mapel ?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="mb-3 col-6">
            <label for="gender" class="form-label">Gender</label>
            <br>
            <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="gender" value="Laki-Laki"<?php if($gender == 'Laki-Laki') echo'checked'?>>
  <label class="form-check-label" for="gender">Laki-Laki</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="gender" value="Perempuan" <?php if($gender == 'Perempuan') echo'checked'?>>
  <label class="form-check-label" for="gender">Perempuan</label>
</div>
            </div>
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary px-3" name="submit">Submit</button>
            </div>
        </form>
        <?php endforeach?>
    </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>