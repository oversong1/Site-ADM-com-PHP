<?php

session_start();
if(isset($_SESSION["numlogin"])){
    $n1 = $_GET["num"];
    $n2 = $_SESSION["numlogin"];
    if($n1 != $n2){
        echo "<p>Login não efetuado</p>";
        exit;
    }
}
else{
    echo"<p>Login não efetuado</p>";
    exit;
}

?>
<!doctype html>
<html lang="pt-br">
<head>
    <title>Itaipu Veiculos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">
    <script src="jquery-3.4.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#menub1","#menub2","#menub3","#menub4").css("visibity","hidden");
            $("#menua1").click(function(){
                $(menub1).css("visibility","visible");
                $(menub2).css("visibility","hidden");
                $(menub3).css("visibility","hidden");
                $(menub4).css("visibility","hidden");
            });
            $("#menua2").click(function(){
                $(menub1).css("visibility","hidden");
                $(menub2).css("visibility","visible");
                $(menub3).css("visibility","hidden");
                $(menub4).css("visibility","hidden");
            });
            $("#menua3").click(function(){
                $(menub1).css("visibility","hidden");
                $(menub2).css("visibility","hidden");
                $(menub3).css("visibility","visible");
                $(menub4).css("visibility","hidden");
            });
            $("#menua4").click(function(){
                $(menub1).css("visibility","hidden");
                $(menub2).css("visibility","hidden");
                $(menub3).css("visibility","hidden");
                $(menub4).css("visibility","visible");
            });

            $("#menub1,#menub2,#menub3,#menub4").mouseover(function(){
                $(this).css("visibility","visible");
            });
            $("#menub1,#menub2,#menub3,#menub4").mouseout(function(){
                $(this).css("visibility","hidden");
            });
        });
    </script>
</head>
    
<body>
    <!-- Começo do topo-->
    <header>
        <?php include("topo.php"); ?>
    </header>
    <!-- Fim do topo-->

    <!-- Navigation -->
    <p id="menup">Menu principal de gerenciamento</p>
    
    <nav>
        <div class="menu_ger">
            <button id="menua1" class="btmenu">Carros</button>
            <div id="menub1" class="menub">
                <a href="novo_carro.php?num=<?php echo $n1 ?>" target="_self">Novo</a>
                <a href="#" target="_self">Editar</a>
                <a href="excluir_carro.php?num=<?php echo $n1 ?>" target="_self">Excluir</a>
                <a href="marcas_modelos.php?num=<?php echo $n1 ?>" target="_self">Marcas/Modelos</a>
            </div>
        </div>

        <div class="menu_ger">
            <button id="menua2" class="btmenu">Slider</button>
            <div id="menub2" class="menub">
                <a href="#" target="_self">Configurar</a>
            </div>
        </div>

        <?php
       
        if($_SESSION['acesso'] == 1){
            echo "
            <div class='menu_ger'>
            <button id='menua3' class='btmenu'>Usuarios</button>
            <div id='menub3' class='menub'>
                <a href='novo_colaborador.php?num=$n1' target='_self'>Novo</a>
                <a href='editar_usuario.php?num=$n1' target='_self'>Editar</a>
                <a href='excluir_colaborador.php?num=$n1' target='_self'>Excluir</a>
            </div>
        </div>
            ";
        }
        ?>

        <div class="menu_ger">
            <button id="menua4" class="btmenu">Logoff</button>
            <div id="menub4" class="menub">
                <a href="#" target="_self">Sair</a>
            </div>
        </div>
    </nav>
    <!-- Navigation -->

    <footer id="destaques">
        <?php include("rodape.html"); ?>
</footer> 
    
    <!-- Fim do Rodapé -->
</body>
</html>