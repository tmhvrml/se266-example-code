/*
	Edit - Preferences - SQL Editor - Uncheck Safe Updates
        Query - Reconnect  to Server
*/
CREATE TABLE IF NOT EXISTS teams (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        teamName VARCHAR(150) DEFAULT NULL,
        division VARCHAR(150) DEFAULT NULL
        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO teams (teamName, division) VALUES 
('New England Patriots', 'AFC East'), 
('Buffalo Bills', 'AFC East'), 
('New York Jets', 'AFC East'), 
('Miami Dolphins', 'AFC East'), 
('Baltimore Ravens', 'AFC North'), 
('Cleveland Browns', 'AFC North'), 
('Pittsburgh Steelers', 'AFC North'), 
('Cincinnatti Bengals', 'AFC North'), 
('Indianoaolis Colts', 'AFC South'), 
('Houston Texans', 'AFC South'), 
('Jacksonville Jaguars', 'AFC South'), 
('Tennessee Titans', 'AFC South'), 
('Kansas City Chiefs', 'AFC West'), 
('Oakland Raiders', 'AFC West'), 
('Denver Broncos', 'AFC West'), 
('Los Angeles Chargers', 'AFC West'), 
('Dallas Cowboys', 'NFC East'), 
('Philadelphia Eagles', 'NFC East'), 
('New York Giants', 'NFC East'), 
('Washington Commanders', 'NFC East'), 
('Green Bay Packers', 'NFC North'), 
('Minnesota Vikings', 'NFC North'), 
('Chicago Bears', 'NFC North'), 
('Detroit Lions', 'NFC North'), 
('New Orleans Saints', 'NFC South'), 
('Carolina Panthers', 'NFC South'), 
('Tampa Bay Buccaneers', 'NFC South'), 
('Atlanta Falcons', 'NFC South'), 
('San Francisco 49ers', 'NFC West'), 
('Seattle Seahawks', 'NFC West'), 
('Los Angeles Rams', 'NFC West'), 
('Arizona Cardinals', 'NFC West')
