<?php
// sidebar.php
// Fetch the latest alert
$alert_stmt = $pdo->query("SELECT message FROM alerts ORDER BY id DESC LIMIT 1");
$alert_row = $alert_stmt->fetch(PDO::FETCH_ASSOC);
?>

<!-- Alert Banner -->
<?php if ($alert_row): ?>
    <div class="alert-banner">
        <?php echo htmlspecialchars($alert_row['message']); ?>
    </div>
<?php endif; ?>

<!-- Sidebar -->
<div class="sidebar">
    <a href="<?php echo SITEDOMAIN;?>/dashboard.php"><i class="fas fa-home mr-2"></i> Dashboard</a>
    <a href="<?php echo SITEDOMAIN;?>/profile"><i class="fas fa-user mr-2"></i> Profile</a>
    <a href="<?php echo SITEDOMAIN;?>/friends"><i class="fas fa-users mr-2"></i> Friends</a>
</div>