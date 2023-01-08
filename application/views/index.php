<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awesome -->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>">

    <title><?= $title; ?></title>
    <!-- favicon -->
    <link rel="icon" href="<?= base_url('assets/img/favicon.ico'); ?>" type="image/x-icon" />
</head>

<body style="background-color: #87CEFA;">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <h3>Voting Presma</h3>
            </a>
        </div>
    </nav>
    <!-- container bg gradient -->
    <div class="container-fluid bg-opacity-10">

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center bold mt-4">Welcome to Voting Presma</h1>
                <p class="lead text-center">Cast your vote online and make your voice heard!</p>
                <div class="text-center mb-2">
                    <a href="<?= base_url() ?>auth" class="btn btn-outline-light btn-primary">Get Started</a>
                </div>
                <!-- download mobile version -->
                <div class="text-center mb-5">
                    <p>Download the mobile app:</p>
                    <!-- link download -->
                    <a href="<?= base_url() ?>landing/download/">
                        <button class="button">
                            <span class="button_lg">
                                <span class="button_sl"></span>
                                <span class="button_text">
                                    <i class="fas fa-download"></i> Download
                                </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- Creator card circle -->

        <div class="container mt-5 " id="tentang">
            <div class="row">
                <div class="col-md-6">
                    <h2>Tentang E-Voting</h2>
                    <p>E-Voting adalah platform online yang memungkinkan Anda memberikan suara dari kenyamanan rumah Anda sendiri. Tidak perlu khawatir tentang antrean panjang atau pergi ke TPS. Dengan E-Voting, yang Anda butuhkan hanyalah komputer atau smartphone dan koneksi internet.</p>
                    <p>Kami berkomitmen untuk membuat proses pemungutan suara lebih mudah diakses dan nyaman bagi semua orang. Dengan E-Voting, Anda dapat memberikan suara kapan saja, di mana saja. Jangan biarkan apa pun menghalangi Anda untuk membuat suara Anda didengar.</p>
                </div>
                <div class="col-md-6">
                    <h2>Cara Kerja E-Voting</h2>
                    <p>Untuk menggunakan E-Voting, Anda perlu membuat profil dan mendaftar untuk memilih. Setelah Anda terdaftar, Anda akan dapat masuk dan memberikan suara Anda kapan saja selama periode pemungutan suara.</p>
                    <p>Suara Anda aman dan rahasia. Kami menggunakan teknologi enkripsi terbaru untuk memastikan bahwa suara Anda dikirimkan dengan aman dan terjamin.</p>
                    <p>Setelah periode pemungutan suara berakhir, hasilnya akan dihitung dan diumumkan. Anda dapat memeriksa hasilnya kapan saja dengan masuk ke profil Anda atau mengunjungi halaman Hasil.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- our team -->
    <div class="container mt-5" id="team">
        <h2 class="text-center mb-4">Our Team</h2>
        <div class="row cols-2 g-2">
            <div class="col-sm-3">
                <div class="card text-center bg-transparent border-0">
                    <img src="<?= base_url() ?>assets/img/team/avatar_1.png" class="img-fluid rounded-circle img-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Bintang Erliya</h5>
                        <p class="card-text">Front End Developer</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center bg-transparent border-0">
                    <img src="<?= base_url() ?>assets/img/team/avatar_3.png" class="img-fluid rounded-circle img-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Deni Irawan</h5>
                        <p class="card-text">Back End Developer</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center bg-transparent border-0">
                    <img src="<?= base_url() ?>assets/img/team/avatar_4.png" class="img-fluid rounded-circle img-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Muhammad Eru P</h5>
                        <p class="card-text">UI/UX Designer</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center bg-transparent border-0">
                    <img src="<?= base_url() ?>assets/img/team/avatar_2.png" class="img-fluid rounded-circle img-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Dela Frencia</h5>
                        <p class="card-text">Project Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- office location -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Office Location</h2>
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title">Kantor Pusat</h5>
                <p class="card-text">Jl. Laksda Adisucipto KM.6,3, Ambarukmo, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p>
                <a href="https://www.google.com/maps/dir//Unriyo+Jl.+Laksda+Adisucipto+KM.6,3+Ambarukmo,+Caturtunggal+Kec.+Depok,+Kabupaten+Sleman,+Daerah+Istimewa+Yogyakarta+55281/@-7.781959,110.4071911,19z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e7a59e820a14a41:0x8c106f47a000fea9!2m2!1d110.407191!2d-7.7819601" target="_blank">
                    <button class="button">
                        <span class="button_lg">
                            <span class="button_sl"></span>
                            <span class="button_text">
                                <i class="fas fa-map-marker-alt"></i>
                                Lihat Rute
                            </span>
                            <span class="button_sr"></span>
                        </span>
                    </button>
                </a>
            </div>
            <div class="col-md-6 rounded">
                <!-- maps -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.6660000000003!2d110.4071911147693!3d-7.781959994321199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59e820a14a41%3A0x8c106f47a000fea9!2sUnriyo%20Jl.%20Laksda%20Adisucipto%20KM.6%2C3%20Ambarukmo%2C%20Caturtunggal%20Kec.%20Depok%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta 55281!5e0!3m2!1sid!2sid!4v1591251000000!5m2!1sid!2sid" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="rounded"></iframe>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class=" page-footer bg-dark text-light mt-5 py-4">
        <div class="container">
            <div class="row border-1" id="contact">
                <div class="col-md-4">
                    <h5 class="text-uppercase">Voting Presma</h5>
                    <p>Website ini dibuat untuk memenuhi tugas mata kuliah Aplikasi Berbasis Mobile.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-uppercase">Kontak</h5>
                    <ul class="list-unstyled">
                        <li>
                            Email :
                            <script type="text/javascript">
                                var x = "denyirawan341";
                                var y = "gmail.com";
                                var z = x + "@" + y;
                                document.write(z);
                            </script>
                        </li>
                        <li>
                            Instagram : @masdenyyyy
                        </li>
                        <li>
                            Facebook : Densu
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="text-uppercase">Partner Kami</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="https://votepress.sisfor2020.com/">Aplikasi Voting Presma</a>
                        </li>
                        <li>
                            <a href="https://sigwisata.sisfor2020.com/">Aplikasi SIG Wisata</a>
                        </li>
                        <li>
                            <a href="https://cleaninglaundry.sisfor2020.com/">Aplikasi Laundry</a>
                        </li>
                        <li>
                            <a href="https://syteloker.sisfor2020.com/">Aplikasi SYTE Loker</a>
                        </li>
                        <li>
                            <a href="https://sisfor2020.com/">Aplikasi Rams Food</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3 text-muted small">Copyright &copy; <?= date('Y') == 2022 ? date('Y') : '2022-' . date('Y') ?>Voting Presma
        </div>
    </footer>
    <!-- Footer -->

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>