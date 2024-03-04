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