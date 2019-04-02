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
                        <input type="file" class="custom-file-input" id="upload-file"
                            aria-describedby="inputGroupFileAddon">
                        <label class="custom-file-label" for="upload-file">Escolher Arquivo</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button" id="inputGroupFileAddon">Enviar Arquivo <i
                                class="fas fa-upload"></i></button>
                        <button class="btn btn-primary" type="button" id="inputGroupFileAddon">Exemplo de Arquivo <i
                                class="fas fa-download"></i></button>
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
            <?php for($i = 0; $i <= 100; $i++){ ?>
            <tr>
                <td>Rodrigo</td>
                <td>7001</td>
                <td>SP</td>
                <td>R$ <span class="money">1000<span></td>
                <td>R$ <span class="money">1000<span></td>
                <td>Com Sono</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<script>
    $(document).ready(function (event) {
        table = $('#dtMetas').DataTable({
            drawCallback: function () {
                // calcs
                var api = this.api();
                var sum = api.column(3).data().sum();
                var count = api.rows().count();

                // display results
                $('#metasTotal').html(count);
                $('#valorTotal').html(`R$ <span class="money">${sum}</span>`);
                $('.money').mask("#.##0,00", { reverse: true }).trigger('keyup');
            }
        });
    })
</script>