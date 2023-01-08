 <body style="background-color: #eaeaea;">
     <!-- Begin Page Content -->
     <div class="container-fluid mb-4">

         <!-- Page Heading -->
         <h1 class="h2 mb-1 pt-2 text-dark text-center"><?= $title; ?></h1>
         <div class="row d-flex align-items-center pb-2">
             <div class="col-sm-8 m-2">
                 <div class="card-body text-dark">
                     <h5 class="card-title"><?= $candidate['nama_candidate']; ?></h5>
                     <p class="card-text"><?= $candidate['nama_prodi']; ?></p>
                     <h5>Visi</h5>
                     <p class="card-text"><?= $candidate['visi']; ?></p>
                     <h5>Misi</h5>
                     <p class="card-text"><?= $candidate['misi']; ?></p>
                     <a href="" class="btn btn-primary btn-lg mb-3" data-toggle="modal" data-target="#voteModal">Vote</a>
                     <!--Tombol Kembali-->
                     <a href="<?= base_url('voting'); ?>" class="btn btn-danger btn-lg mb-3">Kembali</a>
                 </div>
             </div>
         </div>
     </div>
     <!-- /.container-fluid -->

     </div>
     <!-- End of Main Content -->

     <!-- Modal -->
     <div class="modal fade" id="voteModal" tabindex="-1" role="dialog" aria-labelledby="voteModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="voteModalLabel">Vote</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <?= form_open_multipart('voting/resultVote'); ?>
                 <div class="modal-body">
                     <div class="form-group">
                         <p>Apakah anda yakin ingin memilih <?= $candidate['nama_candidate']; ?> ?</p>
                     </div>
                     <div class="form-group">
                         <input type="hidden" name="id_candidate" value="<?= $candidate['id_candidate']; ?>">
                         <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Vote</button>
                 </div>
                 <?= form_close(); ?>
             </div>
         </div>
     </div>