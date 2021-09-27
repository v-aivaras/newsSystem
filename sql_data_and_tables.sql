-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 05:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `short` varchar(100) NOT NULL,
  `full` text NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `visible_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `short`, `full`, `visible`, `type`, `created_at`, `updated_at`, `visible_at`) VALUES
(1, 'Pati geriausia naujiena', '<h2>Įžanga</h2>\r\n\r\n<p style=\"text-align:justify\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut impedit neque sed reiciendis dolorum unde veritatis et officiis quasi, inventore, ipsum quam quis dolorem omnis reprehenderit e<img alt=\"\" src=\"/news/uploads/cloud.jpg\" style=\"float:right; height:150px; margin:5px; width:150px\" />arum minus, facilis esse adipisci. Laudantium itaque dolor possimus cum perferendis corrupti soluta iure dolores, excepturi, labore at. Vero officia, unde doloribus aliquid nihil, minus, alias a asperiores ab deserunt quisquam iste! Doloremque obcaecati consequatur accusamus, quidem maxime soluta minima inventore, impedit quia quae deserunt. Cupiditate tempora optio amet. Repellat magnam natus veritatis id consectetur ut neque, ex repudiandae ipsam nostrum dolorum iste fugit ea sapiente tempora laboriosam voluptate alias ducimus quaerat magni vel voluptatibus rem earum! Qui deleniti tempore autem sit sequi excepturi consequatur molestiae earum consequuntur veritatis. Deleniti magni fugiat in commodi nulla dolorum delectus hic iusto? Facilis vitae neque eaque mollitia? Sed blanditiis rerum optio, repudiandae repellat rem corporis! Recusandae aliquam magni eligendi numquam, error, ducimus aliquid enim vel tenetur quod tempora ea?</p>\r\n\r\n<h2 style=\"text-align:justify\">Expedita</h2>\r\n\r\n<p style=\"text-align:justify\">dolorem iure! Nemo facere animi vel aperiam repellendus doloremque tempora provident, optio corporis veniam aut, at facilis molestiae. Ab voluptates optio consequuntur? Illum, assumenda. Hic necessitatibus maxime numquam eum voluptatem ratione delectus molestias eos voluptate explicabo, molestiae exercitationem sed corrupti dolore deleniti magnam accusantium sequi, doloremque dicta non omnis totam laboriosam. Molestias corrupti porro, pariatur expedita consequuntur accusantium quaerat incidunt eos. Ratione, dolorum ipsa. Optio suscipit soluta perferendis quis cupiditate sed iure iste unde tenetur ducimus delectus enim, mollitia eaque ratione fugit incidunt impedit eius alias fugiat accusamus deleniti fuga quod vel? Tempora sint temporibus et libero voluptas, quod similique. Officia iure excepturi culpa eligendi quam officiis cumque neque fugit suscipit voluptatum commodi, impedit dicta explicabo maiores aut natus libero sint eveniet perspiciatis. Voluptatibus velit provident eligendi ducimus eius, ut incidunt necessitatibus saepe accusantium ipsam fugiat in cupiditate nam sapiente optio perferendis eaque. Praesentium iste numquam eum.</p>\r\n', 1, 4, '2021-09-25 14:09:53', NULL, '2021-09-25 15:14:37'),
(2, 'Sistemos atnaujinimas', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut impedit neque sed reiciendis dolorum unde veritatis et officiis quasi, inventore, ipsum quam quis dolorem omnis reprehenderit earum minus, facilis esse adipisci. Laudantium itaque dolor possimus cum perferendis corrupti soluta iure dolores, excepturi, labore at. Vero officia, unde doloribus aliquid nihil, minus, alias a asperiores ab deserunt quisquam iste! Doloremque obcaecati consequatur accusamus, quidem maxime soluta minima inventore, impedit quia quae deserunt.&nbsp;</p>\r\n', 0, 3, '2021-09-25 14:14:13', NULL, '2021-10-01 20:02:19'),
(3, 'Naujausia informacija apie modulių integraciją ', '<p><span style=\"font-family:Comic Sans MS,cursive\"><tt>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut impedit neque sed reiciendis dolorum unde veritatis et officiis quasi, inventore, ipsum quam quis dolorem omnis reprehenderit earum minus, facilis esse adipisci. Laudantium itaque dolor possimus cum perferendis corrupti soluta iure dolores, excepturi, labore at. Vero officia, unde doloribus aliquid nihil, minus, alias a asperiores ab deserunt quisquam iste! Doloremque obcaecati consequatur accusamus, quidem maxime soluta minima inventore, impedit quia quae deserunt. Cupiditate tempora optio amet. Repellat magnam natus veritatis id consectetur ut neque, ex repudiandae ipsam nostrum dolorum iste fugit ea sapiente tempora laboriosam voluptate alias ducimus quaerat magni vel voluptatibus rem earum! Qui deleniti tempore autem sit sequi excepturi consequatur molestiae earum consequuntur veritatis. Deleniti magni fugiat in commodi nulla dolorum delectus hic iusto? Facilis vitae neque eaque mollitia? Sed blanditiis rerum optio, repudiandae repellat rem corporis! Recusandae aliquam magni eligendi numquam, error, ducimus aliquid enim vel tenetur quod tempora ea? Expedita, dolorem iure! Nemo facere animi vel aperiam repellendus doloremque tempora provident, optio corporis veniam aut, at facilis molestiae. Ab voluptates optio consequuntur? Illum, assumenda. Hic necessitatibus maxime numquam eum voluptatem ratione delectus molestias eos voluptate explicabo, molestiae exercitationem sed corrupti dolore deleniti magnam accusantium sequi, doloremque dicta non omnis totam laboriosam. Molestias corrupti porro, pariatur expedita consequuntur accusantium quaerat incidunt eos. Ratione, dolorum ipsa. Optio suscipit soluta perferendis quis cupiditate sed iure iste unde tenetur ducimus delectus enim, mollitia eaque ratione fugit incidunt impedit eius alias fugiat accusamus deleniti fuga quod vel? Tempora sint temporibus et libero voluptas, quod similique. Officia iure excepturi culpa eligendi quam officiis cumque neque fugit suscipit voluptatum commodi, impedit dicta explicabo maiores aut natus libero sint eveniet perspiciatis. Voluptatibus velit provident eligendi ducimus eius, ut incidunt necessitatibus saepe accusantium ipsam fugiat in cupiditate nam sapiente optio perferendis eaque. Praesentium iste numquam eum.</tt></span></p>\r\n', 1, 2, '2021-09-25 14:15:38', '2021-09-25 14:29:30', '2021-09-25 14:14:23'),
(4, 'Sistemos atnaujinimas 2021-09-30', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut impedit neque sed reiciendis dolorum unde veritatis et officiis quasi, inventore, ipsum quam quis dolorem omnis reprehenderit earum minus, facilis esse adipisci. Laudantium itaque dolor possimus cum perferendis corrupti soluta iure dolores, excepturi, labore at. Vero officia, unde doloribus aliquid nihil, minus, alias a asperiores ab deserunt quisquam iste! Doloremque obcaecati consequatur accusamus, quidem maxime soluta minima inventore, impedit quia quae deserunt. Cupiditate tempora optio amet. Repellat magnam natus veritatis id consectetur ut neque, ex repudiandae ipsam nostrum dolorum iste fugit ea sapiente tempora laboriosam voluptate alias ducimus quaerat magni vel voluptatibus rem earum! Qui deleniti tempore autem sit sequi excepturi consequatur molestiae earum consequuntur veritatis. Deleniti magni fugiat in commodi nulla dolorum delectus hic iusto? Facilis vitae neque eaque mollitia? Sed blanditiis rerum optio, repudiandae repellat rem corporis! Recusandae aliquam magni eligendi numquam, error, ducimus aliquid enim vel tenetur quod tempora ea? Expedita, dolorem iure! Nemo facere animi vel aperiam repellendus doloremque tempora provident, optio corporis veniam aut, at facilis molestiae. Ab voluptates optio consequuntur? Illum, assumenda. Hic necessitatibus maxime numquam eum voluptatem ratione delectus molestias eos voluptate explicabo, molestiae exercitationem sed corrupti dolore deleniti magnam accusantium sequi, doloremque dicta non omnis totam laboriosam. Molestias corrupti porro, pariatur expedita consequuntur accusantium quaerat incidunt eos. Ratione, dolorum ipsa. Optio suscipit soluta perferendis quis cupiditate sed iure iste unde tenetur ducimus delectus enim, mollitia eaque ratione fugit incidunt impedit eius alias fugiat accusamus deleniti fuga quod vel? Tempora sint temporibus et libero voluptas, quod similique. Officia iure excepturi culpa eligendi quam officiis cumque neque fugit suscipit voluptatum commodi, impedit dicta explicabo maiores aut natus libero sint eveniet perspiciatis. Voluptatibus velit provident eligendi ducimus eius, ut incidunt necessitatibus saepe accusantium ipsam fugiat in cupiditate nam sapiente optio perferendis eaque. Praesentium iste numquam eum.</p>\r\n', 1, 3, '2021-09-25 14:23:48', NULL, '2021-09-30 14:23:07'),
(5, 'Nauja funkcija!', '<p style=\"text-align:justify\"><strong>Lorem ipsum dolor, sit amet<img alt=\"\" src=\"/news/uploads/energy.jpg\" style=\"float:left; height:250px; margin:5px; width:250px\" /> consectetur adipisicing elit. Aut impedit neque sed reiciendis dolorum unde veritatis et officiis quasi, inventore, ipsum quam quis dolorem omnis reprehenderit earum minus, facilis esse adipisci. Laudantium itaque dolor possimus cum perferendis corrupti soluta iure dolores, excepturi, labore at. Vero officia, unde doloribus aliquid nihil, minus, alias a asperiores ab deserunt quisquam iste! Doloremque obcaecati consequatur accusamus, quidem maxime soluta minima inventore, impedit quia quae deserunt.</strong></p>\r\n\r\n<p style=\"text-align:justify\">Cupiditate tempora optio amet. Repellat magnam natus veritatis id consectetur ut neque, ex repudiandae ipsam nostrum dolorum iste fugit ea sapiente tempora laboriosam voluptate alias ducimus quaerat magni vel voluptatibus rem earum! Qui deleniti tempore autem sit sequi excepturi consequatur molestiae earum consequuntur veritatis. Deleniti magni fugiat in commodi nulla dolorum delectus hic iusto? Facilis vitae neque eaque mollitia? Sed blanditiis rerum optio, repudiandae repellat rem corporis! Recusandae aliquam magni eligendi numquam, error, ducimus aliquid enim vel tenetur quod tempora ea? Expedita, dolorem iure! Nemo facere animi vel aperiam repellendus doloremque tempora provident, optio corporis veniam aut, at facilis molestiae. Ab voluptates optio consequuntur? Illum, assumenda. Hic necessitatibus maxime numquam eum voluptatem ratione delectus molestias eos voluptate explicabo, molestiae exercitationem sed corrupti dolore deleniti magnam accusantium sequi, doloremque dicta non omnis totam laboriosam. Molestias corrupti porro, pariatur expedita consequuntur accusantium quaerat incidunt eos. Ratione, dolorum ipsa. Optio suscipit soluta perferendis quis cupiditate sed iure iste unde tenetur ducimus delectus enim, mollitia eaque ratione fugit incidunt impedit eius alias fugiat accusamus deleniti fuga quod vel? Tempora sint temporibus et libero voluptas, quod similique. Officia iure excepturi culpa eligendi quam officiis cumque neque fugit suscipit voluptatum commodi, impedit dicta explicabo maiores aut natus libero sint eveniet perspiciatis. Voluptatibus velit provident eligendi ducimus eius, ut incidunt necessitatibus saepe accusantium ipsam fugiat in cupiditate nam sapiente optio perferendis eaque. Praesentium iste numquam eum.</p>\r\n', 1, 1, '2021-09-25 14:25:53', NULL, '2021-09-25 14:24:10'),
(6, 'Funkcija 2.1', '<p>Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcijav 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;</p>\r\n\r\n<p>Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;</p>\r\n\r\n<p>Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;</p>\r\n\r\n<p>Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;Funkcija 2.1&nbsp;</p>\r\n', 1, 4, '2021-09-25 14:27:25', '2021-09-26 17:35:42', '2022-01-01 01:01:06'),
(7, 'Atnaujinimas 2021 spalio mėn.', '<h3 style=\"text-align:center\"><em><u>Lorem ipsum</u></em></h3>\r\n\r\n<p style=\"text-align:center\">dolor, sit amet consectetur adipisicing elit. Aut impedit neque sed reiciendis dolorum unde veritatis et officiis quasi, inventore, ipsum quam quis dolorem omnis reprehenderit earum minus, facilis esse adipisci. Laudantium itaque dolor possimus cum perferendis corrupti soluta iure dolores, excepturi, labore at. Vero officia, unde doloribus aliquid nihil, minus, alias a asperiores ab deserunt quisquam iste! Doloremque obcaecati consequatur accusamus, quidem maxime soluta minima inventore,</p>\r\n\r\n<p style=\"text-align:center\">impedit quia quae deserunt. Cupiditate tempora optio amet. Repellat magnam natus veritatis id consectetur ut neque, ex repudiandae ipsam nostrum dolorum iste fugit ea sapiente tempora laboriosam voluptate alias ducimus quaerat magni vel voluptatibus rem earum! Qui deleniti tempore autem sit sequi excepturi consequatur molestiae earum consequuntur veritatis. Deleniti magni fugiat in commodi nulla dolorum delectus hic iusto? Facilis vitae neque eaque mollitia? Sed blanditiis rerum optio, r</p>\r\n\r\n<p style=\"text-align:center\">epudiandae repellat rem corporis! Recusandae aliquam magni eligendi numquam, error, ducimus aliquid enim vel tenetur quod tempora ea? Expedita, dolorem iure! Nemo facere animi vel aperiam repellendus doloremque tempora provident, optio corporis veniam aut, at facilis molestiae. Ab voluptates optio consequuntur? Illum, assumenda. Hic necessitatibus maxime numquam eum voluptatem ratione delectus molestias eos voluptate explicabo, molestiae exercitationem sed corrupti dolore deleniti magnam accusantium sequi, doloremque dicta non omnis totam laboriosam. Molestias corrupti porro, pariatur expedita consequuntur accusantium quaerat incidunt eos. Ratione, dolorum ipsa.</p>\r\n\r\n<p style=\"text-align:center\">Optio suscipit soluta perferendis quis cupiditate sed iure iste unde tenetur ducimus delectus enim, mollitia eaque ratione fugit incidunt impedit eius alias fugiat accusamus deleniti fuga quod vel? Tempora sint temporibus et libero voluptas, quod similique. Officia iure excepturi culpa eligendi quam officiis cumque neque fugit suscipit voluptatum commodi, impedit dicta explicabo maiores aut natus libero sint eveniet perspiciatis. Voluptatibus velit provident eligendi ducimus eius, ut incidunt necessitatibus saepe accusantium ipsam fugiat in cupiditate nam sapiente optio perferendis eaque. Praesentium iste numquam eum.</p>\r\n', 1, 3, '2021-09-25 14:29:03', NULL, '2021-09-25 14:27:58'),
(8, 'Atnaujinimas 2022', '<p style=\"text-align:justify\"><em>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut impedit neque sed reiciendis dolorum unde veritatis et officiis quasi, inventore, ipsum quam quis dolorem omnis reprehenderit earum minus, facilis esse adipisci. Laudantium itaque dolor possimus cum perferendis corrupti soluta iure dolores, excepturi, labore at. Vero officia, unde doloribus aliquid nihil, minus, alias a asperiores ab deserunt quisquam iste! Doloremque obcaecati consequatur accusamus, quidem maxime soluta minima inventore, impedit quia quae deserunt. Cupiditate tempora optio amet. Repellat magnam natus veritatis id consectetur ut neque, ex repudiandae ipsam nostrum dolorum iste fugit ea sapiente tempora laboriosam voluptate alias ducimus quaerat magni vel voluptatibus rem earum! Qui deleniti tempore autem sit sequi excepturi consequatur molestiae earum consequuntur veritatis. Deleniti magni fugiat in commodi nulla dolorum delectus hic iusto? Facilis vitae neque eaque mollitia? Sed blanditiis rerum optio, repudiandae repellat rem corporis! Recusandae aliquam magni eligendi numquam, error, ducimus aliquid enim vel tenetur quod tempora ea? Expedita, dolorem iure! Nemo facere animi vel aperiam repellendus doloremque tempora provident, optio corporis veniam aut, at facilis molestiae. Ab voluptates optio consequuntur? Illum, assumenda. Hic necessitatibus maxime numquam eum voluptatem ratione delectus molestias eos voluptate explicabo, molestiae exercitationem sed corrupti dolore deleniti magnam accusantium sequi, doloremque dicta non omnis totam laboriosam. Molestias corrupti porro, pariatur expedita consequuntur accusantium quaerat incidunt eos. Ratione, dolorum ipsa. Optio suscipit soluta perferendis quis cupiditate sed iure iste unde tenetur ducimus delectus enim, mollitia eaque ratione fugit incidunt impedit eius alias fugiat accusamus deleniti fuga quod vel? Tempora sint temporibus et libero voluptas, quod similique. Officia iure excepturi culpa eligendi quam officiis cumque neque fugit suscipit voluptatum commodi, impedit dicta explicabo maiores aut natus libero sint eveniet perspiciatis. Voluptatibus velit provident eligendi ducimus eius, ut incidunt necessitatibus saepe accusantium ipsam fugiat in cupiditate nam sapiente optio perferendis eaque. Praesentium iste numquam eum.</em></p>\r\n', 1, 3, '2021-09-25 14:30:25', NULL, '2021-09-25 14:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `news_type`
--

CREATE TABLE `news_type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_type`
--

INSERT INTO `news_type` (`id`, `type`) VALUES
(1, 'funkcijos'),
(2, 'moduliai'),
(3, 'atnaujinimai'),
(4, 'naujienos');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_type`
--
ALTER TABLE `news_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news_type`
--
ALTER TABLE `news_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
