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
        <?php require_once("topo.php"); ?>
    </header>
    <!-- Fim do topo-->

    <!-- Começo do slider-->
    <section class="banner">
        <?php require_once("slider.html"); ?>
    </section> 
    <!-- Fim do topo-->
    
    <!-- Começo do formulario e Buscador-->
    <section class="buscador">
        <?php require_once("buscador.php"); ?>
    </section> 
    <!-- Fim do  Formulario e Buscador-->

    <!-- Começo do destaques -->

    <section class="destaques">
        <?php require_once("destaques.html"); ?>
    </section> 
    
    <!-- Fim do destaques -->

    <!-- Começo do Rodapé -->

    <footer>
        <?php require_once("rodape.html"); ?>
</footer> 
    
    <!-- Fim do Rodapé -->
</body>
</html>