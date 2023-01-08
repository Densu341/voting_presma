<!-- Begin Page Content -->
<div class="container-fluid" style="background-color: #eaeaea;">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="container-fluid">
        <div class="row mb-3">
            <?php foreach ($persentase as $p) : ?>
                <div class="col d-flex justify-content-center">
                    <div class="card text-center">
                        <div class="card-body text-center">
                            <img class=" thumbnail rounded img-fluid" width="150" height="150" src="<?= base_url() ?>assets/img/candidate/<?= $p['foto']; ?>" alt="Card image cap">
                            <h5 class="card-title"><?= $p['nama_candidate']; ?></h5>
                            <p class="card-text">mendapatkan</p>
                            <span class="btn btn-primary d-flex justify-content-center"><?= round(($p['total_vote'] / $jml) * 100) ?> % <br> dengan perolehan <?= $p['total_vote']; ?> suara</span>
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
                    <th scope="col">Candidate</th>
                    <th scope="col">Take</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($result as $r) : ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
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