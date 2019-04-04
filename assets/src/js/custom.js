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
    deferRender: true,
    scrollX: true,
    scroller: true,
    dom:"<'row'<'col-12 col-sm-12 col-lg-8 col-md-8 col-xl-8'B><'col-12 col-sm-12 col-lg-4 col-md-4 col-xl-4'f>>" +
        "<'row'<'col-sm-12'r>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    buttons: [
        {extend: 'excelHtml5', text: '<i class="fas fa-file-excel"></i> <span class="d-none d-sm-none d-md-inline-flex d-lg-inline-flex d-xl-inline-flex">Excel</span>', exportOptions : {
            format: {
                body: function ( data, row, column, node ) {
                //check if type is input using jquery
                return $(data).is(":input") ? $(data).val() : data; }
            }, orthogonal: 'export'}
        },
        {extend: 'pdfHtml5', text: '<i class="fas fa-file-pdf"></i> <span class="d-none d-sm-none d-md-inline-flex d-lg-inline-flex d-xl-inline-flex">PDF</span>', exportOptions : {
            format: {
                body: function ( data, row, column, node ) {
                //check if type is input using jquery
                return $(data).is(":input") ? $(data).val() : data; }
            }, orthogonal: 'export'}
        },
        {extend: 'pageLength'},
        {text: '<i class="fas fa-sync-alt"></i> <span class="d-none d-sm-none d-md-inline-flex d-lg-inline-flex d-xl-inline-flex">Recarregar</span>',
            action: function(e, dt, node, config){
            $('#tableLoading').show();             
            dt.ajax.reload(null, false);
        }, 
        attr: {class: 'btn btn-primary dtUpdateButton', disabled: true}
    }],
    lengthMenu: [
        [10, 25, 50, -1],
        ['Exibir 10 linhas', 'Exibir 25 linhas', 'Exibir 50 linhas', 'Exibir todas linhas']
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
                _: "<i class='fas fa-table'></i> <span class='d-none d-sm-none d-md-inline-flex d-lg-inline-flex d-xl-inline-flex'>Exibindo %d linhas</span>",
                '-1': "<i class='fas fa-table'></i> <span class='d-none d-sm-none d-md-inline-flex d-lg-inline-flex d-xl-inline-flex'>Exibindo todas as linhas</span>"
            }
        },
        oAria: {
            sSortAscending: ": Ordenar colunas de forma ascendente",
            sSortDescending: ": Ordenar colunas de forma descendente"
        }
    }
});