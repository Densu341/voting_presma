<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <table class="table-responsive">
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->