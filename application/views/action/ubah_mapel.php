<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Mapel</title>
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
        <?php foreach ($mapel as $row):  $nama= $row->nama_mapel;?>
        <form action="<?php echo base_url('mapel/aksi_ubah_mapel') ?>" enctype="multipart/form-data"
                        method="post" class="row">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row->id ?>">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama Mapel</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
            </div>
            <div class="col-12 text-start">
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