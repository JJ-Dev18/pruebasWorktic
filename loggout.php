<?php
    include_once './users/user_session.php';

    $userSession = new UserSession();
    $userSession->closeSession();

    header("location: login.php");

?>