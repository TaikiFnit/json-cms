create table `news` (
    `news_id` int not null primary key unique,
    `title` text,
    `content` text,
    `author` text,
    `created` date,
    index(`news_id`)
) CHARACTER SET 'utf8' ENGINE=InnoDB;

create table `images` (
    `image_id` int not null auto_increment primary key unique,
    `news_id` int,
    `image_src` text,
    `image_alt` text,
    foreign key(`news_id`) references `news`(`news_id`) ON DELETE cascade
) CHARACTER SET 'utf8' ENGINE=InnoDB;

