<?php

class Event
{
    public $id;
    public $title;
    public $content;
    public $authur;
    public $date;
    public $status;
    public $photo;

    public static function insererEvent($dbh, $title, $content, $authur, $date, $status, $photo)
    {
        $query = "INSERT INTO event(title,content,authur,date,status,photo) VALUES (?,?,?,?,?,?)"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->execute(array($title, $content, $authur, $date, $status, $photo));
        return ($sth->rowCount() == 1);
    }
    public static function deleteEvent($dbh, $id)
    {
        $query = "DELETE FROM event WHERE id = ?"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->execute(array($id));
    }
}
