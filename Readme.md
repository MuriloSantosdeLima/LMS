#Banco de dados
 - Necessario atualizar host, dbname, user e password.
 - Executar arquivo sql.sql para criar tabelas e inserir registros iniciais.

 #Rotas
 - Todas rotas estão com pasta base LMS portanto esta pasta deve ser colocada diretamente no diretorio htdocs ou www.
 - Ao acessar http://localhost/LMS deve ser redirecionado para rota /LMS/administracao/filadeprocessos.

 #Servidor Mock
 - Estou utilizando json-server como mock.
 - Dentro da pasta mock esta um arquivo db.json que salva os cadastros realizados ao clicar no botão integração.
 - Instalar npm install -g json-server
 - Dentro da pasta mock utilizar json-server --watch db.json --port 3000
 - Este comando indica porta 3000.
 - Requests do codigo tambem estão para porta 3000 LMS\src\service\integracaoService.php