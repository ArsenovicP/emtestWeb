<?php

    $data = array();

    for ($i = 1; $i <= $_POST['count']; $i++){
        array_push($data, array('ID' => $i, 'nazov' => $i.'-vehicle', 'rychlost' => rand(5,100)));
    }

    echo json_encode($data);

?>