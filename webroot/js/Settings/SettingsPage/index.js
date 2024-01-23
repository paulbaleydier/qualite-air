$(function () {

// DT_UserList
// // DT_PermManage
$("#DT_UserList").DataTable({
    ajax: {
        url: 'index.php?controller=Utilisateurs&action=dataTable',
        dataSrc: 'data'
    },
    "columns": [
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
            render: function () {
                return `<div class="d-flex justify-content-evenly">` +
                        `<div class="btn btn-warning"> <i class="fa-regular fa-pen-to-square"></i> </div>`    +
                        `<div class="btn btn-danger"> <i class="fa-solid fa-trash-can"></i> </div>`    +
                    `</div>`;
            }
        }
    ],
    "paging": false,         
    "ordering": true,       
    "searching": true,     
    "scrollCollapse": true,
    "scrollY": '35vh',
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



});