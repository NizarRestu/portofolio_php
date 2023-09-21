<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru</title>
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
    <div class="container m justify-content-center align-items-center">
    <a  href="<?php echo base_url('guru/tambah_guru')?>" class="btn btn-primary m-3">Tambah</a>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">No</th>
              <th scope="col">Nama Guru</th>
              <th scope="col" class="text-center">NIK</th>
              <th scope="col" class="text-center">Gender</th>
              <th scope="col" class="text-center">Mapel</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 0;foreach ($guru as $row): $no++?>
            <tr>
              <th scope="row" class="text-center"><?php echo $no?></th>
              <td ><?php echo $row-> nama_guru?></td>
              <td class="text-center"><?php echo $row-> nik?></td>
              <td class="text-center"><?php echo $row-> gender?></td>
              <td class="text-center"><?php echo tampil_full_mapel_byid($row->id_mapel) ?></td>
              <td class="text-center"><a href="<?php echo base_url('guru/ubah_guru/').$row->id?>" class="btn btn-sm btn-primary">Ubah</a> <button onclick= "hapus(<?php echo $row->id ?>)"  class="btn btn-sm btn-danger">Hapus</button></td>
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
     cancelButtonText: 'Batal',
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
        window.location.href= "<?php echo base_url('guru/hapus_guru/') ?>" + id;
    }, 1800);
  }
})
      }
    </script>
</body>
</html>