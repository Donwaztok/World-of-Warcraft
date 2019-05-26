<?php
include("config.php");
if(!isset($_GET["id"])) $id=1; else $id = $_GET["id"];

ob_start();
session_start();


$emailError = "";
$passError = "";
$nameError = "";
$commError = "";
$error = false;

if ( isset($_SESSION['user'])!="" ) {
  //Se estiver logado
  //Usuario
  $res=mysqli_query($con,"SELECT * FROM users WHERE id=".$_SESSION['user']);
  $userRow=mysqli_fetch_array($res);
  //Comentarios
  if (isset($_POST['btn-comment']) ) {
    $comment = trim($_POST['comment']);
    $comment = strip_tags($comment);
    $comment = htmlspecialchars($comment);

    //Validar comentario
    if (empty($comment)) {
      $error = true;
      $nameError = "Por favor insira um comentário";
    }
    
    if( !$error ) {
      $query = "INSERT INTO comments(boss_id,user_id,content) VALUES('$id','$_SESSION[user]','$comment')";
      $res = mysqli_query($con,$query);
        
      if ($res) {
        $errTyp = "Sucesso";
        $errMSG = "Comentário enviado";
        unset($name);
        unset($pass);
      } else {
        $errTyp = "Perigo";
        $errMSG = "Algo deu errado, tente novamente mais tarde..."; 
      } 
    }
  }
} else {//Inicio Else
  //Fazer login
  if( isset($_POST['btn-login']) ) {
    
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    
    if(empty($name)){
      $error = true;
      $emailError = "Por favor digite um login.";
    }
    
    if(empty($pass)){
      $error = true;
      $passError = "Por favor digite uma senha.";
    }
    
    if (!$error) {
      //sha256
      $password = hash('sha256', $pass);
    
      $res=mysqli_query($con,"SELECT * FROM users WHERE nickname='$name'");
      $row=mysqli_fetch_array($res);
      $count = mysqli_num_rows($res);
      
      if( $count == 1 && $row['password']==$password ) {
        $_SESSION['user'] = $row['id'];
        header("Location: boss.php?id=$id");
      } else {
        $errMSG = "Dados incorretos, Tente novamente...";
      }
    }
  } else if ( isset($_POST['btn-signup']) ) {
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    //Validar Nome
    if (empty($name)) {
      $error = true;
      $nameError = "Por favor digite um login.";
    } else if (strlen($name) < 3) {
      $error = true;
      $nameError = "login precisa ter no minimo 3 caracteres.";
    }
    //Validar Senha
    if (empty($pass)){
      $error = true;
      $passError = "Por favor digite uma senha.";
    } else if(strlen($pass) < 6) {
      $error = true;
      $passError = "Senha precisa ter mais de 6 caracteres.";
    }
    
    //sha256
    $password = hash('sha256', $pass);
    
    if( !$error ) {
      $query = "INSERT INTO users(nickname,password,creation) VALUES('$name','$password',now())";
      $res = mysqli_query($con,$query);
        
      if ($res) {
        $errTyp = "Sucesso";
        $errMSG = "Registrado com sucesso, você se conectar agora.";
        unset($name);
        unset($pass);
      } else {
        $errTyp = "Perigo";
        $errMSG = "Algo deu errado, tente novamente mais tarde..."; 
      } 
    }
  }
}//Fim else

if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
mysqli_query($con,"SET NAMES utf8");
mysqli_query($con,"SET CHARACTER_SET utf8");
//Conteudo
$sql="SELECT * FROM boss WHERE id=".$id;
$result=mysqli_query($con,$sql);
$conteudo=mysqli_fetch_assoc($result);
//Menu
$sql="SELECT id,arquivo FROM boss";
$result_menu=mysqli_query($con,$sql);
//Comentários
$sql="SELECT * FROM comments WHERE boss_id=".$id;
$comments_result=mysqli_query($con,$sql);


?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $conteudo["nome"];?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon"       href="Images/icon.png">
    <script src="https://wow.zamimg.com/widgets/power.js"></script>
    <script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>

    <script src="snowstorm.js"></script>
  </head>
