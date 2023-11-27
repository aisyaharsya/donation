-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2020 at 10:14 PM
-- Server version: 10.3.24-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aguspram_sedekah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbabout`
--

CREATE TABLE `tbabout` (
  `idAbout` int(11) NOT NULL,
  `isi` text NOT NULL,
  `nope` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `framelokasi` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `namaweb` varchar(120) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `tagline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbabout`
--

INSERT INTO `tbabout` (`idAbout`, `isi`, `nope`, `alamat`, `email`, `framelokasi`, `logo`, `namaweb`, `favicon`, `tagline`) VALUES
(4, '<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '085261523578', 'Jl Kasuari No 71 A', 'agus.pramono3545@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.081256248575!2d98.62396511533257!3d3.5687766974029107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312f0616a92115%3A0xa10b4efb9ecf442e!2sRCW%20MALL!5e0!3m2!1sid!2sid!4v1593577300737!5m2!1sid!2sid', 'logo.png', 'Galang Dana', 'favicon.png', 'Galang dana seperti kitabisa');

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `idAdmin` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `namaPengguna` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `nope` varchar(15) NOT NULL,
  `kataSandi` varchar(150) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'A=Admin,K=Kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`idAdmin`, `nama`, `namaPengguna`, `alamat`, `nope`, `kataSandi`, `status`) VALUES
(2, 'admin', 'admingans', 'admingans', '08123131', '827ccb0eea8a706c4c34a16891f84e7b', 'K'),
(3, 'Rahma', 'admin', 'Sunggal', '0657567567', '21232f297a57a5a743894a0e4a801fc3', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idAnggota` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(150) NOT NULL,
  `asal` varchar(150) DEFAULT NULL,
  `nope` varchar(15) NOT NULL,
  `alamatEmail` varchar(150) NOT NULL,
  `kataSandi` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL,
  `verif` char(1) NOT NULL COMMENT 'N=Tidak, Y=Ok',
  `verifakun` char(1) NOT NULL COMMENT 'Y=Ok,N=Belum',
  `idTemp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbanggota`
--

