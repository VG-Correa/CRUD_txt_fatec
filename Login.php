
<?php /* Nav-Bar */ 
include_once("./header.php");
$_SESSION["pagina"] = "login";
?>

<body>
    
    <div class= "bg_clinica" name="fundo" id="login">
        <h1 class="Title_Login">Login</h1>
        <?php
                if (isset($_SESSION["erro"])) {
                    echo "<h2 class='mensagem'>".$_SESSION["erro"]."</h2>";
                }

                unset($_SESSION["erro"]);
        ?>

        <div class="Container">

            <form action="../Controllers/Controller.php" method="POST">

                <table class="tabela">

                    <tr>
                        <tr>
                            <td><Label>Email</Label></td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td><Label>Senha</Label></td>
                            <td><input type="password" name="senha"></td>
                        </tr>
                        <tr>
                            <td><button type="submit">Entrar</button></td>
                        </tr>
                    </tr>

                </table>


            </form>



        </div>



    </div>


</body>

