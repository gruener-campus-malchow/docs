drop table if exists `slides`;
create table if not exists `slides` (
	`id` varchar(16) primary key not null,
	`content` blob,
	`admin_key` text not null,
	`created` datetime default current_timestamp,
	`last_accessed` datetime default current_timestamp
);
