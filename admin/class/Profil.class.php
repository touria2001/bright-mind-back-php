<?php
require_once '../../fichierCommun/db.class.php';
require_once '../../fichierCommun/Validation.class.php';
require_once 'Admin.class.php';
require_once 'CRUDAdmin.class.php';
class Profil extends dbConnection
{

    private $nom;
    private $prenom;
    private $email;
    private $cin;
    private $telephone;
    private $pw;
    private $pwVerif;
    public $errors = array();
    public $validation;

    public function __construct($nom, $prenom, $email,  $pw, $pwVerif, $cin, $telephone)
    {
        parent::PDOConnection();
        session_start();
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pw = $pw;
        $this->pwVerif = $pwVerif;
        $this->cin = $cin;
        $this->telephone = $telephone;
        $this->validation =  new Validation();
        $this->validation->isEmptyNom($nom);
        $this->validation->isEmptyPrenom($prenom);
        $this->validation->isEmptyEmail($email);
        $this->validation->isEmptyCin($cin);
        $this->validation->isInvalidCin($cin);
        $this->validation->isInvalidNom($this->nom);
        $this->validation->isInvalidPrenom($this->prenom);
        $this->validation->isInvalidEmail($this->email);
        $this->validation->isEmptyTelephone($this->telephone);
        $this->validation->isInvalidTel($this->telephone);
        $this->errors = $this->validation->errors;
    }

    public function updateNom($nom)
    {
        $admin = new Admin();
        $id = $_SESSION['id'];
        $res =  $admin->getAdmin($id);
        if ($res['nom'] != $nom) {
            $crudAdmin = new CRUDAdmin();
            $crudAdmin->updateNomAdmin($nom, $id);
        }
    }

    public function updatePrenom($prenom)
    {
        $admin = new Admin();
        $id = $_SESSION['id'];
        $res =  $admin->getAdmin($id);
        if ($res['prenom'] != $prenom) {
            $crudAdmin = new CRUDAdmin();
            $crudAdmin->updatePrenomAdmin($prenom, $id);
        }
    }

    public function updateTel($tel)
    {
        $admin = new Admin();
        $id = $_SESSION['id'];
        $res =  $admin->getAdmin($id);
        if ($res['telephone'] != $tel) {
            $crudAdmin = new CRUDAdmin();
            $crudAdmin->updateTelAdmin($tel, $id);
        }
    }

    public function updateCin($cin)
    {
        $admin = new Admin();
        $id = $_SESSION['id'];
        $res =  $admin->getAdmin($id);
        if ($res['cin'] != $cin) {
            $crudAdmin = new CRUDAdmin();
            $crudAdmin->updateCinAdmin($cin, $id);
        }
    }

    public function updateEmail($email)
    {
        $admin = new Admin();
        $id = $_SESSION['id'];
        $res =  $admin->getAdmin($id);
        if ($res['email'] != $email) {
            $sql = "select * from admin where email='" . $email . "'";
            $res = $this->dbc->query($sql);
            parent::close();

            while ($admin = $res->fetch(PDO::FETCH_OBJ)) {
                if ($admin) {

                    $this->errors["emailExist"] = "<span style='color:red;'>this email already exists</span>";
                }
            }
            if ($this->errors == null) {
                $crudAdmin = new CRUDAdmin();
                $id = $_SESSION['id'];
                $crudAdmin->updateEmailAdmin($email, $id);
            }
            parent::close();
        }
    }

    public function updatePw($pw, $verifyPw)
    {
        if ($pw != null) {
            $this->validation->isInvalidPw($pw);
            $this->validation->isEmptyPwConfirmation($verifyPw);
            $this->validation->isNotMatchPw($pw, $verifyPw);
            $this->errors = $this->validation->errors;
            if ($this->errors == null) {
                $crudAdmin = new CRUDAdmin();
                $id = $_SESSION['id'];
                $crudAdmin->updatePwAdmin($pw, $id);
            }
        }
    }

    public function updatePhoto($nameFile, $typeFile, $sizeFile, $tmpFile)
    {
        $extensions = ['png', 'jpg', 'jpeg'];
        // Type d'image
        $type = ['image/png', 'image/jpg', 'image/jpeg'];
        // On récupère
        $extension = explode('.', $nameFile);
        // Max size
        $max_size = 100000;

        $id = $_SESSION['id'];
        // On vérifie que le type est autorisés
        if ($typeFile != null) {
            if (in_array($typeFile, $type)) {
                // On vérifie que il n'y a que deux extensions
                if (count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions)) {
                    // On vérifie le poids de l'image
                    if ($sizeFile < $max_size) {
                        // On bouge l'image uploadé dans le dossier upload
                        if (move_uploaded_file($tmpFile, 'upload/' . $id . '.' . strtolower(end($extension)))) {
                        } else {
                            $this->errors['failed'] = "<span style=\"color:red;\">image failed</span>";
                        }
                    } else {
                        $this->errors['failed'] = "<span style=\"color:red;\">File too large or incorrect format</span>";
                    }
                } else {
                    $this->errors['failed'] = "<span style=\"color:red;\">Extension failed</span>";
                }
            } else {
                $this->errors['failed'] = "<span style=\"color:red;\">Unauthorized type</span>";
            }
        }
    }
}