INSERT INTO `tbanggota` (`idAnggota`, `tanggal`, `nama`, `asal`, `nope`, `alamatEmail`, `kataSandi`, `status`, `verif`, `verifakun`, `idTemp`) VALUES
(66, '2020-04-18', 'Agus Pramono', 'Medan Sunggal', '085261523578', 'agus.pramono3545@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Dilihat', 'Y', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(67, '2020-04-22', 'Rahma Sari', 'Medan Selayang', '085261523585', 'broagusid@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(68, '2020-05-01', 'hilman', 'Medan Selayang', '082321282556', 'zahdika@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(69, '2020-05-11', 'test', 'Medan Selayang', '08222222222', 'isal29blog@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(70, '2020-05-27', 'Nugroho', 'Medan Amplas', '081354795695', 'shwebhostgroup@gmail.com', '7ef6156c32f427d713144f67e2ef14d2', 'Dilihat', 'Y', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(71, '2020-06-02', 'andrean', 'Medan Amplas', '081212121212', 'sarah@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(72, '2020-06-02', 'andrean', 'Medan Amplas', '081282828282', 'andreanpratama4422@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(73, '2020-06-12', 'susi susanti', 'Medan Sunggal', '085261974217', 'susisusantitv@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(74, '2020-06-17', 'Violin', 'Medan Amplas', '08158800585', 'violin.mastergroup@gmail.com', '598f4aa004d3b579917d5209bf28645b', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(75, '2020-06-23', 'yusak edi', 'Medan Amplas', '0895331774669', 'jusacedy@gmail.com', '63805e1b4691b6195b8e933084ed556d', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(76, '2020-06-24', 'muhammad rizal', 'Medan Amplas', '082336414207', 'm.rizal90@gmail.com', '3de77d35fb104ab429f4fb447944683e', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(77, '2020-06-27', 'mujahid yatimcare', 'Medan Selayang', '089531500960', 'yatimcare.indonesia@gmail.com', '0404fc93f3c4d318fed37869071e78ed', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(78, '2020-06-30', 'harel aryadi', 'Medan Amplas', '082136068256', 'harelaryadi1989@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dilihat', 'Y', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(79, '2020-06-30', 'dasdasd', 'Medan Amplas', '085261523597', 'demos@softaculous.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(80, '2020-07-02', 'reaza', 'Medan Amplas', '081280462650', 'rzalvaero@gmail.com', 'd4e02bad1088ec08439bf6f7fcd0ddeb', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(81, '2020-07-06', 'Musa', 'Medan Amplas', '08118317706', 'rizal.squatbravo@gmail.com', '6e27f728a29b0deb6595d2536fd2dc16', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(82, '2020-07-06', 'Agus', 'Medan Amplas', '08524655595', 'agus.prahma5@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(83, '2020-07-21', 'Ucok', 'Medan Selayang', '0888766', 'lembagazakat01@gmail.com', 'c383a6f093a9dc8bb1eafbd2cd99dab5', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(84, '2020-07-23', 'ermayuli', 'Medan Amplas', '083863350554', 'ermayuli013@gmail.com', '0254324664f7fb0b0ab273f630f3d58e', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(85, '2020-07-25', 'Nasrul', 'Medan Amplas', '082227883943', 'kang.nasruloh@gmail.com', '202cb962ac59075b964b07152d234b70', 'Dilihat', '', 'Y', 'd41d8cd98f00b204e9800998ecf8427e'),
(86, '2020-08-30', 'admin', NULL, '000', 'a@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '', 'N', '70b03db954aa45fc2559e85f5d5bd13e'),
(87, '2020-09-09', 'Bagoes Ilham', NULL, '081362925347', 'bagusilhamy8@gmail.com', 'dd024268c232b645c6adf1e69bafbf9a', '', '', 'N', 'efd84a56b311ef1fcb4a3bcab756e452'),
(88, '2020-09-17', 'Alif', NULL, '085211883678', 'alanferano@gmail.com', '15af36ea8662dd375cdc4a5603ac7954', '', '', 'Y', '4eaf666c9ac131e014e99fc9e2966c0c'),
(89, '2020-10-02', 'Rajnaparamitha Kusuamstuti', NULL, '+6282242022078', 'rajnaparamitha.01@students.amikom.ac.id', 'ca8113fc64bce017540bfe1417b5e12a', '', '', 'Y', '79caeef432131388b11b55f37b17663e'),
(90, '2020-10-17', 'akbar', NULL, '083872596396', 'akbarlpf@gmail.com', '7a9baff39b21ba8314f1de02545749dd', '', '', 'Y', 'dc57310b844cd1a2f7aae201326c7eeb');

-- --------------------------------------------------------

--
-- Table structure for table `tbartikel`
--

CREATE TABLE `tbartikel` (
  `idArtikel` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `slug` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbartikel`
--

INSERT INTO `tbartikel` (`idArtikel`, `tanggal`, `judul`, `isi`, `thumbnail`, `slug`) VALUES
(6, '2020-04-19', 'Sedekha Tanda Kita Bersyukur', '<h1>Definisi Sedekah</h1>\r\n\r\n<p>Sedekah merupakan kata yang sangat familiar di kalangan umat Islam. Sedekah diambil dari kata bahasa Arab yaitu <em>&ldquo;shadaqah&rdquo;</em>, berasal dari kata <em>sidq (sidiq)</em> yang berarti &ldquo;kebenaran&rdquo;. Menurut peraturan BAZNAS No.2 tahun 2016, sedekah adalah harta atau non harta yang dikeluarkan oleh seseorang atau badan usaha di luar zakat untuk kemaslahatan umum.</p>\r\n\r\n<p>Sedekah merupakan amalan yang dicintai Allah SWT. Hal ini dibuktikan dengan banyaknya ayat Al-Qur&rsquo;an yang menyebutkan tentang sedekah, salah satunya dalam surat Al-Baqarah ayat 271,</p>\r\n\r\n<p><em>&ldquo;Jika kamu menampakkan sedekah (mu), maka itu adalah baik sekali. Dan jika kamu menyembunyikannya dan kamu berikan kepada orang-orang fakir, maka menyembunyikan itu lebih baik bagimu. Dan Allah akan menghapuskan dari kamu sebagian kesalahan-kesalahanmu, dan Allah mengetahui apa yang kamu kerjakan&rdquo; </em>(QS. Al-Baqarah: 271).</p>\r\n\r\n<h1>Keutamaan Sedekah</h1>\r\n\r\n<p>1. Sedekah Tidak Mengurangi Harta</p>\r\n\r\n<p>&ldquo;Sedekah adalah ibadah yang tidak akan mengurangi harta, sebagaimana Rasulullah SAW bersabda untuk mengingatkan kita dalam sebuah riwayat Muslim, <em>&ldquo;sedekah tidaklah mengurangi harta.&rdquo;</em>&nbsp;(HR. Muslim).&nbsp; Mengapa sedekah tidak akan mengurangi harta? Karena meskipun secara tersurat harta terlihat berkurang, namun kekurangan tersebut akan ditutup dengan pahala di sisi Allah SWT dan akan terus bertambah kelipatannya menjadi lebih banyak. Hal ini merupakan janji Allah yang termaktub dalam surat Saba <em> &ldquo;Dan barang apa saja yang kamu nafkahkan, maka Allah akan menggantinya dan Dia-lah pemberi rezeki sebaik-baiknya.&rdquo;</em> (QS. Saba&rsquo;: 39).</p>\r\n\r\n<p>2. Sedekah Menghapus Dosa</p>\r\n\r\n<p>Sebagai makhluk Allah SWT yang tak luput dari dosa, umat Islam senantiasa diberikan berbagai keistimewaan agar berkesempatan untuk bertaubat dan menghapus dosa-dosanya dengan cara yang yang diridhai oleh Nya. Salah satunya dengan sedekah.</p>\r\n\r\n<p>Sedekah merupakan ibadah yang istimewa, ia dapat memudahkan kita dalam menghapus dosa-dosa. Rasulullah SAW pernah bersabda <em> &ldquo;Sedekah itu dapat menghapus dosa sebagaimana air itu memadamkan api.</em> (HR. At-Tirmidzi).</p>\r\n\r\n<p>3. Sedekah Melipatgandakan Pahala</p>\r\n\r\n<p>Sedekah memberikan banyak keistimewaan kepada pelakunya, salah satu diantaranya adalah Allah SWT akan memberikan pahala yang banyak untuk orang yang bersedekah. Allah SWT berfiman,</p>\r\n\r\n<p><em>&ldquo;Sesungguhnya orang-orang yang bersedekah baik laki-laki maupun perempuan dan meminjamkan kepada Allah pinjaman yang baik, niscaya akan dilipat-gandakan (ganjarannya) kepada mereka; dan bagi mereka pahala yang banyak.&rdquo; </em> (Qs. Al Hadid: 18)</p>\r\n\r\n<p>Itulah beberapa keistimewaan sedekah. Begitu banyak nikmat Allah dalam bersedekah, semoga kita termasuk ke dalam orang orang yang diringankan dalam melakukan ibadah istimewa ini. Aamiin.</p>\r\n', '1.png', 'sedekha-tanda-kita-bersyukur'),
(7, '2020-04-19', 'Terkait Zakat Profesi, Bagaimana Penghitungan Zakat untuk Seorang Youtuber', '<p>Perkembangan teknologi yang semakin maju, membawa kehidupan generasi milenial susah untuk lepas dari teknologi informasi, terutama internet. Tak heran kaum milenial saat ini berlomba-lomba untuk memiliki pekerjaan yang berhubungan dengan digital online yang menjadi salah satu cita-cita favorit generasi jaman sekarang beberapa tahun belakangan ini, salah satunya menjadi seorang Youtuber.</p>\r\n\r\n<p><br />\r\nIming-iming popularitas, tawaran iklan, serta pundi-pundi uang yang tak terbatas menjadikan profesi Youtuber jadi incaran banyak kalangan, dan berbagai lintas usia. Banyak dari youtuber-youtuber Indonesia yang sukses kerap menyatakan bahwa youtuber adalah profesi yang sangat menjanjikan.</p>\r\n\r\n<p><br />\r\nTerkait dengan profesi Youtuber yang menjanjikan dan menghasilkan banyak uang, lalu bagaimana ketentuan dalam membayar zakat profesi seorang youtuber?</p>\r\n\r\n<p><br />\r\nProfesi youtuber masuk dalam kategori profesi di bidang seni atau perorangan yang tidak menentu penghasilan setiap tahunnya. Oleh karena itu, untuk menentukan waktu yang tepat mengeluarkan zakat, profesi youtuber bias dikatakan tidak terikat kepada haul (waktu pembayaran zakat).</p>\r\n\r\n<p><br />\r\nMengutip dari baznas.go.id/id/zakat-penghasilan, zakat penghasilan atau yang dikenal juga sebagai&nbsp; zakat profesi adalah bagian dari zakat maal yang wajib dikeluarkan atas harta yang berasal dari pendapatan atau penghasilan rutin dari pekerjaan yang tidak melanggar syariah (Al Qur`an Surah Al Baqarah ayat 267, Peraturan Menteri Agama No 52/2014 dan pendapat Shaikh Yusuf Qardawi). Standar nishab yang digunakan adalah sebesar Rp5.240.000,- per bulan.</p>\r\n\r\n<p><br />\r\nDengan demikian metode pembayaran zakat ini adalah jumlah total penghasilan sebulan yang sudah melebihi nishab, langsung dikalikan 2.5 %. Sebagai contoh seorang Youtuber &ldquo;A&rdquo;, mampu menghasilkan Rp200.000.000,- dari monetize setiap bulannya. Maka 2.5% dari Rp200.000.000,- adalah sebesar Rp5.000.000,-. Jumlah inilah yang harus dibayarkan si Youtuber &ldquo;A&rdquo; setiap bulannya.</p>\r\n\r\n<p><br />\r\nJumlah tersebut tentunya bias berubah mengingat penghasilan profesi Youtuber yang tidak menentu, karena tergantung seberapa produktif ia mengunggah video dan menciptakan tayangan kreatif yang menghasilkan banyak viewers sehingga akan ada banyak iklan, dan berimbas pada hasil monetisasi.</p>\r\n\r\n<p><br />\r\nYang terpenting besar kecilnya zakat yang dibayarkan Insya Allah dapat membantu meringankan beban saudara kita yang mengalami kekurangan, dan juga akan tercatat sebagai ibadah mendapatkan ridha Allah menuju pintu surge yang diharapkan. Ayo bayar zakat di BAZNAS!</p>\r\n', '7.png', 'terkait-zakat-profesi-bagaimana-penghitungan -zakat-untuk-seorang-youtuber'),
(8, '2020-08-19', 'Sedekah yang Dikehendaki dan Diutamakan oleh Allah dan Rasul-Nya', '<p><em>&ldquo;Degup jantung seseorang berkata kepadanya. Sesungguhnya hidup ini hanya beberapa menit dan beberapa detik. Buatlah suatu kenangan yang namamu akan terus diingat setelah kematianmu. Karena kenangan bagi manusia adalah umur yang kedua.&rdquo; </em><br />\r\n<br />\r\nBegitulah pesan dari penggalan syair Ahmad Syauqi, si raja penyair yang lahir di perkampungan al-Hanafi, Kairo, Mesir, pada 12 Oktober 1868.<br />\r\n<br />\r\nSyair itu bisa diterjemahkan secara bebas, seperti pepatah: Gajah mati meninggalkan gading, harimau mati meninggalkan belang, manusia mati meninggalkan nama; seorang manusia terutama diingat jasa-jasanya atau kesalahan-kesalahannya. Perbuatannya ini, baik maupun buruk akan tetap dikenal meskipun seseorang sudah mati.<br />\r\n<br />\r\n<a href=\"https://kalam.sindonews.com/topic/10925/kisah-umar-bin-khattab\">Umar bin Khattab</a> RA berkata, &quot;Suatu ketika, <a href=\"https://kalam.sindonews.com/topic/13290/rasulullah-saw\">Rasulullah</a> SAW menyuruh kami agar berinfak di jalan Allah. Kebetulan ketika itu ada sedikit harta pada saya, maka saya berkata di dalam hati, &#39;Saat ini aku memiliki harta. Jika suatu saat aku dapat melebih <a href=\"https://kalam.sindonews.com/topic/10895/kisah-abu-bakar\">Abu Bakar</a>, maka inilah saatnya.&#39; Aku pun pulang ke rumah dengan gembira. Lalu saya membagi dua seluruh harta yang ada di rumah. Setengahnya untuk keluarga dan setengahnya lagi saya serahkan kepada Rasulullah SAW.&quot;</p>\r\n\r\n<p>Rasulullah SAW berkata, &quot;Wahai Umar, adakah yang kamu tinggalkan untuk keluargamu?&quot; Saya menjawab, &quot;Ada ya Rasulullah.&quot;<br />\r\n<br />\r\nNabi bertanya lagi, &quot;Apa yang kamu tinggalkan?&quot; Saya menjawab, &quot;Saya tinggalkan utnuk mereka setengah dari harta saya.&quot;<br />\r\n<br />\r\nKemudian, datanglah Abu Bakar RA, dengan membawa seluruh hartanya. Rasulullah SAW bertanya kepadanya, &quot;Wahai Abu Bakar, apa yang kamu tinggalkan untuk keluargamu?&quot;<br />\r\n<br />\r\nAbu Bakar menjawab, &quot;Saya tinggalkan untuk mereka Allah dan Rasul-Nya.&quot;</p>\r\n\r\n<p>Melihat hal ini, Umar berkata, &quot;Saya tidak akan pernah dapat mengalahkan Abu Bakar.&quot;<br />\r\n<br />\r\nSyekh Maulana Muhammad Zakariya Al Khandahlawi, dalam kitabnya yang berjudul Fadhilah Amal menerangkan, saling berlomba dalam amal saleh dan kebaikan sangat baik dan disukai.<br />\r\n<br />\r\nPada saat itu, Nabi memberi anjuran untuk <a href=\"https://www.sindonews.com/topic/807/sedekah\">bersedekah</a> secara khusus. Dan, para sahabat dengan kemampuan masing-masing menginfakkan harta mereka <em>fi sabilillah</em> dengan penuh gairah dan semangat. Walaupun, melebihi kemampuan mereka. (<strong>Baca juga</strong>: <a href=\"https://kalam.sindonews.com/read/15153/69/rasulullah-saja-bersedekah-lebih-banyak-di-bulan-ramadhan-1588431946\">Rasulullah Saja Bersedekah Lebih Banyak di Bulan Ramadhan</a>)<br />\r\n<br />\r\n<strong>Sedekah yang Disukai Allah</strong><br />\r\nKisah di atas terjadi menjelang perang Tabuk. Lalu, di era kini, <a href=\"https://www.sindonews.com/topic/807/sedekah\">sedekah</a> apakah yang paling disukai Allah dan Rasulnya? Cendekiawan Muslim asal Mesir, Dr Syaikh Yusuf Qardhawy, dalam bukunya &quot;<em>Fiqh Prioritas, Sebuah Kajian Baru Berdasarkan Al-Qur&#39;an dan As-Sunnah</em>&quot;, berpendapat kalau manfaat suatu pekerjaan lebih luas jangkauannya, maka hal itu lebih dikehendaki dan diutamakan oleh Allah SWT dan Rasul-Nya. (<strong>Baca juga</strong>: <a href=\"https://kalam.sindonews.com/read/14789/70/demi-allah-lihatlah-tetangga-jangan-jangan-dia-masak-batu-1588403113\">Demi Allah, Lihatlah Tetangga, Jangan-jangan Dia Masak Batu</a>)<br />\r\n<br />\r\n&quot;Begitu pula halnya dengan pekerjaan yang lebih lama dan kekal pengaruhnya. Setiap kali suatu perbuatan itu lebih lama manfaatnya maka pekerjaan itu lebih utama dan lebih dicintai oleh Allah SWT,&quot; tuturnya.<br />\r\n<br />\r\nOleh karena itu, menurut Syaikh Qardhawy, sedekah yang lama manfaatnya lebih diutamakan. Misalnya memberikan domba yang mengandung, unta yang mengandung, dan lain-lain, di mana orang yang menerima sedekah itu dan juga keluarganya dapat memanfaatkan susunya selama bertahun-tahun.<br />\r\n<br />\r\nDalam peribahasa China kita kenal: &ldquo;Memberi jala untuk mencari ikan kepada orang miskin adalah lebih baik daripada memberikan ikan kepadanya.&rdquo;<br />\r\n<br />\r\nDisebutkan dalam sebuah hadits: &ldquo;Sedekah yang paling utama ialah memberikan tenda, atau memberikan seorang pembantu, atau seekor unta untuk perjuangan di jalan Allah SWT.&rdquo; (HR Ahmad dan Tirmidzi dari Abu Umamah; dan juga diriwayatkan oleh Tirmidzi dari &lsquo;Adiy bin Hatim, dan dihasankan olehnya dalam Shahih al-Jami&rsquo; as-Shaghir (1109).<br />\r\n<br />\r\nHadis lainnya juga menyatakan: &ldquo;Empat puluh sifat, yang paling tinggi tingkatannya ialah memberikan kambing. Tidak ada seorang hambapun yang melalaikannya, untuk mengharapkan pahala yang dijanjikan kepadanya kecuali dia akan dimasukkan oleh Allah SWT ke dalam surga.&rdquo; (HR Bukhari, dan Abu Dawud dari Abdullah bin &lsquo;Amr, 791)<br />\r\n<br />\r\nDi situlah letak kelebihan sedekah jariyah, yang manfaatnya terus dirasakan walaupun orang yang memberikannya sudah tiada. Seperti harta wakaf, yang telah dikenal oleh kaum Muslimin sejak zaman Nabi saw; di mana ketika itu peradaban Islam memiliki keunggulan karena kekayaannya yang melimpah dan sangat banyak, sehingga Islam menguasai seluruh bidang kebajikan dalam kehidupan manusia, yang memberikan perkhidmatan kepada seluruh umat manusia, bahkan terhadap binatang.<br />\r\n<br />\r\nDalam sebuah hadis sahih disebutkan:<br />\r\n<br />\r\n<strong>Ø¥ÙØ°ÙŽØ§ Ù…ÙŽØ§ØªÙŽ Ø§Ù„Ù’Ø¥ÙÙ†Ù’Ø³ÙŽØ§Ù†Ù Ø§Ù†Ù’Ù‚ÙŽØ·ÙŽØ¹ÙŽ Ø¹ÙŽÙ…ÙŽÙ„ÙÙ‡Ù Ø¥ÙÙ„Ù‘ÙŽØ§ Ù…ÙÙ†Ù’ Ø«ÙŽÙ„ÙŽØ§Ø«ÙŽØ©Ù Ù…ÙÙ†Ù’ ØµÙŽØ¯ÙŽÙ‚ÙŽØ©Ù Ø¬ÙŽØ§Ø±ÙÙŠÙŽØ©Ù ÙˆÙŽØ¹ÙÙ„Ù’Ù…Ù ÙŠÙÙ†Ù’ØªÙŽÙÙŽØ¹Ù Ø¨ÙÙ‡Ù ÙˆÙŽÙˆÙŽÙ„ÙŽØ¯Ù ØµÙŽØ§Ù„ÙØ­Ù ÙŠÙŽØ¯Ù’Ø¹ÙÙˆ Ù„ÙŽÙ‡Ù</strong><br />\r\n<br />\r\n&ldquo;Jika seseorang meninggal dunia, maka terputuslah amalannya kecuali tiga perkara (yaitu): sedekah jariyah, ilmu yang dimanfaatkan, atau do&rsquo;a anak yang saleh&rdquo; (HR. Muslim no. 1631)<br />\r\n<br />\r\nAda hadis lain yang menjelaskan contoh sedekah jariyah ini sebanyak tujuh macam. Yaitu dalam sabda Nabi saw,<br />\r\n<br />\r\n<strong>Ø¥ÙÙ†Ù‘ÙŽ Ù…ÙÙ…Ù‘ÙŽØ§ ÙŠÙŽÙ„Ù’Ø­ÙŽÙ‚Ù Ø§Ù„Ù’Ù…ÙØ¤Ù’Ù…ÙÙ†ÙŽ Ù…ÙÙ†Ù’ Ø¹ÙŽÙ…ÙŽÙ„ÙÙ‡Ù ÙˆÙŽØ­ÙŽØ³ÙŽÙ†ÙŽØ§ØªÙÙ‡Ù Ø¨ÙŽØ¹Ù’Ø¯ÙŽ Ù…ÙŽÙˆÙ’ØªÙÙ‡Ù Ø¹ÙÙ„Ù’Ù…Ù‹Ø§ Ø¹ÙŽÙ„Ù‘ÙŽÙ…ÙŽÙ‡Ù ÙˆÙŽÙ†ÙŽØ´ÙŽØ±ÙŽÙ‡Ù ÙˆÙŽÙˆÙŽÙ„ÙŽØ¯Ù‹Ø§ ØµÙŽØ§Ù„ÙØ­Ù‹Ø§ ØªÙŽØ±ÙŽÙƒÙŽÙ‡Ù ÙˆÙŽÙ…ÙØµÙ’Ø­ÙŽÙÙ‹Ø§ ÙˆÙŽØ±Ù‘ÙŽØ«ÙŽÙ‡Ù Ø£ÙŽÙˆÙ’ Ù…ÙŽØ³Ù’Ø¬ÙØ¯Ù‹Ø§ Ø¨ÙŽÙ†ÙŽØ§Ù‡Ù Ø£ÙŽÙˆÙ’ Ø¨ÙŽÙŠÙ’ØªÙ‹Ø§ Ù„Ø§ÙØ¨Ù’Ù†Ù Ø§Ù„Ø³Ù‘ÙŽØ¨ÙÙŠÙ„Ù Ø¨ÙŽÙ†ÙŽØ§Ù‡Ù Ø£ÙŽÙˆÙ’ Ù†ÙŽÙ‡Ù’Ø±Ù‹Ø§ Ø£ÙŽØ¬Ù’Ø±ÙŽØ§Ù‡Ù Ø£ÙŽÙˆÙ’ ØµÙŽØ¯ÙŽÙ‚ÙŽØ©Ù‹ Ø£ÙŽØ®Ù’Ø±ÙŽØ¬ÙŽÙ‡ÙŽØ§ Ù…ÙÙ†Ù’ Ù…ÙŽØ§Ù„ÙÙ‡Ù ÙÙÙŠ ØµÙØ­Ù‘ÙŽØªÙÙ‡Ù ÙˆÙŽØ­ÙŽÙŠÙŽØ§ØªÙÙ‡Ù ÙŠÙŽÙ„Ù’Ø­ÙŽÙ‚ÙÙ‡Ù Ù…ÙÙ†Ù’ Ø¨ÙŽØ¹Ù’Ø¯Ù Ù…ÙŽÙˆÙ’ØªÙÙ‡Ù &lrm;</strong><br />\r\n<br />\r\n&ldquo;Sesunggguhnya amalan dan perbuatan baik yang akan menyusul seorang mu&rsquo;min setelah dia meninggal dunia kelak ialah ilmu yang dia ajarkan dan sebarkan, anak saleh yang dia tinggalkan, mushaf al-Qur&rsquo;an yang dia wariskan, masjid yang dia bangun, rumah tempat singgah musafir yang dia bangun, sungai yang dia alirkan, dan sedekah yang dia keluarkan ketika dia sehat dan masih hidup. Semua ini akan menyusul dirinya ketika dia meninggal dunia kelak.&rdquo;<br />\r\n<br />\r\n(al-Hafizh al-Mundiri berkata, &ldquo;Hadits ini diriwayatkan oleh Ibn Majah dan Baihaqi dengan isnad hasan; dan juga diriwayatkan oleh Ibn Khuzaimah di dalam Shahih-nya seperti itu).<br />\r\n<br />\r\nMisalnya umur manusia pendek dan terbatas, maka dengan karunia Allah yang diberikan kepadanya, ia dapat memperpanjang umurnya dengan melakukan amalan yang mengalir pahalanya (jariyah). Dia terus dianggap hidup walaupun dia telah meninggal dunia, dia tetap ada dengan amal saleh yang pernah dilakukannya, walaupun jasadnya telah tiada, sebagaimana digambarkan dalam Ahmad Syauqi.</p>\r\n', '8.jpg', 'sedekah-yang-dikehendaki-dan-diutamakan-oleh-allah-dan-rasul-nya');

-- --------------------------------------------------------

--
-- Table structure for table `tbberdonasigalangdana`
--

CREATE TABLE `tbberdonasigalangdana` (
  `idBerdonasiGalangDana` double NOT NULL,
  `idTemp` varchar(255) NOT NULL,
  `idGalangDana` double NOT NULL,
  `kodeUnik` varchar(20) NOT NULL,
  `idAnggota` int(11) DEFAULT NULL,
  `nama` varchar(200) NOT NULL,
  `anonim` varchar(200) NOT NULL,
  `nope` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `namaUsaha` varchar(200) DEFAULT NULL,
  `lokasiUsaha` varchar(200) DEFAULT NULL,
  `idRekening` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggalBerakhir` datetime NOT NULL,
  `status` char(1) NOT NULL COMMENT 'P=Pending,Y=Ok,N=Tolak',
  `dukungan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbberdonasigalangdana`
--

INSERT INTO `tbberdonasigalangdana` (`idBerdonasiGalangDana`, `idTemp`, `idGalangDana`, `kodeUnik`, `idAnggota`, `nama`, `anonim`, `nope`, `email`, `namaUsaha`, `lokasiUsaha`, `idRekening`, `jumlah`, `tanggal`, `tanggalBerakhir`, `status`, `dukungan`) VALUES
(39, '2b44928ae11fb9384c4cf38708677c48', 15, '526', NULL, 'Agus Pramono', 'Agus Pramono', '085261523578', 'agus.pramono3545@gmail.com', 'Properti', 'Medan Selayang', 2, 1000526, '2020-04-20 08:32:43', '2020-04-21 12:00:00', 'Y', 'Semoga bermanfaat'),
(40, '1cdf14d1e3699d61d237cf76ce1c2dca', 14, '454', NULL, 'ahmad widodo', 'ahmad widodo', '089689655569', 'dompetdhuafabanten@gmail.com', 'lembaga amil zakat', 'Medan Amplas', 2, 100454, '2020-04-28 02:35:55', '2020-04-29 12:00:00', 'Y', 'semangat terus'),
(41, '4ee78d4122ef8503fe01cdad3e9ea4ee', 13, '203', NULL, 'firman alamsyah', 'firman alamsyah', '089689655569', 's4lim4gus@gmail.com', 'ayam jamur', 'Medan Amplas', 2, 50203, '2020-04-29 02:11:47', '2020-04-30 12:00:00', 'Y', 'Semangat terus yaa'),
(42, '76c538125fc5c9ec6ad1d05650a57de5', 14, '100', NULL, 'Coba 1', 'Anonim', '08986919994', 'test@mail.com', 'Usaha', 'Medan Amplas', 2, 10100, '2020-04-30 03:18:39', '2020-05-01 12:00:00', 'Y', 'semangat'),
(43, 'a787f02ed34fd886eb6d49e60d9c9120', 11, '358', NULL, 'Aaa', 'Anonim', '082', 'aaa@gmail.com', 'Aaa', 'Medan Amplas', 2, 50358, '2020-05-01 04:07:41', '2020-05-02 12:00:00', 'Y', ''),
(44, 'aa36c88c27650af3b9868b723ae15dfc', 13, '507', NULL, 'jdnvjad djvnjdan', 'Anonim', '089678667890', 'jsdj@gmail.com', 'Ojol', 'Medan Amplas', 2, 10000507, '2020-05-11 09:45:29', '2020-05-12 12:00:00', 'Y', 'kjdsnvkjdnvdvd vncdv'),
(45, '36feef48a2ca2d1ddb34625c644a7d61', 14, '114', 69, 'test', 'test', '08222222222', 'isal29blog@gmail.com', 'test', 'Medan Amplas', 2, 350114, '2020-05-11 12:50:42', '2020-05-12 12:00:00', 'Y', 'test'),
(46, '35b48a74d56ab86f861a7e1a88975935', 14, '952', 69, 'test', 'test', '08222222222', 'isal29blog@gmail.com', 'test', 'Medan Amplas', 2, 750952, '2020-05-11 12:52:04', '2020-05-12 12:00:00', 'Y', 'test'),
(47, 'b8c0655c2667ec908708ee78ab5c54de', 11, '394', 69, 'test', 'test', '08222222222', 'isal29blog@gmail.com', 'test', 'Medan Amplas', 2, 1000394, '2020-05-11 04:08:38', '2020-05-12 12:00:00', 'Y', ''),
(48, '084afd913ab1e6ea58b8ca73f6cb41a6', 14, '116', NULL, 'Kwardanu', 'Kwardanu', '082211592635', 'kwardanu@gmail.com', 'sembako', 'Medan Amplas', 2, 10116, '2020-05-26 06:09:03', '2020-05-27 12:00:00', 'Y', ''),
(49, '86a2f353e1e6692c05fe83d6fc79cf9d', 14, '933', NULL, 'Agus Pramono', 'Agus Pramono', '085261523578', 'agus.pramono3545@gmail.com', 'Percetakan', 'Medan Amplas', 2, 12933, '2020-05-28 09:36:21', '2020-05-29 12:00:00', 'Y', 'Semoga bermanffat'),
(50, '7e3315fe390974fcf25e44a9445bd821', 16, '114', NULL, 'asd', 'Anonim', '123545242344', 'asd@gmail.com', 'as', 'Medan Amplas', 2, 10114, '2020-05-28 10:31:40', '2020-05-29 12:00:00', 'Y', ''),
(51, '9e95248d9b714a96f47fd159b4c6e911', 14, '205', NULL, 'Demo', 'Anonim', '085888375441', 'demo@gmail.com', 'Demo ', 'Medan Amplas', 2, 50205, '2020-05-30 02:45:24', '2020-05-31 12:00:00', 'Y', ''),
(52, '7417744a2bac776fabe5a09b21c707a2', 14, '260', NULL, 'asa', 'asa', '123456', 'sas@gmail.com', 'adad', 'Medan Amplas', 2, 10260, '2020-06-01 09:37:51', '2020-06-02 12:00:00', 'Y', ''),
(53, 'c7d0e7e2922845f3e1185d246d01365d', 13, '997', NULL, 'Budi', 'Anonim', '087786450555', 'widyosahdhubudhi@gmail.com', 'Kita Bantu', 'Medan Amplas', 2, 10997, '2020-06-08 03:23:21', '2020-06-09 12:00:00', 'Y', ''),
(54, '3bc71faebe42e1639eb6fded38d714cd', 11, '110', NULL, 'Riri', 'Anonim', '0896666333', 'ridho.rd849@gmail.com', 'Gsgdg', 'Medan Selayang', 2, 100110, '2020-06-11 12:47:41', '2020-06-12 12:00:00', 'Y', ''),
(55, '5b4e9aa703d0bfa11041debaa2d1b633', 14, '869', NULL, 'Yusak edi', 'Anonim', '736282910', 'jusacedy@gmail.com', 'Properti', 'Medan Amplas', 2, 50869, '2020-06-14 08:22:48', '2020-06-15 12:00:00', 'Y', ''),
(56, '3a09a524440d44d7f19870070a5ad42f', 14, '121', NULL, 'test', 'Anonim', '081234567', 'abc@test.com', 'abcd', 'Medan Amplas', 2, 10121, '2020-06-16 11:12:45', '2020-06-17 12:00:00', 'Y', ''),
(57, '0fe6a94848e5c68a54010b61b3e94b0e', 14, '348', NULL, 'Rai', 'Anonim', '086736373838', 'barus.rasid1997@gmail.com', 'Brand', 'Medan Amplas', 2, 10348, '2020-06-22 11:16:32', '2020-06-23 12:00:00', 'Y', 'Semoga bermanfaat'),
(58, 'f93486bfff38ca69d76d85c089569a09', 14, '476', NULL, 'yusak edi', 'Anonim', '089544331677', 'jusacedy@gmail.com', 'properti', 'Medan Amplas', 2, 50476, '2020-06-22 04:49:19', '2020-06-23 12:00:00', 'Y', ''),
(59, '941c377c73c0efed759c993f1b859526', 13, '904', NULL, 'muhammad', 'muhammad', '082336414207', 'm.rizal90@gmail.com', 'chaltoz', 'Medan Amplas', 2, 10904, '2020-06-24 10:24:06', '2020-06-25 12:00:00', 'Y', ''),
(60, 'd8a107c27e42812c4eadabf9915493cd', 14, '906', 77, 'mujahid yatimcare', 'mujahid yatimcare', '089531500960', 'yatimcare.indonesia@gmail.com', 'Mujahid Yatimcare', 'Medan Selayang', 2, 200906, '2020-06-27 11:54:08', '2020-06-28 12:00:00', 'Y', 'dan bantuan'),
(61, '721e049e9903c3a740c4902878c99923', 11, '463', NULL, 'asdsad', 'asdsad', '085261523588', 'agus.pramono3545@gmail.com', 'asd', 'Medan Amplas', 2, 10463, '2020-06-29 09:58:49', '2020-06-30 12:00:00', 'Y', 'dsadsad'),
(62, '0f34132b15dd02f282a11ea1e322a96d', 11, '765', NULL, 'Agus Pramono', 'Agus Pramono', '085261523578', 'agus.pramono3545@gmail.com', 'asd', 'Medan Amplas', 2, 10765, '2020-06-29 10:00:18', '2020-06-30 12:00:00', 'Y', 'sadsa'),
(63, 'ec20019911a77ad39d023710be68aaa1', 14, '471', NULL, 'Rahmat', 'Rahmat', '08112016043', 'bpbd.sulteng.bs@gmail.com', 'Alfatih', 'Medan Selayang', 2, 12471, '2020-06-29 10:29:14', '2020-06-30 12:00:00', 'Y', 'Tes Bug'),
(64, '8091588a3968da46e3e43a76bf3b3a98', 11, '171', NULL, 'harel aryadi', 'harel aryadi', '082136068256', 'harelaryadi1989@gmail.com', 'test', 'Medan Amplas', 2, 50171, '2020-06-30 02:56:38', '2020-07-01 12:00:00', 'Y', 'bantu'),
(65, 'fe1d8328ad5265ad94a6382e13e625fb', 17, '280', 78, 'harel aryadi', 'harel aryadi', '082136068256', 'harelaryadi1989@gmail.com', 'test', 'Medan Amplas', 2, 200280, '2020-06-30 03:40:15', '2020-07-01 12:00:00', 'Y', 'test123'),
(66, 'bea7d36a9e5bd2881671c3724e18056e', 17, '479', 78, 'harel aryadi', 'harel aryadi', '082136068256', 'harelaryadi1989@gmail.com', 'test', 'Medan Amplas', 2, 10000479, '2020-06-30 03:43:02', '2020-07-01 12:00:00', 'Y', '1'),
(67, '50982fb2f2cfa186d335310461dfa2be', 11, '713', NULL, 'Badrudin', 'Badrudin', '+6282310923844', 'badrudinresik@gmail.com', 'Usaha', 'Medan Sunggal', 2, 100713, '2020-06-30 05:03:37', '2020-07-01 12:00:00', 'Y', ''),
(68, '937936029af671cf479fa893db91cbdd', 14, '962', NULL, 'Agus Pramono', 'Agus Pramono', '085261523599', 'agus.prahma5@gmail.com', 'Percetakan', 'Medan Amplas', 6, 10962, '2020-07-04 09:16:18', '2020-07-05 12:00:00', 'Y', ''),
(69, '8b2dfbe0c1d43f9537dae01e96458ff1', 14, '101', NULL, 'Q', 'Anonim', '08', 'a@gmail.com', '0', 'Medan Sunggal', 6, 10101, '2020-07-04 09:28:52', '2020-07-05 12:00:00', 'Y', 'Q'),
(70, 'bb4abc56ac2093f48c7c26980ec4a4c0', 14, '891', NULL, 'An', 'Anonim', '0', 'a@gmail.com', 'T', 'Medan Amplas', 7, 10891, '2020-07-04 04:42:42', '2020-07-05 12:00:00', 'Y', 'Bagus'),
(71, '1ab60b5e8bd4eac8a7537abb5936aadc', 11, '761', NULL, 'ugah', 'ugah', '0878802323', 'ugahugahan@gmail.com', 'ugahs', 'Medan Sunggal', 6, 50761, '2020-07-16 02:07:22', '2020-07-17 12:00:00', 'Y', ''),
(72, 'cdbc9bca0a9fd93852571cced0089c4d', 14, '403', NULL, 'Administrator', 'Anonim', '086736373838', 'rasidsidiq@gmail.com', 'Brand', 'Medan Selayang', 2, 10403, '2020-07-20 10:19:19', '2020-07-21 12:00:00', 'Y', ''),
(73, 'c7b03782920d35145eb4c97556d194a3', 11, '666', NULL, 'Ucok', 'Anonim', '0888766', 'Mail@gmail.com', 'Yel', 'Medan Selayang', 2, 56666, '2020-07-21 05:45:31', '2020-07-22 12:00:00', 'Y', 'Cek'),
(74, '8be6adae5ae0e157014d7d250870f212', 11, '677', NULL, 'Citra Mona Zahara', 'Citra Mona Zahara', '0888766', 'lembagazakat01@gmail.com', 'Yel', 'Medan Selayang', 7, 4556677, '2020-07-21 05:59:44', '2020-07-22 12:00:00', 'Y', 'Bantu'),
(75, '1e44fdf9c44d7328fecc02d677ed704d', 11, '103', NULL, 'asep', 'asep', '0998477474', 'asep@gmail.com', 'anas', 'Medan Amplas', 6, 32103, '2020-07-21 08:42:37', '2020-07-22 12:00:00', 'Y', 'bebas'),
(76, 'b8b6674d4052e35e4553ac6788eb30b5', 14, '955', NULL, 'Test', 'Anonim', '0888766', 'Mail@gmail.com', 'Yel', 'Medan Selayang', 2, 120955, '2020-07-22 06:56:27', '2020-07-23 12:00:00', 'Y', 'Cayo'),
(77, '3d91fffbdc07fc7b1240ba846c0f7e75', 14, '681', NULL, 'Agus Pramono', 'Agus Pramono', '085261523586', 'agus.pramono3545@gmail.com', 'Percetakan', 'Medan Amplas', 2, 20681, '2020-07-23 06:36:54', '2020-07-24 12:00:00', 'Y', 'Semoga berkah'),
(78, 'ddd1df443471e3abe89933f20d08116a', 11, '627', NULL, 'Yudha Adi M', 'Anonim', '09090909090909', 'superadmin@saasmonks.in', 'a', 'Medan Amplas', 7, 10627, '2020-07-24 09:14:18', '2020-07-25 12:00:00', 'Y', ''),
(79, '17a3120e4e5fbdc3cb5b5f946809b06a', 14, '109', NULL, 'Hilal', 'Anonim', '09875443225', 'Lhya.twibi@yahoo.co.id', 'Tak ada', 'Medan Sunggal', 2, 10109, '2020-07-25 01:12:39', '2020-07-26 12:00:00', 'Y', ''),
(80, 'd83de59e10227072a9c034ce10029c39', 14, '476', NULL, 'Hilal', 'Anonim', '09875443225', 'Lhya.twibi@yahoo.co.id', 'Tak ada', 'Medan Sunggal', 7, 10476, '2020-07-25 01:12:55', '2020-07-26 12:00:00', 'Y', ''),
(81, 'b20fa060328b0cdf51b464ee37efe182', 14, '658', NULL, 'Erj', 'Anonim', '087473839', 'rkekek@gmail.com', 'Hajsh', 'Medan Amplas', 2, 20658, '2020-07-25 04:30:42', '2020-07-26 12:00:00', 'Y', ''),
(82, 'a8d2795765fb6a8659fd48d8ca7eb888', 11, '116', NULL, 'dfgfdg', 'Anonim', '089636224774', 'fhirman.ilham@ymail.com', 'fghfgh', 'Medan Selayang', 6, 100116, '2020-07-25 05:44:47', '2020-07-26 12:00:00', 'Y', ''),
(83, '7a951116de2a4c23c74733d76046a5b4', 14, '106', NULL, 'dfgfdg', 'Anonim', '089636224774', 'qw@sd.com', 'fghfgh', 'Medan Amplas', 7, 100106, '2020-07-30 01:53:43', '2020-07-31 12:00:00', 'Y', 'wq'),
(84, '682e0e796084e163c5ca053dd8573b0c', 14, '113', NULL, 'dfgfdg', 'Anonim', '089636224774', 'qw@sd.com', 'fghfgh', 'Medan Amplas', 7, 100113, '2020-07-30 01:54:13', '2020-07-31 12:00:00', 'Y', 'wq'),
(85, '39144da5a6180c47885443c83547ec14', 14, '605', NULL, 'dfgfdg', 'Anonim', '089636224774', 'qw@sd.com', 'fghfgh', 'Medan Amplas', 2, 100605, '2020-07-30 01:54:33', '2020-07-31 12:00:00', 'Y', 'wq'),
(86, '787afca6b6dd1f06fc22e4b52b0b89bf', 14, '136', NULL, 'Admin', 'Admin', '089636224774', 'fhirman.ilham@ymail.com', 'fghfgh', 'Medan Amplas', 2, 100136, '2020-07-30 03:32:06', '2020-07-31 12:00:00', 'Y', 'sd'),
(87, '60bb8062ea8e0c7ff17bb2e484cd223a', 15, '119', NULL, 'Agus Pramono', 'Agus Pramono', '085261523588', 'agus.pramono3545@gmail.com', '', '', 7, 150119, '2020-08-19 11:16:24', '2020-08-20 12:00:00', 'Y', 'Semoga membantu'),
(88, '71f538c5db462f9bf1c7a8521c622c41', 15, '567', NULL, 'Agus Pramono', 'Agus Pramono', '085261523588', 'agus.pramono3545@gmail.com', NULL, NULL, 2, 67567, '2020-08-19 11:18:54', '2020-08-20 12:00:00', 'Y', 'Semoga membantu'),
(89, 'a422e60213322845b85ae122de53269f', 15, '104', NULL, 'Tes donasi', 'Tes donasi', '08888', 'akungplus2@gmail.com', NULL, NULL, 2, 10104, '2020-08-19 12:37:55', '2020-08-20 12:00:00', 'Y', 'Berkah'),
(90, 'a24bdc3e59a4c624eee8318a51bb55b9', 18, '923', NULL, 'agus', 'agus', '085261523578', 'agus.pramono3545@gmail.com', NULL, NULL, 2, 10923, '2020-08-29 04:36:13', '2020-08-30 12:00:00', 'Y', 'semoga bermanfaat'),
(91, '661c1c090ff5831a647202397c61d73c', 18, '507', NULL, 'Muhammad Bagoes', 'Anonim', '081362925347', 'bagusilhamy8@gmail.com', NULL, NULL, 2, 10507, '2020-09-09 03:54:09', '2020-09-10 12:00:00', 'P', 'jyuh'),
(92, 'a18aa23ee676d7f5ffb34cf16df3e08c', 14, '908', NULL, 'saya', 'saya', '095656565', 'koami@gmail.com', NULL, NULL, 6, 10908, '2020-09-11 04:14:50', '2020-09-12 12:00:00', 'P', 'aaaa'),
(93, '9afe487de556e59e6db6c862adfe25a4', 14, '720', NULL, 'Sulton', 'Anonim', '0856783422', 'sitimasriyah257@gmail.com', NULL, NULL, 7, 1000720, '2020-09-17 11:26:11', '2020-09-18 12:00:00', 'P', ''),
(94, '4d6da0c32dd563fea116da78ca1ffd39', 18, '184', NULL, 'iNu', 'iNu', '12345667', 'nuhajat@gmail.com', NULL, NULL, 6, 10000184, '2020-09-18 02:10:57', '2020-09-19 12:00:00', 'P', 'Tulis Komentar dan Dukungan Anda*'),
(95, 'd1eb4985123f83a3414f41fffe4dde42', 15, '109', NULL, 'testing', 'Anonim', '081234567890', 'ww@gmail.com', NULL, NULL, 7, 10109, '2020-09-26 11:18:52', '2020-09-27 12:00:00', 'P', ''),
(96, 'fd348179ec677c5560d4cd9c3ffb6cd9', 18, '491', NULL, 'Asep Muhamad Friansyah', 'Asep Muhamad Friansyah', '082216475677', 'info.asepmf@gmail.com', NULL, NULL, 2, 50491, '2020-09-30 09:31:40', '2020-10-01 12:00:00', 'P', 'Donasi Test'),
(97, '5e632913bf096e49880cf8b92d53c9ad', 11, '009', NULL, 'Nuhajat', 'Nuhajat', '081253313788', 'nuhajat@alfirdaus.net', NULL, NULL, 6, 500009, '2020-10-01 08:55:58', '2020-10-02 12:00:00', 'P', 'Tes'),
(98, 'e57c955b282c21da733b58b3c2a7b494', 14, '109', 89, 'Rajnaparamitha Kusuamstuti', 'Anonim', '+6282242022078', 'rajnaparamitha.01@students.amikom.ac.id', NULL, NULL, 7, 10109, '2020-10-02 11:52:22', '2020-10-03 12:00:00', 'P', ''),
(99, '0a4dc6dae338c9cb08947c07581f77a2', 15, '106', NULL, 'Ismail Abdurrahman', 'Anonim', '082166251818', 'mikasyah@gmail.com', NULL, NULL, 2, 40106, '2020-10-07 08:59:19', '2020-10-08 12:00:00', 'P', ''),
(100, '210192abc6dd9b4f53d7ba4926461e86', 18, '824', NULL, 'fgghfgd', 'Anonim', '0879854654', 'rtytr@gmail.com', NULL, NULL, 6, 25824, '2020-10-16 03:47:40', '2020-10-17 12:00:00', 'P', ''),
(101, 'e52ff15f1c6cff78c4e54fd19026256d', 13, '867', NULL, 'SADASAD', 'SADASAD', '083872596396', 'DS@GMAIL.COM', NULL, NULL, 7, 10867, '2020-10-17 06:55:48', '2020-10-18 12:00:00', 'P', 'NN');

-- --------------------------------------------------------

--
-- Table structure for table `tbberitagalangdana`
--

CREATE TABLE `tbberitagalangdana` (
  `idBeritaGalangDana` double NOT NULL,
  `idGalangDana` double NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbberitagalangdana`
--

INSERT INTO `tbberitagalangdana` (`idBeritaGalangDana`, `idGalangDana`, `tanggal`, `judul`, `isi`) VALUES
(6, 15, '2020-04-22', 'Penarikan Dana', 'Jumlah Dana <b>1.000.526</b> , Akan digunakan untuk Pembayaran operasi tahap 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbdonasibahan`
--

CREATE TABLE `tbdonasibahan` (
  `idBahanMakanan` int(11) NOT NULL,
  `idTemp` varchar(255) NOT NULL,
  `idAnggota` int(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jenisBahan` varchar(150) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` int(5) NOT NULL,
  `pengiriman` varchar(20) NOT NULL,
  `noresi` varchar(30) NOT NULL,
  `penjemputan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdonasibahan`
--

INSERT INTO `tbdonasibahan` (`idBahanMakanan`, `idTemp`, `idAnggota`, `tanggal`, `jenisBahan`, `keterangan`, `jumlah`, `pengiriman`, `noresi`, `penjemputan`, `status`) VALUES
(61, 'c4ca4238a0b923820dcc509a6f75849b', 78, '2020-06-30', 'Air Mineral', 'test', 100, '', '', 'test', 'Diterima'),
(62, '7f39f8317fbdb1988ef4c628eba02591', 66, '2020-06-30', '', 'dasd', 100, '', '', 'asdsadsa', 'Diterima'),
(63, '44f683a84163b3523afe57c2e008bc8c', 66, '2020-06-30', 'Air Mineral', 'dgdfgdfg', 2, '', '', 'sadasd', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tbdonasinasi`
--

CREATE TABLE `tbdonasinasi` (
  `idNasi` int(11) NOT NULL,
  `idAnggota` int(30) NOT NULL,
  `jumlahNasi` int(30) NOT NULL,
  `tanggal` date NOT NULL,
  `penjemputan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbgalangdana`
--

CREATE TABLE `tbgalangdana` (
  `idGalangDana` double NOT NULL,
  `idAnggota` int(11) NOT NULL,
  `judul` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah` double NOT NULL,
  `banner` varchar(255) NOT NULL,
  `tanggalMulai` date NOT NULL,
  `tanggalBerakhir` date NOT NULL,
  `status` char(1) NOT NULL COMMENT 'P=Pending,Y=Oke,N=Tolak',
  `unlimitedWaktu` char(1) NOT NULL COMMENT 'Y=Iya,N=Tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbgalangdana`
--

INSERT INTO `tbgalangdana` (`idGalangDana`, `idAnggota`, `judul`, `slug`, `deskripsi`, `jumlah`, `banner`, `tanggalMulai`, `tanggalBerakhir`, `status`, `unlimitedWaktu`) VALUES
(11, 66, 'Darurat..! Warga GAZA Terancam Kelaparan', 'Darurat..!-Warga-GAZA-Terancam-Kelaparan-1', '<p><strong>&ldquo;Barangsiapa yang memberi makan kepada seorang mukmin, sehingga dapat mengenyangkannya dari kelaparan, maka Allah akan memasukkannya ke dalam salah satu pintu surga yang tidak dimasuki oleh orang lain kecuali oleh orang-orang sepertinya. &rdquo;</strong> (HR. Thabrani).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>#SahabatBerbagi, pernahkah mencoba untuk tidak makan dalam sehari? Tentunya, lemah dan tak bertenaga pasti kita rasakan. Lalu bagaimana dengan saudara-saudara kita di Gaza? Kondisi Warga Gaza hingga saat ini <strong>terancam kelaparan. </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dikutip dari detikNews &ldquo;Tingkat pengangguran di Gaza meningkat tajam pada tahun lalu menjadi 44 persen, level tertinggi dalam sejarah Gaza. Sebanyak<strong> 72 persen rumah tangga di Gaza berjuang melawan kekurangan pangan</strong>. Jumlah pengungsi yang<strong> bergantung sepenuhnya pada bantuan pangan PBB meningkat dari 72 ribu orang pada tahun 2000, menjadi 868 ribu orang pada Mei lalu. </strong>Namun bantuan kemanusiaan saja tidak akan mampu memperbaiki kondisi Gaza.&rdquo; (nvc/ita).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>#SahabatBerbagi Yatim Mandiri berikhtiyar galang dana untuk membantu saudara-saudara kita di Gaza mendapat makanan. Rp30.000,-/paket makanan kita bisa membantu mereka menyambung hidup. Sebagaimana keutamaan hadist diatas, alangkah baiknya jika #Orang Baik ikut berkontribusi dalam aksi kebaikan dan kemanusiaan.</p>\r\n\r\n<p>Dukung dan bantu Warga Gaza dengan cara:<br />\r\n<br />\r\n1. Klik tombol <strong>&ldquo;DONASI SEKARANG&rdquo; </strong></p>\r\n\r\n<p>2. Masukkan nominal donasi</p>\r\n\r\n<p>3. Pilih metode pembayaran GO-PAY, Jenius Pay, LinkAja, DANA, Mandiri Virtual Account, BCA Virtual Account, atau transfer Bank (transfer bank BNI, Mandiri, BCA, BRI, BNI Syariah, atau kartu kredit) dan transfer ke no. rekening yang tertera.</p>\r\n', 300000000, '1.jpg', '2020-04-19', '2020-10-31', 'Y', 'N'),
(13, 66, 'Wujudkan Mimpi Yatim Dzuafa dengan BESTARI', 'Wujudkan-Mimpi-Yatim-Dzuafa-dengan-BESTARI-12', '<p>Jika setiap hari kita bisa merasakan belaian orang tua, kasih sayang mereka dan segala bentuk yang kita butuhkan.Namun, tidak bagi anak-anak yatim ini. Dimasa kecilnya sudah kehilangan sosok orang tua yang menjaga dan mengantarkan hingga meraih cita-citanya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mereka memiliki potensi yang tetap harus dikembangkan. Sedangkan Ayah sebagai penopang pencari nafkah, sudah kembali kepada Sang Esa. Sehingga <strong>Ibu adalah satu-satunya yang bisa menjadi tulang punggung</strong> untuk <strong>biaya pendidikan mereka.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Alhamdulilah,<strong> 25 tahun Yatim Mandiri</strong> mampu membangun kemandirian anak-anak yatim melalui <strong>program BESTARI (Beasiswa Yatim Mandiri)</strong>, yakni bantuan biaya pendidikan anak yatim dhuafa <strong>tingkat SD-SMA se-Indonesia</strong>. Tahun 2019 merupakan periode yang ke 35 yatim mandiri menyalurkan beasiswa untuk anak yatim dhuafa <strong>senilai Rp. 11.480.270.000,</strong>- dengan penerima manfaat sebanyak <strong>18.345 anak</strong>. Dan tentunya atas izin Allah dan sahabat dermawan yang membantu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perjalanan pendidikan mereka masih panjang, dan masih membutuhkan dana yang lebih untuk kedepannya. Oleh sebab itu, melalui program BESTARI, sahabat bisa berkontribusi membantu anak yatim dan dhuafa yang kurang beruntung untuk melanjutkan pendidikannya.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Rasulullah shallallahu &lsquo;alaihi wa sallam bersabda:&nbsp;</p>\r\n\r\n<p><em>&ldquo;Aku dan orang yang menanggung anak yatim (kedudukannya) di surga seperti ini&rdquo;, kemudian beliau Shallallahu &lsquo;alaihi wa sallam mengisyaratkan jari telunjuk dan jari tengah beliau shallallahu &lsquo;alaihi wa sallam, serta agak merenggangkan keduanya.</em><em>[HR al-Bukhari no. 4998 dan 5659]</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sahabat, kamu bisa menjadi bagian anak-anak yatim di surga kelak melalui:<br />\r\n<br />\r\n1. Klik Tombol &ldquo;DONASI SEKARANG&rdquo;</p>\r\n\r\n<p>2. Masukkan Nominal Donasi</p>\r\n\r\n<p>3. Pilih Metode Pembayaran GO PAY, BCA, Virtual Account atau transfer Bank (BNI, Mandiri,BCA, BRI, BNI Syariah atau kartu Kredit) dan transfer ke rekening yang tertera.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 400000000, '12.jpg', '2020-04-19', '2020-10-31', 'Y', 'N'),
(14, 66, 'BANTU WUJUDKAN 1.000 ALAT SEKOLAH YATIM GAZA', 'BANTU-WUJUDKAN-1.000-ALAT-SEKOLAH-YATIM-GAZA-14', '<p>Pernahkah #SahabatBerbagi membayangkan bagaimana kehidupan anak-anak Gaza saat ini? Masa kecilnya yang indah terenggut akibat konflik berkepanjangan. Aktivitas sekolah yang menjadi rutinitaspun ikut berhenti. Gedung sekolah mereka dan alat-alat sekolah hancur dan rata dengan tanah.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sulit sekali mencari tempat aman untuk bisa belajar, tak ada buku pensil yang bisa mereka tulis dan menggambar, sepatu yang usang terpaksa harus tetap dipakai untuk melindungi kaki kecil mereka. Dan banyak juga anak-anak yang tidak beralaskan sepatu. Namun keinginan mereka bersekolah tetaplah besar dan tak terkalahkan dengan kondisi yang sulit.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Konflik yang terjadi belasan tahun menghancurkan lebih dari 20 ribu rumah warga Palestina, juga 148 sekolah, 15 rumah sakit dan 45 pusat layanan kesehatan. Sebanyak 247 pabrik dan 300 pusat bisnis di Gaza juga hancur maupun rusak akibat hantaman roket.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hingga saat ini anak-anak Gaza tak berhenti untuk bermimpi, berharap cita-citanya bisa diraih demi masa depan yang lebih baik dan bahagia. Kehidupan mereka sangat memprihatinkan. Namun semangat mereka tetap kuat dan teguh pendirian.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Yatim Mandiri berupaya menggalang dana untuk membantu menyediakan 1.000 peralatan sekolah anak-anak Gaza, yang terdiri dari buku tulis, alat tulis, tas dan sepatu. Sehingga mereka bisa menjadi generasi beriman dan membanggakan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>#SahabatBerbagi apa yang kita anggap sedikit dan kecil nilainya, bisa menjadi sangat bermanfaat untuk hidup anak-anak Gaza dan masa depan mereka. Mari bantu anak-anak Gaza untuk bisa terus bersekolah dan wujudkan mimpinya dengan cara:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. Klik tombol <strong>&ldquo;DONASI SEKARANG&rdquo;</strong></p>\r\n\r\n<p>2. Masukkan nominal donasi</p>\r\n\r\n<p>3. Pilih metode pembayaran GO-PAY, Jenius Pay, LinkAja, DANA, Mandiri Virtual Account, BCA Virtual Account, atau transfer Bank (transfer bank BNI, Mandiri, BCA, BRI, BNI Syariah, atau kartu kredit) dan transfer ke no. rekening yang tertera.</p>\r\n', 225000000, '14.jpg', '2020-04-19', '2020-10-31', 'Y', 'N'),
(15, 66, 'Bantu Disabilitas Sembuh dari infeksi otak', 'Bantu-Disabilitas-Sembuh-dari-infeksi-otak-15', '<p>26 tahun Halidah Salsabila hidup dengan berkebutuhan khusus. Kondisi ini diperparah dengan penyakit infeksi otak yang menyerangnya. Ia tak bisa menggerakkan kedua tangan dan kakinya. Hanya leher dan kepala yang bisa difungsikan untuk berinteraksi, sehingga untuk berjalan ia hanya bisa menggeliatkan badannya.<br />\r\n&nbsp;</p>\r\n\r\n<p>Sejak kecil halidah dan bibinya tinggal di rumah milik Yayasan di Surabaya, karena kedua orang tuanya meninggalkannya tanpa ada kabar hingga saat ini. Dan ia yakini bahwa orang tuanya sudah meninggal dunia. Baginya apa yang dialami merupakan qodarullah yang tetap harus disyukuri dan pasti ada hikmahnya.<br />\r\n<br />\r\nHarapan terbesarnya bisa sembuh dari ke dua penyakitnya, yaitu Cerebral Palsy dan infeksi otak. Untuk membeli obat bibi harus benar-benar berhemat, pasalnya obat infeksi otak untyk 1 bulan menghaibskan uang 1.500.000. Sayangya bibi sebagai pengasuh anak meskipun sudah berhemat belum bisa membeli kebutuhan halidah setiap bulannya.<br />\r\nSahabat, kamu bisa berdonasi untuk membantu halidah sembuh dari ke dua penyakitnya dengan cara!<br />\r\n<br />\r\n1. Klik Tombol<strong> &ldquo;DONASI SEKARANG&rdquo;</strong></p>\r\n\r\n<p>2. Masukkan Nominal Donasi</p>\r\n\r\n<p>3. Pilih Metode Pembayaran GO PAY, BCA, Virtual Account atau transfer Bank (BNI, Mandiri,BCA, BRI, BNI Syariah atau kartu Kredit) dan transfer ke rekening yang tertera.</p>\r\n', 30000000, '15.jpg', '2020-04-19', '2020-10-31', 'Y', 'N'),
(16, 70, 'Donasi Masjid', 'Donasi-Masjid-16', '<p>asa</p>\r\n', 500, '16.png', '2020-05-27', '2020-05-30', 'Y', 'N'),
(17, 78, 'test123', 'test123-17', '<p>test123</p>\r\n', 10000000, '17.jpg', '2020-06-30', '2020-07-11', 'N', 'N'),
(18, 66, 'Test 2', 'test-2-18', '<p>test</p>\r\n', 80000000, '18.jpg', '2020-08-19', '2020-08-19', 'Y', 'Y'),
(19, 66, 'Test 3', 'test-3-19', '<p>Test 3</p>\r\n', 90000000, '19.jpg', '2020-08-19', '2020-08-31', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbkurir`
--

CREATE TABLE `tbkurir` (
  `idKurir` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `asal` varchar(150) NOT NULL,
  `minggu` varchar(100) NOT NULL,
  `nope` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `alasan` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblaporangalangdana`
--

CREATE TABLE `tblaporangalangdana` (
  `idLaporanGalangDana` double NOT NULL,
  `idGalangDana` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status` char(1) NOT NULL COMMENT 'P=Pending,Y=Baca'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaporangalangdana`
--

INSERT INTO `tblaporangalangdana` (`idLaporanGalangDana`, `idGalangDana`, `tanggal`, `judul`, `isi`, `status`) VALUES
(5, 9, '2020-04-14 01:34:50', 'tidak baik untuk di gunakan', '<p>asiapp</p>\r\n', 'Y'),
(6, 14, '2020-06-30 04:08:16', 'test123', '<p>test</p>\r\n', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tblinkweb`
--

CREATE TABLE `tblinkweb` (
  `idLinkWeb` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinkweb`
--

INSERT INTO `tblinkweb` (`idLinkWeb`, `link`) VALUES
(1, 'https://galangdana.aguspramono.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tblokasi`
--

CREATE TABLE `tblokasi` (
  `idLokasi` double NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblokasi`
--

INSERT INTO `tblokasi` (`idLokasi`, `lokasi`) VALUES
(4, 'Medan Sunggal'),
(5, 'Medan Selayang'),
(6, 'Medan Amplas');

-- --------------------------------------------------------

--
-- Table structure for table `tbmenudonasi`
--

CREATE TABLE `tbmenudonasi` (
  `idmenudonasi` int(11) NOT NULL,
  `bahanmakanan` char(1) NOT NULL,
  `nasibungkus` char(1) NOT NULL,
  `uang` char(1) NOT NULL,
  `galangdana` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmenudonasi`
--

INSERT INTO `tbmenudonasi` (`idmenudonasi`, `bahanmakanan`, `nasibungkus`, `uang`, `galangdana`) VALUES
(1, 'N', 'N', 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenarikangalangdana`
--

CREATE TABLE `tbpenarikangalangdana` (
  `idpenarikangalangdana` int(11) NOT NULL,
  `idGalangDana` double NOT NULL,
  `idAnggota` int(11) NOT NULL,
  `idRekeningMember` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'P=Pending,Y=Ok,N=Tolak',
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbpenarikangalangdana`
--

INSERT INTO `tbpenarikangalangdana` (`idpenarikangalangdana`, `idGalangDana`, `idAnggota`, `idRekeningMember`, `jumlah`, `tanggal`, `status`, `keterangan`) VALUES
(2, 15, 66, 2, 1000526, '2020-04-22 11:47:00', 'Y', 'Pembayaran operasi tahap 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbpengeluaranbahan`
--

CREATE TABLE `tbpengeluaranbahan` (
  `idPengeluaranBahan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenisBahan` varchar(30) NOT NULL,
  `jumlahStokDigunakan` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpengeluaranbahan`
--

INSERT INTO `tbpengeluaranbahan` (`idPengeluaranBahan`, `tanggal`, `jenisBahan`, `jumlahStokDigunakan`, `keterangan`) VALUES
(9, '2020-06-30', 'Air Mineral', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbpengeluaranuang`
--

CREATE TABLE `tbpengeluaranuang` (
  `idPengeluaranUang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlahUang` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbrekening`
--

CREATE TABLE `tbrekening` (
  `idRekening` int(11) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `atasNama` varchar(150) NOT NULL,
  `nomorRek` varchar(100) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbrekening`
--

INSERT INTO `tbrekening` (`idRekening`, `bank`, `atasNama`, `nomorRek`, `logo`, `barcode`) VALUES
(2, 'BRI SYARIAH', 'Mujahid Cahaya Peduli Sesama', '10490696814234', '2.jpg', ''),
(6, 'OVO', 'Agus Pramono', '085261523578', '3.png', '3.jpg'),
(7, 'Go Pay', 'Agus Pramono', '085261523578', '7.png', '7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbrekeningmember`
--

CREATE TABLE `tbrekeningmember` (
  `idRekeningMember` int(11) NOT NULL,
  `idAnggota` int(11) NOT NULL,
  `bank` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `atasNama` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `norek` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbrekeningmember`
--

INSERT INTO `tbrekeningmember` (`idRekeningMember`, `idAnggota`, `bank`, `atasNama`, `norek`) VALUES
(1, 57, 'BNI', 'Agus Pramono', '12346543'),
(2, 66, 'BNI', 'Agus Pramono', '171110631');

-- --------------------------------------------------------

--
-- Table structure for table `tbsisauang`
--

CREATE TABLE `tbsisauang` (
  `idSisaUang` int(11) NOT NULL,
  `sisaUang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbslide`
--

CREATE TABLE `tbslide` (
  `idSlide` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbslide`
--

INSERT INTO `tbslide` (`idSlide`, `judul`, `keterangan`, `gambar`) VALUES
(3, 'Galang Dana', 'Solusi Peduli Sesama untuk Kita Semua\r\nAyo membantu sesama dengan bergalang dana               ', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbsponsor`
--

CREATE TABLE `tbsponsor` (
  `idSponsor` int(11) NOT NULL,
  `nama` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbsponsor`
--

INSERT INTO `tbsponsor` (`idSponsor`, `nama`, `logo`) VALUES
(7, 'Broagus', '1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbstok`
--

CREATE TABLE `tbstok` (
  `idStok` int(11) NOT NULL,
  `jenisBahan` varchar(25) NOT NULL,
  `jumlahStok` int(11) NOT NULL,
  `stok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbstok`
--

INSERT INTO `tbstok` (`idStok`, `jenisBahan`, `jumlahStok`, `stok`) VALUES
(16, 'Air Mineral', 1, 'Banyak'),
(17, '', 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbtamu`
--

CREATE TABLE `tbtamu` (
  `idTamu` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtamu`
--

INSERT INTO `tbtamu` (`idTamu`, `tanggal`, `nama`, `email`, `komentar`) VALUES
(1, '2018-08-13', 'Rahma Sari', 'rahmasari97@gmail.com', 'webnya bagus, tapi tolong dikembangin lagi fiturnya'),
(2, '2019-05-26', 'rio', 'rioirwanto9@gmail.com', 'bagus');

-- --------------------------------------------------------

--
-- Table structure for table `tbuang`
--

CREATE TABLE `tbuang` (
  `idUang` int(11) NOT NULL,
  `idAnggota` int(30) NOT NULL,
  `jumlahUang` int(30) NOT NULL,
  `namaPengirim` varchar(150) NOT NULL,
  `norek` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbverifikasi`
--

CREATE TABLE `tbverifikasi` (
  `idVerifikasi` double NOT NULL,
  `idAnggota` int(11) NOT NULL,
  `nomorKtp` varchar(40) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `selfie` varchar(255) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'P=Pending,Y=Ok,N=Tolak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbverifikasi`
--

INSERT INTO `tbverifikasi` (`idVerifikasi`, `idAnggota`, `nomorKtp`, `ktp`, `selfie`, `status`) VALUES
(5, 15, '88585858', '1.jpg', '1.png', 'Y'),
(6, 57, '8944564984568', '6.png', '6.png', 'Y'),
(7, 58, '144545644545654', '7.jpg', '7.jpg', 'Y'),
(8, 66, '17111031', '8.png', '8.png', 'Y'),
(9, 70, '75r45456', '9.png', '9.png', 'Y'),
(10, 78, '123456789123456789', '10.jpg', '10.jpg', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbabout`
--
ALTER TABLE `tbabout`
  ADD PRIMARY KEY (`idAbout`);

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`idAnggota`);

--
-- Indexes for table `tbartikel`
--
ALTER TABLE `tbartikel`
  ADD PRIMARY KEY (`idArtikel`);

--
-- Indexes for table `tbberdonasigalangdana`
--
ALTER TABLE `tbberdonasigalangdana`
  ADD PRIMARY KEY (`idBerdonasiGalangDana`);

--
-- Indexes for table `tbberitagalangdana`
--
ALTER TABLE `tbberitagalangdana`
  ADD PRIMARY KEY (`idBeritaGalangDana`);

--
-- Indexes for table `tbdonasibahan`
--
ALTER TABLE `tbdonasibahan`
  ADD PRIMARY KEY (`idBahanMakanan`);

--
-- Indexes for table `tbdonasinasi`
--
ALTER TABLE `tbdonasinasi`
  ADD PRIMARY KEY (`idNasi`);

--
-- Indexes for table `tbgalangdana`
--
ALTER TABLE `tbgalangdana`
  ADD PRIMARY KEY (`idGalangDana`);

--
-- Indexes for table `tbkurir`
--
ALTER TABLE `tbkurir`
  ADD PRIMARY KEY (`idKurir`);

--
-- Indexes for table `tblaporangalangdana`
--
ALTER TABLE `tblaporangalangdana`
  ADD PRIMARY KEY (`idLaporanGalangDana`);

--
-- Indexes for table `tblinkweb`
--
ALTER TABLE `tblinkweb`
  ADD PRIMARY KEY (`idLinkWeb`);

--
-- Indexes for table `tblokasi`
--
ALTER TABLE `tblokasi`
  ADD PRIMARY KEY (`idLokasi`);

--
-- Indexes for table `tbmenudonasi`
--
ALTER TABLE `tbmenudonasi`
  ADD PRIMARY KEY (`idmenudonasi`);

--
-- Indexes for table `tbpenarikangalangdana`
--
ALTER TABLE `tbpenarikangalangdana`
  ADD PRIMARY KEY (`idpenarikangalangdana`);

--
-- Indexes for table `tbpengeluaranbahan`
--
ALTER TABLE `tbpengeluaranbahan`
  ADD PRIMARY KEY (`idPengeluaranBahan`);

--
-- Indexes for table `tbpengeluaranuang`
--
ALTER TABLE `tbpengeluaranuang`
  ADD PRIMARY KEY (`idPengeluaranUang`);

--
-- Indexes for table `tbrekening`
--
ALTER TABLE `tbrekening`
  ADD PRIMARY KEY (`idRekening`);

--
-- Indexes for table `tbrekeningmember`
--
ALTER TABLE `tbrekeningmember`
  ADD PRIMARY KEY (`idRekeningMember`);

--
-- Indexes for table `tbsisauang`
--
ALTER TABLE `tbsisauang`
  ADD PRIMARY KEY (`idSisaUang`);

--
-- Indexes for table `tbslide`
--
ALTER TABLE `tbslide`
  ADD PRIMARY KEY (`idSlide`);

--
-- Indexes for table `tbsponsor`
--
ALTER TABLE `tbsponsor`
  ADD PRIMARY KEY (`idSponsor`);

--
-- Indexes for table `tbstok`
--
ALTER TABLE `tbstok`
  ADD PRIMARY KEY (`idStok`);

--
-- Indexes for table `tbtamu`
--
ALTER TABLE `tbtamu`
  ADD PRIMARY KEY (`idTamu`);

--
-- Indexes for table `tbuang`
--
ALTER TABLE `tbuang`
  ADD PRIMARY KEY (`idUang`);

--
-- Indexes for table `tbverifikasi`
--
ALTER TABLE `tbverifikasi`
  ADD PRIMARY KEY (`idVerifikasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbabout`
--
ALTER TABLE `tbabout`
  MODIFY `idAbout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbanggota`
--
ALTER TABLE `tbanggota`
  MODIFY `idAnggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbartikel`
--
ALTER TABLE `tbartikel`
  MODIFY `idArtikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbberdonasigalangdana`
--
ALTER TABLE `tbberdonasigalangdana`
  MODIFY `idBerdonasiGalangDana` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbberitagalangdana`
--
ALTER TABLE `tbberitagalangdana`
  MODIFY `idBeritaGalangDana` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbdonasibahan`
--
ALTER TABLE `tbdonasibahan`
  MODIFY `idBahanMakanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbdonasinasi`
--
ALTER TABLE `tbdonasinasi`
  MODIFY `idNasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbgalangdana`
--
ALTER TABLE `tbgalangdana`
  MODIFY `idGalangDana` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbkurir`
--
ALTER TABLE `tbkurir`
  MODIFY `idKurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblaporangalangdana`
--
ALTER TABLE `tblaporangalangdana`
  MODIFY `idLaporanGalangDana` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblinkweb`
--
ALTER TABLE `tblinkweb`
  MODIFY `idLinkWeb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblokasi`
--
ALTER TABLE `tblokasi`
  MODIFY `idLokasi` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbmenudonasi`
--
ALTER TABLE `tbmenudonasi`
  MODIFY `idmenudonasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbpenarikangalangdana`
--
ALTER TABLE `tbpenarikangalangdana`
  MODIFY `idpenarikangalangdana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbpengeluaranbahan`
--
ALTER TABLE `tbpengeluaranbahan`
  MODIFY `idPengeluaranBahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbpengeluaranuang`
--
ALTER TABLE `tbpengeluaranuang`
  MODIFY `idPengeluaranUang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbrekening`
--
ALTER TABLE `tbrekening`
  MODIFY `idRekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbrekeningmember`
--
ALTER TABLE `tbrekeningmember`
  MODIFY `idRekeningMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbsisauang`
--
ALTER TABLE `tbsisauang`
  MODIFY `idSisaUang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbslide`
--
ALTER TABLE `tbslide`
  MODIFY `idSlide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbsponsor`
--
ALTER TABLE `tbsponsor`
  MODIFY `idSponsor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbstok`
--
ALTER TABLE `tbstok`
  MODIFY `idStok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbtamu`
--
ALTER TABLE `tbtamu`
  MODIFY `idTamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbuang`
--
ALTER TABLE `tbuang`
  MODIFY `idUang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbverifikasi`
--
ALTER TABLE `tbverifikasi`
  MODIFY `idVerifikasi` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

show tables
select * from tbrekening order by idRekening desc
