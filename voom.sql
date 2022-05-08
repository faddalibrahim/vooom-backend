drop database if exists voom;
create database voom;
use voom;

create table buses(
	bus_id integer auto_increment,
	bus_no varchar(50),
    start_loc varchar(50),
    destination varchar(50),
    departure_time time,
    arrival_time time,
    capacity integer,
    availability Enum("yes","no"),
    primary key (bus_id)
);
create table staff(
	staff_id integer auto_increment,
	first_name varchar(100),
    last_name varchar(100),
    email varchar(100),
    password varchar(15),
    primary key(staff_id)   
);

create table payment(
	payment_id integer auto_increment,
    date_of_payment date,
    amount integer,
    staff_id integer,
    primary key(payment_id),
    foreign key(staff_id) references staff(staff_id) ON DELETE CASCADE
);
create table tickets(
	ticket_id integer auto_increment,
    staff_id integer,
    bus_id integer,
    payment_id integer,
    primary key(ticket_id),
    foreign key(staff_id) references staff(staff_id) ON DELETE CASCADE ,
    foreign key(bus_id) references buses(bus_id) ON DELETE CASCADE,
    foreign key(payment_id) references payment(payment_id) ON DELETE CASCADE

);

create table notifications(
	notification_id integer auto_increment primary key,
	message varchar(200),
	sender varchar(100),
	dateSent date
);

create table drivers(
driver_id integer auto_increment,
bus_id integer,
first_name varchar(100),
last_name varchar(100),
pin integer,
primary key(driver_id),
foreign key(bus_id) references buses(bus_id) ON DELETE CASCADE
);

  
-- QUERIES

-- Insert Queries

-- Buse
insert into buses(bus_no,start_loc, destination,departure_time,arrival_time,capacity,availability) value('GT-12','Ashesi','Kwabenya','5:00','8:00',50,'yes');
insert into buses(bus_no,start_loc, destination,departure_time,arrival_time,capacity,availability) value('GT-13','Ashesi','Kwabenya','5:00','3:00',60,'no');
insert into buses(bus_no,start_loc, destination,departure_time,arrival_time,capacity,availability) value('GT-14','Ashesi','Kwabenya','5:00','2:00',70,'no');
insert into buses(bus_no,start_loc, destination,departure_time,arrival_time,capacity,availability) value('GT-15','Ashesi','Kwabenya','5:00','1:00',80,'yes');
insert into buses(bus_no,start_loc, destination,departure_time,arrival_time,capacity,availability) value('GT-16','Ashesi','Kwabenya','5:00','10:00',40,'yes');

insert into staff(first_name,last_name,email,password) values('Gideon','Bonsu','gideon.bonsu@ashesi.edu.gh','tui');
insert into staff(first_name,last_name,email,password) values('Silas','Sangmin','silas.sangmin@ashesi.edu.gh','bui');
insert into staff(first_name,last_name,email,password) values('Gideon','Bonsu','gideon.bonsu@ashesi.edu.gh','dui');
insert into staff(first_name,last_name,email,password) values('Gideon','Bonsu','gideon.bonsu@ashesi.edu.gh','oui');

insert into payment(date_of_payment,amount) values('02-02-22',3);

insert into tickets(staff_id,bus_id,payment_id) values(1,1,1);
