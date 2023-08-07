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
        $sql = "SELECT * FROM disciplina where id = :id";

        # junta o sql a conexao do banco
        $retorno = $conexao->prepare($sql);

        ##diz o paramentro e o tipo  do paramentros
        $retorno->bindParam(':id', $id, PDO::PARAM_INT);

        #executa a estrutura no banco
        $retorno->execute();

        #transforma o retorno em array
        $array_retorno = $retorno->fetch();

        ##armazena retorno em variaveis
        $nome = $array_retorno['nomedisciplina'];
        $ch = $array_retorno['ch'];
        $semestre = $array_retorno['semestre'];
        $idprofessor = $array_retorno['idprofessor'];

        ?>
        <section class="conteudo">


            <form class="conteudo__form-disciplina" action="cruddisciplina.php" method="post">
                <h1 class="conteudo__titulo-form-disciplina">Alteração de Aluno</h1>

                <input type="hidden" name="id" id="" value="<?php echo $id ?>">
                <label for="nome">
                    Nome:
                    <input type="text" name="nome" required value="<?php echo $nome ?>" placeholder="Digite seu nome">
                </label>

                <label for="ch">
                    CH:
                    <input type="text" name="ch" required value="<?php echo $ch ?>">
                </label>

                <label for="semestre">
                    Semestre:
                    <select name="semestre" id="" required>
                        <option value="1">1º semestre</option>
                        <option value="2">2º semestre</option>
                        <option value="3">3º semestre</option>
                        <option value="4">4º semestre</option>
                        <option value="5">5º semestre</option>
                        <option value="6">6º semestre</option>
                    </select>
                </label>

                <label for="professor">
                    Professor:
                    <select name="professor" id="" required>
                        <?php 
                            $retornoProfessor = $conexao -> prepare('SELECT id, nome FROM professor');
                            $retornoProfessor->execute();

                            foreach ($retornoProfessor->fetchall() as $value) { ?>
                        <option value="<?php echo $value['id'] ?>"> <?php echo $value['nome'] ?> </option>
                        <?php  }  ?>
                    </select>
                </label>

                <label for="button">
                    <br>
                    <input type="submit" name="update" value="Alterar" class="conteudo__form-input--button">
                </label>
            </form>
        </section>
    </main>
</body>

</html>