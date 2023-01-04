<?php 

session_start();

// !isset() = is not set
// if $_SESSION['login_form_csrf_token'] is not set,
// when token is already available,we won't regenerate it again
if ( !isset( $_SESSION['login_form_csrf_token'] ) ) {
    // generate csrf token
    $_SESSION['login_form_csrf_token'] = bin2hex( random_bytes(32) );
    }


//load file then only start functions
require "includes/functions.php";
require "includes/class-authernitacion.php";

    // process the login form
    if ( $_SERVER["REQUEST_METHOD"] === 'POST' ) {

      // verify the csrf token is correct or not

      if ( $_POST['login_form_csrf_token'] !== $_SESSION['login_form_csrf_token'] )
      {
        die("Nice try! But I'm smarter than you!");
      }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $auth = new Authentication();
        $error = $auth->login(
            $email,
            $password
        );
    }




$database = connectToDB();
?>

<!-- require the header part -->
<?php require "parts/header.php" ?>



<div class="container mt-5 mb-2 mx-auto" style="max-width: 900px;">
    <div class="min-vh-100">
        <!-- login form -->
        <div class="card rounded shadow-sm mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title text-center mb-3 py-3 border-bottom">
                    Login To Your Account
                </h5>

                <?php require "parts/error_box.php" ?>


                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" />
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-fu">
                            Login
                        </button>
                    </div>
                    <input type="hidden" name="login_form_csrf_token"
                        value="<?php echo $_SESSION['login_form_csrf_token']; ?>" />
                </form>
            </div>
        </div>

        <!-- links -->
        <div class="d-flex justify-content-between align-items-center gap-3 mx-auto pt-3" style="max-width: 500px;">
            <a href="/" class="text-decoration-none small"><i class="bi bi-arrow-left-circle"></i> Go
                back</a>
            <a href="/signup" class="text-decoration-none small">Don't have an account? Sign up here
                <i class="bi bi-arrow-right-circle"></i></a>
        </div>
    </div>

    <!-- require the footer part -->
    <?php require "parts/footer.php" ?>
    <!-- require the footer part -->