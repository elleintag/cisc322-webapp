
drop database if exists restaurantdb;
create database restaurantdb;
use restaurantdb;

create table customerAccount(
    emailAddress varchar(100),
    firstName varchar(100),
    lastName varchar(100),
    cellNum char(10),
    streetAddress varchar(100),
    city varchar(100),
    pc char(6),
    creditAmt decimal(6, 2),
    primary key (emailAddress));

create table foodOrder(
	orderID integer,
	totalPrice decimal(6,2),
	tip decimal(6, 2),
	primary key (orderID));

create table food (
	name varchar(100),
	primary key (name));

create table restaurant(
	name varchar(100),
	streetAddress varchar(100),
	city varchar(100),
	pc char(6),
	url varchar(200),
	primary key (name));

create table employee(
	ID integer,
	firstName varchar(100),
	lastName varchar(100),
	emailAddress varchar(100),
    restaurantName varchar(100),
    foreign key(restaurantName) references restaurant(name),
	primary key (ID));

create table manager(
	empid integer primary key,
	foreign key (empid) references employee(ID) on delete cascade);

create table serverStaff(
	empid integer primary key,
	foreign key (empid) references employee(ID) on delete cascade);

create table chef(
	empid integer primary key,
	foreign key (empid) references employee(ID) on delete cascade);

create table deliveryPerson(
	empid integer primary key,
	foreign key (empid) references employee(ID) on delete cascade);

create table payment(
	customerEmail varchar(100),
	date date not null,
	paymentAmount decimal(6,2) not null,
	primary key (customerEmail, date),
	foreign key (customerEmail) references customerAccount(emailAddress) on delete cascade);

create table shift(
	empID integer not null,
	day varchar(15) not null,
	startTime time not null,
	endTime time not null,
	primary key (empID, day),
	foreign key (empID) references employee(ID) on delete cascade);


create table chefCredentials (
	empID integer not null,
	cred varchar(30),
	primary key (empID, cred),
	foreign key (empID) references employee(ID) on delete cascade);

create table orderPlacement(
	customerEmail varchar(100) not null,
	orderID integer not null,
	restaurant varchar(100) not null,
    orderDate date,
	orderTime time,
	primary key (customerEmail, orderID, restaurant),
	foreign key (customerEmail) references customerAccount(emailAddress) on delete cascade,
	foreign key (orderID) references foodOrder(orderID) on delete cascade,
	foreign key (restaurant) references restaurant(name) on delete cascade);

create table relatedTo(
	customer varchar(100) not null,
	employee integer not null,
	relationship varchar(100),
	primary key (customer, employee),
	foreign key (customer) references customerAccount(emailAddress) on delete cascade,
	foreign key (employee) references employee(ID) on delete cascade);

create table menu(
	restaurant varchar(100) not null,
	food varchar(100) not null,
	price decimal(6, 2),
	primary key (restaurant, food),
	foreign key (restaurant) references restaurant(name) on delete cascade,
	foreign key (food) references food (name) on delete cascade);

create table foodItemsinOrder(
	orderID integer not null,
	food varchar(100) not null,
	primary key (orderID, food),
	foreign key (orderID) references foodOrder(orderID) on delete cascade,
	foreign key (food) references food(name) on delete cascade);

create table delivery(
	orderID integer not null,
	deliveryPerson integer not null,
	deliveryTime time,
	primary key (orderID, deliveryPerson),
	foreign key (orderID) references foodOrder(orderID) on delete cascade,
	foreign key (deliveryPerson) references employee(id) on delete cascade);

create table worksAt(
	employeeID integer not null,
	restaurant varchar(100) not null,
	primary key (employeeID, restaurant),
	foreign key (employeeID) references employee(ID) on delete cascade,
	foreign key (restaurant) references restaurant(name) on delete cascade);

