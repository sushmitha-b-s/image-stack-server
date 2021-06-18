# Image Stacking application

## Table of contents:

-   **[About the project](#about-the-project)**
-   **[Technologies used](#technologies-used)**
-   **[Features](#features)**
-   **[Steps to run the project](#steps-to-run-the-project)**

## About the project

This application shows the possible variations of a two-dimensional array of images as layers, such that every image from each row of the array is stacked on top of every other image. This repository contains only the front-end code of the application. To check the front-end code, visit [Front End code](https://github.com/sushmitha-b-s/image-stack-client)

## Technologies used

-   Frontend
    -   HTML5, CSS3, SCSS, JavaScript, Vue.js and Vuex.
-   Backend
    -   PHP, MySQL and Laravel 8.0

## Features

-   One variation includes 4 image layers stacked on top of each other where images are either png/transparent type.
-   As a user, the first image upload must be of the base layer (1.e, Array index 0).
-   The user can add upto 4 layers of images.
-   The user can add a new image by selecting the array index (which specifies the layer) and uploading an image.
-   The user can regenerate other possible variations using regenerate button.

## Steps to run the project

1. Clone the repository.
    ```
    $ git clone git@github.com:sushmitha-b-s/image-stack-server.git
    $ cd image-stack-server
    ```
2. Modify .env file based on your database info (DB_DATABASE, DB_USERNAME and DB_PASSWORD). For MY SQL, add

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    ```

3. Run the below command

    ```
    php artisan serve --host=localhost --port=8000
    ```

4. Routes.

    ```
    # Public

    GET   /images

    POST   /images
    @body: Image file, Layer index

    ```
