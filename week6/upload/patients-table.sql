
CREATE TABLE IF NOT EXISTS patients (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        patientFirstName VARCHAR(50) DEFAULT NULL,
        patientLastName VARCHAR(50) DEFAULT NULL,
        patientMarried TINYINT(1),
        patientBirthDate DATE
        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;


