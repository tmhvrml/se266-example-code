CREATE TABLE  IF NOT EXISTS users (
  id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  userName VARCHAR(16) NOT NULL,
  userPasword VARCHAR(255) NULL,
  userEmail VARCHAR(255) NULL,
  userSalt VARCHAR(32) NOT NULL);