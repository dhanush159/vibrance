<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <link rel="stylesheet" href="/web/css/login_style1.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="apple-touch-icon" sizes="180x180" href="/web/img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/web/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/web/img/favicon-16x16.png">
  <link rel="manifest" href="/web/img/site.webmanifest">

</head>

<body>
  <header><br>
    <nav class="navbar navbar-expand-lg navbar-dark text-info-emphasis fixed-top"
      style="background-color: #1415158b; padding-left: 2%; padding-right: 4%; ">
      <div class="container-fluid text-info-emphasis" style="background-color: #1415158b; padding: 5px;">
        <a class="navbar-brand" href="index.html" style="font-size: 2em;">Vibrance 2023</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-size: 1em;">
          <ul class="navbar-nav navbar-nav-scroll">
            <li class="nav-item">
              <a class="nav-link" href="index.html#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html#sponsors">Sponsors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web/schedule.html">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="events.html">Event List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html#contact-us">Contact Us</a>
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
  </header>
  <div class="box">
    <form action="login.php" method="post">
      <span class="text-center">Login</span>
      <div class="input-container">
        <input type="text" name="number" required>
        <label>Phone Number</label>
      </div>
      <div class="input-container">
        <input type="password" name="psw" required>
        <label>Password</label>
      </div>
      <div style="margin-top: 10px;">
      <button type="submit" class="btn">Submit</button>
      </div>
    </form>
    <?php 
      session_start();
      $con = mysqli_connect("localhost", "root", "", "college_fest");
      if(!$con) {
        echo "Connection failed";
        die("Connection failed: " . mysqli_connect_error());
      }
      if(!isset($_POST['number']) || !isset($_POST['psw']))
      {}
      else
      {
        $phone = $_POST['number'];
        $password = $_POST['psw'];
        $query = "SELECT * FROM participants WHERE Phone_no='$phone' AND Passwrd='$password'";
     
        $result = mysqli_query($con, $query);
        $name="Select Pname from participants where Phone_no='$phone'";
        $result1 = mysqli_query($con, $name);
        $result1= mysqli_fetch_assoc($result1);
        $email = "Select PEmail from participants where Phone_no='$phone'";
        $result2 = mysqli_query($con, $email);
        $result2 = mysqli_fetch_assoc($result2);
        $college = "Select College from participants where Phone_no='$phone'";
        $result3 = mysqli_query($con, $college);
        $result3 = mysqli_fetch_assoc($result3);

        if(mysqli_num_rows($result) > 0) 
        {
          echo "Login Successful";
          $_SESSION['phone'] = $phone;
          header("Location: dashboard.php?name=".$result1['Pname']."&email=".$result2['PEmail']."&college=".$result3['College']."&phone=$phone");
        }
        else 
        {
          echo '<p style="color: red;">Login Failed....Please Check your Phone Number and Password</p>';
        }
      }
      ?>
  </div>
</body>

</html>