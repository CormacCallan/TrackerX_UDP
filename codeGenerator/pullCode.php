<?php
require_once "../database.php";

   

       
        $mszr= '2';
 
        $stmt = $db->prepare('SELECT * FROM lecturer WHERE lecturer_id = 1');
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            ?> 
            <?php if ($mszr == 2) { ?>
               
                    <td><?php echo substr($lecturer_name, 0, 25); ?>
                    <td><?php echo substr("<h1>" .$lecturer_passcode . "</h1>", 0, 80); ?>
        
            
            <?php } else { ?>

                <?php
            }
        }
        ?>