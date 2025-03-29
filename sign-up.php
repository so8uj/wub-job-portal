<?php 
    require_once("includes/header.php"); 
    if(isset($_SESSION['auth_id'])) { 
        header("Location: my-jobs.php");
    }

?>

    <section class="single-page bg-white">

        <div class="container">

            <div class="w-40 mx-auto">
                <div class="box-shadow contact-form">
                        <h2 class="color-a title">Sign Up</h2><br>
                        <div class="validation-errors"></div>
                        <form action="core/auth.php" class="main-contact-from" method="post">
                            <input type="text" data-name="Company Name" placeholder="Company Name" class="input" name="name" required>
                            <input type="text" data-name="Company Email" placeholder="Company Email" class="input" name="email" required>
                            <input type="password" name="password" data-name="Password" placeholder="Password" class="input" required>
                            <input type="password" name="confirm_password" data-name="Confirm Password" placeholder="Confirm Password" class="input" required>
                            
                            <input type="hidden" value="Signup" name="auth_for">

                            <button type="button" id="submit-form"  class="button button-a">Sign Up</button>
                        </form>
                    </div>
                    <div class="signin-footer">
                        Already Have an Account? <a href="sign-in.php" class="hover-color-black">Sign In</a>
                    </div>
                </div>


            </div>

        </div>
        <br><br><br><br><br>
    </section>


<?php require_once("includes/footer.php"); ?>