<?php

if (isset($_POST['email'])) {
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
} else {
    echo "Hey...";
}