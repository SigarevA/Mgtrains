<?php

    function printCarriage($carriage) {
        $serialNumber = htmlspecialchars($carriage["SerialNumber"], ENT_HTML5);
        $countPlace = htmlspecialchars($carriage["CountPlace"], ENT_HTML5); 
        $weight = htmlspecialchars($carriage["Weight"] , ENT_HTML5);
        $class = htmlspecialchars($carriage["Class"], ENT_HTML5);
?>
    <td><?php echo $serialNumber; ?></td>
    <td><?php echo $countPlace; ?></td>
    <td><?php echo $weight; ?></td>
    <td><?php echo $class; ?></td>
<?php
    }
?>
