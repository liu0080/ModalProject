<?php       // we use table 'demande_registration.sql' to store the demande of registration before being validated by admin
class Demande
{
    public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $promotion;
    public $email;


    public static function getUtilisateur($dbh, $login)
    {
        $query = "SELECT * FROM demande_registration WHERE login = ?"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Demande');
        $sth->execute(array($login));
        if ($user = $sth->fetch()) {
            return $user;
        } else {
            return null;
        }
    }
    public static function deleteUtilisateur($dbh, $login)
    {
        $query = "DELETE FROM demande_registration WHERE login=?"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
    }

    public static function insererUtilisateur($dbh, $login, $mdp, $nom, $prenom, $promotion, $email)
    {
        $query = "INSERT INTO demande_registration(login,mdp,nom,prenom,promotion,email) VALUES (?,?,?,?,?,?)"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->execute(array($login, sha1($mdp), $nom, $prenom, $promotion, $email));
        return ($sth->rowCount() == 1);
    }
}