<body>
<!-- Conteudo -->
<div class="conteudo">
    <!-- Coluna da Esquerda -->
    <div class="esquerda">
      <div class="corpo">
        <div class="retrato">
          <!--Login-->
          <?php
          if ( isset($errMSG) ) {
          ?>
            <div class="form-group">
            <div class="alert alert-danger">
              <?php echo $errMSG; ?>
            </div>
            </div>
          <?php
          }
          if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
            echo "<div id=wrap>
            <div id=regbar>
              <div id=navthing>
                <a href=# id=loginform>Login</a>
              <div class=login>
                <div class=arrow-up></div>
                <div class=formholder>
                  <div class=randompad>
                     <div class=login-wrap>
                      <div class=login-html>
                        <input id=tab-1 type=radio name=tab class=sign-in checked><label for=tab-1 class=tab>Sign In</label>
                        <input id=tab-2 type=radio name=tab class=sign-up><label for=tab-2 class=tab>Sign Up</label>
                        <div class=login-form>
                          <div class=sign-in-htm>
                          <form action=".htmlspecialchars($_SERVER['PHP_SELF'])."?id=".$id." method=post>
                            <div class=group>
                              <label for=name class=label>Username</label>
                              <input name=name type=text class=input>
                              <span class=text-danger>".$emailError."</span>
                            </div>
                            <div class=group>
                              <label for=password class=label>Password</label>
                              <input name=pass id=password type=password class=input data-type=password>
                              <span class=text-danger>".$passError."</span>
                            </div>
                            <div class=group>
                              <input type=submit class=button name=btn-login value=Sign In>
                            </div>
                            </form>
                            <div class=hr></div>
                            <div class=foot-lnk>
                              
                            </div>
                          </div>
                          <div class=sign-up-htm>
                          <form method=post action=".htmlspecialchars($_SERVER['PHP_SELF'])."?id=".$id.">
                            <div class=group>
                              <label for=name class=label>Username</label>
                              <input type=text name=name class=input maxlength=50 >
                            </div>
                            <span class=text-danger>".$nameError."</span>
                            <div class=group>
                              <label for=pass class=label>Password</label>
                              <input id=pass name=pass type=password class=input data-type=passwordd> 
                            </div>
                            <span class=text-danger".$passError."</span>
                            <div class=group>
                              <label for=pass class=label>Repeat Password</label>
                              <input id=pass type=password class=input data-type=password>
                            </div>
                            <div class=group>
                              <input type=submit class=button name=btn-signup value=Sign Up>
                            </div>
                            <div class=hr></div>
                            <div class=foot-lnk>
                              <label for=tab-1>Already Member?</a>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>";
          } else {
            if(file_exists("Images/users/".$userRow["id"].".".$userRow["portrait_type"])){
                  echo "<img src=Images/users/".$userRow["id"].".".$userRow["portrait_type"].">";
                } else { echo "<img src=Images/users/0.png>"; }
             echo $userRow["nickname"]." | <a href=logout.php?logout><span class=glyphicon glyphicon-log-out></span>Sign Out</a>";
          }
          ?>
          <!--Fim Login-->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>

        </div>
        <hr>
        <div class="menu">
          <?php
            if (mysqli_num_rows($result_menu) >0){
              while ($menu = mysqli_fetch_assoc($result_menu)){
                if($id == $menu["id"]){
                  echo "<img style=filter:grayscale(100%);transform:translate3d(0px,0px,0px); src=Images/".$menu["arquivo"]."Stand.png>";
                } else { 
                  echo "<a href=boss.php?id=".$menu["id"]."><img src=Images/".$menu["arquivo"]."Stand.png></a>"; 
                }
              }
            }
          ?>
        </div>
      </div><br>

    <!-- Fim Coluna da Esquerda -->
    </div>

    <!-- Coluna da Direita -->
    <div class="direita">
    
      <div class="corpo" style="margin-bottom: 20px;">
        <img src=Images/<?php echo $conteudo["arquivo"]; ?>Mini.png width=100%>
        <div class="texto">
          <br>
          <h1><?php echo $conteudo["nome"];?></h1>

          <div class="titulo">
            <img src="Images/DPS.png" width="30"> DPS
          </div>
          <?php echo $conteudo["dps"];?>

          <div class="titulo">
            <img src="Images/Tank.png" width="30"> Tank
          </div>
          <?php echo $conteudo["tank"];?>

          <div class="titulo">
            <img src="Images/Healer.png" width="30"> Healer
          </div>
          <?php echo $conteudo["heal"];?>

          <div class="titulo">
            <img src="Images/Loot.png" width="30"> Loot
          </div>
          <?php echo $conteudo["loot"];?>

          <iframe width=100% height=490px src=https://www.youtube.com/embed/<?php echo $conteudo["video"]; ?> frameborder=0 allowfullscreen></iframe>

          <hr>
          <p align="right">Video: <a href="http://www.wowgirl.com.br" target="Blank">WoWGirl</a></p>
          <hr>
        </div>
      </div>

      <!--Comentários-->
      <div class="corpo">
        <!--Enviar Comentário-->
        <?php
        if(isset($_SESSION['user']) || !empty($_SESSION['user'])){
          echo"<div class=texto>
            <h1>Comentários:</h1>
            <div align=right>
            <form action=".htmlspecialchars($_SERVER['PHP_SELF'])."?id=".$id." method=post>
              <textarea name=comment placeholder=Comente></textarea>
              <input type=submit class=button name=btn-comment value=Enviar>
              <span class=text-danger".$commError."</span>
            </form>
            </div>
            <hr><br>";
        }?>
        <!--Fim enviar comentário-->
        <!--Inicio Comentario X-->
        <?php
            if (mysqli_num_rows($comments_result) >0){
              while ($comments = mysqli_fetch_assoc($comments_result)){
                echo "<div class=comments>";
                echo "  <div class=commentPhoto>";
                  $sql="SELECT id,nickname,portrait_type FROM users WHERE id=".$comments["user_id"];
                  $result=mysqli_query($con,$sql);
                  $user=mysqli_fetch_assoc($result);
                if(file_exists("Images/users/".$user["id"].".".$user["portrait_type"])){
                  echo "    <img src=Images/users/".$user["id"].".".$user["portrait_type"].">";
                } else { echo "<img src=Images/users/0.png>"; }

                echo "  </div>";
                echo "  <div class=commentText>";
                echo "   <h3>".$user["nickname"]."</h3>";
                echo "    <p>".$comments["content"]."</p>";
                echo "  </div>";
                echo "  <hr>";
                echo "</div>";
              }
            }
          ?>
        <!--Fim Comentario X-->
      </div>
      <!--Fim Comentários-->
    </div>
    <!-- Fim Coluna da Direita -->
</div>
<!-- Fim conteudo -->

</body>
</html>
<?php ob_end_flush(); ?>