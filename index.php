<?php
    require_once('includes/config.php');
?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naujienos</title>
    <link rel="stylesheet" href="includes/css/style.css">
</head>
<body>
    <div class="mainContainer">
        <nav>
            <a href="index.php" class="button">Pradžia</a>
            <a href="login.php" class="button">Admin</a>
        </nav>
        <div class="content">
        <?php 

        // $type = 1;
        // $limit = 2;

        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : $DEFAULT_LIMIT;
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        showFilter($con, $DEFAULT_LIMIT_STEPS, $type, $limit);
        // rezultatai gaunami iš news.php failo
        require_once("news.php");


        // atrinktos naujienos saugomos kintamajame $objects
        echo "<h3>Paskutiniai funkcijos atnaujinimai</h3>";
        foreach($objects as $object) {
            echo "<a href='news.php?id=".$object['id']."'>".$object['short']."</a><br>";
        }
    ?>

        </div>
    </div>
</body>
</html>

<?php 
    // filtras, kuriame galima pasirinkti naujienų tipą ir rezultatų kiekį
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

