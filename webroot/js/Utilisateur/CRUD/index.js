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
                url: 'index.php?controller=Utilisateur&action=resetPassword',
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

    $(document).on('click', '#btn-delete-account', function () {
        var id = dataLoad["id"];
      
        confirmationDialog(() => {
            $.ajax({
                type: 'POST',
                url: 'index.php?controller=Utilisateur&action=deleteUser',
                data: {"id": id},
                dataType: 'JSON',
                async: false,
                cache: false,
                success: function (reponse) {
                    if ( reponse.status === 0 ) {
                        Swal.fire('Action validée !', "", "success");
                        DT_UserList.ajax.reload();
                    }else {
                        this.error();
                    }
    
                },
                error: function () {
                    Swal.fire("Erreur !", "", "error");
                }
            })
        })
    });

    $(document).on('click', '#btn-save-account', function () {
        var dataUpdate = $("[data-update]");
        var params = new URLSearchParams(location.href);
        var data = {};

        dataUpdate.each((key, el) => {
            data[$(el).attr("data-update")] = $(el).val();
        });

        $.ajax({
            type: 'POST',
            url: 'index.php?controller=Utilisateur&action=updateUser',
            data: {"id": params.get("id"), "data": JSON.stringify(data)},
            dataType: 'JSON',
            async: false,
            cache: false,
            success: function (reponse) {
                if ( reponse.status === 0 ) {
                    Swal.fire('Action validée !', "", "success").then(() => history.back()); 
                }else {
                    this.error();
                }

            },
            error: function () {
                Swal.fire("Erreur !", "", "error");
            }
        })
        
    });

    $(document).on('click', '#btn-create-account', function () {
        var dataUpdate = $("[data-update]");
        var data = {};

        dataUpdate.each((key, el) => {
            data[$(el).attr("data-update")] = $(el).val();
        });

        $.ajax({
            type: 'POST',
            url: 'index.php?controller=Utilisateur&action=createUser',
            data: {"data": JSON.stringify(data)},
            dataType: 'JSON',
            async: false,
            cache: false,
            success: function (reponse) {
                if ( reponse.status === 0 ) {
                    Swal.fire('Action validée !', "", "success").then(() => history.back()); 
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




function loadData() {
    $.each($("#card-crud-user").find("input"), function (key, value) {
        let idEl = $(value).attr("id");
        $(value).val(dataLoad[idEl]);
    });

    if (dataLoad["google_id"] !== null) {
        $("#reset-password").css({"display": "none"})
    }
}