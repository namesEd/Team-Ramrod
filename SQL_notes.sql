Tables: 

CREATE TABLE `users` (                                                                                                     
  `userID` int(15) NOT NULL AUTO_INCREMENT,                                                                                          
  `first_name` varchar(100) NOT NULL,                                                                                                
  `last_name` varchar(100) NOT NULL,                                                                                                 
  `email` varchar(100) NOT NULL,                                                                                                     
  `username` varchar(100) NOT NULL,                                                                                                  
  `password` varchar(100) NOT NULL,                                                                                                  
  `birthday` date DEFAULT NULL,
  `isVendor` ENUM('yes', 'no') DEFAULT 'no',                                                                                             
  PRIMARY KEY (`userID`)                                                                                                             
) DEFAULT CHARSET=utf8mb4 ;

ALTER TABLE users 
ADD COLUMN `isVendor` ENUM('yes', 'no') DEFAULT 'no'; 

UPDATE users
SET isVendor = 'yes'
WHERE userID = 3; 


#date = YYYY/MM/DD

INSERT INTO users 
(first_name, last_name, email, username, password, birthday) 
VALUES
('John', 'Doe', 'NODOEJOE@gmail.com', 'jdoe', 'qwerty123', '1980-10-02');


get_user_data: 
SELECT email, username, isVendor, policy_number, insurance_name FROM users
INNER JOIN insurance WHERE insurance.userID = users.userID AND users.userID = 3;

DELIMITER //

CREATE OR REPLACE PROCEDURE LocationInfo()
BEGIN
SELECT l.location_name, l.address, l.city, l.state, l.zip, l.phone_number, l.start_hour, l.end_hour,
       GROUP_CONCAT(s.specialty_type SEPARATOR ', '), GROUP_CONCAT(i.insurance_name SEPARATOR ', ') AS accepted_insurances
FROM location l
INNER JOIN specialty s
ON l.locID = s.locID
INNER JOIN location_insurance i
ON l.locID = i.locID
GROUP BY l.location_name, l.address, l.city, l.state, l.zip, l.phone_number, l.start_hour, l.end_hour, s.specialty_type;
END;
//
DELIMITER ;




  SELECT l.location_name, l.address, l.city, l.state, l.zip, l.phone_number, l.start_hour, l.end_hour,
         s.specialty_type, GROUP_CONCAT(i.insurance_name SEPARATOR ', ') AS accepted_insurances
  FROM location l
  INNER JOIN specialty s
  ON l.locID = s.locID
  INNER JOIN location_insurance i
  ON l.locID = i.locID
  GROUP BY l.location_name, l.address, l.city, l.state, l.zip, l.phone_number, l.start_hour, l.end_hour, s.specialty_type;

