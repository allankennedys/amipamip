<?php
// Conexão com o banco de dados
$con = new mysqli("localhost", "root", "", "db_amip");

if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}

// Consultar clientes
$sql = "SELECT * FROM tbl_cliente";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
    <link rel="icon" href="assets/amipSUN.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet"></link>

</head>
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary w=100 fixed-top">
        <div class="container-fluid">
          <img class="logoNav" src="assets/amipBlue.png" alt="Logotipo AMIP">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold ms-auto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      PORTAL DO VENDEDOR
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Registrar Nova Venda</a></li>
                      <li><a class="dropdown-item" href="#">Registrar Instalação</a></li>
                      <li><a class="dropdown-item" href="index.html">Cadastrar Novo Cliente</a></li>
                      <li><a class="dropdown-item" href="#">Consultar Vendas</a></li>
                      <li><a class="dropdown-item" href="#">Consultar Clientes</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</header>
    
<body>
    <div class="container mt-5 lista">
        <h1 style="color: white;">Lista de Clientes</h1>
        <table class="table table-striped" style="padding: 100px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id_cliente'] ?></td>
                        <td><?= $row['nome_cliente'] ?></td>
                        <td><?= $row['email_cliente'] ?></td>
                        <td><?= $row['tel_cliente'] ?></td>
                        <td>
                            <form action="excluir_cliente.php" method="POST" style="display: inline;">
                                <input type="hidden" name="id_cliente" value="<?= $row['id_cliente'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
