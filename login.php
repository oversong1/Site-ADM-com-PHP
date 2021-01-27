<!doctype html>
<html lang="pt-br">
<head>
    <title>Itaipu Veiculos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">

</head>
    
<body>
    <!-- Começo do topo-->
    <header>
        <?php include("topo.php"); ?>
    </header>
    <!-- Fim do topo-->

    <!-- Começo do Main-->

    

    <section id="main">

        <?php

            include "conexao.inc";

            if(isset($_POST["f_logar"])){
                $user= $_POST["f_user"];
                $senha= $_POST["f_senha"];

                $sql = ("SELECT * FROM tb_colaboradores where username='$user' AND senha='$senha'");
                $res = mysqli_query($con, $sql);
                $ret = mysqli_fetch_array($res); 
               
                if($ret == 0){
                    echo "<p id='lgErro'>Login Incorreto</p>";
                }else{
                    $chave1 = "abcdefghijklmnopqrstuvwxyz";
                    $chave2 = "ABCDEFGHIJLKMNOPQRSTUVWXYZ";
                    $chave3 = "0123456789";
                    $chave = str_shuffle($chave1.$chave2.$chave3);//embaralhando
                    $tam = strlen($chave); // o tamanho da chave
                    $num = "";
                    $qtde = rand(20,50);

                    for($i = 0; $i < $qtde; $i++){
                        $pos = rand(0, $tam);
                        $num .= substr($chave, $pos, 1);
                    }

                    session_start();
                    $_SESSION['numlogin'] = $num;
                    $_SESSION['username'] = $num;
                    $_SESSION['acesso'] = $ret['acesso'];//0 = restrito , 1 = total
                    header("Location:gerenciamento.php?num=$num");
                }
            }

            mysqli_close($con);
        ?>

        <form action="login.php" method="post" name="f_login" id="f_login">
            
        <label for="">Usúario</label>
            <input type="text" name="f_user">

            <label for="">Senha</label>
            <input type="password" name="f_senha">

            <input type="submit" value="Logar" name="f_logar"> 
        
        </form>
    </section> 
    <!-- Fim do Main-->

    <footer id="destaques">
        <?php include("rodape.html"); ?>
</footer> 
    
    <!-- Fim do Rodapé -->
</body>
</html>