<?php include "configpro.php"; ?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){ //verifica se a submissão foi efetuada através do método POST
        //antes do que vou escrever, deveria-se validar os dados

        $sql = "INSERT INTO trabalhos (IDUFC, trabalho) VALUES (?, ?)"; //consulta pré-feita

        if($stmt = mysqli_prepare($ligacao, $sql)){ //se consegui configurar corretamente a minha consulta pré-feita
            mysqli_stmt_bind_param($stmt, "is", $_POST["IDUFC"], $_POST["trabalho"]); //associa os campos do formulário com a minha consulta pré-feita em sql ($sql)


            if(mysqli_stmt_execute($stmt)){ //se executei o INSERT
                header("location: trabalhos.php"); //reencaminha para uma dada página
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
  <title>Trabalhos</title>
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
          <h1><a href="trabalhos.php"><span class="logo_colour">Trabalhos</span></a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="homepage.php">Home</a></li>
          <li><a href="curso.php">Curso</a></li>
          <li><a href="disciplinas.php">Disciplinas</a></li>
          <li class="selected"><a href="trabalhos.php">Trabalhos</a></li>
          <li><a href="contactos.php">Contactos</a></li>
        </ul>
      </div>
    </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h2>Inserir novo trabalho</h2>
        <form action="#" method="post">
          <div class="formside">
            <p><span>ID da UFCD:</span><input class="contact" type="text" name="IDUFC" value="" required /></p>
            <p><span>Trabalho:</span><input class="contact" type="text" name="trabalho" value="" required /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submeter" /></p>
          </div>
        </form>
      </div>
      <div id="content">
<?php

$sql="SELECT * FROM `trabalhos`"; //devolver toda a informaçao de todos os trabalhos

$resultado = mysqli_query($ligacao, $sql); //devolver o resultado de uma pesquisa "$sql", numa base de dados à qual estamos ligados

if($resultado){ // se foi possivel executar a consulta SQL
   $numeroLinhas = mysqli_num_rows($resultado);

   if($numeroLinhas > 0){
        echo "<table>";
        echo "<tr>";
        echo "<th>ID da UFCD</th>";
        echo "<th>Trabalho</th>";
        echo "<th>Editar</th>";
        echo "<th>Eliminar</th>";
        echo "</tr>";
      
        while($linha = mysqli_fetch_array($resultado)){ //enquanto eu tiver dados
            echo "<tr>";
            echo "<td>" . $linha['IDUFC'] . "</td>";
            echo "<td>" . $linha['Trabalho'] . "</td>";
            echo "<td><a href='editar2.php?id=" . $linha['ID'] . "'>Editar</a></td>";
            echo "<td><a href='apagar2.php?id=" . $linha['ID'] . "'>Eliminar</a></td>";
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
</body>
</html>
