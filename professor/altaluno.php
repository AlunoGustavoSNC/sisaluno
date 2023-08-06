<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALTERAR ALUNO</title>
    <link rel="stylesheet" href="formulario.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>CURSOS PREPARATORIOS</h1>
        <ul>
            <li><a href="index.html">Início</a></li>
            <li>Sobre</li>
            <li>Planos</li>
        </ul>
    </header>
    <main>
<?php
  require_once('conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM Aluno where idAluno = :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nomeAluno'];
   $idade = $array_retorno['idade'];
   $dataNascimento = $array_retorno['dataNascimento'];
   $endereco = $array_retorno['endereco'];
   $estatus = $array_retorno['estatus'];
   $matricula = $array_retorno['matricula'];

?>

  <form method="POST" action="crudAluno.php">
    <h2>ALTERAR ALUNO</h2>

    <input type="hidden" name="id" id="" value="<?php echo $id ?>" >
    
    <label for="nome"> Nome: </label>
    <input type="text" name="nome" id="" value="<?php echo $nome?>" >
    
    <label for="idade"> Idade: </label>
    <input type="text" name="idade" id="" value="<?php echo $idade?>" >
    
    <label for="dataNascimento"> Data de Nascimento: </label>
    <input type="date" name="dataNascimento" id="" value="<?php echo $dataNascimento ?>" >

    <label for="endereco"> Endereço: </label>
    <input type="text" name="endereco" id="" value="<?php echo $endereco ?>" >
    
    <label for="estatus"> Status: </label>
    <input type="text" name="estatus" id="" value="<?php echo $estatus ?>" >

    <label for="matricula"> matrÍcula: </label>
    <input type="text" name="matricula" id="" value="<?php echo $matricula ?>" >
      
    <input type="submit" name="update" value="Alterar">
  </form>
    </main>
    <footer>
        <p>GUSTAVO NASCIMENTO</p>
        <P>IF BAIANO | CAMPUS GUANAMBI</P>
    </footer>
</body>
</html>