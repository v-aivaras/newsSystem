<?php
    // rodyti visą naujienos informaciją ir tekstą

    if(!isset($_GET['id']) && !ctype_digit($_GET['id'])) {
        $_SESSION['errorMessage'] = 'Įvyko klaida. Naujiena su nurodytu ID neegzistuoja.';
        header('Location: admin.php');
    }
    $news = new News($con, $_GET['id']);
    
    if($news->getShort() != '') {
        $visible = $news->getVisible() ? 'rodoma' : 'nerodoma';
        $updated = $news->getUpdatedAt() ? $news->getUpdatedAt() : '-';
        echo '
            <div class="newsInfo">
                <div>
                    <span>Tipas: '. $news->getTypeName().'</span>
                    <span>Matomumas: '. $visible .'</span>
                    <span>Parašyta: '. $news->getCreatedAt() .'</span>
                    <span>Atnaujinta: '. $updated .'</span>
                    <span style="white-space: nowrap">Paskelbta: '. $news->getVisibleAt() .'</span>
                </div>
                <div>
                    <a href="admin.php?edit&id='. $news->getId()  .'" class="smallButton">Redaguoti</a>
                    <a href="admin.php?delete&id='. $news->getId()  .'" class="smallButton">Trinti</a>
                </div>
            </div>
            <div class="newsBody">
                <h2 class="title">'. $news->getShort() .'</h2>
                '. $news->getFull() .'
            </div>';
    } else {
        $_SESSION['errorMessage'] = 'Įvyko klaida. Naujiena su nurodytu ID neegzistuoja.';
        header('Location: admin.php');
    }
?>