$(function () {

$(document).on('click', "#btn-connexion", function () {
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var email = $("#email").val();
    var password = $("#password").val();

    // #connexion-fail

    if ( !emailRegex.test(email) || password.length < 1 ){
        $("#connexion-fail").css({"display" : "block"});
        return;
    }else {
        $("#connexion-fail").css({"display" : "none"});
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
            if ( reponse.status == 0 ) {
                $("#connexion-fail").css({"display" : "none"});
            }else {
                $("#connexion-fail").css({"display" : "block"});

            }
        }
    })
});

});