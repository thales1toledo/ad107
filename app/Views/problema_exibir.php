<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $titulo ?? 'PHP - CodeIgniter' ?>
    </title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/php.png'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #bbb;
            height: 100vh;
            overflow: auto;
            font-family: 'Raleway', sans-serif;
        }

        thead {
            background-color: #205887;
        }

        tbody {
            background-color: #f5f5f5;
            color: #4c4c4c;
        }

        h5 {
            color: #5e596e;
            font-weight: 600;
        }

        #groupInput {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        #inputBox {
            margin-bottom: 15px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        #inputBox textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            resize: vertical;
            /* Permite a redimensionamento vertical do textarea */
        }

        .table-curved td {
            max-width: 350px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            word-wrap: break-word;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            padding: 20px;
            box-sizing: border-box;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        #myModalInfo .modal-body p {
            word-wrap: break-word;
            white-space: pre-line;
        }
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url('/js/bootstrap.min.js') ?>"></script>
    <script>
        $(document).ready(function () {
            $("#openModalBtn").click(function () {
                $("#myModal").css("display", "flex");
            });

            $(".close").click(function () {
                $("#myModal").css("display", "none");
            });
        });
    </script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('assets/univicosa.png'); ?>" src="/docs/4.1/assets/brand/bootstrap-solid.svg"
                width="190" class="d-inline-block align-top" alt="">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin: auto;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="exibirproblema">Problemas <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='exibirgestores'>Gestores</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container d-flex flex-column w-50 mt-5">
        <table class="table table-hover table-curved scrollable-table m-auto">
            <thead class="text-white">
                <tr>
                    <th style="border-top-left-radius: 10px;" class="p-3 col-1 border-0 font">Código</th>
                    <th class="p-3 col-2 border-0">Nome</th>
                    <th class="p-3 col-2 border-0">Localização</th>
                    <th class="p-3 col-2 border-0">Descrição</th>
                    <th class="p-3 col-2 border-0">Gestor</th>
                    <th style="border-top-right-radius: 10px;" class="p-3 col-2 border-0"></th>
                </tr>
            </thead>

            <tbody>
                <?php if (!$problemas) {
                    echo '<tr>
                    <td colspan="6" class="text-center py-4">Nenhum registro encontrado</td>
                    </tr>';
                } ?>
                <?php foreach ($problemas as $key => $problema): ?>
                    <tr>
                        <td class="text-center">
                            <?= $problema->id ?>
                        </td>
                        <td>
                            <?= $problema->nome ?>
                        </td>
                        <td>
                            <?= $problema->localizacao ?>
                        </td>
                        <td>
                            <?= $problema->descricao ?>
                        </td>
                        <td>
                            <?php $gestor = $gestorModel->find($problema->gestor_id); ?>
                            <?= $gestor->nome ?>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModalInfo"
                                onclick="openModal('<?= $problema->nome ?>', '<?= $problema->localizacao ?>', '<?= addslashes($problema->descricao) ?>', '<?= $gestor->nome ?>')"
                                title="Exibir">
                                <i class="fas fa-eye"></i>
                            </button>
                            <a href="<?= 'problema-delete/' . $problema->id ?>" class="btn btn-danger btn-sm" title="Apagar"
                                id="deleteBtn" onclick="return confirm('Tem certeza que deseja excluir este registro?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="text-right mt-3"> <!-- Adicionado mt-3 aqui -->
            <button id="openModalBtn" class="btn btn-success">Novo Registro</button>
        </div>
    </div>
    <script>
        function openModal(nome, localizacao, descricao, gestor) {
            document.getElementById('modal-nome').innerText = nome;
            document.getElementById('modal-localizacao').innerText = localizacao;
            document.getElementById('modal-descricao').innerText = descricao;
            document.getElementById('gestor-nome').innerText = gestor;
        }
    </script>
</body>

<!-- Modal para inserir registro -->
<div id="myModal" class="modal">
    <div class="modal-content" style="width: 30%; background-color: rgba(255, 255, 255, .95);">
        <span class="close text-right">&times;</span>
        <form id="registroForm" method="post" enctype="multipart/form-data" action="<?= base_url('register'); ?>">
            <div id="groupInput" class="p-3">
                <h5>Insira os dados</h5>
                <div id="inputBox">
                    <span>Nome do Ambiente</span>
                    <input type="text" name="nome">
                </div>
                <div id="inputBox">
                    <span>Localização</span>
                    <input type="text" name="Localizacao">
                </div>
                <div id="inputBox">
                    <span>Descrição do Problema</span>
                    <textarea name="Descricao" rows="4" cols="50" maxlength="255"></textarea>
                </div>
                <div id="inputBox">
                    <span>Gestor Responsável</span>
                    <?= form_dropdown('gestor_id', $options, '1', 'class="form-control"') ?>
                </div>
                <div class="w-100 text-right">
                    <input type="submit" name="register" class="btn btn-success" value="Salvar" />
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal para exibir informações -->
<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes do Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Coloque as informações específicas aqui -->
                <p><strong>Nome:</strong>
                    <span id="modal-nome"></span>
                </p>
                <p><strong>Localização:</strong>
                    <span id="modal-localizacao"></span>
                </p>
                <p><strong>Descrição:</strong>
                    <span id="modal-descricao"></span>
                </p>
                <p><strong>Gestor:</strong>
                    <span id="gestor-nome"></span>
                </p>
                <!-- Adicione mais campos conforme necessário -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        console.log('teste');
        $("#registroForm").submit(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "<?= base_url('public/register'); ?>",
                data: formData,
                success: function (response) {
                    $("#myModal").css("display", "none");
                    location.reload();
                }
            });
        });
    });
</script>

</html>