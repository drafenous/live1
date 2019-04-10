<main class="container" role="main">
	<div class="row no-gutters">
	<div class="col-md-12">
            <h1 class="float-left">Dashboard</h1>
            <div class="float-right text-left text-sm-left text-md-left text-xl-right" style="margin-top: 25px">
                <div class="custom-control custom-switch" id="realTimeInfo" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-title="Atualização em tempo real" data-content="Por padrão, a atualização em tempo real de informações inicia <strong>habilitada</strong> neste módulo do sistema, clique neste ícone para <u>desabilitar</u>.">
                    <input type="checkbox" class="custom-control-input" id="realTimeSwitch" checked>
                    <label class="custom-control-label" for="realTimeSwitch"><i id="realTimeIcon" class="fas fa-sync"></i></label>
                </div>
            </div>
        </div>
		<!-- top cards -->
		<div class="col-md-12">
			<hr>
			<div id="headers" class="row">
				<div class="col-12 col-sm-12 col-md-3 col-xl-3" style="margin: 15px 0px">
					<div class="col-md-12 card rounded-0" style="background-color: #16a085;">
						<div class="card-title">
							Faturamento Geral
						</div>
						<div class="card-content">
							<strong>Meta de Faturamento</strong><br />
							<span>R$ <span id="faturamentoGeral0" class="money">...</span></span>
							<br />
							<strong>Faturamento Parcial</strong><br />
							<span>R$ <span id="faturamentoGeral1" class="money">...</span></span>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-3 col-xl-3" style="margin: 15px 0px">
					<div class="col-md-12 card rounded-0" style="background-color: #8e44ad;">
						<div class="card-title">
							Faturamento São Paulo
						</div>
						<div class="card-content">
							<strong>Meta de Faturamento</strong><br />
							<span>R$ <span id="faturamentoSP0" class="money">...</span></span>
							<br />
							<strong>Faturamento Parcial</strong><br />
							<span>R$ <span id="faturamentoSP1" class="money">...</span></span>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-3 col-xl-3" style="margin: 15px 0px">
					<div class="col-md-12 card rounded-0" style="background-color: #f39c12;">
						<div class="card-title">
							Faturamento Fora de São Paulo
						</div>
						<div class="card-content">
							<strong>Meta de Faturamento</strong><br />
							<span>R$ <span id="faturamentoFSP0" class="money">...</span></span>
							<br />
							<strong>Faturamento Parcial</strong><br />
							<span>R$ <span id="faturamentoFSP1" class="money">...</span></span>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-3 col-xl-3" style="margin: 15px 0px">
					<div class="col-md-12 card rounded-0" style="background-color: #ecf0f1;">
						<div class="card-title" style="color: #2c3e50 !important">
							Status dos Operadores
						</div>
						<div class="card-content row text-center">
							<div class="col-4 text-nowrap" style="color: #16a085" data-toggle="popover"
								data-trigger="hover" data-placement="bottom" data-content="Logados">
								<img src="<?= base_url('assets\images\telemarketing-on.png'); ?>"
									style="width: 54px"><br />
								<h3 id="headersStatusAvaiable">...</h3>
							</div>
							<div class="col-4 text-nowrap" style="color: #f39c12" data-toggle="popover"
								data-trigger="hover" data-placement="bottom" data-content="Em Pausa">
								<img src="<?= base_url('assets\images\telemarketing-pausa.png'); ?>"
									style="width: 54px"><br />
								<h3 id="headersStatusPaused">...</h3>
							</div>
							<div class="col-4 text-nowrap" style="color: #c0392b" data-toggle="popover"
								data-trigger="hover" data-placement="bottom" data-content="Deslogados">
								<img src="<?= base_url('assets\images\telemarketing-off.png'); ?>"
									style="width: 54px"><br />
								<h3 id="headersStatusUnavaiable">...</h3>
							</div>
						</div>
					</div>
				</div>
			</div>

			<hr>
			<!-- graphs -->
			<div class="row">
				<div class="col-md-9" style="margin: 15px 0px;">
					<div class="col-md-12" style="background-color: #ecf0f1; padding: 15px;">
						<div class="row">
							<div class="col-md-8">
								<h5>Fluxo de Chamadas</h5>
								<canvas id="graph-fluxo-chamadas" style="width: 100%; height: 300px;"></canvas>
							</div>
							<div class="col-md-4">
								<h5>Tipos de Chamadas</h5>
								<canvas id="graph-tipos-chamadas" style="width: 100%; height: 300px;"></canvas>
							</div>
						</div>
					</div>

					<div class="col-md-12" style="background-color: #ecf0f1; margin: 15px 0px">
						<div class="col-md-12" style="padding: 15px">
							<div class="row">
								<h5>Gráfico de Atividades</h5>
								<canvas id="graph-meta-faturamento" style="width: 100%; height: 300px;"></canvas>
							</div>
						</div>
					</div>
				</div>

				<!-- sidebar: right -->
				<div class="col-md-3" style="margin: 15px 0px">
					<div class="col-md-12" style="background-color: #ecf0f1;">
						<div class="row ranking" style="padding: 15px; overflow: hidden;">
							<h5>Ranking <button id="rankingOrder" class="hiddenButton" data-placement="bottom" data-trigger="hover" data-toggle="popover" data-title="Ordenar Ranking" data-content="Ao clicar a ordem da lista é alterada entre: <strong>5 primeiros</strong> e <strong>5 últimos.</strong>"><i id="rankingOrderIcon" class="fas fa-chevron-down"></i></button></h5>

							<!-- ranking items -->
							<div id="rankingTopItems" style="width: 100%">
							</div>

							<div id="rankingBottomItems" style="width: 100%">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<script>
	//Setting Global Vars:
	dataGraphFluxoChamadas = { entrantes: [], saintes: [] };
	dataGraphTiposChamadas = { atendidas: [], naoAtendidas: [], abandonadas: [], transferidas: [] };

	$(document).ready(function (event) {
		// load charts
		var ctxGraphFluxoChamadas = document.getElementById("graph-fluxo-chamadas").getContext("2d");
		graphFluxoChamadas = new Chart(ctxGraphFluxoChamadas, {
			type: 'line',
			data: {
				labels: ['07h', '08h', '09h', '10h', '11h', '12h', '13h', '14h', '15h', '16h', '17h', '18h', '19h'],
				datasets: [{
					label: 'Ligações Entrantes',
					data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
					backgroundColor: 'rgba(22, 160, 133, 0.3)',
					pointBackgroundColor: 'rgba(22, 160, 133, 1.0)',
					borderColor: 'rgba(22, 160, 133, 1.0)',
					borderWidth: 1
				},
				{
					label: 'Ligações Saíntes',
					data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
					backgroundColor: 'rgba(41, 128, 185, 0.3)',
					pointBackgroundColor: 'rgba(41, 128, 185, 1.0)',
					borderColor: 'rgba(41, 128, 185, 1.0)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				},
				legend: {
					display: true,
					position: 'top'
				},
				tooltips: {
					mode: 'label'
				}
			}
		});

		var ctxGraphTiposChamadas = document.getElementById("graph-tipos-chamadas").getContext("2d");
		graphTiposChamadas = new Chart(ctxGraphTiposChamadas, {
			type: 'doughnut',
			data: {
				labels: ['Atendidas', 'Não Atendidas', 'Abandonadas', 'Transferidas'],
				datasets: [{
					data: [0, 0, 0, 0],
					backgroundColor: ['rgba(22, 160, 133, 1.0)', 'rgba(192, 57, 43, 1.0)', 'rgba(44, 62, 80, 1.0)', 'rgba(243, 156, 18, 1.0)'],
					borderWidth: 0,
				}]
			},
			options: {
				cutoutPercentage: 75,
				aspectRatio: 1,
				legend: {
					display: true,
					position: 'bottom'
				}
			}
		});

		var ctxGraphMetaFaturamento = document.getElementById("graph-meta-faturamento").getContext("2d");
		graphMetaFaturamento = new Chart(ctxGraphMetaFaturamento, {
			type: 'horizontalBar',
			data: {
				labels: ['Meta Concluída', 'Próximo da Meta', 'Abaixo da Meta'],
				datasets: [{
					data: [0, 0, 0],
					backgroundColor: ['rgba(22, 160, 133, 1.0)', 'rgba(243, 156, 18, 1.0)', 'rgba(192, 57, 43, 1.0)'],
					borderWidth: 0,
				}]
			},
			options: {
				cutoutPercentage: 75,
				aspectRatio: 1,
				legend: {
					display: false,
				},
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				},
			}
		});

		// Starter
		realTimeHeaders();
		realTimeFluxoChamadas();
		realTimeGraphTiposChamadas();
		realTimeGraphMetaFaturamento();
		realTimeOperatorsStatus();
		realTimeRanking();


		// Realtime
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
					realTimeHeaders();
					realTimeFluxoChamadas();
					realTimeGraphTiposChamadas();
					realTimeGraphMetaFaturamento();
					realTimeOperatorsStatus();
					realTimeRanking();
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

		// Ranking Filter
		$('#rankingBottomItems').hide();
		$('#rankingOrder').on('click', function(event){
			$('#rankingOrderIcon').toggleClass('fa-chevron-down fa-chevron-up');
			$('#rankingTopItems, #rankingBottomItems').fadeToggle(200);
		})
	})

	// Headers Geral, SP, FSP
	function realTimeHeaders(){
		$.ajax({
			url: '<?= base_url("assets/src/json/dashboard-headers.json"); ?>',
			cache: false,
			dataType: 'json',
			success: (response) => {
				$('#faturamentoGeral0').html(response['faturamentoGeral'][0]);
				$('#faturamentoGeral1').html(response['faturamentoGeral'][1]);

				$('#faturamentoSP0').html(response['faturamentoSP'][0]);
				$('#faturamentoSP1').html(response['faturamentoSP'][1]);

				$('#faturamentoFSP0').html(response['faturamentoFSP'][0]);
				$('#faturamentoFSP1').html(response['faturamentoFSP'][1]);

				$('#headers .money').mask(window['globalSettings'].defaultMoneyMask, {reverse: true}).trigger('keyup');
				return response;
			},
			error: (response) => {
				return console.error(response);
			}
		})
	}

	// Graph Fluxo de Chamadas
	function realTimeFluxoChamadas(){
		$.ajax({
			url: "<?= base_url('assets/src/json/dashboard-fluxoChamadas.json'); ?>",
			cache: false,
			dataType: 'json',
			success: (response) => {
				dataGraphFluxoChamadas['entrantes'] = response['ingoing'];
				dataGraphFluxoChamadas['saintes'] = response['outgoing'];

				graphFluxoChamadas.data.datasets[0].data = dataGraphFluxoChamadas['entrantes'];
				graphFluxoChamadas.data.datasets[1].data = dataGraphFluxoChamadas['saintes'];

				return graphFluxoChamadas.update(500);
			},
			error: (response) => {
				return console.error(response);
			}
		})
	}


	// Graph tipos de Chamadas
	function realTimeGraphTiposChamadas(){
		$.ajax({
			url: "<?= base_url('assets/src/json/dashboard-tiposChamadas.json'); ?>",
			cache: false,
			dataType: 'json',
			success: (response) => {
				dataGraphTiposChamadas['entrantes'] = response['graph'][0];
				dataGraphTiposChamadas['saintes'] = response['graph'][1];
				dataGraphTiposChamadas['naoAtendidas'] = response['graph'][2];
				dataGraphTiposChamadas['abandonadas'] = response['graph'][3];

				graphTiposChamadas.data.datasets[0].data = [
					dataGraphTiposChamadas['entrantes'],
					dataGraphTiposChamadas['saintes'],
					dataGraphTiposChamadas['naoAtendidas'],
					dataGraphTiposChamadas['abandonadas']
				];

				return graphTiposChamadas.update(500);
			},
			error: (response) => {
				return console.error(response);
			}
		})
	}

	// Graph Meta de Faturamento
	function realTimeGraphMetaFaturamento(){
		$.ajax({
			url: '<?= base_url("assets/src/json/dashboard-metaFaturamento.json"); ?>',
			cache: false,
			dataType: 'json',
			success: (response) => {
				dataMetaFaturamento = response['graph'];
				graphMetaFaturamento.data.datasets[0].data = dataMetaFaturamento;

				return graphMetaFaturamento.update(500);
			},
			error: (response) => {
				return console.error(response);
			}
		})
	}

	function realTimeOperatorsStatus(){
		$.ajax({
			url: '<?= base_url("assets/src/json/dashboard-operatorsStatus.json"); ?>',
			cache: false,
			dataType: 'json',
			success: (response) => {
				$('#headersStatusAvaiable').html(response['avaiable']);
				$('#headersStatusPaused').html(response['paused']);
				$('#headersStatusUnavaiable').html(response['unavailable']);

				return response
			},
			error: (response) => {
				return console.error(response);
			}
		})
	}

	function realTimeRanking(){
		$.ajax({
			url: '<?= base_url("assets/src/json/dashboard-ranking.json"); ?>',
			cache: false,
			dataType: 'json',
			success: (response) => {
				// vars definitions
				var rankingTop = response['rankingTop'];
				var htmlTop = '';
				var counter = 1;

				// loopings
				$.each(rankingTop, function(index, item){
					htmlTop += `
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-2 text-center position">
									<h1>${counter}</h1>
								</div>
								<div class="col-md-10" style="font-size: 10px;">
									<h1 class="name text-center">${item.name}</h1>
									<div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-animated
										${(item.completed == 100 ? 'bg-success' : (item.completed > 80 ? 'bg-success' : (item.completed) > 40 ? 'bg-warning' : 'bg-danger'))}"
											role="progressbar" style="width: ${item.completed}%" aria-valuenow="${item.completed}"
											aria-valuemin="0" aria-valuemax="100">${item.completed}%</div>
									</div>
									<span><strong>Meta: </strong> R$ <span class="money">${item.goal}</span></span><br />
									<span><strong>Realizado: </strong> R$ <span class="money">${item.currentGoal}</span></span>
								</div>
							</div>
							<hr>
						</div>
					`;
					counter++
				})

				$('#rankingTopItems').html(htmlTop);

				// mask
				$('#rankingTopItems .money').mask(window['globalSettings'].defaultMoneyMask, {reverse: true}).trigger('keyup');

				// vars definitions
				var rankingBottom = response['rankingBottom'];
				var htmlBottom = '';
				var counter = 5;

				// loopings
				$.each(rankingBottom, function(index, item){
					htmlBottom += `
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-2 text-center position">
									<h1>${counter}</h1>
								</div>
								<div class="col-md-10" style="font-size: 10px;">
									<h1 class="name text-center">${item.name}</h1>
									<div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-animated
										${(item.completed == 100 ? 'bg-success' : (item.completed > 80 ? 'bg-success' : (item.completed) > 40 ? 'bg-warning' : 'bg-danger'))}"
											role="progressbar" style="width: ${item.completed}%" aria-valuenow="${item.completed}"
											aria-valuemin="0" aria-valuemax="100">${item.completed}%</div>
									</div>
									<span><strong>Meta: </strong> R$ <span class="money">${item.goal}</span></span><br />
									<span><strong>Realizado: </strong> R$ <span class="money">${item.currentGoal}</span></span>
								</div>
							</div>
							<hr>
						</div>
					`;
					counter--;
				})
				$('#rankingBottomItems').html(htmlBottom);

				// mask
				$('#rankingBottomItems .money').mask(window['globalSettings'].defaultMoneyMask, {reverse: true}).trigger('keyup');

				// set height of Ranking Widget
				rankingHeight = $('#rankingTopItems').height();
				$('.ranking').height(rankingHeight);
			},
			error: (response) => {
				return console.error(response);
			}
		})
	}
</script>