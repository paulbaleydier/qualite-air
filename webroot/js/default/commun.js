$(function () {



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