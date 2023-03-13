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
    <!-- login Section -->
    <section class="login__section">
        <div class="form">
            <h2>INLOGGEN</h2>
            <form action="<?= URLROOT?>/Login/login" method="POST" class="form">
                <input type="text" name= "email" placeholder="Enter your email address" required>
                <br>
                <input type="text" name= "password" placeholder="Enter your password" required>
                 <div class="submit__btn">
            <button class="custom-btn btn-2" type="submit">
                INLOGGEN
            </button>
            <p>Nog geen account?  <a href="<?php echo URLROOT ?>/register">Maak er hier een aan!</a></p>
        </div>
            </form>
        </div>
       
    </section>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/4227656b17.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>
</html>