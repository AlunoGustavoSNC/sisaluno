<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ARRAY</title>
    <style>
    body{
        padding: 0;
        margin: 0;
        font-family: normal, sans-serif;
    }

    .aviso{
    height: 120px;
    background-color: #ff4242;
    color: white;
    box-shadow: 0 0 10px 5px #00000080;
   
    position: sticky;
    top: 0px;
    z-index: 2;
    font-size: 1.1em;

    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.aviso a{
    color: #ff4242;
    background-color: white;
    border-radius: 10px;
    text-decoration: none;
    padding: 0.5rem 1rem;
    transition: 0.5s;
}

.aviso a:hover{
    background-color: #ffdfdf;
    transition: 0.5s;
}

.aviso p:last-child:hover{
    transition: 0.5s;
    scale: 1.05;
}
    </style>
</head>

<body>
<div class="aviso">
        <p>Esse é apenas um site demonstrativo para a disciplina de programação de sistemas WEB. Para ver outras atividades clique no botão a seguir</p>
        <p><a href="atividades.html">Outras Atividades</a></p>
    </div>
    
    <h1>Arrays</h1>
    
<?php
   $IFbaiano=[
    'Gustavo'=> [
            'Banco-de-Dados'=>[
                    'avaliacao-01' => 10,
                    'avaliacao-02' => 6
            ],
            'ASW'=>[
                    'avaliacao-01' => 5,
                    'avaliacao-02' => 8
            ],
            
            'PSW'=>[
                    'avaliacao-01' => 7,
                    'avaliacao-02' => 8
            ],
            
            'Rede-de-Computadores'=>[
                    'avaliacao-01' => 3,
                    'avaliacao-02' => 10
            ]
        ]
   ];


    echo '<pre>';
    print_r($IFbaiano);
    echo '</pre>';

    foreach($IFbaiano as $aluno => $alunoValue){
        echo '<h2>' . $aluno . '</h2>';
        foreach($alunoValue as $materia => $materiaValue){
            echo '<h3>' . $materia . '</h3>';

            $i = 0;
            $media = [];

            foreach($materiaValue as $avaliacao => $avaliacaoValue){
                echo '<h4>' . $avaliacao . '</h4>';
                echo '<h4>' . $avaliacaoValue . '</h4>';

                $GLOBALS['media']; 

                $media[$i] = $avaliacaoValue;

                $i = 1;    
            }

            echo '<h4>' . 'Média: ' . '</h4>';

            $media[3] = ($media[0] + $media[1])/ 2;

            echo '<h4>' . $media[3] . '</h4>';
        }
    }
?>



</body>
</html>