<?php
    require_once("conexao.inc");
?>
<!doctype html>
<html lang="pt-br">
<head>
    <title>Itaipu Veiculos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">
    <script>
        function clique(img){
            var modalJ=document.getElementById("janelaModal");
            var modalI=document.getElementById("imgModal");
            var modalB=document.getElementById("btFechar");

            modalJ.style.display="block";
            modalI.src=img;
            modalB.onclick=function(){
                modalJ.style.display="none"
            }
        }
    </script>

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
            
            $id= $_GET['id']; 
            $pg= $_GET['pg']; 
            
            echo "<a href='carros.php?pg=$pg'><p style= 'color:#000'>Voltar</p></a><br>";

            $sql = "SELECT tb_carros.*,tb_marcas.*, tb_modelos.* FROM tb_carros INNER JOIN tb_marcas ON tb_carros.id_marca = tb_marcas.id_marca INNER JOIN tb_modelos ON tb_carros.id_modelo = tb_modelos.id_modelo  WHERE tb_carros.id_carro = $id";
            $res = mysqli_query($con, $sql);
            
            $exibe = mysqli_fetch_array($res);
                echo "<article>".
                "<div id='dvmins'>".       
                    "<img src='".$exibe['mini1']."' class='mini' onclick='clique(\"".$exibe['foto1']."\")'>". 
                    "<img src='".$exibe['mini2']."' class='mini' onclick='clique(\"".$exibe['foto2']."\")'>".
                "</div>".
                "<div id='dvdetalhes'>".
                    "<div id='dvc1'>".
                        "id: ".$exibe['id_carro']."<br>".
                        "Marca: ".$exibe['marca']."<br>".
                        "Modelo: ".$exibe['modelo']."<br>".
                        "Versão: ".$exibe['versao']."<br>".
                        "Preço <span class='preco'>R$".number_format($exibe['valor'], 2, ',', '.')."</span><br>".//number_format(valor, casas_decimais, sep_dec, sep_mil)
                        "Ano: ".$exibe['ano_fab']."/".$exibe['ano_mod']."<br>".
                    "</div>".   
                    "<div id='dvc2'>".   
                        "Observação: ".$exibe['obs']."<br>".
                        "Opc1: ".$exibe['opc1']."<br>".
                        "Opc2: ".$exibe['opc2']."<br>".
                        "Opc3: ".$exibe['opc3']."<br>".
                        "Vendido: ";
                            if($exibe['vendido'] == '0'){
                                echo "Não";
                            }else{
                                echo "SIM";
                            }
                        echo "<br>".
                    "</div>".
                "</div>".    
                 "</article>"
                ;
             ?>
    
        <div id="janelaModal">                    
            <span id="btFechar">X</span>  
            <img id="imgModal">                  
        </div>                    

    </section> 
    <!-- Fim do MAIN-->
    
    

    <!-- Começo do Rodapé -->

    <footer id="destaques">
        <?php require_once("rodape.html"); ?>
</footer> 
    
    <!-- Fim do Rodapé -->
</body>
</html>