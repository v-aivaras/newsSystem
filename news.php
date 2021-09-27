<?php
    // news.php atlieka 2 funkcijas:
    // 1) Jei gaunamas $_GET['id'], tuomet atvaizduojamas 1 naujienos turinys
    // 2) Kitu atveju - grąžinamas naujienų masyvas, pagal nurodytus parametrus
    //    $type ir $limit. Jei parametrai nenurodyti, grąžinamos visos naujienos

    // DB prisijungimas
    try {
        $con = new PDO('mysql:dbname=news; host=localhost; charset=utf8', 'root', '');
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }


    // rodyti 1 naujieną
    if(isset($_GET['id'])) {
        generateNewsPage($con, $_GET['id']);



    // gauti naujienas pagal nurodytus parametrus
    } else {
        $type = isset($type) ? $type : '';
        $limit = isset($limit) ? $limit : '';

        $objects = getNews($con, $type, $limit);
    } 


    // gauti nurodytus parametrus atitinkančias naujienas iš DB
    function getNews($con, $type='', $limit=100) {

        $sql = 'SELECT * FROM news WHERE visible=1 AND NOW()>visible_at ';
        $sql .= $type != '' ? ' AND type=:type ' : ''; // jei nurodytas tipas, pridedam filtrą
        $sql .= 'ORDER BY created_at DESC';
        $sql .= $limit != '' ? ' LIMIT :lim' : ''; // jei nurodytas limitas, pridedam filtrą
        $query = $con->prepare($sql);
        
        if($type != '') {
            $query->bindParam(':type', $type);
        }
        if($limit != '') {
            $query->bindParam(':lim', $limit, PDO::PARAM_INT);
        }
        $query->execute();

        $results = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            array_push($results, $row);
        }
        return $results;
    }


    // rodyti visą vienos naujienos informaciją
    function generateNewsPage($con, $id) { ?>
        <!DOCTYPE html>
        <html lang="lt">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Naujienos</title>
            <style>
                * {
                    box-sizing: border-box;
                }
                body {
                    color: #282828;
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                    margin: 0;
                    min-height: 100vh;
                    height: 100%;
                    display: flex;
                    justify-content: center;
                    background: linear-gradient(125deg, #fadddd, #bac6f3);
                }
                a {
                    color: #282828;
                }
                .mainContainer {
                    width: 100%;
                    padding: 0 10px;
                    min-width: 870px;
                    max-width:1366px;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                }

                .mainContainer nav {
                    width: 100%;
                    text-align: right;
                    padding: 15px;
                    border-bottom: 1px solid #9a9a9a;
                }

                .mainContainer nav .button {
                    margin-right: 10px;
                }
                .button {
                    text-align: center;
                    display: inline-block;
                    font-size: 16px;
                    background-color: rgba(255, 255, 255, 0.719);
                    padding: 8px 16px;
                    cursor: pointer; 
                    border: 2px solid #9dacc7;
                    border-radius: 7px;
                    text-decoration: none;
                }

                .button:hover {
                    background-color: #9dacc7ab;
                    border: 2px solid transparent;
                }

                .newsInfo {
                    text-align: center;
                    width: 100%;
                    font-size: 14px;
                    background-color: rgba(255, 255, 255, 0.5);
                    border-radius: 7px;
                    padding: 10px;
                    margin: 0 auto;
                }

                .newsInfo span {
                    white-space: nowrap;
                }

                .newsInfo span::after {
                    content: "|";
                    margin-left: 4px;
                }

                .newsInfo span:last-of-type:after {
                    content: "";
                }

                .newsBody {
                    background-color: rgba(255, 255, 255, 0.5);
                    padding: 10px;
                    margin: 15px 0;
                    border-radius: 7px;
                    word-wrap: break-word;
                    text-align: left;
                }

                .newsBody .title{
                    text-align: center;
                }              
            </style>
        </head>
        <body>
            <div class="mainContainer">
                <nav>
                    <a href="index.php" class="button">Pradžia</a>
                    <a href="login.php" class="button">Admin</a>
                </nav>
        <?php
        $query = $con->prepare('SELECT news.*, news_type.type as typeName  FROM news 
                                JOIN news_type WHERE news.type=news_type.id AND news.id=:id');
        $query->execute(array(':id' => $id));
        if($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $visible = $row['visible'] ? 'rodoma' : 'nerodoma';
            $updated = $row['updated_at'] ? $row['updated_at'] : '-';
            echo '
                <div class="newsBody">
                    <h2 class="title">'. $row['short'] .'</h2>
                    '. $row['full'] .'
                </div>
                
                <div class="newsInfo">
                <div>
                    <span>Tipas: '. $row['typeName'].'</span>
                    <span>Parašyta: '. $row['created_at'] .'</span>
                    <span>Atnaujinta: '. $updated .'</span>
                    <span style="white-space: nowrap">Paskelbta: '. $row['visible_at'] .'</span>
                </div>
            </div>';

        } else {
            echo 'Naujiena neegzistuoja';
        }
        echo '       
                    </div> 
                </body>
            </html>';
    }


?>