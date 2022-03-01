<?php
class Utilisateur
{
    public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $promotion;
    public $email;
    public $tele;
    public $facebook;

    public function __toString()
    {
        return "[{$this->login}]{$this->nom} {$this->prenom}";
    }

    public static function getUtilisateur($dbh, $login)
    {
        $query = "SELECT * FROM utilisateurs WHERE login = ?"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        return $sth->fetch();
    }
    public static function insererUtilisateur($dbh, $login, $mdp, $nom, $prenom, $promotion, $email)
    {
        $query = "INSERT INTO utilisateurs(login,mdp,nom,prenom,promotion,email) VALUES (?,?,?,?,?,?)"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->execute(array($login, $mdp, $nom, $prenom, $promotion, $email));      // we do not encrypt the password as it's already encrypted in the table 'demande_registration'
        return ($sth->rowCount() == 1);
    }

    public static function updateUtilisateur($dbh, $login, $promotion, $nom, $prenom, $email, $tele, $facebook)
    {
        $query = "UPDATE utilisateurs  SET promotion=?,nom=?,prenom=?,email=?,tele=?,facebook=? WHERE login=?"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->execute(array($promotion, $nom, $prenom, $email, $tele, $facebook, $login));
    }

    public static function updatePhoto($dbh, $login, $avatar)
    {
        $query = "UPDATE utilisateurs  SET avatar=? WHERE login=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($avatar, $login));
    }
    public static function updateAdmin($dbh, $login)
    {
        $query = "UPDATE utilisateurs  SET Admin=1 WHERE login=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
    }

    public static function deleteUtilisateur($dbh, $login)
    {
        $query = "DELETE FROM utilisateurs WHERE login=?"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
    }

    public function testerMDP($dbh, $mdp)
    {
        $query = "SELECT * FROM utilisateurs WHERE login = ? AND mdp = ?"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->execute(array($this->login, sha1($mdp)));
        return ($sth->rowCount() == 1);
    }
    public function updateMDP($dbh, $mdp)
    {
        $query = "UPDATE utilisateurs SET mdp = ? WHERE login = ?"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->execute(array(sha1($mdp), $this->login));
        return ($sth->rowCount() == 1);
    }
}
