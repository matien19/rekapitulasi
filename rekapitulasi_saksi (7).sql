-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2026 pada 19.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekapitulasi_saksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `caleg`
--

CREATE TABLE `caleg` (
  `id_caleg` int(11) NOT NULL,
  `id_dapil` int(11) NOT NULL,
  `nama_caleg` varchar(100) NOT NULL,
  `partai` enum('PKB','GERINDRA','PDI PERJUANGAN','GOLKAR','NASDEM','BURUH','GELORA','PKS','PKN','HANURA','GARUDA','PAN','PBB','DEMOKRAT','PSI','PERINDO','PPP','PARTAI UMMAT') NOT NULL,
  `kategori` enum('DPR RI','DPRD PROVINSI','DPRD KABUPATEN') NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `caleg`
--

INSERT INTO `caleg` (`id_caleg`, `id_dapil`, `nama_caleg`, `partai`, `kategori`, `foto`) VALUES
(9, 6, 'SHANTY ALDA NATHALIA, S.H.', 'PDI PERJUANGAN', 'DPR RI', 'c4781033866949b4c068d52f945ab095.jpg'),
(10, 6, 'SHINTYA SANDRA KUSUMA, S.Hub.Int., M.A.B.', 'PDI PERJUANGAN', 'DPR RI', '4dc975732c59ecb048d6251d06d74732.jpg'),
(11, 6, 'Dr. HARRIS TURINO, S.T., S.H., M.Si., M.M.', 'PDI PERJUANGAN', 'DPR RI', '6e94c1fd08c88c26c123cac67e83d343.jpeg'),
(12, 6, 'MUHAMMAD ISNAENI', 'PDI PERJUANGAN', 'DPRD PROVINSI', '31c70aefc44136fd0a0029e2b872baf6.jpeg'),
(13, 6, 'ELISABETH INTAN KURNIASARI, S.E., M.Acc.', 'PDI PERJUANGAN', 'DPRD PROVINSI', '7da0832e0dfd4e8cedac9c39f35895cc.jpeg'),
(14, 6, 'SUKIRSO', 'PDI PERJUANGAN', 'DPRD KABUPATEN', '0b792d56fe0658a61c3404b3abad1126.jpeg'),
(15, 6, 'M. SRY HERI PASARIBU', 'PDI PERJUANGAN', 'DPRD KABUPATEN', '9cfdd59e02bc8293ac942a95175f5d33.png'),
(16, 6, 'INDAH ELI PURWATI', 'PDI PERJUANGAN', 'DPRD KABUPATEN', 'd1eabeb555d011b8f0adc5d8bdddae55.png'),
(17, 6, 'MUHAMAD RIZKI NUROHMAN', 'PDI PERJUANGAN', 'DPRD KABUPATEN', '659cb3c88e7d574b6b3cbf33b76be17a.jpeg'),
(18, 6, 'BAIDLOWI', 'PDI PERJUANGAN', 'DPRD KABUPATEN', '65e0007ff2519af276e125b64ec97649.jpg'),
(19, 6, 'WITRI', 'PDI PERJUANGAN', 'DPRD KABUPATEN', 'bc6a6cbc356030ee1da6c11879eb26da.jpg'),
(20, 6, 'FATHUROHMAN', 'PDI PERJUANGAN', 'DPRD KABUPATEN', 'af259ff3825d3e0fefb8954b8acb51d3.jpg'),
(21, 6, 'IIP FITROHPIYAH', 'PDI PERJUANGAN', 'DPRD KABUPATEN', '7c15f8edad52051ea4757e2f8b113811.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dapil`
--

CREATE TABLE `dapil` (
  `id_dapil` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_dapil` varchar(100) NOT NULL,
  `kategori` enum('DPR RI','DPRD PROVINSI','DPRD KABUPATEN') NOT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `id_tps` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dapil`
--

INSERT INTO `dapil` (`id_dapil`, `id_kabupaten`, `nama_dapil`, `kategori`, `id_provinsi`, `id_kecamatan`, `id_desa`, `id_tps`) VALUES
(6, 1, 'Brebes 3', 'DPRD KABUPATEN', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_desa` varchar(100) NOT NULL,
  `id_dapil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `id_kecamatan`, `nama_desa`, `id_dapil`) VALUES
(7, 1, 'Bantarkawung', 6),
(8, 1, 'Bangbayang', 6),
(9, 1, 'Banjarsari', 6),
(10, 1, 'Cibentang', 6),
(11, 1, 'Cinanas', 6),
(12, 1, 'Ciomas', 6),
(13, 1, 'Jipang', 6),
(14, 1, 'Karangpari', 6),
(15, 1, 'Legok', 6),
(16, 1, 'Pangebatan', 6),
(17, 1, 'Pengarasan', 6),
(18, 1, 'Kebandungan', 6),
(19, 1, 'Tambakserang', 6),
(20, 1, 'Telaga', 6),
(21, 1, 'Terlaya', 6),
(22, 1, 'Waru', 6),
(23, 1, 'Cibunar', 6),
(24, 1, 'Cibendung', 6),
(25, 4, 'Bentarsari', 6),
(26, 4, 'Bentar', 6),
(27, 4, 'Capar', 6),
(28, 4, 'Banjaran', 6),
(29, 4, 'Ciputih', 6),
(30, 4, 'Ganggawang', 6),
(31, 4, 'Gunung Jaya', 6),
(32, 4, 'GunungSugih', 6),
(33, 4, 'Citimbang', 6),
(34, 4, 'Gandoang', 6),
(35, 4, 'Gununglarang', 6),
(36, 4, 'Gunungtajem', 6),
(37, 4, 'Indrajaya', 6),
(38, 4, 'Kadumanis', 6),
(39, 4, 'Pasirpanjang', 6),
(40, 4, 'Pabuaran', 6),
(41, 4, 'Salem', 6),
(42, 4, 'Tembongraja', 6),
(43, 4, 'Wanoja', 6),
(44, 4, 'Winduasri', 6),
(45, 4, 'Windusakti', 6),
(46, 5, 'Kamal', 6),
(47, 5, 'Wlahara', 6),
(48, 5, 'Karangbale', 6),
(49, 5, 'Kedungbokor', 6),
(50, 5, 'Larangan', 6),
(51, 5, 'Luwunggede', 6),
(52, 5, 'Pamulihan', 6),
(53, 5, 'Rengaspendawa', 6),
(54, 5, 'Siandong', 6),
(55, 5, 'Slatri', 6),
(56, 5, 'Sitanggal', 6),
(57, 1, 'Sindangwangi', 6),
(58, 1, 'Bantarwaru', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `id_provinsi`, `nama_kabupaten`) VALUES
(1, 1, 'Brebes'),
(5, 1, 'Tegal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kabupaten`, `nama_kecamatan`) VALUES
(1, 1, 'Bantarkawung'),
(4, 1, 'Salem'),
(5, 1, 'Larangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Jawa Tengah'),
(2, 'Jawa Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saksi`
--

CREATE TABLE `saksi` (
  `id_saksi` int(11) NOT NULL,
  `nama_saksi` varchar(100) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `id_kabupaten` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `id_tps` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saksi`
--

INSERT INTO `saksi` (`id_saksi`, `nama_saksi`, `nik`, `no_hp`, `username`, `password`, `id_provinsi`, `id_kabupaten`, `id_kecamatan`, `id_desa`, `id_tps`) VALUES
(15, 'Bunga', '3304190407700001', '085867169145', 'Bantarkawung 001', '123456', 1, 1, 1, 7, 1),
(16, 'ujang', '3304190407700002', '085867179147', 'Bantarkawung 002', '123456', 1, 1, 1, 7, 2),
(17, 'Rudi Hartono', '3304190407700003', '085867169003', 'Bantarkawung 003', '123456', 1, 1, 1, 7, 3),
(18, 'Yanto Saputra', '3304190407700004', '085867169004', 'Bantarkawung 004', '123456', 1, 1, 1, 7, 4),
(19, 'Agus Setiawan', '3304190407700005', '085867169005', 'Bantarkawung 005', '123456', 1, 1, 1, 7, 5),
(20, 'Joko Prasetyo', '3304190407700006', '085867169006', 'Bantarkawung 006', '123456', 1, 1, 1, 7, 6),
(21, 'Ahmad Fauzi', '3304190407700101', '085867170101', 'Bangbayang 001', '123456', 1, 1, 1, 8, 16),
(22, 'Rizki Maulani', '3304190407700102', '085867170102', 'Banjarsari 001', '123456', 1, 1, 1, 9, 40),
(23, 'Fajar Nugraha', '3304190407700103', '085867170110', 'Cibentang 001', '123456', 1, 1, 1, 10, 59),
(25, 'Wahyu Hidayat', '3304190407700104', '085867170108', 'Cinanas 001', '123456', 1, 1, 1, 11, 79),
(26, 'Dimas Saputra', '3304190407700105', '085867170109', 'Ciomas 001', '123456', 1, 1, 1, 12, 103),
(27, 'bunga', '3304190407700009', '085867179140', 'Bantarkawung 10', '123456', 1, 1, 1, 7, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suara`
--

CREATE TABLE `suara` (
  `id_suara` int(11) NOT NULL,
  `id_tps` int(11) NOT NULL,
  `id_caleg` int(11) NOT NULL,
  `jumlah_suara` int(11) DEFAULT 0,
  `foto` varchar(255) DEFAULT NULL,
  `kategori` varchar(50) NOT NULL,
  `id_dapil` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `suara`
--

INSERT INTO `suara` (`id_suara`, `id_tps`, `id_caleg`, `jumlah_suara`, `foto`, `kategori`, `id_dapil`, `created_at`) VALUES
(21, 1, 9, 30, '8877b3bbb7a4ec04539c26e2438c583b.jpeg', 'DPR RI', 6, '2026-06-06 07:57:51'),
(22, 1, 10, 5, '8877b3bbb7a4ec04539c26e2438c583b.jpeg', 'DPR RI', 6, '2026-06-06 07:57:51'),
(23, 1, 11, 10, '8877b3bbb7a4ec04539c26e2438c583b.jpeg', 'DPR RI', 6, '2026-06-06 07:57:51'),
(24, 1, 12, 20, 'bb067484f06981926614101b8991f187.jpeg', 'DPRD PROVINSI', 6, '2026-06-06 07:58:14'),
(25, 1, 13, 15, 'bb067484f06981926614101b8991f187.jpeg', 'DPRD PROVINSI', 6, '2026-06-06 07:58:14'),
(26, 1, 14, 10, '34adaa278a0c833d435da789ae143e23.jpeg', 'DPRD KABUPATEN', 6, '2026-06-06 07:59:03'),
(27, 1, 15, 5, '34adaa278a0c833d435da789ae143e23.jpeg', 'DPRD KABUPATEN', 6, '2026-06-06 07:59:03'),
(28, 1, 16, 15, '34adaa278a0c833d435da789ae143e23.jpeg', 'DPRD KABUPATEN', 6, '2026-06-06 07:59:03'),
(29, 1, 17, 50, '1781283083.png', 'DPRD KABUPATEN', 6, '2026-06-06 07:59:03'),
(30, 1, 18, 13, '34adaa278a0c833d435da789ae143e23.jpeg', 'DPRD KABUPATEN', 6, '2026-06-06 07:59:03'),
(31, 1, 19, 9, '34adaa278a0c833d435da789ae143e23.jpeg', 'DPRD KABUPATEN', 6, '2026-06-06 07:59:03'),
(32, 1, 20, 6, '34adaa278a0c833d435da789ae143e23.jpeg', 'DPRD KABUPATEN', 6, '2026-06-06 07:59:03'),
(33, 1, 21, 12, '1781283890.png', 'DPRD KABUPATEN', 6, '2026-06-06 07:59:03'),
(34, 3, 9, 18, '724040f0b896f2d34adaf6c600532364.jpeg', 'DPR RI', 6, '2026-06-08 14:49:10'),
(35, 3, 10, 12, '724040f0b896f2d34adaf6c600532364.jpeg', 'DPR RI', 6, '2026-06-08 14:49:10'),
(36, 3, 11, 9, '724040f0b896f2d34adaf6c600532364.jpeg', 'DPR RI', 6, '2026-06-08 14:49:10'),
(37, 3, 12, 12, '132b915a5852af6279c68763957f6498.jpeg', 'DPRD PROVINSI', 6, '2026-06-08 14:49:32'),
(38, 3, 13, 10, '132b915a5852af6279c68763957f6498.jpeg', 'DPRD PROVINSI', 6, '2026-06-08 14:49:32'),
(39, 3, 14, 17, '16d61d6ae42fe9cf2dde0be8c9ab94ee.jpeg', 'DPRD KABUPATEN', 6, '2026-06-08 14:50:22'),
(40, 3, 15, 7, '16d61d6ae42fe9cf2dde0be8c9ab94ee.jpeg', 'DPRD KABUPATEN', 6, '2026-06-08 14:50:22'),
(41, 3, 16, 9, '16d61d6ae42fe9cf2dde0be8c9ab94ee.jpeg', 'DPRD KABUPATEN', 6, '2026-06-08 14:50:22'),
(42, 3, 17, 23, '16d61d6ae42fe9cf2dde0be8c9ab94ee.jpeg', 'DPRD KABUPATEN', 6, '2026-06-08 14:50:22'),
(43, 3, 18, 8, '16d61d6ae42fe9cf2dde0be8c9ab94ee.jpeg', 'DPRD KABUPATEN', 6, '2026-06-08 14:50:22'),
(44, 3, 19, 13, '16d61d6ae42fe9cf2dde0be8c9ab94ee.jpeg', 'DPRD KABUPATEN', 6, '2026-06-08 14:50:22'),
(45, 3, 20, 10, '16d61d6ae42fe9cf2dde0be8c9ab94ee.jpeg', 'DPRD KABUPATEN', 6, '2026-06-08 14:50:22'),
(46, 3, 21, 11, '16d61d6ae42fe9cf2dde0be8c9ab94ee.jpeg', 'DPRD KABUPATEN', 6, '2026-06-08 14:50:22'),
(47, 4, 9, 15, '7f6a3f7f5e55fbc203dc62326b850ea8.jpeg', 'DPR RI', 6, '2026-06-10 13:33:22'),
(48, 4, 10, 8, '7f6a3f7f5e55fbc203dc62326b850ea8.jpeg', 'DPR RI', 6, '2026-06-10 13:33:22'),
(49, 4, 11, 11, '7f6a3f7f5e55fbc203dc62326b850ea8.jpeg', 'DPR RI', 6, '2026-06-10 13:33:22'),
(50, 4, 12, 16, '4ccd7d676842bce7acdba6501e972fe9.jpeg', 'DPRD PROVINSI', 6, '2026-06-10 13:33:39'),
(51, 4, 13, 12, '4ccd7d676842bce7acdba6501e972fe9.jpeg', 'DPRD PROVINSI', 6, '2026-06-10 13:33:39'),
(52, 4, 14, 13, '4591655a61d2de513381065bee799fda.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:34:24'),
(53, 4, 15, 9, '4591655a61d2de513381065bee799fda.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:34:24'),
(54, 4, 16, 10, '4591655a61d2de513381065bee799fda.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:34:24'),
(55, 4, 17, 21, '4591655a61d2de513381065bee799fda.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:34:24'),
(56, 4, 18, 7, '4591655a61d2de513381065bee799fda.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:34:24'),
(57, 4, 19, 8, '4591655a61d2de513381065bee799fda.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:34:24'),
(58, 4, 20, 10, '4591655a61d2de513381065bee799fda.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:34:24'),
(59, 4, 21, 30, '4591655a61d2de513381065bee799fda.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:34:24'),
(60, 16, 9, 11, 'c7be3ceab15f4c3d28c19b67214020eb.jpeg', 'DPR RI', 6, '2026-06-10 13:38:46'),
(61, 16, 10, 18, 'c7be3ceab15f4c3d28c19b67214020eb.jpeg', 'DPR RI', 6, '2026-06-10 13:38:46'),
(62, 16, 11, 8, 'c7be3ceab15f4c3d28c19b67214020eb.jpeg', 'DPR RI', 6, '2026-06-10 13:38:46'),
(63, 16, 12, 11, '5fa28f2d6196b4b9b994ef96102bf769.jpeg', 'DPRD PROVINSI', 6, '2026-06-10 13:39:18'),
(64, 16, 13, 9, '5fa28f2d6196b4b9b994ef96102bf769.jpeg', 'DPRD PROVINSI', 6, '2026-06-10 13:39:18'),
(65, 16, 14, 20, '1ea913442d97d10d0140b7ce699b1544.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:39:59'),
(66, 16, 15, 10, '1ea913442d97d10d0140b7ce699b1544.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:39:59'),
(67, 16, 16, 14, '1ea913442d97d10d0140b7ce699b1544.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:39:59'),
(68, 16, 17, 29, '1ea913442d97d10d0140b7ce699b1544.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:39:59'),
(69, 16, 18, 8, '1ea913442d97d10d0140b7ce699b1544.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:39:59'),
(70, 16, 19, 15, '1ea913442d97d10d0140b7ce699b1544.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:39:59'),
(71, 16, 20, 5, '1ea913442d97d10d0140b7ce699b1544.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:39:59'),
(72, 16, 21, 12, '1ea913442d97d10d0140b7ce699b1544.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:39:59'),
(73, 40, 9, 16, 'ac44c403724b10b3c9704558155339ee.jpeg', 'DPR RI', 6, '2026-06-10 13:43:10'),
(74, 40, 10, 12, 'ac44c403724b10b3c9704558155339ee.jpeg', 'DPR RI', 6, '2026-06-10 13:43:10'),
(75, 40, 11, 8, 'ac44c403724b10b3c9704558155339ee.jpeg', 'DPR RI', 6, '2026-06-10 13:43:10'),
(76, 40, 12, 10, 'a374a910c387c3af027882e4d5f9e020.jpeg', 'DPRD PROVINSI', 6, '2026-06-10 13:43:31'),
(77, 40, 13, 19, 'a374a910c387c3af027882e4d5f9e020.jpeg', 'DPRD PROVINSI', 6, '2026-06-10 13:43:31'),
(78, 40, 14, 12, '399dd38c85e7101ad69bc7abeddf849d.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:44:24'),
(79, 40, 15, 11, '399dd38c85e7101ad69bc7abeddf849d.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:44:24'),
(80, 40, 16, 10, '399dd38c85e7101ad69bc7abeddf849d.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:44:24'),
(81, 40, 17, 27, '399dd38c85e7101ad69bc7abeddf849d.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:44:24'),
(82, 40, 18, 9, '399dd38c85e7101ad69bc7abeddf849d.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:44:24'),
(83, 40, 19, 12, '399dd38c85e7101ad69bc7abeddf849d.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:44:24'),
(84, 40, 20, 8, '399dd38c85e7101ad69bc7abeddf849d.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:44:24'),
(85, 40, 21, 13, '399dd38c85e7101ad69bc7abeddf849d.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:44:24'),
(86, 59, 9, 10, '9672c33f7a1f2ef51859d2a43f3106ef.jpeg', 'DPR RI', 6, '2026-06-10 13:47:07'),
(87, 59, 10, 16, '9672c33f7a1f2ef51859d2a43f3106ef.jpeg', 'DPR RI', 6, '2026-06-10 13:47:07'),
(88, 59, 11, 7, '9672c33f7a1f2ef51859d2a43f3106ef.jpeg', 'DPR RI', 6, '2026-06-10 13:47:07'),
(89, 59, 12, 9, 'a43739aef4e7d7cfbfc50dac4b825561.jpeg', 'DPRD PROVINSI', 6, '2026-06-10 13:47:23'),
(90, 59, 13, 16, 'a43739aef4e7d7cfbfc50dac4b825561.jpeg', 'DPRD PROVINSI', 6, '2026-06-10 13:47:23'),
(91, 59, 14, 18, 'f14aa692984e42425d9d604a2d74b423.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:48:00'),
(92, 59, 15, 9, 'f14aa692984e42425d9d604a2d74b423.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:48:00'),
(93, 59, 16, 4, 'f14aa692984e42425d9d604a2d74b423.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:48:00'),
(94, 59, 17, 22, 'f14aa692984e42425d9d604a2d74b423.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:48:00'),
(95, 59, 18, 8, 'f14aa692984e42425d9d604a2d74b423.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:48:00'),
(96, 59, 19, 12, 'f14aa692984e42425d9d604a2d74b423.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:48:00'),
(97, 59, 20, 10, 'f14aa692984e42425d9d604a2d74b423.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:48:00'),
(98, 59, 21, 6, 'f14aa692984e42425d9d604a2d74b423.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:48:00'),
(99, 79, 9, 9, '39d4006d2e4bebae7c61794f3f2755f2.jpeg', 'DPR RI', 6, '2026-06-10 13:53:08'),
(100, 79, 10, 18, '39d4006d2e4bebae7c61794f3f2755f2.jpeg', 'DPR RI', 6, '2026-06-10 13:53:08'),
(101, 79, 11, 13, '39d4006d2e4bebae7c61794f3f2755f2.jpeg', 'DPR RI', 6, '2026-06-10 13:53:08'),
(102, 79, 12, 16, 'b5b45fdde62bd81c90a54c6d0b8c3d04.jpeg', 'DPRD PROVINSI', 6, '2026-06-10 13:53:26'),
(103, 79, 13, 14, 'b5b45fdde62bd81c90a54c6d0b8c3d04.jpeg', 'DPRD PROVINSI', 6, '2026-06-10 13:53:26'),
(104, 79, 14, 13, 'e2dbbf95cceac40198d62450114856a9.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:54:13'),
(105, 79, 15, 8, 'e2dbbf95cceac40198d62450114856a9.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:54:13'),
(106, 79, 16, 9, 'e2dbbf95cceac40198d62450114856a9.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:54:13'),
(107, 79, 17, 19, 'e2dbbf95cceac40198d62450114856a9.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:54:13'),
(108, 79, 18, 6, 'e2dbbf95cceac40198d62450114856a9.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:54:13'),
(109, 79, 19, 10, 'e2dbbf95cceac40198d62450114856a9.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:54:13'),
(110, 79, 20, 6, 'e2dbbf95cceac40198d62450114856a9.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:54:13'),
(111, 79, 21, 8, 'e2dbbf95cceac40198d62450114856a9.jpeg', 'DPRD KABUPATEN', 6, '2026-06-10 13:54:13'),
(112, 10, 9, 16, '85f21262b8d3ec1044990fa00c7cbcb6.jpeg', 'DPR RI', 6, '2026-06-11 03:22:27'),
(113, 10, 10, 8, '85f21262b8d3ec1044990fa00c7cbcb6.jpeg', 'DPR RI', 6, '2026-06-11 03:22:27'),
(114, 10, 11, 12, '85f21262b8d3ec1044990fa00c7cbcb6.jpeg', 'DPR RI', 6, '2026-06-11 03:22:27'),
(115, 10, 12, 13, '93227fa7ebf58cd710598708e71f44c6.jpeg', 'DPRD PROVINSI', 6, '2026-06-11 03:24:14'),
(116, 10, 13, 17, '93227fa7ebf58cd710598708e71f44c6.jpeg', 'DPRD PROVINSI', 6, '2026-06-11 03:24:14'),
(117, 10, 14, 13, 'c87dbfeda49f4511a5f3b4631c77cecd.jpeg', 'DPRD KABUPATEN', 6, '2026-06-11 03:25:12'),
(118, 10, 15, 12, 'c87dbfeda49f4511a5f3b4631c77cecd.jpeg', 'DPRD KABUPATEN', 6, '2026-06-11 03:25:12'),
(119, 10, 16, 5, 'c87dbfeda49f4511a5f3b4631c77cecd.jpeg', 'DPRD KABUPATEN', 6, '2026-06-11 03:25:12'),
(120, 10, 17, 15, 'c87dbfeda49f4511a5f3b4631c77cecd.jpeg', 'DPRD KABUPATEN', 6, '2026-06-11 03:25:12'),
(121, 10, 18, 10, 'c87dbfeda49f4511a5f3b4631c77cecd.jpeg', 'DPRD KABUPATEN', 6, '2026-06-11 03:25:12'),
(122, 10, 19, 8, 'c87dbfeda49f4511a5f3b4631c77cecd.jpeg', 'DPRD KABUPATEN', 6, '2026-06-11 03:25:12'),
(123, 10, 20, 10, 'c87dbfeda49f4511a5f3b4631c77cecd.jpeg', 'DPRD KABUPATEN', 6, '2026-06-11 03:25:12'),
(124, 10, 21, 6, 'c87dbfeda49f4511a5f3b4631c77cecd.jpeg', 'DPRD KABUPATEN', 6, '2026-06-11 03:25:12'),
(125, 7, 9, 20, '5a249f34517ba54a28a031c6541e19cc.jpeg', 'DPR RI', 6, '2026-06-12 13:27:19'),
(126, 7, 10, 50, '1781283753.png', 'DPR RI', 6, '2026-06-12 13:27:19'),
(127, 7, 11, 11, '5a249f34517ba54a28a031c6541e19cc.jpeg', 'DPR RI', 6, '2026-06-12 13:27:19'),
(128, 7, 12, 17, 'b15bd2cf7e0aa285a0ed4b2a9c20f905.jpeg', 'DPRD PROVINSI', 6, '2026-06-12 13:27:42'),
(129, 7, 13, 10, 'b15bd2cf7e0aa285a0ed4b2a9c20f905.jpeg', 'DPRD PROVINSI', 6, '2026-06-12 13:27:42'),
(130, 7, 14, 10, '1781284025.png', 'DPRD KABUPATEN', 6, '2026-06-12 13:28:35'),
(131, 7, 15, 8, '1781284284.png', 'DPRD KABUPATEN', 6, '2026-06-12 13:28:35'),
(132, 7, 16, 4, '1781284041.png', 'DPRD KABUPATEN', 6, '2026-06-12 13:28:35'),
(133, 7, 17, 30, '1781271797.png', 'DPRD KABUPATEN', 6, '2026-06-12 13:28:35'),
(134, 7, 18, 9, '1781284138.png', 'DPRD KABUPATEN', 6, '2026-06-12 13:28:35'),
(135, 7, 19, 8, '1781284168.png', 'DPRD KABUPATEN', 6, '2026-06-12 13:28:35'),
(136, 7, 20, 10, '1781284233.png', 'DPRD KABUPATEN', 6, '2026-06-12 13:28:35'),
(137, 7, 21, 20, '1781283945.png', 'DPRD KABUPATEN', 6, '2026-06-12 13:28:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tps`
--

CREATE TABLE `tps` (
  `id_tps` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nama_tps` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tps`
--

INSERT INTO `tps` (`id_tps`, `id_desa`, `nama_tps`) VALUES
(1, 7, 'TPS 001'),
(2, 7, 'TPS 002'),
(3, 7, 'TPS 003'),
(4, 7, 'TPS 004'),
(5, 7, 'TPS 005'),
(6, 7, 'TPS 006'),
(7, 7, 'TPS 007'),
(8, 7, 'TPS 008'),
(9, 7, 'TPS 009'),
(10, 7, 'TPS 010'),
(11, 7, 'TPS 011'),
(12, 7, 'TPS 012'),
(13, 7, 'TPS 013'),
(14, 7, 'TPS 014'),
(15, 7, 'TPS 015'),
(16, 8, 'TPS 001'),
(17, 8, 'TPS 002'),
(18, 8, 'TPS 003'),
(19, 8, 'TPS 004'),
(20, 8, 'TPS 005'),
(21, 8, 'TPS 006'),
(22, 8, 'TPS 007'),
(23, 8, 'TPS 008'),
(24, 8, 'TPS 009'),
(25, 8, 'TPS 010'),
(26, 8, 'TPS 011'),
(27, 8, 'TPS 012'),
(28, 8, 'TPS 013'),
(29, 8, 'TPS 014'),
(30, 8, 'TPS 015'),
(31, 8, 'TPS 016'),
(32, 8, 'TPS 017'),
(33, 8, 'TPS 018'),
(34, 8, 'TPS 019'),
(35, 8, 'TPS 020'),
(36, 8, 'TPS 021'),
(37, 8, 'TPS 022'),
(38, 8, 'TPS 023'),
(39, 8, 'TPS 024'),
(40, 9, 'TPS 001'),
(41, 9, 'TPS 002'),
(42, 9, 'TPS 003'),
(43, 9, 'TPS 004'),
(44, 9, 'TPS 005'),
(45, 9, 'TPS 006'),
(46, 9, 'TPS 007'),
(47, 9, 'TPS 008'),
(48, 9, 'TPS 009'),
(49, 9, 'TPS 010'),
(50, 9, 'TPS 011'),
(51, 9, 'TPS 012'),
(52, 9, 'TPS 013'),
(53, 9, 'TPS 014'),
(54, 9, 'TPS 015'),
(55, 9, 'TPS 016'),
(56, 9, 'TPS 017'),
(57, 9, 'TPS 018'),
(58, 9, 'TPS 019'),
(59, 10, 'TPS 001'),
(60, 10, 'TPS 002'),
(61, 10, 'TPS 003'),
(62, 10, 'TPS 004'),
(63, 10, 'TPS 005'),
(64, 10, 'TPS 006'),
(65, 10, 'TPS 007'),
(66, 10, 'TPS 008'),
(67, 10, 'TPS 009'),
(68, 10, 'TPS 010'),
(69, 10, 'TPS 011'),
(70, 10, 'TPS 012'),
(71, 10, 'TPS 013'),
(72, 10, 'TPS 014'),
(73, 10, 'TPS 015'),
(74, 10, 'TPS 016'),
(75, 10, 'TPS 017'),
(76, 10, 'TPS 018'),
(77, 10, 'TPS 019'),
(78, 10, 'TPS 020'),
(79, 11, 'TPS 001'),
(80, 11, 'TPS 002'),
(81, 11, 'TPS 003'),
(82, 11, 'TPS 004'),
(83, 11, 'TPS 005'),
(84, 11, 'TPS 006'),
(85, 11, 'TPS 007'),
(86, 11, 'TPS 008'),
(87, 11, 'TPS 009'),
(88, 11, 'TPS 010'),
(89, 11, 'TPS 011'),
(90, 11, 'TPS 012'),
(91, 11, 'TPS 013'),
(92, 11, 'TPS 014'),
(93, 11, 'TPS 015'),
(94, 11, 'TPS 016'),
(95, 11, 'TPS 017'),
(96, 11, 'TPS 018'),
(97, 11, 'TPS 019'),
(98, 11, 'TPS 020'),
(99, 11, 'TPS 021'),
(100, 11, 'TPS 022'),
(101, 11, 'TPS 023'),
(102, 11, 'TPS 024'),
(103, 12, 'TPS 001'),
(104, 12, 'TPS 002'),
(105, 12, 'TPS 003'),
(106, 12, 'TPS 004'),
(107, 12, 'TPS 005'),
(108, 13, 'TPS 001'),
(109, 13, 'TPS 002'),
(110, 13, 'TPS 003'),
(111, 13, 'TPS 004'),
(112, 13, 'TPS 005'),
(113, 13, 'TPS 006'),
(114, 13, 'TPS 007'),
(115, 13, 'TPS 008'),
(116, 13, 'TPS 009'),
(117, 13, 'TPS 010'),
(118, 13, 'TPS 011'),
(119, 13, 'TPS 012'),
(120, 13, 'TPS 013'),
(121, 13, 'TPS 014'),
(122, 13, 'TPS 015'),
(123, 13, 'TPS 016'),
(124, 13, 'TPS 017'),
(125, 13, 'TPS 018'),
(126, 13, 'TPS 019'),
(127, 13, 'TPS 020'),
(128, 13, 'TPS 021'),
(129, 13, 'TPS 022'),
(130, 13, 'TPS 023'),
(131, 13, 'TPS 024'),
(132, 13, 'TPS 025'),
(133, 13, 'TPS 026'),
(134, 13, 'TPS 027'),
(135, 13, 'TPS 028'),
(136, 14, 'TPS 001'),
(137, 14, 'TPS 002'),
(138, 14, 'TPS 003'),
(139, 14, 'TPS 004'),
(140, 14, 'TPS 005'),
(141, 14, 'TPS 006'),
(142, 14, 'TPS 007'),
(143, 14, 'TPS 008'),
(144, 14, 'TPS 009'),
(145, 14, 'TPS 010'),
(146, 14, 'TPS 011'),
(147, 14, 'TPS 012'),
(148, 14, 'TPS 013'),
(149, 14, 'TPS 014'),
(150, 14, 'TPS 015'),
(151, 14, 'TPS 016'),
(152, 14, 'TPS 017'),
(153, 14, 'TPS 018'),
(154, 15, 'TPS 001'),
(155, 15, 'TPS 002'),
(156, 15, 'TPS 003'),
(157, 15, 'TPS 004'),
(158, 15, 'TPS 005'),
(159, 15, 'TPS 006'),
(160, 15, 'TPS 007'),
(161, 15, 'TPS 008'),
(162, 15, 'TPS 009'),
(163, 15, 'TPS 010'),
(164, 15, 'TPS 011'),
(165, 16, 'TPS 001'),
(166, 16, 'TPS 002'),
(167, 16, 'TPS 003'),
(168, 16, 'TPS 004'),
(169, 16, 'TPS 005'),
(170, 16, 'TPS 006'),
(171, 16, 'TPS 007'),
(172, 16, 'TPS 008'),
(173, 16, 'TPS 009'),
(174, 16, 'TPS 010'),
(175, 16, 'TPS 011'),
(176, 16, 'TPS 012'),
(177, 16, 'TPS 013'),
(178, 16, 'TPS 014'),
(179, 16, 'TPS 015'),
(180, 16, 'TPS 016'),
(181, 16, 'TPS 017'),
(182, 16, 'TPS 018'),
(183, 16, 'TPS 019'),
(184, 16, 'TPS 020'),
(185, 16, 'TPS 021'),
(186, 16, 'TPS 022'),
(187, 16, 'TPS 023'),
(188, 16, 'TPS 024'),
(189, 16, 'TPS 025'),
(190, 16, 'TPS 026'),
(191, 16, 'TPS 027'),
(192, 16, 'TPS 028'),
(193, 16, 'TPS 029'),
(194, 16, 'TPS 030'),
(195, 16, 'TPS 031'),
(196, 16, 'TPS 032'),
(197, 16, 'TPS 033'),
(198, 16, 'TPS 034'),
(199, 16, 'TPS 035'),
(200, 16, 'TPS 036'),
(201, 16, 'TPS 037'),
(202, 16, 'TPS 038'),
(203, 16, 'TPS 039'),
(204, 16, 'TPS 040'),
(205, 16, 'TPS 041'),
(206, 16, 'TPS 042'),
(207, 16, 'TPS 043'),
(208, 17, 'TPS 001'),
(209, 17, 'TPS 002'),
(210, 17, 'TPS 003'),
(211, 17, 'TPS 004'),
(212, 17, 'TPS 005'),
(213, 17, 'TPS 006'),
(214, 17, 'TPS 007'),
(215, 17, 'TPS 008'),
(216, 17, 'TPS 009'),
(217, 17, 'TPS 010'),
(218, 17, 'TPS 011'),
(219, 17, 'TPS 012'),
(220, 17, 'TPS 013'),
(221, 17, 'TPS 014'),
(222, 17, 'TPS 015'),
(223, 17, 'TPS 016'),
(224, 17, 'TPS 017'),
(225, 17, 'TPS 018'),
(226, 17, 'TPS 019'),
(227, 17, 'TPS 020'),
(228, 17, 'TPS 021'),
(229, 17, 'TPS 022'),
(230, 17, 'TPS 023'),
(231, 17, 'TPS 024'),
(232, 17, 'TPS 025'),
(233, 17, 'TPS 026'),
(234, 17, 'TPS 027'),
(235, 17, 'TPS 028'),
(236, 17, 'TPS 029'),
(237, 17, 'TPS 030'),
(238, 17, 'TPS 031'),
(239, 17, 'TPS 032'),
(240, 17, 'TPS 033'),
(241, 17, 'TPS 034'),
(242, 17, 'TPS 035'),
(243, 17, 'TPS 036'),
(244, 17, 'TPS 037'),
(245, 17, 'TPS 038'),
(246, 17, 'TPS 039'),
(247, 17, 'TPS 040'),
(248, 17, 'TPS 041'),
(249, 17, 'TPS 042'),
(250, 17, 'TPS 043'),
(251, 17, 'TPS 044'),
(252, 18, 'TPS 001'),
(253, 18, 'TPS 002'),
(254, 18, 'TPS 003'),
(255, 18, 'TPS 004'),
(256, 18, 'TPS 005'),
(257, 18, 'TPS 006'),
(258, 18, 'TPS 007'),
(259, 18, 'TPS 008'),
(260, 18, 'TPS 009'),
(261, 18, 'TPS 010'),
(262, 19, 'TPS 001'),
(263, 19, 'TPS 002'),
(264, 19, 'TPS 003'),
(265, 19, 'TPS 004'),
(266, 19, 'TPS 005'),
(267, 19, 'TPS 006'),
(268, 19, 'TPS 007'),
(269, 19, 'TPS 008'),
(270, 19, 'TPS 009'),
(271, 19, 'TPS 010'),
(272, 19, 'TPS 011'),
(273, 19, 'TPS 012'),
(274, 19, 'TPS 013'),
(275, 19, 'TPS 014'),
(276, 19, 'TPS 015'),
(277, 19, 'TPS 016'),
(278, 19, 'TPS 017'),
(279, 19, 'TPS 018'),
(280, 20, 'TPS 001'),
(281, 20, 'TPS 002'),
(282, 20, 'TPS 003'),
(283, 20, 'TPS 004'),
(284, 20, 'TPS 005'),
(285, 20, 'TPS 006'),
(286, 20, 'TPS 007'),
(287, 20, 'TPS 008'),
(288, 20, 'TPS 009'),
(289, 20, 'TPS 010'),
(290, 21, 'TPS 001'),
(291, 21, 'TPS 002'),
(292, 21, 'TPS 003'),
(293, 21, 'TPS 004'),
(294, 21, 'TPS 005'),
(295, 21, 'TPS 006'),
(296, 21, 'TPS 007'),
(297, 21, 'TPS 008'),
(298, 21, 'TPS 009'),
(299, 21, 'TPS 010'),
(300, 21, 'TPS 011'),
(301, 21, 'TPS 012'),
(302, 21, 'TPS 013'),
(303, 21, 'TPS 014'),
(304, 21, 'TPS 015'),
(305, 21, 'TPS 016'),
(306, 21, 'TPS 017'),
(307, 21, 'TPS 018'),
(308, 21, 'TPS 019'),
(309, 21, 'TPS 020'),
(310, 21, 'TPS 021'),
(311, 22, 'TPS 001'),
(312, 22, 'TPS 002'),
(313, 22, 'TPS 003'),
(314, 22, 'TPS 004'),
(315, 22, 'TPS 005'),
(316, 22, 'TPS 006'),
(317, 22, 'TPS 007'),
(318, 22, 'TPS 008'),
(319, 22, 'TPS 009'),
(320, 22, 'TPS 010'),
(321, 22, 'TPS 011'),
(322, 22, 'TPS 012'),
(323, 22, 'TPS 013'),
(324, 57, 'TPS 001'),
(325, 57, 'TPS 002'),
(326, 57, 'TPS 003'),
(327, 57, 'TPS 004'),
(328, 57, 'TPS 005'),
(329, 57, 'TPS 006'),
(330, 57, 'TPS 007'),
(331, 57, 'TPS 008'),
(332, 57, 'TPS 009'),
(333, 57, 'TPS 010'),
(334, 57, 'TPS 011'),
(335, 57, 'TPS 012'),
(336, 57, 'TPS 013'),
(337, 57, 'TPS 014'),
(338, 57, 'TPS 015'),
(339, 57, 'TPS 016'),
(340, 57, 'TPS 017'),
(341, 57, 'TPS 018'),
(342, 57, 'TPS 019'),
(343, 57, 'TPS 020'),
(344, 57, 'TPS 021'),
(345, 57, 'TPS 022'),
(346, 57, 'TPS 023'),
(347, 57, 'TPS 024'),
(348, 57, 'TPS 025'),
(349, 57, 'TPS 026'),
(350, 57, 'TPS 027'),
(351, 57, 'TPS 028'),
(352, 57, 'TPS 029'),
(353, 57, 'TPS 030'),
(354, 57, 'TPS 031'),
(355, 58, 'TPS 001'),
(356, 58, 'TPS 002'),
(357, 58, 'TPS 003'),
(358, 58, 'TPS 004'),
(359, 58, 'TPS 005'),
(360, 58, 'TPS 006'),
(361, 58, 'TPS 007'),
(362, 58, 'TPS 008'),
(363, 58, 'TPS 009'),
(364, 58, 'TPS 010'),
(365, 48, 'TPS 001'),
(366, 48, 'TPS 002'),
(367, 48, 'TPS 003'),
(368, 48, 'TPS 004'),
(369, 48, 'TPS 005'),
(370, 48, 'TPS 006'),
(371, 48, 'TPS 007'),
(372, 48, 'TPS 008'),
(373, 48, 'TPS 009'),
(374, 48, 'TPS 010'),
(375, 48, 'TPS 011'),
(376, 48, 'TPS 012'),
(377, 48, 'TPS 013'),
(378, 48, 'TPS 014'),
(379, 48, 'TPS 015'),
(380, 48, 'TPS 016'),
(381, 48, 'TPS 017'),
(382, 48, 'TPS 018'),
(383, 48, 'TPS 019'),
(384, 48, 'TPS 020'),
(385, 49, 'TPS 001'),
(386, 49, 'TPS 002'),
(387, 49, 'TPS 003'),
(388, 49, 'TPS 004'),
(389, 49, 'TPS 005'),
(390, 49, 'TPS 006'),
(391, 49, 'TPS 007'),
(392, 49, 'TPS 008'),
(393, 49, 'TPS 009'),
(394, 49, 'TPS 010'),
(395, 49, 'TPS 011'),
(396, 49, 'TPS 012'),
(397, 49, 'TPS 013'),
(398, 49, 'TPS 014'),
(399, 49, 'TPS 015'),
(400, 49, 'TPS 016'),
(401, 49, 'TPS 017'),
(402, 49, 'TPS 018'),
(403, 49, 'TPS 019'),
(404, 49, 'TPS 020'),
(405, 49, 'TPS 021'),
(406, 49, 'TPS 022'),
(407, 49, 'TPS 023'),
(408, 49, 'TPS 024'),
(409, 49, 'TPS 025'),
(410, 49, 'TPS 026'),
(411, 49, 'TPS 027'),
(412, 49, 'TPS 028'),
(413, 49, 'TPS 029'),
(414, 49, 'TPS 030'),
(415, 49, 'TPS 031'),
(416, 49, 'TPS 032'),
(417, 49, 'TPS 033'),
(418, 50, 'TPS 001'),
(419, 50, 'TPS 002'),
(420, 50, 'TPS 003'),
(421, 50, 'TPS 004'),
(422, 50, 'TPS 005'),
(423, 50, 'TPS 006'),
(424, 50, 'TPS 007'),
(425, 50, 'TPS 008'),
(426, 50, 'TPS 009'),
(427, 50, 'TPS 010'),
(428, 50, 'TPS 011'),
(429, 50, 'TPS 012'),
(430, 50, 'TPS 013'),
(431, 50, 'TPS 014'),
(432, 50, 'TPS 015'),
(433, 50, 'TPS 016'),
(434, 50, 'TPS 017'),
(435, 50, 'TPS 018'),
(436, 50, 'TPS 019'),
(437, 50, 'TPS 020'),
(438, 50, 'TPS 021'),
(439, 50, 'TPS 022'),
(440, 50, 'TPS 023'),
(441, 50, 'TPS 024'),
(442, 50, 'TPS 025'),
(443, 50, 'TPS 026'),
(444, 50, 'TPS 027'),
(445, 50, 'TPS 028'),
(446, 50, 'TPS 029'),
(447, 50, 'TPS 030'),
(448, 50, 'TPS 031'),
(449, 50, 'TPS 032'),
(450, 50, 'TPS 033'),
(451, 50, 'TPS 034'),
(452, 50, 'TPS 035'),
(453, 50, 'TPS 036'),
(454, 50, 'TPS 037'),
(455, 50, 'TPS 038'),
(456, 50, 'TPS 039'),
(457, 50, 'TPS 040'),
(458, 50, 'TPS 041'),
(459, 50, 'TPS 042'),
(460, 50, 'TPS 043'),
(461, 50, 'TPS 044'),
(462, 50, 'TPS 045'),
(463, 50, 'TPS 046'),
(464, 50, 'TPS 047'),
(465, 50, 'TPS 048'),
(466, 50, 'TPS 049'),
(467, 50, 'TPS 050'),
(468, 50, 'TPS 051'),
(469, 50, 'TPS 052'),
(470, 50, 'TPS 053'),
(471, 50, 'TPS 054'),
(472, 50, 'TPS 055'),
(473, 50, 'TPS 056'),
(474, 50, 'TPS 057'),
(475, 50, 'TPS 058'),
(476, 50, 'TPS 059'),
(477, 50, 'TPS 060'),
(478, 50, 'TPS 061'),
(479, 50, 'TPS 062'),
(480, 50, 'TPS 063'),
(481, 50, 'TPS 064'),
(482, 50, 'TPS 065'),
(483, 50, 'TPS 066'),
(484, 50, 'TPS 067'),
(485, 50, 'TPS 068'),
(486, 50, 'TPS 069'),
(487, 50, 'TPS 070'),
(488, 50, 'TPS 071'),
(489, 50, 'TPS 072'),
(490, 50, 'TPS 073'),
(491, 50, 'TPS 074'),
(492, 50, 'TPS 075'),
(493, 51, 'TPS 001'),
(494, 51, 'TPS 002'),
(495, 51, 'TPS 003'),
(496, 51, 'TPS 004'),
(497, 51, 'TPS 005'),
(498, 51, 'TPS 006'),
(499, 51, 'TPS 007'),
(500, 51, 'TPS 008'),
(501, 51, 'TPS 009'),
(502, 51, 'TPS 010'),
(503, 51, 'TPS 011'),
(504, 51, 'TPS 012'),
(505, 51, 'TPS 013'),
(506, 51, 'TPS 014'),
(507, 51, 'TPS 015'),
(508, 51, 'TPS 016'),
(509, 51, 'TPS 017'),
(510, 51, 'TPS 018'),
(511, 51, 'TPS 019'),
(512, 51, 'TPS 020'),
(513, 51, 'TPS 021'),
(514, 51, 'TPS 022'),
(515, 51, 'TPS 023'),
(516, 52, 'TPS 001'),
(517, 52, 'TPS 002'),
(518, 52, 'TPS 003'),
(519, 52, 'TPS 004'),
(520, 52, 'TPS 005'),
(521, 52, 'TPS 006'),
(522, 52, 'TPS 007'),
(523, 52, 'TPS 008'),
(524, 52, 'TPS 009'),
(525, 52, 'TPS 010'),
(526, 52, 'TPS 011'),
(527, 52, 'TPS 012'),
(528, 52, 'TPS 013'),
(529, 52, 'TPS 014'),
(530, 52, 'TPS 015'),
(531, 52, 'TPS 016'),
(532, 52, 'TPS 017'),
(533, 52, 'TPS 018'),
(534, 52, 'TPS 019'),
(535, 52, 'TPS 020'),
(536, 52, 'TPS 021'),
(537, 52, 'TPS 022'),
(538, 52, 'TPS 023'),
(539, 52, 'TPS 024'),
(540, 52, 'TPS 025'),
(541, 52, 'TPS 026'),
(542, 52, 'TPS 027'),
(543, 52, 'TPS 028'),
(544, 52, 'TPS 029'),
(545, 52, 'TPS 030'),
(546, 52, 'TPS 031'),
(547, 52, 'TPS 032'),
(548, 52, 'TPS 033'),
(549, 52, 'TPS 034'),
(550, 52, 'TPS 035'),
(551, 52, 'TPS 036'),
(552, 52, 'TPS 037'),
(553, 52, 'TPS 038'),
(554, 52, 'TPS 039'),
(555, 52, 'TPS 040'),
(556, 52, 'TPS 041'),
(557, 52, 'TPS 042'),
(558, 52, 'TPS 043'),
(559, 52, 'TPS 044'),
(560, 52, 'TPS 045'),
(561, 52, 'TPS 046'),
(562, 52, 'TPS 047'),
(563, 52, 'TPS 048'),
(564, 52, 'TPS 049'),
(565, 52, 'TPS 050'),
(566, 52, 'TPS 051'),
(567, 52, 'TPS 052'),
(568, 52, 'TPS 053'),
(569, 52, 'TPS 054'),
(570, 52, 'TPS 055'),
(571, 52, 'TPS 056'),
(572, 52, 'TPS 057'),
(573, 52, 'TPS 058'),
(574, 52, 'TPS 059'),
(575, 52, 'TPS 060'),
(576, 52, 'TPS 061'),
(577, 52, 'TPS 062'),
(578, 52, 'TPS 063'),
(579, 52, 'TPS 064'),
(580, 52, 'TPS 065'),
(581, 52, 'TPS 066'),
(582, 52, 'TPS 067'),
(583, 52, 'TPS 068'),
(584, 52, 'TPS 069'),
(585, 53, 'TPS 001'),
(586, 53, 'TPS 002'),
(587, 53, 'TPS 003'),
(588, 53, 'TPS 004'),
(589, 53, 'TPS 005'),
(590, 53, 'TPS 006'),
(591, 53, 'TPS 007'),
(592, 53, 'TPS 008'),
(593, 53, 'TPS 009'),
(594, 53, 'TPS 010'),
(595, 53, 'TPS 011'),
(596, 53, 'TPS 012'),
(597, 53, 'TPS 013'),
(598, 53, 'TPS 014'),
(599, 53, 'TPS 015'),
(600, 53, 'TPS 016'),
(601, 53, 'TPS 017'),
(602, 53, 'TPS 018'),
(603, 53, 'TPS 019'),
(604, 53, 'TPS 020'),
(605, 53, 'TPS 021'),
(606, 53, 'TPS 022'),
(607, 53, 'TPS 023'),
(608, 53, 'TPS 024'),
(609, 53, 'TPS 025'),
(610, 53, 'TPS 026'),
(611, 53, 'TPS 027'),
(612, 53, 'TPS 028'),
(613, 53, 'TPS 029'),
(614, 53, 'TPS 030'),
(615, 53, 'TPS 031'),
(616, 53, 'TPS 032'),
(617, 53, 'TPS 033'),
(618, 53, 'TPS 034'),
(619, 53, 'TPS 035'),
(620, 53, 'TPS 036'),
(621, 53, 'TPS 037'),
(622, 53, 'TPS 038'),
(623, 53, 'TPS 039'),
(624, 53, 'TPS 040'),
(625, 53, 'TPS 041'),
(626, 53, 'TPS 042'),
(627, 53, 'TPS 043'),
(628, 53, 'TPS 044'),
(629, 53, 'TPS 045'),
(630, 53, 'TPS 046'),
(631, 53, 'TPS 047'),
(632, 53, 'TPS 048'),
(633, 53, 'TPS 049'),
(634, 53, 'TPS 050'),
(635, 53, 'TPS 051'),
(636, 53, 'TPS 052'),
(637, 53, 'TPS 053'),
(638, 53, 'TPS 054'),
(639, 53, 'TPS 055'),
(640, 53, 'TPS 056'),
(641, 53, 'TPS 057'),
(642, 53, 'TPS 058'),
(643, 53, 'TPS 059'),
(644, 53, 'TPS 060'),
(645, 53, 'TPS 061'),
(646, 53, 'TPS 062'),
(647, 53, 'TPS 063'),
(648, 53, 'TPS 064'),
(649, 54, 'TPS 001'),
(650, 54, 'TPS 002'),
(651, 54, 'TPS 003'),
(652, 54, 'TPS 004'),
(653, 54, 'TPS 005'),
(654, 54, 'TPS 006'),
(655, 54, 'TPS 007'),
(656, 54, 'TPS 008'),
(657, 54, 'TPS 009'),
(658, 54, 'TPS 010'),
(659, 54, 'TPS 011'),
(660, 54, 'TPS 012'),
(661, 54, 'TPS 013'),
(662, 54, 'TPS 014'),
(663, 54, 'TPS 015'),
(664, 54, 'TPS 016'),
(665, 54, 'TPS 017'),
(666, 54, 'TPS 018'),
(667, 54, 'TPS 019'),
(668, 54, 'TPS 020'),
(669, 54, 'TPS 021'),
(670, 54, 'TPS 022'),
(671, 54, 'TPS 023'),
(672, 54, 'TPS 024'),
(673, 54, 'TPS 025'),
(674, 54, 'TPS 026'),
(675, 54, 'TPS 027'),
(676, 54, 'TPS 028'),
(677, 54, 'TPS 029'),
(678, 54, 'TPS 030'),
(679, 54, 'TPS 031'),
(680, 54, 'TPS 032'),
(681, 54, 'TPS 033'),
(682, 54, 'TPS 034'),
(683, 54, 'TPS 035'),
(684, 56, 'TPS 001'),
(685, 56, 'TPS 002'),
(686, 56, 'TPS 003'),
(687, 56, 'TPS 004'),
(688, 56, 'TPS 005'),
(689, 56, 'TPS 006'),
(690, 56, 'TPS 007'),
(691, 56, 'TPS 008'),
(692, 56, 'TPS 009'),
(693, 56, 'TPS 010'),
(694, 56, 'TPS 011'),
(695, 56, 'TPS 012'),
(696, 56, 'TPS 013'),
(697, 56, 'TPS 014'),
(698, 56, 'TPS 015'),
(699, 56, 'TPS 016'),
(700, 56, 'TPS 017'),
(701, 56, 'TPS 018'),
(702, 56, 'TPS 019'),
(703, 56, 'TPS 020'),
(704, 56, 'TPS 021'),
(705, 56, 'TPS 022'),
(706, 56, 'TPS 023'),
(707, 56, 'TPS 024'),
(708, 56, 'TPS 025'),
(709, 56, 'TPS 026'),
(710, 56, 'TPS 027'),
(711, 56, 'TPS 028'),
(712, 56, 'TPS 029'),
(713, 56, 'TPS 030'),
(714, 56, 'TPS 031'),
(715, 56, 'TPS 032'),
(716, 56, 'TPS 033'),
(717, 56, 'TPS 034'),
(718, 56, 'TPS 035'),
(719, 56, 'TPS 036'),
(720, 56, 'TPS 037'),
(721, 56, 'TPS 038'),
(722, 56, 'TPS 039'),
(723, 56, 'TPS 040'),
(724, 56, 'TPS 041'),
(725, 56, 'TPS 042'),
(726, 56, 'TPS 043'),
(727, 56, 'TPS 044'),
(728, 56, 'TPS 045'),
(729, 56, 'TPS 046'),
(730, 56, 'TPS 047'),
(731, 56, 'TPS 048'),
(732, 56, 'TPS 049'),
(733, 56, 'TPS 050'),
(734, 56, 'TPS 051'),
(735, 56, 'TPS 052'),
(736, 56, 'TPS 053'),
(737, 56, 'TPS 054'),
(738, 55, 'TPS 001'),
(739, 55, 'TPS 002'),
(740, 55, 'TPS 003'),
(741, 55, 'TPS 004'),
(742, 55, 'TPS 005'),
(743, 55, 'TPS 006'),
(744, 55, 'TPS 007'),
(745, 55, 'TPS 008'),
(746, 55, 'TPS 009'),
(747, 55, 'TPS 010'),
(748, 55, 'TPS 011'),
(749, 55, 'TPS 012'),
(750, 55, 'TPS 013'),
(751, 55, 'TPS 014'),
(752, 55, 'TPS 015'),
(753, 55, 'TPS 016'),
(754, 55, 'TPS 017'),
(755, 55, 'TPS 018'),
(756, 55, 'TPS 019'),
(757, 55, 'TPS 020'),
(758, 55, 'TPS 021'),
(759, 55, 'TPS 022'),
(760, 55, 'TPS 023'),
(761, 55, 'TPS 024'),
(762, 55, 'TPS 025'),
(763, 55, 'TPS 026'),
(764, 55, 'TPS 027'),
(765, 55, 'TPS 028'),
(766, 55, 'TPS 029'),
(767, 55, 'TPS 030'),
(768, 55, 'TPS 031'),
(769, 55, 'TPS 032'),
(770, 55, 'TPS 033'),
(771, 55, 'TPS 034'),
(772, 55, 'TPS 035'),
(773, 55, 'TPS 036'),
(774, 55, 'TPS 037'),
(775, 55, 'TPS 038'),
(776, 55, 'TPS 039'),
(777, 55, 'TPS 040'),
(778, 55, 'TPS 041'),
(779, 55, 'TPS 042'),
(780, 55, 'TPS 043'),
(781, 55, 'TPS 044'),
(782, 55, 'TPS 045'),
(783, 55, 'TPS 046'),
(784, 55, 'TPS 047'),
(785, 55, 'TPS 048'),
(786, 55, 'TPS 049'),
(787, 55, 'TPS 050'),
(788, 55, 'TPS 051'),
(789, 55, 'TPS 052'),
(790, 55, 'TPS 053'),
(791, 55, 'TPS 054'),
(792, 55, 'TPS 055'),
(793, 55, 'TPS 056'),
(794, 55, 'TPS 057'),
(795, 55, 'TPS 058'),
(796, 55, 'TPS 059'),
(797, 55, 'TPS 060'),
(798, 55, 'TPS 061'),
(799, 55, 'TPS 062'),
(800, 46, 'TPS 001'),
(801, 46, 'TPS 002'),
(802, 46, 'TPS 003'),
(803, 46, 'TPS 004'),
(804, 46, 'TPS 005'),
(805, 46, 'TPS 006'),
(806, 46, 'TPS 007'),
(807, 46, 'TPS 008'),
(808, 46, 'TPS 009'),
(809, 46, 'TPS 010'),
(810, 46, 'TPS 011'),
(811, 46, 'TPS 012'),
(812, 46, 'TPS 013'),
(813, 46, 'TPS 014'),
(814, 46, 'TPS 015'),
(815, 46, 'TPS 016'),
(816, 46, 'TPS 017'),
(817, 46, 'TPS 018'),
(818, 46, 'TPS 019'),
(819, 46, 'TPS 020'),
(820, 47, 'TPS 001'),
(821, 47, 'TPS 002'),
(822, 47, 'TPS 003'),
(823, 47, 'TPS 004'),
(824, 47, 'TPS 005'),
(825, 47, 'TPS 006'),
(826, 47, 'TPS 007'),
(827, 47, 'TPS 008'),
(828, 47, 'TPS 009'),
(829, 47, 'TPS 010'),
(830, 47, 'TPS 011'),
(831, 47, 'TPS 012'),
(832, 47, 'TPS 013'),
(833, 47, 'TPS 014'),
(834, 47, 'TPS 015'),
(835, 47, 'TPS 016'),
(836, 47, 'TPS 017'),
(837, 47, 'TPS 018'),
(838, 47, 'TPS 019'),
(839, 47, 'TPS 020'),
(840, 47, 'TPS 021'),
(841, 47, 'TPS 022'),
(842, 47, 'TPS 023'),
(843, 47, 'TPS 024'),
(844, 47, 'TPS 025'),
(845, 47, 'TPS 026'),
(846, 47, 'TPS 027'),
(847, 47, 'TPS 028'),
(848, 47, 'TPS 029'),
(849, 47, 'TPS 030'),
(850, 47, 'TPS 031'),
(851, 47, 'TPS 032'),
(852, 47, 'TPS 033'),
(853, 47, 'TPS 034'),
(854, 47, 'TPS 035'),
(855, 47, 'TPS 036'),
(856, 47, 'TPS 037'),
(857, 47, 'TPS 038'),
(858, 47, 'TPS 039'),
(859, 25, 'TPS 001'),
(860, 25, 'TPS 002'),
(861, 25, 'TPS 003'),
(862, 25, 'TPS 004'),
(863, 25, 'TPS 005'),
(864, 25, 'TPS 006'),
(865, 25, 'TPS 007'),
(866, 25, 'TPS 008'),
(867, 25, 'TPS 009'),
(868, 25, 'TPS 010'),
(869, 25, 'TPS 011'),
(870, 25, 'TPS 012'),
(871, 25, 'TPS 013'),
(872, 25, 'TPS 014'),
(873, 25, 'TPS 015'),
(874, 25, 'TPS 016'),
(875, 25, 'TPS 017'),
(876, 25, 'TPS 018'),
(877, 25, 'TPS 019'),
(878, 25, 'TPS 020'),
(879, 25, 'TPS 021'),
(880, 25, 'TPS 022'),
(881, 25, 'TPS 023'),
(882, 25, 'TPS 024'),
(883, 26, 'TPS 001'),
(884, 26, 'TPS 002'),
(885, 26, 'TPS 003'),
(886, 26, 'TPS 004'),
(887, 26, 'TPS 005'),
(888, 26, 'TPS 006'),
(889, 26, 'TPS 007'),
(890, 26, 'TPS 008'),
(891, 26, 'TPS 009'),
(892, 26, 'TPS 010'),
(893, 26, 'TPS 011'),
(894, 26, 'TPS 012'),
(895, 26, 'TPS 013'),
(896, 26, 'TPS 014'),
(897, 26, 'TPS 015'),
(898, 26, 'TPS 016'),
(899, 27, 'TPS 001'),
(900, 27, 'TPS 002'),
(901, 27, 'TPS 003'),
(902, 33, 'TPS 001'),
(903, 33, 'TPS 002'),
(904, 33, 'TPS 003'),
(905, 33, 'TPS 004'),
(906, 33, 'TPS 005'),
(907, 33, 'TPS 006'),
(908, 34, 'TPS 001'),
(909, 34, 'TPS 002'),
(910, 34, 'TPS 003'),
(911, 35, 'TPS 001'),
(912, 35, 'TPS 002'),
(913, 35, 'TPS 003'),
(914, 35, 'TPS 004'),
(915, 35, 'TPS 005'),
(916, 35, 'TPS 006'),
(917, 35, 'TPS 007'),
(918, 36, 'TPS 001'),
(919, 36, 'TPS 002'),
(920, 36, 'TPS 003'),
(921, 36, 'TPS 004'),
(922, 37, 'TPS 001'),
(923, 37, 'TPS 002'),
(924, 37, 'TPS 003'),
(925, 37, 'TPS 004'),
(926, 37, 'TPS 005'),
(927, 37, 'TPS 006'),
(928, 37, 'TPS 007'),
(929, 37, 'TPS 008'),
(930, 37, 'TPS 009'),
(931, 37, 'TPS 010'),
(932, 37, 'TPS 011'),
(933, 37, 'TPS 012'),
(934, 37, 'TPS 013'),
(935, 37, 'TPS 014'),
(936, 38, 'TPS 001'),
(937, 38, 'TPS 002'),
(938, 38, 'TPS 003'),
(939, 39, 'TPS 001'),
(940, 39, 'TPS 002'),
(941, 39, 'TPS 003'),
(942, 39, 'TPS 004'),
(943, 39, 'TPS 005'),
(944, 39, 'TPS 006'),
(945, 39, 'TPS 007'),
(946, 39, 'TPS 008'),
(947, 39, 'TPS 009'),
(948, 39, 'TPS 010'),
(949, 39, 'TPS 011'),
(950, 39, 'TPS 012'),
(951, 39, 'TPS 013'),
(952, 39, 'TPS 014'),
(953, 40, 'TPS 001'),
(954, 40, 'TPS 002'),
(955, 40, 'TPS 003'),
(956, 40, 'TPS 004'),
(957, 40, 'TPS 005'),
(958, 40, 'TPS 006'),
(959, 40, 'TPS 007'),
(960, 40, 'TPS 008'),
(961, 40, 'TPS 009'),
(962, 40, 'TPS 010'),
(963, 40, 'TPS 011'),
(964, 41, 'TPS 001'),
(965, 41, 'TPS 002'),
(966, 41, 'TPS 003'),
(967, 41, 'TPS 004'),
(968, 41, 'TPS 005'),
(969, 41, 'TPS 006'),
(970, 41, 'TPS 007'),
(971, 41, 'TPS 008'),
(972, 41, 'TPS 009'),
(973, 41, 'TPS 010'),
(974, 41, 'TPS 011'),
(975, 41, 'TPS 012'),
(976, 41, 'TPS 013'),
(977, 41, 'TPS 014'),
(978, 41, 'TPS 015'),
(979, 41, 'TPS 016'),
(980, 41, 'TPS 017'),
(981, 41, 'TPS 018'),
(982, 41, 'TPS 019'),
(983, 41, 'TPS 020'),
(984, 41, 'TPS 021'),
(985, 41, 'TPS 022'),
(986, 41, 'TPS 023'),
(987, 41, 'TPS 024'),
(988, 41, 'TPS 025'),
(989, 41, 'TPS 026'),
(990, 41, 'TPS 027'),
(991, 41, 'TPS 028'),
(992, 41, 'TPS 029'),
(993, 42, 'TPS 001'),
(994, 42, 'TPS 002'),
(995, 42, 'TPS 003'),
(996, 42, 'TPS 004'),
(997, 42, 'TPS 005'),
(998, 42, 'TPS 006'),
(999, 42, 'TPS 007'),
(1000, 42, 'TPS 008'),
(1001, 42, 'TPS 009'),
(1002, 42, 'TPS 010'),
(1003, 42, 'TPS 011'),
(1004, 42, 'TPS 012'),
(1005, 42, 'TPS 013'),
(1006, 42, 'TPS 014'),
(1007, 42, 'TPS 015'),
(1008, 42, 'TPS 016'),
(1009, 42, 'TPS 017'),
(1010, 43, 'TPS 001'),
(1011, 43, 'TPS 002'),
(1012, 43, 'TPS 003'),
(1013, 43, 'TPS 004'),
(1014, 43, 'TPS 005'),
(1015, 43, 'TPS 006'),
(1016, 43, 'TPS 007'),
(1017, 43, 'TPS 008'),
(1018, 43, 'TPS 009'),
(1019, 43, 'TPS 010'),
(1020, 43, 'TPS 011'),
(1021, 43, 'TPS 012'),
(1022, 43, 'TPS 013'),
(1023, 44, 'TPS 001'),
(1024, 44, 'TPS 002'),
(1025, 45, 'TPS 001'),
(1026, 45, 'TPS 002'),
(1027, 28, 'TPS 001'),
(1028, 28, 'TPS 002'),
(1029, 28, 'TPS 003'),
(1030, 28, 'TPS 004'),
(1031, 28, 'TPS 005'),
(1032, 28, 'TPS 006'),
(1033, 28, 'TPS 007'),
(1034, 28, 'TPS 008'),
(1035, 28, 'TPS 009'),
(1036, 28, 'TPS 010'),
(1037, 28, 'TPS 011'),
(1038, 28, 'TPS 012'),
(1039, 28, 'TPS 013'),
(1040, 28, 'TPS 014'),
(1041, 28, 'TPS 015'),
(1042, 28, 'TPS 016'),
(1043, 28, 'TPS 017'),
(1044, 28, 'TPS 018'),
(1045, 28, 'TPS 019'),
(1046, 28, 'TPS 020'),
(1047, 28, 'TPS 021'),
(1048, 28, 'TPS 022'),
(1049, 28, 'TPS 023'),
(1050, 28, 'TPS 024'),
(1051, 29, 'TPS 001'),
(1052, 29, 'TPS 002'),
(1053, 29, 'TPS 003'),
(1054, 29, 'TPS 004'),
(1055, 29, 'TPS 005'),
(1056, 29, 'TPS 006'),
(1057, 29, 'TPS 007'),
(1058, 29, 'TPS 008'),
(1059, 29, 'TPS 009'),
(1060, 29, 'TPS 010'),
(1061, 29, 'TPS 011'),
(1062, 29, 'TPS 012'),
(1063, 30, 'TPS 001'),
(1064, 30, 'TPS 002'),
(1065, 30, 'TPS 003'),
(1066, 30, 'TPS 004'),
(1067, 30, 'TPS 005'),
(1068, 30, 'TPS 006'),
(1069, 31, 'TPS 001'),
(1070, 31, 'TPS 002'),
(1071, 31, 'TPS 003'),
(1072, 31, 'TPS 004'),
(1073, 31, 'TPS 005'),
(1074, 32, 'TPS 001'),
(1075, 32, 'TPS 002'),
(1076, 32, 'TPS 003'),
(1077, 32, 'TPS 004'),
(1078, 32, 'TPS 005'),
(1079, 32, 'TPS 006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','kordinator_desa','saksi') NOT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `id_tps` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `role`, `id_desa`, `id_tps`, `created_at`) VALUES
(3, 'Admin Utama', 'admin', '123456', 'admin', NULL, NULL, '2026-05-27 14:42:05'),
(4, 'Saksi TPS 001', 'saksi1', '123456', 'saksi', NULL, 1, '2026-05-27 14:42:45'),
(6, 'Kordinator Desa', 'kordes2', '123456', 'kordinator_desa', 2, NULL, '2026-05-29 03:42:16'),
(8, 'cecep', 'admin1', '123456', 'admin', NULL, NULL, '2026-05-29 04:35:46'),
(12, 'admin', 'admin2', '123456', 'admin', NULL, NULL, '2026-06-05 16:05:30'),
(13, 'cecep', 'Bantarkawung', '123456', 'kordinator_desa', 7, NULL, '2026-06-06 07:54:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `caleg`
--
ALTER TABLE `caleg`
  ADD PRIMARY KEY (`id_caleg`),
  ADD KEY `id_dapil` (`id_dapil`);

--
-- Indeks untuk tabel `dapil`
--
ALTER TABLE `dapil`
  ADD PRIMARY KEY (`id_dapil`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `saksi`
--
ALTER TABLE `saksi`
  ADD PRIMARY KEY (`id_saksi`);

--
-- Indeks untuk tabel `suara`
--
ALTER TABLE `suara`
  ADD PRIMARY KEY (`id_suara`);

--
-- Indeks untuk tabel `tps`
--
ALTER TABLE `tps`
  ADD PRIMARY KEY (`id_tps`),
  ADD KEY `id_desa` (`id_desa`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `caleg`
--
ALTER TABLE `caleg`
  MODIFY `id_caleg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `dapil`
--
ALTER TABLE `dapil`
  MODIFY `id_dapil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `saksi`
--
ALTER TABLE `saksi`
  MODIFY `id_saksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `suara`
--
ALTER TABLE `suara`
  MODIFY `id_suara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT untuk tabel `tps`
--
ALTER TABLE `tps`
  MODIFY `id_tps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1080;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `caleg`
--
ALTER TABLE `caleg`
  ADD CONSTRAINT `caleg_ibfk_1` FOREIGN KEY (`id_dapil`) REFERENCES `dapil` (`id_dapil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dapil`
--
ALTER TABLE `dapil`
  ADD CONSTRAINT `dapil_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id_kabupaten`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id_kabupaten`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tps`
--
ALTER TABLE `tps`
  ADD CONSTRAINT `tps_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
