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
                        <h2 class="color-a title">Sign In</h2><br> 
                        <div class="validation-errors <?= isset($_GET['error']) ? 'invalid' : '' ?>">
                            <?php if(isset($_GET['error'])){ ?> <p><?= $_GET['error'] ?></p> <?php } ?>
                        </div>
                        <form action="core/auth.php" class="main-contact-from" method="post">
                            <input type="email" data-name="Email" placeholder="Email" class="input" name="email" required>
                            <input type="password" data-name="Password" placeholder="********" class="input" name="password" required>
                            <input type="hidden" value="Signin" name="auth_for">
                            <button type="button" id="submit-form" class="button button-a">Sign In</button>
                        </form>
                    </div>
                    <div class="signin-footer">
                        New Here? <a href="sign-up.php" class="hover-color-black">Sign Up</a>
                    </div>
                </div>


            </div>

        </div>
        <br><br><br><br><br>
        <br><br><br><br><br>
    </section>


<?php require_once("includes/footer.php"); ?>