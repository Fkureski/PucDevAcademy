<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_GET['cnpj'])) {
    $cnpj = $_GET['cnpj'];

    $sql = "SELECT * FROM Empresa WHERE CNPJ = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cnpj);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome_empresa = $row["Nome_empresa"];
        $nome_fantasia = $row["Nome_fantasia"];
        $ramo_empresarial = $row["Ramo_empresarial"];
        $telefone = $row["Telefone"];
    } else {
        echo "Empresa não encontrada.";
        exit();
    }
} else {
    header("Location: ../admin-page/empresas.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmacao'])) {
    $sql_delete = "DELETE FROM Empresa WHERE CNPJ = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("s", $cnpj);
    $stmt_delete->execute();

    header("Location: ../admin-page/admin_page.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Exclusão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Confirmação de Exclusão</h1>
        <p>Você está prestes a excluir a empresa:</p>
        <ul>
            <li><strong>Nome da Empresa:</strong> <?php echo $nome_empresa; ?></li>
            <li><strong>Nome Fantasia:</strong> <?php echo $nome_fantasia; ?></li>
            <li><strong>Ramo Empresarial:</strong> <?php echo $ramo_empresarial; ?></li>
            <li><strong>Telefone:</strong> <?php echo $telefone; ?></li>
        </ul>
        <p>Deseja realmente prosseguir com a exclusão?</p>
        <form method="post">
            <input type="hidden" name="confirmacao" value="confirmado">
            <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
            <a href="admin_page.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

