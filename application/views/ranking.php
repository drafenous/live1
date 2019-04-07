<main class="container" role="main">
    <div class="row no-gutters clearfix">
        <div class="col-md-12">
            <h1 class="float-left">Ranking</h1>
            <div class="float-right text-left text-sm-left text-md-left text-xl-right" style="margin-top: 25px">
                <div class="custom-control custom-switch" id="realTimeInfo" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-title="Atualização em tempo real" data-content="Por padrão, a atualização em tempo real de informações inicia <strong>habilitada</strong> neste módulo do sistema, clique neste ícone para <u>desabilitar</u>.">
                    <input type="checkbox" class="custom-control-input" id="realTimeSwitch" checked>
                    <label class="custom-control-label" for="realTimeSwitch"><i id="realTimeIcon" class="fas fa-sync"></i></label>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <hr>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-3 col-xl-3 headerCard" id="cardMetaConcluida" style="margin: 15px 0px">
                    <div class="col-md-12 card rounded-0" style="background-color: #4f8998;">
                        <div class="card-title">
                            Meta Concluída
                        </div>
                        <div class="card-content text-center">
                            <strong>Total de Operadores</strong><br />
                            <span class="total">Carregando</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-xl-3 headerCard" id="cardAcimaMediaMeta" style="margin: 15px 0px">
                    <div class="col-md-12 card rounded-0" style="background-color: #16a085;">
                        <div class="card-title">
                            Acima da média
                        </div>
                        <div class="card-content text-center">
                            <strong>Total de Operadores</strong><br />
                            <span class="total">Carregando</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-xl-3 headerCard" id="cardMediaMeta" style="margin: 15px 0px">
                    <div class="col-md-12 card rounded-0" style="background-color: #f39c12;">
                        <div class="card-title">
                            Média da Meta
                        </div>
                        <div class="card-content text-center">
                            <strong>Total de Operadores</strong><br />
                            <span class="total">Carregando</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-3 col-xl-3 headerCard" id="cardAbaixoMediaMeta" style="margin: 15px 0px">
                    <div class="col-md-12 card rounded-0" style="background-color: #c0392b;">
                        <div class="card-title">
                            Abaixo da média
                        </div>
                        <div class="card-content text-center">
                            <strong>Total de Operadores</strong><br />
                            <span class="total">Carregando</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <hr>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="float-left">
                        <div class="btn-group btn-group-toggle" id="tableDisplay" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="displayType" id="table" value="table" autocomplete="off" checked>
                                <i class="fas fa-table"></i>
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="displayType" id="datatable" value="datatable" autocomplete="off">
                                <i class="fas fa-th-list"></i>
                            </label>
                        </div>
                    </div>

                    <div class="float-right">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="filtrar">Filtrar</label>
                            </div>
                            <select class="form-control" id="filtrar">
                                <option value="todos" selected>Todos</option>
                                <option value="concluida">Meta Concluída</option>
                                <option value="acima">Acima da Média</option>
                                <option value="media">Média da Meta</option>
                                <option value="abaixo">Abaixo da Meta</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row" id="rankingList">
                <!-- rankingList -->
            </div>
            <div class="row" id="rankingDt">
                <div class="col-md-12">
                    <table id="dtRanking" class="table display table-hover table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ramal</th>
                                <th>Meta Inserida</th>
                                <th>Meta Atual</th>
                                <th>% de Conclusão</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</main>
<script>
// globals
var rankingList = '';
var classifications = {completed: 100, aboveAvarage: 80, minimalAvarage: 40}

