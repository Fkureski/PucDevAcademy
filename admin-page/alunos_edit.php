<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    $sql = "SELECT * FROM aluno_puc WHERE CPF = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["Nome"];
        $cpf = $row["CPF"];
        $ra = $row["Ra"];
        $email = $row["Email"];
        $telefone = $row["Telefone"];
    } else {
        echo "Usuário não encontrado.";
        exit();
    }
} else {
    header("Location: ../admin-page/alunos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/imagens/sinais-de-codigo.ico" type="image/x-icon" />
    <!-- Google Fonts - Saira condensed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS DO PROJETO -->
    <link rel="stylesheet" href="../admin-page/alunos_edit.css">
    <!-- JavaScript bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Editar Dados do Aluno</title>
</head>

<body>
    <div class="container-lg bg-color-black">
        <a href="../admin-page/admin_page.php" class="btn-voltar"><i class="bi bi-arrow-left"></i><span id="btnBack">Voltar</span></a>
        <div class="caixa">
            <h1 class="titulo">Editar Dados do Aluno</h1>
            <form id="editar" action="aluno_update.php" method="post">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="nome">Nome</label>
                        <input type="text" value="<?php echo htmlspecialchars($nome); ?>" class="form-control" id="nome" name="nome" pattern="(?:[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*[A-Za-zÀ-ÖØ-öø-ÿçÇ]){4}[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*" maxlength="50" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="cpf">CPF</label>
                        <input type="text" value="<?php echo htmlspecialchars($cpf); ?>" class="form-control" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="ra">RA</label>
                        <input type="text" value="<?php echo htmlspecialchars($ra); ?>" class="form-control" id="ra" name="ra" pattern="\d{8}" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="email">E-mail</label>
                        <input type="email" value="<?php echo htmlspecialchars($email); ?>" class="form-control" id="email" name="email" pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" maxlength="50" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="telefone">Telefone</label>
                        <input type="tel" value="<?php echo htmlspecialchars($telefone); ?>" class="form-control" id="tel" name="telefone" pattern="(\(\d{2}\) \d{5}-\d{4}|(\d{2} [89]\d{4}-\d{4}))" required>
                    </div>
                </div>
                <hr class="mt-4">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
</body>

</html>
