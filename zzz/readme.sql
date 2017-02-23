-- New table for inserting staffid and ip
create table `z_stafflog` (
  `id` int unsigned not null auto_increment,
  `staffid` varchar(8) not null,
  `ip` varchar(16) not null,
  `updatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (`id`)
  );
