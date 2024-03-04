const url_requet_mdp = "index.php?controller=Utilisateur&action=emailResetMDP";  

$(function () {

    $(document).on('keypress', function (e) {
        if (e.which === 13) {
            $("#btn-connexion").trigger('click');
        }
    });

    $(document).on('click', "#btn-connexion", function () {
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var email = $("#email").val();
        var password = $("#password").val();

        // #connexion-fail

        if (!emailRegex.test(email) || password.length < 1) {
            $("#connexion-fail").css({ "display": "block" });
            return;
        } else {
            $("#connexion-fail").css({ "display": "none" });
        }

        $.ajax({
            type: 'POST',
            url: 'index.php?controller=Authentification&action=login',
            data: {
                "email": email,
                "password": password
            },
            dataType: 'JSON',
            success: function (reponse) {
                console.log(reponse)
                if (reponse.status == 0) {
                    $("#connexion-fail").css({ "display": "none" });
                    location.href = './index.php?controller=Dashboard&view=Dashboard'
                } else {
                    $("#connexion-fail").css({ "display": "block" });

                }
            }
        })
    });

    $(document).on('click', "#resetMdp", function () {
        Swal.fire({
            title: "Réinitialiser votre mot de passe",
            input: "text",
            inputAttributes: {
                autocapitalize: "off"
            },
            showCancelButton: true,
            cancelButtonText: "Annuler",
            confirmButtonText: "Envoyez",
            showLoaderOnConfirm: true,
            preConfirm: function (email) {

                $.ajax({
                    type: 'POST',
                    url: url_requet_mdp,
                    data: {"email" : email},
                    dataType: 'JSON',
                    success: function (reponse) {
                        if (reponse.status == 0) {
                            Swal.fire('Action validée !', "Un mail à été envoyez à l'utilisateur", "success");
                        }else {

                        }
                    }
                })
            }
        })
    });

});