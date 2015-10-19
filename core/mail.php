<?php
function mailStudent($email, $subject, $message){
    mail($email, $subject, $message);
}