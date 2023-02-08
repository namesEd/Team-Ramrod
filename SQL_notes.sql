CREATE TABLE `users` (                                                                              
  `userID` int(15) NOT NULL AUTO_INCREMENT,                                                                             
  `first_name` varchar(100) NOT NULL,                                                                             
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100),                                                                                                                                                   
  `password` varchar(100) NOT NULL,                                                                      
  `birthday` date,
  PRIMARY KEY (`userID`)                                                                                     
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4


#date = YYYY/MM/DD

INSERT INTO users
(first_name, last_name, email, username,  password, birthday) 
VALUES('Billy', 'Bobbert', 'bBob@hotmail.com', 'BBOB', 'sw0rdf!sh');
;
INSERT INTO user
(email, first_name, last_name, password, birthday) 
VALUES
('marshman@hotmail.com','Miguel', 'Marshmellow', 'qwerty123', '1988-06-22');




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
('Last Call ER', '123 24th St', 'Emergency Room', '(800) 123-4567', '00:00:00', '23:59:59', 'YES')

INSERT INTO location
(location_name, address, location_type, phone_number, start_hour, end_hour, multilingual)
VALUES
('No Mercy Southwest', '50 Calloway Dr', '"Emergency Room"', '(800) 987-6542', '00:00:00', '23:59:59', 'NO')

INSERT INTO location
(location_name, address, location_type, phone_number, start_hour, end_hour, multilingual)
VALUES
('Centenial Doctors', '1000 Truxtun Ave', 'Doctors Office', '(661) 123-3456', '8:0:0', '17:0:0', 'YES')


CREATE TABLE insurance (
  `policy_number` varchar(100) NOT NULL,
  `insurance_name` varchar(100) NOT NULL, 
  `userID` int(15) NOT NULL,
  PRIMARY KEY (`userID`), 
  CONSTRAINT `fk_insurance_user`
    FOREIGN KEY (`userID`) REFERENCES `user` (`id`)
    ON DELETE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4


INSERT INTO insurance
(userID, policy_number, insurance_name)
VALUES
('1', 'M1234567', 'Medicare')
;
INSERT INTO insurance
(userID, policy_number, insurance_name)
VALUES
('2', 'XE451234', 'Blue Cross')



VIEWS: 

CREATE OR REPLACE VIEW show_all
AS 
select * FROM 
user, insurance, location
; 


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