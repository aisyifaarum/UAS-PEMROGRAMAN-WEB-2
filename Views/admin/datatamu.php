<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="logout-button">
            <button type="button" class="btn btn-danger" onclick="window.location.href='<?=base_url('logout')?>'">Logout</button>
        </div>
        <div class="row">
            <div class="col-12">
                <h1>Buku Tamu</h1>
                <hr>
                <div class="my-3">

                </div>
            </div>
            <div class="my-3">
                <button data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-primary"><i
                        class="bi bi-plus-circle"></i> Tambah</button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Tanggal Kehadiran</th>
                        <th scope="col">Kehadiran</th>
                        <th scope="col">Pesan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tamu as $tamuPernikahan): ?>
                        <tr>
                            <td><?= $tamuPernikahan['id'] ?></td>
                            <td><?= $tamuPernikahan['nama'] ?></td>
                            <td><?= $tamuPernikahan['no_hp'] ?></td>
                            <td><?= $tamuPernikahan['tanggal_kehadiran'] ?></td>
                            <td><?= $tamuPernikahan['kehadiran'] ?></td>
                            <td><?= $tamuPernikahan['pesan'] ?></td>
                            <td>
                            <a href="<?= base_url('admin/datatamu/' . $tamuPernikahan['id'] . '/edit') ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal" data-bs-id="<?= $tamuPernikahan['id']; ?>"><i class="bi bi-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- Modal tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Buku Tamu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/datatamu'); ?>" method="POST" enctype="multipart/form-data" id="formTambah">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp">No Hp</label>
                            <input type="no_hp" name="no_hp" id="no_hp" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal">Tanggal Kehadiran</label>
                            <input type="date" name="tanggal_kehadiran" id="tanggal_kehadiran" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="kehadiran" class="form-label">Kehadiran</label>
                            <select class="form-control" id="kehadiran" name="kehadiran">
                                <option>Ya</option>
                                <option>Tidak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pesan">Pesan</label>
                            <input type="pesan" name="pesan" id="pesan" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="formTambah" class="btn btn-primary"><i class="bi bi-floppy"></i>
                        Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="hapus" method="POST" id="formHapus">
                        <input type="hidden" name="id" id="idHapus" value="">
                    </form>
                    <p class="">Apakah anda yakin menghapus data<span id="textId"></span> ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="formHapus" class="btn btn-danger"><i class="bi-trash"></i>
                        Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        const hapusModal = document.getElementById('hapusModal')
        hapusModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const id = button.getAttribute('data-bs-id')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            const idHapus = hapusModal.querySelector('#idHapus')
            const textId = hapusModal.querySelector('#textId')

            idHapus.value = id;
            textId.textContent = id;

        })
    </script>
</body>

</html>