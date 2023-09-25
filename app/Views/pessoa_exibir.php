<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo $titulo ?>
  </title>
  <link rel="stylesheet" href="http://192.168.50.139/ttoledo/ads107/aulas/app/css/style.css" type="text/css">
</head>

<body>
  <div>
    <div>
      <h1>Listar todas as Pessoas</h1>
      <table>
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Naturalidade</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($pessoas as $pessoa): ?>
          <tr>
            <td>
              <?= $pessoa->id ?>
            </td>
            <td>
              <?= $pessoa->nome ?>
            </td>
            <td>
              <?= $pessoa->naturalidade ?>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>

  </div>

</body>

</html>