$(document).ready(function(event){
    // DataTable
    dtRanking = $('#dtRanking').DataTable({
        ajax: {
            cache: false,
            url: "<?= base_url('assets/src/json/ranking.json'); ?>",
            dataType: 'json',
            dataSrc: 'ranking'
        },
        order: [[ 4, "desc" ]],
        rowId: 'id',
        columns: [
            {data: 'nome', class: 'text-left'},
            {data: 'ramal', class: 'text-center'},
            {data: 'metaInserida', class: 'text-right', render: (data) => {return `R$ <span class="money">${data}</span>`}},
            {data: 'metaAtual', class: 'text-right', render: (data) => {return `R$ <span class="money">${data}</span>`}},
            {data: 'conclusao', class: 'text-center', render: (data) => {return data + '%'}}
        ],
        createdRow: function(row, data, dataIndex){
            if(data['conclusao'] >= classifications.completed){
                return $(row).css('color', '#27ae60');
            }
            if(data['conclusao'] >= classifications.aboveAvarage){
                return $(row).css('color', '#27ae60');
            }
            if(data['conclusao'] >= classifications.minimalAvarage){
                return $(row).css('color', '#f39c12');
            }
            if(data['conclusao'] < classifications.minimalAvarage){
                return $(row).css('color', '#c0392b');
            }
        },
        drawCallback: function(settings){
            // money format
            $('#dtRanking th').removeClass('money');
            $('#dtRanking .money').mask(window['globalSettings'].defaultMoneyMask, {reverse: true}).trigger('keyup');
        }
    });

    // display type
    $('#tableDisplay').on('change', function(event){
        switch($('#tableDisplay :input:radio:checked').val()){
            case 'table':
                $('#filtrar').attr('disabled', false);
                $('#rankingList').show();
                $('#rankingDt').hide();
            break;
            case 'datatable':
                $('#filtrar').attr('disabled', true);
                $('#rankingDt').show();
                $( $.fn.dataTable.tables( true ) ).DataTable().columns.adjust();
                $('#rankingList').hide();
            break;
            default:
                $('#filtrar').attr('disabled', false);
                $('#rankingList').show();
                $('#rankingDt').hide();
            break;
        };
    })
    $('#tableDisplay').trigger('change');

    // filtro
    $('#filtrar').on('change', function(event){
        switch ($(this).val()){
            case 'todos':
                $('.rankingItem').show();
            break;
            case 'concluida':
                $('.rankingItem').show();
                $('.rankingItem').not('.concluidaMeta').hide();
            break;
            case 'acima':
                $('.rankingItem').show();
                $('.rankingItem').not('.acimaMeta').hide();
            break;
            case 'media':
                $('.rankingItem').show();
                $('.rankingItem').not('.mediaMeta').hide();
            break;
            case 'abaixo':
                $('.rankingItem').show();
                $('.rankingItem').not('.abaixoMeta').hide();
            break;
            default:
                $('.rankingItem').show();
            break;
        }
    })

    $('.headerCard').on('click', function(event){
        switch ($(this).attr('id')){
            case 'cardMetaConcluida':
                $('#filtrar').val('concluida').trigger('change');
            break;
            case 'cardAcimaMediaMeta':
                $('#filtrar').val('acima').trigger('change');
            break;
            case 'cardMediaMeta':
                $('#filtrar').val('media').trigger('change');
            break;
            case 'cardAbaixoMediaMeta':
                $('#filtrar').val('abaixo').trigger('change');
            break;
            default:
                $('#filtrar').val('todos').trigger('change');
            break;
        }
    })

    // realTime
    loadRanking();

    // set realtime interval
    var statusRealTime = 'on';
    $('#realTimeSwitch').on('change', function(event){
        // switch the animation of progress-bar and refresh icon
        $('.progress-bar').toggleClass('progress-bar-animated');
        $('#realTimeIcon').toggleClass('fa-spin');

        // the switcher.
        if(statusRealTime == 'on'){
            // disable datatable refresh button
            $('.dtUpdateButton').attr('disabled', true)
            realTime = setInterval(() => {
                // reload table display
                loadRanking();
                // reload datatable
                dtRanking.ajax.reload(null, false);
            }, window['globalSettings'].realTimeInterval);
            // next status
            statusRealTime = 'off';
        }else{
            clearInterval(realTime);
            // enable datatable refresh button
            $('.dtUpdateButton').attr('disabled', false)            
            // next status
            statusRealTime = 'on';
        }
    })
    // start realtime
    $('#realTimeSwitch').trigger('change')
});

function loadRanking(){
    var rankingList = '';
    $.ajax({
        cache: false,
        url: "<?= base_url('assets/src/json/ranking.json'); ?>",
        dataType: 'json',
        success: (response) => {
            var headers = {metaConcluida: 0, acimaMeta: 0, mediaMeta: 0, abaixoMeta: 0};
            var sortedRanking = response.ranking.sort((a, b) => parseFloat(b.conclusao) - parseFloat(a.conclusao))
            $.each(sortedRanking, (index, item) => {
                rankingList += `
                <div class="rankingItem col-md-4 ${item.conclusao >= classifications.completed ? 'concluidaMeta' : (item.conclusao >= classifications.aboveAvarage ? 'acimaMeta' : (item.conclusao < classifications.minimalAvarage ? 'abaixoMeta' : 'mediaMeta'))}" style="margin: 15px 0px;">
                    <div class="col-md-12" style="background-color: #ecf0f1; padding: 15px;">
                        <div class="row">
                            <div class="col-md-4 d-none d-md-block d-lg-block">
                                <img src="${item.foto}" alt="Imagem de Perfil de ${item.nome}" class="rounded-circle" style="width: 110%">
                            </div>
                            <div class="col-md-8" style="font-size: 12px;">
                                <strong>Nome:</strong> ${item.nome}<br/>
                                <strong>Ramal:</strong> ${item.ramal}<br/>
                                <div class="progress">
                                    <div class="progress-bar ${item.conclusao >= classifications.aboveAvarage ? 'bg-success' : (item.conclusao < classifications.minimalAvarage ? 'bg-danger' : 'bg-warning')} progress-bar-striped progress-bar-animated" role="progressbar" style="width: ${item.conclusao}%" aria-valuenow="${item.conclusao}" aria-valuemin="0" aria-valuemax="100">${item.conclusao}%</div>
                                </div>
                                <strong>Meta:</strong> R$ <span class="money">${item.metaInserida}</span><br/>
                                <strong>Concluído:</strong> R$ <span class="money">${item.metaAtual}</span><br/>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                item.conclusao >= classifications.completed ? headers.metaConcluida++ : (item.conclusao >= classifications.aboveAvarage ? headers.acimaMeta++ : (item.conclusao >= classifications.minimalAvarage ? headers.mediaMeta++ : headers.abaixoMeta++));
            });

            // set headers
            $('#cardMetaConcluida').find('.total').html(headers.metaConcluida);
            $('#cardAcimaMediaMeta').find('.total').html(headers.acimaMeta);
            $('#cardMediaMeta').find('.total').html(headers.mediaMeta);
            $('#cardAbaixoMediaMeta').find('.total').html(headers.abaixoMeta);

            // set html
            $('#rankingList').html(rankingList);
            $('#rankingList .money').mask(window['globalSettings'].defaultMoneyMask, {reverse: true}).trigger('keyup');
            return $('#filtrar').trigger('change');
        },
        error: (response) => {
            console.error('[rankingList]:', response);
        }
    })
}
</script>