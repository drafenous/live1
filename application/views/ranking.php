<main class="container" role="main">
    <div class="row no-gutters clearfix">
        <div class="col-md-12">
            <h1 class="float-left">Ranking</h1>
            <div class="float-right text-left text-sm-left text-md-left text-xl-right" style="margin-top: 25px">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="realTimeSwitch" checked>
                    <label class="custom-control-label" for="realTimeSwitch">Atualização em Tempo Real</label>
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
$(document).ready(function(event){
    $('#rankingDt').hide();

    // DataTable
    dtRanking = $('#dtRanking').DataTable({
        ajax: {
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
            if(data['conclusao'] >= 80){
                return $(row).css('color', '#27ae60');
            }
            if(data['conclusao'] >= 40){
                return $(row).css('color', '#f39c12');
            }
            if(data['conclusao'] < 40){
                return $(row).css('color', '##c0392b');
            }
        },
        drawCallback: function(settings){
            // money format
            $('#dtRanking th').removeClass('money');
            $('#dtRanking .money').mask("#.##0,00", {
                reverse: true
            }).trigger('keyup');
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
        }
    })

    // realTime
    loadRanking();

    // set realtime interval
    var statusRealTime = 'on';
    $('#realTimeSwitch').on('change', function(event){
        if(statusRealTime == 'on'){
            // disable datatable refresh button
            $('.dtUpdateButton').attr('disabled', true)
            realTime = setInterval(() => {
                // reload table display
                loadRanking();
                // reload datatable
                dtRanking.ajax.reload(null, false);
            }, 1000);
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

    $('#realTimeSwitch').trigger('change')
});

function loadRanking(){
    var rankingList = '';
    $.ajax({
        url: "<?= base_url('assets/src/json/ranking.json'); ?>?_=" + (new Date()).getTime(),
        dataType: 'json',
        success: (response) => {
            var sortedRanking = response.ranking.sort((a, b) => parseFloat(b.conclusao) - parseFloat(a.conclusao))
            $.each(sortedRanking, (index, item) => {
                rankingList += `
                <div class="rankingItem col-md-4 ${item.conclusao == 100 ? 'concluidaMeta' : (item.conclusao >= 80 ? 'acimaMeta' : (item.conclusao < 40 ? 'abaixoMeta' : 'mediaMeta'))}" style="margin: 15px 0px;">
                    <div class="col-md-12" style="background-color: #ecf0f1; padding: 15px;">
                        <div class="row">
                            <div class="col-md-4 d-none d-md-block d-lg-block">
                                <img src="${item.foto}" alt="Imagem de Perfil de ${item.nome}" class="rounded-circle" style="width: 110%">
                            </div>
                            <div class="col-md-8" style="font-size: 12px;">
                                <strong>Nome:</strong> ${item.nome}<br/>
                                <strong>Ramal:</strong> ${item.ramal}<br/>
                                <div class="progress">
                                    <div class="progress-bar ${item.conclusao >= 80 ? 'bg-success' : (item.conclusao < 40 ? 'bg-danger' : 'bg-warning')} progress-bar-striped progress-bar-animated" role="progressbar" style="width: ${item.conclusao}%" aria-valuenow="${item.conclusao}" aria-valuemin="0" aria-valuemax="100">${item.conclusao}%</div>
                                </div>
                                <strong>Meta:</strong> R$ <span class="money">${item.metaInserida}</span><br/>
                                <strong>Concluído:</strong> R$ <span class="money">${item.metaAtual}</span><br/>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            });

            $('#rankingList').html(rankingList);
            $('#rankingList .money').mask("#.##0,00", {reverse: true}).trigger('keyup');
            return $('#filtrar').trigger('change');
        },
        error: (response) => {
            console.error('[rankingList]:', response);
        }
    })
}
</script>