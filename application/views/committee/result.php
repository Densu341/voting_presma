<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="container-fluid">
        <div class="row mb-3">
            <?php foreach ($persentase as $p) : ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?= base_url() ?>assets/img/candidate/<?= $p['foto']; ?>" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $p['nama_candidate']; ?></h5>
                            <p class="card-text">mendapatkan</p>
                            <span class="btn btn-primary d-flex justify-content-center"><?= (int)(($p['total_vote']/$jml)*100) ?> % <br> dengan perolehan <?= $p['total_vote']; ?> suara</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <h3>Rincian data pemilihan</h3>
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">ID Candidate</th>
                    <th scope="col">Take</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($result as $r) : ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $r['nim']; ?></td>
                        <td><?= $r['nama_candidate']; ?></td>
                        <td><?= $r['take']; ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->