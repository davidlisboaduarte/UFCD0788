<?php include "configpro.php"; ?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){ //verifica se a submissão foi efetuada através do método POST
        $sql = "DELETE FROM disciplinas WHERE id = ?";

        if($stmt = mysqli_prepare($ligacao, $sql)){ //se consegui configurar corretamente a minha consulta pré-feita
            mysqli_stmt_bind_param($stmt, "i", $_POST["id"]); //associa os campos do formulário com a minha consulta pré-feita em sql ($sql)
            
            if(mysqli_stmt_execute($stmt)){ //se executei o DELETE
                header("location: disciplinas.php"); //reencaminha para uma dada página
            }else{
                echo "Alguma coisa não correu direito.";
            }
        }
        mysqli_stmt_close($stmt); //obriga a terminar o DELETE
    }
    mysqli_close($ligacao); //estamos a fechar a ligação à base de dados
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Eliminar Convidado</title>
        <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
    </head>
    <body>
    <div id="main">
         <div id="header">
            <div id="logo">
                <div id="logo_text">
                    <h1>Eliminar Disciplina</h1>
                    <p>Está prestes a eliminar uma disciplina</p>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                        <br><br><br><br>
                        <h4>Tem a certeza que quer eliminar a disciplina?</h4>
                        <p>
                            <input type="submit" value="Sim">
                            <button><a href="disciplinas.php">Não</a></button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>