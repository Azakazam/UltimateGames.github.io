-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2015 at 02:37 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1451397`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `game_ID` int(10) unsigned NOT NULL,
  `name` varchar(40) NOT NULL,
  `image` varchar(80) NOT NULL,
  `year` int(4) NOT NULL,
  `ageRating` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_ID`, `name`, `image`, `year`, `ageRating`) VALUES
(1, 'megaman 3', 'images/megaman5.jpg', 2002, 3),
(2, 'sonic colours', 'images/soniccolors.png', 2012, 3),
(3, 'little big planet', 'images/littlebplanet.jpg', 2011, 7),
(4, 'gears of war 2', 'images/gears.jpg', 2012, 18),
(5, 'total drama world tour', 'images/totaldrama.jpg', 2009, 3),
(6, 'pokemon omega', 'images/omega.png', 2014, 7),
(7, 'Doubutsu no Mori', 'images/jap.png', 2012, 3),
(8, 'little king''s story', 'images/king.jpg', 2009, 3);

-- --------------------------------------------------------

--
-- Table structure for table `game_genre`
--

CREATE TABLE IF NOT EXISTS `game_genre` (
  `genre_ID` int(11) NOT NULL,
  `game_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_genre`
--

INSERT INTO `game_genre` (`genre_ID`, `game_ID`) VALUES
(1, 2),
(2, 1),
(2, 8),
(3, 4),
(4, 3),
(4, 6),
(4, 7),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `game_platform`
--

CREATE TABLE IF NOT EXISTS `game_platform` (
  `platform_ID` int(11) NOT NULL,
  `game_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_platform`
--

INSERT INTO `game_platform` (`platform_ID`, `game_ID`) VALUES
(1, 1),
(2, 3),
(2, 5),
(3, 4),
(4, 6),
(4, 7),
(5, 2),
(5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `genre_ID` int(10) unsigned NOT NULL,
  `genreName` varchar(30) NOT NULL,
  `genreDescription` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_ID`, `genreName`, `genreDescription`) VALUES
(1, 'arcade', 'requires players to use quick reflexes, accuracy, and timing to overcome obstacles. Arcade games often have short levels, simple and intuitive control schemes, and rapidly increasing difficulty.'),
(2, 'action-adventure', 'Action-adventure games tend to focus on exploration and usually involve item gathering, simple puzzle solving, and combat.'),
(3, 'shooter', 'A shooter game focuses primarily on combat involving projectile weapons, such as guns and missiles. They can also be divided into 2D, first-person and third-person shooters.'),
(4, 'RPG', 'Players control a central game character, or multiple game characters, usually called a party, and attain victory by completing a series of quests or reaching the conclusion of a central storyline. Players explore a game world, while solving puzzles and engaging in tactical combat. A key feature of the genre is that characters grow in power and abilities, and characters are typically designed by the player.'),
(5, 'sports', 'Sports are games that play competitively one team containing or controlled by you, and another team that opposes you.');

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE IF NOT EXISTS `platform` (
  `platform_ID` int(10) unsigned NOT NULL,
  `platformName` varchar(15) NOT NULL,
  `platformDescription` text NOT NULL,
  `platformImage` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`platform_ID`, `platformName`, `platformDescription`, `platformImage`) VALUES
(1, 'gameboy', 'Packing a huge amount of power into a tiny package, this little console proved a revolution in videogaming when it launched in Japan in 1989. Since then, this pocket-sized system has sold over 100 million units', 'images/gameboyplat.png'),
(2, 'ps3', 'First arriving in 2006, the PlayStation 3 has gone from strength to strength and firmly established itself as a favourite amongst gamers the world over!', 'images/ps3.png'),
(3, 'xbox 360', 'Xbox 360 brings you a total games and entertainment experience. The largest library of games, including titles that get you right into the thick of it with Kinect. Plus, your whole family can watch HD movies, TV shows, live events, music, sports and more across all your devices.', 'images/xbox360.jpg'),
(4, '3DS', 'Nintendo 3DS is your handheld portal to a world of amazing games and features, allowing you to connect with friends and the global Nintendo community with sharing options like never before. Take your handheld gaming experience to another dimension with Nintendo 3DS', 'images/3ds.png'),
(5, 'wii', 'The Nintendo Wii Console comes with a motion sensitive remote which translates your movements directly onto the on screen activity. it offers big fun at a mini price. It comes packed with a red Wii Remote Plus controller and nunchuk accessory, Plug it in and play!', 'images/wii.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_ID`);

--
-- Indexes for table `game_genre`
--
ALTER TABLE `game_genre`
  ADD PRIMARY KEY (`genre_ID`,`game_ID`);

--
-- Indexes for table `game_platform`
--
ALTER TABLE `game_platform`
  ADD PRIMARY KEY (`platform_ID`,`game_ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_ID`);

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`platform_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `game_platform`
--
ALTER TABLE `game_platform`
  MODIFY `platform_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `platform`
--
ALTER TABLE `platform`
  MODIFY `platform_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
