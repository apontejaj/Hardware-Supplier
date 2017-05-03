# Hardware-Supplier
Implementation of a Web Based application to administrate mySQL database

This is web application to allow customers to purchase goods online. Specifically, it allow customers to login and purchase items that are for sale.

In addition to this, employees of the company are able to view products available, add products and manage shipping for each customer.

# User Accounts

As the system is meant to be used by a number of different people, different user account types exist created. Depending on the account type, different options in the system are available to them.

●	Customer - A customer is able to log into the system and select a number of items to purchase. Once they have added the items to their cart, they are brought to an “Order Complete” page, logging details of their order in a database and providing a unique ID number for their order.
Sample customer user: "d"   Password: "f"
●	System Admin - The system admin is able to view all of the user accounts in the system and view a list of usernames and passwords associated to each user.
Sample admin user: "michael"   Password: "mcgloin"
●	Staff Member - A staff member is able to add new products into the database, view a list of all products currently in the system and modify any of the information for each of the products.
Sample staff user: "amilcar"  Password: "aponte"
●	Delivery Department - The delivery department is able to view all of the orders that are placed in the system, and print out order packing slips which provides information about the user’s address and the products that are being shipped to them.
Sample delivery user: "kyle"  Password "goslin"

# mySQL Database

The document hardware_supplier.sql include the complete set of instructions to create a complete sample data base. The sample users have already been incluided in this database.

The program have been written using "root" as user for mySQL, and an empty password in the port 3306 of the local host.
