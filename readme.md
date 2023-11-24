<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Laravel Blog Post Project by [Hashaam Zahid]

This project is a Laravel-based Blog Post application that incorporates various features including a contact page, Laravel Jobs, Middleware, Laravel Request, Laravel Resources for JSON API, Eloquent ORM, NPM packages for asset management (SCSS, JavaScript), file handling, and user policy for access restriction.


# php artisan Commands Required

php artisan make:migration
<br/>
php artisan make:request
<br/>
php artisan make:mail
<br/>
php artisan make:job
<br/>
php artisan queue:table
<br/>
php artisan queue:work 
<br/>
php artisan make:auth
<br/>
php artisan make:resource
<br/>
php artisan make:middleware
<br/>
php artisan make:Policy
<br/>
php artisan migrate
<br/>
php artisan make:controller
<br/>
php artisan make:model
<br/>
php artisan make:seed 
<br/>
php artisan make:factory
<br/>
php artisan serve

# Node Packages Commands Required 

npm install 

# Composer Commands Required

composer update 
composer dump-autoload


## Features

- **Contact Page**: Includes a dedicated page for user inquiries or contact.
- **Laravel Jobs**: Implements background job processing using Laravel's job functionalities.
- **Middleware**: Middleware is used to filter HTTP requests entering the application.
- **Laravel Request**: Utilizes Laravel's request handling for form validations and request management.
- **Laravel Resources for JSON API**: Constructs resources for API endpoints to manage data representations.
- **Eloquent ORM**: Implements ORM for database interaction, simplifying data manipulation.
- **NPM Packages for Assets**: Utilizes NPM packages to manage SCSS, JavaScript, and other assets.
- **File Handling**: Incorporates file management functionalities within the application.
- **User Policy for Restriction**: Implements policies to restrict user access to certain features or data.

## Installation

To run this project locally, follow these steps:

1. Clone the repository:

    ```bash
    git clone https://github.com/hashaam-zahid/laravel-blog-post.git
    ```

2. Install dependencies:

 
    composer install
    npm install
 

3. Set up environment variables:

    - Duplicate the `.env.example` file and rename it to `.env`.
    - Configure the necessary environment variables such as database connection details.

4. Run migrations and seeders:

    ```bash
    php artisan migrate --seed
    ```

5. Compile assets:

    ```bash
    npm run dev
    ```

6. Start the development server:

    ```bash
    php artisan serve
    ```

7. Access the application in your browser at `http://localhost:8000`.

## Usage

- Explore the different features of the blog application:
  - Visit the contact page and submit inquiries.
  - Test the background job processing functionality.
  - Check how middleware restricts or allows access to specific routes.
  - Utilize Laravel Requests for form validation and request handling.
  - Interact with the JSON API endpoints via Laravel Resources.
  - Experiment with file handling features.
  - Understand how user policies restrict or grant access based on user roles.

## Contributing

Contributions are welcome! If you'd like to enhance or fix any issues, please fork the repository and create a pull request.

## License

This project is licensed under the [MIT License](LICENSE).

---

Feel free to add or modify any sections according to your project's specific requirements and details.
