<?php include "configpro.php"; ?>

<?php //php para obter a UFCD no Título da página
$UFCD = "";

if(isset($_GET["id"])){ //isset() - recebe uma variável, e diz-me se aquela variável existe naquele momento na minha página
    //1º passo - obter os dados
    $sql="SELECT UFCD FROM disciplinas WHERE id=?"; //consulta pré-feita

    if($stmt = mysqli_prepare($ligacao, $sql)){ //se consegui configurar corretamente a minha consulta pré-feita
        mysqli_stmt_bind_param($stmt, "i", $_GET["id"]); //associa os campos do formulário com a minha consulta pré-feita em sql ($sql)

        if(mysqli_stmt_execute($stmt)){ //se executei o SELECT
            $resultado = mysqli_stmt_get_result($stmt); //obtenho os dados do convidado, e coloco numa variável

            if(mysqli_num_rows($resultado) == 1){
                $linha = mysqli_fetch_array($resultado);

                $UFCD = $linha["UFCD"];

            }else{
                echo "A tua pesquisa não correu como esperado.";
            }
        }
    }else{
        echo "Alguma coisa correu mal, tentar mais tarde";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
    <title>Ver</title>
</head>
<body>
<div id="main">
    <div id="header">
        <div id="logo">
            <div id="logo_text">
                <br><br><br><br>
                <h1>UFCD:&nbsp<?php echo $UFCD ?></h1>
                <br><br>


                <?php //php para obter os trabalhos associados à UFCD selecionada
                    $sql="SELECT trabalhos.* FROM trabalhos INNER JOIN disciplinas ON trabalhos.IDUFC = disciplinas.ID WHERE disciplinas.ID = ?"; 

                    if($stmt = mysqli_prepare($ligacao, $sql)){ //se consegui configurar corretamente a minha consulta pré-feita

                        mysqli_stmt_bind_param($stmt, "i", $_GET["id"]); //associa os campos do formulário com a minha consulta pré-feita em sql ($sql)

                        if(mysqli_stmt_execute($stmt)){ //se executei o o SELECT
                            $resultado = mysqli_stmt_get_result($stmt); //obtenho os dados do trabalho, e coloco numa variávvel       
                        }  
                    }else{
                        echo "Alguma coisa correu mal, tentar mais tarde";
                    }
                ?>
             
                 <div id="content">
                    <div id="main">
                    <?php
                    
                    if($resultado){ 
                             
                        if (mysqli_num_rows($resultado) > 0){
                            
                            echo "<table>";
                            echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Trabalho</th>";
                            echo "</tr>";
                                
                            while($linha = mysqli_fetch_array($resultado)){
                                echo "<tr>";
                                echo "<td>" . $linha['ID'] . "</td>";
                                echo "<td>" . $linha['Trabalho'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                                
                            }else{
                                echo "<br>" . "<br>" . "<br>"; 
                                echo "Não existem dados a apresentar" . "<br>";
                            }
                        mysqli_stmt_close($stmt); //obriga a terminar o SELECT
                                
                        mysqli_close($ligacao); //encerra a ligação à  base de dados     
                        }
                        ?>
                    <a href="disciplinas.php">Voltar</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>