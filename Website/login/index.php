<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../dashboard.php");
    exit;
}
 
include '../global.php';
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            
                            // --- REMEMBER ME LOGIC ---
                            if (isset($_POST['remember_me'])) {
                                $token = bin2hex(random_bytes(32)); 
                                // Save token to DB
                                $stmt_token = $pdo->prepare("UPDATE users SET remember_token = :token WHERE id = :id");
                                $stmt_token->execute(['token' => $token, 'id' => $id]);
                                // Set cookie for 30 days
                                setcookie('remember_me', $token, time() + (86400 * 30), "/", "", false, true);
                            }
                            // -------------------------

                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                   
                            
                            header("location: ../dashboard.php");
                            exit;
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                $login_err = "Oops! Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }
    unset($pdo);
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card auth-card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-body p-5">
                    
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-white mb-1">Welcome Back</h2>
                        <p class="text-secondary-emphasis small">Please fill in your credentials to login.</p>
                    </div>

                    <?php 
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger border-0 text-center small py-2 mb-4 rounded-3">' . $login_err . '</div>';
                    }        
                    ?>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="form-group mb-3">
                            <label class="form-label small text-muted">Username</label>
                            <input type="text" name="username" class="form-control auth-input <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($username); ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>    
                        
                        <div class="form-group mb-3">
                            <label class="form-label small text-muted">Password</label>
                            <input type="password" name="password" class="form-control auth-input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="form-group mb-4 d-flex align-items-center">
                            <input type="checkbox" name="remember_me" id="remember_me" class="mr-2">
                            <label for="remember_me" class="text-muted mb-0 small">Remember me</label>
                        </div>
                        
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
.auth-card { background-color: #121218 !important; border: 1px solid rgba(255, 255, 255, 0.05) !important; }
.auth-input { background-color: #0d0d12 !important; border: 1px solid rgba(255, 255, 255, 0.1) !important; color: #ffffff !important; border-radius: 8px !important; transition: border-color 0.2s, box-shadow 0.2s; }
.auth-input:focus { border-color: #a855f7 !important; box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.15) !important; }
.form-control.is-invalid { border-color: #dc3545 !important; background-image: none !important; }
.text-purple-accent { color: #a855f7 !important; }
.text-secondary-emphasis { color: #b3b3cb !important; }
.border-secondary-light { border-top: 1px solid rgba(255, 255, 255, 0.08); }
.btn-purple { background-color: #6b21a8 !important; color: white !important; border: none !important; border-radius: 8px; transition: background-color 0.2s; }
.btn-purple:hover { background-color: #581c87 !important; }
.rounded-4 { border-radius: 1rem !important; }
.alert-danger { background-color: rgba(220, 53, 69, 0.15) !important; color: #ea868f !important; }
</style>

<?php include '../footer.php'; ?>
