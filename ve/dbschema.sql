--
-- Table structure for table `numbers`
--

CREATE TABLE IF NOT EXISTS `numbers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(50) DEFAULT NULL,
  `verification_code` int(11) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
