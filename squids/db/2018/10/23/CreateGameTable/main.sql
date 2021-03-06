CREATE TABLE `Game` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) NOT NULL,
  `Creator` int(11) NOT NULL,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(64) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Game_User_Creator` (`Creator`),
  CONSTRAINT `fk_Game_User_Creator` FOREIGN KEY (`Creator`) REFERENCES `User` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8