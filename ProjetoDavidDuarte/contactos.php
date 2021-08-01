<?php include "configpro.php"; ?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){ //verifica se a submissão foi efetuada através do método POST
        //antes do que vou escrever, deveria-se validar os dados

        $sql = "INSERT INTO contactos (Nome, Apelido, Email, Mensagem) VALUES (?, ?, ?, ?)"; //consulta pré-feita

        if($stmt = mysqli_prepare($ligacao, $sql)){ //se consegui configurar corretamente a minha consulta pré-feita
            mysqli_stmt_bind_param($stmt, "ssss", $_POST["Nome"], $_POST["Apelido"], $_POST["Email"], $_POST["Mensagem"]); //associa os campos do formulário com a minha consulta pré-feita em sql ($sql)


            if(mysqli_stmt_execute($stmt)){ //se executei o INSERT
                header("location: obrigado.php"); //reencaminha para uma dada página
            }else{
                echo "Alguma coisa não correu direito.";
            }
        }

        mysqli_stmt_close($stmt); //obriga a terminar o INSERT
    }

    mysqli_close($ligacao); //estamos a fechar a ligação à base de dados
?>

<!DOCTYPE html>
<html>

<head>
  <title>Contactos</title>
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
          <h1><a href="contactos.php">Contactos<span class="logo_colour"></span></a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="homepage.php">Home</a></li>
          <li><a href="curso.php">Curso</a></li>
          <li><a href="disciplinas.php">Disciplinas</a></li>
          <li><a href="trabalhos.php">Trabalhos</a></li>
          <li class="selected"><a href="contactos.php">Contactos</a></li>
        </ul>
      </div>
    </div>
    </div>
    <div id="site_content">
    <div class="sidebar">
      <h3>David Duarte</h3>
      <p>Telemóvel: <br> 912617138</p>
      <p>Email: <br> davidlisboaduarte@gmail.com</p>
    </div> 
      <div id="content">
        <h1>Contactar</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="form_settings">
            <p><span>Nome</span><input class="contact" type="text" name="Nome" value="" /></p>
            <p><span>Apelido</span><input class="contact" type="text" name="Apelido" value="" /></p>
            <p><span>Email</span><input class="contact" type="text" name="Email" value="" required /></p>
            <p><span>Mensagem</span><textarea class="contact textarea" rows="8" cols="50" name="Mensagem" required ></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submeter" /></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
