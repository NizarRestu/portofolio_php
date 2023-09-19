<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kelas</title>
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
        <?php foreach ($kelas as $row): $guru = $row->id_walikelas;?>
        <form action="<?php echo base_url('kelas/aksi_ubah_kelas') ?>" enctype="multipart/form-data"
                        method="post" class="row">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row->id ?>">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Tingkat Kelas</label>
                <input type="text" class="form-control" id="nama" name="tingkat" value="<?php echo $row->tingkat_kelas ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="alamat" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="nisn" name="jurusan" value="<?php echo $row->jurusan_kelas ?>">
            </div>          
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Sekolah</label>
                <select name="id_sekolah" class="form-select">
                    <option value="<?php echo $row->id_sekolah ?>"><?php echo tampil_full_sekolah_byid($row->id_sekolah)?></option>
                    <?php foreach ($sekolah as $row): ?>
                    <option value="<?php echo $row->id ?>"><?php echo $row->nama_sekolah ?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Wali Kelas</label>
                <select name="id_walikelas" class="form-select">
                    <option value="<?php echo $guru ?>"><?php echo tampil_full_guru_byid($guru)?></option>
                    <?php foreach ($walikelas as $row): ?>
                    <option value="<?php echo $row->id ?>"><?php echo $row->nama_guru ?></option>
                    <?php endforeach?>
                </select>
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