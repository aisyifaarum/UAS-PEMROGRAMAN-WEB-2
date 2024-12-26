<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Buku Tamu</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color:rgb(103, 160, 246);
        }

        .container {
            margin-top: 20px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #28a745;
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px 10px 0 0;
        }

        .card-header img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }

        .card-header h2 {
            margin: 0;
            flex: 1;
            text-align: center;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .form-control {
            border-radius: 5px;
        }

        .form-label {
            display: flex;
            align-items: center;
        }

        .form-label i {
            margin-right: 8px;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-content form input,
        .modal-content form select {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="container">
<div class="card mt-3">
  <br>
  <h2 class="mb-3"> | Form Edit Buku Tamu</h2>
  <hr>
  <div class="card-body">
  <div class="mb-3">
    <form action="<?= base_url('admin/datatamu/' . $tamuPernikahan['id'] . '/update'); ?>" method="POST" enctype="multipart/form-data" id="formEdit">
      <div class="mb-3">
        <div class="mb-3">
          <label for="nama"><i class="fas fa-user"></i> Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" value="<?= $tamuPernikahan['nama'] ?>">
        </div>
        <div class="mb-3">
          <label for="no_hp"><i class="fas fa-phone"></i> No Hp</label>
          <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?= $tamuPernikahan['no_hp'] ?>">
        </div>
        <div class="mb-3">
          <label for="tanggal"><i class="fas fa-calendar"></i> Tanggal Kehadiran</label>
          <input type="date" name="tanggal_kehadiran" id="tanggal_kehadiran" class="form-control" value="<?= $tamuPernikahan['tanggal_kehadiran'] ?>">
        </div>
        <div class="mb-3">
          <label for="keterangan" class="form-label"><i class="fas fa-info-circle"></i> Kehadiran</label>
          <select class="form-control" name="kehadiran" id="kehadiran" required>
            <option value="Ya" <?=  $tamuPernikahan['kehadiran'] == 'Ya' ? 'selected' : '' ?>>Ya</option>
            <option value="Tidak" <?=  $tamuPernikahan['kehadiran'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="pesan"><i class="fas fa-message"></i> Pesan</label>
          <input type="pesan" name="pesan" id="pesan" class="form-control" value="<?= $tamuPernikahan['pesan'] ?>">
        </div>
        <div class="mb-3">
          <a href="<?= base_url('admin/datatamu') ?>" class="btn btn-secondary">Kembali</a>
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
  </div>
  </div>
</div>
</div>

</body>

</html>