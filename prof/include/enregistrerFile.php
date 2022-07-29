<?php


if (!empty($_POST)) {
    require_once 'autoloadProf.php';

    if (!empty($_POST)) {
        //????changer
        $idCours = 2;
        $idClass=7;
        $errors = array();
        $titre = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['titre']))));
        $description = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['description']))));
        $contenu = htmlspecialchars(strip_tags(trim(mb_strtolower($_POST['editor']))));
        if (empty($titre)) {
            $errors['titreVide'] = "please fill the title field";
           
        }
        if (empty($description)) {
            $errors['descriptionVide'] = "please fill the description field";
          
        }

        else {

            for ($i = 1; $i < count($_FILES) + 1; $i++) {
                $nom = 'file' . $i;
                if (isset($_FILES[$nom]) and !empty($_FILES[$nom]['name'])) {
                    $tailleMax = 2097152;

                    if ($_FILES[$nom]['size'] > $tailleMax) {

                        $errors[$nom] = 'Votre fichier ne doit pas dépasser 20Mo';
                       
                    }
                }
            }
        }
        
   
        $nomFiles = array();
        if (empty($errors)) {
            for ($i = 1; $i < count($_FILES) + 1; $i++) {
                $nom = 'file' . $i;
                if (isset($_FILES[$nom]) and !empty($_FILES[$nom]['name'])) {
                    $extensionUpload = strtolower(substr(strrchr($_FILES[$nom]['name'], '.'), 1));
                    //chemin
                    $files = glob("files/*");
                    if($files){
                        $lastElement  = $files[array_key_last($files)];
                        $dernierFile=explode('.',explode('/',$lastElement)[1])[0];
                        $fileActuele=$dernierFile+1;
                        $chemin = "files/" .$fileActuele. '.' . $extensionUpload;
                        $nomFiles[$i]=$fileActuele;
                    }
                    else{
                        $chemin = "files/1." . $extensionUpload;
                        $nomFiles[$i]='1';
                    }
                   

                  
                    $resultat = move_uploaded_file($_FILES[$nom]['tmp_name'], $chemin);
                    if (!$resultat) {
                        $errors[$nom] = "Erreur durant l'importation de votre photo de profil";
                       
                    }
                }
            }
        }

        if (empty($errors)) {
         
            $prof = new Prof();
           $prof->ajouterCours($titre,$idClass,$description,$contenu);
           $prof->ajouterFilesByCours($nomFiles);

           $errors=null;
        }
    }
    echo json_encode($errors);
}
