<?php
    require_once('includes/config.php');

    if(!empty($_SESSION['user']) ) {
        header('Location: admin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prisijungimas</title>
    <link rel="stylesheet" href="includes/css/style.css">
</head>
<body>

<?php
    if(isset($_POST['login'])) {
        $username = empty($_POST['username']) ? '' : sanitizeInput($_POST['username']);
        $password = empty($_POST['password']) ? '' : sanitizeInput($_POST['password']);
        if(empty($username) || empty($password)) {
            showLoginForm($username, 'Neįvedėte vartotojo vardo arba slaptažodžio.');
        } else {
            $query = $con->prepare('SELECT id, user FROM users WHERE user=:user AND password=:password');
            // pagal užduotį password laukelis yra tik 50 simbolių ilgio, todėl 
            // slaptažodžiui naudojamas pasenęs sha1 algoritmas
            $query->execute(array(':user' => $username, ':password' => sha1($password)));
            if($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['user'] = $row['id'];
                header('Location: admin.php');
            } else {
                showLoginForm($username, 'Blogai įvesti prisijungimo duomenys.');
            }
        }
    } else {
        showLoginForm();
    }

    echo '    
    </body>
    </html>';

    // rodyti prisijungimo formą
    function showLoginForm($username='', $errorMessage='') {
        echo '
            <div class="loginContainer">
                <form action="" method="POST" name="loginForm" class="loginForm">
                    <h2>Prisijunkite</h2>
                    <span class="errorMessage">'.$errorMessage.'</span>

                    <label for="username">Vartotojo vardas:</label>
                    <input type="text" name="username" value="'.$username.'">

                    <label for="password">Slaptažodis:</label>
                    <input type="password" name="password">

                    <input type="submit" class="button" name="login" value="Prisijungti">

                </form>
            </div>';
    }

    // pašalinti tag'us ir tarpus iš vartotojo įvestų duomenų
    function sanitizeInput($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }
?>