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


CREATE TABLE `location` (                                                                       
  `locID` int(15) NOT NULL AUTO_INCREMENT,                                                                   
  `location_name` varchar(100) NOT NULL,                                                                      
  `address` varchar(100) NOT NULL,                                                                           
  `location_type` varchar(100) NOT NULL,                                                                      
  `phone_number` varchar(100) NOT NULL,                                                                       
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,                                                               
  `multilingual` varchar(100) NOT NULL,                                                                      
  PRIMARY KEY (`locID`)                                                                                      
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4


INSERT INTO location
(location_name, address, location_type, phone_number, start_hour, end_hour, multilingual)
VALUES
('Kaiser San Joaquin Valley', '220 Chester Ave, Bakersfield CA. 93301', 'Emergency Room', '(661) 555-5555', '00:00:00', '23:59:59', 'YES'),
('Community Hospital', '123 Main St, Anytown USA 12345', 'Hospital', '(555) 123-4567', '08:00:00', '20:00:00', 'YES'),
('St. Marys Hospital', '456 Elm St, Anytown USA 12345', 'Hospital', '(555) 789-0123', '09:00:00', '21:00:00', 'NO'),
('Green Valley Clinic', '789 Maple Ave, Anytown USA 12345', 'Clinic', '(555) 456-7890', '07:30:00', '18:30:00', 'YES'),
('Redwood Medical Center', '321 Oak St, Anytown USA 12345', 'Medical Center', '(555) 012-3456', '08:30:00', '17:00:00', 'YES'),
('City General Hospital', '567 Pine St, Anytown USA 12345', 'Hospital', '(555) 234-5678', '07:00:00', '22:00:00', 'NO'),
('Sunrise Medical Clinic', '910 Cedar Blvd, Anytown USA 12345', 'Clinic', '(555) 678-9012', '09:30:00', '20:00:00', 'YES');

INSERT INTO location
(location_name, address, location_type, phone_number, start_hour, end_hour, multilingual)
VALUES
('Centenial Doctors', '1000 Truxtun Ave', 'Doctors Office', '(661) 123-3456', '8:0:0', '17:0:0', 'YES'),
('No Mercy Southwest', '50 Calloway Dr', '"Emergency Room"', '(800) 987-6542', '00:00:00', '23:59:59', 'NO'),
('Last Call ER', '123 24th St', 'Emergency Room', '(800) 123-4567', '00:00:00', '23:59:59', 'YES');


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

INSERT INTO insurance
(userID, policy_number, insurance_name)
VALUES
('1', 'M1234567', 'Medicare')
;
INSERT INTO insurance
(userID, policy_number, insurance_name)
VALUES
('2', 'XE451234', 'Blue Cross')


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



INSERT INTO allergies(`allergy`)
VALUES 
       ('Penicillin'),
       ('Sulfa'),
       ('Iodine'),
       ('Fentanyl'),
       ('NSAIDS');


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



Notes:
Variations of these tables may be added in the future.

specialty(locID, specialty_type)

insuranceAcceptsLocation(location_name, locID, address, location_type, policy_number, insurance_name)

locationHasSpecialty(location_name, locID, address, specialty_type)

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






PREPARED STATEMENTS: 


DROP PROCEDURE IF EXISTS RegisterUser;

DELIMITER //

CREATE PROCEDURE `RegisterUser`(param_email varchar(100), param_fname varchar(100), param_lname varchar(100), passhash varchar(100),
param_date date, param_uname varchar(100))
BEGIN

    SELECT COUNT(*) INTO @usernameCount
    FROM user
    WHERE username = param_uname;

    IF @usernameCount > 0 THEN
        SELECT NULL as userid, "Username already exists" AS 'Error';
    ELSE
        INSERT INTO user (email, first_name, last_name, password, birthday, username) VALUES (param_email, param_fname, param_lname, passhash, param_date, param_uname);
        SELECT last_insert_id() AS id, NULL as 'Error';
    END IF;

    COMMIT;
END;
//
DELIMITER ;

# call RegisterUser ('bigbill@AOL.net', 'Bill', 'Bobson', 'billyBobbin', 'qwerty123');

