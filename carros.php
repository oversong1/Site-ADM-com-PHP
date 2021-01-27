<?php
    require_once("conexao.inc");
?>
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

    <!-- Começo do MAIN-->
    <section id="carros">
        <?php 
        
            $maximo_registros_exibidos = 2;
            if(isset($_GET["pg"])){
                $pagina_atual = $_GET["pg"];
            }else{
                $pagina_atual = 1;       
            }
           
            $inicio = $pagina_atual - 1;
            $inicio *= $maximo_registros_exibidos;
            
            $sql = "SELECT tb_carros.*,tb_marcas.*, tb_modelos.* FROM tb_carros INNER JOIN tb_marcas ON tb_carros.id_marca = tb_marcas.id_marca INNER JOIN tb_modelos ON tb_carros.id_modelo = tb_modelos.id_modelo LIMIT $inicio,$maximo_registros_exibidos";
            $res = mysqli_query($con, $sql);
            $total_registros=mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_carros")); 
            $total_paginas= $total_registros/$maximo_registros_exibidos;

            $anterior = $pagina_atual - 1;
            $proxima = $pagina_atual + 1;


            if($pagina_atual > 1){
                echo "<a class='btmenu' href='carros.php?pg=$anterior'>Anterior</a><br>";
            }
            if($pagina_atual < $total_paginas){
                echo "<a class='btmenu' href='carros.php?pg=$proxima'>Próxima</a>";
            }    

            echo"<br>";
            for($ip=0; $ip < $total_paginas; $ip++){
                echo"<a href='carros.php?pg=".($ip+1)."'>[ ";
                if($pagina_atual == ($ip+1)){
                    echo "<strong>".($ip+1)."</strong>";
                }else{
                    echo ($ip+1);    
            }
               echo " ]</a> ";
        }
            echo"<br><br>";

            while($exibe = mysqli_fetch_array($res)){
                echo "<article>".
                "<div id='d1'>".
                "<a href='detalhes_modelo.php?id=".$exibe['id_carro']."&pg=$pagina_atual'><img src='".$exibe['mini1']."'></a>". 
                "</div>".
                "<div id='d2'>".    
                    "<div id='titulo'>".    
                        "<div id='t1'>".    
                        "<a href='detalhes_modelo.php?id=".$exibe['id_carro']."&pg=$pagina_atual'>".
                            $exibe['marca']."&nbsp;".$exibe['modelo']."&nbsp;".$exibe['versao'].
                        "</a>".
                        "</div>".        
                        "<div id='t2'>".        
                            "<p>".number_format($exibe['valor'], 2, ',', '.')."</p>".//number_format(valor, casas_decimais, sep_dec, sep_mil)
                        "</div>".
                    "<div id='dados'>".
                    "<p>".$exibe['ano_fab']."/".$exibe['ano_mod']."</p>".
                    "<p>Vendido: ";
                    if($exibe['vendido'] == '0'){
                        echo "Não";
                    }else{
                        echo "SIM";
                    }
                    echo "</p>".
                 "</div>".
                "</div>".
                 "</article>"
                ;
            }
        
        ?>
    </section> 
    <!-- Fim do MAIN-->
    
    

    <!-- Começo do Rodapé -->

    <footer id="destaques">
        <?php require_once("rodape.html"); ?>
</footer> 
    
    <!-- Fim do Rodapé -->
</body>
</html>