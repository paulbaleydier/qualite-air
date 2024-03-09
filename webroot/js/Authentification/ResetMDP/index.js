const url_reset_mdp = "index.php?controller=Authentification&action=ResetMDP"
const url_dashboard = "index.php?controller=Dashboard&view=Dashboard";

$(document).ready(function () {
    var url = new URLSearchParams(window.location.search);

    $(document).on('keypress', function (e) {
        if (e.which === 13) {
            $("#btn-connexion").trigger('click');
        }
    });

    $(document).on('click', '#btn-connexion', function () {
        var collectInfo = $(".collect");
        var resultCollect = {};

        $(collectInfo).each(function (key, value) { resultCollect[$(value).attr("id")] = $(value).val(); }); 

        $.ajax({
            type: 'POST',
            url: url_reset_mdp,
            data: {"userID": url.get("userID"),"data": JSON.stringify(resultCollect), "token" : url.get("token")},
            dataType: 'JSON',
            success: function (reponse) {
                if (reponse.status === 0) {
                    document.location.href = url_dashboard;
                }else {
                    $("#connexion-fail").html(reponse.data); 
                    $("#connexion-fail").css({"display": "block"}); 
                }
            }
        })

    });

});