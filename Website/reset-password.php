<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login");
    exit;
}
 
include 'global.php';
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 8){ // Updated to 8 to match registration rules
        $new_password_err = "Password must have at least 8 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: /login");
                exit();
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
                        <h2 class="fw-bold text-white mb-1">Reset Password</h2>
                        <p class="text-secondary-emphasis small">Please fill out this form to update your security credentials.</p>
                    </div>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                        
                        <!-- New Password Field -->
                        <div class="form-group mb-3">
                            <label class="form-label small text-muted">New Password</label>
                            <input type="password" name="new_password" class="form-control auth-input <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($new_password); ?>">
                            <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                        </div>
                        
                        <!-- Confirm Password Field -->
                        <div class="form-group mb-4">
                            <label class="form-label small text-muted">Confirm New Password</label>
                            <input type="password" name="confirm_password" class="form-control auth-input <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="form-group d-flex align-items-center justify-content-between mb-2">
                            <input type="submit" class="btn btn-purple px-4 py-2 fw-semibold" value="Update Password">
                            <a class="btn btn-outline-secondary btn-sm px-3 py-2" href="dashboard.php">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Theme-Consistent Form Design */
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

.form-control.is-invalid {
    border-color: #dc3545 !important;
    background-image: none !important;
}

.text-secondary-emphasis {
    color: #b3b3cb !important;
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
</style>

<?php include 'footer.php'; ?>