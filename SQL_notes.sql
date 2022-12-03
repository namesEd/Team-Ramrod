CREATE TABLE `user` (                                                                              
  `userID` int(15) NOT NULL AUTO_INCREMENT,                                                                  
  `email` varchar(100) NOT NULL,                                                                             
  `first_name` varchar(100) NOT NULL,                                                                             
  `last_name` varchar(100) NOT NULL,                                                                             
  `policy_number` varchar(100) NOT NULL,                                                                      
  `password` varchar(100) NOT NULL,                                                                      
  `birthday` date NOT NULL,                                                                               
  PRIMARY KEY (`userID`)                                                                                     
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4


#date = YYYY/MM/DD

INSERT INTO user
(email, first_name, last_name, policy_number, password, birthday) 
VALUES('bBob@hotmail.com','Billy', 'Bobbert', 'M1234567', 'sw0rdf!sh', '1970-01-01');

INSERT INTO user
(email, first_name, last_name, policy_number, password, birthday) 
VALUES
('marshman@hotmail.com','Miguel', 'Marshmellow', 'XE451234', 'qwerty123', '1988-06-22');




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
(location_name, address, location_type, phone_number, hours, multilingual)
VALUES
()





CREATE TABLE `insurance` (                                                                     
  `policy_number` varchar(100) NOT NULL,                                                                      
  `insurance_name` varchar(100) NOT NULL,                                                                     
  PRIMARY KEY (`policy_number`)                                                                               
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4