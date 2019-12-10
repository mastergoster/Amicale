-- Adminer 4.7.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `alert`;
CREATE TABLE `alert` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `alert` (`id`, `title`, `message`, `isactive`) VALUES
(5,	'alerte concert',	'Venez rÃ©cupÃ©rer les derniÃ¨res places de concert...',	0),
(7,	'alerte sÃ©jour',	'Le sÃ©jour dans les Alpes est annulÃ©.',	1),
(8,	'alerte chocolat',	'Les chocolats de noÃ«l sont arrivÃ©s Ã  l\'Amicale',	1);

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `idicon` int(11) DEFAULT NULL,
  `idalerte` int(2) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `I_FK_CATEGORY_ALERT` (`idalerte`),
  KEY `idicon` (`idicon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `category` (`id`, `idicon`, `idalerte`, `name`) VALUES
(47,	NULL,	NULL,	'Spectacles'),
(48,	NULL,	NULL,	'Concerts'),
(49,	NULL,	NULL,	'Sports'),
(50,	NULL,	NULL,	'Loisirs'),
(51,	NULL,	NULL,	'Produits locaux');

DROP TABLE IF EXISTS `categorydiffusion`;
CREATE TABLE `categorydiffusion` (
  `iddiffusion` int(11) NOT NULL,
  `idcategory` int(2) NOT NULL,
  PRIMARY KEY (`iddiffusion`,`idcategory`),
  KEY `I_FK_CATEGORYDIFFUSION_DIFFUSION` (`iddiffusion`),
  KEY `I_FK_CATEGORYDIFFUSION_CATEGORY` (`idcategory`),
  CONSTRAINT `FK_CATEGORYDIFFUSION_CATEGORY` FOREIGN KEY (`IDCATEGORY`) REFERENCES `CATEGORY` (`ID`),
  CONSTRAINT `FK_CATEGORYDIFFUSION_DIFFUSION` FOREIGN KEY (`IDDIFFUSION`) REFERENCES `DIFFUSION` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `diffusion`;
CREATE TABLE `diffusion` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `idalerte` int(2) DEFAULT NULL,
  `idhoraire` int(2) NOT NULL,
  `month` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `I_FK_DIFFUSION_ALERT` (`idalerte`),
  KEY `I_FK_DIFFUSION_HORAIRE` (`idhoraire`),
  CONSTRAINT `diffusion_ibfk_1` FOREIGN KEY (`idhoraire`) REFERENCES `horaire` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `horaire`;
CREATE TABLE `horaire` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `horaire` (`id`, `title`, `content`, `isactive`) VALUES
(2,	' De 10h - 15H / du 21 juin 2019 au 31 Aout 2019',	'Horaire EtÃ©',	0),
(6,	'du 21 juin 2019 au 31 Aout 2019',	'Horaire Hiver',	1),
(11,	'du 21 juin 2019 au 31 Aout 2019',	'test file + photo',	0);

DROP TABLE IF EXISTS `icons`;
CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `icons` varchar(25) COLLATE utf8_bin NOT NULL,
  `codef` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `idcategory` int(2) NOT NULL,
  `title` longtext NOT NULL,
  `content` longtext NOT NULL,
  `datepost` date DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `pin` tinyint(1) NOT NULL,
  `compteur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `I_FK_POST_CATEGORY` (`idcategory`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idcategory`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `post` (`id`, `idcategory`, `title`, `content`, `datepost`, `picture`, `file`, `pin`, `compteur`) VALUES
(249,	47,	'Concert de Francis Cabrel',	'<p>Le concert de Francis Cabrel se d&eacute;roulera au Z&eacute;nith de Montlu&ccedil;on.</p>\r\n<p>Les places sont &agrave; venir chercher sur place.</p>\r\n<p>&nbsp;</p>\r\n<p>Le concert de Francis Cabrel se d&eacute;roulera au Z&eacute;nith de Montlu&ccedil;on.</p>\r\n<p>Les places sont &agrave; venir chercher sur place.</p>\r\n<p>&nbsp;</p>\r\n<p>Le concert de Francis Cabrel se d&eacute;roulera au Z&eacute;nith de Montlu&ccedil;on.</p>\r\n<p>Les places sont &agrave; venir chercher sur place.</p>\r\n<p>&nbsp;</p>\r\n<p>Le concert de Francis Cabrel se d&eacute;roulera au Z&eacute;nith de Montlu&ccedil;on.</p>\r\n<p>Les places sont &agrave; venir chercher sur place.</p>\r\n<p>&nbsp;</p>\r\n<p>Le concert de Francis Cabrel se d&eacute;roulera au Z&eacute;nith de Montlu&ccedil;on.</p>\r\n<p>Les places sont &agrave; venir chercher sur place.</p>\r\n<p>&nbsp;</p>',	'2019-11-15',	'249.jpeg',	'249.docx',	0,	NULL),
(250,	49,	'RandonnÃ© Ã  la ForÃªt de Boisseau',	'<p>Vous avez besoin d\'air pur, la nature vous manque, d&eacute;pensez des calories ne vous fait pas peur...</p>\r\n<p>&nbsp;</p>\r\n<p>Alors rejoignez notre &eacute;quipe de randonneurs pour tout niveau, du d&eacute;butant au sportif accomplie...</p>',	'2020-05-03',	'250.jpeg',	'',	0,	NULL),
(251,	49,	'Week End Football',	'<p>Vous aimez la bi&egrave;re, le foot et les ambiances d\'un stade de foot...</p>\r\n<p>Alors venez soutenir notre &eacute;quipe locale, avec des attaquants de pointe, un bloc d&eacute;fensif rompue &agrave; toute &eacute;preuve et un milieu de qualit&eacute;...</p>\r\n<p>Renvoyez nous le document pour conclure votre participation.</p>',	'2023-03-02',	'251.jpeg',	'251.docx',	1,	NULL),
(252,	51,	'Miel MontluÃ§onnais...',	'<p>A peine les abeilles ont elles finis de butiner dans les parcs de la ville, que nos amis apiculteurs se sont mis au travail pour vous proposer un miel de qualit&eacute;.</p>\r\n<p>&nbsp;</p>\r\n<p>Venez &agrave; l\'Amicale pour acheter un pot (ou plusieurs) de ce tr&egrave;s bon crus 2019.</p>\r\n<p>&nbsp;</p>\r\n<p>le pot de 250 gr :&nbsp;<strong><span style=\"color: #e03e2d;\">5,50 &euro;</span></strong></p>\r\n<p>le pot de 500 gr : <strong><span style=\"color: #e03e2d;\">9,75 &euro;</span></strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>',	'2020-05-02',	'252.jpeg',	'252.docx',	1,	NULL),
(253,	51,	'Savon Lavetou...',	'<p>Les savons lavetout fabriqu&eacute; par Pierre Petit &agrave; Archignat, sont garantie sans allerg&eacute;nes et ni produit agressif pour la peau.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Fabrication artisanale.</p>\r\n<p>&nbsp;</p>\r\n<p>Bas&eacute; sur la formule du savon de Marseille,&nbsp; il est t&egrave;rs hydratant pour les peaux s&eacute;ches...</p>\r\n<p>&nbsp;</p>\r\n<p>Le savon de 100 gr :&nbsp; <strong><span style=\"color: #e03e2d;\">4.20 &euro;</span></strong></p>\r\n<p>Les 3 savons de 100 gr :&nbsp; <strong><span style=\"color: #e03e2d;\">11,10 &euro;</span></strong></p>\r\n<p>&nbsp;</p>',	'2020-04-02',	'253.jpeg',	'253.',	1,	NULL),
(254,	50,	'Paintball Ã  DomÃ©rat',	'<p>Les sensations fortes sont votre adr&eacute;naline, les balles qui fusent &agrave; vos oreilles sont un pur d&eacute;lice,&nbsp; la joie de se rouler dans la boue r&eacute;veille vos instincts primaires, alors...</p>\r\n<p>&nbsp;</p>\r\n<p>Rejoignez la team Paintball Dom&eacute;rat, nos guerriers vous attendent de pied femre et &agrave; bras ouvert...</p>\r\n<p>&nbsp;</p>\r\n<p>L\'inscription se fera sur place, aurp&egrave;s de Madame Ginois...</p>',	'2022-04-03',	'254.jpeg',	'254.',	1,	NULL),
(255,	47,	'Spectacle vivant : les visiteuses de l',	'<p>Apr&egrave;s &ecirc;tre rest&eacute;&nbsp; mois sur Paris, Athanor accueille &agrave; son tour ce spectacle vivant dont la profondeur pourra vous plonger dans les limbes de l\'inconscient..</p>\r\n<p>La troupe compos&eacute; de quinze personnes, huit femmes&nbsp; et sept hommes vont r&eacute;veiller en vous l\'enfant qui sommeillent en vous, &agrave; la recherche de l\'innocence perdue...</p>\r\n<p>Prix de la place&nbsp; :&nbsp; <strong><span style=\"color: #e03e2d;\">25&euro;</span></strong></p>\r\n<p>Prix &agrave; l\'unit&eacute; pour 4 personnes ou plus&nbsp; :&nbsp; <strong><span style=\"color: #e03e2d;\">23,20 &euro;</span></strong>&nbsp;</p>',	'2022-08-08',	'255.jpeg',	'255.docx',	0,	NULL),
(256,	48,	'Concert de A-Ha',	'<p><strong>Ce groupe mythique</strong> revient voir les fans fran&ccedil;ais apr&egrave;s 28 ans d\'absence.&nbsp;</p>\r\n<p>On se souvient tous de ce clip ou les personnages &eacute;taient crayonn&eacute;s.&nbsp;</p>\r\n<p>Une version acoustique est ressortie en 2017 pour le plus grand plaisir des aficionados.</p>\r\n<p>&nbsp;</p>\r\n<p>Venez r&eacute;cup&egrave;rer les places &agrave; l\'Amicale pour le prix de <strong><span style=\"color: #e03e2d;\">58 &euro;</span></strong></p>',	'2022-06-02',	'256.jpeg',	'256.',	0,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `login`, `password`, `slug`) VALUES
(1,	'admin',	'd033e22ae348aeb5660fc2140aec35850c4da997',	'admin'),
(7,	'useramicale',	'c73ba2982c55b7ead0e4098a92f722bdb3a3b3d8',	'');

-- 2019-12-09 12:32:22
