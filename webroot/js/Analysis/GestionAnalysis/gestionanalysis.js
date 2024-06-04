const url_update = "index.php?controller=Analysis&action=updateField";

$(document).ready(function () {
    DT_UserList = $("#DtAnalysisType").DataTable({
        ajax: {
            url: 'index.php?controller=Analysis&action=dtAnalysisType',
            dataSrc: 'data'
        },
        "columns": [
            {
                title: 'Nom',
                className: 'text-center',
                width: '20%',
                data: 'name',
                render: function (data,b, row) {
                    return `<input data-update="name" data-id="${row.id}" class="form-control" value="${data}"/>`;
                }
            },
            {
                title: 'Initiale',
                className: 'text-center',
                width: '20%',
                data: 'shortName',
                visible: false,
                render: function (data,b, row) {
                    return `<input data-update="shortName" data-id="${row.id}" class="form-control" value="${data}"/>`;
                }

            },
            {
                title: 'Unité de mesure',
                className: 'text-center',
                data: 'unitType',
                width: '20%',
                render: function (data,b, row) {
                    return `<input data-update="unitType" data-id="${row.id}" class="form-control" value="${data}"/>`;
                }
            },
            {
                title: 'Couleur',
                className: 'text-center',
                width: '10%',
                render: function (ctx, data, row) {
                    return "<input data-update='color' data-id='" + row.id + "' class='cp' style='background-color: " + row.color + ";height: 30px;width: 30px; margin: auto;'/>"
                }
            },
            {
                title: 'Valeur critique',
                className: 'text-center',
                data: 'criticalValue',
                width: '20%',
                render: function (data,b, row) {
                    return `<input data-update="criticalValue" data-id="${row.id}" class="form-control" value="${data}"/>`;
                }
            },
        ],
        "paging": false,
        "ordering": false,
        "searching": false,
        "scrollCollapse": true,
        "responsive": true,
        "scrollY": '100%',
        "info": true,
        "lengthMenu": [5, 10, 25, 50, 100],
        "language": {
            "lengthMenu": "Afficher _MENU_ éléments par page",
            "zeroRecords": "Aucun résultat trouvé",
            "info": "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
            "infoEmpty": "Aucun élément à afficher",
            "infoFiltered": "(filtré sur _MAX_ éléments au total)",
            "search": "Rechercher :"
        },
        initComplete: function (settings, json) {
            $(".cp").colorpicker();
        }
    });

    $(document).on('change', 'input[data-update]', function () {
        var id = $(this).attr("data-id");
        var updateName = $(this).attr("data-update");
        var value = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'index.php?controller=Analysis&action=updateField',
            data: {"id" : id, "field" : updateName, "value": value}
        })
        
    });

    $(document).on('colorpickerChange', '.cp', function(event) {
        $(this).css('background-color', event.color.toString());
        $(this).css('color', event.color.toString());
        
      });

});