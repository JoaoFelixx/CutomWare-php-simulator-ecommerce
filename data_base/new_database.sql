CREATE DATABASE custom_ware;

USE custom_ware;

CREATE TABLE costumize(
  ref_user_id INT NOT NULL,
  costumize_name VARCHAR(40) NOT NULL,
  costumize_value VARCHAR(8) NOT NULL,

  PRIMARY KEY (ref_user_id)
);

CREATE TABLE repair(
  ref_user_id INT NOT NULL,
  peripheral_model VARCHAR(40) NOT NULL,
  Peripheral_problem VARCHAR(50) NOT NULL,
  repair_value VARCHAR(8) NOT NULL,

  PRIMARY KEY (ref_user_id)
);

CREATE TABLE contact(
  ref_user_id INT NOT NULL,
  subject VARCHAR(255) NOT NULL,
  name VARCHAR(100) NOT NULL,
  comment VARCHAR(255) NOT NULL,
  
  CHECK (subject < 256 AND name < 101 AND comment < 256),
  
  PRIMARY KEY (ref_user_id)
);

CREATE TABLE users(
  user_id INT AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(100) NOT NULL,
  money INT DEFAULT 0,
  reference_id INT,
  
  CHECK(email > 8 AND password > 3),
  
  PRIMARY KEY(user_id),
  FOREIGN KEY (reference_id) REFERENCES costumize(ref_user_id),
  FOREIGN KEY (reference_id) REFERENCES repair(ref_user_id),
  FOREIGN KEY (reference_id) REFERENCES contact(ref_user_id)
);
