<?php
    // naujienos įrašo redagavimas

    if(!isset($_GET['id']) && !ctype_digit($_GET['id'])) {
        $_SESSION['errorMessage'] = 'Įvyko klaida. Naujiena su nurodytu ID neegzistuoja.';
        header('Location: admin.php');
    }

    echo '<h2>Redaguoti naujieną</h2>';
    
    // 
    if(!empty($_POST['save'])) {
        $id = $_POST['id'];
        $short = $_POST['short'];
        $full = $_POST['full'];
        $visible = $_POST['visible'];
        $type = $_POST['type'];
        $visible_at = $_POST['visible_at'];

        // formos duomenų tikrinimas, jei HTML5 filtrai nesuveiktų
        $error = '';
        if($short == '' || strlen($short) > 100) {
            $error .= 'Užpildykite laukelį "Trumpas aprašymas" (max 100 simbolių).<br>';
        }
        if($full == '') {
            $error .= 'Užpildykite laukelį "Naujienos tekstas".<br>';
        }
        if($visible == '') {
            $error .= 'Pasirinkite naujienos matomumą.<br>';
        } 
        if($type == '') {
            $error .= 'Pasirinkite naujienos tipą.<br>';
        } 

        // Jei buvo rasta klaidų formos duomenyse, duomenys grąžinami į formą pataisymui
        if($error != '') {
            showError($error);
            showForm($con, $id, $short, $full, $visible, $_POST['type'], $visible_at);

        //jei viskas gerai, išsaugoma į DB
        } else {
            $query = $con->prepare('UPDATE news SET short=:short, full=:full, 
            visible=:visible, type=:type, updated_at=NOW(), visible_at=:visible_at WHERE id=:id');
            $query->execute(array(
                ':short' => $_POST['short'],
                ':full' => $_POST['full'],
                ':visible' => $_POST['visible'],
                ':type' => $_POST['type'],
                ':visible_at' => $_POST['visible_at'],
                ':id' => $_POST['id']
            ));
            $_SESSION['successMessage'] = 'Naujiena atnaujinta';
            header('Location: admin.php?show&id='.$_POST['id']);
        }

    // Puslapiui užsikrovus rodoma forma su naujienos duomenimis
    } else {
        $news = new News($con, $_GET['id']);
        
        if($news->getShort() == '') {
            $_SESSION['errorMessage'] = 'Įvyko klaida. Naujiena su nurodytu ID neegzistuoja.';
            header('Location: admin.php');
        } 
        showForm($con, $news->getId(), $news->getShort(), $news->getFull(), $news->getVisible(), $news->getType(), $news->getVisibleAt());      
    }

    function showForm($con, $id, $short='', $full='', $visible=1, $type='', $visible_at='') {
        if($visible_at == '') {
            $visible_at = date('Y-m-d\TH:i:s');
        } else {
            $visible_at = date('Y-m-d\TH:i:s', strtotime($visible_at));
        }

        $query = $con->prepare('SELECT * FROM news_type');
        $query->execute();
        echo '
        <form method="POST" action="" class="addNew">

            <label for="short">Trumpas aprašymas (Pavadinimas):</label><br>
            <textarea name="short" maxlength="100" required>'. htmlentities($short) .'</textarea><br><br>

            <label for="full">Naujienos tekstas:</label><br>
            <textarea name="full" required>' .$full. '</textarea><br>

            <label for="type">Tipas:</label>
            <select name="type" required>
                <option value="">-----------</option>';
            
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $selected = '';
                if($row['id'] == $type) {
                    $selected = ' selected';
                }
                echo '<option value="'.$row['id'].'" '. $selected. '> '.$row["type"].'</option>';
            }
            
            echo '</select><br><br>

            Matomumas:
            <label>
            <input type="radio" name="visible" value="1" required '. ($visible ? "checked" : "") .'> Rodoma
            </label>

            <label>
            <input type="radio" name="visible" value="0" '. ($visible ? "" : "checked") .'> Nerodoma
            </label><br><br>


            <label for="visible_at">Rodyti naujieną nuo:</label>
            <input type="datetime-local" name="visible_at" value="'. $visible_at .'"><br><br>
            <input type="hidden" name="id" value="'. $id .'">

            <input type="submit" name="save" class="button" value="Išsaugoti">
        </form> ';
    }

    function showError($text) {
        echo '<div class="errorMessage">'. $text .'</div>';
    }
?>

<!-- CKEditor --> 
<script src="includes/js/ckeditor/ckeditor.js" ></script>
<script src="includes/js/ckfinder/ckfinder.js" ></script>
<script>
    const editor = CKEDITOR.replace("full",{
        language: "lt",
        width: "100%",
        height: "250px",
    }); 
    CKFinder.setupCKEditor(editor);
</script>