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
    var today = new Date();
    var month = ("0" + (today.getMonth() + 1)).slice(-2)
    var year = today.getFullYear();
    var day = today.getDay();
    var startDate = new Date(month + '/01/' + year);
    var endDate = new Date(month + '/' + day + '/' + year);

    $('#inputDe').datetimepicker({
        locale: 'pt-BR',
        viewMode: 'days',
        format: 'DD/MM/YYYY',
        defaultDate: moment(startDate),
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

    $('#inputAte').datetimepicker({
        locale: 'pt-BR',
        viewMode: 'days',
        format: 'DD/MM/YYYY',
        defaultDate: moment(endDate),
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

    $("#inputDe").on("change.datetimepicker", function (e) {
        $('#inputAte').datetimepicker('minDate', e.date);
    });

    $("#inputAte").on("change.datetimepicker", function (e) {
        $('#inputDe').datetimepicker('maxDate', e.date);
    });

    $('#inputMA').datetimepicker({
        locale: 'pt-BR',
        viewMode: 'months',
        format: 'MM/YYYY',
        defaultDate: moment(today),
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
    buttons: [
        {extend: 'excelHtml5', text: '<i class="fas fa-file-excel"></i> Excel'},
        {extend: 'pdfHtml5', text: '<i class="fas fa-file-pdf"></i> PDF'},
        {extend: 'pageLength'},
        {text: '<i class="fas fa-sync-alt"></i> Recarregar',
            action: function(e, dt, node, config){
            dt.ajax.reload(null, false);
        }, 
        attr: {class: 'btn btn-primary dtUpdateButton', disabled: true}
    }],
    lengthMenu: [
        [10, 25, 50, -1],
        ['Exibir 10 elementos', 'Exibir 25 elementos', 'Exibir 50 elementos', 'Exibir todos os elementos']
    ],
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
                _: "<i class='fas fa-table'></i> Exibindo %d elementos",
                '-1': "<i class='fas fa-table'></i> Exibindo todos os elementos"
            }
        },
        oAria: {
            sSortAscending: ": Ordenar colunas de forma ascendente",
            sSortDescending: ": Ordenar colunas de forma descendente"
        }
    },
});