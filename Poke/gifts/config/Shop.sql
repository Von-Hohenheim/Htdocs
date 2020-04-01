--
-- Table structure for table `shop_history`
--

CREATE TABLE IF NOT EXISTS `shop_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) NOT NULL,
  `session` varchar(256) NOT NULL,
  `player` varchar(256) NOT NULL,
  `date` int(10) NOT NULL,
  `processed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_offer`
--

CREATE TABLE IF NOT EXISTS `shop_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL DEFAULT '0',
  `category` int(11) NOT NULL DEFAULT '1',
  `type` int(11) NOT NULL DEFAULT '1',
  `item` int(11) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Estructura de tabla para la tabla `shop_donation_history`
--

CREATE TABLE IF NOT EXISTS `shop_donation_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(256) NOT NULL,
  `receiver` varchar(256) NOT NULL,
  `buyer` varchar(256) NOT NULL,
  `account` varchar(256) NOT NULL,
  `points` int(11) NOT NULL,
  `date` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `shop_donation_history`