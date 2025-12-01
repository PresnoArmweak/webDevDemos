<?php
// Start session
session_start();


// Handle logout
if (isset($_GET['lo'])) {
    session_unset();     // Clear memory
    session_destroy();   // Kill session file
    setcookie("PHPSESSID", "", time() - 3600, "/"); // Remove ID tag
    $currentSessionId = "(no session created yet)";
} else {
    // If the session is active, handle the visit counter
    if (!isset($_SESSION['visits'])) {
        $_SESSION['visits'] = 1;
    } else {
        $_SESSION['visits']++;
    }
    $currentSessionId = session_id();
}

$sessionActive = !empty($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Session Demo</title>

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            max-width: 700px;
            margin: 2rem auto;
            padding: 1.5rem;
            background: #f5f5f5;
        }

        .box {
            background: #ffffff;
            border-radius: 8px;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
        }

        code {
            background: #eee;
            padding: 2px 4px;
            border-radius: 4px;
        }

        pre {
            background: #222;
            color: #eee;
            padding: 0.75rem;
            border-radius: 6px;
            overflow-x: auto;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <div class="box">
        <h1>PHP Session Demo</h1>
        <p>This page shows how <strong>sessions</strong> remember information between page loads.</p>
    </div>

    <div class="box">
        <h2>Session Info</h2>

        <p><strong>Session ID:</strong></p>


        <p><strong>Number of times you have loaded this page in this session:</strong></p>

        <?php if ($sessionActive): ?>
            <p style="font-size: 1.5rem;"><?= $_SESSION['visits'] ?></p>
        <?php else: ?>
            <p style="font-size: 1.5rem;">no session created yet</p>
        <?php endif; ?>

    </div>

    <div class="box">
        <h2>Current <code>$_SESSION</code> Data</h2>

        <?php if ($sessionActive): ?>
            <pre><?php print_r($_SESSION); ?></pre>
        <?php else: ?>
            <pre>no session created yet</pre>
        <?php endif; ?>
    </div>
    <a href="?">Continue session </a>
    <a href="?lo=y">End Session</a>

</body>

</html>