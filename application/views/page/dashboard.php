<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .m{
            margin-top: 4%;
        }
        .m-box{
            margin-top: -10px;
        }
    </style>
</head>
<body>
<main class="d-flex flex-nowrap">
    <?php $this->load->view('component/sidebar')?>
<div class="overflow-y-auto container ">
<div class="container m">
  <div class="row  gap-5 p-4">
    <div class="col  bg-dark-subtle  p-4">
        <h4 class ="m-box">Jumlah Siswa</h4>
        <h5 class="text-start p-2"><?php echo $siswa?></h5>
    </div>
    <div class="col  bg-dark-subtle  p-4">
        <h4 class ="m-box">Jumlah Guru</h4>
        <h5 class="text-start p-2"><?php echo $guru?></h5>
    </div>
    <div class="col  bg-dark-subtle  p-4">
        <h4 class ="m-box">Jumlah Kelas</h4>
        <h5 class="text-start p-2"><?php echo $kelas?></h5>
    </div>
    <div class="col  bg-dark-subtle  p-4">
        <h4 class ="m-box">Jumlah Mapel</h4>
        <h5 class="text-start p-2"><?php echo $mapel?></h5>
    </div>
  </div>
</div>
</div>
    </div>
</main>
</body>
</html>