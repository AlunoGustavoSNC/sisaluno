<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gustavo Nascimento">

    <title>Cadastro de Aluno</title>
    <link rel="shortcut icon" href="../imagens/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="../estilos/style-modificador.css">
    <link rel="stylesheet" href="../estilos/formulario.css">
</head>
<body>
    <header class="menu">

        <!-- LOGO -->
        <div class="menu__container-logo">
            <img src="imagens/logo.png" alt="" class="menu__img-logo">

            <h1 class="menu__nome-logo">CURSOS <br> PREPARATORIOS</h1>
        </div>

        <!-- NAVBAR -->
        <ul class="menu__lista">
            <li class="menu__item"><a class="menu__link" href="../index.html">Início</a></li>

            <li class="menu__item menu__item--disabled">Sobre</li>

            <li class="menu__item menu__item--disabled">Planos</li>
        </ul>
    </header>
    <main>

    <?php
        require_once('../conexao.php');

        $id = $_POST['id'];

        ##sql para selecionar apens um aluno
        $sql = "SELECT * FROM Professor where id = :id";

        # junta o sql a conexao do banco
        $retorno = $conexao->prepare($sql);

        ##diz o paramentro e o tipo  do paramentros
        $retorno->bindParam(':id', $id, PDO::PARAM_INT);

        #executa a estrutura no banco
        $retorno->execute();

        #transforma o retorno em array
        $array_retorno = $retorno->fetch();

        ##armazena retorno em variaveis
        $nome = $array_retorno['nome'];
        $idade = $array_retorno['idade'];
        $cpf = $array_retorno['cpf'];
        $dataNascimento = $array_retorno['datanascimento'];
        $endereco = $array_retorno['endereco'];
        $estatus = $array_retorno['estatus'];

        ?>
        <section class="conteudo">

        
        <form class="conteudo__form-professor" action="crudprofessor.php" method="post">
            <h1 class="conteudo__titulo-form-aluno">Alteração de Professor</h1>

            <input type="hidden" name="id" id="" value="<?php echo $id ?>">
            <label for="nome">
                Nome:
                <input type="text" name="nome" required value="<?php echo $nome ?>" placeholder="Digite seu nome">
            </label>

            <label for="cpf">
                CPF:
                <input type="text" name="cpf" required value="<?php echo $cpf ?>" placeholder="Digite sua idade">
            </label>
            
            <label for="idade">
                Idade:
                <input type="text" name="idade" required value="<?php echo $idade ?>" placeholder="Digite sua idade">
            </label>
            
            <label for="datanascimento">
                Data de Nascimento:
                <input type="date" name="datanascimento" value="<?php echo $dataNascimento ?>" required>
            </label>
            
            <label for="endereco">
                Endereço: 
                <input type="text" name="endereco" required value="<?php echo $endereco ?>" placeholder="Ex: Rua Jacinto Pinto">
            </label>
            
            <label for="estatus">
                Status:
                <label for="">
                    <input type="radio" name="estatus" value="A" checked>
                    Ativo
                </label>
                <label for="">
                    <input type="radio" name="estatus" value="D">
                    Desativo
                </label>
            </label>
            
            <label for="button">
                <input type="submit" name="update" value="Alterar" class="conteudo__form-input--button">  
            </label>
        </form>
        </section>
    </main>
</body>
</html>