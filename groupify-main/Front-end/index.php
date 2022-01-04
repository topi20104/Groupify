<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Assets/bulma.css" rel="stylesheet">
<!--    Font Awesome -->
    <script defer src="Assets/Font-Awesome-All.js"></script>
    <title>Teachers' page</title>
</head>
<body>
    <div id="contentGroup" class="container is-max-widescreen mt-4">
        <div class="columns has-background-primary-light">
            <div class="column">
<!--                Classes dropdown menu -->
                <div class="dropdown block">
                    <?php
                    include "../db.php";
                    $groups = "SELECT DISTINCT GroupID FROM groups order by GroupID";
                    $result = $conn->query($groups);
                    ?>

                    <!--                NEW dropdown menu-->
                    <div class="select dropdown block">
                        <select id="courses-select" class="form-control">
                            <option value="course1">Course 1</option>
                            <option value="course2">Course 2</option>
                            <option value="course3">Course 3</option>
                            <option value="course4">Course 4</option>
                            <option value="course5">Course 5</option>
                        </select>
                    </div>
                </div>

                <!-- Minimum member dropdown -->
                

<!--                MODAL BUTTONS-->

    <!--            Another PHP / MySQL script to loop the number of groups-->
                <div class="columns is-multiline is-mobile">
                    <?php
                        if ($result->num_rows > 0) {
                            // output data of each row
                            foreach ($result as $row) {
                                echo
                                    '<div class="column is-one-quarter has-text-centered">
                                    <button class="button is-info modal-button" data-target="'.$row["GroupID"].'" aria-haspopup="true">
                                    '."Group ".$row["GroupID"].'
                                    </button>
                                </div>';

                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                </div>
                <?php
                $course = $_POST['course-select'];
                echo $course;
                ?>
<!--                Lower right buttons-->
                <div class="has-text-right">
                    <button id="generate-groups" class="button is-info modal-button" data-target="modal-generate" aria-haspopup="true">
                        <span class="icon is-small">
                          <em class="fas fa-plus"></em>
                        </span>
                        <span>Generate groups</span>
                    </button>
                    <button id="done-button" class="button is-success">
                        <span class="icon is-small">
                          <em class="fas fa-check"></em>
                        </span>
                        <span>Done</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

        <!--                Modals-->

<!--    Modal for the "generate groups"-->
        <div id="modal-generate" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">
                    <div class="block has-text-right">
                        <form action="" method="post">
                            <div class="content has-text-centered">
                                <h4>Minimum members:</h4>
                                <label class="block">
                                    <input id="sliderWithValue" name="minMembers" class="slider is-fullwidth is-medium is-circle is-info" min="1" max="8" value="4" step="1" type="range">
                                    <output class="button is-static is-info" for="sliderWithValue">4</output>
                                </label>
                            </div>
                            <div class="content has-text-centered">
                                <h4>Maximum members</h4>
                                <label class="block">
                                    <input id="sliderWithValue1" name="maxMembers" class="slider is-fullwidth is-medium is-circle is-info" min="1" max="8" value="5" step="1" type="range">
                                    <output class="button is-static is-info" for="sliderWithValue1">5</output>
                                </label>
                            </div>
                            <div class="column divider is-full">
                                <hr class="group-box">
                            </div>
                                <button id="generate" class="button is-info" name="generate">
                                    <span class="icon is-small">
                                      <em class="fas fa-plus"></em>
                                    </span>
                                    <span>Generate</span>
                                </button>
                        </form>
                    </div>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>

<!--    PHP function to execute the python script-->
<?php
    $min = $_POST['minMembers'];
    $max = $_POST['maxMembers'];

    if(isset($_POST['generate'])) {
//        Passes 2 arguments to the command line as well
        exec('python ../mainbut.py '. $min . " ". $max);
//        Reload the page again after 10 milliseconds, so that it displays the new groups after generating them
        echo '<script>setTimeout(location.reload.bind(location), 10)</script>';
    }
?>

<!--    Automatically generated modals-->
        <?php
        $names = "SELECT DISTINCT GroupID FROM groups order by GroupID";
        $result = $conn->query($names);
        $studGroup = 'SELECT groups.GroupID, groups.StudentID from groups LEFT JOIN students on groups.StudentID = students.UID';

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $group = $row["GroupID"];
            echo '
            <div id="'.$row['GroupID'].'" class="modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div class="box">
                        <div class="columns is-multiline">
                                '?>
                                <?php
    //                          Query for getting the students' names for each group individually
                                $test = "SELECT groups.GroupID, groups.StudentID, students.StudentName from groups LEFT JOIN students on groups.StudentID = students.UID WHERE groups.GroupID ='$group'";
                                $result1 = $conn->query($test);
    //                            Loop for individual students to be put into modals
                                while($row = $result1->fetch_assoc()) {
                                    echo '
                                        <div class="column is-full is-size-4">'.
                                            $row['StudentName'].
                                        '</div>
                                        <div class="column divider is-full">
                                            <hr class="group-box">
                                        </div>';
                                }?>
                            <?php echo'
                        </div>
                    </div>
                </div>
                <button class="modal-close is-large" aria-label="close"></button>
            </div>';
        }
        } else {
        echo "0 results";
        }
        $conn->close();
        ?>

</body>
<script>
//    Gets the ID of the select menu
    let selectedCourse = document.getElementById("courses-select");
    //Changes the value of the select menu depending on the URL parameter
    switch ("<?php echo $_GET['course'];?>") {
        case "course1":
            selectedCourse.selectedIndex = 0;
            break;
        case "course2":
            selectedCourse.selectedIndex = 1;
            break;
        case "course3":
            selectedCourse.selectedIndex = 2;
            break;
        case "course4":
            selectedCourse.selectedIndex = 3;
            break;
        case "course5":
            selectedCourse.selectedIndex = 4;
            break;
    }
</script>
<!--Stops the form resubmission-->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<script src="Assets/modal.js"></script>
<script src="Assets/dropdown.js"></script>
<script src="Assets/course-select.js"></script>
<script src="Assets/min-max.js"></script>
<script src="Assets/Slider/bulma-slider.min.js"></script>
<!--Manages the slider output values -->
<script>bulmaSlider.attach();</script>