create table `medium`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar (64),
	`web_id` varchar(64),
	`config` text,
	`updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`created_on` timestamp DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (`id`),
	UNIQUE KEY `unq_web_id` (`web_id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


create table `article`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`medium_id` int(11),
	`title` varchar(128),
	`body` longtext,
	`description` text,
	`author` varchar (64),
	`date_published` timestamp DEFAULT '0000-00-00 00:00:00',
	`updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`created_on` timestamp DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (`id`),
	UNIQUE KEY `unq_title` (`title`, `medium_id`),
	KEY `fk__medium__user` (`medium_id`),
	CONSTRAINT `fk__medium__user` FOREIGN KEY (`medium_id`) REFERENCES `medium`(`id`)
) ENGINE=INNODB AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8;
