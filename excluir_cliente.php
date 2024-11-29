<?php
// Conexão com o banco de dados
$con = new mysqli("localhost", "root", "", "db_amip");

if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}

// Obter o ID do cliente a ser excluído
if (isset($_POST['id_cliente'])) {
    $id = intval($_POST['id_cliente']);

    // Excluir o cliente
    $sql = "DELETE FROM tbl_cliente WHERE id_cliente = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Cliente excluído com sucesso!";
    } else {
        echo "Erro ao excluir o cliente: " . $con->error;
    }
}

// Redirecionar de volta para a lista
header("Location: listar_clientes.php");
exit();
