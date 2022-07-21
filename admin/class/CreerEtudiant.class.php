<?php
require_once '../../fichierCommun/db.class.php';
require_once '../../fichierCommun/Validation.class.php';
class CreerEtudiant extends dbConnection
{
    private $nom;
    private $prenom;
    private $email;
    private $cin;
    private $telephone;
    private $niveauScolaire;
    private $pw;
    private $pwVerif;
    public $errors = array();
    public $validation;

    public function __construct($nom, $prenom, $email,  $pw, $pwVerif, $cin, $telephone, $niveauScolaire)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pw = $pw;
        $this->pwVerif = $pwVerif;
        $this->cin = $cin;
        $this->telephone = $telephone;
        $this->niveauScolaire = $niveauScolaire;
        $this->validation =  new Validation();
        $this->validation->isEmptyNom($nom);
        $this->validation->isEmptyPrenom($prenom);
        $this->validation->isEmptyEmail($email);
        $this->validation->isEmptyPw($pw);
        $this->validation->isEmptyPwConfirmation($pwVerif);
        $this->validation->isEmptyCin($cin);
        $this->validation->isEmptyNiveauScolaire($niveauScolaire);
        $this->validation->isInvalidCin($cin);
        $this->validation->isInvalidNom($this->nom);
        $this->validation->isInvalidPrenom($this->prenom);
        $this->validation->isInvalidEmail($this->email);
        $this->validation->isInvalidPw($this->pw);
        $this->validation->isNotMatchPw($this->pw, $this->pwVerif);
        $this->validation->isEmptyTelephone($this->telephone);
        $this->validation->isInvalidTel($this->telephone);
        $this->validation->isInvalidNiveauScolaire($this->niveauScolaire);
        $this->errors = $this->validation->errors;
    }



    public function isEmailExist()
    {
        parent::PDOConnection();
        $sql = "select * from etudiant where email='" . $this->email . "'";
        $res = $this->dbc->query($sql);
        parent::close();
        while ($prof = $res->fetch(PDO::FETCH_OBJ)) {
            if ($prof) {
                $this->errors["emailExist"] = "<span style='color:red;'>this email is already exist</span>";
            }
        }
        parent::close();
    }

    public function sendEmailToEtudiant()
    {
        if ($this->errors == null) {
            require_once '../../lib/mail.php';
            $mail->setFrom('touriaa.abbou@gmail.com', mb_encode_mimeheader('bright mind', 'UTF-8'));
            $mail->addAddress($this->email);
            $mail->Subject = mb_encode_mimeheader('Your account in bright mind', 'UTF-8');

            $message = "hi," . $this->prenom . " " . $this->nom . "<br>This message was sent to you via the bright mind site, your account is<br>
                       
                        <b>Email : </b>" . $this->email . ".<br>
                        <b>Password : </b>" . $this->pw . ".<br>.";
            $mail->Body    = $message;

            try {

                $resulate =   $mail->send();
            } catch (Exception $e) {
                $this->errors["erreurEnvoi"] = "the message cant't be sent to this profile";
            }
        }
    }
    public function createEtudiant()
    {
        if ($this->errors == null) {
            require_once '../../etudiant/class/CRUDStudent.class.php';
            $admin = new CRUDStudent();
            $admin->setEmail($this->email);
            $admin->setPw($this->pw);
            if(!isset($_SESSION)){
                session_start();
            }
            $ajouterPar = $_SESSION['id'];
            $admin->addStudent($this->prenom, $this->nom, $this->cin, $this->telephone, $this->niveauScolaire, $ajouterPar);
        }
    }
}
