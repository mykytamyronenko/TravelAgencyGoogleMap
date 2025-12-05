drop database if exists travel_agency;
create database if not exists travel_agency character set ='utf8';

use travel_agency;

create table if not exists user(
id_user tinyint not null auto_increment,
username varchar(30) not null,
password char(64) not null,
role enum('admin','user') not null,
last_name varchar(30) not null,
first_name varchar(30) not null,
district varchar(30) not null,
country varchar(30) not null,
image_data varchar(255),
primary key(id_user)
)engine=innodb;

create table if not exists destination(
id_destination tinyint not null auto_increment,
name_destination varchar(50) not null,
fly_duration time not null,
travel_distance smallint not null,
id_user tinyint not null,
primary key(id_destination),
key(id_user)
)engine=innodb;

create table if not exists airport(
id_airport tinyint not null auto_increment,
name_airport varchar(50) not null,
travel_time_car time not null,
travel_distance_car smallint not null,
id_user tinyint not null,
primary key(id_airport),
key(id_user)
)engine=innodb;

create table if not exists hotel(
id_hotel tinyint not null auto_increment,
placeId_hotel varchar(255) not null,
id_destination tinyint not null,
primary key(id_hotel),
key(id_destination)
)engine=innodb;


alter table destination add constraint fkuserdestination 
foreign key(id_user) references user(id_user);

alter table airport add constraint fkuserairport 
foreign key(id_user) references user(id_user);

alter table hotel add constraint fkuserhotel 
foreign key(id_destination) references destination(id_destination);

insert into user (username, password, role, last_name, first_name, image_data) values
    ('admin','$2y$10$AqOgwWZQJJ.clVu2kz/XouvX12.YMyjBhN4PCqgh6uYuIbsu97JK.', 'admin','admin_last_name','admin_first_name', null);
    
