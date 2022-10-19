CREATE DATABASE concert_hall;
USE concert_hall;

CREATE TABLE concerts (
	id INT PRIMARY KEY AUTO_INCREMENT,
    artist varchar(30) not null,
	venue varchar(30) not null,
    dates DATE not null,
    price DOUBLE not null,
    img varchar(40) not null
);

CREATE TABLE users (
	id INT PRIMARY KEY AUTO_INCREMENT,
    first_name varchar(30) not null,
	last_name varchar(30) not null,
    email varchar(40) not null unique,
    _password varchar (255) not null,
    _role varchar(5)    
);

CREATE TABLE users_concerts (
	user_id INT not null,
    concert_id INT not null,
     constraint user_concert primary key (user_id, concert_id),
     constraint foreign key (user_id) references users(id),
     constraint foreign key (concert_id) references concerts(id)
);

INSERT INTO users (first_name, last_name, _password, email, _role)
VALUES 
	("Peter", "Griffin", "$argon2i$v=19$m=65536,t=4,p=1$Tkp4U1FDeHJRM3R1Zzdwaw$XRE28dXzj48qZcht77D9vdxONVKH+qryva2W1nn+srU", "peter_griff@gmail.com", "ADMIN"),
	("Joe", "Swanson", "$argon2i$v=19$m=65536,t=4,p=1$Tkp4U1FDeHJRM3R1Zzdwaw$XRE28dXzj48qZcht77D9vdxONVKH+qryva2W1nn+srU", "squirrel_911@gmail.com", "USER");

INSERT INTO concerts (artist, venue, dates, price, img)
VALUES 
	("Twenty One Pilots", "TD Garden", "2022-05-12", 130.00, "src/views/images/21pilots.jpeg"),
	("Dua Lipa", "Madison Square Garden", "2022-05-21", 150.00, "src/views/images/dualipa.jpeg"),
	("Grandson", "Ultra Stadium", "2022-05-23", 90.00, "src/views/images/grandson.jpeg"),
	("Landa Del Rey", "Desert Festival", "2022-06-06", 100.00, "src/views/images/lanadelrey.jpeg"),
	("Paramore", "BlueHall", "2022-06-17", 120.00, "src/views/images/paramore.jpeg"),
	("Rammstein", "Germany", "2022-06-25", 160.00, "src/views/images/rammstein.jpeg");


INSERT INTO users_concerts
VALUES (1, 2), (1, 4);
