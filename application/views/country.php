<?php
    if($_GET["country"] == 1) echo json_encode (array ("1" => "Вашингтон", "2" => "Сиетл"));
        else if ($_GET["country"] == 2) echo json_encode (array ("4" => "Париж", "3" => "Марсель"));
?>