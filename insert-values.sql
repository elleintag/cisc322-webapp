use restaurantdb;

insert into customerAccount(emailAddress, firstName, lastName, cellNum, streetAddress, city, pc, creditAmt)
        values('scoups@gmail.com', 'Seungcheol', 'CHOI', 4160526015, '13 Seventeenth Ave', 'Caratland', 'C0R5A2', 26.00);

insert into foodOrder(orderID, totalPrice, tip)
        values(0526, 12.00, 1.50);

insert into food(name)
        values('Pizza');

insert into restaurant(name, streetAddress, city, pc, url)
        values('Pizza Pizza', '4 Main St N', 'Markham', 'L3P1X2', 'pizzapizza.com');

insert into employee(ID, firstName, lastName, emailAddress, restaurantName)
        values(127, 'Johnny', 'SUH', 'johnny127@gmail.com', 'Pizza Pizza');

insert into deliveryPerson(empID)
        values(127);

insert into orderPlacement(customerEmail, orderID, restaurant, orderDate, orderTime)
        values('scoups@gmail.com', 0526, 'Pizza Pizza', '2023-04-05', '12:30:00');

insert into menu(restaurant, food, price)
        values('Pizza Pizza', 'Pizza', 12.00);

insert into foodItemsinOrder(orderID, food)
        values(0526, 'Pizza');

insert into delivery(orderID, deliveryPerson, deliveryTime)
        values(0526, 127, '13:00:00');

insert into worksAt(employeeID, restaurant)
        values(127, 'Pizza Pizza');

insert into shift(empID, day, startTime, endTime)
        values (127, 'Monday', '10:30:00', '15:30:00'),
               (127, 'Saturday', '10:30:00', '15:30:00');