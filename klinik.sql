-- MySQL dump 10.13  Distrib 8.0.23, for macos10.15 (x86_64)
--
-- Host: localhost    Database: klinik
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('4i2UFguctztlNlJ6R90czvkAPUAVtvo0DSqQLmQa',1,'192.168.56.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiemlYRXJKb1htQjl3THpmNktJdFZ0R2tYQ3hDNTBMVjV3bGk2WGRQZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cDovLzE5Mi4xNjguNTYuNTY6ODA4MC9vYmF0Ijt9fQ==',1745167899),('HZ2G9BGiFVIdZ4VILiSk527WuL3LwaYNdalQf3Ud',1,'192.168.56.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.6.1 Safari/605.1.15','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiclJpNGF1OFNrUVpXd1gzVEFOWXFBM3dMOGMyQjJWWkhzeVN5NjkycyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ0OiJodHRwOi8vMTkyLjE2OC41Ni41Njo4MDgwL3BlbmRhZnRhcmFuLXBhc2llbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1745166578),('IMR0o83eBBptDzDuA125OU6xR6dYihgVa8xcvuQj',NULL,'192.168.56.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoic2xnSXVCOVo1M2lJMnpnQ3d1QlNXTmlkQkZuZFBLenE2V2ttQUk1NiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xOTIuMTY4LjU2LjU2OjgwODAvbG9naW4iO319',1745168750),('kZ40zXQP58VGM800fzb7FyhntwijbiPKaUdhvu3s',1,'192.168.56.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVU9vbGxpUWhtaVJXQXlLeGREeTdGSnZIa1dzQzF4M3Q2UTVFUHZIViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xOTIuMTY4LjU2LjU2OjgwODAvcGVuZGFmdGFyYW4tcGFzaWVuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1745165941),('uygwYs5GoXlfZwEjErUi5Gf3e1x5rxdcDnVILFDh',1,'192.168.56.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidGQwMzlVRmlhaVdRV1U1cjllQW5nTHAyZzIzaUZUNUNYRHZBOEtDWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xOTIuMTY4LjU2LjU2OjgwODAvcGVuZGFmdGFyYW4tcGFzaWVuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1745166161);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kunjungan`
--

DROP TABLE IF EXISTS `tb_kunjungan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_kunjungan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pasien_id` int DEFAULT NULL,
  `tanggal_kunjungan` date DEFAULT NULL,
  `keluhan` varchar(45) DEFAULT NULL,
  `pegawai_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kunjungan`
--

LOCK TABLES `tb_kunjungan` WRITE;
/*!40000 ALTER TABLE `tb_kunjungan` DISABLE KEYS */;
INSERT INTO `tb_kunjungan` VALUES (1,1,'2025-04-20','Demam, batuk dan pilek',5,'2025-04-20 08:57:34','2025-04-20 08:57:34'),(2,5,'2025-04-20','alergi dingin(gatal-gatal)',5,'2025-04-20 09:02:18','2025-04-20 10:09:53'),(3,6,'2025-04-20','Sakit kepala, pusing, dan mual',6,'2025-04-20 16:02:22','2025-04-20 16:02:22');
/*!40000 ALTER TABLE `tb_kunjungan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_obat`
--

DROP TABLE IF EXISTS `tb_obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_obat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `obat` varchar(255) DEFAULT NULL,
  `satuan` varchar(45) DEFAULT NULL,
  `stok` varchar(45) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_obat`
--

LOCK TABLES `tb_obat` WRITE;
/*!40000 ALTER TABLE `tb_obat` DISABLE KEYS */;
INSERT INTO `tb_obat` VALUES (1,'Sanmol Paracetamol','Strip','45','2500','2025-04-20 06:35:12','2025-04-20 16:49:17'),(3,'Tera-F','Strip','50','5000','2025-04-20 06:43:23','2025-04-20 06:43:23'),(4,'Omeprazole','Strip','49','10000','2025-04-20 16:50:46','2025-04-20 16:52:07'),(5,'Domperidone','Strip','49','8000','2025-04-20 16:51:39','2025-04-20 16:52:21');
/*!40000 ALTER TABLE `tb_obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pasien`
--

DROP TABLE IF EXISTS `tb_pasien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pasien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) DEFAULT NULL,
  `nik` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` int DEFAULT NULL,
  `alamat` longtext,
  `wilayah_id` int DEFAULT NULL,
  `no_telp` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pasien`
--

LOCK TABLES `tb_pasien` WRITE;
/*!40000 ALTER TABLE `tb_pasien` DISABLE KEYS */;
INSERT INTO `tb_pasien` VALUES (1,'Satria Ananta','1123648320114','1986-02-19',1,'Jl. Sukamanah No. 12',7,'081829372910','2025-04-20 08:52:54','2025-04-20 09:24:15'),(5,'Ningsih','8239328911323','1981-03-10',2,'Jl. Pahlawan, No. 17',7,'089172819278','2025-04-20 09:02:18','2025-04-20 09:02:18'),(6,'Bayu Adrian','11236483206739','1997-06-17',1,'Jl. Saturnus, No. 22',5,'081829372910','2025-04-20 16:02:22','2025-04-20 16:02:22');
/*!40000 ALTER TABLE `tb_pasien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pegawai`
--

DROP TABLE IF EXISTS `tb_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pegawai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `wilayah_id` int DEFAULT NULL,
  `no_telp` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pegawai`
--

LOCK TABLES `tb_pegawai` WRITE;
/*!40000 ALTER TABLE `tb_pegawai` DISABLE KEYS */;
INSERT INTO `tb_pegawai` VALUES (1,'Januar Ardiansyah','Dokter Umum','Jl. Buah Batu No 889',5,'089172819278','2025-04-20 06:57:11','2025-04-20 06:57:11'),(2,'Syakillah Nurrahmah','Dokter Umum','Jl. Sukamulya, No 118',7,'089172819278','2025-04-20 07:02:54','2025-04-20 07:02:54'),(3,'Harris Amal','Staff Kasir','Jl Logam, No 90',5,'087616271892','2025-04-20 07:03:55','2025-04-20 07:04:36'),(5,'Putri Shafa Nadila','Teknisi','Jl. Bojongsoang, No 97',10,'0895411836806','2025-04-20 07:07:50','2025-04-20 07:07:50'),(6,'Khairunnisa Salsabil','Staff Pendaftaran','Jl. Sukagalih No 90',7,'0897281638291','2025-04-20 07:08:25','2025-04-20 07:08:25'),(7,'Tivanka Galuh','Staff Kasir','Jl. Batununggal No. 88',5,'081829372910','2025-04-20 07:09:38','2025-04-20 07:09:57'),(8,'Liam Rama','Staff Pendaftaran','Jl. Terusan Buah Batu, No 76',5,'08767382791837','2025-04-20 07:10:36','2025-04-20 07:10:36');
/*!40000 ALTER TABLE `tb_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pelayanan_obat`
--

DROP TABLE IF EXISTS `tb_pelayanan_obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pelayanan_obat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pemeriksaan_id` int DEFAULT NULL,
  `obat_id` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `dosis` varchar(45) DEFAULT NULL,
  `catatan` varchar(225) DEFAULT NULL,
  `harga_satuan` decimal(10,0) DEFAULT NULL,
  `total_harga` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pelayanan_obat`
--

LOCK TABLES `tb_pelayanan_obat` WRITE;
/*!40000 ALTER TABLE `tb_pelayanan_obat` DISABLE KEYS */;
INSERT INTO `tb_pelayanan_obat` VALUES (2,2,1,3,'3 x 1 Hari','Sesudah Makan',2500,7500,'2025-04-20 12:34:49','2025-04-20 12:40:33'),(3,3,1,2,'3 x 1 Hari','Sesudah Makan',2500,5000,'2025-04-20 16:49:17','2025-04-20 16:49:17'),(4,3,4,1,'3 x 1 Hari','Sebelum Makan',10000,10000,'2025-04-20 16:52:06','2025-04-20 16:52:06'),(5,3,5,1,'3 x 1 Hari','Sebelum Makan',8000,8000,'2025-04-20 16:52:21','2025-04-20 16:52:21');
/*!40000 ALTER TABLE `tb_pelayanan_obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pembayaran`
--

DROP TABLE IF EXISTS `tb_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pembayaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pemeriksaan_id` int DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `total_tagihan` decimal(10,0) DEFAULT NULL,
  `dibayar` decimal(10,0) DEFAULT NULL,
  `kembali` decimal(10,0) DEFAULT NULL,
  `kasir_id` int DEFAULT NULL,
  `catatan` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pembayaran`
--

LOCK TABLES `tb_pembayaran` WRITE;
/*!40000 ALTER TABLE `tb_pembayaran` DISABLE KEYS */;
INSERT INTO `tb_pembayaran` VALUES (1,2,'2025-04-20',37500,50000,12500,5,NULL,'2025-04-20 13:07:12','2025-04-20 13:57:07'),(2,3,'2025-04-20',53000,60000,7000,7,'-','2025-04-20 16:54:48','2025-04-20 16:55:44');
/*!40000 ALTER TABLE `tb_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pemeriksaan`
--

DROP TABLE IF EXISTS `tb_pemeriksaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pemeriksaan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kunjungan_id` int DEFAULT NULL,
  `pegawai_id` int DEFAULT NULL,
  `diagnosa` text,
  `catatan` text,
  `waktu_periksa` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pemeriksaan`
--

LOCK TABLES `tb_pemeriksaan` WRITE;
/*!40000 ALTER TABLE `tb_pemeriksaan` DISABLE KEYS */;
INSERT INTO `tb_pemeriksaan` VALUES (2,2,1,'Alergi','hindari memakan telur','2025-04-20 13:00:00','2025-04-20 10:41:22','2025-04-20 11:17:20'),(3,3,2,'Gerd','hindari kopi dan makanan pedas','2025-04-20 16:44:00','2025-04-20 16:38:51','2025-04-20 16:44:24');
/*!40000 ALTER TABLE `tb_pemeriksaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pemeriksaan_tindakan`
--

DROP TABLE IF EXISTS `tb_pemeriksaan_tindakan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pemeriksaan_tindakan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pemeriksaan_id` int DEFAULT NULL,
  `tindakan_id` int DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pemeriksaan_tindakan`
--

LOCK TABLES `tb_pemeriksaan_tindakan` WRITE;
/*!40000 ALTER TABLE `tb_pemeriksaan_tindakan` DISABLE KEYS */;
INSERT INTO `tb_pemeriksaan_tindakan` VALUES (1,2,1,30000,'2025-04-20 10:41:22','2025-04-20 10:41:22'),(2,3,1,30000,'2025-04-20 16:38:51','2025-04-20 16:38:51');
/*!40000 ALTER TABLE `tb_pemeriksaan_tindakan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tindakan`
--

DROP TABLE IF EXISTS `tb_tindakan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_tindakan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tindakan` varchar(255) DEFAULT NULL,
  `deskripsi` longtext,
  `harga` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tindakan`
--

LOCK TABLES `tb_tindakan` WRITE;
/*!40000 ALTER TABLE `tb_tindakan` DISABLE KEYS */;
INSERT INTO `tb_tindakan` VALUES (1,'Periksa Umum','Pemeriksaan fisik untuk mendiagnosis penyakit atau masalah kesehatan umum','30000','2025-04-20 05:41:52','2025-04-20 05:46:36'),(3,'Cek Laboratorium','Cek darah, urine, dan lain-lain','35000','2025-04-20 05:49:45','2025-04-20 05:49:45');
/*!40000 ALTER TABLE `tb_tindakan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_wilayah`
--

DROP TABLE IF EXISTS `tb_wilayah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_wilayah` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `type` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_wilayah`
--

LOCK TABLES `tb_wilayah` WRITE;
/*!40000 ALTER TABLE `tb_wilayah` DISABLE KEYS */;
INSERT INTO `tb_wilayah` VALUES (1,'Jawa Barat',1,NULL,'2025-04-20 03:56:37','2025-04-20 03:56:37'),(2,'Kota Bandung',2,1,'2025-04-20 04:05:19','2025-04-20 04:05:19'),(3,'Buah Batu',3,2,'2025-04-20 04:14:42','2025-04-20 05:14:01'),(5,'Cijawura',4,3,'2025-04-20 06:56:32','2025-04-20 06:56:32'),(6,'Cibeunying Kaler',3,2,'2025-04-20 07:02:00','2025-04-20 07:02:00'),(7,'Sukaluyu',4,6,'2025-04-20 07:02:19','2025-04-20 07:02:19'),(8,'Kabupaten Bandung',2,1,'2025-04-20 07:06:48','2025-04-20 07:06:48'),(9,'Dayeuhkolot',3,8,'2025-04-20 07:07:05','2025-04-20 07:07:05'),(10,'Citeureup',4,9,'2025-04-20 07:07:17','2025-04-20 07:07:17'),(11,NULL,NULL,NULL,'2025-04-20 12:16:09','2025-04-20 12:16:09');
/*!40000 ALTER TABLE `tb_wilayah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '2',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pegawai_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Putri Shafa','ptryshaf@gmail.com',1,NULL,'$2y$12$Q93L2tPc532h/JF3A3mX6.T.vVzHwRFBqshKVsrN8LiRRBom0SbWC',NULL,'2025-04-19 08:45:54','2025-04-20 07:56:53',5),(2,NULL,'januar@gmail.com',3,NULL,'$2y$12$Q93L2tPc532h/JF3A3mX6.T.vVzHwRFBqshKVsrN8LiRRBom0SbWC',NULL,'2025-04-20 07:49:49','2025-04-20 07:49:49',1),(4,NULL,'syakillah@gmail.com',3,NULL,'$2y$12$taWWwfcfteOE7efaFLrDp.GbUrQmL/xI0bQCcW.M4xEDZLNHIJS2q',NULL,'2025-04-20 07:57:15','2025-04-20 07:57:15',2),(5,NULL,'harris@gmail.com',4,NULL,'$2y$12$C5Dl1i76uxOcBrj7Ul7TEOn2gVI6ZwC33RS8RU21OvqMlMNHbu2QS',NULL,'2025-04-20 07:58:16','2025-04-20 07:58:16',3),(6,NULL,'khairunnisa@gmail.com',2,NULL,'$2y$12$J2m62eb8wg4Phzs/e1cvOuO8tFHiK6YQwesAGbi.Fgb8Xz.HP1lpi',NULL,'2025-04-20 07:58:40','2025-04-20 07:58:40',6),(7,NULL,'tivanka@gmail.com',4,NULL,'$2y$12$pvCTEsV8m2qJ7qbtjxkrnOm2o4sAp0hAcr5Jc7pSthLtesVM./KBq',NULL,'2025-04-20 07:59:04','2025-04-20 07:59:04',7),(8,NULL,'liamrm@gmail.com',2,NULL,'$2y$12$FrjV2QMy7cZjlUw34oP9J.BFZk5zBKulBDkBlfzw6KfjabcYmDKXe',NULL,'2025-04-20 07:59:30','2025-04-20 07:59:30',8);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-21  0:16:54
