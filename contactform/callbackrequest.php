<?php

if ($_POST) {
    $strMsg = $_POST["msg"];
    $strEmail = $_POST["email"];
    $strCountryCode = $_POST["countrycode"];
    $strTel = $_POST["telno"];

    $to = 'info@lankatours.at';
    $subject = 'Call Back Request';

    $headers = "From: " . strip_tags($_POST["email"]) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($_POST["email"]) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = '<h3>Contact Request from '.$strName.'</h3>'
            . '<table border="1" width="500">'
            . '<tbody>'
            . '<tr>'
            . '<td width="20%"><strong>Email</strong></td>'
            . '<td><a href="mailto:'.$strEmail.'">'.$strEmail.'</a></td>'
            . '</tr>'
            . '<tr>'
            . '<td width="20%"><strong>Massage</strong></td>'
            . '<td>'.$strMsg.'</td>'
            . '</tr>'
            . '<tr>'
            . '<td width="20%"><strong>Country Code</strong></td>'
            . '<td>+'.$strCountryCode.'</td>'
            . '</tr>'
            . '<tr>'
            . '<td width="20%"><strong>Telephone Number</strong></td>'
            . '<td>'.$strTel.'</td>'
            . '</tr>'
            . '<tr>'
            . '</tr>'
            . '</tbody>'
            . '</table>';
    mail($to, $subject, $message, $headers);  
    header("Location: ../index.html");
}