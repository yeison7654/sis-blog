Create database bd_posts;

CREATE TABLE `tbl_posts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `autor` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*otra bd*/
