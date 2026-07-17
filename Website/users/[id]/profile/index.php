<?php 
// Include files using relative paths to reach the root
include '../../../global.php'; 
include '../../../sidebar.php'; 

// Get ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch user data
$stmt = $pdo->prepare("SELECT username, bio, join_date FROM users WHERE id = :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle non-existent user
if (!$user) {
    echo '<div class="has-sidebar"><h2 class="text-white mt-4">User not found.</h2></div>';
    include '../../../footer.php';
    exit;
}
?>

<div class="has-sidebar">
    <div class="row mt-4">
        <!-- Profile Header -->
        <div class="col-md-4">
            <div class="card bg-dark border-secondary text-white p-3">
                <img src="/assets/default-avatar.png" class="card-img-top rounded" alt="Avatar">
                <h3 class="mt-3"><?php echo htmlspecialchars($user['username']); ?></h3>
                <p class="text-muted small">Joined: <?php echo htmlspecialchars($user['join_date']); ?></p>
            </div>
        </div>

        <!-- Bio / Info -->
        <div class="col-md-8">
            <div class="card bg-dark border-secondary text-white p-4">
                <h4>About</h4>
                <p><?php echo nl2br(htmlspecialchars($user['bio'] ?? 'This user has no bio.')); ?></p>
            </div>
        </div>
    </div>
</div>

<?php include '../../../footer.php'; ?>