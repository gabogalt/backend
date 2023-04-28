# Backend
The Star Wars API provides information about characters, films, and vehicles from the Star Wars franchise. Access to the API requires a valid security token.
For more information about the API, please visit our website at gabogalt.online.

## Installation

To install and set up the project, please follow these steps:

1. Clone the repository to your local machine.
2. Create a new `.env` file and add your database and API credentials.
3. Run `composer install` to install the PHP dependencies.
4. Run `npm install` to install the JavaScript dependencies.
5. Run `php artisan migrate` to create the necessary database tables.
6. Run `php artisan serve` to start the development server.

## Authentication

Access to the Star Wars API is protected by token-based authentication. To obtain a security token, you must first register a new user account and then log in with your credentials.

### Register a new user

`POST /api/register`

Registers a new user account.

Request Parameters:

- `name` (required): the name of the user.
- `email` (required): the email address of the user.
- `password` (required): the password for the user account.

If the request is successful, the API will respond with a user object in JSON format.

### Log in with your credentials

`POST /api/login`

Logs in a user with their credentials and returns a security token.

Request Parameters:

- `email` (required): the email address of the user.
- `password` (required): the password for the user account.

If the credentials are valid, the API will respond with a security token in JSON format.

## API Reference

For detailed information about the available API endpoints and their usage, please refer to our API documentation at gabogalt.online/docs.
