# Employee Management System (EMS) Repository
This repository contains a Simple Employee Management System (EMS) developed using PHP, JavaScript, jQuery, CSS, and SQL. Below are instructions for setting up the system:

## Database Setup:
1. Import the database **.sql** file located in **db/db.sql**.
2. Ensure the database name is set to **ems**. If you choose a different name, edit **config/db.php** and update the connection string: 
```
$con = mysqli_connect("localhost","root","","NAMEHERE");
```
## Data Generation (Optional):
1. Alternatively, you can generate your own data by running the Python script located in **db/db.py**.
2. This script allows for random name generation. The results will be accessible in **db/db.txt**, where you can copy and paste the generated data as a query into your preferred SQL handler.

### Note:
Please be aware that this repository does not provide CSS files for Bootstrap, Popper, Sweet Alert, or script files for jQuery. Instead, they were grabbed using jsDelivr CDN. You may need to include them separately if required.
