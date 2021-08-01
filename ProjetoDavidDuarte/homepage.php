<!DOCTYPE html>
<html lang="pt">
<html>

<head>
  <title>Projecto Prático Homepage</title>
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
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="homepage.php">David<span class="logo_colour">Duarte</span></a></h1>
          <h2>Projecto Prático</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="homepage.php">Home</a></li>
          <li><a href="curso.php">Curso</a></li>
          <li><a href="disciplinas.php">Disciplinas</a></li>
          <li><a href="trabalhos.php">Trabalhos</a></li>
          <li><a href="contactos.php">Contactos</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
       <p>De momento, a frequentar o curso: <br> <strong>Técnico de Informática - Sistemas.</strong></p>
      </div>
      <div id="content">
        <h2>Sobre o formando</h2>
        <h3>
        &nbsp Natural de Viana do Castelo, onde concluiu o 12º em Artes Visuais, mudou-se para a cidade do Porto para iniciar a sua 
          vida profissional, onde trabalhou na área da restauração, retalho, logística, comunicação e marketing. Após uma pausa,
          decidiu regressar aos estudos optando pela área da informática.
        <h3>
        <h2>Sobre o projecto</h2>
        <h3>
        &nbsp No âmbito da UFCD Instalação e Administração de Servidores Web, este trabalho visa a criação de um website pessoal desenvolvido em PHP, onde o
        formando apresenta informação pessoal, detalhes do curso em que se encontra incluído, com as disciplinas e
        os respetivos trabalhos inseridos em uma base de dados e também apresentados no website, com a possibilidade de 
        inserir novas disciplinas e novos trabalhos.
        </h3>
      </div>
    </div>
    <div id="footer">
    <p>Trabalho realizado por David Duarte</p>
     Template obtido de: <a href="https://www.html5webtemplates.co.uk/" target="_blank">html5webtemplates</a>
    </div>
  </div>
</body>
</html>
