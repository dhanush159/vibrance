<?php
session_start();
$name = $_GET['name'];
$email = $_GET['email'];
$college = $_GET['college'];
$phone = $_GET['phone'];
$conn = mysqli_connect("localhost", "root", "", "college_fest");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$password = "select Passwrd from participants where Phone_no = $phone";
$password1 = mysqli_query($conn, $password);
$password1 = mysqli_fetch_assoc($password1);
$password1 = $password1['Passwrd'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/web/css/dashboard_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="/web/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/web/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/web/img/favicon-16x16.png">
    <link rel="manifest" href="/web/img/site.webmanifest">
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>

</head>

<body>
    <div class="container">
        <div class="title">Registered events</div>
        <br><br>
        <div class="content">
            <?php
            $sql = "SELECT Event_name FROM participants where Phone_no = $phone";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $sql1="SELECT Event_name2 FROM participants where Phone_no = $phone";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $sql2="SELECT Event_name3 FROM participants where Phone_no = $phone";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            if(mysqli_num_rows($result) > 0 && $row['Event_name'] != NULL)
            {
                    echo "<div class='event'>";
                    echo "<div class='event_name'>";
                    echo "Event 1 : ";
                    echo $row['Event_name'];
                    echo "<div class='delete'>";
                    echo "<form action='dashboard.php' method='POST'>";
                    echo "<button type= 'submit' class='button1' id='button1' name='button1'><span>Delete</span><i></i></button><br />";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<br>";

                    if(mysqli_num_rows($result1) > 0 && $row1['Event_name2'] != NULL)
                {
                    echo "<div class='event'>";
                    echo "<div class='event_name'>";
                    echo "Event 2 : ";
                    echo $row1['Event_name2'];
                    echo "<div class='delete'>";
                    echo "<form action='dashboard.php' method='POST'>";
                    echo '<button style="" type="submit" class=\'button1\' id=\'button2\' name=\'button2\'><span>Delete</span><i></i></button><br />';
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<br>";

                    if(mysqli_num_rows($result1) > 0 && $row2['Event_name3'] != NULL )
                {
                    echo "<div class='event'>";
                    echo "<div class='event_name'>";
                    echo "Event 3 : ";
                    echo $row2['Event_name3'];
                    echo "<div class='delete'>";
                    echo "<form action='dashboard.php' method='POST'>";
                    echo '<button style="" type="submit" class=\'button1\' id=\'button3\' name=\'button3\'><span>Delete</span></button><br />';
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<br>";
                }
                }
                else if(mysqli_num_rows($result1) > 0 && $row2['Event_name3'] != NULL )
                {
                    echo "<div class='event'>";
                    echo "<div class='event_name'>";
                    echo "Event 3 : ";
                    echo $row2['Event_name3'];
                    echo "<div class='delete'>";
                    echo "<form action='dashboard.php' method='POST'>";
                    echo '<button style="" type="submit" class=\'button1\' id=\'button3\' name=\'button3\'><span>Delete</span><i></i></button><br />';
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<br>";
                }
            }
            else if(mysqli_num_rows($result1) > 0 && $row1['Event_name2'] != NULL)
                {
                    echo "<div class='event'>";
                    echo "<div class='event_name'>";
                    echo "Event 2 : ";
                    echo $row1['Event_name2'];
                    echo "<div class='delete'>";
                    echo "<form action='dashboard.php' method='POST'>";
                    echo '<button style="" type="submit" class=\'button1\' id=\'button2\' name=\'button2\'><span>Delete</span></button><br />';
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<br>";

                    if(mysqli_num_rows($result1) > 0 && $row2['Event_name3'] != NULL )
                {
                    echo "<div class='event'>";
                    echo "<div class='event_name'>";
                    echo "Event 3 : ";
                    echo $row2['Event_name3'];
                    echo "<div class='delete'>";
                    echo "<form action='dashboard.php' method='POST'>";
                    echo '<button style="" type="submit" class=\'button1\' id=\'button3\' name=\'button3\'><span>Delete</span></button><br />';
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<br>";
                }
                }
            else if(mysqli_num_rows($result1) > 0 && $row2['Event_name3'] != NULL )
                {
                    echo "<div class='event'>";
                    echo "<div class='event_name'>";
                    echo "Event 3 : ";
                    echo $row2['Event_name3'];
                    echo "<div class='delete'>";
                    echo "<form action='dashboard.php' method='POST'>";
                    echo '<button style="" type="submit" class=\'button1\' id=\'button3\' name=\'button3\'><span>Delete</span></button><br />';
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<br>";
                }
            else
            {
                echo "<div class='event'>";
                echo "<div class='event_name'>";
                echo "No events registered";
                echo "</div>";
                echo "</div>";
                echo "<br>";
            }
            echo "<br>";
            // if (isset($_POST['button1'])) {
            //     $sql = "UPDATE participants SET Event_name = NULL WHERE Phone_no = $phone";
            //     $result = mysqli_query($conn, $sql);
            // }
            // if (isset($_POST['button2'])) {
            //     $sql = "UPDATE participants SET Event_name2 = NULL WHERE Phone_no = $phone";
            //     $result = mysqli_query($conn, $sql);
            // }
            // if (isset($_POST['button3'])) {
            //     $sql = "UPDATE participants SET Event_name3 = NULL WHERE Phone_no = $phone";
            //     $result = mysqli_query($conn, $sql);
            // }

            if (array_key_exists('button1', $_POST)) {
                button1();
            }
            if (array_key_exists('button2', $_POST)) {
                button2();
            }
            if (array_key_exists('button3', $_POST)) {
                button3();
            }
            function button1() {
                $sql = "UPDATE participants SET Event_name = NULL WHERE Phone_no = $phone";
                $result = mysqli_query($conn, $sql);
                echo "<meta http-equiv='refresh' content='0'>";
            }
            function button2() {
                $sql = "UPDATE participants SET Event_name2 = NULL WHERE Phone_no = $phone";
                $result = mysqli_query($conn, $sql);
                echo "<meta http-equiv='refresh' content='0'>";
            }
            function button3() {
                $sql = "UPDATE participants SET Event_name3 = NULL WHERE Phone_no = $phone";
                $result = mysqli_query($conn, $sql);
                echo "<meta http-equiv='refresh' content='0'>";
            }

            ?>
        </div>
    </div>
    <div class="container">
        <div class="title">Your Details</div>
        <div class="content">
            <form action="#" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" name="full_name" value=<?php echo "$name" ?> disabled='disabled'>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" name="email" value=<?php echo "$email" ?> disabled='disabled'>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input class="details" type="text" name="number" value=<?php echo "$phone" ?>
                        disabled='disabled'>
                    </div>
                    <div class="input-box">
                        <span class="details">College Name</span>
                        <input type="text" name="college" value=<?php echo "$college" ?> disabled='disabled'>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" id="myInput" value=<?php echo "$password1" ?> disabled='disabled'>

                    </div>
                    <div class="input-box">
                        <div class="butt">
                            <input type="checkbox" onclick="myFunction()"
                                style="width: 17px; height: 20px; margin: 5%;">Show Password
                        </div>
                        <script>
                            function myFunction() {
                                var x = document.getElementById("myInput");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>
                    </div>
                </div>
                <span class="details">Event</span>
                <select class="form-select" aria-label="Default select example"
                    style="background-color: #7f95b3; color: black !important" name="event" id="event"">
                    <option selected disabled>Select Event</option>
                    <option value="AI in Healthcare">AI in Healthcare</option>
                    <option value="Battle_of_bands">Battle_of_bands</option>
                    <option value="Biztech">Biztech</option>
                    <option value="COD_Mob">COD_Mob</option>
                    <option value="Cultural-Night">Cultural-Night</option>
                    <option value="Dataverse">Dataverse</option>
                    <option value="Deadlocked">Deadlocked</option>
                    <option value="Hunt'el Infinito">Hunt'el Infinito</option>
                    <option value="Maze_Maniac">Maze_Maniac</option>
                    <option value="Sudo_Code">Sudo_Code</option>
                    <option value="Treasure-Hunt">Treasure-Hunt</option>
                    <option value="Valorant">Valorant</option>
                    <option value="VisualizeAR">VisualizeAR</option>
                </select>
        </div>
        </br><br>

        <div class="buttons">
            <button style="--clr:#5fa9ff" type="submit" class='buttons' id='buttons' name='buttons'><span>Register</span></button><br />
            <button style="--clr:#5fa9ff"><span><a href="logout.php?logout">logout</a></span></button>
        </div>
        <?php  
        if(array_key_exists('buttons',$_POST))
        {
            register();
        }
        function register()
        {
            $phone = $_GET['phone'];
            $conn = mysqli_connect("localhost", "root", "", "college_fest");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $event = $_POST['event'];
            $sql = "Select Event_name from participants where Phone_no = $phone";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $sql2 = "Select Event_name2 from participants where Phone_no = $phone";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $sql3 = "Select Event_name3 from participants where Phone_no = $phone";
            $result3 = mysqli_query($conn,$sql3);
            $row3 = mysqli_fetch_assoc($result3);
            if($row['Event_name'] == NULL)
            {
                $sql1 = "Update participants set Event_name = '$event' where Phone_no = '$phone'";
                $result1 = mysqli_query($conn,$sql1);
                if($result1)
                {
                    echo "<script>alert('Event registered successfully')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                else
                {
                    echo "<script>alert('Event not registered')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            }
            else if($row2['Event_name2'] == NULL)
            {
                $sql1 = "Update participants set Event_name2 = '$event' where Phone_no = '$phone'";
                $result1 = mysqli_query($conn,$sql1);
                if($result1)
                {
                    echo "<script>alert('Event registered successfully')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                else
                {
                    echo "<script>alert('Event not registered')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            }
            else if($row3['Event_name3'] == NULL)
            {
                $sql1 = "Update participants set Event_name3 = '$event' where Phone_no = '$phone'";
                $result1 = mysqli_query($conn,$sql1);
                if($result1)
                {
                    echo "<script>alert('Event registered successfully')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                else
                {
                    echo "<script>alert('Event not registered')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            }
            else
            {
                echo "<script>alert('You have already registered for 3 events')</script>";
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
        ?>
        </form>
    </div>
    </div>
</body>

</html>