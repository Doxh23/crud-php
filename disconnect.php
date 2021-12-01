<?php

if (!session_id()){
    session_start();
    $_SESSION = [];
    session_destroy();
    session_unset();
}

?>