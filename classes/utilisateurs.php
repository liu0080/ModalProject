<?php
class Utilisateur
{
    public $login;
    public $mdp;
    public $nom;
    public $prenom;

    public function __toString()
    {
        return "[{$this->login}] {$this->naissance}{$this->email}";
    }

    public static function getUtilisateur($dbh, $login)
    {
        $query = "SELECT * FROM utilisateurs WHERE login = ?"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        if ($user = $sth->fetch()) {
            return $user;
        } else {
            return null;
        }
    }
    public static function insererUtilisateur($dbh, $login, $mdp, $nom, $prenom)
    {

        $query = "INSERT INTO utilisateurs(login,mdp,nom,prenom) VALUES (?,?,?,?)"; // eviter le piratage
        $sth = $dbh->prepare($query);
        $sth->execute(array($login, sha1($mdp), $nom, $prenom,));
        return ($sth->rowCount() == 1);
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
