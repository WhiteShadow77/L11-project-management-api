<?php
// artisan_runner.php
// --- A SECURE TOOL TO RUN ARTISAN COMMANDS WITHOUT SSH ---
// --- UPLOAD TO htdocs/public/ WHEN NEEDED, DELETE IMMEDIATELY AFTER USE ---

// 1. SET YOUR SECURE PASSWORD
use Illuminate\Support\Facades\Artisan;

$password = '1qqwerty1q'; // <--- CHANGE THIS!!!

// 2. LIST OF ALLOWED COMMANDS (for security)
$allowed_commands = [
    'optimize',
    'optimize:clear',
    'config:cache',
    'route:cache',
    'view:cache',
    'cache:clear',
    'migrate',
    'db:seed',
    'storage:link',
    'queue:work',
];

// --- DO NOT EDIT BELOW THIS LINE ---

// =============================================================================
// LARAVEL BOOTSTRAP (Standard Version)
// =============================================================================
require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());
// =============================================================================

session_start();

// Simple authentication logic
if (isset($_POST['password']) && $_POST['password'] === $password) {
    $_SESSION['authenticated'] = true;
}

if (!isset($_SESSION['authenticated'])) {
    // Show login form
    echo '<h1>Artisan Command Runner</h1>';
    echo '<form method="post">';
    echo 'Password: <input type="password" name="password">';
    echo ' <input type="submit" value="Login">';
    echo '</form>';
    exit;
}

// Handle command execution
$output = '';
if (isset($_POST['command']) && in_array($_POST['command'], $allowed_commands)) {
    $command = $_POST['command'];
    $params = [];

    // Handle special cases for parameters
    if ($command === 'migrate' || $command === 'db:seed') {
        $params['--force'] = true;
    }

    try {
        Artisan::call($command, $params);
        $output = Artisan::output();
    } catch (\Exception $e) {
        $output = "Error: " . $e->getMessage();
    }
}

// Show the command form and output
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Artisan Command Runner</title>
        <style>
            body { font-family: sans-serif; max-width: 800px; margin: auto; padding: 20px; }
            pre { background: #f4f4f4; padding: 15px; border-radius: 5px; white-space: pre-wrap; word-wrap: break-word; }
            .warning { color: red; font-weight: bold; border: 1px solid red; padding: 10px; background: #fff0f0; }
        </style>
    </head>
    <body>
    <h1>Artisan Command Runner</h1>

    <div class="warning">
        WARNING: This is a powerful tool. Delete this file from the server immediately after you are finished.
    </div>

    <h2>Run a Command</h2>
    <form method="post">
        <select name="command">
            <?php foreach ($allowed_commands as $cmd): ?>
                <option value="<?php echo $cmd; ?>"><?php echo $cmd; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Run Command">
    </form>

    <?php if ($output): ?>
        <h2>Output:</h2>
        <pre><?php echo htmlspecialchars($output); ?></pre>
    <?php endif; ?>

    <hr>
    <a href="?logout=true">Logout</a>

    </body>
    </html>
<?php

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
