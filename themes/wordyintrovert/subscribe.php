<?php

if (isset($_POST['email'])) {
    $posted_email = $_POST['email'];
    $at_symbol = "@";
    $pos = strpos($posted_email, $at_symbol);

    if ($pos === false) {
        return;
    }

    $from    = "From: Wordy Introvert <mrwordy@wordyintrovert.com>";
    $to      = "rob.johansen@gmail.com";
    $subject = "New Subscriber";
    $body    = "Greetings Rob,";
    $body    = "\n\n";
    $body   .= "You just got a new subscriber (possibly):";
    $body   .= "\n\n";
    $body   .= $_POST['email'];
    $body   .= "\n\n";
    $body   .= "Use that thing if it looks real!";
    $body   .= "\n\n";
    $body   .= "Regards,\n";
    $body   .= "You";

    mail($to, $subject, $body, $from);
}