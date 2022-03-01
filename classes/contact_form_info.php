<?php
class ContactInfo
{
    public $email;
    public $section;
    public $message;
    public $date;

    public static function insererMessage($dbh, $email, $section, $message, $date)
    {

        $query = "INSERT INTO contact_form_info(email,section,message,date) VALUES (?,?,?,?)"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->execute(array($email, $section, $message, $date,));
        return ($sth->rowCount() == 1);
    }
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
