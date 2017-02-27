-- New table for inserting staffid and ip
create table `z_stafflog` (
  `id` int unsigned not null auto_increment,
  `staffid` varchar(8) not null,
  `ip` varchar(16) not null,
  `updatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (`id`)
  );

load data local infile '/tmp/staff1.csv' into table staff fields terminated by ',' enclosed by '"' lines terminated by '\n' ignore 1 lines (`name`,`title`,`staffid`,@var1,@var2,`ccc`,`location`) set telno=replace(replace(@var1,'-','0'),' ',''),mobileno=replace(replace(@var2,'-','0'),' ','');
