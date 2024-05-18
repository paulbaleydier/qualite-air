

$(function () {
	var URL = new URLSearchParams(location.search);

	$('.toggle-dark-mode').click(function () {
		var statusTheme = $('body').hasClass("dark-mode");
		$('body').toggleClass('dark-mode');
		$(this).find('i').toggleClass('fa-moon fa-sun');

		$.ajax({
			type: 'POST',
			url: '?controller=Utilisateur&action=changeTheme',
			data: { "status": !statusTheme },
			dataType: 'JSON',
			success: function (reponse) {
				Swal.fire({
					title: "Changement de thème",
					text: "Le thème a été enregistré dans la base de données",
					icon: "success",
					showConfirmButton: false,
					timer: 3000,
					timerProgressBar: true,
					width: 400
				});
			}
		});
	});

	if (URL.get("controller") !== "Authentification") {
		gestionCache();
		showAlerts();

		setInterval(function () {
			showAlerts();

		}, 5000)
	}

	$(document).on('click', '#openNotifications', function () {
		$("#notifications-list").html(null);

		$.ajax({
			type: 'POST',
			url: 'index.php?controller=Analysis&action=alertsHistory',
			success: function (reponse) {
				if (reponse && reponse?.status == 0 && reponse?.data) {
					var data = reponse.data;
					console.log(data)
					$.each(data, function (key, value) {
						$("#notifications-list").append(`
							<div class="callout callout-danger">
								<h5><u>${value.datefR}</u></h5>
								<p>
									Le niveau de <strong>${value.name}</strong> a été relevé à <strong>${value.value} ${value.unitType}</strong>,
									dépassant ainsi le seuil critique de <strong>${value.criticalValue} ${value.unitType}</strong>.
								</p>
							</div>
						`);
					});
				}
			}
		})


		$("#modalNotifications").modal("show");
	})


});

function confirmationDialog(callback) {
	Swal.fire({
		title: 'Êtes-vous sûr?',
		text: 'Cette action ne peut pas être annulée!',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Oui, confirmer!',
		cancelButtonText: 'Annuler'
	}).then((result) => {
		if (result.isConfirmed) {
			callback();
		}
	});
}

function gestionCache() {

	$.ajax({
		type: 'POST',
		url: '?controller=Utilisateur&action=getCache',
		dataType: 'JSON',
		success: function (reponse) {
			if (reponse && reponse?.status == 0 && reponse?.data) {
				var data = reponse?.data;

				if (data.hasOwnProperty("darkTheme")) {
					let darkTheme = data.darkTheme;
					if (darkTheme === "true") {
						$('body').addClass("dark-mode");
					}
				}
			}
		}
	});

}

function showAlerts() {
	if ($(".swal2-container").length > 0) return;

	$.ajax({
		type: 'POST',
		url: '?controller=Analysis&action=getAlerts',
		dataType: 'JSON',
		cache: false,
		success: function (reponse) {
			if (reponse && reponse?.status == 0 && reponse?.data) {

				if (reponse?.data.length > 0) {
					var data = reponse?.data[0];

					Swal.fire({
						icon: 'warning',
						title: 'Alerte de qualité de l’air',
						html: `
						  <p>
							Le niveau de <strong>${data.name}</strong> a été relevé à <strong>${data.value} ${data.unitType}</strong>,
							dépassant ainsi le seuil critique de <strong>${data.criticalValue} ${data.unitType}</strong>.
						  </p>
						  <p class="text-center">
						  	<strong><u> ${data.datefR}</u></strong>
						  </p>
						`,
						confirmButtonText: 'Compris',
						allowOutsideClick: false,
						allowEscapeKey: false
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								type: 'POST',
								url: '?controller=Analysis&action=treatAlert',
								dataType: 'JSON',
								data: { "id": data.id }
							})
						}
					});
				}


			}
		}
	})
}