<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>
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
        <a  href="<?php echo base_url('siswa/tambah_siswa') ?>" class="btn btn-primary m-3">Tambah</a>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">No</th>
              <th scope="col">Nama Siswa</th>
              <th scope="col" class="text-center">NISN</th>
              <th scope="col" class="text-center">Gender</th>
              <th scope="col" class="text-center">Kelas</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 0;foreach ($siswa as $row): $no++?>
		            <tr>
		              <th scope="row" class="text-center"><?php echo $no ?></th>
		              <td > <?php echo $row->nama_siswa ?></td>
		              <td class="text-center"><?php echo $row->nisn ?></td>
		              <td class="text-center"><?php echo $row->gender ?></td>
		              <td class="text-center"><?php echo tampil_full_kelas_byid($row->id_kelas) ?></td>
		              <td class="text-center"><a   href="<?php echo base_url('siswa/ubah_siswa/').$row->id?>" class="btn btn-sm btn-primary">Ubah</a> <button  onclick= "hapus(<?php echo $row->id ?>)"  class="btn btn-sm btn-danger">Hapus</button></td>
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
        window.location.href= "<?php echo base_url('siswa/hapus_siswa/') ?>" + id;
    }, 2000);
  }
})
      }
    </script>
</body>
</html>