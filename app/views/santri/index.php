<div class="container mt-5">

<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="d-inline-block mb-5">Daftar Santri PITM</h2>
            <button type="button" class="btn btn-primary float-right tombolTambahData" data-toggle="modal" data-target="#staticBackdrop">
                Tambah data santri
            </button>
        </div>


        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Santri</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form action="<?= BASEURL; ?>/Santri/tambah" method="POST">
                        <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="nama">Nama Santri :</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>

                            <div class="form-group">
                                <label for="divisi">Divisi :</label>
                                <select class="custom-select" id="divisi" name="divisi" required>
                                    <option value="">-- Pilih Divisi --</option>
                                    <option value="Programmer">Programmer</option>
                                    <option value="Multimedia">Multimedia</option>
                                    <option value="Marketer">Marketer</option>
                                    <option value="Manajemen">Manajemen</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Status :</label>
                                <select class="custom-select" id="status" name="status" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Santri">Santri</option>
                                    <option value="Magang">Magang</option>
                                    <option value="Kerja">Kerja</option>
                                </select>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Divisi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php $no=1;?>
                <?php foreach ( $data['santri'] as $santri ) :?>
                <tr>
                    <th scope="row"><?= $no++;?></th>
                    <td><?= $santri['nama']; ?></td>
                    <td><?= $santri['divisi']; ?></td>
                    <td><?= $santri['status']; ?></td>
                    <td><a class="badge badge-danger" href="<?= BASEURL; ?>/Santri/hapus/<?= $santri['id']; ?>" onclick="return confirm('Apakah Anda yakin? Data akan terhapus secara permanen.');">Hapus</a>&nbsp;
                    <a class="badge badge-warning modalEdit"
                    href="<?= BASEURL; ?>/Santri/edit/<?= $santri['id']; ?>" data-toggle="modal" data-target="#staticBackdrop" data-id="<?= $santri['id']?>">Edit</a></td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</div>