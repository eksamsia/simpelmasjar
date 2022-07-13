-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2022 pada 05.19
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpelmasjar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama_opd` varchar(50) DEFAULT '',
  `alamat_opd` text DEFAULT NULL,
  `email_opd` varchar(100) DEFAULT '',
  `no_telp` varchar(50) DEFAULT NULL,
  `peta_opd` text DEFAULT NULL,
  `fb_opd` text DEFAULT NULL,
  `ig_opd` text DEFAULT NULL,
  `youtube_opd` text DEFAULT NULL,
  `wa_daftar_online` varchar(20) DEFAULT NULL,
  `wa_saran_kritik` varchar(20) DEFAULT NULL,
  `wa_cs` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nama_opd`, `alamat_opd`, `email_opd`, `no_telp`, `peta_opd`, `fb_opd`, `ig_opd`, `youtube_opd`, `wa_daftar_online`, `wa_saran_kritik`, `wa_cs`) VALUES
(1, 'Bag.Pemerintahan', 'Jl. Jenderal Basuki Rahmad\r\nNo. 01, Kec. Nganjuk, Kab. Nganjuk, Jawa Timur', 'admin@nganjukkab.go.id', '(0358) 321746', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.17144709738398!2d111.90179501098667!3d-7.602905974874993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e784b07b3a8bf6b%3A0x7503c73dbdf45fd9!2sJl.%20Basuki%20Rahmat%2C%20Mangundikaran%2C%20Mangun%20Dikaran%2C%20Kec.%20Nganjuk%2C%20Kabupaten%20Nganjuk%2C%20Jawa%20Timur%2064419!5e0!3m2!1sen!2sid!4v1641349526855!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_keperluan`
--

CREATE TABLE `master_keperluan` (
  `id` int(15) NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_keperluan`
--

INSERT INTO `master_keperluan` (`id`, `kategori`) VALUES
(1, 'Izin Penelitian'),
(2, 'Praktik Kerja Lapangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_ruang`
--

CREATE TABLE `master_ruang` (
  `id` int(11) NOT NULL,
  `nama_rr` text DEFAULT NULL,
  `deskripsi_rr` text DEFAULT NULL,
  `filepath` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_ruang`
--

INSERT INTO `master_ruang` (`id`, `nama_rr`, `deskripsi_rr`, `filepath`) VALUES
(3, 'Ruang Rapat Roro Kuning', '<ol>\r\n	<li>Kursi 200 Buah</li>\r\n	<li>AC 4 Buah</li>\r\n	<li>LCD Proyektor</li>\r\n</ol>\r\n', 'upload_file/gambar_file/0a2b9264b064b65f7f2decb3c583b5a0.jpeg'),
(4, 'Ruang Rapat Pringgitan', '<ol>\r\n	<li>Kursi 300 Buah</li>\r\n	<li>Meja Besar 1 Buah</li>\r\n	<li>AC 6 Buah</li>\r\n	<li>Sound System</li>\r\n</ol>\r\n', 'upload_file/gambar_file/2eade9aab3550ac8065a5635a7e5794c.jpg'),
(5, 'Ruang Rapat Planning Center', '<ol>\r\n	<li>Kursi 30 Buah</li>\r\n	<li>AC 2 Buah</li>\r\n	<li>LCD Proyektor</li>\r\n	<li>Smart TV</li>\r\n</ol>\r\n', 'upload_file/gambar_file/2bb8af8037cd714bd28612a723e0eeb0.jpg'),
(6, 'Ruang Rapat Diskominfo', '<ol>\r\n	<li>Kursi 20 Buah</li>\r\n	<li>AC 2 Buah</li>\r\n	<li>Proyektor</li>\r\n</ol>\r\n', 'upload_file/gambar_file/71e3ebd2740789f949e0ae2b34b264b2.jpeg'),
(10, NULL, NULL, 'upload_file/gambar_file/8135c77dc1c85a8b246d8427585b373d.png'),
(11, NULL, NULL, 'upload_file/gambar_file/91d6858c3477a1639d912bee9f64e9f3.png'),
(12, NULL, NULL, 'upload_file/gambar_file/543f662f6be2ec4d0a7b8241688bdb7b.png'),
(13, NULL, NULL, 'upload_file/gambar_file/1b5f60f0733af290f959daaab7a1c0fb.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `judul_penelitian` text NOT NULL,
  `mulai_penelitian` date NOT NULL,
  `selesai_penelitian` date NOT NULL,
  `upload_file` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pejabat` text NOT NULL,
  `no_surat` text NOT NULL,
  `status_pemohon` text NOT NULL,
  `no_wa` text NOT NULL,
  `lokasi` text NOT NULL,
  `alamat` text NOT NULL,
  `lama_kegiatan` text NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `perihal` text NOT NULL,
  `isApproved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `judul_penelitian`, `mulai_penelitian`, `selesai_penelitian`, `upload_file`, `id_kategori`, `id_user`, `nama_pejabat`, `no_surat`, `status_pemohon`, `no_wa`, `lokasi`, `alamat`, `lama_kegiatan`, `jumlah_anggota`, `perihal`, `isApproved`) VALUES
(1, 'TestA', '2022-07-01', '2022-07-30', 'upload_file/gambar_file/a0fd23d90cb2a195f62e6002d2f81b6d.png', 1, 1, '2022-07-01', '123456', 'Mahasiswa', '', 'Diskominfo', 'Rejoso', '10 bulan', 2, 'Permohonan Izin Penelitian', 1),
(2, 'test 2', '2022-07-02', '2022-07-14', 'xxx', 2, 2, 'Waimin', '1S324F', 'Mahasiswa', '0812345913', 'Dinas PRKPP', 'Nganjuk', '10 bulan', 2, 'Permohonan Penelitian', 0),
(4, 'iausihas', '2022-07-21', '2022-07-29', 'upload_file/gambar_file/person_3.jpg', 1, 70, 'snsw', '12913', 'Mahasiswa', '081219731', 'KSJAS', 'skdna', '10 hari', 2, 'mksa', 0),
(5, 'dnaidA', '2022-07-01', '2022-07-21', 'upload_file/gambar_file/person_1.jpg', 2, 71, '2022-07-01', 'ajns', 'Mahasiswa', '08113931', 'ahisah', 'Qudus', '10 bulan', 7, 'Permohonan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_rr` int(11) DEFAULT NULL,
  `judul_rapat` text DEFAULT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `tanggal_rapat` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `filepath` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id`, `id_user`, `id_rr`, `judul_rapat`, `contact_person`, `tanggal_rapat`, `jam_mulai`, `jam_selesai`, `keterangan`, `filepath`, `created_at`, `isActive`) VALUES
(1, 16, 5, 'Rapat Dinas PUPR batch 2 Semantok', '0989897298743', '2022-06-20', '08:00:00', '12:00:00', 'Rapat Dinas PUPR batch 2 Semantok', 'upload_file/file_reservasi/74c49bf9194675ccee27d812cde17359.pdf', '2022-06-20', 1),
(2, 8, 5, 'Rapat Dinas Kesehatan vaksinasi serentak', '0876763273838', '2022-06-20', '12:05:00', '17:00:00', 'Rapat Dinas Kesehatan vaksinasi serentak', 'upload_file/file_reservasi/44780ea9a304623cafd58940f085640e.jpg', '2022-06-20', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `urusan`
--

CREATE TABLE `urusan` (
  `id` int(11) NOT NULL,
  `nama_urusan` text DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `urusan`
--

INSERT INTO `urusan` (`id`, `nama_urusan`, `created_at`) VALUES
(1, 'TEST', '2022-03-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) CHARACTER SET latin1 DEFAULT '',
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `isActive`, `roleid`) VALUES
(1, 'Super Admin', 'rootadmin', 'cd92a26534dba48cd785cdcc0b3e6bd1', 1, 1),
(2, 'Sekretariat Daerah', 'setda', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(3, 'Sekretariat Dewan Perwakilan Rakyat Daerah', 'setwan', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(4, 'Inspektorat Daerah', 'inspektorat', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(5, 'Dinas Pendidikan', 'disdik', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(6, 'Dinas Kependudukan dan Pencatatan Sipil', 'dispendukcapil', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(7, 'Dinas Pariwisata, Kepemudaan, Olah Raga dan Kebudayaan', 'disparporabud', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(8, 'Dinas Kesehatan', 'dinkes', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(9, 'Dinas Sosial, Pemberdayaan Perempuan dan Perlindungan Anak', 'dinsospppa', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(10, 'Dinas Pengendalian Penduduk dan Keluarga Berencana', 'dppkb', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(11, 'Dinas Pemberdayaan Masyarakat dan Desa', 'dpmd', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(12, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'dpmptsp', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(13, 'Dinas Perindustrian dan Perdagangan', 'disperindag', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(14, 'Dinas Tenaga Kerja', 'disnaker', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(15, 'Dinas Komunikasi dan Informatika', 'diskominfo', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(16, 'Dinas Pekerjaan Umum dan Penataan Ruang', 'dpupr', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(17, 'Dinas Perhubungan', 'dishub', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(18, 'Dinas Perumahan Rakyat, Kawasan Permukiman dan Pertanahan', 'disperkim', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(19, 'Dinas Lingkungan Hidup', 'dlh', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(20, 'Dinas Pertanian', 'disperta', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(21, 'Dinas Ketahanan Pangan dan Perikanan', 'dkpp', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(22, 'Dinas Kearsipan dan Perpustakaan', 'dinasarpus', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(23, 'Satuan Polisi Pamong Praja', 'satpolpp', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(24, 'Badan Perencanaan Pembangunan Daerah', 'bappeda', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(25, 'Badan Pengelola Keuangan dan Aset Daerah', 'bpkad', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(26, 'Badan Pendapatan Daerah', 'bapenda', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(27, 'Badan Kepegawaian Daerah', 'bkd', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(28, 'Badan Penanggulangan Bencana Daerah', 'bpbd', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(29, 'Kantor Kesatuan Bangsa, Politik dan Perlindungan Masyarakat Daerah', 'kesbangpol', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(30, 'RSUD Nganjuk', 'rsudnganjuk', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(31, 'RSUD Kertosono', 'rsudkertosono', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(32, 'Kecamatan Nganjuk', 'kecnganjuk', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(33, 'Kecamatan Bagor', 'kecbagor', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(34, 'Kecamatan Rejoso', 'kecrejoso', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(35, 'Kecamatan Sukomoro', 'kecsukomoro', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(36, 'Kecamatan Pace', 'kecpace', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(37, 'Kecamatan Tanjunganom', 'kectanjunganom', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(38, 'Kecamatan Kertosono', 'keckertosono', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(39, 'Kecamatan Prambon', 'kecprambon', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(40, 'Kecamatan Berbek', 'kecberbek', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(41, 'Kecamatan Loceret', 'kecloceret', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(42, 'Kecamatan Ngronggot', 'kecngronggot', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(43, 'Kecamatan Lengkong', 'keclengkong', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(44, 'Kecamatan Patianrowo', 'kecpatianrowo', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(45, 'Kecamatan Gondang', 'kecgondang', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(46, 'Kecamatan Baron', 'kecbaron', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(47, 'Kecamatan Wilangan', 'kecwilangan', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(48, 'Kecamatan Ngluyu', 'kecngluyu', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(49, 'Kecamatan Ngetos', 'kecngetos', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(50, 'Kecamatan Sawahan', 'kecsawahan', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(51, 'Kecamatan Jatikalen', 'kecjatikalen', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(52, 'Verifikator ruangrapat', 'setdaverifikator', 'cd92a26534dba48cd785cdcc0b3e6bd1', 1, 3),
(54, 'Dinas Koperasi dan Usaha Mikro', 'diskopum', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(55, 'Dinas Pemadam Kebakaran', 'damkar', '9cee4961a08694538eeb629a7f9f9ca4', 1, 2),
(70, 'Tyas', 'adiningtyas81', '81dc9bdb52d04dc20036dbd8313ed055', 1, 2),
(71, 'eka samsiati', 'eksam1', '81dc9bdb52d04dc20036dbd8313ed055', 1, 2),
(76, 'Sri Wahyu Adiningtyas', 'billie01', '81dc9bdb52d04dc20036dbd8313ed055', 0, 2),
(78, 'hwllo', 'haii30', '81dc9bdb52d04dc20036dbd8313ed055', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_keperluan`
--
ALTER TABLE `master_keperluan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_ruang`
--
ALTER TABLE `master_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `urusan`
--
ALTER TABLE `urusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_keperluan`
--
ALTER TABLE `master_keperluan`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master_ruang`
--
ALTER TABLE `master_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `urusan`
--
ALTER TABLE `urusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
