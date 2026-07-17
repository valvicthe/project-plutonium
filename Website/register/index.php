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
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                $username_err = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Password must have at least 8 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
         
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: ../login");
                exit;
            } else{
                $confirm_password_err = "Oops! Something went wrong. Please try again later.";
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
                        <h2 class="fw-bold text-white mb-1">Create Account</h2>
                        <p class="text-secondary-emphasis small">Please fill this form to join Project Plutonium.</p>
                    </div>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <!-- Username Field -->
                        <div class="form-group mb-3">
                            <label class="form-label small text-muted">Username (10 Character Limit)</label>
                            <input type="text" maxlength="10" name="username" class="form-control auth-input <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($username); ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>    
                        
                        <!-- Password Field -->
                        <div class="form-group mb-3">
                            <label class="form-label small text-muted">Password</label>
                            <input type="password" name="password" class="form-control auth-input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($password); ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        
                        <!-- Confirm Password Field -->
                        <div class="form-group mb-4">
                            <label class="form-label small text-muted">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control auth-input <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($confirm_password); ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="form-group d-flex align-items-center justify-content-between mb-4">
                            <input type="submit" class="btn btn-purple px-4 py-2" value="Sign Up">
                            <input type="reset" class="btn btn-outline-secondary btn-sm px-3 py-2" value="Reset Fields">
                        </div>
                        
                        <hr class="border-secondary-light my-3">
                        
                        <p class="text-center small text-muted mb-0">
                            Already have an account? <a href="<?php echo SITEDOMAIN;?>/login" class="text-purple-accent text-decoration-none">Login here</a>.
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Modern Form Styles */
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

/* Fix browser invalid state text drop down */
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
}

.btn-purple:hover {
    background-color: #581c87 !important;
}

.rounded-4 {
    border-radius: 1rem !important;
}
</style>

<?php include '../footer.php'; ?>