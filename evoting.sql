-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2023 pada 19.30
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `candidate`
--

CREATE TABLE `candidate` (
  `id_candidate` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `nim` int(8) NOT NULL,
  `nama_candidate` varchar(50) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `candidate`
--

INSERT INTO `candidate` (`id_candidate`, `id_prodi`, `nim`, `nama_candidate`, `visi`, `misi`, `foto`) VALUES
(1, 1, 20230019, 'Deni Irawan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'avatar_deni1.png'),
(2, 1, 20230004, 'Dela Frencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'IMG_20210829_231457-removebg-preview.png'),
(3, 1, 20230010, 'M.Eru P. Pratama', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'avatar_mepp.png'),
(4, 1, 20230018, 'Bintang Erliya', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'foto1-removebg-preview.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Fakultas Sains dan Teknologi'),
(2, 'Fakultas Ilmu Sosial dan Ekonomi'),
(4, 'Fakultas Ilmu Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`) VALUES
(1, 1, 'S1-Sistem Informasi'),
(2, 2, 'S1-Hubungan Internasional'),
(4, 4, 'S1-Kesehatan Masyarakat'),
(5, 4, 'S1-Gizi'),
(7, 1, 'D3-Teknologi Informasi'),
(8, 1, 'S1-Informatika'),
(9, 1, 'S1-Teknik Elektro'),
(10, 4, 'S1-Keperawatan'),
(11, 4, 'D3-Kebidanan'),
(12, 4, 'Pendidikan Profesi Bidan'),
(13, 4, 'D3-Fisioterapi'),
(14, 4, 'Profesi NERS'),
(15, 4, 'S1-Kebidanan'),
(16, 2, 'S1-Akuntansi'),
(17, 2, 'S1-Ilmu Komunikasi'),
(18, 2, 'S1-Sastra Inggris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `result`
--

CREATE TABLE `result` (
  `id_vote` int(11) NOT NULL,
  `id_voters` int(11) NOT NULL,
  `id_candidate` int(11) NOT NULL,
  `take` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `result`
--

INSERT INTO `result` (`id_vote`, `id_voters`, `id_candidate`, `take`) VALUES
(2, 2, 1, '2023-01-01 14:49:50'),
(3, 3, 3, '2022-12-30 17:00:00'),
(4, 4, 3, '2022-12-30 17:00:00'),
(5, 5, 2, '2022-12-30 17:00:00'),
(6, 6, 2, '2022-12-30 17:00:00'),
(7, 7, 1, '2022-12-31 17:00:00'),
(8, 9, 2, '2022-12-31 17:00:00'),
(9, 10, 3, '2022-12-31 17:00:00'),
(10, 11, 4, '2022-12-31 17:00:00'),
(11, 8, 4, '2022-12-31 17:00:00'),
(12, 12, 4, '2022-12-31 17:00:00'),
(13, 1, 1, '2022-12-31 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_menu`
--

CREATE TABLE `sub_menu` (
  `sub_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_menu`
--

INSERT INTO `sub_menu` (`sub_id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'committee', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'committee/edit', 'fas fa-fw fa-user-edit', 1),
(4, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 4, 'Submenu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'committee/changepassword', 'fas fa-fw fa-key', 1),
(11, 5, 'Data Voters', 'committee/voters', 'fas fa-fw fa-user-friends', 1),
(12, 1, 'Data Candidate', 'admin/candidate', 'fas fa-fw fa-user-circle', 1),
(14, 5, 'Data Faculty', 'committee/faculty', 'fas fa-fw fa-book', 1),
(15, 5, 'Data Prodi', 'committee/prodi', 'fas fa-fw fa-book-open', 1),
(16, 5, 'Hasil Voting', 'committee/result', 'fas fa-fw fa-file-signature', 1),
(18, 1, 'Users Management', 'admin/m_user', 'fas fa-fw fa-users', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'administrator', 'denyirawan341@gmail.com', 'default.svg', '$2y$10$0PKKz4vXD/RHk5QCrHHb6uRY.9fgpFugQ.Q/vSw68ZF.wfhHyJKVa', 1, 1, 1669310353),
(2, 'panitia', 'bgdeny073@gmail.com', 'default.svg', '$2y$10$MvkICRF9sYBIrMXlTr5rn.7AvM6J7qdTOMg1D3uE27fnmLW0pTH16', 2, 1, 1669304195),
(3, 'voter1', 'voter1@gmail.com', 'default.svg', '$2y$10$6OvooyO0ZvCAHcgqeZQNeuoCm3bhrg187MhHimvi4FQa/A/herDVK', 3, 1, 1672757300);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `access_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`access_id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 4),
(6, 3, 3),
(9, 2, 5),
(11, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `menu_id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`menu_id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Committee'),
(4, 'Menu'),
(5, 'Voting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Committee'),
(3, 'Voter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voters`
--

CREATE TABLE `voters` (
  `id_voters` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `nim` int(8) NOT NULL,
  `nama_voters` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `voters`
--

INSERT INTO `voters` (`id_voters`, `id_prodi`, `nim`, `nama_voters`, `status`) VALUES
(1, 1, 20230019, 'Deni Irawan', 1),
(2, 2, 20230018, 'Bintang Erliya', 1),
(3, 1, 20230012, 'Muhammad Eru Prayoga Pratama', 1),
(4, 2, 20230015, 'Fitra Ferdiansyah', 1),
(5, 1, 20230017, 'Dela Frencia', 1),
(6, 1, 21220021, 'Robin Setyawan', 1),
(7, 1, 20230016, 'Tadem Virgi Kristiyan', 1),
(8, 4, 20230020, 'Yoga Pradana', 1),
(9, 5, 20230014, 'Stefany Meida', 1),
(10, 9, 20230013, 'Rofi Bimantoro', 1),
(11, 17, 20230011, 'Manuel Triyono', 1),
(12, 1, 20230010, 'Mepp', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id_candidate`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id_vote`);

--
-- Indeks untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`access_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id_voters`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id_candidate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `result`
--
ALTER TABLE `result`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `voters`
--
ALTER TABLE `voters`
  MODIFY `id_voters` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
