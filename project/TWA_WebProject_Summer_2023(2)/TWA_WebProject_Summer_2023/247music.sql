-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2024 at 12:20 PM
-- Server version: 8.0.35
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `247music`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int NOT NULL,
  `album_name` varchar(200) NOT NULL,
  `album_date` year DEFAULT NULL,
  `thumbnail` varchar(200) DEFAULT NULL,
  `artist_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_name`, `album_date`, `thumbnail`, `artist_id`) VALUES
(1, 'East', '1980', 'ALB-THMB-East.jpg', 1),
(2, 'Killers', '1981', 'ALB-THMB-Killers.jpg', 3),
(3, 'Bird Noises', '1980', 'ALB-THMB-BirdNoises.jpg', 2),
(4, 'Kiss Me Once', '2014', 'ALB-THMB-KissMeOnce.jpg', 4),
(5, 'Circus Animals', '1982', 'ALB-THMB-CircusAnimals.jpg', 1),
(6, 'Breakfast At Sweethearts', '1979', 'ALB-THMB-BreakfastAtSweethearts.jpg', 1),
(7, 'Breakfast in America', '1979', 'ALB-THMB-BreakfastInAmerica.jpg', 5),
(8, 'Kick', '1987', 'ALB-THMB-Kick.jpg', 6),
(9, 'El Camino', '2011', 'ALB-THMB-ElCamino.jpg', 7),
(10, 'Night Visions', '2012', 'ALB-THMB-NightVisions.jpg', 8),
(11, 'Switch', '2005', 'ALB-THMB-Switch.jpg', 6),
(12, '﻿Diesel And Dust', '1987', 'ALB-THMB-DieselAndDust.jpg', 2),
(13, 'AM', '2013', 'ALB-THMB-AM.jpg', 10),
(14, 'Metallica Through The Never', '2013', 'ALB-THMB-Never.jpg', 9),
(15, 'Evolve', '2017', 'ALB-THMB-Evolve.jpg', 8),
(16, 'Monkey Business', '2005', 'ALB-THMB-MonkeyBusiness.jpg', 11),
(17, 'Smoke + Mirrors', '2015', 'ALB-THMB-SmokeMirrors.jpg', 8),
(18, 'Armistice Day: Live At The Domain, Sydney', '2018', 'ALB-THMB-ArmisticeDayLive.jpg', 2),
(19, 'Essential Oils', '2012', 'ALB-THMB-EssentialOils.jpg', 2),
(20, 'Origins', '2018', 'ALB-THMB-Origins.jpg', 8),
(21, 'Black Fingernails, Red Wine', '2006', 'ALB-THMB-BlackFingernails.jpg', 12),
(22, 'Hardwired…To Self-Destruct', '2016', 'ALB-THMB-Hardwired.jpg', 9),
(23, 'Reload', '1997', 'ALB-THMB-Reload.jpg', 9),
(24, 'Shabooh Shoobah', '1982', 'ALB-THMB-Shabooh.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int NOT NULL,
  `artist_name` varchar(200) NOT NULL,
  `thumbnail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `thumbnail`) VALUES
(1, 'Cold Chisel', 'ColdChisel.jpg'),
(2, 'Midnight Oil', 'MidnightOil.jpg'),
(3, 'Iron Maiden', 'IronMaiden.jpg'),
(4, 'Kylie Minogue', 'KylieMinogue.jpg'),
(5, 'Supertramp', 'Supertramp.jpg'),
(6, 'INXS', 'INXS.jpg'),
(7, 'The Black Keys', 'BlackKeys.jpg'),
(8, 'Imagine Dragons', 'ImagineDragons.jpg'),
(9, 'Metallica', 'Metallica.jpg'),
(10, 'Arctic Monkeys', 'ArcticMonkeys.jpg'),
(11, 'Black Eyed Peas', 'BlackEyedPeas.jpg'),
(12, 'Eskimo Joe', 'EskimoJoe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `memberplaylist`
--

CREATE TABLE `memberplaylist` (
  `playlist_id` int NOT NULL,
  `member_id` int NOT NULL,
  `playlist_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `memberplaylist`
--

INSERT INTO `memberplaylist` (`playlist_id`, `member_id`, `playlist_name`) VALUES
(1, 2, 'Liked'),
(2, 2, 'Chisel'),
(3, 6, 'Random'),
(4, 3, 'Liked'),
(5, 14, 'Metal');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `member_id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`member_id`, `username`, `surname`, `firstname`, `password`, `category`) VALUES
(1, 'alan@me.com', 'Quay', 'Alan', 'f17a5f6f1e85ea1e9750b1a8bd68ddada9598a31afeb30f2bb29204490ad5abc', 'Free'),
(2, 'paige@turner.com', 'Turner', 'Paige', 'd9428251ca48d3d97637fa50ceb42d7f1072d0cda92cd2b501b6ee7840bc692c', 'Premium'),
(3, 'justin@hotmail.com', 'Zaster', 'Dee', 'c0c94a6dce0ac565c268d2b559580d3099fdd4055f41a5723bc922e788e5e56b', 'Family');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int NOT NULL,
  `playlist_id` int NOT NULL,
  `track_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `playlist_id`, `track_id`) VALUES
