<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas</title>
    <style>
        .m{
            margin-top: 10%;
        }
    </style>
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
<main class="d-flex flex-nowrap">
    <?php $this->load->view('component/sidebar')?>
<div class="overflow-y-auto container ">
    <div class="container m justify-content-center align-items-center">
        <a  href="<?php echo base_url('kelas/tambah_kelas') ?>" class="btn btn-primary m-3">Tambah</a>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">No</th>
              <th scope="col" class="text-center">Tingkat Kelas</th>
              <th scope="col" class="text-center">Jurusan</th>
              <th scope="col" class="text-center">Wali Kelas</th>
              <th scope="col" class="text-center">Sekolah</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 0;foreach ($kelas as $row): $no++?>
		            <tr>
		              <th scope="row" class="text-center"><?php echo $no ?></th>
		              <td class="text-center"> <?php echo $row->tingkat_kelas ?></td>
		              <td class="text-center"><?php echo $row->jurusan_kelas ?></td>
		              <td class="text-center"><?php echo tampil_full_guru_byid($row->id_walikelas) ?></td>
		              <td class="text-center"><?php echo tampil_full_sekolah_byid($row->id_sekolah) ?></td>
		              <td class="text-center"><a   href="<?php echo base_url('kelas/ubah_kelas/').$row->id?>" class="btn btn-sm btn-primary">Ubah</a> <button  onclick= "hapus(<?php echo $row->id ?>)"  class="btn btn-sm btn-danger">Hapus</button></td>
		            </tr>
		            <?php endforeach?>
          </tbody>
        </table>
    </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
      function hapus(id) {
        Swal.fire({
     title: 'Apakah Mau Dihapus?',
     text: "data ini tidak bisa dikembalikan lagi!",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
   if (result.isConfirmed) {
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Data Terhapus!!',
  showConfirmButton: false,
  timer: 1500
})
    setTimeout(() => {
        window.location.href= "<?php echo base_url('kelas/hapus_kelas/') ?>" + id;
    }, 1800);
  }
})
      }
    </script>
</body>
</html>