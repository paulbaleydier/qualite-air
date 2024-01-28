$(function () {

    /*
        Si c'est une modification d'un utilisateur
    */
    if ( dataLoad !== null ) {
        loadData();
    }else {
        $("#reset-password").attr("disabled", true)
    }


    

    $(document).on('click', '#reset-password', function () {
        let id = dataLoad["id"];

        confirmationDialog(function () {
            $.ajax({
                type: 'POST',
                url: 'index.php?controller=Utilisateurs&action=resetPassword',
                data: {"id": id},
                dataType: 'JSON',
                async: false,
                cache: false,
                success: function (reponse) {
                    if ( reponse.status === 0 ) {
                        Swal.fire('Action validée !', "Un mail à été envoyez à l'utilisateur", "success");
                    }else {
                        this.error();
                    }
    
                },
                error: function () {
                    Swal.fire("Erreur !", "", "error");
                }
            })
        });
    });

});


function loadData() {
    $.each($("#card-crud-user").find("input"), function (key, value) {
        let idEl = $(value).attr("id");
        $(value).val(dataLoad[idEl]);
    });
}