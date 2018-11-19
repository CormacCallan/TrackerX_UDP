<?php
session_start();
include_once "database.php";
include "header.php";


if (!isset($_SESSION['student_session'])) {
    header("Location: index.php");
}


$query = "SELECT * FROM student WHERE student_id=:student_id";
$statement = $db->prepare($query);
$statement->bindValue(':student_id', $_SESSION['student_session']);
$statement->execute();
$row = $statement->fetch();

$query2 = "SELECT * FROM subject_group WHERE group_id=:group_id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(':group_id', $row['group_id']);
$statement2->execute();
$sub_groups = $statement2->fetchAll();

$monday = array();
$tuesday = array();
$wednesday = array();
$thursday = array();
$friday = array();
$current_day = array();


foreach ($sub_groups as $subject) :
    $query3 = "SELECT * FROM subject WHERE subject_id=:subject_id AND day = 'monday'";
    $statement3 = $db->prepare($query3);
    $statement3->bindValue(':subject_id', $subject['subject_id']);
    $statement3->execute();

    $monday[] = $statement3->fetch();

    $query4 = "SELECT * FROM subject WHERE subject_id=:subject_id AND day = 'tuesday'";
    $statement4 = $db->prepare($query4);
    $statement4->bindValue(':subject_id', $subject['subject_id']);
    $statement4->execute();

    $tuesday[] = $statement4->fetch();

    $query5 = "SELECT * FROM subject WHERE subject_id=:subject_id AND day = 'wednesday'";
    $statement5 = $db->prepare($query5);
    $statement5->bindValue(':subject_id', $subject['subject_id']);
    $statement5->execute();

    $wednesday[] = $statement5->fetch();

    $query6 = "SELECT * FROM subject WHERE subject_id=:subject_id AND day = 'thursday'";
    $statement6 = $db->prepare($query6);
    $statement6->bindValue(':subject_id', $subject['subject_id']);
    $statement6->execute();

    $thursday[] = $statement6->fetch();

    $query7 = "SELECT * FROM subject WHERE subject_id=:subject_id AND day = 'friday'";
    $statement7 = $db->prepare($query7);
    $statement7->bindValue(':subject_id', $subject['subject_id']);
    $statement7->execute();

    $friday[] = $statement7->fetch();

endforeach;

$mon = array_filter($monday);
$tue = array_filter($tuesday);
$wed = array_filter($wednesday);
$thurs = array_filter($thursday);
$fri = array_filter($friday);
?>
<html>
   
    <div class="container ">
        <div class=" center row">
            <div id="currentTime">

            </div>
            <div id="timeDisplay" ></div>
        </div>
            <div class="upcoming">
                <p class="up-title"> CURRENT CLASS </p>
                <ul class="up-plan">
                     <div  id="displayStudentCurrentClass" ></div>
                </ul>
            </div>
        </div>
    <div class="container">


        <div class="upcoming timetable" id="Mon"><p class="up-title">MONDAY</p>
            <?php foreach ($mon as $m) : ?>

                <ul class="up-plan">
                    <li><span class="roundhead"><i class="material-icons"></i></span><?php echo $m['subject_name'] ?><span class="secondo">Room : 
                            <?php
                            $query8 = "SELECT * FROM rooms WHERE room_id =:room_id";
                            $statement8 = $db->prepare($query8);
                            $statement8->bindValue(':room_id', $m['room_id']);
                            $statement8->execute();
                            $row2 = $statement8->fetch();
                            echo $row2['room_number'];
                            ?>

                        </span><p class="up-date"><?php echo $m['start_time'] . " to " . $m['end_time']; ?></p></li>
                </ul>
            <?php endforeach; ?>
        </div> 

        <div class="upcoming timetable" id="Tue">
            <p class="up-title">TUESDAY</p>


            <?php foreach ($tue as $t) : ?>

                <ul class="up-plan">
                    <li><span class="roundhead"><i class="material-icons"></i></span><?php echo $t['subject_name'] ?><span class="secondo">Room : 
                            <?php
                            $query9 = "SELECT * FROM rooms WHERE room_id =:room_id";
                            $statement9 = $db->prepare($query9);
                            $statement9->bindValue(':room_id', $t['room_id']);
                            $statement9->execute();
                            $row3 = $statement9->fetch();
                            echo $row3['room_number'];
                            ?>


                        </span><p class="up-date"><?php echo $t['start_time'] . " to " . $t['end_time']; ?></p></li>
                </ul>
            <?php endforeach; ?>    
        </div>

        <div class="upcoming timetable" id="Wed">
            <p class="up-title">WEDNESDAY</p>


            <?php foreach ($wed as $w) : ?>

                <ul class="up-plan">
                    <li><span class="roundhead"><i class="material-icons"></i></span><?php echo $w['subject_name'] ?><span class="secondo">Room : 
                            <?php
                            $query10 = "SELECT * FROM rooms WHERE room_id =:room_id";
                            $statement10 = $db->prepare($query10);
                            $statement10->bindValue(':room_id', $w['room_id']);
                            $statement10->execute();
                            $row4 = $statement10->fetch();
                            echo $row4['room_number'];
                            ?>


                        </span><p class="up-date"><?php echo $w['start_time'] . " to " . $w['end_time']; ?></p></li>
                </ul>
            <?php endforeach; ?>    
        </div>

        <div class="upcoming timetable" id="Thu">
            <p class="up-title">THURSDAY</p>


            <?php foreach ($thurs as $th) : ?>

                <ul class="up-plan">
                    <li><span class="roundhead"><i class="material-icons"></i></span><?php echo $th['subject_name'] ?><span class="secondo">Room : 
                            <?php
                            $query11 = "SELECT * FROM rooms WHERE room_id =:room_id";
                            $statement11 = $db->prepare($query11);
                            $statement11->bindValue(':room_id', $th['room_id']);
                            $statement11->execute();
                            $row5 = $statement11->fetch();
                            echo $row5['room_number'];
                            ?>


                        </span><p class="up-date"><?php echo $th['start_time'] . " to " . $th['end_time']; ?></p></li>
                </ul>
            <?php endforeach; ?>    
        </div>

        <div class="upcoming timetable" id="Fri">
            <p class="up-title">FRIDAY</p>


            <?php foreach ($fri as $f) : ?>

                <ul class="up-plan">
                    <li><span class="roundhead"><i class="material-icons"></i></span><?php echo $f['subject_name'] ?><span class="secondo">Room : 
                            <?php
                            $query12 = "SELECT * FROM rooms WHERE room_id =:room_id";
                            $statement12 = $db->prepare($query12);
                            $statement12->bindValue(':room_id', $f['room_id']);
                            $statement12->execute();
                            $row6 = $statement12->fetch();
                            echo $row6['room_number'];
                            ?>


                        </span><p class="up-date"><?php echo $f['start_time'] . " to " . $f['end_time']; ?></p></li>
                </ul>
            <?php endforeach; ?>    
        </div>
    </div>
</body>
<script src="folder/js.js" type="text/javascript"></script>
</html>
