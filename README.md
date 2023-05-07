<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


<h1>Movie Search and Favorites Web Application</h1>

<h5>This web application allows users to search for and view information about movies. It also provides additional features such as the ability to view similar movies, save favorite movies, and view a list of favorite movies for the logged-in user. The application is built using a front-end framework, HTML, and a back-end framework, Laravel. It uses the Open Movie Database (OMDb) API to retrieve movie data and a MySQL database to store user data and favorite movies.</h5>

<h2>Installation and Setup:</h2>
<h3>Clone the repository from GitHub</h3>

<h3>Install the required dependencies using Composer</h3>
   <h6> composer install</h6>

<h3>Create a new .env file and fill in the required details such as the database credentials</h3>

<h3>Generate an application key:</h3>
    <h6>"php artisan key:generate"</h6>

<h3>Migrate the database:</h3>
    <h6>"php artisan migrate"</h6>

<h3>Start the server:</h3>
    <h6>"php artisan serve"<h6>

<h3>Open the application in a web browser by visiting http://localhost:8000.</h3>

<h2>Architecture and Design</h2>
<h3>Front-End</h3>
<h5>The front-end of the application is built using HTML, CSS, and JavaScript.</h5>

<h3>Back-End</h3>
<h5>The back-end of the application is built using Laravel, a PHP-based web application framework. Laravel provides several features that make web application development easier, such as routing, controllers, and database migration tools. The application uses the OMDb API to retrieve movie data and store user data and favorite movies in a MySQL database.</h5>

<h3>Database</h3>
<h5>The application uses a MySQL database to store user data and favorite movies. The database schema is designed to support user authentication and favorite movie storage. The users table stores user information such as the username, email, and password. The favorites table stores the user's favorite movies.</h5>

<h3>Authentication</h3>
<h5>The application allows users to create an account, log in, and save favorite movies. The authentication system is implemented using Laravel's built-in authentication system. The users table stores the user's email and hashed password. When a user logs in, the application checks the email and password against the database. If the credentials are correct, the user is authenticated and can access the protected pages of the application.</h5>

<h3>Continuous Integration/Continuous Delivery (CI/CD)</h3>
<h5>The application uses GitHub Actions for continuous integration and continuous delivery. GitHub Actions is a platform that allows developers to automate tasks such as building, testing, and deploying code. The application is automatically built and tested every time a new code change is pushed to the repository. If the tests pass, the code is automatically deployed to a production environment. This ensures that the code is always up-to-date and the application is running smoothly.</h5>

<h3>Version Control</h3>
<h5>The application code is stored in a public repository on GitHub. GitHub is a web-based hosting service for version control using git. It provides several features that make collaborative software development easier, such as pull requests, code reviews, and issue tracking. Using GitHub, developers can collaborate on the code, track issues, and make sure that the code is always up-to-date.</h5>

<h3>Conclusion</h3>
<h5>This web application provides a simple and easy-to-use interface for searching and viewing information about movies. It also provides additional features such as saving favorite movies, which enhances the user experience. The application is built using a modern web development stack and follows</h5>




