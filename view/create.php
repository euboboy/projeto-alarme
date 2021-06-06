<?php

include './model/config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['name'])) {
	header("Location: ../index.php");
}

if (isset($_POST['action'])) {

  $nome = $_POST['fname'];
  $sobrenome = $_POST['lname'];
  $email = $_POST['email'];
  $celular = $_POST['phone'];
  $senha = $_POST['senha'];
  $csenha = $_POST['csenha'];
  $cep = $_POST['cep'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['uf'];
  $rua = $_POST['logradouro'];
  $numero = $_POST['numero'];
  $bairro = $_POST['bairro'];
  
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>


<body>
  <form id="regForm" class="login-form" method="POST">
    <!-- One "tab" for each step in the form: -->
    <div class="tabConteudo">Pessoal:
      <p><input name="fname" type="text" id="fname" placeholder="Nome" oninput="this.className = ''"></p>
      <p><input name="lname" type="text" id="lname" placeholder="Sobrenome" oninput="this.className = ''"></p>
    </div>
    <div class="tabConteudo no-pad-bot">Contato:
      <p><input name="email" type="email" id="email" placeholder="E-mail" oninput="this.className = ''"></p>
      <p><input name="phone" type="tel" id="phone" name="phone" type="tel" placeholder="Celular" oninput="this.className = ''"></p>
      <p><input name="senha" type="password" id="senha" placeholder="Insira uma senha" oninput="this.className = ''"></p>
      <p><input name="csenha" type="password" id="csenha" placeholder="Confirme sua senha" oninput="this.className = ''"></p>
    </div>
    <div class="tabConteudo no-padding">Buscar CEP:
      <p><input name="cep" id="cep" type="text" placeholder="CEP" oninput="this.className = ''"></p>
      <p><input name="cidade" id="localidade" type="text" placeholder="Cidade" oninput="this.className = ''"></p>
      <p><input name="uf" id="uf" type="text" placeholder="Estado" oninput="this.className = ''">
      </p>
    </div>
    <div class="tabConteudo">Endereço:
      <p><input name="logradouro" id="logradouro" type="text" placeholder="Logradouro" oninput="this.className = ''">
      </p>
      <p><input name="numero" type="text" placeholder="Número" oninput="this.className = ''"></p>
      <p><input name="bairro" id="bairro" type="text" placeholder="Bairro" oninput="this.className = ''"></p>
    </div>

    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" class="btn waves-effect waves-light blue darken-3" id="prevBtn" onclick="nextPrev(-1)">Voltar</button>
        <button type="button" name="action" class="btn waves-effect waves-light blue darken-3" id="nextBtn" onclick="nextPrev(1)">Próximo</button>
        
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>
    
  </form>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

</body>

</html>