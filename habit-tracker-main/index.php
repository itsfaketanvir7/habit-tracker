<?php
// Start the session to store user data
session_start();

// Initialize the users array (this can be moved to a real database in production)
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        "Sifat Rana" => "12345", // Existing user (username => password)
    ];
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle login
    if (isset($_POST['login'])) {
        // Get user input for login
        $enteredUsername = $_POST["username"];
        $enteredPassword = $_POST["password"];

        // Check if entered credentials match the "database"
        if (isset($_SESSION['users'][$enteredUsername]) && $_SESSION['users'][$enteredUsername] === $enteredPassword) {
            // Set session for logged-in user and redirect to home page
            $_SESSION['username'] = $enteredUsername;
            header("Location: home.php");
            exit();
        } else {
            // Display an error message if login fails
            $loginErrorMessage = "Invalid username or password.";
        }
    }

    // Handle registration
    if (isset($_POST['register'])) {
        // Get user input for registration
        $newUsername = $_POST["newUsername"];
        $newPassword = $_POST["newPassword"];

        // Check if username is already taken
        if (isset($_SESSION['users'][$newUsername])) {
            $registerErrorMessage = "Username is already taken.";
        } else {
            // Add new user to "database" (session)
            $_SESSION['users'][$newUsername] = $newPassword;
            $registerSuccessMessage = "Registration successful! You can now log in.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Habit Tracker</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins';
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://images.unsplash.com/photo-1517960413843-0aee8e2b3285?q=80&w=1799&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .home-container {
            width: 1450px;
            height: 600px;
            background-color: rgba(0, 0, 0, 0.5);
            color: rgb(255, 255, 255);
            border-radius: 20px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .title> h1 {
            font-size: 95px ;
            text-shadow: 2px 2px rgb(150, 150, 150);
        }

        .title > p {
            text-shadow: 2px 2px rgb(150, 150, 150);
            font-size: 20px;
        }

        .title {
            padding: 50px;
        }

        .login-register-container {
            display: flex;
            justify-content: center;   
            align-items: center; 
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .login {
            width: 500px;
            border-radius: 0 10px 10px 0;
        }
    </style>
</head>
<body>
    
<div class="main">
    <div class="home-container row">

        <div class="title-container col-7">
            <div class="title">
                <h1>Daily Habit Tracker</h1>
                <p>
                    Introducing the Daily Habit Tracker app – your personal tool for cultivating positive routines and breaking free from unwanted behaviors. Seamlessly designed to fit into your daily life, this app empowers you to set and achieve your goals through intuitive tracking, insightful analytics, and personalized motivation.
                </p>
            </div>
        </div>

        <div class="login-register-container col-5">
            <!-- Login and Registration Area -->
            <div class="login" id="loginForm">
                <h1 class="text-center">Welcome back!</h1>
                <p class="text-center mb-4">Login or Register</p>

                <!-- Display error or success messages -->
                <?php if (isset($loginErrorMessage)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $loginErrorMessage; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($registerErrorMessage)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $registerErrorMessage; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($registerSuccessMessage)) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $registerSuccessMessage; ?>
                    </div>
                <?php endif; ?>

                <!-- Tabs for login and registration -->
                <ul class="nav nav-tabs" id="loginRegisterTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                    </li>
                </ul>
                <div class="tab-content" id="loginRegisterTabsContent">

                    <!-- Login Form -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-light login-btn form-control">Login</button>
                        </form>
                    </div>

                    <!-- Registration Form -->
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="newUsername">Username:</label>
                                <input type="text" class="form-control" id="newUsername" name="newUsername" required>
                            </div>
                            <div class="form-group">
                                <label for="newPassword">Password:</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                            </div>
                            <button type="submit" name="register" class="btn btn-light register-btn form-control">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
