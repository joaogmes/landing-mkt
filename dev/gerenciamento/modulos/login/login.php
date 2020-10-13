<div class="section">
    <div class="container">
        <div class="card col-md-6 col-lg-6 padding mx-auto">
            <?php
            // echo var_dump($_SESSION);
            if (isset($_POST['usuario']) && $_POST['usuario'] != '' && isset($_POST['senha']) && $_POST['senha'] != '') {
                if(verificarUsuario($_POST['usuario'], $_POST['senha'])){
                    if(!isset($_SESSION)){
                        session_start();
                    }
                    $_SESSION['usuario'] = $_POST['usuario'];
                    header("Location: ./");
                }else{
                    echo "<p class='alert alert-danger alert-dismissible fade show'>Usuário ou senha incorreto(s) </p>";
                }
            } else {
                echo "<p class='alert alert-warning alert-dismissible fade show'>Informe usuário e senha </p>";
            }
            ?>
            <form method="POST" action="./">
                <h3 class="text-center"><img class="img-fluid" src="./assets/img/AgênciaJotaGomes.png" alt="Agência Jota Gomes"></h3>
                <div class="form-group">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control" name="usuario" id="usuario">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha">
                </div>
                <button type="submit" class="btn btn-primary">Logar</button>
            </form>
        </div>
    </div>
</div>