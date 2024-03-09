<?php

namespace Controller;

use Entity\Utilisateur as EntityUtilisateur;
use Google_Client;
use Model\UserResetMdp;
use Model\Utilisateur as ModelUtilisateur;
use Others\Authentification as OthersAuthentification;
use Others\Configuration;
use Others\Reponse;

class Authentification extends Controller
{

    public function actionDefault()
    {
        parent::actionDefault();
    }


    public function login()
    {
        if (!filter_has_var(INPUT_POST, "email") && !filter_has_var(INPUT_POST, "password")) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }

        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);
        $passHash = md5($password);

        $verifUser = ModelUtilisateur::isExist($email, $passHash);


        if ($verifUser) OthersAuthentification::connectClient($verifUser);

        Reponse::create($verifUser ? Reponse::OK : Reponse::ERROR, null)->sendJson();
    }

    public function loginWithGoogle()
    {
        $credential = $_POST["credential"] ?? null;
        $post_g_csrf_token = $_POST["g_csrf_token"] ?? null;
        $cookie_g_csrf_token = $_COOKIE["g_csrf_token"] ?? null;

        if (!is_null($post_g_csrf_token) && !is_null($cookie_g_csrf_token) && !is_null($credential)) {
            if ( $post_g_csrf_token == $cookie_g_csrf_token ) {

                $client = new Google_Client(['client_id' => Configuration::get("GOOGLE_ID")]); 
                $payload = $client->verifyIdToken($credential);
                //var_dump($payload);

                if ($payload) {
                    $google_id = $payload['sub'];
                    $userGoogle = ModelUtilisateur::isExistGoogle($google_id);

                    if ( !$userGoogle ) {
                        // si le compte gooogle existe dans la base
                
                        $userGoogle = ModelUtilisateur::insertObject(new EntityUtilisateur(["nom" => $payload['family_name'], "prenom" => $payload['given_name'], "google_id" => $google_id,"email" => $payload['email']]), true);
                    }
                    OthersAuthentification::connectClient(is_object($userGoogle) ? get_object_vars($userGoogle) : $userGoogle);
                    header('Location: ./index.php?controller=Dashboard&view=Dashboard');
                    exit;
                }
            }
            
        }


        //die();
        Reponse::create(Reponse::ERROR, null)->sendJson();

    }

    public static function logout()
    {
        OthersAuthentification::logout();
    }

    public function ResetMDP()
    {
        if (!filter_has_var(INPUT_POST, "data") && !filter_has_var(INPUT_POST, "token") && !filter_has_var(INPUT_POST, "userID")) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }

        $dataArray = json_decode($_POST["data"], true);
        $token = filter_input(INPUT_POST, "token", FILTER_DEFAULT);
        $userID = filter_input(INPUT_POST, "userID", FILTER_DEFAULT);



        if ($dataArray["password_new"] === $dataArray["password_new"]) {
            $tokenValid = UserResetMdp::getByTokenUserID($token, $userID);

            if ($tokenValid) {
                UserResetMdp::update($tokenValid, array("useToken" => 0));
                ModelUtilisateur::update($userID, array("password" => md5($dataArray["password_new"])));
                Reponse::create(Reponse::OK, "ok")->sendJson();
            } else {
                Reponse::create(Reponse::ERROR, "Le temps réglementaire a été dépassé.")->sendJson();
            }
        } else {
            Reponse::create(Reponse::ERROR, "Attention, vous avez commis une erreur le nouveau mots de passe")->sendJson();
        }
    }
}
