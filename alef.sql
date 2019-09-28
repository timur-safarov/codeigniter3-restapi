-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2019 at 06:15 AM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.3.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alef`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `id_lib` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `id_lib`, `name`) VALUES
(1, 2, 'жУЛЬВЕРН'),
(3, 2, 'вАЙНЕР');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `id_user`, `name`) VALUES
(1, 1, 'бИБЛИОТЕКА #1'),
(2, 1, 'бИБЛИОТЕКА #2');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `uri`, `method`, `params`, `api_key`, `ip_address`, `time`, `rtime`, `authorized`, `response_code`) VALUES
(1, 'api/restBooks', 'get', 'a:9:{s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:13:"Cache-Control";s:9:"max-age=0";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569635337, 1569640000, '0', 403),
(2, 'api/restBooks', 'get', 'a:9:{s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:13:"Cache-Control";s:9:"max-age=0";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569635505, 1569640000, '0', 403),
(3, 'api/restBooks', 'get', 'a:9:{s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:13:"Cache-Control";s:9:"max-age=0";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569635507, 1569640000, '0', 403),
(4, 'api/restBooks', 'get', 'a:10:{s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:6:"Pragma";s:8:"no-cache";s:13:"Cache-Control";s:8:"no-cache";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569635510, 1569640000, '0', 403),
(5, 'api/restBooks', 'get', 'a:10:{s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:6:"Pragma";s:8:"no-cache";s:13:"Cache-Control";s:8:"no-cache";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569635510, 1569640000, '0', 403),
(6, 'api/restBooks', 'get', 'a:10:{s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:6:"Pragma";s:8:"no-cache";s:13:"Cache-Control";s:8:"no-cache";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569635510, 1569640000, '0', 403),
(7, 'api/restBooks', 'get', 'a:9:{s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:13:"Cache-Control";s:9:"max-age=0";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569635530, 1569640000, '0', 403),
(8, 'api/restBooks', 'get', 'a:9:{s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:13:"Cache-Control";s:9:"max-age=0";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569635650, 1569640000, '0', 0),
(9, 'api/restBooks', 'get', 'a:9:{s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:13:"Cache-Control";s:9:"max-age=0";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569635940, 1569640000, '0', 403),
(10, 'api/restBooks', 'get', 'a:9:{s:9:"X-API-KEY";s:15:"sdgdsfgdsgdgfdg";s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569636371, 1569640000, '0', 403),
(11, 'api/restBooks/X-API-KEY/sdgdsfgdsgdgfdg', 'get', 'a:9:{s:15:"sdgdsfgdsgdgfdg";N;s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569636382, 1569640000, '0', 403),
(12, 'api/restBooks/X-API-KEY/sdgdsfgdsgdgfdg', 'get', 'a:9:{s:15:"sdgdsfgdsgdgfdg";N;s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569636385, 1569640000, '0', 403),
(13, 'api/restBooks', 'get', 'a:8:{s:4:"Host";s:10:"alef.local";s:10:"Connection";s:10:"keep-alive";s:25:"Upgrade-Insecure-Requests";s:1:"1";s:10:"User-Agent";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36";s:6:"Accept";s:118:"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";s:15:"Accept-Encoding";s:13:"gzip, deflate";s:15:"Accept-Language";s:35:"en-US,en;q=0.9,ru-RU;q=0.8,ru;q=0.7";s:6:"Cookie";s:177:"top100_id=t1.6483955.278549397.1568991699185; last_visit=1568977299189::1568991699189; _ym_uid=1568991699202594915; _ym_d=1568991699; ci_session=nf7igfs0e8b9s80e5cuj86vnmpiabto7";}', '', '127.0.0.1', 1569636390, 1569640000, '0', 403);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(8) NOT NULL,
  `password` varchar(8) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `email`) VALUES
(1, 'Djon', 'djon', '3123245', 'djon@gmail.com'),
(2, 'Edvard', 'edvard', 'gfvt45gh', 'edvard@gmail.com'),
(7, 'Kiril', 'kiril', 'egfdofdk', 'kiril@gmail.com'),
(9, 'Anna', 'anna', 'fdek5tg`', 'anna@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`,`id_lib`),
  ADD KEY `id_lib` (`id_lib`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id_lib`) REFERENCES `libraries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `libraries`
--
ALTER TABLE `libraries`
  ADD CONSTRAINT `libraries_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
