drop database if exists iot;
create database iot;
use iot;

CREATE TABLE IF NOT EXISTS `rfid` (
    `rfidNo` varchar(20) NOT NULL,
    `employeeName` varchar(50) NOT NULL,
    `dateTimeAdded` date NOT NULL,
    constraint rfidNo_pk primary key (rfidNo)
);

insert into rfid
values ("195102108001", "Peter", "2021-11-22");

insert into rfid
values ("211089233023", "Sam", "2021-03-22");


-- CREATE TABLE IF NOT EXISTS `attendance` (
--     `rfidNo` varchar(20)  NOT NULL,
--     `employeeName` varchar(50) NOT NULL,
--     `starttime` time  NOT NULL,
--     `endtime` time  NOT NULL,
--     `dateTimeAdded` date NOT NULL,
--     constraint attendance_pk primary key (rfidNo)
    
-- );

-- ALTER TABLE rfid.attendance
-- ADD foreign key attendancee_fk(rfidNo)
-- REFERENCES rfid.rfid(rfidNo);

-- insert into attendance
-- values ("123456789", "user1", "00:00:01","21:04:38", "2021-11-22");

-- insert into attendance
-- values ("987654321", "user2", "10:02:24","23:53:45", "2021-03-22");


CREATE TABLE IF NOT EXISTS `operatorActivities` (
    `rfidNo` varchar(20)  NOT NULL,
    `employeeName` varchar(100) NOT NULL,
    `excavatorNo` varchar(1000),
    `site` varchar(100) NOT NULL,
    `starttime` time  NOT NULL,
    `endtime` time  NOT NULL,
    `dateTimeAdded` date NOT NULL
    
);

insert into operatorActivities
values ("195102108001", "Peter", "DSE23","Paya Lebar - Dig ground and soil", "07:00:00", "13:30:00", "2022-03-26");
insert into operatorActivities
values ("195102108001", "Peter", "WER123","Woodlands - Dig soil ","15:00:00", "18:30:00", "2022-03-26");
insert into operatorActivities
values ("195102108001", "Peter", "SER234","SMU School of Economics - Ground works ", "07:00:00", "18:30:00", "2022-03-27");
insert into operatorActivities
values ("195102108001", "Peter", "WER123","SMU School of Accounting - Dig ground and soil","07:00:00", "18:30:00", "2022-03-28");
insert into operatorActivities
values ("195102108001", "Peter", "DSE23","Paya Lebar - Ground works", "07:00:00", "18:30:00", "2022-03-29");
insert into operatorActivities
values ("195102108001", "Peter", "MOER343","Tuas - Spare worker", "07:00:00", "18:30:00", "2022-03-30");
insert into operatorActivities
values ("195102108001", "Peter", "TRE434","SMU School of Economics - Ground Works","07:00:00", "18:30:00", "2022-04-01");


CREATE TABLE IF NOT EXISTS `operatorAttendance` (
    `rfidNo` varchar(20)  NOT NULL,
    `employeeName` varchar(100) NOT NULL,
    `excavatorNo` varchar(1000) NOT NULL,
    `location` varchar(100) NOT NULL,
    `starttime` time  NOT NULL,
    `endtime` time  ,
    `dateTimeAdded` date NOT NULL
    
);

insert into operatorAttendance
values ("195102108001", "Peter", "DSE23","Paya Lebar", "07:01:00", "13:30:00", "2022-03-26");
insert into operatorAttendance
values ("195102108001", "Peter", "WER123", "Woodlands", "15:00:00", "18:30:00", "2022-03-26");
insert into operatorAttendance
values ("195102108001", "Peter", "SER234","SMU School of Economics", "07:00:00", "18:35:00", "2022-03-27");
insert into operatorAttendance
values ("195102108001", "Peter", "WER123","SMU School of Accounting", "06:58:00", "18:32:00", "2022-03-28");
insert into operatorAttendance
values ("195102108001", "Peter", "DSE23","Paya Lebar", "06:56:00", "18:31:00", "2022-03-29");
insert into operatorAttendance
values ("195102108001", "Peter", "MOER343","Tuas", "06:47:00", "18:39:00", "2022-03-30");
insert into operatorAttendance
values ("195102108001", "Peter", "TRE434","SMU School of Economics", "07:00:00", "18:40:00", "2022-04-01");


CREATE TABLE IF NOT EXISTS `reportExcavator` (
    `rfidNo` varchar(20)  NOT NULL,
    `employeeName` varchar(100) NOT NULL,
    `location` varchar(100) NOT NULL,
    `excavatorNo` varchar(1000),
    `issue` varchar(1000),
    `dateTimeAdded` date NOT NULL
);

insert into reportExcavator
values ("195102108001", "Peter", "Paya Lebar", "DSE23", "Wheels cant move", "2022-03-26");
insert into reportExcavator
values ("195102108001", "Peter", "Tuas", "MOER343", "Water Leak", "2022-03-30");