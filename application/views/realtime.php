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
            <div class="row">

                <div class="col-md-4" style="margin: 15px 0px; ">
                    <div class="col-md-12" style="background-color: #ecf0f1">
                        <div class="row">
                            <div class="col-md-4"><img src="<?= base_url('assets\images\default-profile.png'); ?>" alt="Imagem de Perfil" title="Image de Perfil" class="img-responsive thumbnail rounded-circle" style="width: 100%; height: 100%"></div>
                            <div class="col-md-8">
                                <strong>Nome:</strong> Rodrigo R. Almeida<br/>
                                <strong>Ramal:</strong> 7001<br/>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script>
$(document).ready(function(event){
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
                console.log('realtime');
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

    // Ranking Filter
    $('#rankingBottomItems').hide();
    $('#rankingOrder').on('click', function(event) {
        $('#rankingOrderIcon').toggleClass('fa-chevron-down fa-chevron-up');
        $('#rankingTopItems, #rankingBottomItems').fadeToggle(200);
    })
})
</script>