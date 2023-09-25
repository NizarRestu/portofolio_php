<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        * {
    margin: 0;
    padding: 0
}

body {
    background-color: white
}

.card {
    width: 350px;
    background-color: #efefef;
    height:50vh;
}


.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}




    </style>
</head>
<body>
    <main class="d-flex flex-nowrap">
    <?php $this->load->view('component/sidebar')?>
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center">
        <?php foreach ($admin as $row): ?>
           <button class="border border-0 btn btn-link"  data-bs-toggle="modal" data-bs-target="#exampleModal">
           <?php if (!empty($row-> foto_profile)): ?>
            <img class="rounded-circle"  height="150" width="150" src="<?php echo base64_decode($row->foto_profile);?>">
            <?php else: ?>
                <img class="rounded-circle"  height="150" width="150" src="https://slabsoft.com/wp-content/uploads/2022/05/pp-wa-kosong-default.jpg"/>
                <?php endif;?>
            </button>

                <span class="name mt-3"><?php echo $row->username ?></span> <span class="idd"><?php echo $row->email ?></span>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <span class="idd1"><?php echo $row->no_telepon ?></span>
                   </div>

                <div class="text mt-3"> <span><?php echo $row->deskripsi ?> </span> </div>
                <div class=" d-flex mt-2 gap-2"> <a href="<?php echo base_url('profile/ubah_password/').$this->session->userdata('id')?>" class="btn btn-dark btn">Ubah Password</a>
                    
                </div>
             </div>
            </div>
            </div>
            <?php endforeach?>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="container w-75 m p-3">
        <form method="post" action="<?php echo base_url('profile/upload_image'); ?>" enctype="multipart/form-data" class="row">
            <div class="mb-3 col-12">
                <label for="nama" class="form-label">Foto:</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $this->session->userdata('id'); ?>">
                <input type="hidden" name="base64_image" id="base64_image">
                <input class="form-control" type="file" name="userfile" id="userfile" accept="image/*">
            </div>
            <div class="col-12 text-end">
                <input type="submit" class="btn btn-primary px-3" name="submit" value="Ubah Foto"></input>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a  class="btn btn-danger" href="<?php echo base_url('Profile/hapus_image'); ?>">Hapus Foto</a>
      </div>
    </div>
  </div>
</div>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    document.getElementById('userfile').addEventListener('change', function () {
        const fileInput = document.getElementById('userfile');
        const base64Input = document.getElementById('base64_image');

        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const base64 = e.target.result;
                base64Input.value = base64;
            };

            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>
