<?php /* Nav-Bar */ 
include_once("header.php");
include_once("../Models/Model_Sessoes.php");
$_SESSION["pagina"] = "PaginaTerapeuta";
var_dump($_SESSION);

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
                    <td><center><h2>Nova Consulta</h2></center></td>
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
                <tr>
                    <td>
                            <form action="../Controllers/Controller.php" method="POST" name="sessoes" id="sessoes">
                            <center><div style="align-content: flex-start;">
                                    <label>Data</label>
                                    <input type="date" name="data" required>
                                    <label>Hora</label>
                                    <input type="time" name="time" required><br>
                                    <label>Paciente</label>
                                    <select name="id_paciente" required>
                                        <!-- <option value="default">Selecione</option> -->
                                    <?php
                                        $paciente = new Paciente();
                                        $pacientes = $paciente->getPacientes();
                                        foreach ($pacientes as $value) {
                                            echo "<option value='$value[0]'>";
                                            echo $value[1];
                                            echo "</option>";
                                        }
                                    ?>
                                    </select><br>
                                    <label>Especialidade</label>
                                    <select name="especialidade" required>
                                        <option value="default">Selecione</option>
                                        <option value="Psicologia">Psicologia</option>
                                        <option value="Aroma Terapia">Aroma Terapia</option>
                                        <option value="Massagem">Massagem</option>
                                    </select>
                                    
                                    <center>
                                        <label>Duração (horas)</label>
                                        <input type="time" style="width: 80px;" name="duracao" required>
                                        <button type="submit">+</button>
                                    </center>
                                    <hr>
                                </div></center>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><center><h2>Consultas</h2></center><hr></td>
                        </tr>
                        
                        <?php
                        $paciente = new Paciente();
                        $pacientes = $paciente->getPacientes();
                        
                        $consulta = new Sessao();
                        
                        $consultas = $consulta->getSessoesByIdTerapeuta($_SESSION["usuario_logado"]->id);
                        
                        if ($consultas) {

                            foreach ($consultas as $value) {
                                if ($value->status == "Agendado") {
                                    $data = $value->TratarData($value->data, $value->hora); 
                                    $pac = $paciente->GetPacienteById($value->id_paciente);
                                    
                                    echo "<tr>";
                                    echo "<td>";
                                    echo "<label>Data da Consulta: ". $data->format("d/m/Y")."</label><br>";
                                    echo "<label>Paciente: ". $pac[0][1]."</label><br>";
                                    echo "<label>Horario: ". $value->hora."</label><br>";
                                    echo "<label>Duração: ". $value->duracao." hora(s)</label><br>";
                                    echo "<label>Especialidade: ". $value->especialidade."</label><br>";
                                    echo "<a href='../Controllers/Controller.php?del=$value->id' class='button'>Concluir</a>";
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