CREATE TABLE `location` (                                                                       
  `locID` int(15) NOT NULL AUTO_INCREMENT,                                                                   
  `location_name` varchar(100) NOT NULL,                                                                                                                                              
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,                                                                           
  `state` varchar(100) NOT NULL,                                                                           
  `zip` int(11) NOT NULL,                                                                           
  `phone_number` varchar(100) NOT NULL,                                                                       
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `type` varchar(100) NOT NULL,                                                              
  PRIMARY KEY (`locID`)                                                                                      
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4




CREATE TABLE specialty(
  `specialtyID` int(15) AUTO_INCREMENT,
  `locID` int(15) NOT NULL,
  `specialty_type` varchar(100) NOT NULL,
    PRIMARY KEY (`specialtyID`),
      CONSTRAINT `fk_locID_location`
    FOREIGN KEY (`locID`) REFERENCES `location`(locID)
      ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE insurance (
  `policy_number` varchar(100) NOT NULL,
  `insurance_name` varchar(100) NOT NULL, 
  `userID` int(15) NOT NULL,
  PRIMARY KEY (`userID`), 
  CONSTRAINT `fk_insurance_users`
    FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
    ON DELETE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
;

ALTER TABLE `insurance` ADD INDEX `idx_insurance_name` (`insurance_name`);

CREATE TABLE `location_insurance` (
  `locID` int(15) NOT NULL,
  `insurance_name` varchar(100) NOT NULL,
  PRIMARY KEY (`locID`, `insurance_name`),
  CONSTRAINT `fk_location_insurance_location`
    FOREIGN KEY (`locID`) REFERENCES `location` (`locID`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_location_insurance_insurance`
    FOREIGN KEY (`insurance_name`) REFERENCES `insurance` (`insurance_name`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





User Profile Tables:

DROP TABLE IF EXISTS medical_history;
CREATE TABLE medical_history (
  `medID` int(15) NOT NULL AUTO_INCREMENT,
  `userID` int(15) NOT NULL,
  `medical_problemID` int(15) NOT NULL,
  PRIMARY KEY (`medID`),
  CONSTRAINT `fk_medical_history_users`
    FOREIGN KEY (`userID`) REFERENCES `users`(userID)
    ON DELETE CASCADE,
  CONSTRAINT `fk_medical_history_medical_problems`
    FOREIGN KEY (`medical_problemID`) REFERENCES `medical_problems`(`probID`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS medical_problems;
CREATE TABLE medical_problems (
  `probID` int(11) NOT NULL AUTO_INCREMENT,
  `medical_problem` varchar(100) NOT NULL,
  PRIMARY KEY (`probID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




INSERT INTO medical_problems (`medical_problem`)
VALUES 
       ('Anxiety'),
       ('Depression'),
       ('COPD'),
       ('Congestive Heart Failure'),
       ('Cancer')
       ('High Blood Pressure'),
       ('Diabetes'),
       ('Asthma'),
       ('Stroke'),
       ('High Cholesterol'),
       ('Heart Attack');



SELECT u.userID, u.first_name, u.last_name, mp.medical_problem
FROM medical_history mh
INNER JOIN medical_problems mp ON mh.medical_problemID = mp.probID
INNER JOIN users u ON u.userID = mh.userID
WHERE u.userID = ?
ORDER BY u.userID






DROP TABLE IF EXISTS allergies;
CREATE TABLE allergies (
  `allergyID` int(11) NOT NULL AUTO_INCREMENT,
  `allergy` varchar(100) NOT NULL,
  PRIMARY KEY (`allergyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS user_allergies;
CREATE TABLE user_allergies (
  `userAllergyID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(15) NOT NULL,
  `allergyID` int(11) NOT NULL,
  PRIMARY KEY (`userAllergyID`),
  CONSTRAINT `fk_userID_users`
    FOREIGN KEY (`userID`) REFERENCES `users`(`userID`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_allergyID_allergies`
    FOREIGN KEY (`allergyID`) REFERENCES `allergies`(`allergyID`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4


SELECT a.allergy FROM allergies a 
JOIN user_allergies ua 
ON a.allergyID = ua.allergyID 
WHERE ua.userID = $userID


DROP TABLE IF EXISTS medications;
CREATE TABLE medications (
  `medicationID` int(11) NOT NULL AUTO_INCREMENT,
  `medication` varchar(100) NOT NULL,
  PRIMARY KEY (`medicationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS user_medications;
CREATE TABLE user_medications (
  `userMedID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(15) NOT NULL,
  `medicationID` int(11) NOT NULL,
  PRIMARY KEY (`userMedID`),
  CONSTRAINT `fk_users_umedications_userID`
    FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
    ON DELETE CASCADE,
  CONSTRAINT `fk_medications_umedications_medID`
    FOREIGN KEY (`medicationID`) REFERENCES `medications` (`medicationID`)
    ON DELETE CASCADE
)

INSERT INTO medications(`medication`)
VALUES 
       ('Aspirin'),
       ('Metformin'),
       ('Lisinopril'),
       ('Xanax'),
       ('Tylenol'),
       ('Ibuprofen'),
       ('Adderall');

SELECT m.medication
FROM medications m 
JOIN user_medications um 
ON m.medicationID = um.medicationID 
WHERE um.userID = $userID

SELECT a.allergy FROM allergies a JOIN user_allergies ua 
ON a.allergyID = ua.allergyID WHERE ua.userID = $userID




Vendors: 

  CREATE TABLE vendors (
  `vendor_name` varchar(100) NOT NULL,
  `userID` int(15) NOT NULL,
  `locID` int(15) NOT NULL,
  PRIMARY KEY (`userID`, `locID`),
  CONSTRAINT `fk_users_loc_vendors`
    FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
    FOREIGN KEY (`locID`) REFERENCES `location` (`locID`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4



CREATE TABLE locationAcceptsInsurance(



Notes:
Variations of these tables may be added in the future.

insuranceAcceptsLocation(location_name, locID, address, location_type, insurance_name)

userVisitsLocation(userID, locID, policy_number)




VIEWS: 

CREATE OR REPLACE VIEW show_all
AS 
select * FROM 
user, insurance, location
; 


CREATE OR REPLACE VIEW view_profile
AS 
SELECT u.userID, u.first_name, u.last_name, mp.medical_problem
FROM 
medical_history mh
INNER JOIN
medical_problems mp
INNER JOIN
users u
WHERE mh.medical_problemID = mp.probID
AND
u.userID = mh.userID
ORDER BY
userID;




SELECT 
    view_profile
FROM 
    information_schema.tables 
WHERE 
    table_type   = 'VIEW';

CREATE OR REPLACE VIEW view_profile
SELECT userID, first_name, last_name, medical_problem
FROM users u
INNER JOIN medical_history ON u.userID = mh.userID
INNER JOIN medical_problems mp ON mh.medical_problemID = mp.probID;