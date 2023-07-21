<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <header>
        <h1>CURSOS PREPARATORIOS</h1>
        <ul>
            <li><a href="#">Início</a></li>
            <li>Sobre</li>
            <li>Planos</li>
        </ul>
    </header>
    <main>
        <?php 
            /* Melhor prática usando Prepared Statements */
            require_once('conexao.php');
   
            $retorno = $conexao->prepare('SELECT * FROM aluno');
            $retorno->execute();
        ?>

        <section>
            <table> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>IDADE</th>
                        <th>DATA DE NASCIMENTO</th>
                        <th>ENDEREÇO</th>
                        <th>STATUS</th>
                        <th>MATRÍCULA</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php foreach($retorno->fetchall() as $value) { ?>
                            <tr>
                                <td> <?php echo $value['idAluno'] ?>   </td> 
                                <td> <?php echo $value['nomeAluno']?>  </td> 
                                <td> <?php echo $value['idade']?> </td> 
                                <td> <?php echo $value['dataNascimento']?> </td> 
                                <td> <?php echo $value['endereco']?> </td> 
                                <td> <?php echo $value['estatus']?> </td> 
                                <td> <?php echo $value['matricula']?> </td> 

                                <td>
                                   <form method="POST" action="altaluno.php">
                                            <input name="id" type="hidden" value="<?php echo $value['idAluno'];?>"/>
                                            <button name="alterar"  type="submit">Alterar</button>
                                    </form>

                                 </td> 

                                 <td>
                                   <form method="GET" action="crudaluno.php">
                                            <input name="id" type="hidden" value="<?php echo $value['idAluno'];?>"/>
                                            <button name="excluir"  type="submit">Excluir</button>
                                    </form>

                                 </td> 


                        
                            </tr>
                        <?php  }  ?> 
                    </tr>
                </tbody>
            </table>
            <?php         
                echo "<a class='btn' href='index.html'>voltar</a>";
            ?>
        </section> 
    </main>
    <footer>
        <p>GUSTAVO NASCIMENTO</p>
        <P>IF BAIANO | CAMPUS GUANAMBI</P>
    </footer> 
</body>
</html>