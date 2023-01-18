DROP TABLE IF EXISTS persons ;

CREATE TABLE persons  (
	user_id INT(10) UNSIGNED ZEROFILL AUTO_INCREMENT NOT NULL,
	firstname VARCHAR (255) NOT NULL,
	lastname VARCHAR (255) NOT NULL,
	gender_id INT NOT NULL,
    dob DATE NOT NULL,
	career_id INT NOT NULL,
	salary_id INT NOT NULL,
	avatar VARCHAR (255)
);


-- Insert persons data
INSERT INTO persons (
	firstname,
	lastname,
	gender_id,
    dob,
	career_id,
	salary_id
) VALUES (
	'ปฏิภาณ',
	'คุ้มกล่ำ',
	'101',
	'2002-01-16',
	'201',
	'301'
);