<body style="background-color: #eaeaea;">
    <div class="container-fluid">
        <h1 class="bold text-center my-4 text-dark">Silahkan Pilih Calon</h1>
    </div>

    <!-- flash message -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="row mb-3">
            <?php foreach ($candidate as $c) : ?>
                <div class="col d-flex justify-content-center">
                    <a href="<?= base_url('voting/getvote/') . $c['id_candidate']; ?>" class="text-decoration-none">
                        <div class="card text-center mb-4 border-left border-right border-dark">
                            <div class="card-header py-0 text-light" style="background-color: #EF0107;">
                                <h2 class="bold"><?= $c['id_candidate']; ?></h2>
                            </div>
                            <div class="card-body text-center p-0">
                                <img class=" thumbnail rounded img-fluid" width="250" src="<?= base_url() ?>assets/img/candidate/<?= $c['foto']; ?>" alt="Card image cap">
                            </div>
                            <div class="card-footer text-light py-0" style="background-color: #EF0107;">
                                <h5 class="card-title"><?= $c['nama_candidate']; ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>