<?php /* Nav-Bar */ 
$_SESSION["pagina"] = "PaginaPaciente";
include_once("./header.php");
include_once("../Models/Model_Sessoes.php");
$_SESSION["pagina"] = "PaginaPaciente";

?>

<body>

    <div class="bg_clinica">
        <h1>
            <?php
                echo $_SESSION["usuario_logado"]->nome;
            ?>
        </h1>
        
        <div class="Container_PerfilTerapeuta">
            
            <table>
                <tr>
                    <td><center><h2>Suas Consultas Marcadas</h2></center></td>
                </tr>
                <tr>
                    <td><center>
                        <?php
                        if (isset($_SESSION["erro"])) {
                            echo "<h3>". $_SESSION["erro"] . "</h3>";
                            unset($_SESSION["erro"]);
                        }

                        ?>
                    </td></center>
                </tr>
                
                  
                            
                        
                        <?php
                        
                        $consulta = new Sessao();
                        $consultas = $consulta->getSessoesByIdPaciente($_SESSION["usuario_logado"]->id);
                        if ($consultas) {

                            foreach ($consultas as $value) {
                                if ($value->status == "Agendado") {
                                    $data = $value->TratarData($value->data, $value->hora); 
                                
                                echo "<tr>";
                                echo "<td>";
                                    echo "<label>Data da Consulta: ". $data->format("d/m/Y")."</label><br>";
                                    echo "<label>Horario: ". $value->hora."</label><br>";
                                    echo "<label>Duração: ". $value->duracao." hora(s)</label><br>";
                                    echo "<label>Especialidade: ". $value->especialidade."</label><br>";
                                    echo "<hr>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            
                            }
                        }

                        ?>

                </table>
                </form>
                
            </div>


    </div>

</body>