-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 01:27 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peta_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_active`) VALUES
(8, 'nonnywind', 'nonino@gmail.com', '$2y$10$Is2fcNG00zcDVhepngaTUeu6eP5N6WoPw5Q4IJleISBPBTzLDuz/2', '0'),
(10, 'admin', 'admin@admin.com', '$2y$10$41vcErMHugcOXAkPW3BmaeeFZJtpFVc0kW9/4DlnPczT1apN1aqHC', '0');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` int(100) NOT NULL,
  `artikel_kat` int(11) NOT NULL,
  `artikel_judul` varchar(255) NOT NULL,
  `artikel_lat` varchar(100) NOT NULL,
  `artikel_long` varchar(100) NOT NULL,
  `artikel_isi` text NOT NULL,
  `artikel_gambar` text NOT NULL,
  `artikel_alamat` varchar(50) NOT NULL,
  `artikel_buka` varchar(50) NOT NULL,
  `artikel_tiket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikel_id`, `artikel_kat`, `artikel_judul`, `artikel_lat`, `artikel_long`, `artikel_isi`, `artikel_gambar`, `artikel_alamat`, `artikel_buka`, `artikel_tiket`) VALUES
(112, 41, 'Taman Slamet', '-7.973410', '112.622396', 'Taman Slamet Malang adalah taman yang berada dalam lingkungan perumahan yang ada di wilayah Kelurahan Gading Kasri, tepatnya di Jalan Taman Slamet,  Kelurahan Gading Kasri, Kecamatan Klojen, Malang\r\nÂ \r\nBerdasarakan keterangan yang ada, Taman ini pada awalnya hanya berupa taman biasa dengan beberapa pohon yang di tengahnya terdapat jalur pejalan kaki, namun selanjutnya direnovasi dengan konsep yang lebih unik sehingga tak hanya sebagai tempat bersantai saja melainkan dapat pulla dijadikan tempat berolahraga.\r\nÂ \r\nTak hanya sekedar taman biasa saja namun Taman Slamet memiliki konsep yang unik dengan desain yang sangat menarik. Jadi wajar saja kalau tempat ini menjadi favoritnya anal muda untuk sekedar bersantai, nongkrong dan berfoto ria disana.\r\nÂ \r\nSeperti yang sudah saya  dijelaskan di atas, Taman Slamet menjadi salah satu tempat asyik buat nongkrong, berfoto dan olahraga. Ada beberapa spot yang menjadi favoritnya para pengunjung saat sedang berada di Taman Slamet.\r\n', '1574054371_1571079850_83a3d3e591fc913bce5b293f04901d73.jpg', 'Jl. Taman Slamet No.2', '18:00 - 21:00', 'Free'),
(114, 42, 'Kampung Biru Arema', '-7.981202', '112.637313', 'Setelah sukses dengan Kampung Warna-Warni Jodipan, Malang sekarang punya destinasi kampung tematik baru. Lokasinya tepat berada di seberangnya. Sesuai namanya, tiap sudut jalan dan rumah di \"Kampung Biru Arema\" didominasi warna biru yang identik dengan Arema..\r\n<p>&nbsp;</p>\r\nKampung yang diresmikan 6 Februari 2018 ini terletak di Embong Brantas, Malang. Kalau mampir ke sini, kamu bisa sekalian berkunjung ke Kampung Warna-Warni Jodipan dan Kampung Tridi.\r\n<p>&nbsp;</p>\r\nSelain sebagai tempat wisata, warga kampung ini juga mengembangkan berbagai UKM, lho! Di antaranya menyulap sampah kering menjadi bahan-bahan siap pakai, seperti vas bunga, hiasan meja, aksesoris wanita, dan sebagainya.\r\n', '1574054351_291372a0dea6aa55c8e9efce92c7492e.jpg', 'Kiduldalem, Kec. Klojen, Kota Malang', '06:00 - 18:00 WIB', 'Rp. 2.000'),
(115, 40, 'Kampung Putih', '-7.972484', '112.631267', 'ak hanya Jodipan saja yang mampu disulap menjadi Kampung Warna-warni di Kota Malang. Ada pula Kampung Putih Celaket yang dulunya cuma kampung kumuh sama seperti Jodipan yang berada di tepian Sungai Brantas.\r\n<p>&nbsp;</p>\r\nJulukan Kampung Putih kini melekat pada kampung RW 06 Jalan Jaksa Agung Suprapto, Kelurahan Rampal-Celaket, Kecamatan Klojen, Kota Malang. Wilayah yang berada di seberang Polresta Malang ini kini tampak indah dipandang mata setelah menjadi Kampung Putih.\r\n<p>&nbsp;</p>\r\nSeiring berjalannya waktu, ada inisiatif dari para RT untuk bergerak memperbaiki kebiasaan masyarakat. Awalnya dengan mengikuti lomba Kampung Bersinar. Pimpinan warga pun menekankan kepada para anggotanya untuk memperbaiki lingkungan masing-masing. Mereka pun menggalakkan penghijauan agar lingkungan kampung bisa diperbaiki. Yang paling penting untuk ditekankan, yakni sama-sama menjaga kebersihan lingkungan kampung. Meski akhirnya gagal menjadi juara lomba, setidaknya kesadaran masyarakat akan kelestarian lingkungan sudah tumbuh.\r\n', '1574122263_kampung-putih-kota-malang-2017-2018-2019-2020-2021-2022-2023-2024.jpg', 'Jalan Jaksa Agung Suprapto, Klojen, Kec. Klojen', '06:00 - 18:00 WIB', 'Rp. 2.000'),
(116, 41, 'Alun-Alun Malang', '-7.982573', '112.630566', 'Tempat yang tak pernah sepi oleh pengunjung karena sebagai paru-paru kota, sebut saja tempat itu Alun-Alun Kota Malang. Alun-Alun Kota Malang melengkapi keindahannya dan menghadirkan suasana yang selalu hangat dengan keramahan warga kota yang bersahabat kepada setiap orang yang datang.Salah satu dari alun-alun yang dimiliki oleh kota Malang dan sangat terkenal itu adalah Alun-Alun Kota Malang. Sebutan lain yang juga akrab dengan para pengunjungnya ini adalah alun-alun Jamiâ€™ karena letak Alun-Alun Kota Malang ini tepat didepan masjid Jamiâ€™. Letaknya pun juga sangat strategis lengkap dengan dikelilingi oleh pusat perbelanjaan seperti Sarinah, Ramayana, Mitra, Malang Plaza dan Gajah Mada Plaza. Tak hanya itu, akomodasinya pun lengkap dengan fasisiltas lengkapnya yaitu hotel, bank, kantor pos, gereja, masjid dan lainnya.\r\n<p>&nbsp;</p>\r\nDi Alun-Alun Kota Malang, kalian dapat menikmati persahabatan dengan air mancur dari kolam yang berada tepat ditengah alun-alun, inilah hal utama yang menjadi poros dari keindahan Alun-Alun Kota Malang. Selain itu ada juga landasan skate board, play ground, shaf shalat terbuka dan track bersepeda. Ketika weekend menjelang, maka alun-alun ini sangat ramai dengan acara keluarga hingga muda-mudi yang asyik berpacaran terutama pada malam hari. Memang suasana nongkrong dan menghabiskan waktu dengan orang-orang terdekat di area alun-alun Malang ini sangatlah asyik sehingga keramaiannya pun menjadi kebanggan tersendiri dalam suasana kota.\r\n\r\n', '1574054323_1571594924_b55a2165f4c9b44c9c1986577cb756a7.jpg', 'Jl. Merdeka Selatan, Kiduldalem, Kec. Klojen', '18:00 - 22:00 WIB', 'Free'),
(163, 40, 'Museum Mpu Purwa', '-7.940140', '112.620812', 'Koleksi benda purbakala yang disimpan di Museum Mpu Purwa berasal dari masa pra sejarah hingga masa sejarah, yaitu masa Hindu-Buddha.  Peninggalan yang berasal dari masa pra sejarah berupa batu pelor, batu gores dan batu lumpang. Batu gores ditemukan di bibir Sungai Metro yang berada di wilayah Tlogomas.\r\n<p>&nbsp;</p>\r\nPeninggalan lainnya adalah peninggalan yang berasal dari zaman Hindu-Budda. Peninggalan yang dari zaman Hindu-Buddha berasal dari Kerajaan Kanjuruhan, Kerajaan Mataram Kuno, Kerajaan Kediri, Kerajaan Singasari, dan Kerajaan Majapahit.\r\n<p>&nbsp;</p>\r\nPeninggalan dari masa Hindu-Buddha berupa prasasti, arca, makara, antefix, kemuncak candi, lingga dan yoni. Koleksi prasasti meliputi prasasti Muncang, prasasti Dinoyo dan Prasasti Kanuruhan. Prasasti Dinoyo ini berasal dari Kerajaan Kanjuruhan yang merupakan kerajaan tertua di Jawa Timur yang berdiri sekitar abad ke-8. Sedangkan, prasasti Kanuruhan adalah prasasti yang terpahat pada sandaran arca Ganesha, yang berangka tahun 856 Saka dan dikeluarkan oleh Rakarayan Kanuruhan Dyah Mungpang.\r\n', '1574054302_7f5125e9944faf40627dd5ef8c6d30f3.jpeg', 'Jl. Soekarno Hatta Perumahan Griya Samta Blk. B No', '09:00 - 15:00 WIB', 'Free'),
(164, 41, 'Taman Singha Merjosari', '-7.938022', '112.588641', 'Taman Singha Merjosari merupakan taman yang terletak di Jalan Mertojoyo Selatan, kelurahan Merjosari, Malang. Dapat dikatakan bahwa taman ini memiliki fasilitas yang sangat lengkap. Keberadaannya yang sangat dekat dengan pemukiman warga membuat taman ini selalu ramai dikunjungi khususnya pada hari-hari libur.\r\n<p>&nbsp;</p>\r\nMenurut keterangan yang ada, taman Singha Merjosari merupakan taman kota yang dibangun dengan konsep kriteria taman kota hijau. Taman yang rencananya mencapai luas 29.012 m2 ini, bertujuan untuk  memenuhi amanat UU Penataan Ruang, sebagai sarana interaksi sosial budaya, tempat bermain dan belajar bersama menuju kehidupan lestari. Menjadikan taman memiliki keseimbangan fungsi ekologis, hidrologis, kesehatan, sosial, ekonomi dan kesehatan.\r\n<p>&nbsp;</p>\r\nMayoritas pengunjung yang datang ke taman ini, bertujuan untuk berlari. Hampir setiap pagi dan sore pasti banyak pengunjung yang berlari mengelilingi taman ini. Luas taman yang cukup besar serta dibuatnya jalan yang melingkari tepi taman, membuat hal itu menjadi fasilitas tersediri bagi para pengunjung untuk bisa berlari di taman Singha Merjosari.', '1574121254_ruang-kebugaran.jpg', 'Tlogomas, Kec. Lowokwaru, Kota Malang, Jawa Timur', '06:00 - 18:00 WIB', 'Free'),
(165, 40, 'Museum Brawijaya', '-7.971801', '112.621170', 'Museum Brawijaya merupakan museum bertemakan militer yang menyimpan informasi di era perjuangan Indonesia. Museum Brawijaya berperan sebagai rekreasi, pendidikan, penelitian ilmia, pembinaan wilayah, pembinaan mental juang, pewarisan nilai-nilai perjuangan 1945 untuk TNI dan patriotisme untuk umum. Untuk menuju Museum Brawijaya tidaklah sulit. Letaknya di Kota Malang Provinsi Jawa Timur. Tepatnya di Jl. Ijen No. 25 A, Gading Kasri, Kecamatan Klojen, Kota Malang, Provinsi Jawa Timur.\r\n<p>&nbsp;</p>\r\nOrang hebat yang berinisiatif untuk mendirikan Museum Brawijaya adalah Brigjen TNI (Purn) Soerachman sejak tahun 1962. Brigjen Soerachman adalah mantan Pangdam V/Brawijaya periode tahun 1959 hingga 1962). Keputusan Brigjen Soerachman didukung oleh Pemerintah Kota Malang dengan menyediakan tanah seluas 10500 m2. Juga dukungan dana dari Sdr.\r\n<p>&nbsp;</p>\r\nMartha yang merupakan pemilik hotel di Tretes Kota Pandaan. Sedangkan perancang Museum Brawijaya adalah seorang arsitek bernama Kapten Soemadi. Pembangunan dimulai dimulai tahun 1967 hingga 1968. Begitu selesai, penamaan Museum Brawijaya dilakukan oleh Pangdam V/Brawijaya pada tanggal 16 April 1968 dan ditambahkan wejangan Citra Uthapana Cakra yang berarti sinar membangkitkan semangat. Peresmian dilakukan pada tanggal 4 Mei 1968. Museum Brawijaya memiliki lima tempat koleksi yaitu halaman depan, ruang lobi, halaman tengah, ruang koleksi I dan ruang koleksi II.\r\n\r\n', '1574121829_218Museum-Brawijaya-Malang.jpg', 'Jl. Ijen No.25 A, Gading Kasri, Kec. Klojen', '08:00 - 15:00 WIB', 'Free'),
(166, 43, 'Cafe Loe Min Toe', '-7.935392', '112.609124', 'Memasuki daerah perumahan Jalan Tata Surya 2, di ujung jalan akan tampak sebuah rumah dengan gerbang yang nyentrik. Gerbang kayu berhiaskan tirai merah dan lampion. Di atasnya terdapat papan nama dengan tulisan huruf mandarin dan huruf alfabet Roemah Coffee Loe Mien Toe.\r\n<p>&nbsp;</p>\r\nDi bawah Loe Min Toe mengalir Sungai Brantas. Memberi hawa sejuk sehingga semua ruangan Loe Min Toe tidak lagi perlu pendingin ruangan. Tentunya suara musik alami, aliran Sungai Brantas yang menenangkan. Tidak heran saat KompasTravel berkunjung ke Loe Min Toe, tampak beberapa kelompok mahasiswa sedang fokus mengerjakan tugas mereka di laptop.\r\n<p>&nbsp;</p>\r\n\r\nSoal pilihan makanan, Loe Min Toe tidak memiliki banyak pilihan tetapi ada camilan dan makanan berat seperti nasi ayam, mie dan kwetiauw goreng untuk mengganjal perut. Harganya tentu harga yang bersahabat dengan mahasiswa, berkisar Rp 10.000 an.\r\n\r\n\r\n', '1574123122_f62edd2184a9bfef006c8047b452d656.jpg', 'Jalan Tata Surya 2, Dinoyo', '13:00 - 23:00 WIB', 'FREE');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kat_id` int(100) NOT NULL,
  `kat_judul` text NOT NULL,
  `kat_ikon` text NOT NULL,
  `kat_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kat_id`, `kat_judul`, `kat_ikon`, `kat_isi`) VALUES
(40, 'Edukasi', '1574120107_3. edukasi.png', 'Wisata Edukasi adalah suatu perjalanan wisata yang memiliki nilai tambah edukasi, tidak sekedar berwisata'),
(41, 'Taman', '1574120091_5. Taman.png', 'Taman merupakan salah satu tempat yang bisa dijadikan tempat bersantai bersama keluarga dan teman-teman'),
(42, 'Kampung Tematik', '1574120446_1. Tematik.png', 'Kampung Tematik sebagai upaya untuk melibatkan masyarakat dalam pembangunan'),
(43, 'Kuliner', '1574120456_4. kuliner.png', 'Wisata kuliner adalah suatu perjalanan yang di dalamnya meliputi kegiatan mengonsumsi makanan lokal dari suatu daerah'),
(44, 'Wisata Heritage', '1574120468_6. Museum.png', 'Wisata heritage merupakan sebuah perjalanan yang dikemas dengan mengunjungi tempat yang dianggap mempunyai sejara'),
(45, 'aa', '1574120012_1. Tematik.png', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `set_id` int(100) NOT NULL,
  `set_zoom` varchar(50) NOT NULL,
  `set_lat` varchar(50) NOT NULL,
  `set_long` varchar(50) NOT NULL,
  `set_api` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`set_id`, `set_zoom`, `set_lat`, `set_long`, `set_api`) VALUES
(1, '13', '-7.967073', '112.631438', '&callback=initMap');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`),
  ADD KEY `fk_artikel_kat` (`artikel_kat`) USING BTREE;

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kat_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`set_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikel_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `set_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`artikel_kat`) REFERENCES `kategori` (`kat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
