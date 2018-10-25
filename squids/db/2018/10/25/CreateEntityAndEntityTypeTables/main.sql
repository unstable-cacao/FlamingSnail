CREATE TABLE `EntityType` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `GameID` int(11) NOT NULL,
  `CreatorID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Status` varchar(64) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_EntityType_Game_GameID` (`GameID`),
  KEY `fk_EntityType_User_CreatorID` (`CreatorID`),
  CONSTRAINT `fk_EntityType_Game_GameID` FOREIGN KEY (`GameID`) REFERENCES `Game` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_EntityType_User_CreatorID` FOREIGN KEY (`CreatorID`) REFERENCES `User` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `Entity` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `GameID` int(11) NOT NULL,
  `EntityTypeID` int(11) NOT NULL,
  `CreatorID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Entity_Game_GameID` (`GameID`),
  KEY `fk_Entity_EntityType_EntityTypeID` (`EntityTypeID`),
  KEY `fk_Entity_User_CreatorID` (`CreatorID`),
  CONSTRAINT `fk_Entity_EntityType_EntityTypeID` FOREIGN KEY (`EntityTypeID`) REFERENCES `EntityType` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Entity_Game_GameID` FOREIGN KEY (`GameID`) REFERENCES `Game` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Entity_User_CreatorID` FOREIGN KEY (`CreatorID`) REFERENCES `User` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `EntityPages` (
  `EntityID` int(11) NOT NULL,
  `PageID` char(16) NOT NULL,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`EntityID`,`PageID`),
  CONSTRAINT `fk_EntityPages_Entity_EntityID` FOREIGN KEY (`EntityID`) REFERENCES `Entity` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `EntityTypeSheets` (
  `EntityTypeID` int(11) NOT NULL,
  `SheetID` char(16) NOT NULL,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`EntityTypeID`,`SheetID`),
  CONSTRAINT `fk_EntityTypeSheets_EntityType_EntityTypeID` FOREIGN KEY (`EntityTypeID`) REFERENCES `EntityType` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;