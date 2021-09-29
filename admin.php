<?php
    require_once('includes/config.php');
    require_once('includes/classes/News.php');

    if(empty($_SESSION['user'])) {
        header('Location: login.php');
    }


    
?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="includes/css/style.css">
</head>
<body>
    <div class="mainContainer">
        <nav>
            <a href="admin.php" class="button">Naujienos</a>
            <a href="admin.php?logout" class="button">Atsijungti</a>
        </nav>
        <div class="content">

<?php
    // atvaizduojami klaidų ir patvirtinimo pranešimai (jeigu jie yra)
    if(!empty($_SESSION['errorMessage'])) {
        echo '<div class="errorMessage">'. $_SESSION['errorMessage'] .'</div>';
        $_SESSION['errorMessage'] = '';
    }

    if(!empty($_SESSION['successMessage'])) {
        echo '<div class="successMessage">'. $_SESSION['successMessage'] .'</div>';
        $_SESSION['successMessage'] = '';
    }

    // įterpiami atitinkami puslapiai, pagal GET reikšmes
    if(isset($_GET['delete'])) {
        include_once('includes/pages/deleteNews.php');

    } elseif (isset($_GET['edit'])) {
        include_once('includes/pages/editNews.php');

    } elseif (isset($_GET['add'])) {
        include_once('includes/pages/addNews.php');

    } elseif (isset($_GET['show'])) {
        include_once('includes/pages/showNews.php');

    } elseif (isset($_GET['logout'])) {
        include_once('includes/pages/logout.php');

    } else {
        include_once('includes/pages/showAllNews.php');
    }

?>
        </div>
    </div>
</body>
</html>