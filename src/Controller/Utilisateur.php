<?php

namespace Controller;

use Entity\Mail as EntityMail;
use Entity\UserResetMdp;
use Entity\Utilisateur as EntityUtilisateur;
use Exception;
use Model\UserResetMdp as ModelUserResetMdp;
use Model\Utilisateur as ModelUser;
use Model\Utilisateur as ModelUtilisateur;
use Others\Reponse;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Utilisateur extends Controller
{

    public function actionDefault()
    {
        // Reponse::create(Reponse::OK, ["tes" => "dsds" ])->sendJson();
        switch (static::getView()) {
            case "CRUD":
                if (isset($_GET["id"]) && $_GET["id"] !== "-1") {
                    $id = $_GET["id"];
                    static::$dataLoaded = ModelUser::getByID($id);
                } else {
                    $nUser = ModelUtilisateur::insertObject(new EntityUtilisateur());
                    header("Location: index.php?controller=Utilisateur&view=CRUD&id=$nUser");
                    exit();
                }
                break;

            default:
                break;
        }
    }

    public function dataTable()
    {
        Reponse::create(Reponse::OK, ModelUser::getAll())->sendJson();
    }

    public function deleteUser()
    {
        if (!filter_has_var(INPUT_POST, "id")) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }

        $id = filter_input(INPUT_POST, "id");

        ModelUser::delete($id);

        Reponse::create(Reponse::OK, $id)->sendJson();
    }



    public function updateUser()
    {
        if (!filter_has_var(INPUT_POST, "data") && !filter_has_var(INPUT_POST, "id")) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }

        $id = filter_input(INPUT_POST, "id");
        $data = filter_input(INPUT_POST, "data");
        $dataParse = json_decode($data, true);

        ModelUser::update($id, $dataParse);

        Reponse::create(Reponse::OK, "ok")->sendJson();
    }

    public function createUser()
    {
        if (!filter_has_var(INPUT_POST, "data")) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }

        $data = filter_input(INPUT_POST, "data");
        $dataParse = json_decode($data, true);

        ModelUser::insertObject(new EntityUtilisateur($dataParse));

        Reponse::create(Reponse::OK, "ok")->sendJson();
    }

    public function resetPassword($idParam = null)
    {
        if (!filter_has_var(INPUT_POST, "id") && $idParam == null) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
            
        }
        
        $id = filter_input(INPUT_POST, "id") ?? $idParam;

        $user = ModelUtilisateur::getByID($id);
        
        // Création du token 
        $EntityUserResetMDP = new UserResetMdp(["userID" => $user->id]);
        $token = $EntityUserResetMDP->token;

        ModelUserResetMdp::insertObject($EntityUserResetMDP);
        
        $mail = new EntityMail();

        $contentMail = file_get_contents("/var/www/html/webroot/assets/mails/reset_mdp.html");
        $contentMail = str_replace("{url_reset_mdp}", "https://qda.duckdns.org/webroot/index.php?controller=Authentification&view=ResetMDP&token=" . $token . "&userID=" . $id, $contentMail);

        $mail->addHtmlPage()->addEmail(array($user->email))->addBody($contentMail)->addSubject("Réinitialisation du mot de passe")->send();
        
        Reponse::create(Reponse::OK, "ok")->sendJson();
        
    }

    public function emailResetMDP() {
        if (!filter_has_var(INPUT_POST, "email")) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }
        $email = filter_input(INPUT_POST, "email");

        $user = ModelUtilisateur::getByEmail($email);

        if ( is_null($user)) {
            Reponse::create(Reponse::ERROR, "Email incorrect")->sendJson();
        }

        self::resetPassword($user->id);
        
        Reponse::create(Reponse::OK, "ok")->sendJson();

    }
}
