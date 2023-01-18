DROP TABLE IF EXISTS salary ;

CREATE TABLE salary  (
	id INT NOT NULL PRIMARY KEY,
    salary VARCHAR(255) NOT NULL
);


-- Insert persons data
INSERT INTO salary (
	id,
    salary
) VALUES 
(301,'เงินเดือนตำแหน่ง1'),
(302,'เงินเดือนตำแหน่ง2'),
(303,'เงินเดือนตำแหน่ง3'),
(304,'เงินเดือนตำแหน่ง4'),
(305,'เงินเดือนตำแหน่ง5');