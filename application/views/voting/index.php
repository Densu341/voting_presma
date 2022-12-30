<style>
    .container-fluid {
        position: fixed;
        top: 0px;
        left: 0px;
        height: 100%;
        width: 100%;

        /*Fallback if gradeints don't work */
        background: #9b59b6;
        /*Linear gradient... */
        background:
            radial-gradient(at center, #3498db, #9b59b6);
    }

    .card {
        border-radius: 20px;
        background: #f5f5f5;
        position: relative;
        padding: 1.8rem;
        border: 2px solid #c3c6ce;
        transition: 0.5s ease-out;
        overflow: visible;
    }

    .card:hover {
        border-color: #008bf8;
        box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>
    <div class="row text-center">
        <?php $no = 1; ?>
        <?php foreach ($candidate as $c) : ?>
            <div class="col-4">
                <!-- Icon, Title and Description Card -->
                <div class="card mb-2">
                    <div class="card-body">
                        <a href="<?= base_url() ?>voting/getvote/<?= $c['id_candidate']; ?>" class="text-decoration-none">
                            <img src="<?= base_url() ?>assets/img/candidate/<?= $c['foto']; ?>" class="thumbnail rounded img-fluid" width="200" height="200">
                            <h5 class="card-title"><?= $c['nama_candidate']; ?></h5>
                        </a>
                    </div>
                </div>
            </div>
            <?php $no++; ?>
        <?php endforeach; ?>

        <div class="row d-flex align-items-center">
            <div class="container">
                <h2><?= $this->session->flashdata('message'); ?></h2>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->