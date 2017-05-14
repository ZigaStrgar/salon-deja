<?php
include_once "./header.php";

$link = mysql_connect("localhost", "simakdoo", "zHKKpZ");

mysql_select_db("simakdoo");

mysql_set_charset("utf8", $link);

//mysql_query("SET NAMES 'utf8'");

$query = "TRUNCATE TABLE actions;";

if(!mysql_query($query)){
  echo "error truncating!";
}

$query = "TRUNCATE TABLE users;";

if(!mysql_query($query)){
  echo "error truncating!";
}

$query = "TRUNCATE TABLE pricelist;";

if(!mysql_query($query)){
  echo "error truncating!";
}

$query = "TRUNCATE TABLE hours;";

if(!mysql_query($query)){
  echo "error truncating!";
}

$query = "TRUNCATE TABLE categories;";

if(!mysql_query($query)){
  echo "error truncating!";
}

$query = "CREATE TABLE IF NOT EXISTS `actions` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valid` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";

if(!mysql_query($query)){
  echo "error creating actions<br />";
}

$query = "INSERT INTO `actions` (`id`, `text`, `created`, `valid`) VALUES
(1, '\n<p>Test123123</p>\n', '2015-09-02 17:45:36', '2015-09-01 22:00:00');";

if(!mysql_query($query)){
  echo "error inserting actions<br />";
}

$query = "CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;";

if(!mysql_query($query)){
  echo "error creating categories<br />";
}

$query = "INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Nega obraza'),
(6, 'Masaže'),
(7, 'Depilacije'),
(8, 'Podaljševanje in zgostitev trepalnic'),
(9, 'Nega rok'),
(10, 'Nega stopal'),
(11, 'Paketi'),
(12, 'Program hujšanja - Kavitacija'),
(13, 'Program hujšanja - Bodywraping'),
(14, 'Program hujšanja - Limfna drenaža - presoterapija'),
(15, 'Elektrostimulacija'),
(16, 'Povečanje napetosti (tonusa) kože');";

if(!mysql_query($query)){
  echo "error inserting categories<br />";
}

$query = "CREATE TABLE IF NOT EXISTS `hours` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `text` varchar(255) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;";

if(!mysql_query($query)){
  echo "error creating hours<br />";
}

$query = "INSERT INTO `hours` (`id`, `name`, `text`) VALUES
(31, 'Ponedeljek', '8.00 - 20.00'),
(32, 'Torek', '8.00 - 20.00'),
(33, 'Sreda', '8.00 - 20.00'),
(34, 'Četrtek', '8.00 - 20.00'),
(35, 'Petek', '8.00 - 20.00'),
(36, 'Sobota', '8.00 - 12.00');";

if(!mysql_query($query)){
  echo "error inserting hours<br />";
}

$query = "CREATE TABLE IF NOT EXISTS `pricelist` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_slovenian_ci,
  `price` float(5,2) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `last_change` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;";

if(!mysql_query($query)){
  echo "error creating pricelist<br />";
}

