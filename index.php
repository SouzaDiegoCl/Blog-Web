<?php include("conexao.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>
    <table border='1' width="800px">
        <?php
        $query = mysqli_query($conexao, "SELECT * from blog 
        INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo 
        INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo
        INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo 
        ORDER BY blog_bloginfo_codigo");
        while ($exibe = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><img src="imgs/<?php echo $exibe[9] ?>" width="200px"></td>
                <td><a href="page.php?blog_codigo=<?php echo $exibe[0] ?>">
                        <!-- Coloco um id chamado blog_codigo no href  -->
                        <h3>
                            <?php echo $exibe[5] ?>
                        </h3>
                        Criado por <b>
                            <?php echo $exibe[11] ?>
                        </b>
                        <?php echo $exibe[7] ?>
                        <hr>
                        <?php echo substr($exibe[6], 0, 50) . "..." ?>
                        <!-- Corta o primeiro caracter e mostra os próximos 5 -->
                    </a></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>