<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_completo = $con->real_escape_string($_POST['nome_completo']);
    $data_nascimento = $con->real_escape_string($_POST['data_nascimento']);
    $cpf_cnpj = $con->real_escape_string($_POST['cpf_cnpj']);
    $email = $con->real_escape_string($_POST['email']);
    $telefone = $con->real_escape_string($_POST['telefone']);
    $endereco_completo = $con->real_escape_string($_POST['endereco_completo']);
    $tipo_cliente = $con->real_escape_string($_POST['tipo_cliente']); 

    $sql = "INSERT INTO tbl_cliente (nome_cliente, data_nascimento, cpf_cnpj, tel_cliente, endereco_cliente, email_cliente, tipo_cliente)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("sssssss", $nome_completo, $data_nascimento, $cpf_cnpj, $telefone, $endereco_completo, $email, $tipo_cliente);

        if ($stmt->execute()) {
            echo "Novo Cliente Cadastrado";
        } else {
            echo "Erro ao cadastrar cliente: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao preparar consulta: " . $con->error;
    }
}

$con->close();
?>
