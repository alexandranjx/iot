drop database if exists rfid;
create database rfid;
use rfid;

CREATE TABLE IF NOT EXISTS `rfid` (
    -- `countRFID` integer auto_increment NOT NULL,
    `rfidNo` varchar(20) NOT NULL,
    `employeeName` varchar(50) NOT NULL,
    `dateTimeAdded` date NOT NULL,
    constraint rfidNo_pk primary key (rfidNo)
);

insert into rfid
values ("123456789", "user1", "2021-11-22");

insert into rfid
values ("987654321", "user2", "2021-03-22");