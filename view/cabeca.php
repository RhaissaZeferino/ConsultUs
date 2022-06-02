<nav class="navbar fixed-top navbar-light bg-light">
                    <div id="menuStyle">
                        <ul class="nav">
                            <li class="nav-item">
                                <img src="../images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                                <a class="navbar-brand" href="../index.php">ConsultUs</a>
                            </li>
                            <!-- AQUI! -->
                            <li class="nav-item">
                                <a class="nav-link" href="../controller/sair.php">Sair</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./contato.php">Contato</a>
                            </li>
                            <?php
                                if(isset($_SESSION['login'])){     
                                    $nomePerfil = $_SESSION['nome'];
                                    if($_SESSION['tipo_user'] == 1){
                                        echo "<li class='nav-item'> <a class='nav-link' href='gerenciaMedico.php'>
                                        Médicos </a></li>"; 
                                        echo "<li class='nav-item'> <a class='nav-link' href='admin.php'>
                                        Consultas </a></li>"; 
                                        echo "<li class='nav-item'> <a class='nav-link' href='admin.php'>
                                        Olá, $nomePerfil! </a></li>"; 
                                    }
                                    else if($_SESSION['tipo_user'] == 2){
                                        echo "<li class='nav-item'> <a class='nav-link' href='medico.php'>
                                        Olá, $nomePerfil! </a></li>"; 
                                    }
                                    else{
                                        echo "<li class='nav-item'> <a class='nav-link' href='paciente.php'>
                                        Olá, $nomePerfil! </a></li>"; 
                                    }
                                    
                                }
                            ?>
                        </ul>
                    </div>
                </nav>