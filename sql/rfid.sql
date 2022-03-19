drop database if exists rfid;
create database rfid;
use rfid;

CREATE TABLE IF NOT EXISTS `rfid` (
    `countRFID` integer auto_increment NOT NULL,
    `rfidNo` varchar(20) NOT NULL,
    `employeeName` varchar(50) NOT NULL,
    `dateTimeAdded` timestamp NOT NULL,
    constraint countRFID_pk primary key (countRFID)
);


/* Enrolment */
insert into rfid
values (1, "123456789", "user1", "2021-11-22 00:00:01");

insert into rfid
values (2, "987654321", "user2", "2021-03-22 00:00:01");

