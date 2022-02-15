<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data = json_decode(file_get_contents('people.json'));
        for($i = 0; $i < count($data); ++$i){
            if($data[$i][0]== $id){
                unset($data[$i]);
                // Remove the keys from data array after remove the item
                $data = array_values($data);
                file_put_contents("people.json",json_encode($data));
                break;
            }
        }

        header('Location: index.php');
    }
?>