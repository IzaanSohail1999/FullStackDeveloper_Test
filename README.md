# FullStackDeveloper_Task

## Challenge 1: 

## Environment Setup

1. Clone the GitHub repository.
2. Go to `Challenge-1/human-resource-context-backend`.

### Configure the Database Credentials

1. Add a `.env` file in the root of the `human-resource-context-backend` directory.
2. Add the following credentials in the `.env` file:

DB_CONNECTION,
DB_HOST,
DB_PORT,
DB_DATABASE,
DB_USERNAME,
DB_PASSWORD,


These credentials will be used to connect to the database.

### Run Migrations

1. Run the following command to create tables in the connected database:
- php artisan migrate


The created migration file is named `2023_06_17_060217_human-resource-context-db-structure.php`. Special care was given to the architecture diagram provided and the relationship established in the diagram.
The down method is also provided for the task.

### Start the Backend Server

1. Run the following commands:

- composer update
- composer install
- php artisan serve


### Accessing the Views

#### PHP Blade View

1. To view the PHP Blade file, go to the following URL: `http://localhost:8000/attendance`.
2. Please note that if you are accessing the view on a PHP Blade file, uncomment lines 30, 31, and 45 in the `AttendanceController.php` file, and comment out lines 27 and 42.
3. Here is a sample of how the UI would look on a PHP Blade file:

![image](https://github.com/IzaanSohail1999/FullStackDeveloper_Test/assets/90548150/831a22ed-636e-49a0-863c-bee77f648159)

#### React App View

1. Go to the `Challenge-1/human-resource-context-frontend` directory.
2. Run the following commands:

- npm install
- npm start


3. To view the React app, go to `http://localhost:3000`.
4. Please note that if you are accessing the view on a React app, comment out lines 30, 31, and 45 in the `AttendanceController.php` file, and uncomment lines 27 and 42.
5. Here is a sample of how the UI would look on a React app:

![image](https://github.com/IzaanSohail1999/FullStackDeveloper_Test/assets/90548150/c5b74680-790f-43dd-a48b-6662b1d0fabb)

### Uploading Attendance Data

1. Both the PHP Blade view and the React app allow you to upload employee attendance data.
2. Use the provided dummy Excel file [attendance.xlsx](https://github.com/IzaanSohail1999/FullStackDeveloper_Test/files/11778479/attendance.xlsx) to understand the schema.

### Postman Collection

1. The Postman collection for API requests is available at the following link:
[Postman Collection](https://speeding-station-520891.postman.co/workspace/Hospital-Rehabilitation-Service~8547bca5-8c7e-469c-8ba9-5b1f382720b5/collection/21713490-ce18ad33-7433-4101-8e0c-82033140b3c0?action=share&creator=21713490)
2. Please note that the note provided on lines 38-39 applies here as well.


## Challenge 2:

This was an algorithm-based task.
1. The time complexity of this code is O(n), where n is the length of the input array.
2. The space complexity of this code is O(k), where k is the number of duplicate elements in the array.  

## Challenge 3:

1. This was a migration-based task based on an architecture provided.
2. The name of the migration file is 2023_06_17_012524_create_company_structure_tables.php. 
3. Special care was given to the architecture diagram provided and the relationship established in the diagram.
4. The down method is also provided for the task.

## Challenge 4:

The task was to write an application service to format an array to a specific format.
For this task all 3 are provided:
1. Algorithm
2. Test Case Scenario
3. Written Test.


## Conclusion:
I can be reached at izaansohail1999@gmail.com in case of any queries.
Thanks


