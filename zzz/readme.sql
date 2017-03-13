-- New table for inserting staffid and ip
create table `z_stafflog` (
  `id` int unsigned not null auto_increment,
  `staffid` varchar(8) not null,
  `ip` varchar(16) not null,
  `updatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (`id`)
  );

-- New table for audit history
CREATE TABLE `z_historylog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `system_id` int(10) NOT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `serial` varchar(45) DEFAULT NULL,
  `cpu` varchar(45) DEFAULT NULL,
  `cpuspeed` varchar(16) DEFAULT NULL,
  `memorysize` varchar(16) DEFAULT NULL,
  `hdsize` varchar(16) DEFAULT NULL,
  `monitor` varchar(45) DEFAULT NULL,
  `ccc` varchar(8) DEFAULT NULL,
  `location` varchar(5) DEFAULT NULL,
  `department` varchar(16) DEFAULT NULL,
  `staffid` varchar(8) DEFAULT NULL,
  `purpose` varchar(45) DEFAULT NULL,
  `po` varchar(16) DEFAULT NULL,
  `base` varchar(3) DEFAULT NULL,
  `purchaseon` varchar(16) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `remark` varchar(45) DEFAULT NULL,
  `os` varchar(45) DEFAULT NULL,
  `auditdate` varchar(45) DEFAULT NULL,
  `uuid` varchar(45) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `mac` varchar(45) DEFAULT NULL,
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
); 

-- load staff info (Excel file from Scarlet) to database
load data local infile '/tmp/staff1.csv' into table staff fields terminated by ',' enclosed by '"' lines terminated by '\n' ignore 1 lines (`name`,`title`,`staffid`,@var1,@var2,`ccc`,`location`) set telno=replace(replace(@var1,'-','0'),' ',''),mobileno=replace(replace(@var2,'-','0'),' ','');
