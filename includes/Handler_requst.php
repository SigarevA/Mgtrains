<?php
    /**
     *  Файл для обработки ajax запросов, получаемые из формы формирования веток 
     *  Возвращается массив обьектов, ключи которых id и text 
     */

    require("connect_bd.php");
    $query = "SELECT * FROM station";
    if(isset($_GET["text"])) {
        $text = mysqli_escape_string($link, $_GET["text"]);
        $query = "SELECT * FROM station WHERE name LIKE '%$text%' ";
        
        if (isset($_GET["departure"])) {
            $departure = mysqli_escape_string($link, $_GET["departure"]);
            $query = "SELECT * FROM station WHERE name LIKE '%$text%' and id <> $departure";
        }

        if (isset($_GET["destination"])) {
            $destination = mysqli_escape_string($link, $_GET["destination"]);
            $query = "SELECT s.name as name, s.id as id FROM (SELECT * FROM stationtothebranch WHERE id_station = $destination) sb INNER JOIN stationtothebranch sb2 ON sb2.id_branch = sb.id_branch INNER JOIN station s ON s.id = sb2.id_station WHERE name LIKE '%$text%' and s.id <> $destination";
        }

        $result = mysqli_query($link, $query);
        $stations = mysqli_fetch_all($result, $resulttype=MYSQLI_ASSOC);
        

        $response = array();
        foreach($stations as &$value) {
            $response[] = [
                'id' => htmlspecialchars($value["id"], ENT_HTML5),
                'text' => htmlspecialchars($value["name"] , ENT_HTML5)
            ];
        }
        echo($stations["name"]);
        $stations = [ ['id' => "hj" , 'text' => 'sdf'] ];
        header('Content-type: application/json');
        echo json_encode( $response );
    }
?> 