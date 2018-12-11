<?php
  session_start();
  include 'navbar.php';
  //require 'user/session.php';
  require 'model/db.php';

  // if user already login redirect them to index page
if (isset($_SESSION['s_id'])) {
  header("Location: user/collections.php");
}

// Error message and class
$msg = $msgClass = '';

if (filter_has_var(INPUT_POST, 'submit')) {
  // Get form data
  $id = mysqli_real_escape_string($conn, $_POST['userid']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Check if inputs are empty
  if (!empty($id) && !empty($password)){
    // success
    $sql = "SELECT * FROM `user` WHERE `userID`='$id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if ($resultCheck < 1) {
      // error, id not exist
      $msg = "Invalid user Id or password";
      $msgClass = "red";
    } else {
      // dehashing the password
      $pwdCheck = password_verify($_POST['password'], $row['password']);

      if($pwdCheck == false) {
        $msg = "Invalid password";
        $msgClass = "red";
      } elseif ($pwdCheck == true) {
        $_SESSION['s_id'] = $row['userID'];
        $_SESSION['s_username'] = $row['username'];
        $_SESSION['s_name'] = $row['fullname'];
        $_SESSION['s_email'] = $row['email'];
        $_SESSION['s_phone'] = $row['phoneNumb'];

        header("location: user/collections.php");
      }
    }
  } else {
    // failed ouput an error
    $msg = "Please fill in all fields";
    $msgClass = "red";
  }

  mysqli_close($conn);
}
?>
<style>

  body{
    width: 100%;
  }
  .box{
    width:100%;
  }
* {
    box-sizing: border-box;
}

</style>
<div class="row">
  <section class="section">
  <div class="container2">
      <div class="row">
	  <div class="col s3" "container2 left">
    <div class="box indigo lighten-3">
      
	  <div class="card indigo lighten-3" style="background-color : #d9d9d9;">
    <div class="card-content indigo lighten-5" style="background-color : #f5f5f0;">
           <center><h5><i class="fas fa-info-circle"></i><b> Quotes</b></h5></center>
           
             <marquee  align="leftwards" >"Success is not final, failure is not fatal. It is the courage to continue that counts [Winston S. Churchill]"
             </marquee>
             <marquee  align="leftwards" >“I find that the harder I work, the more luck I seem to have [Thomas Jefferson]”</marquee>
            <marquee  align="leftwards" >"Success seems to be connected with action. Successful people keep moving. They make mistakes, but they don't quit [Conrad Hilton]"
            </marquee>
            </div>
           <div class="card-footer small text-muted" style="background-color : #d9d9d9;"></div>
	  </div></div></div>
      <div class="col s6">
      <div class="box indigo lighten-3">
      <div class="card indigo lighten-5">
          <div class="card-content">
          <span class="card-title center-align"><b>What is SECORPUS?</b></span>
    <b><p style="text-align: justify;">The system to be developed will be the Specialised Corpus Final Examination 
    for Software Engineering (SE). The system covers for Software Engineering subject of Faculty of Information 
    Technology and Communication of UniversitI Teknikal Malaysia Melaka (UTeM). This system is developed to 
    solve and bring ease to the students on doing their revisions. Currently, students need to login into a 
    website to search for the past year examination questions before their test or final examination. This is 
    not efficient as there are too many subjects listed in the website. It is time consuming as students need to 
    search for specific questions in the past year papers that are going to be tested in their test or examination. 
    Students might encounter problems during revision on the past year questions and had no one to consult. Students 
    just need to leave a comment on the page and the adminstrator (lecturers) will be there to guide them. This will 
    improve the understandibility of students throughout their revision process. </p>
 
    </b><p></div></div></div></div>
      <!-- Login form -->
      <div class="col s3"  "container2 right">
  <div class="box indigo lighten-3">
    
  
        <div class="card">
          <div class="card-content indigo lighten-5">
            <span class="card-title center-align"><b>User Login</b></span>
            <div class="row">
              <form class="col s12" method="POST" action="" novalidate>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" id="userid" name="userid">
                    <label for="userid">User id</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field">
                      <i class="material-icons prefix">lock</i>
                    <input type="password" id="password" name="password">
                    <label for="userid">Your password</label>
                  </div>
                </div>
                <div class="row">
                  <p class="center-align">
                    New user? <a href="register.php">Register here</a><br>
                    Admin ? <a href="admin/login.php">Login here</a><br><br>
                    <button type="submit" class="waves-effect waves-light btn blue" name="submit">Login</button>
                  </p>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<!-- end login form -->
    </p>
  </div>
</div>

</section></div>
</div></div>


<?php
  include 'footer.php';
?>
<script>
          backgroundColor: [
            'rgba(255, 255, 255, 255)',
            'rgba(255, 255, 255, 255)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)'
          ],
          borderWidth: 1
        }]
      }
    });
  });
</script>
