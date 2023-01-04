<style>
    .card {
        width: 100%;
        height: 100%;
        box-shadow: 5px 5px 10px #191919,
            -5px -5px 10px #292929;
        transition: border-radius cubic-bezier(0.075, 0.82, 0.165, 1) 1s,
            transform cubic-bezier(0.075, 0.82, 0.165, 1) 1s;
        /*Fallback if gradeints don't work */

    }

    .card:hover {
        border-bottom-right-radius: 50px;
        border-top-left-radius: 50px;
        transform: scale(1.0);
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid bg-info">

    <!-- Page Heading -->
    <h1 class="h2 mb-4 text-light text-center"><?= $title; ?></h1>
    <div class="row d-flex align-items-center">
        <div class="container text-center">
            <h2><?= $this->session->flashdata('message'); ?></h2>
        </div>
    </div>
    <div class="row d-flex align-items-center">
        <?php $no = 1; ?>
        <?php foreach ($candidate as $c) : ?>
            <div class="col mb-2 d-flex justify-content-center">
                <!-- Icon, Title and Description Card -->
                <div class="card bg-light text-center">
                    <div class="card-body">
                        <h4><?= $no; ?></h4>
                        <a href="<?= base_url() ?>voting/getvote/<?= $c['id_candidate']; ?>" class="text-decoration-none">
                            <img src="<?= base_url() ?>assets/img/candidate/<?= $c['foto']; ?>" class="rounded img-fluid" width="200px" height="200px">
                            <hr color="blue">
                            <h5 class="card-title"><?= $c['nama_candidate']; ?></h5>
                        </a>
                    </div>
                </div>
            </div>
            <?php $no++; ?>
        <?php endforeach; ?>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->