<?php
    session_start();
    session_destroy();

    echo "<script type='text/javascript'>alert('Logout Success.'); window.location.href='../index.html'</script>";
?>