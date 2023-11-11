<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Registration</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/web/css/regis_style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="apple-touch-icon" sizes="180x180" href="/web/img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/web/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/web/img/favicon-16x16.png">
  <link rel="manifest" href="/web/img/site.webmanifest">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</head>

<body>
<header><br>
        <nav class="navbar navbar-expand-lg navbar-dark text-info-emphasis fixed-top"
            style="background-color: #00050a00; padding-left: 2%; padding-right: 4%;">
            <div class="container-fluid text-info-emphasis"
                style="background-color: #010003aa; padding: 5px; font-size: 1.1em;">
                <a class="navbar-brand" href="/web/index.html" style="font-size: 2em;">Vibrance 2023</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-size: 1em;">
                    <ul class="navbar-nav navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link" href="/web/index.html#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/web/index.html#sponsors">Sponsors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/web/schedule.html">Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/web/events.html">Event List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/web/index.html#contact-us">Contact Us</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/web/admin_login.php">Admin Login</a>
                        </li>
                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header><br /><br />
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="full_name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="password_c" required>
          </div>
          <div class="input-box">
            <span class="details">College Name</span>
            <input class="details" type="text" placeholder="College Name" name="Col_name" required>
          </div>
        </div>
        <button style="--clr:#5fa9ff" type="submit"><span>Submit</span><i></i></button>
        <!-- <div class="button">
            <input type="submit" value="Register">
          </div> -->
        <p style="text-align: center; font-size: 20px; color: #fff; margin-top: 20px;">Already have an account? <a
            href="/web/login.php">Login</a></p>
      </form>
    </div>
    <?php
      $host = 'localhost';
      $user = 'root';
      $passwordd = '';
      $dbname = 'college_fest';
      $conn = mysqli_connect($host, $user, $passwordd, $dbname);
      if(! $conn )
      {
        echo '<br>3';
        die('Could not connect: '.mysqli_connect_error());
      }
      if(!isset($_POST['full_name']) || !isset($_POST['password']) || !isset($_POST['password_c']) || !isset($_POST['number']) || !isset($_POST['email']) || !isset($_POST['Col_name']))
      {}
      else
      {
        $full_name=$_POST['full_name'];
        $pass=$_POST['password'];
        $pass2=$_POST['password_c'];
        $phone=$_POST['number'];
        $email=$_POST['email'];
        $col_name=$_POST['Col_name'];
        if($_POST['password'] != $_POST['password_c'])
        {
          echo '<p style="color: red;position: relative; text-align: center;">Your passwords did not match.</p>';
          exit();
        }
        else
        {
          $full_name = mysqli_real_escape_string($conn, $full_name);
          $pass = mysqli_real_escape_string($conn, $pass);
          $pass2 = mysqli_real_escape_string($conn, $pass2);
          $phone = mysqli_real_escape_string($conn, $phone);
          $email = mysqli_real_escape_string($conn, $email);
          $col_name = mysqli_real_escape_string($conn, $col_name);
          $phone_search="SELECT * FROM `Participants` WHERE `Phone_no` = '$phone' or `PEmail` = '$email'";
          $query = mysqli_query($conn, $phone_search);
          $phone_count = mysqli_num_rows($query);
          if($phone_count>0)
          {
            echo '<p style="color: red;position: relative; text-align: center;">Phone number already exists.</p>';
            exit();
          }
          else
          {
            $sql = "INSERT INTO `Participants`(`PName`, `Phone_no`, `PEmail`, `College`, `Passwrd`) VALUES ('$full_name','$phone', '$email', '$col_name','$pass');";
            if(mysqli_query($conn, $sql))
            {
              echo '<p style="color: green;position: relative; text-align: center;">You have successfully registered.</p>';
            }
            else
            {
              echo '<p style="color: red;position: relative; text-align: center;">You have not registered.</p>';
            }
          }
        }
      }
      mysqli_close($conn);
    ?>
  </div>
  <!-- </main> -->
</body>

</html>