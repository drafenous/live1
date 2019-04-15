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
    poputaleRealTime();

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
                poputaleRealTime();
            }, window['globalSettings'].realTimeInterval);
            // next status
            statusRealTime = 'off';
        } else {
            clearInterval(realTime);
            // next status
            statusRealTime = 'on';
        }
    })

    // start realtime
    $('#realTimeSwitch').trigger('change')
})

function poputaleRealTime(){
    $.ajax({
        url: "<?= base_url('assets/src/json/realtime.json'); ?>",
        cache: false,
        dataType: 'json',
        async: true,
        success: (response) => {
            $.each(response.realtime, function(index, item){
                if($('#rtItem_' + item.id).length){
                    if(item['info'].ringStatus == true){
                        $('#rtItem_' + item.id).addClass('ringing');
                    }else{
                        $('#rtItem_' + item.id).removeClass('ringing');
                    }
                    $('#rtItem_' + item.id + ' .rtiName').html(item.name);
                    $('#rtItem_' + item.id + ' .rtiRamal').html(item.ramal);
                    $('#rtItem_' + item.id + ' .rtiStatus').html(item['info'].status);
                    $('#rtItem_' + item.id + ' .rtiCallStatus').html(item['info'].callStatus == true ? `<span class="phone">${item['info'].number}</span>` : 'Linha Disponível');
                }else{
                    var html = `
                    <div class="col-md-4 rtItem ${item['info'].ringStatus == true ? 'ringing' : ''}" id="rtItem_${item.id}">
                        <div class="col-md-12 rtiCard">
                            <div class="row">
                                <div class="col-md-4"><img src="assets/images/default-profile.png" alt="Imagem de Perfil" title="Image de Perfil" class="img-responsive thumbnail rounded-circle" style="width: 100%; height: auto"></div>
                                <div class="col-md-8">
                                    <span class="rtiName">${item.name}</span><br/>
                                    <strong>Ramal:</strong> <span class="rtiRamal">${item.ramal}</span><br/>
                                    <strong>Status:</strong> <span class="rtiStatus">${item['info'].status}<br/>
                                </div>
                            </div>
                            <div class="row flex-nowrap realtimeItemOptions">
                                <div class="col-md-6">
                                    <i class="fas fa-phone-square"></i> <span class="rtiCallStatus">${item['info'].callStatus == true ? `<span class="phone">${item['info'].number}</span>` : 'Linha Disponível'}</spa>
                                </div>
                                <div class="col-md-4">
                                    <i class="fas fa-clock"></i> <span class="rtiTime">00:00</span>
                                </div>
                                <div class="col-md-2">
                                    <button class="hiddenButton itemOptionsShow" style="color: white" data-popover="true" data-placement="left" data-trigger="hover" data-title="Ver opções" data-content="Ver mais opções de acompanhamento em realtime">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button class="hiddenButton itemOptionsHide" style="color: white" data-popover="true" data-trigger="hover" data-placement="right" data-title="Fechar Opções" data-content="Fechar opções de acompanhamento em realtime">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                </div>
                                <div class="col-md-10">
                                    Lista de opções
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                    $('#realTimeList').append(html);
                }
            })

            // Realtime item options
            $('.itemOptionsShow').on('click', function(event){
                var width = $('.realtimeItemOptions').width()
                $(this).closest('.realtimeItemOptions').stop().animate({scrollLeft: width});
            })

            $('.itemOptionsHide').on('click', function(event){
                $(this).closest('.realtimeItemOptions').stop().animate({scrollLeft: 0});
            })


            $('.phone').unmask().mask(SPMaskBehavior, spOptions);
        },
        error: (response) => {
            return console.error('[realTimeItems]:', response)
        }
    })
    $('.ringing').shake(3,5,800);
}
</script>