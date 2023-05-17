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
        $varIdBlog = $_GET["blog_codigo"];
        $query = mysqli_query($conexao, "SELECT * from blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo 
        INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo
        INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo where blog_codigo = $varIdBlog");


        while ($exibe = mysqli_fetch_array($query)) {
           

            ?>
            <tr>
                <td><img src="imgs/<?php echo $exibe[9] ?>" width="200px"></td>
                <td>
                    <h3>
                        <?php echo $exibe[5] ?>
                    </h3>
                    Criado por <b>
                        <?php echo $exibe[11] ?>
                    </b>
                    <?php echo $exibe[7] ?>
                    <hr>
                    <?php echo $exibe[6] ?>
                </td>
            </tr>
            <tr>
                <?php
                 $queryDois = mysqli_query($conexao, "SELECT * from blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo 
                 INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo
                 INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo where blog_usuario_codigo = $exibe[10]");
                while ($exibe2 = mysqli_fetch_array($queryDois)) {
                    ?>
                    <td><img src="imgs/<?php echo $exibe2[9] ?>" width="200px"></td>
                    <?php
                }
        } ?>
        </tr>
    </table>
</body>

</html>