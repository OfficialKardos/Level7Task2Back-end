## Project Setup

Follow these steps to set up the project:

### 1. Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/OfficialKardos/Level7Task2Back-end.git
cd Level7Task2Back-end
```

2. Install Dependencies

Install the project dependencies using Composer:

```bash
composer install
```

3. Create the Database

Create a new database using your preferred database management tool.
Using MySQL Command Line

    Access the MySQL command line:

```bash
mysql -u root -p
```

Create a new database:

```sql
CREATE DATABASE your_database_name;
```

Exit MySQL:

```sql
    EXIT;
```
Using phpMyAdmin

    Log in to phpMyAdmin.
    Go to the “Databases” tab.
    Enter a name for the new database and click “Create”.

4. Configure the .env File

Copy the .env.example file to a new .env file:

```bash

cp .env.example .env
```

Edit the .env file to configure your database connection and other environment settings:

```dotenv

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

```

5. Generate an Application Key

Generate a new application key:

```bash

php artisan key:generate
```

6. Run Migrations

Run the migrations to create the necessary tables in your database:

```bash

php artisan migrate

```
7. Start the Development Server

Start the development server:

```bash

php artisan serve
```

Your application should now be accessible at http://localhost:8000.
8. Additional Commands

    Seeding the Database: If you have seeders set up, you can seed the database with:

```bash

php artisan db:seed
```

Running Tests: To run the project tests:

```bash

    php artisan test
```

Contributing

If you would like to contribute to this project, please follow the guidelines in the CONTRIBUTING.md file.
