> # Miniframework
## Esse miniframework é voltado para pequenos projetos em PHP utilizando padrão MVC.
> ✨Status: Documentando...
### Instalação
1. Clone o repositório
```
git clone https://github.com/kdpenha/miniframework--php
```
2. Execute a instalação
```
composer install
```
## Como usar
> Tudo vai ser executado diante o diretório "public" mais precisamente no `index.php`.
### 1. Configure o banco de dados. </br>
   Localizado em `App/Connection.php`, o arquivo deve ser configurado utilizando PDO. Caso não saiba, recomendo que leia este artigo:
   > <a href="https://www.locaweb.com.br/ajuda/wiki/tudo-sobre-o-php-data-object-pdo-hospedagem-de-sites/">Como conectar a um banco MySQL usando PDO</a> </br></br>

### 3. Configure suas rotas</br>
   O arquivo de rota fica dentro do diretório App, nomeado como `Route.php`</br>
   É necessário que coloque uma "/" antes da rota, como por exemplo: `/contato`, para que seja válido.
   ~~~php
   $routes['contato'] = array(
            'route' => '/contato',
            'controller' => 'ContatoController',
            'action' => 'contato' // qual açao que sera disparada quando a rota for requisitada
   );
   ~~~
   A action é o método(função) que será disparado quando a rota for acessada. </br></br>
### 4. Crie o Controller da rota</br>
   O controller deve ser criado dentro de App/Controllers e lá deve ser colocada toda a lógica de negócios e visualização.</br>
   Ele deve ter o mesmo esqueleto do controller base dentro desse mesmo diretório. O `IndexController`.
~~~php
class ContatoController extends Action {
      public function contato() {
      }
}
~~~
### 5. Views
### Layouts
**Crie os layouts soltos dentro da pasta View para utilizar em suas views.** </br>
Os layouts conterão a estrutura HTML com o head e o body. Ele fica localizado em `App/Views` e todas as configurações de head devem ser feitas nele.</br>
O nome você que decide, porém, recomendo que coloque um nome de fácil assimilação com a view desse layout. **E OUTRA!!!** Um layout pode ser utilizado para várias views.
~~~php
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JVRB - Contato</title>
    <link rel="stylesheet" href="css/Contato.css" />
    <script defer src="app.js"></script>
  </head>
<body>
    <?= $this->content() ?>
</body>
</html>
~~~
`<?= $this->content() ?>` é a view que será renderizada por meio do controller. </br>
Lembre-se! Tudo é executado em `public/index.php`, então CSS, JS e etc devem estar localizados dentro de public ou sendo apontados á partir de lá. </br>
### Views
As views devem ser criadas de acordo com seu Controller. Se você vai criar uma view para o controller ContatoController, é de <strong>SUMA IMPORTÂNCIA</strong> que crie uma pasta com o primeiro nome do controller e coloque sua view lá dentro.</br>
 1. Localize a pasta App/Views </br>
 2. Crie uma pasta com o primeiro nome do controller da view que você vai fazer. </br>
 Se o controller AppController renderiza uma view, é necessário que essa view esteja dentro de uma pasta chamada "app". Se o controller se chamasse ContatoController, a pasta da view se chamaria contato.</br>
 3. Crie sua view contendo apenas o conteúdo que ficará dentro do body.</br>
### 6. Renderizando View com Layout pelo Controller</br>
Seguindo o exemplo de ContatoController, ele renderiza a View contato que foi criada dentro do diretório `Views/contato/contato.phtml` que tem o layout criado em `Views/layout_contato.phtml`. </br>
1. Utilize a função `$this->render('view', 'layout_da_view');`</br>
~~~php
public function contato() {
            $this->render('contato', 'layout_contato');
        }
~~~
Isso fará com que o conteúdo dentro da view `contato` seja renderizado com o layout, head e etc de `layout_contato`
