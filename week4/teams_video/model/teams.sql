/*
	Edit - Preferences - SQL Editor - Uncheck Safe Updates
        Query - Reconnect  to Server
*/
CREATE TABLE IF NOT EXISTS teams (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        teamName VARCHAR(150) DEFAULT NULL,
        division VARCHAR(150) DEFAULT NULL
        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO teams (teamName, division) VALUES ('New England Patriots', 'AFC East');
INSERT INTO teams (teamName, division) VALUES ('Buffalo Bills', 'AFC East');
INSERT INTO teams (teamName, division) VALUES ('New York Jets', 'AFC East');
INSERT INTO teams (teamName, division) VALUES ('Miami Dolphins', 'AFC East');
