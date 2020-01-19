<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Murid</h3>
            <ul class="list-group">
                <?php foreach ($murid as $mrd) : ?>
                    <li class="list-group-item"><?= $mrd['nama']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>