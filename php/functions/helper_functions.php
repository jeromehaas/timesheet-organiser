<?php

//-----------------------------------------------------------------------------------------
// SEND EMAIL

function send_email($email, $subject, $message, $headers) {

    return mail($email, $subject, $message, $headers);

}

//-----------------------------------------------------------------------------------------
// TOKEN GENERATOR

function token_generator() {

    $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));

    return $token;

}

//-----------------------------------------------------------------------------------------
// SET A MESSAGE

function set_message($message) {

    if(!empty($message)) {

        $_SESSION['message'] = $message;

    } else {

        $message = "";

    }

}

//-----------------------------------------------------------------------------------------
// DISPLAY SETTED MESSAGE

function display_message() {

    if(isset($_SESSION['message'])) {

        echo $_SESSION['message'];

        unset($_SESSION['message']);

    }

}

?>