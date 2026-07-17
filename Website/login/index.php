<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../dashboard.php");
    exit;
}
 
include '../global.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: ../dashboard.php");
                            exit;
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                $login_err = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <!-- Form Card Wrapper -->
            <div class="card auth-card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-body p-5">
                    
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-white mb-1">Welcome Back</h2>
                        <p class="text-secondary-emphasis small">Please fill in your credentials to login.</p>
                    </div>

                    <!-- Global Login Error Alert -->
                    <?php 
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger border-0 text-center small py-2 mb-4 rounded-3">' . $login_err . '</div>';
                    }        
                    ?>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <!-- Username Field -->
                        <div class="form-group mb-3">
                            <label class="form-label small text-muted">Username</label>
                            <input type="text" name="username" class="form-control auth-input <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($username); ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>    
                        
                        <!-- Password Field -->
                        <div class="form-group mb-4">
                            <label class="form-label small text-muted">Password</label>
                            <input type="password" name="password" class="form-control auth-input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        
                        <!-- Action Button -->
                        <div class="form-group mb-4">
                            <input type="submit" class="btn btn-purple w-100 py-2 fw-semibold" value="Login">
                        </div>
                        
                        <hr class="border-secondary-light my-3">
                        
                        <p class="text-center small text-muted mb-0">
                            Don't have an account? <a href="<?php echo SITEDOMAIN;?>/register" class="text-purple-accent text-decoration-none">Sign up now</a>.
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Synchronized Form Customization */
.auth-card {
    background-color: #121218 !important;
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
}

.auth-input {
    background-color: #0d0d12 !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    color: #ffffff !important;
    border-radius: 8px !important;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.auth-input:focus {
    border-color: #a855f7 !important;
    box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.15) !important;
}

/* Validation Style Adjustments */
.form-control.is-invalid {
    border-color: #dc3545 !important;
    background-image: none !important;
}

.text-purple-accent {
    color: #a855f7 !important;
}

.text-secondary-emphasis {
    color: #b3b3cb !important;
}

.border-secondary-light {
    border-top: 1px solid rgba(255, 255, 255, 0.08);
}

.btn-purple {
    background-color: #6b21a8 !important;
    color: white !important;
    border: none !important;
    border-radius: 8px;
    transition: background-color 0.2s;
}

.btn-purple:hover {
    background-color: #581c87 !important;
}

.rounded-4 {
    border-radius: 1rem !important;
}

.alert-danger {
    background-color: rgba(220, 53, 69, 0.15) !important;
    color: #ea868f !important;
}
</style>

<?php include '../footer.php'; ?>