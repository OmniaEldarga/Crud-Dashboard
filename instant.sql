-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 04:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instant`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `desciption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `desciption`, `created_at`, `updated_at`) VALUES
(1, 'Fletter', 'advances course', '2024-08-26 13:11:15', '2024-10-02 21:00:00'),
(3, 'fullstack', 'back && front', '2024-09-09 17:28:52', '2024-10-02 21:00:00'),
(4, 'Back_end', 'offline or online course', '2024-05-01 22:03:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `course_info`
-- (See below for the actual view)
--
CREATE TABLE `course_info` (
`course_id` bigint(20) unsigned
,`title` varchar(255)
,`desciption` varchar(255)
,`created_at` timestamp
,`updated_at` timestamp
,`round_number` varchar(255)
,`round_description` varchar(255)
,`id` bigint(20) unsigned
,`name` varchar(255)
,`email` varchar(255)
,`image` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `course_infor`
-- (See below for the actual view)
--
CREATE TABLE `course_infor` (
`course_id` bigint(20) unsigned
,`title` varchar(255)
,`desciption` varchar(255)
,`created_at` timestamp
,`updated_at` timestamp
,`round_number` varchar(255)
,`round_description` varchar(255)
,`id` bigint(20) unsigned
,`name` varchar(255)
,`email` varchar(255)
,`image` varchar(500)
);

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
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `salary` int(11) NOT NULL,
  `round_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `phone`, `salary`, `round_id`, `user_id`, `course_id`) VALUES
(8, '+1 (114) 111-4017', 0, 10, 134, 4),
(9, '+1 (777) 711-9425', 0, 16, 135, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `instructor_info`
-- (See below for the actual view)
--
CREATE TABLE `instructor_info` (
`id` int(11)
,`user_id` bigint(20) unsigned
,`name` varchar(255)
,`email` varchar(255)
,`image` varchar(500)
,`phone` varchar(20)
,`salary` int(11)
,`course_title` varchar(255)
,`course_description` varchar(255)
,`round_number` varchar(255)
,`round_description` varchar(255)
);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_08_13_175458_create_courses_table', 1),
(7, '2024_08_13_175505_create_rounds_table', 1),
(8, '2024_08_13_175540_create_projects_table', 1),
(9, '2024_08_13_175546_create_students_table', 1),
(10, '2024_08_13_175547_create_replies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `demo_link` varchar(255) DEFAULT NULL,
  `attachments` text DEFAULT NULL,
  `round_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `demo_link`, `attachments`, `round_id`, `created_at`, `updated_at`) VALUES
(1, 'project1(crud opration)', 'delte,edit,create.......', 'https://chatgpt.com/', 'any things', 10, '2024-05-01 01:08:31', '2024-09-05 01:08:31'),
(5, 'project2', '(connect database with php)', 'http://localhost/phpmyadmin', '-----------------', 16, '2023-10-01 02:07:28', '2024-10-01 02:07:28');

-- --------------------------------------------------------

--
-- Stand-in structure for view `project_rou_cour_user`
-- (See below for the actual view)
--
CREATE TABLE `project_rou_cour_user` (
`project_id` bigint(20) unsigned
,`project_title` varchar(255)
,`project_description` varchar(255)
,`project_demo_link` varchar(255)
,`project_attachments` text
,`round_id` bigint(20) unsigned
,`round_number` varchar(255)
,`round_description` varchar(255)
,`course_id` bigint(20) unsigned
,`course_title` varchar(255)
,`course_description` varchar(255)
,`user_id` bigint(20) unsigned
,`users_name` varchar(255)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `demo_link` varchar(255) DEFAULT NULL,
  `attachments` text DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `title`, `demo_link`, `attachments`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'repli1', 'https://chatgpt.com/2', 'chatgpt.com/', 1, 132, '2020-10-01 01:48:22', '2024-10-04 21:00:00'),
(5, 'repli2', 'http://localhost/phpmyadmim/index.php', '@@@@@@@@@@@@@@@@@@@@@@@@@@@@@', 5, 133, '2023-10-09 04:04:46', '2024-08-30 23:59:52');

-- --------------------------------------------------------

--
-- Stand-in structure for view `replies_proj_rou_cour_user`
-- (See below for the actual view)
--
CREATE TABLE `replies_proj_rou_cour_user` (
`replie_id` bigint(20) unsigned
,`replie_title` varchar(255)
,`replie_demo` varchar(255)
,`replie_attachments` text
,`project_id` bigint(20) unsigned
,`project_title` varchar(255)
,`project_description` varchar(255)
,`project_demo` varchar(255)
,`round_id` bigint(20) unsigned
,`round_number` varchar(255)
,`course_id` bigint(20) unsigned
,`course_title` varchar(255)
,`user_id` bigint(20) unsigned
,`user_name` varchar(255)
,`user_email` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `replies_user_proj`
-- (See below for the actual view)
--
CREATE TABLE `replies_user_proj` (
`id` bigint(20) unsigned
,`replies_title` varchar(255)
,`demo_link` varchar(255)
,`attachments` text
,`user_id` bigint(20) unsigned
,`user_name` varchar(255)
,`email` varchar(255)
,`types` enum('instructor','student','admin')
,`project_id` bigint(20) unsigned
,`project_title` varchar(255)
,`project_description` varchar(255)
,`demo_link_pro` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `rounds`
--

CREATE TABLE `rounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `round_number` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rounds`
--

INSERT INTO `rounds` (`id`, `round_number`, `description`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(10, '1', 'it\'s first round in this page', 4, 134, '2023-07-06 21:00:00', NULL),
(16, '2', 'it\'s second round in this page', 3, 135, '1991-05-23 21:00:00', NULL),
(17, '842', 'Provident voluptate', 1, 135, '1990-01-24 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `round_course_user`
-- (See below for the actual view)
--
CREATE TABLE `round_course_user` (
`round_id` bigint(20) unsigned
,`round_number` varchar(255)
,`description` varchar(255)
,`course_id` bigint(20) unsigned
,`course_title` varchar(255)
,`course_description` varchar(255)
,`user_id` bigint(20) unsigned
,`user_name` varchar(255)
,`user_email` varchar(255)
,`user_type` enum('instructor','student','admin')
,`user_rule_id` int(11)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `rulse`
--

CREATE TABLE `rulse` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rulse`
--

INSERT INTO `rulse` (`id`, `name`, `description`) VALUES
(1, 'admin', 'all access for all pages'),
(2, 'instructor', 'access for all pages except create and edit any users'),
(3, 'student', 'view only ');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `collage` varchar(200) NOT NULL,
  `Department` varchar(200) NOT NULL,
  `round_id` bigint(20) UNSIGNED NOT NULL DEFAULT 31,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `collage`, `Department`, `round_id`, `user_id`, `created_at`, `updated_at`) VALUES
(41, 'must', 'cs', 10, 132, '2023-02-04 22:00:00', '0000-00-00 00:00:00'),
(42, 'mus', 'ai', 16, 133, '1989-07-23 21:00:00', '2024-10-01 21:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_info`
-- (See below for the actual view)
--
CREATE TABLE `student_info` (
`id` bigint(20) unsigned
,`user_id` bigint(20) unsigned
,`name` varchar(255)
,`email` varchar(255)
,`image` varchar(500)
,`collage` varchar(200)
,`Department` varchar(200)
,`round_number` varchar(255)
,`round_description` varchar(255)
,`course_title` varchar(255)
,`course_description` varchar(255)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `types` enum('instructor','student','admin') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rule_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `types`, `remember_token`, `created_at`, `updated_at`, `rule_id`) VALUES
(24, 'Amna  Yehia ', 'amna@gmail.com', './app/users/upload/47WhatsApp Image 2024-09-24 at 7.56.57 AM (1).jpeg', NULL, '$2y$10$f3C/h8aveGXQhGfpviBx9eI59OZUcsog5/nsUdJ.3mcz331cAVPhS', 'admin', NULL, '2024-08-12 21:00:00', NULL, 1),
(132, 'ali', 'ali@mail.com', '../users/upload/207WhatsApp Image 2024-05-01 at 1.40.39 AM.jpeg', NULL, '$2y$10$heb9ZCyGNDheKhgb5sR.PeekKp80yG38j/dsWGQmvr0hEin/WKC4e', 'student', NULL, '0000-00-00 00:00:00', NULL, 3),
(133, 'ahmed mohamed', 'ahmed@gamil.com', '../users/upload/858', NULL, '$2y$10$B2MOnwIzJecG.E340dGCreqA8NjSk.fwOf5g.gpGzALPSiSrOGfmu', 'student', NULL, '0000-00-00 00:00:00', NULL, 1),
(134, 'Mohammad', 'moh@mail.com', '../users/upload/815', NULL, '$2y$10$BmBVXsTijJ9LypZMcLAGIOrS3oxLUrlo9XTQJldgpiLVtTV7fCdlG', 'instructor', NULL, NULL, NULL, 1),
(135, 'Sama', 'sam@mail.com', '../users/upload/970WhatsApp Image 2024-03-25 at 6.32.43 AM (1).jpeg', NULL, '$2y$10$aN.qB0j4AeKeHEsa0rVN.OGBAZ7YsndXmg6xbdnZKoBCCUBJnBKQC', 'instructor', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_data`
-- (See below for the actual view)
--
CREATE TABLE `user_data` (
`id` bigint(20) unsigned
,`name` varchar(255)
,`email` varchar(255)
,`image` varchar(500)
,`email_verified_at` timestamp
,`password` varchar(255)
,`types` enum('instructor','student','admin')
,`remember_token` varchar(100)
,`created_at` timestamp
,`updated_at` timestamp
,`rule_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_data_rules`
-- (See below for the actual view)
--
CREATE TABLE `user_data_rules` (
`id` bigint(20) unsigned
,`name` varchar(255)
,`email` varchar(255)
,`image` varchar(500)
,`types` enum('instructor','student','admin')
,`created_at` timestamp
,`updated_at` timestamp
,`rule_id` int(11)
,`rule_name` varchar(200)
,`description` varchar(200)
);

-- --------------------------------------------------------

--
-- Structure for view `course_info`
--
DROP TABLE IF EXISTS `course_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `course_info`  AS SELECT `courses`.`id` AS `course_id`, `courses`.`title` AS `title`, `courses`.`desciption` AS `desciption`, `courses`.`created_at` AS `created_at`, `courses`.`updated_at` AS `updated_at`, `rounds`.`round_number` AS `round_number`, `rounds`.`description` AS `round_description`, `users`.`id` AS `id`, `users`.`name` AS `name`, `users`.`email` AS `email`, `users`.`image` AS `image` FROM ((`courses` join `rounds` on(`rounds`.`course_id` = `courses`.`id`)) join `users` on(`users`.`id` = `rounds`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `course_infor`
--
DROP TABLE IF EXISTS `course_infor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `course_infor`  AS SELECT `courses`.`id` AS `course_id`, `courses`.`title` AS `title`, `courses`.`desciption` AS `desciption`, `courses`.`created_at` AS `created_at`, `courses`.`updated_at` AS `updated_at`, `rounds`.`round_number` AS `round_number`, `rounds`.`description` AS `round_description`, `users`.`id` AS `id`, `users`.`name` AS `name`, `users`.`email` AS `email`, `users`.`image` AS `image` FROM ((`courses` join `rounds` on(`rounds`.`course_id` = `courses`.`id`)) join `users` on(`users`.`id` = `rounds`.`user_id`)) WHERE `users`.`types` = 'instructor' ;

-- --------------------------------------------------------

--
-- Structure for view `instructor_info`
--
DROP TABLE IF EXISTS `instructor_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `instructor_info`  AS SELECT `instructors`.`id` AS `id`, `users`.`id` AS `user_id`, `users`.`name` AS `name`, `users`.`email` AS `email`, `users`.`image` AS `image`, `instructors`.`phone` AS `phone`, `instructors`.`salary` AS `salary`, `courses`.`title` AS `course_title`, `courses`.`desciption` AS `course_description`, `rounds`.`round_number` AS `round_number`, `rounds`.`description` AS `round_description` FROM (((`instructors` join `users` on(`users`.`id` = `instructors`.`user_id`)) join `courses` on(`courses`.`id` = `instructors`.`course_id`)) join `rounds` on(`rounds`.`id` = `instructors`.`round_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `project_rou_cour_user`
--
DROP TABLE IF EXISTS `project_rou_cour_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `project_rou_cour_user`  AS SELECT `projects`.`id` AS `project_id`, `projects`.`title` AS `project_title`, `projects`.`description` AS `project_description`, `projects`.`demo_link` AS `project_demo_link`, `projects`.`attachments` AS `project_attachments`, `rounds`.`id` AS `round_id`, `rounds`.`round_number` AS `round_number`, `rounds`.`description` AS `round_description`, `courses`.`id` AS `course_id`, `courses`.`title` AS `course_title`, `courses`.`desciption` AS `course_description`, `users`.`id` AS `user_id`, `users`.`name` AS `users_name`, `projects`.`created_at` AS `created_at`, `projects`.`updated_at` AS `updated_at` FROM (((`projects` join `rounds` on(`rounds`.`id` = `projects`.`round_id`)) join `courses` on(`courses`.`id` = `rounds`.`course_id`)) join `users` on(`users`.`id` = `rounds`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `replies_proj_rou_cour_user`
--
DROP TABLE IF EXISTS `replies_proj_rou_cour_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `replies_proj_rou_cour_user`  AS SELECT `replies`.`id` AS `replie_id`, `replies`.`title` AS `replie_title`, `replies`.`demo_link` AS `replie_demo`, `replies`.`attachments` AS `replie_attachments`, `projects`.`id` AS `project_id`, `projects`.`title` AS `project_title`, `projects`.`description` AS `project_description`, `projects`.`demo_link` AS `project_demo`, `rounds`.`id` AS `round_id`, `rounds`.`round_number` AS `round_number`, `courses`.`id` AS `course_id`, `courses`.`title` AS `course_title`, `users`.`id` AS `user_id`, `users`.`name` AS `user_name`, `users`.`email` AS `user_email` FROM ((((`replies` join `projects` on(`projects`.`id` = `replies`.`project_id`)) join `users` on(`users`.`id` = `replies`.`user_id`)) join `rounds` on(`rounds`.`id` = `projects`.`round_id`)) join `courses` on(`courses`.`id` = `rounds`.`course_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `replies_user_proj`
--
DROP TABLE IF EXISTS `replies_user_proj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `replies_user_proj`  AS SELECT `replies`.`id` AS `id`, `replies`.`title` AS `replies_title`, `replies`.`demo_link` AS `demo_link`, `replies`.`attachments` AS `attachments`, `users`.`id` AS `user_id`, `users`.`name` AS `user_name`, `users`.`email` AS `email`, `users`.`types` AS `types`, `projects`.`id` AS `project_id`, `projects`.`title` AS `project_title`, `projects`.`description` AS `project_description`, `projects`.`demo_link` AS `demo_link_pro` FROM ((`replies` join `users` on(`users`.`id` = `replies`.`user_id`)) join `projects` on(`projects`.`id` = `replies`.`project_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `round_course_user`
--
DROP TABLE IF EXISTS `round_course_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `round_course_user`  AS SELECT `rounds`.`id` AS `round_id`, `rounds`.`round_number` AS `round_number`, `rounds`.`description` AS `description`, `courses`.`id` AS `course_id`, `courses`.`title` AS `course_title`, `courses`.`desciption` AS `course_description`, `users`.`id` AS `user_id`, `users`.`name` AS `user_name`, `users`.`email` AS `user_email`, `users`.`types` AS `user_type`, `users`.`rule_id` AS `user_rule_id`, `rounds`.`created_at` AS `created_at`, `rounds`.`updated_at` AS `updated_at` FROM ((`rounds` join `courses` on(`courses`.`id` = `rounds`.`course_id`)) join `users` on(`users`.`id` = `rounds`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `student_info`
--
DROP TABLE IF EXISTS `student_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_info`  AS SELECT `students`.`id` AS `id`, `users`.`id` AS `user_id`, `users`.`name` AS `name`, `users`.`email` AS `email`, `users`.`image` AS `image`, `students`.`collage` AS `collage`, `students`.`Department` AS `Department`, `rounds`.`round_number` AS `round_number`, `rounds`.`description` AS `round_description`, `courses`.`title` AS `course_title`, `courses`.`desciption` AS `course_description`, `students`.`created_at` AS `created_at`, `students`.`updated_at` AS `updated_at` FROM (((`students` join `users` on(`users`.`id` = `students`.`user_id`)) join `rounds` on(`rounds`.`id` = `students`.`round_id`)) join `courses` on(`courses`.`id` = `rounds`.`course_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_data`
--
DROP TABLE IF EXISTS `user_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_data`  AS SELECT `users`.`id` AS `id`, `users`.`name` AS `name`, `users`.`email` AS `email`, `users`.`image` AS `image`, `users`.`email_verified_at` AS `email_verified_at`, `users`.`password` AS `password`, `users`.`types` AS `types`, `users`.`remember_token` AS `remember_token`, `users`.`created_at` AS `created_at`, `users`.`updated_at` AS `updated_at`, `users`.`rule_id` AS `rule_id` FROM `users` ;

-- --------------------------------------------------------

--
-- Structure for view `user_data_rules`
--
DROP TABLE IF EXISTS `user_data_rules`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_data_rules`  AS SELECT `users`.`id` AS `id`, `users`.`name` AS `name`, `users`.`email` AS `email`, `users`.`image` AS `image`, `users`.`types` AS `types`, `users`.`created_at` AS `created_at`, `users`.`updated_at` AS `updated_at`, `rulse`.`id` AS `rule_id`, `rulse`.`name` AS `rule_name`, `rulse`.`description` AS `description` FROM (`users` join `rulse` on(`rulse`.`id` = `users`.`rule_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructors_round_id_foreign` (`round_id`),
  ADD KEY `instructors_course_id_foreign` (`course_id`),
  ADD KEY `instructors_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_round_id_foreign` (`round_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_project_id_foreign` (`project_id`),
  ADD KEY `replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rounds_course_id_foreign` (`course_id`),
  ADD KEY `rounds_user_id_foreign` (`user_id`);

--
-- Indexes for table `rulse`
--
ALTER TABLE `rulse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_round_id_foreign` (`round_id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `rule_id` (`rule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rounds`
--
ALTER TABLE `rounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instructors_round_id_foreign` FOREIGN KEY (`round_id`) REFERENCES `rounds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instructors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_round_id_foreign` FOREIGN KEY (`round_id`) REFERENCES `rounds` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rounds`
--
ALTER TABLE `rounds`
  ADD CONSTRAINT `rounds_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rounds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_round_id_foreign` FOREIGN KEY (`round_id`) REFERENCES `rounds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `rulse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
