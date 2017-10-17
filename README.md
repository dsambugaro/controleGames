# GameOver - Sistema de Gerenciamento
### Sistema de gerenciamento de banco de dados com interface web - UTFPR
Trabalho realizado como atividade avaliativa na disciplina de Bando de Dados 1, no curso de Ciência da Computação. UTFPR/CM - 2017/1
*Michel é Legal e gostoso e elindo 
-----

* #### Pré-requisitos:
  * Servidor http (como o apache ou o próprio servidor nativo do PHP)
  * MySQL 5.6+ ou MariaDB 10.1.23+
  * PHP 7+
  * Navegadores Suportados:
    * Google Chrome 15+
    * Safari 6+
    * Firefox 32+
    * Internet Explorer 9+


   (Em outras versões ou navegares pode vir a apresentar defeitos em sua interface)

------

* #### Configuração
1) Executar o script SQL 'controleGames_APS_BD_SQL.sql' localizado em:

	```
    controleGames_BD_1_APS/SQL/controleGames_APS_BD_SQL.sql
    ```

   Passo necessário para criar a database que será gerenciada.

2) Modificar, se necessário, as variáveis no arquivo 'conecta.php' localizado em:

    ```
    controleGames_BD_1_APS/www/bd_control/conecta.php
    ```

    * Variáveis:
      * `$endereco` deve conter o endereço do servidor httpd
      * `$user` deve conter o usuário MySQL
      * `$passwaord` deve conter a senha do usuário MySQL colocado em '$user'
      * `$database` deve conter o nome da database a ser utilizada.     
         Neste caso é 'controleGames_APS_BD', portanto não será necessário mudanças nesta variável, a menos que se tenha alterado o nome da database em todo o script SQL antes de executá-lo.

3) Todos os arquivos da pasta 'www' (ou mesmo a própia pasta) devem ser colocados em uma pasta que o
servidor http tenha acesso.

    (Para acessar a plataforma deve-se acessar a página index.php, preferencialmente em um dos navegadores
suportados, no diretorio do servidor http onde os arquivos foram colocados)

-----
