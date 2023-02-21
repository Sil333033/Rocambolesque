CREATE DATABASE IF NOT EXISTS `Rocambolesque`;
use `Rocambolesque`;

DROP TABLE IF EXISTS userPerRole;
DROP TABLE IF EXISTS Role;

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Contact;

DROP TABLE IF EXISTS Reservation;
DROP TABLE IF EXISTS Person;

DROP TABLE IF EXISTS `Table`;
DROP TABLE IF EXISTS OpeningTime;

DROP TABLE IF EXISTS Dish;
DROP TABLE IF EXISTS Category;
DROP TABLE IF EXISTS Price;
DROP TABLE IF EXISTS Menu;


CREATE TABLE `Person`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `firstName` VARCHAR(255) NOT NULL,
    `infix` VARCHAR(255) NULL,
    `lastName` VARCHAR(255) NOT NULL,
    `type` BIGINT NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL
) ENGINE=INNODB;

CREATE TABLE `Contact`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `personId` BIGINT NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` BIGINT NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL,
	FOREIGN KEY (personId) REFERENCES Person(id)
) ENGINE=INNODB;

CREATE TABLE `User`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `personId` BIGINT NOT NULL,
    `contactId` BIGINT NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL,
    FOREIGN KEY (`personId`) REFERENCES `Person`(`id`),
    FOREIGN KEY (`contactId`) REFERENCES `Contact`(`id`)
) ENGINE=INNODB;

CREATE TABLE `Role`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `typeRol` VARCHAR(255) NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL
) ENGINE=INNODB;

CREATE TABLE `userPerRole`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `roleId` BIGINT NOT NULL,
    `userId` BIGINT NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL,
    FOREIGN KEY (`roleId`) REFERENCES `Role`(`id`),
	FOREIGN KEY (`userId`) REFERENCES `User`(`id`)
) ENGINE=INNODB;

CREATE TABLE `Table`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `tableNumber` BIGINT NOT NULL,
    `chairs` BIGINT NOT NULL,
    `childChairs` BIGINT NOT NULL,
    `location` VARCHAR(255) NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL
) ENGINE=INNODB;

CREATE TABLE `OpeningTime`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `day` VARCHAR(255) NOT NULL,
    `timeFrom` TIME NOT NULL,
    `timeEnd` TIME NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL
) ENGINE=INNODB;

CREATE TABLE `Reservation`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `personId` BIGINT NOT NULL,
    `tableId` BIGINT NOT NULL,
    `dayId` BIGINT NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL,
    `reservationTime` BIGINT NOT NULL,
    FOREIGN KEY (`personId`) REFERENCES `Person`(`id`),
    FOREIGN KEY (`tableId`) REFERENCES `Table`(`id`),
    FOREIGN KEY (`dayId`) REFERENCES `OpeningTime`(`id`)
) ENGINE=INNODB;



CREATE TABLE `Menu`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `amount` TINYINT NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL
) ENGINE=INNODB;

CREATE TABLE `Price`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `priceEx` BIGINT NOT NULL,
    `priceIn` BIGINT NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL
) ENGINE=INNODB;

CREATE TABLE `Category`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `parentId` BIGINT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL
) ENGINE=INNODB;

CREATE TABLE `Dish`(
    `id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `priceId` BIGINT NOT NULL UNIQUE,
    `menuId` BIGINT NOT NULL,
    `categoryId` BIGINT NOT NULL,
    `isActive` TINYINT NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME NOT NULL,
    `updatedAt` DATETIME NOT NULL,
    FOREIGN KEY (`priceId`) REFERENCES `Price`(`id`),
    FOREIGN KEY (`menuId`) REFERENCES `Menu`(`id`),
    FOREIGN KEY (`categoryId`) REFERENCES `Category`(`id`)
) ENGINE=INNODB;