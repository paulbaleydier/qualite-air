$(document).ready(function () {
    $(document).on('click', '#btnResetMdp', function () {
        let id = $(this).attr("data-userID");

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
                        Swal.fire('Action validée !', "Un mail à été envoyez", "success");
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

    $(document).on('click', '#sendAlertDev',function () {
        $.ajax({
            type: 'POST',
            url: 'index.php?controller=Utilisateur&action=sendAlertDev',
            dataType: 'JSON',
            success: function (reponse) {
                if ( reponse?.status == 0 ) {
                    Swal.fire({
                        title: "Alerte envoyée",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        width: 400
                    });
                }
                
            }
        })
    });

    $(document).on('click', '#clearAlert',function () {
        $.ajax({
            type: 'POST',
            url: 'index.php?controller=Utilisateur&action=clearAlertDev',
            dataType: 'JSON',
            success: function (reponse) {
                if ( reponse?.status == 0 ) {
                    Swal.fire({
                        title: "Alertes supprimées",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        width: 400
                    });
                }
                
                
            }
        })
    });
})

window.addEventListener('beforeinstallprompt', (event) => {
    event.preventDefault();
    showInstallButton();

    document.getElementById('installButton').addEventListener('click', () => {
        event.prompt();

        event.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
                console.log('L\'utilisateur a accepté l\'installation');
                hideInstallButton();
            } else {
                console.log('L\'utilisateur a refusé l\'installation');
            }
        });
    });
});

function showInstallButton() {
    $("#installButton").attr("disabled", false);
}

function hideInstallButton() {
    $("#installButton").attr("disabled", true);
}