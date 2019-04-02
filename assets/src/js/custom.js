// loader
// show the icon when the page is unloaded
$(window).on('beforeunload', function(event) {
    $("body").css("overflow", "hidden");
    $('#loader').fadeIn(200);
});

// hide the icon when the page is fully loaded
$(window).on('load', function(event) {
    $('#loader').fadeOut(200);
    $("body").css("overflow", "auto");
});

$(document).ready(function(event){
    // open menu when is in 'home'
    var url = window.location.href;
    url = url.split('/');
    if((url[3] == 'home') || (url[4] == 'home') || (url[3] == '') || (url[4] == '')){
        $('#menuIcon').hide()
        $('#menu').show();
    }

    // DataTables things
    $("#tabs").tabs( {
        "activate": function(event, ui) {
            $( $.fn.dataTable.tables( true ) ).DataTable().columns.adjust();
        }
    });
    
    // popover
    $('[data-toggle="popover"]').popover({
        html: true,
    });

    // upload file label
    bsCustomFileInput.init()

    // DateTime Picker
    $('#dtpMY').datetimepicker({
        locale: 'pt-BR',
        viewMode: 'years',
        format: 'MM/YYYY',
        useCurrent: true,
        defaultDate: moment(),
        icons: {
            time: 'far fa-clock',
            date: 'far fa-calendar',
            up: 'far fa-arrow-up',
            down: 'far fa-arrow-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right',
            today: 'far fa-calendar-check-o',
            clear: 'far fa-trash',
            close: 'far fa-times'
        }
    });
})

// Datatables Default Settings
$.extend($.fn.dataTable.defaults, {
    dom:"<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'r>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    buttons: ['excelHtml5', 'pdfHtml5', 'pageLength'],
    lengthMenu: [
        [10, 25, 50, -1],
        ['Exibir 10 elementos', 'Exibir 25 elementos', 'Exibir 50 elementos', 'Exibir todos os elementos']
    ],
    responsive: true,
    language: {
        sEmptyTable: "Nenhum registro encontrado",
        sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
        sInfoFiltered: "(Filtrados de _MAX_ registros)",
        sInfoPostFix: "",
        sInfoThousands: ".",
        sLengthMenu: "_MENU_ resultados por página",
        sLoadingRecords: "Carregando...",
        sProcessing: "Processando...",
        sZeroRecords: "Nenhum registro encontrado",
        sSearch: "Pesquisar",
        oPaginate: {
            sNext: "Próximo",
            sPrevious: "Anterior",
            sFirst: "Primeiro",
            sLast: "Último"
        },
        buttons: {
            pageLength: {
                _: "Exibindo %d elementos",
                '-1': "Exibindo todos os elementos"
            }
        },
        oAria: {
            sSortAscending: ": Ordenar colunas de forma ascendente",
            sSortDescending: ": Ordenar colunas de forma descendente"
        }
    },
});