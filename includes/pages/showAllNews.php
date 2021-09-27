<?php 
    // rodyti naujienų sąrašą pagal nurodytus parametrus

    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : $DEFAULT_LIMIT;
    $type = isset($_GET['type']) ? $_GET['type'] : '';
    showFilter($con, $DEFAULT_LIMIT_STEPS, $type, $limit);

    $results = getNews($con, $type, $limit);

    // spausdinami rezultatai lentelės pavidalu
    if(sizeof($results)) {

        echo '
            <table>
                <tr>
                    <th>Tipas</th>
                    <th>Trumpas aprašymas</th>
                    <th>Matomumas</th>
                    <th>Sukurta</th>
                    <th>Paskelbta</th>
                    <th>Atnaujinta</th>
                    <th>Veiksmai</th>
                </tr>';
        foreach($results as $result) {
            $visible = $result->getVisible() ? 'Rodoma' : 'Nerodoma';
            $updated_at = $result->getUpdatedAt() ? $result->getUpdatedAt() : '-';
            echo '
                <tr>
                    <td><a href="admin.php?type='.$result->getType() .'">'. $result->getTypeName() .'</a></td>
                    
                    <td><a href="admin.php?show&id='. $result->getId()  .'">'. $result->getShort()  .'</a></td>
                    <td>'. $visible .'</td>
                    <td>'. $result->getCreatedAt() .'</td>
                    <td>'. $result->getVisibleAt() .'</td>
                    <td>'. $updated_at .'</td>
                    <td>
                        <a href="admin.php?edit&id='. $result->getId()  .'" class="smallButton">Redaguoti</a>
                        <a href="admin.php?delete&id='. $result->getId()  .'" class="smallButton">Trinti</a>
                    </td>
                </tr>';
        }
        echo '</table>';
    } else {
        echo 'Naujienų nėra.';
    }

?>

<?php
    // Paimti naujienas iš duomenų bazės
    function getNews($con, $type='', $limit='') {
        $results = '';

        $sql = 'SELECT * FROM news ';
        $sql .= $type != '' ? ' WHERE type=:type ' : ''; // jei nurodytas tipas, pridedam filtrą
        $sql .= 'ORDER BY created_at DESC LIMIT :lim';
        $query = $con->prepare($sql);
        
        if($type != '') {
            $query->bindParam(':type', $type);
        }
        $query->bindParam(':lim', $limit, PDO::PARAM_INT);
        $query->execute();

        $results = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            array_push($results, new News($con, $row['id']));
        }

        return $results;
    }

    // filtras naujienų sąrašui: pagal tipą ir kiek rezultatų atvaizduoti
    function showFilter($con, $limitSteps, $type='', $limit='') {
        $query = $con->prepare('SELECT * FROM news_type');
        $query->execute();

        if(!empty($_SESSION['user'])) {
            $newNewsButton = '<a href="admin.php?add" class="button">Pridėti naujieną</a>';
        } else {
            $newNewsButton = '';
        }

        ?>
        <div class="formContainer">
            <form method="GET" action="" class="filter">
                <label for="type">Naujienų tipas:</label>
                <select name="type">
                    <option value="" selected>VISI</option>
                    <?php
                        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            $selected = '';
                            if($row['id'] == $type) {
                                $selected = ' selected';
                            }
                            echo "<option value='".$row['id']."'$selected>".$row['type']."</option>";
                        }
                    ?>
                </select>

                <label for="limit">Naujienų kiekis:</label>
                <select name="limit" >
                    <?php
                        foreach($limitSteps as $step) {
                            $selected = '';
                            if($step == $limit) {
                                $selected = ' selected';
                            }
                            echo "<option value='".$step."'$selected>".$step."</option>";
                        }
                    ?>
                </select>
                <input type="submit" name="filter" class="smallButton" value="Rodyti">
            </form>
            
            <?php echo $newNewsButton; ?>
        </div>
    <?php
    }
?>