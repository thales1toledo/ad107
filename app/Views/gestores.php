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

    <style>
        body {
            background-color: #bbb;
            height: 100vh;
            overflow: hidden;
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
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                    <th class="p-3 col-2 border-0">Cargo</th>
                    <th style="border-top-right-radius: 10px;" class="p-3 col-1 border-0"></th>
                </tr>
            </thead>

            <tbody>
                <?php if (!$gestores) {
                    echo '<tr>
                    <td colspan="6" class="text-center py-4">Nenhum registro encontrado</td>
                    </tr>';
                } ?>
                <?php foreach ($gestores as $key => $gestor): ?>
                    <tr>
                        <td class="text-center">
                            <?= $gestor->gestor_id ?>
                        </td>
                        <td>
                            <?= $gestor->nome ?>
                        </td>
                        <td>
                            <?= $gestor->cargo ?>
                        </td>
                        <td class="text-center">
                            <a href="<?= 'gestor-delete/' . $gestor->gestor_id ?>" class="btn btn-danger btn-sm m-auto"
                                title="Apagar" id="deleteBtn"
                                onclick="return confirm('Tem certeza que deseja excluir este registro?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="text-right" style="width:60%; display: none;">
            <?php echo anchor('public/register', 'Novo Registro', 'class="btn btn-success"'); ?>
        </div>
        <div class="text-right mt-3">
            <button id="openModalBtn" class="btn btn-success">Novo Registro</button>
        </div>
    </div>

</body>

<div id="myModal" class="modal">
    <div class="modal-content" style="width: 30%; background-color: rgba(255, 255, 255, .95);">
        <span class="close text-right">&times;</span>
        <form id="registroForm" method="post" enctype="multipart/form-data"
            action="<?= base_url('register-gestor'); ?>">
            <div id="groupInput" class="p-3">
                <h5>Insira os dados</h5>
                <div id="inputBox">
                    <span>Nome do Gestor</span>
                    <input type="text" name="nome">
                </div>
                <div id="inputBox">
                    <span>Cargo</span>
                    <input type="text" name="cargo">
                </div>
                <div class="w-100 text-right">
                    <input type="submit" name="register" class="btn btn-success" value="Salvar" />
                </div>
            </div>
        </form>
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
                url: "<?= base_url('public/register-gestor'); ?>",
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