<?php include "configpro.php"; ?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){ //verifica se a submissão foi efetuada através do método POST
        //antes do que vou escrever, deveria-se validar os dados

        $sql = "INSERT INTO disciplinas (ID, UFC, UFCD, Horas) VALUES (?, ?, ?, ?)"; //consulta pré-feita

        if($stmt = mysqli_prepare($ligacao, $sql)){ //se consegui configurar corretamente a minha consulta pré-feita
            mysqli_stmt_bind_param($stmt, "isss", $_POST["ID"], $_POST["UFC"], $_POST["UFCD"], $_POST["Horas"]); //associa os campos do formulário com a minha consulta pré-feita em sql ($sql)


            if(mysqli_stmt_execute($stmt)){ //se executei o INSERT
                header("location: disciplinas.php"); //reencaminha para uma dada página
            }else{
                echo "Alguma coisa não correu direito.";
            }
        }

        mysqli_stmt_close($stmt); //obriga a terminar o INSERT
    }
?>

<!DOCTYPE html>
<html>

<head>
  <title>Disciplinas</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="disciplinas.php"><span class="logo_colour">Disciplinas</span></a></h1>
          <h2>Formação Modular</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="homepage.php">Home</a></li>
          <li><a href="curso.php">Curso</a></li>
          <li class="selected"><a href="disciplinas.php">Disciplinas</a></li>
          <li><a href="trabalhos.php">Trabalhos</a></li>
          <li><a href="contactos.php">Contactos</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h2>Inserir nova UFCD</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="formside">
            <p><span>UFC: &nbsp</span><input class="contact" type="text" name="UFC" value="" required /></p>
            <p><span>UFCD:</span><input class="contact" type="text" name="UFCD" value="" required /></p>
            <p><span>Carga Horária:</span><input class="contact" type="text" name="Horas" value="" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submeter" /></p>
          </div>
        </form>
      </div>
      <div id="content">
<?php

$sql="SELECT * FROM `disciplinas`"; //devolver toda a informaçao de todos as disciplinas

$resultado = mysqli_query($ligacao, $sql); //devolver o resultado de uma pesquisa "$sql", numa base de dados à qual estamos ligados

if($resultado){ // se foi possivel executar a consulta SQL
   $numeroLinhas = mysqli_num_rows($resultado);

   if($numeroLinhas > 0){
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>UFC</th>";
        echo "<th>UFCD</th>";
        echo "<th>Horas</th>";
        echo "<th>Trabalhos</th>";
        echo "<th>Editar</th>";
        echo "<th>Eliminar</th>";
        echo "</tr>";
      
        while($linha = mysqli_fetch_array($resultado)){ //enquanto eu tiver dados
            echo "<tr>";
            echo "<td>" . $linha['ID'] . "</td>";
            echo "<td>" . $linha['UFC'] . "</td>";
            echo "<td>" . $linha['UFCD'] . "</td>";
            echo "<td>" . $linha['Horas'] . "</td>";
            echo "<td><a href='ver.php?id=" . $linha['ID'] . "'>Ver trabalhos</a></td>";
            echo "<td><a href='editar.php?id=" . $linha['ID'] . "'>Editar</a></td>";
            echo "<td><a href='apagar.php?id=" . $linha['ID'] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
        echo"</table>";
   }else{
       echo "Não existem dados a apresentar";
   }

}else{
    echo "ERRO! Não consegui executar a consulta SQL!" . mysqli_error($ligacao);
}

mysqli_close($ligacao); //estamos a fechar a ligação à base de dados
?>
      </div>
    </div>
  </div>
</body>
</html>