(1, 1, 1),
(2, 1, 10),
(3, 1, 20),
(4, 1, 30),
(5, 1, 35),
(6, 1, 36),
(7, 1, 87),
(8, 1, 21),
(9, 1, 54),
(10, 1, 78),
(11, 2, 3),
(12, 2, 4),
(13, 2, 5),
(14, 2, 6),
(15, 2, 7),
(16, 2, 8),
(17, 2, 41),
(18, 2, 46),
(19, 2, 49),
(20, 2, 50),
(21, 2, 53),
(22, 2, 43),
(23, 2, 44),
(24, 3, 79),
(25, 3, 80),
(26, 3, 81),
(27, 3, 82),
(28, 3, 83),
(29, 3, 57),
(30, 3, 58),
(31, 3, 59),
(32, 3, 60),
(33, 3, 61),
(34, 3, 8),
(35, 3, 9),
(36, 3, 10),
(37, 3, 11),
(38, 3, 12),
(39, 3, 13),
(40, 3, 14),
(41, 3, 15),
(42, 3, 16),
(43, 3, 1),
(44, 4, 18),
(45, 4, 34),
(46, 4, 42),
(47, 5, 18),
(48, 5, 22),
(49, 5, 12),
(50, 5, 186);

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `track_id` int NOT NULL,
  `track_title` varchar(200) NOT NULL,
  `artist_id` int NOT NULL,
  `track_length` varchar(6) DEFAULT NULL,
  `spotify_track` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `album_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`track_id`, `track_title`, `artist_id`, `track_length`, `spotify_track`, `album_id`) VALUES
(1, 'Standing on the Outside', 1, '2:53', '7G5eBJbcCGu6XMBcjRvqK9', 1),
(2, 'Never Before', 1, '4:08', '4XR7S3AfmcO4Y7rCkK34hT', 1),
(3, 'Choirgirl', 1, '3:13', '7hGneIA9WUVndTqf1klrdU', 1),
(4, 'Rising Sun', 1, '3:27', '6RUHZGHb1dLmNn4qGceSAH', 1),
(5, 'My Baby', 1, '4:02', '5rggyTXQCWMeAib7JkPEYS', 1),
(6, 'Tomorrow', 1, '3:35', '06TDPajRIOGlIgBANdwesk', 1),
(7, 'Cheap Wine', 1, '3:25', '3EkEomllpfXPPIGVFvZcEq', 1),
(8, 'Best Kept Lies', 1, '3:47', '5oSiiw244FDl8gKKgbt9mk', 1),
(9, 'Ita', 1, '3:33', '5polLaP7tpqUGaUOo3mb6q', 1),
(10, 'Star Hotel', 1, '4:09', '0LrVriRx1MQYBPcOPoBfVO', 1),
(11, 'Four Walls', 1, '2:23', '6O984dPcYFnGhnIGCBwlkf', 1),
(12, 'My Turn to Cry', 1, '3:19', '4xPB6YFrZ2Ujrta0t4K6O5', 1),
(13, 'No Time For Games', 2, '4:32', '1OJ3GW40q5pJ77EL0mPjpT', 3),
(14, 'Knife\'s Edge', 2, '3:33', '0yUPBaAIRdrmFU657Q9s7c', 3),
(15, 'Wedding Cake Island', 2, '3:11', '5g9F1F1NP2jnqJqPKP5N1A', 3),
(16, 'I\'m the Cure', 2, '3:49', '5rOwHAkpTT8diTB5UPO83d', 3),
(17, 'The Ides of March', 3, '1:45', '1bsko7BvWDVWiew5h468v7', 2),
(18, 'Wrathchild', 3, '2:55', '1SpuDZ7y1W4vaCzHeLvsf7', 2),
(19, 'Murders in the Rue Morgue', 3, '4:19', '71kapcyWLxdv7kQpM6jFTv', 2),
(20, 'Another Life', 3, '3:24', '4sv1NiU2MRlQCUyFKdbF3K', 2),
(21, 'Genghis Khan', 3, '3:08', '1UCZ9zeRaGYyZwF6cM3Brj', 2),
(22, 'Innocent Exile', 3, '3:53', '39uocZ5W2VV74lciqMR4lg', 2),
(23, 'Killers', 3, '5:02', '2Ydpa6xB4kD8WRXHYN6T1G', 2),
(24, 'Prodigal Son', 3, '6:13', '67jyLOxan1EkuAqMRgb3Uc', 2),
(25, 'Purgatory', 3, '3:21', '50W4g2UgayD7s3ixmEVQen', 2),
(26, 'Drifter', 3, '4:49', '6UdF7hJaqkv1lO8ocNf5Nv', 2),
(27, 'Into the Blue', 4, '4:09', '6StGvk4s7flUcgDTOJ6L6Z', 4),
(28, 'Million Miles', 4, '3:29', '2UPHpy3ns1lJVs23dUckgg', 4),
(29, 'I was Gonna Cancel', 4, '3:33', '0Y3x5oXUB9olJH6mE3Ctl0', 4),
(30, 'Sexy Love', 4, '3:32', '2bS8qFEEsbBht032fzVPZ5', 4),
(31, 'Feels So Good', 4, '3:38', '4ylhp2pwyUwL29GHGzA5ze', 4),
(32, 'If Only', 4, '3:22', '2f0gOeefV1u8JjvfhuhIyW', 4),
(33, 'Les Sex', 4, '3:48', '1vahFVy5WgAv2TadMpmFQL', 4),
(34, 'Kiss Me Once', 4, '3:18', '23T25uO7VwRzOmz9aTHBFl', 4),
(35, 'Beautiful', 4, '3:34', '0BJtJKpCeHcTjpbycR8CEN', 4),
(36, 'Fine', 4, '3:36', '4WgeGbhE2PF8vbca9SDbqA', 4),
(37, 'You Got Nothing I Want', 1, '3:18', '1i3lZqk7Zvl7qsZIpFoWhr', 5),
(38, 'Bow River', 1, '4:23', '0zYKkOvUgOL8gceY8Eh1Wh', 5),
(39, 'Forever Now', 1, '4:28', '4cZ7dRrEPJoyM0m8IF3iTr', 5),
(40, 'Taipan', 1, '3:55', '14jh12pEhxMQxiTDtVmmdC', 5),
(41, 'Houndog', 1, '5:05', '5WUHO6aeO2rXfc4vbxBUqO', 5),
(42, 'Wild Colonial Boy', 1, '4:52', '0zeF39l6So1hCBIbOpgchV', 5),
(43, 'No Good For You', 1, '3:16', '1U5tNrIwWc7IHeVyawYv58', 5),
(44, 'Numbers Fall', 1, '4:47', '5PruIX2eGAUfjsDD6wp4i5', 5),
(45, 'When the War is Over', 1, '4:26', '5Eqx81y2ETkPuZrQuYBiub', 5),
(46, 'Letter to Alan', 1, '5:45', '3t4kDzEU8iO2sLGMFh7tTj', 5),
(47, 'Conversations', 1, '4:35', '7jBCs3WyIwfXgGztwIAbFP', 6),
(48, 'Merry-Go-Round', 1, '3:44', '1IK6QCOv51tOaLz45VyOv7', 6),
(49, 'Dresden', 1, '3:59', '3SHwOGNblfssV9rmesSC0y', 6),
(50, 'Goodbye', 1, '2:51', '5ej8axgwRwWnlMuqas4YDL', 6),
(51, 'Plaza', 1, '2:09', '6NPtt9efvbG8Tf1Oup8L5v', 6),
(52, 'Shipping Steel', 1, '3:24', '1M6xGY4IBn6xBe1o2ZkNvJ', 6),
(53, 'I\'m Gonna Roll Ya', 1, '3:29', '6ZTgQpmCvJd3R4PuSaFGrb', 6),
(54, 'Showtime', 1, '3:45', '4S59BQQp4YPa09RPITzeRA', 6),
(55, 'Breakfast at Sweethearts', 1, '4:11', '1MstT5JdBaIR9K5IGccGps', 6),
(56, 'The Door', 1, '4:20', '4LEBRyWL7vwlyFjS8tqC4F', 6),
(57, 'Gone Hollywood', 5, '5:21', '3MUBckEZ9MePQkOeiYP9JW', 7),
(58, 'The Logical Song', 5, '4:11', '7dwwHfhF2FKhnKHF5QcRkn', 7),
(59, 'Goodbye Stranger', 5, '5:51', '2xpYzsEu012EWUalfk46Dr', 7),
(60, 'Breakfast in America', 5, '2:39', '4OeAOXT5DNRUJPO6phiA0d', 7),
(61, 'Oh Darling', 5, '4:02', '7sMsd9FPAO950l1lRg2dLf', 7),
(62, 'Take the Long Way Home', 5, '5:09', '5VnZeCSiH1Dq5kzuudlluZ', 7),
(63, 'Lord is it Mine', 5, '4:10', '1iq2EOVThbcGqSXYfH1OoA', 7),
(64, 'Just Another Nervous Wreck', 5, '4:26', '4IIpo5OLYyLZqHQTYaYzIK', 7),
(65, 'Casual Conversations', 5, '2:59', '6ocCv2agI3EA1GCG9qGOeR', 7),
(66, 'Child of Vision', 5, '7:31', '70OA31UNhLkTL0M8CXMwJi', 7),
(67, 'Guns in the Sky', 6, '2:22', '5sUmNduSaYbbgq3AHIRRYn', 8),
(68, 'New Sensation', 6, '3:40', '2xcrseImDFEf8Urommws03', 8),
(69, 'Devil Inside', 6, '5:14', '0sTnQus7pGewDC0UHSyRDS', 8),
(70, 'Need you tonight', 6, '3:01', '3h04eZTnmFLRMjZajbrp2R', 8),
(71, 'Mediate', 6, '2:36', '7CTzpL0xF96GENbC1QXy10', 8),
(72, 'The Loved One', 6, '3:36', '0viuJflpRQIo54IVCmgw1F', 8),
(73, 'Wildlife', 6, '3:10', '5iMHmkWnjLnb3YoWSUFZRh', 8),
(74, 'Never Tear us Apart', 6, '3:05', '1GjbTNFImFrjFsNdleDe78', 8),
(75, 'Mystify', 6, '3:18', '1teL5em5cNGwVS4l5f8wjg', 8),
(76, 'Kick', 6, '3:14', '2iHOrq2wH1r4w4SwcvKZWQ', 8),
(77, 'Calling all Nations', 6, '3:03', '0rLbdG1IzOVBtZpGngRtTt', 8),
(78, 'Tiny Daggers', 6, '3:33', '06valoVoMkdZfsrNsYngqE', 8),
(79, 'Lonely Boy', 7, '3:14', '5G1sTBGbZT5o4PNRc75RKI', 9),
(80, 'Dead and Gone', 7, '3:41', '3UD4sghkq8dHUwvKxln1nB', 9),
(81, 'Gold on the Ceiling', 7, '3:44', '5lN1EH25gdiqT1SFALMAq1', 9),
(82, 'Little Black Submarines', 7, '4:11', '1PXsUXSM3LF2XNSkmIldPb', 9),
(83, 'Money Maker', 7, '2:57', '1S8PKtVKvJWwOwfQpQxzWV', 9),
(84, 'Run Right Back', 7, '3:17', '5HgAZuHFAU5qLLMYuIQkgq', 9),
(85, 'Sister', 7, '3:25', '5LCuFER5mMzL0fGNpClksf', 9),
(86, 'Hell of a Season', 7, '3:45', '2ONpXycQzFmWiutUm7vpIC', 9),
(87, 'Stop Stop', 7, '3:30', '6DnfupwdspmFT2PYRjFH2F', 9),
(88, 'Nova Baby', 7, '3:27', '5S7kFUo496CoItemffWQb9', 9),
(89, 'Mind Eraser', 7, '3:15', '0hzBN7DGgtjBsTyZwTTKRS', 9),
(90, 'Radioactive', 8, '3:07', '62yJjFtgkhUrXktIoSjgP2', 10),
(91, 'Tiptoe', 8, '3:14', '7lBPn6LpIvbvAihTRvBMig', 10),
(92, 'It\'s Time', 8, '4:00', '7MXlTgQeo3IVlMpLnZuhxc', 10),
(93, 'Demons', 8, '2:58', '5qaEfEh1AtSdrdrByCP7qR', 10),
(94, 'On top of the World', 8, '3:12', '213x4gsFDm04hSqIUkg88w', 10),
(95, 'Amsterdam', 8, '4:01', '5gXdinVZqeuDIVxogWzRk0', 10),
(96, 'Hear Me', 8, '3:55', '2OgOgEBfiZEj2XlIY2XD7f', 10),
(97, 'Every Night', 8, '3:37', '5raubQ8TVZTJO1PFs2bpwq', 10),
(98, 'Bleeding Out', 8, '3:43', '1oQjPp1I7cwVE24JivbhzT', 10),
(99, 'Underdog', 8, '3:29', '25dAGIi1Psxz5kzlNelPLN', 10),
(100, 'Nothing Left to Say', 8, '8:57', '300tML2o8yHO4WrDtG2gxO', 10),
(101, 'Cha-Ching', 8, '4:09', '6AynCuiHTQuVMYN2re6jcS', 10),
(102, 'Working Man', 8, '3:53', '3fipHLkzOLcHciI86QgOAB', 10),
(103, 'Tokyo', 8, '3:16', '7mwIdlgXiFvwxwAjprW942', 10),
(104, 'Devil\'s Party', 6, '3:26', '1CRIW7isvHCE8IbCGGpy1A', 11),
(105, 'Pretty Vegas', 6, '3:25', '37oEm1l0NL6Ud2ccgsdgND', 11),
(106, 'Afterglow', 6, '4:08', '28ifPHns96vaSFxC47C57t', 11),
(107, 'Hot Girls', 6, '3:30', '6ENVvVtyWHEj8vnO2uTYeT', 11),
(108, 'Perfect Strangers', 6, '4:12', '0xAxitIIBkKibCEfGLZEwE', 11),
(109, 'Remember Who\'s Your Man', 6, '3:29', '2lXPto9E3OkzNr4vwfhu0L', 11),
(110, 'Hungry', 6, '4:47', '4M6AzwJAGdH44Xp9qBlzGP', 11),
(111, 'Never Let You Go', 6, '4:19', '3wxwFCYipCIowp4xV4bDZI', 11),
(112, 'Like It Or Not', 6, '3:45', '2EhCDKQE6ibWBZVdkyU5pe', 11),
(113, 'Us', 6, '4:08', '02x0cb4eZkricNQENuNpXp', 11),
(114, 'God\'s Top Ten', 6, '4:55', '6g8qbYA6vLwtgQHM0XsjuN', 11),
(115, 'Beds Are Burning', 2, '4:16', '1CtAzw53AIXKjAemxy4b1j', 12),
(116, 'Put Down That Weapon', 2, '4:38', '5tCDBfbBLlSYTWkmlRjEwr', 12),
(117, 'Dreamworld', 2, '3:36', '7FIQmW0BWqG64aeELJIbZD', 12),
(118, 'Arctic World', 2, '4:22', '29F2L64jY4PpYPWIBKVNKC', 12),
(119, 'Warakurna', 2, '4:38', '4d7hRQaSLw0WAp6a6K76MG', 12),
(120, 'The Dead Heart', 2, '5:11', '7nfGP5B3Pc508kEb6zL6r9', 12),
(121, 'Whoah', 2, '3:51', '4XS9OIH9Dq8mX7SwKUoFAL', 12),
(122, 'Bullroarer', 2, '4:59', '3gjeNlY6MLmpWXcyGN7IUJ', 12),
(123, 'Sell My Soul', 2, '3:37', '4FYdqiWHqCJRmd1idSDYig', 12),
(124, 'Sometimes', 2, '3:51', '66SKu0Q6jbw3GdgWPllM42', 12),
(125, 'Gunbarrel Highway', 2, '3:40', '2uuWDRxlCvjQ33gTkd5opK', 12),
(126, 'Do I Wanna Know?', 10, '4:32', '3rq5w4bQGigXOfdN30ATJt', 13),
(127, 'R U Mine?', 10, '3:22', '29tzJGvqJPTAFs6LXmsHoA', 13),
(128, 'One For the Road', 10, '3:26', '0OTvJXmQPv7SKavoV6td75', 13),
(129, 'Arabella', 10, '3:27', '4FSm0Ca6Hzd7Vx7TpSfcSy', 13),
(130, 'I Want It All', 10, '3:05', '15ssS4mEVrTkQyZ7evJUQD', 13),
(131, 'No. 1 Party Anthem', 10, '4:03', '6xOGRfEr41CdiSc3ifLels', 13),
(132, 'Mad Sounds', 10, '3:35', '05eWvAS5Cxy4sHjlIDofyB', 13),
(133, 'Fireside', 10, '3:01', '2qH2scqyN6z1OB8dK0Y95y', 13),
(134, 'Why\'d You Only Call Me When You\'re High?', 10, '2:41', '48q0vSHcJdhK3IiXH8C5WJ', 13),
(135, 'Snap Out of It', 10, '3:13', '7DVNEcKN7bE50N6xQ74mh2', 13),
(136, 'Knee Socks', 10, '4:18', '56fZFRtOSMIMyVh0ZIF0AT', 13),
(137, 'I Wanna Be Yours', 10, '3:04', '7a8GawTVgHZvBLQOh46he7', 13),
(138, 'The Ecstasy Of Gold', 9, '2:01', '6Cg2DwlVvb4xxrSEE35k37', 14),
(139, 'Creeping Death', 9, '6:19', '17q0rhj83YTz9KQY3d9cgw', 14),
(140, 'For Whom The Bell Tolls', 9, '4:40', '0bp3MablDhBWiBZbIcp3AY', 14),
(141, 'Fuel', 9, '3:57', '0msDFRusep31oGvYA4WOal', 14),
(142, 'Ride The Lightning', 9, '6:54', '4jxrkR3VtHzjH1RVdvvRn2', 14),
(143, 'One', 9, '8:25', '4clhhu8D8h2Flcrj48dZ8H', 14),
(144, 'The Memory Remains', 9, '5:43', '0a6H4khB7nEbTH91L0Tpdk', 14),
(145, 'Wherever I May Roam', 9, '6:18', '3k4fUKBy9D5OXQtfaX1fms', 14),
(146, 'Cyanide', 9, '7:01', '4hy9NhrFfpIXGUzD9XxXDd', 14),
(147, 'And Justice For All', 9, '9:18', '54VZWrJKwSbOqrnAA50JCm', 14),
(148, 'Master Of Puppets', 9, '8:25', '6C2Pz56gT0JzsqR84dDv91', 14),
(149, 'Battery', 9, '5:14', '0kBGwUKT6tsNH1kWFOHSuL', 14),
(150, 'Nothing Else Matters', 9, '7:22', '7AvGSilZhdhf8VC18Wecrd', 14),
(151, 'Enter Sandman', 9, '6:22', '4yiY6Yn3tAS65clsUBoxf9', 14),
(152, 'Hit The Lights', 9, '4:40', '6kxWS2BZneKHOfP5ZZJBEv', 14),
(153, 'Orion', 9, '8:27', '00cxd8JLO6JKUei70H4BY4', 14),
(154, 'Next To Me', 8, '3:50', '31VOknKjFrEX47bZXzqcoF', 15),
(155, 'I Don\'t Know Why', 8, '3:10', '28heol5hhOGj6KYbJrRteJ', 15),
(156, 'Whatever It Takes', 8, '3:21', '6Qn5zhYkTa37e91HC1D7lb', 15),
(157, 'Believer', 8, '3:24', '0pqnGHJpmpxLKifKRmU6WP', 15),
(158, 'Walking The Wire', 8, '3:53', '1y3bE5i57eUm3hfLAc7h08', 15),
(159, 'Rise Up', 8, '3:52', '3zT2616WcD9Df5m21OsCX0', 15),
(160, 'I\'ll Make It Up To You', 8, '4:23', '0FfX0nofboxZjP0diT1eFv', 15),
(161, 'Yesterday', 8, '3:25', '2SJf7W18D1AEpr8L9ATu0c', 15),
(162, 'Mouth Of The River', 8, '3:42', '1dekgAFF9uTCqLsklDaCWb', 15),
(163, 'Thunder', 8, '3:07', '1zB4vmk8tFRmM9UULNzbLB', 15),
(164, 'Start Over', 8, '3:06', '2Iug43iQrHN8CbGsUd2tEt', 15),
(165, 'Dancing In The Dark', 8, '3:54', '3adVVrcE2KS26OL4rYd27O', 15),
(166, 'Pump It', 11, '3:33', '2ygMBIctKIAfbEBcT9065L', 16),
(167, 'Don\'t Phunk With My Heart', 11, '4:00', '5MzjQ95rdB2xt9DNa2IzaC', 16),
(168, 'My Style', 11, '4:28', '4X76j1maXUPutHtrb9cGnL', 16),
(169, 'Don\'t Lie', 11, '3:39', '6tp27J7xy18DQiQXut3GsF', 16),
(170, 'My Humps', 11, '5:27', '20jYtEun4dUdYZ9foaOC48', 16),
(171, 'Like That', 11, '4:35', '5DjWWVI3WsxMIvDbr6TSLR', 16),
(172, 'Dum Diddly', 11, '4:19', '5WYt8YhgFh1siHIqepXBzf', 16),
(173, 'Feel It', 11, '4:19', '4ON5EZhGxABE5nSS1rRlrW', 16),
(174, 'Gone Going', 11, '3:14', '7oJtjEkcsXLGcuXaZ8o2VJ', 16),
(175, 'They Don\'t Want Music', 11, '6:47', '4d1bLoK77pR9N6giV6spVB', 16),
(176, 'Disco Club', 11, '3:48', '0strppwZuDLG9FOYmwPOEJ', 16),
(177, 'Bebot', 11, '3:30', '4nZwaKTdxczLpUHfLVAozA', 16),
(178, 'Ba Bump', 11, '3:57', '1fNCSnjMRwmUQRrapbUFg4', 16),
(179, 'Do What You Want', 11, '4:03', '2L0pXYkYkv7kWzkHFG47Oz', 16),
(180, 'Shots', 8, '3:52', '2h6HdN3oPr4JijIQV29hv1', 17),
(181, 'Gold', 8, '3:37', '4IMMdhs18OjvvhDok5mJxW', 17),
(182, 'Smoke and Mirrors', 8, '4:21', '6Aiu4fCAEzvXpjmy1HsJxM', 17),
(183, 'I\'m So Sorry', 8, '3:50', '0GCXZmk0Uf74BdgWl0GaX2', 17),
(184, 'I Bet My life', 8, '3:13', '0h9SUGpAofhus8HUgNXVwW', 17),
(185, 'Polaroid', 8, '3:50', '2Mi65Ygq54y5O4vSxBNWkV', 17),
(186, 'Friction', 8, '3:22', '37ebs6hDGOWK8SDAB2kZG5', 17),
(187, 'It Comes Back To You', 8, '3:37', '1iQbbaCHErMsmP6eUQyVvf', 17),
(188, 'Dream', 8, '4:18', '0Wnzdtso3gHPcSFZwT2Pi9', 17),
(189, 'Trouble', 8, '3:11', '7HfILFCt8XErcfd25feE6A', 17),
(190, 'Summer', 8, '3:38', '1AZY4tKB3obBrQHVz0feOf', 17),
(191, 'Hopeless Opus', 8, '3:59', '6LNRspXRgIXWVpjVXpnLBm', 17),
(192, 'The Fall', 8, '6:02', '6PZ2TaWkJBwlD1QxenOtpq', 17),
(193, 'Thief', 8, '3:47', '4iHCodolxdaRL2rTvZNGwS', 17),
(194, 'The Unknown', 8, '3:25', '27zRTKEWiXOlDG91Q6F2Oo', 17),
(195, 'Second Chances', 8, '3:38', '4MwJiGr3drOvyYvbjgXPCW', 17),
(196, 'Release', 8, '2:28', '5EHNEWKaB4DMMOOWsZxP7W', 17),
(197, 'Warriors', 8, '2:50', '6Q2JimwoGgG5W9HdmH1hmq', 17),
(198, 'Battle Cry', 8, '4:33', '6SCDzH7OCgpzwCP8yo7HIP', 17),
(199, 'Monster', 8, '4:11', '4uyDe8SeM0Nsgzp9KMtXWn', 17),
(200, 'Who We Are', 8, '4:09', '1YvKsn3ID4XvpwSSiqu1Jc', 17),
(201, 'Shots - Broiler Remix', 8, '3:12', '1ASo7euq1w4KHaz9tq6jkt', 17),
(202, 'Armistice Day - Live', 2, '5:01', '5FEMcADC3BuuOYzeay6uGp', 18),
(203, 'Read About It - Live', 2, '3:59', '4wVL5Inh5SC5XFEkFFhIth', 18),
(204, 'Hercules - Live', 2, '4:28', '2hXI8KzzqvPRW2ioFnPR5u', 18),
(205, 'Section Five (Bus to Bondi) - Live', 2, '3:12', '47TlAIKHfEByvF20CQF8KJ', 18),
(206, 'Treaty - Live', 2, '3:19', '6XbjW4h2IzADUOv5ithas0', 18),
(207, 'Beds Are Burning - Live', 2, '5:13', '68xFLGU90E7A8hWeVAWB5Z', 18),
(208, 'Ships of Freedom', 2, '3:30', '01uMjs6mUpHhTvT8satm5t', 18),
(209, 'Warakurna - Live', 2, '4:51', '2ogw2jpZaycXeIuTTwIsC1', 18),
(210, 'US Forces - Live', 2, '4:30', '6jnlMMzi9TwfISOw8fFJS6', 18),
(211, 'Blue Sky Mine - Live', 2, '4:16', '1GCe4rvmaOyIAXeKgkRL2u', 18),
(212, 'Stand In Line - Live', 2, '5:56', '09K2MQD9ozV98ovZk4hEPz', 18),
(213, 'Power and the Passion - Live', 2, '6:59', '2FqoPNFoylTGdD8jbsDd2D', 18),
(214, 'Fogotten Years - Live', 2, '4:39', '4NUDb1IBtgKtNHaen1amy1', 18),
(215, 'Don\'t Wanna Be the One - Live', 2, '3:00', '3j2BA8PGvgFD6fO1kI3Hbe', 18),
(216, 'Put Down That Weapon - Live', 2, '4:27', '0LHzGgUhbqMVdqoRAp2T8L', 18),
(217, 'Only The Strong - Live', 2, '4:48', '6E3AMYt8OJl21Ie07w5vds', 18),
(218, 'The Dead Heart - Live', 2, '7:52', '0eQsAIcESSA5i2bLf6K9cd', 18),
(219, 'Short Memory - Live', 2, '5:52', '0bZOaigCORyYcYdTwyNg8l', 18),
(220, 'Dreamworld - Live', 2, '4:03', '52XCxg9IwiFfw2U4adLaly', 18),
(221, 'Sometimes - Live', 2, '5:01', '6iBT7DNbaWk4s16RkJJc6n', 18),
(222, 'Run By Night', 2, '3:56', '4J9lz3ZYYrYlscHmyPeDz4', 19),
(223, 'Cold Cold Change', 2, '3:30', '7A24kBkUeVMYSed4FY8IQX', 19),
(224, 'Wedding Cake Island', 2, '3:12', '4Ls7CJAOmgebZRBQ8vKoYl', 19),
(225, 'No Time For Games', 2, '4:33', '77smrLzHIscpKxwU11m7Hs', 19),
(226, 'Don\'t Wanna Be the One', 2, '3:05', '7G59kyPk4OQQdNU5nxD2g1', 19),
(227, 'Armistice Day', 2, '4:30', '1egwsaQwNmXUX4yAPxJswl', 19),
(228, 'Only The Strong', 2, '4:35', '69ZZoNtLb1qBt9TCUhYAYk', 19),
(229, 'Short Memory', 2, '3:52', '2blW9gA8rUVsCYuepOJByI', 19),
(230, 'Read About It', 2, '3:52', '2YSYE2xK7oMuli7hCPgerg', 19),
(231, 'US Forces', 2, '4:06', '6TTsEXKUG5y9n4fi6Wlt3q', 19),
(232, 'Power and the Passion', 2, '5:39', '0iYFbSHCZUHD5tsOoiBiQo', 19),
(233, 'When the Generals Talk', 2, '3:33', '0Ljgv5astR0zbiaJytcXOa', 19),
(234, 'Best of Both Worlds', 2, '4:04', '3GKpN8UYgvUIhz0odgWASc', 19),
(235, 'Kosciusko', 2, '4:41', '0bS8xXUFf2TIFzPOfCjFai', 19),
(236, 'Progress', 2, '3:54', '5hFUaPka8zNQB4kbkUtEuk', 19),
(237, 'Hercules', 2, '4:29', '1ZbhQokKg5H6OvjLsb10u2', 19),
(238, 'Beds Are Burning', 2, '4:15', '33fp2NopvrTQ9vyB1zKxHA', 19),
(239, 'Put Down That Weapon', 2, '4:38', '6D0Xak77OlPF8VGkacXRLS', 19),
(240, 'Dreamworld', 2, '3:37', '7qalHPx4ohu9KDwRcHII5P', 19),
(241, 'Warakurna', 2, '4:38', '02brGrD9MHpWqaGJkqvR0G', 19),
(242, 'Natural', 8, '3:09', '2FY7b99s15jUprqC0M5NCT', 20),
(243, 'Boomerang', 8, '3:08', '2B1fuWoWaYnCXbjYp1gXg5', 20),
(244, 'Machine', 8, '3:02', '4uGY9CqDtGtaTTLg1cgsWD', 20),
(245, 'Cool Out', 8, '3:38', '6LXMUR2rpxFBDo6nilS3yX', 20),
(246, 'Bad Liar', 8, '4:21', '2RSHsoi04658QL5xgQVov3', 20),
(247, 'West Coast', 8, '3:37', '2nkoWsTZa8LKPNGdjI5uxj', 20),
(248, 'Zero', 8, '3:31', '2bzitsPcImYC6DZWvvLCQi', 20),
(249, 'Bullet In A Gun', 8, '3:25', '3R4Xk37WTagjzODMNEQLvs', 20),
(250, 'Digital', 8, '3:21', '4qhDA6s0MkD5XpDqGLHIEY', 20),
(251, 'Only', 8, '3:01', '1uRBbjQ3uNFXCncWyNomHf', 20),
(252, 'Stuck', 8, '3:11', '5Z9SQPYU95S6M1vcbLsDt2', 20),
(253, 'Love', 8, '2:46', '5d41vXH0zvpwUrHrmqKqDc', 20),
(254, 'Birds', 8, '3:39', '6Tvzf3VEi16JMhAgOwdt2y', 20),
(255, 'Burn Out', 8, '4:34', '5Q7zuH8VNu7aLappSusPu6', 20),
(256, 'Real Life', 8, '4:08', '7JAzAyjbJFPznEFdqpa1Si', 20),
(257, 'Comfort You', 12, '3:20', '5oiygKBDfX9cLEx1TwqfDG', 21),
(258, 'New York', 12, '3:54', '4dWiIovDWvpcM4JNComGtz', 21),
(259, 'Black Fingernails, Red Wine', 12, '4:10', '0ujklxrVM2jwpLMgbTwTd1', 21),
(260, 'Sarah', 12, '3:29', '53haw5BnbMjfQ7zLXK8OSN', 21),
(261, 'Setting Sun', 12, '3:52', '2oL86mXFMASp2XNrV2oUKc', 21),
(262, 'Hardwired', 9, '3:09', '10qHfyQqzsbBDwob8nk8Ol', 22),
(263, 'Atlas, Rise!', 9, '6:29', '6fjer7Ed6ZUna1EMbwbDrN', 22),
(264, 'Now That We\'re Dead', 9, '6:59', '2NBvvx52QAjipBnXvAekfs', 22),
(265, 'Moth Into Flame', 9, '5:51', '3JjZq20Kv6UphyyirAaY9A', 22),
(266, 'Dream No More', 9, '6:30', '1dzmb0UZZatm5VCD8fI8UF', 22),
(267, 'Halo On Fire', 9, '8:15', '0dcFoXAFWxx7oSIIq2mtkW', 22),
(268, 'Fuel', 9, '4:30', '6FUwPb4mGlUDbx42uspXaZ', 23),
(269, 'The Memory Remains', 9, '4:39', '6RbC38oDCIXD8V2AOU1Tjr', 23),
(270, 'Devil\'s Dance', 9, '5:19', '3IHyDrQOASm7R0WBamMJO8', 23),
(271, 'The Unforgiven II', 9, '6:36', '6nswV1Lz3OZkaiCJfmVUOa', 23),
(272, 'Better than You', 9, '5:22', '6FAHGDSq8RDfHXIk3DSZdb', 23),
(273, 'Slither', 9, '5:13', '1R29PfqelwVMRPhg5fn0lD', 23),
(274, 'Carpe Diem Baby', 9, '6:12', '4Cqn0tBcozdKfdengvZJv4', 23),
(275, 'Bad Seed', 9, '4:05', '0cKWKhciVCYNyxFVnV1Y4R', 23),
(276, 'Where the Wild Things Are', 9, '6:53', '2bvG8hQhJDe68NEBM8XjXc', 23),
(277, 'Fixxxer', 9, '8:15', '5jE2hljNVTJZeodUXQu9Ea', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `memberplaylist`
--
ALTER TABLE `memberplaylist`
  ADD PRIMARY KEY (`playlist_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`track_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `memberplaylist`
--
ALTER TABLE `memberplaylist`
  MODIFY `playlist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8922;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `member_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48345;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `track_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
