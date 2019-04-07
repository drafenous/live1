<main class="container" role="main">
    <div class="row no-gutters">
        <h1>Metas</h1>
    </div>
    <hr>
    <form id="frmMetas" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-9">
                <label for="upload-file">Enviar novas metas</label>
                <div class="input-group">
                    <div class="custom-file col-md-4">
                        <input type="file" class="custom-file-input" id="upload-file" aria-describedby="inputGroupFileAddon">
                        <label class="custom-file-label" for="upload-file">Escolher Arquivo</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button" id="inputGroupFileAddon">Enviar Arquivo <i class="fas fa-upload"></i></button>
                        <button class="btn btn-primary" type="button" id="inputGroupFileAddon">Exemplo de Arquivo <i class="fas fa-download"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3">
                <label for="inputMA" data-target="#inputMA" data-toggle="datetimepicker">Selecionar o mês</label>
                <div class="form-group">
                    <div class="input-group date" id="inputMA" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="dtpMY" data-target="#inputMA" />
                        <div class="input-group-append" data-target="#inputMA" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div id="tableLoading" class="row">
        <div class="col-md-12">
            <div id="alert" class="alert alert-success" role="alert">
                <i class="fas fa-spinner fa-pulse"></i> <strong>Aguarde!</strong> Carregando os dados solicitados.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card rounded-0" style="background-color: #4f8998">
                <div class="card-title">Metas Cadastradas</div>
                <div id="metasTotal" class="card-content text-center" style="font-size: 24px;">
                    Carregando
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card rounded-0" style="background-color: #f38630">
                <div class="card-title">Meta de Faturamento</div>
                <div id="valorTotal" class="card-content text-center" style="font-size: 24px;">
                    Carregando
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card rounded-0" style="background-color: #bdc3c7">
                <div class="card-title">Meta de Faturamento Sugerida</div>
                <div id="sugestaoTotal" class="card-content text-center" style="font-size: 24px;">
                    Carregando
                </div>
            </div>
        </div>
    </div>

    <hr>
    <table id="dtMetas" class="table display table-hover table-striped" style="width: 100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ramal</th>
                <th>Tipo</th>
                <th>Meta de Faturamento</th>
                <th>Sugestão</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</main>

<script>
    // globals
    var statusList;

    $(document).ready(function(event) {
        //load user status
        $.ajax({
            cache: false,
            url: "<?= base_url('/assets/src/json/metas-userStatus.json') ?>",
            dataType: 'json',
            success: (response) => {
                statusList = response.statusList;
            },
            error: (response) => {
                console.error(response);
            }
        })

        // DataTable
        table = $('#dtMetas').DataTable({
            deferRender: false,
            ajax: {
                cache: false,
                url: "<?= base_url('assets/src/json/metas.json'); ?>",
                dataType: 'JSON',
                dataSrc: 'metas',
                error: (response) => {
                    console.error(response);
                }
            },
            columns: [{
                    data: "nome"
                },
                {
                    data: "ramal"
                },
                {
                    data: "tipo"
                },
                {
                    data: "metaFaturamento",
                    render: (data, type, row) => {
                        return type === 'export' ? 'R$ ' + convertToMoney(data) : `<input type="text" class="revenues money form-control" name="meta[]" placeholder="0,00" value="${data == 0 ? '' : data}"/>`
                    },
                    orderDataType: "dom-text-numeric"
                },
                {
                    data: "sugestao",
                    render: (data, type, row) => {
                        return type === 'export' ? 'R$ '+ convertToMoney(data) : `<input type="text" class="suggestion money form-control" name="segestao[]" placeholder="0,00" value="${data == 0? '' : data }" readonly disabled/>`
                    },
                    orderDataType: "dom-text-numeric"

                },
                {
                    data: "status",
                    render: (data, type, row) => {
                        return type === 'export' ? userStatusExport(data) : userStatusList(data);
                    },
                    orderDataType: "dom-select"

                }
            ],
            drawCallback: function(settings) {
                // calcs
                var api = this.api();
                var sumFat = api.column(3).data().sum();
                var sumSuggest = api.column(4).data().sum();
                var count = api.rows().count();
                var row = api.row();

                // display results
                $('#metasTotal').html(count);
                $('#valorTotal').html(`R$ <span class="money">${sumFat}</span>`);
                $('#sugestaoTotal').html(`R$ <span class="money">${sumSuggest}</span>`);

                // money format
                $('#dtMetas th').removeClass('money');
                $('.money').mask("#.##0,00", {
                    reverse: true
                }).trigger('keyup');

                // input actions
                $('.revenues').on('keydown', function() {
                    $('#saveButton').attr('disabled', false);
                    $(this).css('border', '2px solid #f39c12');
                })

                $('.status').on('change', function() {
                    $('#saveButton').attr('disabled', false);
                    $(this).css('border', '2px solid #f39c12');
                })

                // ending
                $('#tableLoading').hide();
                $('.dtUpdateButton').attr('disabled', false);
                $('#saveButton').attr('disabled', true);
            }
        });

        table.button().add(4, {
            action: function(e, dt, button, config) {
                var data = dt.$(':input').serializeArray();
                console.log(data);
                $('#tableLoading').show();
                table.ajax.reload(null, false);
            },
            text: '<i class="fas fa-save"></i> <span class="d-none d-sm-none d-md-inline-flex d-lg-inline-flex d-xl-inline-flex">Salvar</span>',
            attr: {
                class: 'btn btn-green',
                id: "saveButton",
                disabled: true
            }
        });
    })

    function userStatusList(data) {
        var html = $(`<select class="status form-control" name="status[]"></select>`);
        $.each(statusList, (index, item) => {
            var option = `<option value="${item.id}" ${data == item.id ? 'selected' : ''}>${item.name}</option>`
            $(html).append(option);
        })
        var element = $(html).prop('outerHTML');
        return element;
    }

    function userStatusExport(data) {
        var status;
        $.each(statusList, (index, item) => {
            if (item.id == data) {
                status = item.name;
            }
        })
        return status;
    }

    function convertToMoney(data) {
        var tmp = data + '';
        tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
        if (tmp.length > 6) tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        return tmp;
    }
</script> 