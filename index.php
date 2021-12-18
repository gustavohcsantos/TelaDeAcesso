<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tela de Acesso</title>
    </head>
    <body>
        <?php
            if(isset('submit')){

                $user = $_POST['user'];
                $password_user = $_POST['password'];
                //$output_form = false; // Por enquanto ficará inutilizável até dominar a permanência de dados

                if(empty($user) && empty($password_user)){
                    echo "Ambos os campos 'Usuário' e 'Senha' estão vazios.<br />Por favor preencha-os.";
                }
                
                if(empty($user) && !empty($password_user)){
                    echo "O campo 'Usuário' está vazio. Por favor preencha-o.";
                }
                
                if(!empty($user) && empty($password_user)){
                    echo "O campo 'Senha' está vazio. Por favor preencha-o.";
                }
                
                if(!empty($user) && !empty($password_user)){
                    
                    include 'connect.php';
                    $query = "SELECT * FROM acesso_sistema WHERE user='$user', password_user='$password';";
                    $result = mysqli_query($dbc, $query) or die ("<br />Erro ao conectar no banco de dados.<br />Por favor, entrar em contato com o suporte.");

                    if($result){
                        //aqui estará o código para redirecionar o usuário à dashboard do sistema.
                    }else{
                        echo "Dados não encontrados.";
                    }
                }
            }
        ?>
    </body>
</html>