DROP TABLE IF EXISTS career ;
CREATE TABLE career  (
	id INT UNSIGNED PRIMARY KEY,
	title VARCHAR(255)
);
INSERT INTO career (id,title)
VALUES
(201,'ตำแหน่ง1'),
(202,'ตำแหน่ง2'),
(203,'ตำแหน่ง3'),
(204,'ตำแหน่ง4'),
(205,'ตำแหน่ง5');