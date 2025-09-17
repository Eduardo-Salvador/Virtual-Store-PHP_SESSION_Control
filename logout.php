<?php 
    session_start();
    header(header: 'Location: index.html');
    session_destroy();
?>