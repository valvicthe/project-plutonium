<?php
// Initialize the session
session_start();

// FIXED: Added "../" to step out of the games folder and find global.php in the root directory
include '../global.php'; 
include '../sidebar.php';

// Classic 2013 Roblox games array
$games = [
    [
        "id" => 1,
        "title" => "Sword Fights on the Heights IV",
        "creator" => "Telamon",
        "thumbnail" => "https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png",
        "playing" => rand(2, 12),
        "visits" => "1.2M+",
        "year" => "2013"
    ],
    [
        "id" => 2,
        "title" => "Work at a Pizza Place",
        "creator" => "Dued1",
        "thumbnail" => "https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png",
        "playing" => rand(5, 20),
        "visits" => "3.4M+",
        "year" => "2013"
    ],
    [
        "id" => 3,
        "title" => "Natural Disaster Survival",
        "creator" => "Stickmasterluke",
        "thumbnail" => "https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png",
        "playing" => rand(3, 15),
        "visits" => "2.1M+",
        "year" => "2013"
    ],
    [
        "id" => 4,
        "title" => "Chaos Canyon",
        "creator" => "Roblox",
        "thumbnail" => "https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png",
        "playing" => 0,
        "visits" => "450K+",
        "year" => "2013"
    ],
    [
        "id" => 5,
        "title" => "Crossroads",
        "creator" => "Roblox",
        "thumbnail" => "https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png",
        "playing" => rand(1, 8),
        "visits" => "980K+",
        "year" => "2013"
    ],
    [
        "id" => 6,
        "title" => "Doomspire Brickbattle",
        "creator" => "GForetold",
        "thumbnail" => "https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png",
        "playing" => rand(2, 10),
        "visits" => "800K+",
        "year" => "2013"
    ]
];
?>

<div class="container my-5">
    <!-- Header Area -->
    <div class="row mb-4 align-items-center">
        <div class="col-md-6 text-center text-md-left">
            <h1 class="fw-bold text-white mb-1">Discover Games</h1>
        </div>
        <div class="col-md-6 text-center text-md-right">
            <button class="btn btn-purple px-4 py-2" onclick="alert('coming soon!')">
                <i class="fas fa-plus-circle mr-2"></i> Create a Place...
            </button>
        </div>
    </div>

    <!-- Games Grid -->
    <div class="row g-4">
        <?php foreach ($games as $game): ?>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                <div class="card game-card border-0 shadow-lg rounded-4 overflow-hidden h-100">
                    
                    <div class="game-thumb-wrapper position-relative">
                        <img src="<?php echo $game['thumbnail']; ?>" class="card-img-top game-thumb" alt="<?php echo htmlspecialchars($game['title']); ?>">
                        <span class="badge badge-year position-absolute"><?php echo $game['year']; ?></span>
                    </div>

                    <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title text-white fw-bold text-truncate mb-1">
                                <?php echo htmlspecialchars($game['title']); ?>
                            </h5>
                            <p class="card-subtitle text-secondary-emphasis small mb-3">
                                By <span class="text-purple-accent fw-semibold"><?php echo htmlspecialchars($game['creator']); ?></span>
                            </p>
                        </div>

                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="small text-muted">
                                    <i class="fas fa-eye mr-1"></i> <?php echo $game['visits']; ?> Visits
                                </span>
                                <span class="small <?php echo $game['playing'] > 0 ? 'text-success-glow' : 'text-muted'; ?>">
                                    <i class="fas fa-circle mr-1 small"></i> 
                                    <strong><?php echo $game['playing']; ?></strong> active
                                </span>
                            </div>
                            
                            <a href="#" onclick="alert('Launching client for game ID <?php echo $game['id']; ?>...')" class="btn btn-purple-outline btn-block py-2">
                                <i class="fas fa-play mr-2"></i> Play Game
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
.game-card {
    background-color: #121218 !important;
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
    transition: transform 0.25s ease, border-color 0.25s ease;
}
.game-card:hover {
    transform: translateY(-5px);
    border-color: rgba(168, 85, 247, 0.4) !important;
}
.game-thumb-wrapper {
    background-color: #1a1a24;
    aspect-ratio: 16 / 9;
    overflow: hidden;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}
.game-thumb {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.game-card:hover .game-thumb {
    transform: scale(1.05);
}
.badge-year {
    top: 10px;
    right: 10px;
    background-color: rgba(107, 33, 168, 0.85);
    color: #fff;
    font-size: 0.75rem;
    padding: 5px 10px;
    border-radius: 6px;
    backdrop-filter: blur(4px);
    border: 1px solid rgba(168, 85, 247, 0.3);
}
.text-purple-accent { color: #a855f7 !important; }
.text-secondary-emphasis { color: #b3b3cb !important; }
.text-success-glow {
    color: #4ade80 !important;
    text-shadow: 0 0 8px rgba(74, 222, 128, 0.3);
}
.btn-purple {
    background-color: #6b21a8 !important;
    color: white !important;
    border: none !important;
    border-radius: 8px;
}
.btn-purple:hover { background-color: #581c87 !important; }
.btn-purple-outline {
    border: 1px solid #6b21a8 !important;
    color: #c084fc !important;
    background: transparent !important;
    border-radius: 8px;
}
.btn-purple-outline:hover {
    background-color: #6b21a8 !important;
    color: white !important;
}
.rounded-4 { border-radius: 1rem !important; }
</style>

<?php 
// FIXED: Added "../" here too so it finds footer.php in the root directory
include '../footer.php'; 
?>