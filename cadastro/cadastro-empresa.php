<?php
session_start();
include("../conexaobd/conexao.php");
if (isset($_SESSION['emailcolaborador']) || isset($_SESSION['emailempresa'])) {
    header("Location: ../homepage/index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/sinais-de-codigo.ico" type="image/x-icon"/>
    <!-- Google Fonts - Saira condensed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS DO PROJETO -->
    <link rel="stylesheet" href="cadastro-style.css">
    <!-- JavaScript bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Cadastro para Empresas</title>
</head>
<body style="background-color: #171810;">
   
    <div class="container-lg">
        <a href="../login/login.php" class="btn-voltar" ><i class="bi bi-arrow-left"></i><span id="btnBack">Voltar</span></a>
        <div class="caixa">
                    <h1 class="titulo">Cadastro para Empresas</h1>
                    <form id="registrar" action="cadastro-bd.php" method="post">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="nomeEmpresa">Nome da Empresa</label>
                                <span class="mensagem" id="mensagem-nomeEmpresa"></span>
                                <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa" pattern="^.{4,}" required maxlength="100">
                            </div>
                            <div class="col-lg-6">
                                <label for="nomeFic">Nome Fictício (Opcional)</label>
                                <span class="mensagem" id="mensagem-nomeFic"></span>
                                <input type="text" class="form-control" id="nomeFic" name="nomeFic" maxlength="100">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="cnpj">CNPJ</label>
                                <span class="mensagem" id="mensagem-cnpj"></span>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" pattern="\d{2}\.\d{3}\.\d{3}/000[1-2]-\d{2}" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="ramo">Ramo Empresarial</label>
                                <span class="mensagem" id="mensagem-ramo"></span>
                                <input type="text" class="form-control" id="ramo" name="ramo" pattern="(?:[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*[A-Za-zÀ-ÖØ-öø-ÿçÇ]){2}[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*" required maxlength="100">
                            </div>
                            <div class="col-lg-4">
                                <label for="tel">Telefone</label>
                                <span class="mensagem" id="mensagem-tel"></span>
                                <input type="text" class="form-control" id="tel" name="tel" pattern="(\(\d{2}\) \d{5}-\d{4}|(\d{2} [89]\d{4}-\d{4}))" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="nomeRepresentante">Representante</label>
                                <span class="mensagem" id="mensagem-nomeRepresentante"></span>
                                <input type="text" class="form-control" id="nomeRepresentante" name="nomeRepresentante" pattern="(?:[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*[A-Za-zÀ-ÖØ-öø-ÿçÇ]){4}[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*" required maxlength="50">
                            </div>
                            <div class="col-lg-4">
                                <label for="cpf">CPF</label>
                                <span class="mensagem" id="mensagem-cpf"></span>
                                <input type="text" class="form-control" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="cargo">Cargo</label>
                                <span class="mensagem" id="mensagem-cargo"></span>
                                <input type="text" class="form-control" id="cargo" name="cargo" pattern="(?:[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*[A-Za-zÀ-ÖØ-öø-ÿçÇ]){2}[A-Za-zÀ-ÖØ-öø-ÿçÇ\s]*" required maxlength="50">
                            </div>
                        </div>
                        <hr id="linhaCentral">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="email">Email</label>
                                <span class="mensagem" id="mensagem-email"></span>
                                <input type="text" class="form-control" id="email" name="email" pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" required maxlength="50">
                            </div>
                            <div class="col-lg-6">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="senha">Senha</label>
                                <span class="mensagem" id="mensagem-senha"></span>
                                <input type="password" class="form-control" id="senha" name="senha" pattern="^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$" required maxlength="50">
                                <span id="descsenha">6 caracteres (uma letra maiúscula e um número)</span>
                            </div>
                            <div class="col-lg-6">
                                <label for="confirmarSenha">Confirmar Senha</label>
                                <span class="mensagem" id="mensagem-confirmarSenha"></span>
                                <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" maxlength="50">
                            </div>
                        </div>
                        <div class="btn-criar">
                            <button class="criarConta" type="submit" onclick="enviar()">Cadastrar <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../cadastro/validacao.js"></script>
</body>
</html>

