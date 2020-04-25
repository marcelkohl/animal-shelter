BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS `shelters` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	TEXT NOT NULL,
	`deleted`	INTEGER NOT NULL DEFAULT 0
);
INSERT INTO `shelters` VALUES (1,'Shelter 0.61495800 1567889978',0);
INSERT INTO `shelters` VALUES (2,'Shelter 0.29923800 1567890066',0);
INSERT INTO `shelters` VALUES (3,'Shelter 0.33581500 1567890190',0);
INSERT INTO `shelters` VALUES (4,'Shelter 0.60192600 1567890228',0);
INSERT INTO `shelters` VALUES (5,'Shelter 0.56217100 1567890248',0);
INSERT INTO `shelters` VALUES (6,'Shelter 0.40715000 1567890296',0);
INSERT INTO `shelters` VALUES (7,'Shelter 0.20720600 1567890394',0);
INSERT INTO `shelters` VALUES (8,'Shelter 0.30651300 1567890411',0);
INSERT INTO `shelters` VALUES (9,'Shelter 0.43665600 1567890514',0);
INSERT INTO `shelters` VALUES (10,'Shelter 0.04089700 1567890534',0);
INSERT INTO `shelters` VALUES (11,'Shelter 0.57545900 1567890600',0);
INSERT INTO `shelters` VALUES (12,'Shelter 0.57800800 1567930460',0);
INSERT INTO `shelters` VALUES (13,'Shelter 0.38806500 1567930799',0);
INSERT INTO `shelters` VALUES (14,'Shelter 0.48599400 1567931295',0);
INSERT INTO `shelters` VALUES (15,'Shelter 0.50133400 1567931631',0);
INSERT INTO `shelters` VALUES (16,'Shelter 0.33321900 1567931783',0);
INSERT INTO `shelters` VALUES (17,'Shelter 0.24420700 1567932985',0);
INSERT INTO `shelters` VALUES (18,'Shelter 0.24855900 1567933018',0);
INSERT INTO `shelters` VALUES (19,'Shelter 0.98335200 1567933078',0);
INSERT INTO `shelters` VALUES (20,'Shelter 0.49751400 1567933147',0);
INSERT INTO `shelters` VALUES (21,'Shelter 0.01073600 1567933194',0);
INSERT INTO `shelters` VALUES (22,'Shelter 0.78227800 1567933208',0);
INSERT INTO `shelters` VALUES (23,'Shelter 0.02188100 1567933238',0);
INSERT INTO `shelters` VALUES (24,'Shelter 0.07895800 1567933249',0);
INSERT INTO `shelters` VALUES (25,'Shelter 0.30833500 1567933261',0);
INSERT INTO `shelters` VALUES (26,'Shelter 0.07446300 1567933326',0);
INSERT INTO `shelters` VALUES (27,'Shelter 0.95900400 1567933478',0);
INSERT INTO `shelters` VALUES (28,'Shelter 0.56543900 1567933494',0);
INSERT INTO `shelters` VALUES (29,'Shelter 0.50334400 1567933509',0);
INSERT INTO `shelters` VALUES (30,'Shelter 0.38185900 1567933531',0);
INSERT INTO `shelters` VALUES (31,'Shelter 0.55673300 1567933539',0);
INSERT INTO `shelters` VALUES (32,'Shelter 0.73800700 1567933556',0);
INSERT INTO `shelters` VALUES (33,'Shelter 0.25076100 1567933573',0);
INSERT INTO `shelters` VALUES (34,'Shelter 0.53292600 1567933591',0);
INSERT INTO `shelters` VALUES (35,'Shelter 0.28370000 1567933606',0);
INSERT INTO `shelters` VALUES (36,'Shelter 0.46899800 1567933623',0);
INSERT INTO `shelters` VALUES (37,'Shelter 0.20909700 1567933651',0);
INSERT INTO `shelters` VALUES (38,'Shelter 0.16904300 1567934276',0);
INSERT INTO `shelters` VALUES (39,'Shelter 0.92749000 1567934286',0);
INSERT INTO `shelters` VALUES (40,'Shelter 0.58136900 1567934500',0);
INSERT INTO `shelters` VALUES (41,'Shelter 0.98159500 1567934567',0);
INSERT INTO `shelters` VALUES (42,'Shelter 0.66218800 1567934576',0);
INSERT INTO `shelters` VALUES (43,'Shelter 0.15490700 1567934905',0);
INSERT INTO `shelters` VALUES (44,'Shelter 0.38581700 1567934942',0);
INSERT INTO `shelters` VALUES (45,'Shelter 0.29744400 1567935200',0);
INSERT INTO `shelters` VALUES (47,'',0);
INSERT INTO `shelters` VALUES (48,'',0);
INSERT INTO `shelters` VALUES (49,'Shelter test',0);
INSERT INTO `shelters` VALUES (50,'Shelter test',0);
INSERT INTO `shelters` VALUES (51,'Shelter test',0);
INSERT INTO `shelters` VALUES (52,'Shelter test',0);
INSERT INTO `shelters` VALUES (53,'Shelter test',0);
INSERT INTO `shelters` VALUES (54,'Shelter test',0);
INSERT INTO `shelters` VALUES (55,'Shelter test',0);
INSERT INTO `shelters` VALUES (56,'Shelter test',0);
INSERT INTO `shelters` VALUES (57,'Shelter test',0);
INSERT INTO `shelters` VALUES (58,'Shelter test',0);
INSERT INTO `shelters` VALUES (59,'Shelter test',0);
INSERT INTO `shelters` VALUES (60,'Shelter test',0);
INSERT INTO `shelters` VALUES (61,'Shelter test',0);
INSERT INTO `shelters` VALUES (62,'Shelter test',0);
INSERT INTO `shelters` VALUES (63,'Shelter test',0);
INSERT INTO `shelters` VALUES (64,'Shelter test',0);
INSERT INTO `shelters` VALUES (65,'',0);
INSERT INTO `shelters` VALUES (66,'',0);
INSERT INTO `shelters` VALUES (67,'',0);
INSERT INTO `shelters` VALUES (68,'',0);
INSERT INTO `shelters` VALUES (69,'',0);
INSERT INTO `shelters` VALUES (70,'',0);
INSERT INTO `shelters` VALUES (71,'Joselito''s Shelter',0);
INSERT INTO `shelters` VALUES (72,'Joselito''s Shelter',0);
INSERT INTO `shelters` VALUES (73,'My new place',0);
INSERT INTO `shelters` VALUES (74,'',0);
INSERT INTO `shelters` VALUES (75,'',0);
INSERT INTO `shelters` VALUES (76,'not defined',0);
INSERT INTO `shelters` VALUES (77,'not defined',0);
INSERT INTO `shelters` VALUES (78,'not defined',0);
INSERT INTO `shelters` VALUES (79,'not defined',0);
INSERT INTO `shelters` VALUES (80,'Joselito''s Shelter',0);
INSERT INTO `shelters` VALUES (81,'My new place',0);
INSERT INTO `shelters` VALUES (82,'My new place',0);
INSERT INTO `shelters` VALUES (83,'name here',0);
CREATE TABLE IF NOT EXISTS `animals` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`shelterId`	INTEGER NOT NULL,
	`temporaryName`	TEXT NOT NULL,
	`picture`	TEXT,
	`medicalCondition`	TEXT,
	`suposedRace`	TEXT,
	`adoptable`	INTEGER NOT NULL DEFAULT 0,
	FOREIGN KEY(`shelterId`) REFERENCES `shelters`(`id`)
);
INSERT INTO `animals` VALUES (1,1,'fluffy cat',NULL,NULL,NULL,0);
INSERT INTO `animals` VALUES (2,1,'baby',NULL,NULL,NULL,0);
INSERT INTO `animals` VALUES (3,3,'black dog',NULL,NULL,NULL,0);
CREATE TABLE IF NOT EXISTS `adoptionRequests` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`adopterId`	INTEGER NOT NULL,
	`animalId`	INTEGER NOT NULL,
	FOREIGN KEY(`adopterId`) REFERENCES `adopters`(`id`)
);
CREATE TABLE IF NOT EXISTS `adopters` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	TEXT NOT NULL,
	`email`	TEXT NOT NULL,
	`phone`	TEXT NOT NULL
);
COMMIT;
