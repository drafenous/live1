<main class="container" role="main">
    <div class="row no-gutters">
        <div class="col-md-12">
            <h1 class="float-left">Realtime</h1>
            <div class="float-right text-left text-sm-left text-md-left text-xl-right" style="margin-top: 25px">
                <div class="custom-control custom-switch" id="realTimeInfo" data-popover="true" data-trigger="hover" data-placement="bottom" data-title="Atualização em tempo real" data-content="Por padrão, a atualização em tempo real de informações inicia <strong>habilitada</strong> neste módulo do sistema, clique neste ícone para <u>desabilitar</u>.">
                    <input type="checkbox" class="custom-control-input" id="realTimeSwitch" checked>
                    <label class="custom-control-label" for="realTimeSwitch"><i id="realTimeIcon" class="fas fa-sync"></i></label>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <hr/>
            <div class="row" id="realTimeList">
                <!-- realTime list -->
            </div>
        </div>
    </div>
</main>
<script>
$(document).ready(function(event){
    // Starter
    realTimeItems();

    // Realtime
    var statusRealTime = 'on';
    $('#realTimeSwitch').on('change', function(event) {
        // switch the animation of progress-bar and refresh icon
        $('.progress-bar').toggleClass('progress-bar-animated');
        $('#realTimeIcon').toggleClass('fa-spin');

        // the switcher.
        if (statusRealTime == 'on') {
            // disable datatable refresh button
            $('.dtUpdateButton').attr('disabled', true)
            realTime = setInterval(() => {
                realTimeItems();
            }, window['globalSettings'].realTimeInterval);
            // next status
            statusRealTime = 'off';
        } else {
            clearInterval(realTime);
            // enable datatable refresh button
            $('.dtUpdateButton').attr('disabled', false)
            // next status
            statusRealTime = 'on';
        }
    })
    // start realtime
    $('#realTimeSwitch').trigger('change')
})

function realTimeItems(){
    $.ajax({
        url: "<?= base_url('assets/src/json/realtime.json'); ?>",
        cache: false,
        dataType: 'json',
        success: (response) => {
            var html = '';
            $.each(response.realtime, function(index, item){
                html += `
                <div class="col-md-4" id="rtItem_${item.id}" style="margin: 15px 0px;">
                    <div class="col-md-12" style="background-color: #ecf0f1; padding: 15px 15px 0px 15px">
                        <div class="row">
                            <div class="col-md-4"><img src="assets/images/default-profile.png" alt="Imagem de Perfil" title="Image de Perfil" class="img-responsive thumbnail rounded-circle" style="width: 100%; height: 100%"></div>
                            <div class="col-md-8">
                                ${item.name}<br/>
                                <strong>Ramal:</strong> ${item.ramal}<br/>
                                <strong>Status:</strong> ${item['info'].status}<br/>
                            </div>
                        </div>
                        <div class="row flex-nowrap realtimeItemOptions" style="overflow-x: hidden; background-color: #4f8998; margin-top: 15px; line-height: 35px; color: white">
                            <div class="col-md-6">
                                <i class="fas fa-phone-square"></i> Linha Disponível
                            </div>
                            <div class="col-md-4">
                                <i class="fas fa-clock"></i> 00:00
                            </div>
                            <div class="col-md-2">
                                <button class="hiddenButton itemOptionsShow" style="color: white" data-popover="true" data-trigger="hover" data-title="Ver opções" data-content="Ver mais opções de acompanhamento em realtime">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            <div class="col-md-12">
                                <button class="hiddenButton itemOptionsHide" style="color: white" data-popover="true" data-trigger="hover" data-title="Fechar Opções" data-content="Fechar opções de acompanhamento em realtime">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            })
            $('#realTimeList').html(html);

            // Realtime item options
            $('.itemOptionsShow').on('click', function(event){
                var width = $('.realtimeItemOptions').width()
                $(this).closest('.realtimeItemOptions').animate({scrollLeft: width});
            })
            $('.itemOptionsHide').on('click', function(event){
                $(this).closest('.realtimeItemOptions').animate({scrollLeft: 0});
            })
        },
        error: (response) => {
            return console.error('[realTimeItems]:', response)
        }
    })
}
</script>