--    CISC-360 2023W
   
--    Name:   Joelle intag
--    Student Number: 20166467
--    Email:  18jcl4@queensu.ca

--    I confirm that this assignment solution is my own work and conforms to 
--    Queen's standards of Academic Integrity


-- Create database restaurantDb

drop database if exists restaurantDB;
create database restaurantDB;
use restaurantDB;


-- Strong Entities

create table Restaurant (
    restName varchar(100) not null,
    restURL varchar(70) not null,
    restAddress varchar(100) not null,
    primary key(restName));

create table Employee (
    id integer not null,
    firstName varchar(50),
    lastName varchar(50),
    email varchar(50),
    restName varchar(50) not null,
    schedDays char(10) not null,
    foreign key (restName) references Restaurant(restName), 
    primary key(id)); 

create table Customer (
    phone char(10) not null,
    custAddress varchar(40) not null,
    email varchar(50) not null,
    firstName varchar(50) not null,
    lastName varchar(50) not null,
    dateOfPayment date not null,
    primary key(email));


-- Weak Entities 

create table Menu (
    foodItem varchar(50) not null,
    price decimal(5,2) not null,
    restName varchar(50) not null,
    custEmail varchar(50) not null,
    foreign key (restName) references Restaurant(restName) on delete cascade,
    foreign key (custEmail) references Customer(email) on delete cascade,
    primary key(foodItem));

create table WeeklySchedule (
    schedDays char(10) not null, 
    startTime time not null,
    endTime time not null,
    employeeID integer not null,
    foreign key (employeeID) references Employee(id) on delete cascade,
    primary key (schedDays, employeeID));

create table Account (
    payments integer,
    credit decimal(5,2),
    dateOfPayment date not null,
    custEmail varchar(50) not null,
    foreign key (custEmail) references Customer(email) on delete cascade,
    primary key(dateOfPayment, custEmail));


-- N:M Relationships

create table EmployeeKnowsCustomer (
    employeeID integer not null,
    custEmail varchar(50) not null,
    foreign key (employeeID) references Employee(id) on delete cascade,
    foreign key (custEmail) references Customer(email) on delete cascade,
    primary key (employeeID, custEmail));

create table CustomerOrdering (
    custEmail varchar(50) not null,
    foodItem varchar(50) not null,
    tip decimal(5,2),
    timeofPlacement time not null,
    orderDate date not null,
    items varchar(50) not null, 
    orderID integer not null,
    total decimal(5,2) not null,
    deliveryTime time not null,
    deliveryPerson varchar(50) not null,
    foreign key (custEmail) references Customer(email) on delete cascade,
    foreign key (foodItem) references Menu(foodItem) on delete cascade,
    primary key (orderID, custEmail, foodItem));


-- Multi-valued Attributes

create table EmployeeType (
    employeeID integer not null,
    employeeType char(20) not null,
    restName varchar(50) not null,
    foreign key (employeeID) references Employee(id),
    foreign key (restName) references Restaurant(restName),
    primary key (employeeType, employeeID, restName));

create table ChefCredentials (
    chefCredentials varchar(50) not null,
    employeeID integer not null,
    restName varchar(50) not null,
    foreign key (employeeID) references Employee(id),
    foreign key (restName) references Restaurant(restName),
    primary key (chefCredentials, employeeID, restName))




