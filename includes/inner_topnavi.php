<?php $secret         =   new SecretCls(); ?>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/images/user.png" alt=""><?php echo $user->data()->FirstName ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <!--
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                    <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                    </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
-->
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                            <i class="fa fa-user pull-right"></i> Profile
                        </a>
                        <a class="dropdown-item" href="../logout.php" onclick="closeCurrent();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                </li>

                <!--
                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
-->
            </ul>
        </nav>
        <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">
                            <i class="fa fa-user" style="color: green;"></i>&nbsp; | <b> User Profile</b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Profile Content -->
                        <div class="profile-details">
                            <p style="font-size: 12pt;"><strong>Name:</strong> <?php echo $user->data()->FirstName ?> <?php echo $user->data()->LastName ?></p>
                            <p style="font-size: 12pt;"><strong>Email:</strong> <?php echo $user->data()->EMail ?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePasswordModal" data-dismiss="modal">Change Password</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Change Password Modal -->
        <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">
                            <i class="fa fa-lock" style="color: red;"></i>&nbsp; | <b> Change Password</b>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Change Password Form -->
                        <form action="" method="POST" onsubmit="return validatePasswords()">
                            <div class="form-group">
                                <label for="currentPassword">Current Password</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                            </div>
                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" required onkeyup="validatePasswords()">
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required onkeyup="validatePasswords()">
                            </div>
                            <div id="passwordError" class="text-danger" style="display: none;">
                                <!-- Error message if passwords do not match -->
                                Passwords do not match. Please try again.
                            </div>
                            <button type="submit" class="btn btn-primary" id="submitButton" name="submitButton" style="display: none;">Save Changes</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /top navigation -->

<!--Confirm Password is matched-->
<script>
    function validatePasswords() {
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const errorElement = document.getElementById('passwordError');
        const submitButton = document.getElementById('submitButton');

        if (newPassword !== confirmPassword || newPassword === '' || confirmPassword === '') {
            errorElement.style.display = 'block'; // Show error message
            submitButton.style.display = 'none';
            return false; // Prevent form submission
        }

        errorElement.style.display = 'none'; // Hide error message if valid
        submitButton.style.display = 'block';
        return true; // Allow form submission
    }

</script>


<?php
if (isset($_POST['submitButton'])) { 
    
    
    $OldPassword = Input::get('currentPassword');
    $NewPassword = Input::get('newPassword');
    $ConfirmPassword = Input::get('confirmPassword');
    
    $options    =   ['cost' => 11];
    $HashPass   =   password_hash($NewPassword, PASSWORD_BCRYPT, $options);
    
//    echo '<script>alert("'.$HashPass.'");</script>';
    
    $secret->dynamicFunction('upd_nsqcs_user_account', 
            array(
                    $OldPassword,
                    $NewPassword,
                    $user->data()->ID,
                    $HashPass
                 )
            )[0];
    

    $redirect->to('../dashboard/dashboard.php?nv='.$gen->encrypt_decrypt('encrypt','dashboard').''.'&successpass');
    exit();
    
    
}
?>

<!--   LOGOUT-->
<script>
    function closeCurrent() {

        var x = confirm('Are you sure want to end your session?');
        if (x) {
            //window.open('invalidUrl.html', '_self', ''); // not works
            //window.open('invalidUrl.html', '_self', ''); // not works
            //window.open('invalidUrl.html', '_self', ''); // not works
            //window.close();
            window.location.href = "../logout.php";
        }
    }

</script>
