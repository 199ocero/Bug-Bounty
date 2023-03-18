# Bug-Bounty

This is the back-end (API) for the Bug Bounty program application.

## Installation

To install the Bug-Bounty project, please follow the steps below:

1. First, clone the repository from GitHub using the command below:

   ```
   git clone https://github.com/199ocero/Bug-Bounty-Backend.git
   ```

2. Change into the project directory by running:

   ```
   cd Bug-Bounty-Backend
   ```

3. Run the following command to install the project dependencies:

   ```
   composer install
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`:

   ```
   cp .env.example .env
   ```

5. Generate an app encryption key:

   ```
   php artisan key:generate
   ```

6. Create an empty database for the application, and update the database configuration details in the `.env` file.
7. Run the database migrations:

   ```
   php artisan migrate
   ```

8. Finally, start the application by running:

   ```
   php artisan serve
   ```

## Usage

The Bug-Bounty project is an API that provides endpoints for managing bug bounty programs. To interact with the API, you can use tools like Postman or Insomnia.

## Contributing

If you're interested in contributing to the Bug-Bounty project, please feel free to fork the repository and submit a pull request.
