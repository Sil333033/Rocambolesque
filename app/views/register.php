<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/main.css">
    <title>Document</title>
</head>

<body>
    <!-- Intro Section -->
    <section class="register__section">
        <div class="form">
            <h2>REGISTREREN</h2>
            <form id="registerForm" action="" method="POST">
                <input type="text" name="firstname" placeholder="Enter your firstname" required>
                <br>
                <input type="text" name="infix" placeholder="Enter your infix">
                <br>
                <input type="text" name="lastname" placeholder="Enter your lastname" required>
                <br>
                <input type="text" name="phone" placeholder="Enter your phone number" required>
                <br>
                <input type="email" name="email" placeholder="Enter your email address" required>
                <br>
                <input type="password" name="password" placeholder="Enter your password" required>
                <div class="button-div">
                    <button class="custom-btn btn-2" type="submit">
                        <a>REGISTREREN</a>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/4227656b17.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>