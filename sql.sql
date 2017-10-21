
CREATE TABLE app_users (
  ID bigint(20) NOT NULL AUTO_INCREMENT,
  company_ID bigint(20) NOT NULL,
  admin_ID bigint(20) NOT NULL,
  username varchar(100) NOT NULL,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  password varchar(500) NOT NULL,
  salt varchar(500) NOT NULL,
  email varchar(200) NOT NULL,
  phone varchar(30) NOT NULL,
  country_ID int(11) NOT NULL,
  gender varchar(1) NOT NULL,
  last_access varchar(20) NOT NULL,
  last_login varchar(20) NOT NULL,
  account_session int(1) NOT NULL DEFAULT '0',
  profile varchar(222) NOT NULL,
  temp bigint(20) NOT NULL,
  groups varchar(25) NOT NULL,
  date_insert varchar(45) NOT NULL,
  recovery_string text NOT NULL,
  default_password varchar(11) NOT NULL,
  state varchar(100) NOT NULL,
  PRIMARY KEY     (id)
);



INSERT INTO app_users (ID, company_ID, admin_ID, username, firstname, lastname, password, salt, email, phone, country_ID, gender, last_access, last_login, account_session, profile, temp, groups, date_insert, recovery_string, default_password, state) VALUES
(1, 6, 0, 'general', 'Abraham', 'Imanzi', '28bfcd67e52d5a8ec43d5cce8d0c41475956584b2f4def00ced7afc2b9b718b5', 'ÔÔœøvúP–ûºòe;NÞØ9èÞYuè\Z9)TYØê˜', 'abraham@kadibra.com', '0787283185', 171, '', '1507907053', '', 0, '', 0, 'Admin', '1474462895', 'A6BE94456648251D85AA1D6513BE6EB5B4D4A8FAD82AF847E498CC40F40FC1C5', '', 'Activated'),
(2, 6, 51, 'icestone', 'Ice Stone', 'Admin', '28bfcd67e52d5a8ec43d5cce8d0c41475956584b2f4def00ced7afc2b9b718b5', 'ÔÔœøvúP–ûºòe;NÞØ9èÞYuè\Z9)TYØê˜', 'rg@gmail.com', '0787283185', 0, '', '1490548196', '', 0, '', 0, 'Register-User', '13-11-2016 16:20:34', '', '', 'Activated'),
(3, 6, 24, 'kadibra', 'Kadibra', '', 'ab808a7a21d8f302917f4aa9c98d9f70f8a5539d64b0a42d127d7c703593690f', 'Ì(¸z©J3÷8J/¡÷£:“çIC¨¸£‰¬²ªÁ’æ}ª', 'abrahamahoshakiye-01@gmail.com', '+250788888888', 0, '', '', '', 0, '', 0, 'Register-User', '13-10-2017 07:18:20', '', '', 'Activated'),
(4, 6, 24, 'kadibra2', 'Kadibra2', '', 'a767f596be2c39f71739b69723dbd2ff67f909da8815a109bcb9f725d14f8e79', 'ƒ•jã[Ûk‡¯„©Ãm†ÅNù|È’3)]Ø…ùö0¨ž', 'abrahamahoshakiye@gmail.com', '+2507888887878', 0, '', '', '', 0, '', 0, 'Register-User', '13-10-2017 07:22:03', '', '', 'Activated');



INSERT INTO app_users ( username, firstname, password, salt, email) VALUES
  ( 'general', 'Abraham', '28bfcd67e52d5a8ec43d5cce8d0c41475956584b2f4def00ced7afc2b9b718b5', 'ÔÔœøvúP–ûºòe;NÞØ9èÞYuè\Z9)TYØê˜', 'abraham@kadibra.com'),
  ( 'icestone', 'Ice Stone', '28bfcd67e52d5a8ec43d5cce8d0c41475956584b2f4def00ced7afc2b9b718b5', 'ÔÔœøvúP–ûºòe;NÞØ9èÞYuè\Z9)TYØê˜', 'rg@gmail.com'),
  ( 'kadibra', 'kadibra', 'ab808a7a21d8f302917f4aa9c98d9f70f8a5539d64b0a42d127d7c703593690f', 'Ì(¸z©J3÷8J/¡÷£:“çIC¨¸£‰¬²ªÁ’æ}ª', 'abrahamahoshakiye-01@gmail.com');


