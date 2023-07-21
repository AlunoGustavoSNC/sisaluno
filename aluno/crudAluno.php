<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="formulario.css">
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
        <section>
            <?php
                ##permite acesso as variaves dentro do aquivo conexao
                require_once('conexao.php');

                ##cadastrar
                if(isset($_GET['cadastrar'])){
                
                ##dados recebidos pelo metodo GET
                $nome = $_GET["nome"];
                $idade = $_GET["idade"];
                $dataNascimento = $_GET["dataNascimento"];
                $endereco = $_GET["endereco"];
                $estatus = $_GET["estatus"];
                $matricula = $_GET["matricula"];
        
                ##codigo SQL
                $sql = "INSERT INTO Aluno(nomeAluno, idade, dataNascimento, endereco, estatus, matricula) 
                VALUES('$nome', '$idade', '$dataNascimento', '$endereco', '$estatus', '$matricula')";
                ##junta o codigo sql a conexao do banco
                $sqlcombanco = $conexao->prepare($sql);
        
                ##executa o sql no banco de dados
                if($sqlcombanco->execute())
                    {
                        echo "<p>O aluno <strong>$nome</strong> foi cadastrado com sucesso! </p> <br>"; 
                        echo " <a href='index.html'>voltar</a>";
                    }
                }
                #######alterar
                if(isset($_POST['update'])){
                
                    ##dados recebidos pelo metodo POST
                    $nome = $_POST["nome"];
                    $idade = $_POST["idade"];
                    $dataNascimento = $_POST["dataNascimento"];
                    $endereco = $_POST["endereco"];
                    $estatus = $_POST["estatus"];
                    $matricula = $_POST["matricula"];
                    $id = $_POST["id"];
                
                      ##codigo sql
                    $sql = "UPDATE  Aluno SET nomeAluno = :nome, idade = :idade, dataNascimento = :dataNascimento, endereco = :endereco, estatus = :estatus, matricula = :matricula WHERE idAluno= :id ";
                
                    ##junta o codigo sql a conexao do banco
                    $stmt = $conexao->prepare($sql);
                
                    ##diz o paramentro e o tipo  do paramentros
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
                    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
                    $stmt->bindParam(':dataNascimento', $dataNascimento, PDO::PARAM_STR);
                    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
                    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_BOOL);
                    $stmt->bindParam(':matricula', $matricula, PDO::PARAM_INT);
                    $stmt->execute();
                
                    if($stmt->execute())
                    {
                        echo "<p>O aluno <strong>$nome</strong> foi alterado com sucesso! </p> <br>"; 
                        echo " <a href='index.html'>voltar</a>";
                    }
                    
                }        


                ##Excluir
                if(isset($_GET['excluir'])){
                    $id = $_GET['id'];
                    $sql ="DELETE FROM `aluno` WHERE idAluno= {$id}";
                    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
                    $stmt = $conexao->prepare($sql);
                    $stmt->execute();
                
                    if($stmt->execute())
                    {
                        echo "<p>O aluno <strong>$id</strong> foi excluido com sucesso! </p> <br>"; 
                        echo " <a href='index.html'>voltar</a>";
                    }
                    
                }       
            ?>
        </section>
    </main>
    <footer>
        <p>GUSTAVO NASCIMENTO</p>
        <P>IF BAIANO | CAMPUS GUANAMBI</P>
    </footer> 
</body>
</html>