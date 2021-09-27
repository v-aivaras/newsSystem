<?php
    // naujo įrašo (naujienos) sukūrimas ir įrašymas į DB

    echo '<h2>Pridėti naujieną</h2>';

    if(!empty($_POST['save'])) {
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

        // Jei buvo rasta klaidų formos duomenyse
        if($error != '') {
            showError($error);
            showForm($con, $short, $full, $visible, $_POST['type'], $visible_at);

            //jei viskas gerai, išsaugome DB
        } else {
            
            $query = $con->prepare('INSERT INTO news (short, full, visible, type, created_at, visible_at)
                                VALUES (:short, :full, :visible, :type, NOW(), :visible_at)');
            $query->execute(array(
                ':short' => $_POST['short'],
                ':full' => $_POST['full'],
                ':visible' => $_POST['visible'],
                ':type' => $_POST['type'],
                ':visible_at' => $_POST['visible_at']
            ));
            $newId = $con->lastInsertId();
            $_SESSION['successMessage'] = 'Naujiena išsaugota';
            header('Location: admin.php?show&id='.$newId);
        }

    // Puslapiui užsikrovus rodoma tuščia forma
    } else {
        showForm($con);
    }

    function showForm($con, $short='', $full='', $visible=1, $type='', $visible_at='') {
        if($visible_at == '') {
            $visible_at = date("Y-m-d\TH:i:s");
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

            <input type="submit" name="save" class="button" value="Išsaugoti">
        </form> ';
    }

    // klaidų spausdinimui
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