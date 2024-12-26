<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buku Tamu Pernikahan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color:rgb(79, 144, 250);
    }
    .container {
      margin-top: 50px;
    }
    .header {
      text-align: center;
      margin-bottom: 30px;
    }
    .card {
      padding: 20px;
      margin-bottom: 20px;
    }
    .login-button {
      position: absolute;
      top: 10px;
      right: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-button">
      <button type="button" class="btn btn-danger" onclick="window.location.href='<?=base_url('/logout')?>'">Logout</button>
    </div>
    <div class="header">
      <h1>Selamat Datang di Buku Tamu Pernikahan Kami</h1>
      <p>Silahkan tinggalkan pesan anda di bawah ini</p>
    </div>

    <?php if (session()->has('status')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session('status') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <div class="card">
      <form action="<?= base_url('/home/save') ?>" method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama anda">
        </div>
        <div class="mb-3">
          <label for="no_hp" class="form-label">No Hp</label>
          <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor telepon anda">
        </div>
        <div class="mb-3">
          <label for="tanggal_kehadiran" class="form-label">Tanggal Kehadiran</label>
          <input type="date" class="form-control" id="tanggal_kehadiran" name="tanggal_kehadiran">
        </div>
        <div class="mb-3">
          <label for="kehadiran" class="form-label">Maukah Kamu Hadir?</label>
          <select class="form-control" id="kehadiran" name="kehadiran">
            <option>Ya</option>
            <option>Tidak</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="pesan" class="form-label">Pesan</label>
          <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Tinggalkan pesan ucapan selama Anda di sini"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="card">
    <h5>Pesan Terbaru</h5>
    <?php foreach ($tamu as $tamuPernikahan): ?>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><?= $tamuPernikahan['nama'] ?>: <?= $tamuPernikahan['pesan'] ?></li>
      </ul>
    <?php endforeach; ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
