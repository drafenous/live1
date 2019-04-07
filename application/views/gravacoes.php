<main class="container" role="main">
    <div class="row no-gutters">
        <h1>Gravações</h1>
    </div>
    <hr>
    
    <form id="frmGravacoes">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="inpuDe">Data Inicial</label>
                    <div class="input-group date dtpDMY" id="inputDe" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#inputDe" />
                        <div class="input-group-append" data-target="#inputDe" data-toggle="datetimepicker">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="inputAte">Data Final</label>
                    <div class="input-group date dtpDMY" id="inputAte" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#inputAte" />
                        <div class="input-group-append" data-target="#inputAte" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="tipoChamada">Tipo de Ligação</label>
                    <div class="input-group" data-target-input="nearest">
                        <select class="form-control" id="tipoChamada" name="tipoChamada" data-target="#tipoChamada">
                            <option value="all" selected>Todos</option>
                            <option value="entrantes">Entrantes</option>
                            <option value="saintes">Saintes</option>
                        </select>
                        <div class="input-group-append" data-target="#tipoChamada">
                            <div class="input-group-text"><i class="fas fa-phone"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="grupoRamal">Grupo de Ramal</label>
                    <div class="input-group" data-target-input="nearest">
                        <select class="form-control" id="grupoRamal" name="grupoRamal" data-target="#grupoRamal">
                            <option value="all" selected>Todos</option>
                            <option value="0800-EBC1">0800-EBC1</option>
                            <option value="0800-EBC2">0800-EBC2</option>
                            <option value="Advance">Advance</option>
                            <option value="Autoservico">Autoservico</option>
                            <option value="ramal-800">ramal-800</option>
                        </select>
                        <div class="input-group-append" data-target="#grupoRamal">
                            <div class="input-group-text"><i class="fas fa-users"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="ramal">Ramal</label>
                    <div class="input-group" data-target-input="nearest">
                        <select class="form-control" id="ramal" name="ramal" data-target="#ramal">
                            <option value="all" selected>Todos</option>
                            <option value="7000">7000</option>
                            <option value="7001">7001</option>
                            <option value="7002">7002</option>
                            <option value="7003">7003</option>
                            <option value="7004">7004</option>
                            <option value="7005">7005</option>
                        </select>
                        <div class="input-group-append" data-target="#ramal">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <label for="search">&nbsp;</label>
                <button type="submit" id="search" class="btn btn-success" style="width: 100%"><i class="fas fa-search" disabled></i> Buscar</button>
            </div>
        </div>
    </form>

    <hr>

    <div id="dtEntranteLoading" class="alert alert-success" role="alert">
        <i class="fas fa-spinner fa-pulse"></i> <strong>Aguarde!</strong> Carregando os dados solicitados.
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Ligações Entrantes</h2>
        </div>
        <div class="col-md-12">
            <table id="dtEntrante" class="table display table-hover table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Cod. Cliente</th>
                        <th>Origem</th>
                        <th>Destino</th>
                        <th>Tempo</th>
                        <th>Audio</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            <hr>
            <div id="dtSainteLoading" class="alert alert-success" role="alert">
                <i class="fas fa-spinner fa-pulse"></i> <strong>Aguarde!</strong> Carregando os dados solicitados.
            </div>
        </div>

        <div class="col-md-12">
            <h2>Ligações Saíntes</h2>
        </div>
        <div class="col-md-12">
            <table id="dtSainte" class="table display table-hover table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Cod. Cliente</th>
                        <th>Origem</th>
                        <th>Destino</th>
                        <th>Tempo</th>
                        <th>Audio</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
$(document).ready(function(e){
    dtEntante = $('#dtEntrante').DataTable({
        ajax: {
            cache: false,
            url: "<?= base_url('assets/src/json/gravacoes-entrantes.json'); ?>",
            dataType: 'json',
            dataSrc: 'entrantes',
            error: (response) => {
                console.error(response);
            }
        },
        columns: [
            {data: 'nome'},
            {data: 'data', className: 'date', render: (data, type, row) => { return type === 'export' ? data : moment(data, 'YYYY-MM-DD').format('DD/MM/YYYY') }},
            {data: 'hora', className: 'time'},
            {data: 'codCliente'},
            {data: 'origem', className: 'phone'},
            {data: 'destino'},
            {data: 'tempo'},
            {data: 'id', render: function(data, type, row){ return type === 'export' ? 'Arquivo de áudio' : `<audio controls><source type="audio/x-wav"></audio>`}, orderable: false}
        ],
        drawCallback: function(settings){
            $('.dtUpdateButton, #search').attr('disabled', false);
            $('#dtEntranteLoading').hide();
            // masks
            $('#dtEntrante th').removeClass('phone');
            $('#dtEntrante').find('.phone').mask(SPMaskBehavior, spOptions).trigger('keyup');
        }
    });

    dtSainte = $('#dtSainte').DataTable({
        ajax: {
            cache: false,
            url: "<?= base_url('assets/src/json/gravacoes-entrantes.json'); ?>",
            dataType: 'json',
            dataSrc: 'entrantes',
            error: (response) => {
                console.error(response);
            }
        },
        columns: [
            {data: 'nome'},
            {data: 'data', className: 'date', render: (data, type, row) => { return type === 'export' ? data : moment(data, 'YYYY-MM-DD').format('DD/MM/YYYY') }},
            {data: 'hora', className: 'time'},
            {data: 'codCliente'},
            {data: 'destino'},
            {data: 'origem', className: 'phone'},
            {data: 'tempo'},
            {data: 'id', render: function(data, type, row){ return type === 'export' ? 'Arquivo de áudio' : `<audio controls><source type="audio/x-wav"></audio>`}, orderable: false}
        ],
        drawCallback: function(settings){
            $('.dtUpdateButton, #search').attr('disabled', false);
            $('#dtSainteLoading').hide();
            // masks
            $('#dtSainte th').removeClass('phone');
            $('#dtSainte').find('.phone').mask(SPMaskBehavior, spOptions).trigger('keyup');
        }
    });

    $('#frmGravacoes').submit(function(event){
        event.preventDefault();
        var form = $(this).serializeArray();
        switch($('#tipoChamada').val()){
        case 'all':
            $('.dtUpdateButton, #search').attr('disabled', true);
            $('#dtEntranteLoading, #dtSainteLoading').show();
            dtEntante.ajax.reload(null, false);
            dtSainte.ajax.reload(null, false);
        break;
        case 'entrantes':
            $('.dtUpdateButton, #search').attr('disabled', true);
            $('#dtEntranteLoading').show();
            dtEntante.ajax.reload(null, false);
        break;
        case 'saintes':
            $('.dtUpdateButton, #search').attr('disabled', true);
            $('#dtSainteLoading').show();
            dtSainte.ajax.reload(null, false);
        break;
        default:
            $('.dtUpdateButton, #search').attr('disabled', true);
            $('#dtEntranteLoading, #dtSainteLoading').show();
            dtEntante.ajax.reload(null, false);
            dtSainte.ajax.reload(null, false);
        break;
        }
    })
})
</script>