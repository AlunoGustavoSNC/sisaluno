<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAÇOS - GUSTAVO</title>
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
    <h1>LAÇOS</h1>
    <?php
        $Universidade = [
                'Informatica' => [
                    'Gustavo' => [
                        'Banco-de-Dados' => [
                            'nota-01' => [8],
                            'nota-02' => [7],
                            'nota-03' => [4]
                        ],

                        'Sistemas-Operacionais' => [
                            'nota-01' => [10],
                            'nota-02' => [5],
                            'nota-03' => [7]
                        ],

                        'Programacao' => [
                            'nota-01' => [4],
                            'nota-02' => [8],
                            'nota-03' => [6]
                        ]
                    ],

                    'Ezequiel' => [
                        'Banco-de-Dados' => [
                            'nota-01' => [3],
                            'nota-02' => [6],
                            'nota-03' => [10]
                        ],

                        'Sistemas-Operacionais' => [
                            'nota-01' => [7],
                            'nota-02' => [6],
                            'nota-03' => [9]
                        ],

                        'Programacao' => [
                            'nota-01' => [5],
                            'nota-02' => [9],
                            'nota-03' => [8]
                        ]
                    ],

                    'Victor Hugo' => [
                        'Banco-de-Dados' => [
                            'nota-01' => [6],
                            'nota-02' => [4],
                            'nota-03' => [7]
                        ],

                        'Sistemas-Operacionais' => [
                            'nota-01' => [10],
                            'nota-02' => [8],
                            'nota-03' => [6]
                        ],

                        'Programacao' => [
                            'nota-01' => [9],
                            'nota-02' => [4],
                            'nota-03' => [6]
                        ]
                    ],
                ],

                'Historia' => [
                    'Gustavo' => [
                        'Teorias-da-Historia' => [
                            'nota-01' => [8],
                            'nota-02' => [7],
                            'nota-03' => [4]
                        ],

                        'Historia-Antiga' => [
                            'nota-01' => [3],
                            'nota-02' => [6],
                            'nota-03' => [10]
                        ],

                        'Historia-Medieval' => [
                            'nota-01' => [7],
                            'nota-02' => [7],
                            'nota-03' => [9]
                        ]
                    ],

                    'Ruan' => [
                        'Teorias-da-Historia' => [
                            'nota-01' => [7],
                            'nota-02' => [7],
                            'nota-03' => [8]
                        ],

                        'Historia-Antiga' => [
                            'nota-01' => [5],
                            'nota-02' => [6],
                            'nota-03' => [10]
                        ],

                        'Historia-Medieval' => [
                            'nota-01' => [9],
                            'nota-02' => [4],
                            'nota-03' => [7]
                        ]
                    ],

                    'Valdir' => [
                        'Teorias-da-Historia' => [
                            'nota-01' => [3],
                            'nota-02' => [10],
                            'nota-03' => [5]
                        ],

                        'Historia-Antiga' => [
                            'nota-01' => [3],
                            'nota-02' => [5],
                            'nota-03' => [10]
                        ],

                        'Historia-Medieval' => [
                            'nota-01' => [3],
                            'nota-02' => [6],
                            'nota-03' => [7]
                        ]
                    ],
                ]
            
        ];

    //echo '<pre>';
    //print_r($Universidade);
    //echo '</pre>';

    echo '<h2> imprima o nome dos cursos </h2>';

    foreach($Universidade as $curso => $value){
        echo '<h3>' . $curso . '</h3>';
        echo '<br>';
    }

    echo '<h2> imprima o nome dos alunos </h2>';

    echo '<h3> Informárica</h3>';
    foreach($Universidade['Informatica'] as $nome => $value){
        echo $nome;
        echo '<br>';
    }

    echo '<h3> História </h3>';
     foreach($Universidade['Historia'] as $nome => $value){
        echo $nome;
        echo '<br>';
    }

     echo '<h2>Imprima o nomes das disciplinas</h2>';

    echo '<h3> Informárica</h3>';
    foreach($Universidade['Informatica']['Gustavo'] as $nome_disciplinas => $value){
        echo $nome_disciplinas;
        echo '<br>';
    }

    echo '<h3> História</h3>';
    foreach($Universidade['Historia']['Gustavo'] as $nome_disciplinas => $value){
        echo $nome_disciplinas;
        echo '<br>';
    }

    echo'<h2>Imprima os alunos com disciplinas e notas</h2>';
    
    foreach ($Universidade as $curso => $valueCurso){
        echo '<h2>' . $curso . '</h2>';  
        foreach ($valueCurso as $aluno => $valueAluno){
            echo '<h3>' . $aluno . '</h3>'; 
            foreach ($valueAluno as $materia => $valueMateria){
                echo '<h4>' . $materia . '</h4>';
                echo '<br>';
                foreach ($valueMateria as $nota => $valueNota){
                    echo '<h4>' . $nota;
                    foreach ($valueNota as $valor){
                        echo ' = ' . $valor . '</h4>';
                    };
                    echo '<br>';
                };
            };
        };
    };
    ?>
</body>
</html>