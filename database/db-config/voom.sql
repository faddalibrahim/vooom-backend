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
insert into buses(bus_no,start_loc, destination,departure_time,arrival_time,capacity,availability) value('GT-12','Ashesi','Kwabenya','5:00','7:00',30,'yes');

insert into staff(first_name,last_name,email,password) values('Gideon','Bonsu','gideon.bonsu@ashesi.edu.gh','tui');

insert into payment(date_of_payment,amount) values('02-02-22',3);

insert into tickets(staff_id,bus_id,payment_id) values(1,1,1);
