SET NAMES utf8;
SET CHARACTER SET utf8;

CREATE DATABASE catalog DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

CONNECT catalog;

CREATE TABLE Product
(
	id int NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) character set utf8 collate utf8_unicode_ci,
	description TEXT character set utf8 collate utf8_unicode_ci,
	width DECIMAL(7,2),
	length DECIMAL(7,2),
	height DECIMAL(7,2),
	weight DECIMAL(8,2),
	dollarValue DECIMAL(8,2),
	numInStock int,
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
				ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
	/*FOREIGN KEY (source) REFERENCES source(sc_id)*/
);

CREATE TABLE Customer
(
	id int NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) character set utf8 collate utf8_unicode_ci,
	address1 VARCHAR(100) character set utf8 collate utf8_unicode_ci,
	address2 VARCHAR(100) character set utf8 collate utf8_unicode_ci,
	city VARCHAR(100) character set utf8 collate utf8_unicode_ci,
	state VARCHAR(5) character set utf8 collate utf8_unicode_ci,
	zip int,
	phone varchar(20) character set utf8,
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
			ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);

CREATE TABLE ProductOrder
(
	id int NOT NULL AUTO_INCREMENT,
	product_id int NOT NULL,
	customer_id int NOT NULL,
	quantity int NOT NULL,
	orderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY (product_id) REFERENCES Product(id),
	FOREIGN KEY (customer_id) REFERENCES Customer(id)
);



/*INSERT INTO Word (W_Id, WordText) VALUES (1, '!EXCLAMATION-POINT');*/
