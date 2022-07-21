<?php
class Validation
{
    public $errors = array();

    public function isEmptyNom($nom)
    {
        if (empty($nom)) {
            $this->errors['nomVide'] = "<span style='color:red;'>please fill  the last name field</span>";
        }
    }
    public function isEmptyPrenom($prenom)
    {
        if (empty($prenom)) {
            $this->errors['prenomVide'] = "<span style='color:red;'>please fill  the first name field</span>";
        }
    }
    public function isEmptyEmail($email)
    {
        if (empty($email)) {
            $this->errors['emailVide'] = "<span style='color:red;'>please fill  the email field</span>";
        }
    }
    public function isEmptyPw($pw)
    {
        if (empty($pw)) {
            $this->errors['pwVide'] = "<span style='color:red;'>please fill  the password field</span>";
        }
    }
    public function isEmptyPwConfirmation($pwVerif)
    {
        if (empty($pwVerif)) {
            $this->errors['pwVerifVide'] = "<span style='color:red;'>please fill  the confirmation password field</span>";
        }
    }
    public function isEmptyNiveauScolaire($niveauScolaire)
    {
        if (empty($niveauScolaire)) {
            $this->errors['niveauScolaireVide'] = "<span style='color:red;'>please fill  the school level field</span>";
        }
    }
    public function isEmptyCin($cin)
    {
        if (empty($cin)) {
            $this->errors['cinVide'] = "<span style='color:red;'>please fill  the cin field</span>";
        }
    }
    public function isEmptyName($name)
    {
        if (empty($name)) {
            $this->errors['nameVide'] = "<span style='color:red;'>please fill  the name field</span>";
        }
    }
    public function isEmptyField($field)
    {
        if (empty($field)) {
            $this->errors['fieldVide'] = "<span style='color:red;'>please fill  this field</span>";
        }
    }
    public function isEmptySubject($subject)
    {
        if (empty($subject)) {
            $this->errors['subjectVide'] = "<span style='color:red;'>please fill  the subject field</span>";
        }
    }
    public function isEmptyTeacher($prof)
    {
        if (empty($prof)) {
            if ($prof != 0) {
                $this->errors['teacherVide'] = "<span style='color:red;'>please fill  the teacher field</span>";
            }
        }
    }
    public function isEmptyTelephone($tel)
    {
        if (empty($tel)) {
            $this->errors['telVide'] = "<span style='color:red;'>please fill  the number phone field</span>";
        }
    }
    public function isInvalidNom($nom)
    {

        if (!preg_match("/^[a-zA-Z]+$/", $nom) || strlen($nom) > 25 || strlen($nom) < 3) {
            $this->errors["nomInvalide"] = "<span style='color:red;'>Sorry, your last name seems invalid, try another</span>";
        }
    }
    public function isInvalidPrenom($prenom)
    {

        if (!preg_match("/^[a-zA-Z]+$/", $prenom) || strlen($prenom) > 25 || strlen($prenom) < 3) {
            $this->errors["prenomInvalide"] = "<span style='color:red;'>Sorry, your first name seems invalid, try another</span>";
        }
    }
    public function isInvalidNiveauScolaire($niveauScolaire)
    {

        if (!preg_match("/^[a-zA-Z0-9\s]+$/", $niveauScolaire) || strlen($niveauScolaire) > 40 || strlen($niveauScolaire) < 1) {
            $this->errors["niveauScolaireInvalide"] = "<span style='color:red;'>Sorry, your level school seems invalid, try another</span>";
        }
    }
    public function isInvalidCin($cin)
    {

        if (!preg_match("/^[a-zA-Z0-9]+$/", $cin) || strlen($cin) > 25 || strlen($cin) < 2) {
            $this->errors["cinInvalide"] = "<span style='color:red;'>Sorry, your cin seems invalid, try another</span>";
        }
    }
    public function isInvalidEmail($email)
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors["emailInvalide"] = "<span style='color:red;'>Sorry, your email seems invalid, try another</span>";
        }
    }
    public function isInvalidPw($pw)
    {

        if (strlen($pw) < 5 || !preg_match("/^.*[!@§\^£+\/%\?#$&\*].*$/", $pw)) {
            $this->errors["pwInvalide"] = "<span style='color:red;'>your password must contain at least six characters and one special character</span>";
        }
    }
    public function isInvalidTel($tel)
    {

        if (!preg_match("#^0[67][0-9]{8}$#", $tel)) {
            $this->errors["telInvalide"] = "<span style='color:red;'>Sorry, your phone number seems invalid, try another</span>";
        }
    }
    public function isNotMatchPw($pw, $pwVerif)
    {

        if ($pw != $pwVerif) {
            $this->errors["pwNotMatch"] = "<span style='color:red;'>Passwords do not match</span>";
        }
    }
}
