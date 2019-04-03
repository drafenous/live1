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

    <div class="row">
        <div class="col-md-6">
            <div class="card rounded-0" style="background-color: #4f8998">
                <div class="card-title">Metas Cadastradas</div>
                <div id="metasTotal" class="card-content text-center" style="font-size: 24px;">
                    Carregando
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card rounded-0" style="background-color: #f38630">
                <div class="card-title">Meta de Faturamento</div>
                <div id="valorTotal" class="card-content text-center" style="font-size: 24px;">
                    Carregando
                </div>
            </div>
        </div>
    </div>

    <hr>
    <table id="dtMetas" class="table display table-hover table-striped">
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
    $(document).ready(function(event) {
        table = $('#dtMetas').DataTable({
            ajax: {
                url: "<?= base_url('assets/src/json/metas.json'); ?>",
                dataType: 'JSON',
                dataSrc: 'metas',
                error: (response) => {
                    console.error(response);
                }
            },
            columns: [
                {data: "nome"},
                {data: "ramal"},
                {data: "tipo"},
                {data: "metaFaturamento", class: "money"},
                {data: "sugestao", class: "money"},
                {data: "status"}
            ],
            drawCallback: function() {
                // calcs
                var api = this.api();
                var sum = api.column(3).data().sum();
                var count = api.rows().count();

                // display results
                $('#metasTotal').html(count);
                $('#valorTotal').html(`R$ <span class="money">${sum}</span>`);

                $('#dtMetas th').removeClass('money');
                $('.money').mask("#.##0,00", {
                    reverse: true
                }).trigger('keyup');

                $('.dtUpdateButton').attr('disabled', false);
            }
        });
    })
</script> 