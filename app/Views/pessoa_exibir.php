<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $titulo ?>
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

    <style>
        body {
            background-image: linear-gradient(45deg, #4158d0, #c850c0);
            height: 100vh;
            overflow: hidden;
            font-family: 'Raleway', sans-serif;
        }

        thead {
            background-color: #36304A;
        }

        tbody {
            background-color: #f5f5f5;
            color: #4c4c4c;
        }

        .even {
            background-color: #fff;
        }
    </style>
</head>

<body>
    <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('/js/bootstrap.min.js') ?>"></script>

    <div class="container d-flex flex-column justify-content-center align-items-center h-75">
        <table class="table table-hover table-curved" style="border-collapse: collapse; width:60%;">
            <thead class="text-white">
                <tr>
                    <th style="border-top-left-radius: 10px;" class="p-3 col-1 border-0 font">Código</th>
                    <th class="p-3 col-2 border-0">Nome</th>
                    <th style="border-top-right-radius: 10px;" class="p-3 col-2 border-0">Naturalidade</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($pessoas as $key => $pessoa): ?>
                    <?php
                    $style = '';
                    $class = ($key % 2 == 0) ? 'even' : 'odd';
                    if ($key === count($pessoas) - 1) {
                        $style = true;
                    }
                    ?>
                    <tr>
                        <td class="<?= $class ?>" style="<?= $style ? 'border-bottom-left-radius: 10px;' : '' ?>">
                            <?= $pessoa->id ?>
                        </td>
                        <td class="<?= $class ?>">
                            <?= $pessoa->nome ?>
                        </td>
                        <td class="<?= $class ?>" style="<?= $style ? 'border-bottom-right-radius: 10px;' : '' ?>">
                            <?= $pessoa->naturalidade ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="text-right" style="width:60%;">
            <button class="btn btn-success">Novo Registro</button>
        </div>
    </div>

</body>

</html>