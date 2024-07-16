"use strict";

$("[data-checkboxes]").each(function () {
    var me    = $(this),
        group = me.data('checkboxes'),
        role  = me.data('checkbox-role');

    me.change(function () {
        var all            = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
            checked        = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
            dad            = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
            total          = all.length,
            checked_length = checked.length;

        if (role == 'dad') {
            if (me.is(':checked')) {
                all.prop('checked', true);
            } else {
                all.prop('checked', false);
            }
        } else {
            if (checked_length >= total) {
                dad.prop('checked', true);
            } else {
                dad.prop('checked', false);
            }
        }
    });
});

$("#table-1").dataTable({
    "columnDefs": [
        {"sortable": false, "targets": [2, 3]}
    ]
});
$("#table-2").dataTable({
    "columnDefs": [
        {"sortable": false, "targets": [0, 2, 3]}
    ],
    order       : [[1, "asc"]] //column indexes is zero based

});
$('#save-stage').DataTable({
    "scrollX": true,
    stateSave: true
});


var table = $('#tableExport');
var cols  = table[0].tHead.rows[0].cells.length;

table.DataTable({
    dom        : 'Bfrtip',
    buttons    : [

        //'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    paging     : false,
    "info"     : false,
    bFilter    : false,
    // AJAX RECEBENDO OS DADOS ENVIADOS PELO CAMINHO/CONTROLE/MÉTODO
    //'ajax'    : 'http://dev.laravel-patener/painel/banner/fetchData',
    responsive : true,
    // COLUNAS DA TABELA QUE PODEM SER ORDENADAS
    "aoColumnDefs": [
        { "bSortable": false, "aTargets": [ 0 ]},
        { "bSortable": false, "aTargets": [ cols - 1 ]}
    ],
    order      : [[2, 'asc']],
    // TRADUÇÃO
    "language" :
        {
            "sEmptyTable"       : "Nenhum registro encontrado",
            "sInfo"             : "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty"        : "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered"     : "(Filtrados de _MAX_ registros)",
            "sInfoPostFix"      : "",
            "sInfoThousands"    : ".",
            "sLengthMenu"       : "_MENU_ Registros",
            "sLoadingRecords"   : "Carregando...",
            "sProcessing"       : "Processando...",
            "sZeroRecords"      : "Nenhum registro encontrado",
            "sSearch"           : "",
            "sSearchPlaceholder": "Pesquisar...",

            "lengthMenu"  : "Mostrando _MENU_ registros por página",
            "zeroRecords" : "Nenhum arquivo encontrado",
            "info"        : "Mostrando Página _PAGE_ de _PAGES_",
            "infoEmpty"   : "Nenhum registro disponível",
            "infoFiltered": "(filtro de _MAX_ registros no total)",
            "search"      : "Procurar:",

            'oPaginate':
                {
                    'sNext'    : 'Próximo',
                    'sPrevious': 'Anterior',
                    'sFirst'   : 'Primeiro',
                    'sLast'    : 'Último'
                },
            'oAria'    :
                {
                    'sSortAscending' : ': Ordenar colunas de forma ascendente',
                    'sSortDescending': ': Ordenar colunas de forma descendente'
                }

        }

});