INSERT INTO app_users ( username, firstname, password, salt, email) VALUES
  ( 'general', 'Abraham', '28bfcd67e52d5a8ec43d5cce8d0c41475956584b2f4def00ced7afc2b9b718b5', 'ÔÔœøvúP–ûºòe;NÞØ9èÞYuè\Z9)TYØê˜', 'abraham@kadibra.com'),
  ( 'icestone', 'Ice Stone', '28bfcd67e52d5a8ec43d5cce8d0c41475956584b2f4def00ced7afc2b9b718b5', 'ÔÔœøvúP–ûºòe;NÞØ9èÞYuè\Z9)TYØê˜', 'rg@gmail.com'),
  ( 'kadibra', 'kadibra', 'ab808a7a21d8f302917f4aa9c98d9f70f8a5539d64b0a42d127d7c703593690f', 'Ì(¸z©J3÷8J/¡÷£:“çIC¨¸£‰¬²ªÁ’æ}ª', 'abrahamahoshakiye-01@gmail.com');


INSERT INTO app_users ( username, firstname, password, email) VALUES
  ( 'general', 'Abraham', '28bfcd67e52d5a8ec43d5cce8d0c41475956584b2f4def00ced7afc2b9b718b5', 'abraham@kadibra.com');

UPDATE app_users SET salt='ÔÔœøvúP–ûºòe;NÞØ9èÞYuè\Z9\)TYØê˜' WHERE ID=1

UPDATE app_users SET salt="%'ÔÔœøvúP–ûºòe;NÞØ9èÞYuè\Z9\)TYØê˜'%" WHERE ID=1

SELECT * FROM php_bugs WHERE php_bugs_category like  "%' .$var.'%"








CREATE TABLE IF NOT EXISTS `app_users` (
  `ID` bigint(20) NOT NULL,
  `company_ID` bigint(20) NULL,
  `admin_ID` bigint(20) NULL,
  `username` varchar(100) NULL,
  `firstname` varchar(50) NULL,
  `lastname` varchar(50) NULL,
  `password` varchar(500) NULL,
  `salt` varchar(500) NULL,
  `email` varchar(200) NULL,
  `phone` varchar(30) NULL,
  `country_ID` int(11) NULL,
  `gender` varchar(1) NULL,
  `last_access` varchar(20) NULL,
  `last_login` varchar(20) NULL,
  `account_session` int(1) NULL DEFAULT '0',
  `profile` varchar(222) NULL,
  `temp` bigint(20) NULL,
  `groups` varchar(25) NULL,
  `date_insert` varchar(45) NULL,
  `recovery_string` text NULL,
  `default_password` varchar(11) NULL,
  `state` varchar(100) NULL
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`ID`, `company_ID`, `admin_ID`, `username`, `firstname`, `lastname`, `password`, `salt`, `email`, `phone`, `country_ID`, `gender`, `last_access`, `last_login`, `account_session`, `profile`, `temp`, `groups`, `date_insert`, `recovery_string`, `default_password`, `state`) VALUES
(24, 6, 0, 'general', 'Abraham', 'Imanzi', '28bfcd67e52d5a8ec43d5cce8d0c41475956584b2f4def00ced7afc2b9b718b5', 'ÔÔœøvúP–ûºòe;NÞØ9èÞYuè\Z9)TYØê˜', 'abraham@kadibra.com', '0787283185', 171, '', '1507907053', '', 0, '', 0, 'Admin', '1474462895', 'A6BE94456648251D85AA1D6513BE6EB5B4D4A8FAD82AF847E498CC40F40FC1C5', '', 'Activated'),
(52, 6, 51, 'icestone', 'Ice Stone', 'Admin', '28bfcd67e52d5a8ec43d5cce8d0c41475956584b2f4def00ced7afc2b9b718b5', 'ÔÔœøvúP–ûºòe;NÞØ9èÞYuè\Z9)TYØê˜', 'rg@gmail.com', '0787283185', 0, '', '1490548196', '', 0, '', 0, 'Register-User', '13-11-2016 16:20:34', '', '', 'Activated'),
(57, 6, 24, 'kadibra', 'Kadibra', '', 'ab808a7a21d8f302917f4aa9c98d9f70f8a5539d64b0a42d127d7c703593690f', 'Ì(¸z©J3÷8J/¡÷£:“çIC¨¸£‰¬²ªÁ’æ}ª', 'abrahamahoshakiye-01@gmail.com', '+250788888888', 0, '', '', '', 0, '', 0, 'Register-User', '13-10-2017 07:18:20', '', '', 'Activated'),
(58, 6, 24, 'kadibra2', 'Kadibra2', '', 'a767f596be2c39f71739b69723dbd2ff67f909da8815a109bcb9f725d14f8e79', 'ƒ•jã[Ûk‡¯„©Ãm†ÅNù|È’3)]Ø…ùö0¨ž', 'abrahamahoshakiye@gmail.com', '+2507888887878', 0, '', '', '', 0, '', 0, 'Register-User', '13-10-2017 07:22:03', '', '', 'Activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;

