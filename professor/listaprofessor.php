<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="shortcut icon" href="../imagens/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="../estilos/style-modificador.css">
    <link rel="stylesheet" href="../estilos/hp-style.css">
    <link rel="stylesheet" href="../estilos/tabela.css">
</head>
<body>
<header class="menu">

<!-- LOGO -->
<div class="menu__container-logo">
    <img src="../imagens/logo.png" alt="" class="menu__img-logo">

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
            /* Melhor prática usando Prepared Statements */
            require_once('../conexao.php');
   
            $retorno = $conexao->prepare('SELECT * FROM Professor');
            $retorno->execute();
        ?>

        <section>
            <table> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>IDADE</th>
                        <th>DATA DE NASCIMENTO</th>
                        <th>ENDEREÇO</th>
                        <th>STATUS</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php foreach($retorno->fetchall() as $value) { ?>
                            <tr>
                                <td> <?php echo $value['id'] ?>   </td> 
                                <td> <?php echo $value['nome']?>  </td> 
                                <td> <?php echo $value['cpf']?>  </td> 
                                <td> <?php echo $value['idade']?> </td> 
                                <td> <?php echo $value['datanascimento']?> </td> 
                                <td> <?php echo $value['endereco']?> </td> 
                                <td> <?php echo $value['estatus']?> </td>  

                                <td class="button">
                                   <form method="POST" action="altprofessor.php">
                                            <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                            <button name="alterar"  type="submit">Alterar</button>
                                    </form>

                                 </td> 

                                 <td class="button">
                                   <form method="GET" action="crudprofessor.php">
                                            <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                            <button name="excluir"  type="submit">Excluir</button>
                                    </form>

                                 </td> 


                        
                            </tr>
                        <?php  }  ?> 
                    </tr>
                </tbody>
            </table>
        </section> 
    </main>
    <footer class="rodape">
        <p>GUSTAVO NASCIMENTO</p>
        <p>gustavosncosta@gmail.com</p>
        <br>
        <P>IF BAIANO | CAMPUS GUANAMBI</P>
    </footer> 
</body>
</html>