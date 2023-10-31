<?php /* Nav-Bar */ 
include_once("./header.php");
$_SESSION["pagina"] = "cadastrar";
?>

<body>
    
    <div class= "bg_clinica" name="fundo" id="login">
        <h1 class="Title_Login">Cadastre-se</h1>

            <?php
                if (isset($_SESSION["erro"])) {
                    echo "<h1>".$_SESSION["erro"]."</h1>";
                }

                unset($_SESSION["erro"]);
            ?>

        <div class="Container_cadastro">

            <form action="../Controllers/Controller.php" method="POST">

                <table>

                    <tr>
                        <tr>
                            <td><Label>Nome Completo</Label></td>
                            <td><input type="text" name="nome" required></td>
                        </tr>
                        <tr>
                            <td><Label>Data de Nascimento</Label></td>
                            <td><input type="date" name="data_nascimento" required></td>
                        </tr>
                        <tr>
                            <td><Label>Sexo</Label></td>
                            <td><input list="sex" type="list" name="sexo" required>
                                <datalist id="sex">
                                    <option value="Masculino"></option>
                                    <option value="Feminino"></option>
                                </datalist>
                            </td>
                        </tr>
                        <tr>
                            <td><Label required>CPF</Label></td>
                            <td><input type="text" name="cpf"></td>
                        </tr>
                        <tr>
                            <td><Label required>RG</Label></td>
                            <td><input type="text" name="rg"></td>
                        </tr>
                        <tr>
                            <td><Label required>Perfil</Label>
                            <select name="tipo">
                                <option>Paciente</option>
                                <option>Terapeuta</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><Label required>Email</Label></td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td><Label required>Senha</Label></td>
                            <td><input type="password" name="senha"></td>
                        </tr>
                        <tr>
                            <td><Label required>Confirmar Senha</Label></td>
                            <td><input type="password" name="senha2"></td>
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