$query = "INSERT INTO `pricelist` (`id`, `name`, `note`, `price`, `category_id`, `last_change`) VALUES
(3, 'Nega obraza in dekolteja', 'Površinsko čiščenje, piling, globinsko čiščenje, barvanje trepalnic, oblikovanje/barvanje obrvi, masaža obraza, vratu in dekolteja, maska, krema', 25.00, 1, '2015-09-02'),
(4, 'Nega obraza in dekolteja z ampulo', 'Površinsko čiščenje, piling, globinsko čiščenje, barvanje trepalnic, oblikovanje/barvanje obrvi, masaža obraza, vratu in dekolteja, nanos ampule, maska, krema', 40.00, 1, '2015-09-02'),
(5, 'Barvanje obrvi', '', 5.00, 1, '2015-09-02'),
(6, 'Barvanje trepalnic', '', 5.00, 1, '2015-09-02'),
(8, 'Puljenje in oblikovanje obrvi', '', 5.00, 1, '2015-09-02'),
(10, 'Depilacija obraza', '', 12.00, 7, '2015-09-02'),
(11, 'Depilacija rok', '', 12.00, 7, '2015-09-02'),
(12, 'Depilacija nog - celotna', '', 20.00, 7, '2015-09-02'),
(13, 'Depilacija nog - do kolen', '', 12.00, 7, '2015-09-02'),
(14, 'Depilacija bikini', '', 10.00, 7, '2015-09-02'),
(15, 'Depilacija pazduh', '', 10.00, 7, '2015-09-02'),
(16, 'Brazilska depilacija-moška ali ženska (intimna depilacija)', '', 18.00, 7, '2015-09-02'),
(17, 'Depilacija hrbta ali trebuha', '', 15.00, 7, '2015-09-02'),
(18, 'Podaljševanje 1. obisk ', '', 50.00, 8, '2015-09-02'),
(19, 'Korektura do 2. tedna', '', 20.00, 8, '2015-09-02'),
(20, 'Korektura do 3. tedne', '', 30.00, 8, '2015-09-02'),
(21, 'Korektura do 4. tedne', '', 40.00, 8, '2015-09-02'),
(22, 'Odstranitev trepalnice', '', 15.00, 8, '2015-09-02'),
(23, 'Manikura', '', 12.00, 9, '2015-09-02'),
(24, 'Lakiranje - enobarvno', '', 4.00, 9, '2015-09-02'),
(25, 'Francosko lakiranje', '', 7.00, 9, '2015-09-02'),
(26, 'Pedikura', '', 20.00, 10, '2015-09-02'),
(27, 'Pedikerski pavšal (delna pedikura)', '', 12.00, 10, '2015-09-02'),
(28, 'Paket 1: (nega obraza + 60 min telesna masaža)', ' GRATIS: oblikovanje in barvanje obrvi ter trepalnic', 40.00, 11, '2015-09-02'),
(29, 'Paket 2: (nega obraza + 30 min delna masaža telesa) ', 'GRATIS: oblikovanje in barvanje obrvi ter trepalnic', 32.00, 11, '2015-09-02'),
(30, 'Paket 3: (depilacija nog do kolen + depilacija bikini)', 'GRATIS: oblikovanje obrvi', 17.00, 11, '2015-09-02'),
(31, 'Paket 4: (depilacija nog – celotna + brazilska depilacija)', 'GRATIS: oblikovanje obrvi', 30.00, 11, '2015-09-02'),
(32, 'Paket 5: (pedikura + depilacija nog - celotna)', '', 32.00, 11, '2015-09-02'),
(33, 'Radiofrekvenca za napetost kože (določen predel telesa) - 40 minut', '', 30.00, 16, '2015-09-02'),
(34, 'Radiofrekvenca za napetost kože (določen predel telesa) - 80 minut', '', 50.00, 16, '2015-09-02'),
(35, 'Elektrostimulacija (30 minut)', '', 25.00, 15, '2015-09-02'),
(36, 'Paket 10+2 gratis elektrostimulacija (30 minut)', 'Možnost plačila na 2 ali 3 obroke', 250.00, 15, '2015-09-02'),
(37, 'Elektrolipoza (45 minut)', '', 30.00, 15, '2015-09-02'),
(38, 'Paket 10+2 gratis elektrolipoza (45 minut)', 'Možnost plačila na 2 ali 3 obroke', 300.00, 15, '2015-09-02'),
(39, 'Kavitacija (30 minut)', '', 40.00, 12, '2015-09-02'),
(40, 'Kavitacija, radiofrekvenca, limfna drenaža z infrardečo toploto (90 minut)', '', 85.00, 12, '2015-09-02'),
(41, 'Paket 5+1 gratis (kavitacija, radiofrekvenca, limfna drenaža z infrardečo toploto) - 90 minut', 'Možnost plačila na 2 ali 3 obroke', 425.00, 12, '2015-09-02'),
(42, 'Paket 9+2 gratis (kavitacija, radiofrekvenca, limfna drenaža z infrardečo toploto) - 90 minut', 'Možnost plačila na 2 ali 3 obroke', 765.00, 12, '2015-09-02'),
(43, 'Bodywraping z infrardečo toploto (30 minut)', '', 25.00, 13, '2015-09-02'),
(44, 'Paket 8 krat – bodywraping z infrardečo toploto in limfno drenažo (40 minut)', 'Možnost plačila na 2 ali 3 obroke', 200.00, 13, '2015-09-02'),
(45, 'Strojna limfna drenaža z infrardečo toploto (30 minut)', '', 20.00, 14, '2015-09-02'),
(46, 'Paket 6+1 gratis - strojna limfna drenaža z infrardečo toploto (30 minut)', 'Možnost plačila na 2 ali 3 obroke', 120.00, 14, '2015-09-02'),
(47, 'Strojna limfna drenaža z infrardečo toploto (45 minut)', '', 30.00, 14, '2015-09-02'),
(48, 'Paket 6+1 gratis - strojna limfna drenaža z infrardečo toploto (45 minut)', 'Možnost plačila na 2 ali 3 obroke', 180.00, 14, '2015-09-02'),
(51, 'Telesna masaža', '60 minut', 25.00, 6, '2015-09-02'),
(52, 'Telesna masaža', '30 minut', 15.00, 6, '2015-09-02'),
(53, 'Refleksna masaža stopal', '60 minut', 25.00, 6, '2015-09-02');";

if(!mysql_query($query)){
  echo "error inserting pricelist<br />";
}

$query = "CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(90) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset` int(11) NOT NULL DEFAULT '0',
  `password_reseted` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;";

if(!mysql_query($query)){
  echo "error creating users<br />";
}

$query = "INSERT INTO `users` (`id`, `email`, `password`, `password_reset`, `password_reseted`) VALUES
(5, 'ziga_strgar@hotmail.com', '$2y$10$w8NxQRMH8.NeDfWQ4LSemOVwaGrVYJLJ8ycVALCNXuUFHvgqKmuGa', 1, '$2y$10$DTEGhuDeZwnI/VMz9hKFBuV0Xv/y69vmSlbtbN4rt7U2Gyhwj7t2S'),
(6, 'info@salon-deja.si', '$2y$10$G0oyDz6kWCrwcB5z51EypOnMFiqMCApYoce.LUkXiuzm7lbfmxGTS', 0, NULL);";

if(!mysql_query($query)){
  echo "error inserting users<br />";
}