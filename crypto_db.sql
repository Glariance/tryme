
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('crypto-cache-gohargreencity34@gmail.com|119.155.175.92', 'i:2;', 1754014622),
('crypto-cache-gohargreencity34@gmail.com|119.155.175.92:timer', 'i:1754014622;', 1754014622),
('crypto-cache-kybyt@mailinator.com|103.18.12.70', 'i:1;', 1753916104),
('crypto-cache-kybyt@mailinator.com|103.18.12.70:timer', 'i:1753916104;', 1753916104),
('crypto-cache-noman3csol@gmail.com|103.203.88.104', 'i:2;', 1754434130),
('crypto-cache-noman3csol@gmail.com|103.203.88.104:timer', 'i:1754434130;', 1754434130),
('crypto-cache-sitoz@mailinator.com|103.18.12.70', 'i:1;', 1753915803),
('crypto-cache-sitoz@mailinator.com|103.18.12.70:timer', 'i:1753915803;', 1753915803),
('crypto-cache-uzaincrypto@gmail.com|202.47.47.96', 'i:1;', 1754048016),
('crypto-cache-uzaincrypto@gmail.com|202.47.47.96:timer', 'i:1754048016;', 1754048016),
('crypto-cache-uzaincrypto@gmail.com|202.47.55.169', 'i:1;', 1754048052),
('crypto-cache-uzaincrypto@gmail.com|202.47.55.169:timer', 'i:1754048052;', 1754048052);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hUchzSjkY88cQWgzoUOifsclPpTFI5fjcnNd8bKk', NULL, '103.203.88.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmlCR3UyNEJ4RmRVQVJ3cmIwRTNEalp1NWdSYmZDU1h0WWMwbXc5YiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vcXVyYW5pY3R1aXRpb24uY29tL2NyeXB0byI7fX0=', 1754503059);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `referral_code` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `referral_code`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shaeleigh Howe', 'mudagapobo@mailinator.com', NULL, 'Magnam laudantium m', NULL, '$2y$12$JnRGpMqx0HTArgX8kod8BOCQDkedUybl78TrcWCaP.LBVPIPnGnsW', NULL, '2025-07-30 22:49:27', '2025-07-30 22:49:27'),
(2, 'Clarke Green', 'poposine@mailinator.com', NULL, 'Fugiat doloribus li', NULL, '$2y$12$taV/H4b22CUXkVHabvsP9eAejTsdtMKyI1V49zOPIOPVLS3Lw1jd6', NULL, '2025-07-30 22:53:48', '2025-07-30 22:53:48'),
(3, 'nom', 'noman3csol@gmail.com', NULL, '123', NULL, '$2y$12$1NguATCKgJQNZoZ4FkV8Yeq6eURp13NGb90c5QLMd75fTGf1iAb.C', NULL, '2025-07-31 15:22:39', '2025-07-31 15:22:39'),
(4, 'Alyssa Noble', 'jusybi@mailinator.com', '5024234234234', 'Rem aut veniam amet', NULL, '$2y$12$REXAZV2zqQaXoTHUYCreROanlNzyCjlKL2UAcBG7GVlf6FGl/aXMa', NULL, '2025-08-01 00:26:18', '2025-08-01 00:26:18'),
(5, 'Uzain', 'gohargreencity34@gmail.com', '03331234567', '1234', NULL, '$2y$12$GlmxpWQYs0t1PM1DBpdhQukrt7hTGN2lHtB/ygbCdJRZvuI/Q4pa.', NULL, '2025-08-01 02:17:38', '2025-08-01 02:17:38'),
(6, 'uzainshehzad', 'uzaincrypto@gmail.com', '03452084650', '88445', NULL, '$2y$12$cRTAJDy5s2CXIPuoJKn8dO930aNM0HbfjhDJpd11woVfSXKzRsc36', NULL, '2025-08-01 11:34:11', '2025-08-01 11:34:11'),
(7, 'nomanaa', 'nomanaaaaa@gmail.com', '03000441782', '123456', NULL, '$2y$12$d66TxiSIqh3mNwog9Wp6euaeexMHlEOk.FvcfGFtnQ.0oQ6Xw32aq', NULL, '2025-08-05 22:49:05', '2025-08-05 22:49:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_referral_code_unique` (`referral_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

