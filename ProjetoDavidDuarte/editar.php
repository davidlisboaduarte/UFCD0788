<?php include "configpro.php"; ?>

<?php
$UFC = $UFCD = $Horas = "";

if(isset($_GET["id"])){ //isset() - recebe uma variável, e diz-me se aquela variável existe naquele momento na minha página
    //1º passo - obter os dados
    $sql="SELECT UFC, UFCD, Horas FROM disciplinas WHERE id=?"; //consulta pré-feita

    if($stmt = mysqli_prepare($ligacao, $sql)){ //se consegui configurar corretamente a minha consulta pré-feita
        mysqli_stmt_bind_param($stmt, "i", $_GET["id"]); //associa os campos do formulário com a minha consulta pré-feita em sql ($sql)

        if(mysqli_stmt_execute($stmt)){ //se executei o SELECT
            $resultado = mysqli_stmt_get_result($stmt); //obtenho os dados do convidado, e coloco numa variável

            if(mysqli_num_rows($resultado) == 1){
                $linha = mysqli_fetch_array($resultado);

                $UFC = $linha["UFC"];
                $UFCD = $linha["UFCD"];
                $Horas = $linha["Horas"];
            }else{
                echo "A tua pesquisa não correu como esperado.";
            }
        }
    }else{
        echo "Alguma coisa correu mal, tentar mais tarde";
    }
}else{
    if(isset($_POST["id"])){ //isset() - recebe uma variável, e diz-me se aquela variável existe naquele momento na minha página
        //2º passo - alterar os dados
        if($_SERVER["REQUEST_METHOD"] == "POST"){ //verifica se a submissão foi efetuada através do método POST
            //antes do que vou escrever, deveria-se validar os dados
    
            $sql = "UPDATE disciplinas SET UFC=?, UFCD=?, Horas=? WHERE id=?"; //consulta pré-feita
            
            if($stmt = mysqli_prepare($ligacao, $sql)){ //se consegui configurar corretamente a minha consulta pré-feita
                mysqli_stmt_bind_param($stmt, "sssi", $_POST["UFC"], $_POST["UFCD"], $_POST["Horas"], $_POST["id"]); //associa os campos do formulário com a minha consulta pré-feita em sql ($sql)
    
                if(mysqli_stmt_execute($stmt)){ //se executei o UPDATE
                    header("location: disciplinas.php"); //reencaminha para uma dada página
                }else{
                    echo "Alguma coisa não correu direito.";
                }
            }

            mysqli_stmt_close($stmt); //obriga a terminar o UPDATE
    
            mysqli_close($ligacao); //estamos a fechar a ligação à base de dados
        }
       
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Editar Disciplina</title>
        <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
    </head>
    <body>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <div id="logo_text">
                        <h4>EDITAR&nbsp<?php echo $UFC  . " " . $UFCD ?></h4>
                        <h3>Por favor, edite os dados da disciplina</h3>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <br><br><br><br><br><br>
                        <div>
                            <label>UFC:</label>
                            <input type="text" value="<?php echo $UFC; ?>" name="UFC" required />
                        </div>
                        <div>
                            <label>UFCD:</label>
                            <input type="text" value="<?php echo $UFCD; ?>" name="UFCD" required />
                        </div>
                        <div>
                            <label>Carga horária:</label>
                            <input type="text" value="<?php echo $Horas; ?>" name="Horas">
                        </div>
                            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                            <br>
                            <input type="submit" value="Submeter">
                            <button><a href="disciplinas.php">Cancelar</a></button>
                        </form>
                    </div>
                </div>
             </div>
        </div>
    </body>
    </html>