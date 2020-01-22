<div class="container">
    <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Murid <strong>Berhasil</strong> <?= $this->session->flashdata('pesan'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url('Murid/tambahMurid'); ?>" class="btn btn-primary">Tambah Data Murid</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Murid</h3>
            <ul class="list-group">
                <?php foreach ($murid as $mrd) : ?>
                    <li class="list-group-item"><?= $mrd['nama']; ?>
                        <a href="<?= base_url('Murid/hapusMurid/') . $mrd['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
                        <a href="<?= base_url('Murid/ubahMurid/') . $mrd['id']; ?>" class="badge badge-success float-right" onclick="return confirm('Yakin?');">Ubah</a>
                        <a href="<?= base_url('Murid/detailMurid/') . $mrd['id']; ?>" class="badge badge-primary float-right" onclick="return confirm('Yakin?');">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>