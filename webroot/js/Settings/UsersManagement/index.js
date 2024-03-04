
var DT_UserList;


$(document).ready(function () {
    DT_UserList = $("#DT_UserList").DataTable({
        ajax: {
            url: 'index.php?controller=Utilisateur&action=dataTable',
            dataSrc: 'data'
        },
        "columns": [
            { 
                title: 'Compte Google',
                className: 'text-center',
                width: '5%',
                data: 'google_id',
                render: function (a,b,row) {
                    return row.google_id !== null ? '<i class="text-success fa-solid fa-circle">1</i>' : '<i class="text-danger fa-solid fa-circle">0</i>'
                }
            },
            { 
                title: 'Nom',
                className: 'text-center',
                width: '20%',
                data: 'nom'
            },
            { 
                title: 'Prénom',
                className: 'text-center',
                width: '20%',
                data: 'prenom'
                
            },
            { 
                title: 'Adresse Mail',
                className: 'text-center',
                select: true,
                width: '40%',
                data: 'email'
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                width: '10%',
                render: function (data) {
                    return `<div class="d-flex justify-content-evenly">` +
                            `<a href='index.php?controller=Utilisateur&view=CRUD&id=${data.id}' class="btn btn-warning"> <i class="fa-regular fa-pen-to-square"></i> </a>`    +
                            `<div class="btn btn-danger" onClick='deleteUser(${data.id})'> <i class="fa-solid fa-trash-can"></i> </div>`    +
                        `</div>`;
                }
            }
        ],
        "paging": true,         
        "ordering": true,       
        "searching": true,     
        "scrollCollapse": true,
        // responsive: true,
        "responsive": true,
        "scrollY": '50vh',
        "info": true,         
        "lengthMenu": [5, 10, 25, 50, 100],  
        "language": {       
            "lengthMenu": "Afficher _MENU_ éléments par page",
            "zeroRecords": "Aucun résultat trouvé",
            "info": "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
            "infoEmpty": "Aucun élément à afficher",
            "infoFiltered": "(filtré sur _MAX_ éléments au total)",
            "search": "Rechercher :"
        }
    });
})




function deleteUser(id) {
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
}