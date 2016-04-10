create table `users` (
	id int primary key not null auto_increment,
	name text not null,
	password text not null,
	type int not null
) DEFAULT CHARACTER SET=utf8;

create table `news` (
    `id` int not null auto_increment primary key unique,
    `news_id` int,
    `title` text,
    `content` text,
    `author` text,
    `category_id` int,
    `created` date,
    `images` int,
    `image_src1` text,
    `image_src2` text,
    `image_alt1` text,
    `image_alt2` text
) CHARACTER SET 'utf8';

create table `images` (
    `image_id` int
) CHARACTER SET 'utf8';
