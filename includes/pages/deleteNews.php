<?php
    // naujienos įrašo trynimas

    if(!isset($_GET['id']) && !ctype_digit($_GET['id'])) {
        $_SESSION['errorMessage'] = 'Įvyko klaida. Naujiena su nurodytu ID neegzistuoja.';
        header('Location: admin.php');
    }

    // jei patvirtino, kad nori ištrinti naujieną, įrašas ištrinamas
    if(isset($_POST['delete']) && ctype_digit($_POST['id'])) {
        $news = new News($con, $_POST['id']);
        if($news->deleteNews()) {
            $_SESSION['successMessage'] = 'Naujiena ištrinta';
        } else {
            $_SESSION['errorMessage'] = 'Įvyko klaida. Ištrinti nepavyko.';
        }
        header('Location: admin.php');

        // prašymas patvirtinti, kad nori ištrinti naujienos įrašą
    } else {
        $news = new News($con, $_GET['id']);

        if($news->getShort()) {
            echo '<h2>Trinti naujieną</h2>';
            echo '<p><strong>'. $news->getShort() .'</strong></p>';
            echo '<p>Ar tikrai norite istrinti šia naujieną?</p><br>';
            echo '
            <form action="" method="POST">
                <input type="hidden" name="id" value="'.$news->getId() .'">
                <input class="button" type="submit" name="delete" value="Ištrinti">
                <a href="admin.php" class="button">Atšaukti</a>
            </form>';
        } else {
            $_SESSION['errorMessage'] = 'Įvyko klaida. Naujiena su nurodytu ID neegzistuoja.';
            header('Location: admin.php');
        }
    }

?>
