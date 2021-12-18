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
            //if(isset('submit')){

                $user = $_POST['user'];
                $password_user = $_POST['password_user'];
                //$output_form = false; // Por enquanto ficará inutilizável até dominar a permanência de dados

                if(empty($user) && empty($password_user)){
                    echo "Ambos os campos 'Usuário' e 'Senha' estão vazios.<br />Por favor preencha-os.";
                    echo "<br /><br /><input type=\"submit\" value=\"Voltar\" onclick=\"JavaScript: window.history.back();\">";
                }
                
                if(empty($user) && !empty($password_user)){
                    echo "O campo 'Usuário' está vazio. Por favor preencha-o.";
                    echo "<br /><br /><input type=\"submit\" value=\"Voltar\" onclick=\"JavaScript: window.history.back();\">";
                }
                
                if(!empty($user) && empty($password_user)){
                    echo "O campo 'Senha' está vazio. Por favor preencha-o.";
                    echo "<br /><br /><input type=\"submit\" value=\"Voltar\" onclick=\"JavaScript: window.history.back();\">";
                }
                
                if(!empty($user) && !empty($password_user)){
                    
                    include 'connect.php';
                    $query = "SELECT * FROM acesso_sistema WHERE user, password_user LIKE $user, $password_user;";
                    $result = mysqli_query($dbc, $query) or die ("<br />Usuário e Senha não existem.<br /><br /><input type=\"submit\" value=\"Voltar\" onclick=\"JavaScript: window.history.back();\">");

                    if($row = mysqli_fetch_array($result)){
                        $usuario = $row['usuario'];
                        $senha = $row['senha'];
                        $tentativa_acesso = 3;// O usuário poderá tentar acessar sua conta por 3 vezes, caso contrário deverá aguardar 10 minutos antes das novas tentativas.
                        if( $user == $usuario ){
                            echo "O nome de usuário informado não existe.<br />Por favor, verifique e tente novamente.";}

                        if( $password_user == $senha ){
                            echo "A senha informada não existe.<br />Por favor, verifique e tente novamente.";
                            $tentativa_acesso -= 1;
                            echo "Você tem direito a mais $tentativa_acesso tentativas.";
                            if($tentativa_acesso == 0){
                                echo "Por favor, tente novamente mais tarde.";
                                echo "<input type=\"submit\" value=\"Voltar\" onclick=\"JavaScript: window.history.back();\">";
                            }
                        }

                        if( ( $user == $usuario ) && ( $password_user == $senha )){
                            //aqui estará o código para redirecionar o usuário à dashboard do sistema.
                            echo "Deu bom!";}
                    }else{
                        echo "Não há nenhum dado de acesso no servidor.";
                    }
                }
            //}
        ?>
    </body>
</html>
