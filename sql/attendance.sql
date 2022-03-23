drop database if exists rfid;
create database rfid;
use rfid;

CREATE TABLE IF NOT EXISTS `rfid` (
    `rfidNo` varchar(20) NOT NULL,
    `employeeName` varchar(50) NOT NULL,
    `dateTimeAdded` date NOT NULL,
    constraint rfidNo_pk primary key (rfidNo)
);

insert into rfid
values ("123456789", "user1", "2021-11-22");

insert into rfid
values ("987654321", "user2", "2021-03-22");


CREATE TABLE IF NOT EXISTS `attendance` (
    `rfidNo` varchar(20)  NOT NULL,
    `employeeName` varchar(50) NOT NULL,
    `starttime` time  NOT NULL,
    `endtime` time  NOT NULL,
    `dateTimeAdded` date NOT NULL,
    constraint attendance_pk primary key (rfidNo)
    
);

ALTER TABLE rfid.attendance
ADD foreign key attendancee_fk(rfidNo)
REFERENCES rfid.rfid(rfidNo);

insert into attendance
values ("123456789", "user1", "00:00:01","21:04:38", "2021-11-22");

insert into attendance
values ("987654321", "user2", "10:02:24","23:53:45", "2021-03-22");