Abrace CMS/Blog
========================

Sistema CMS/Blog desenvolvido com Symfony 3 + Doctrine 2
Para ABRACE Esperança - Associação Brasileira de Apoio Cannabis Esperança

[![Build Status](https://travis-ci.org/WeDevBrasil/abrace.svg?branch=master)](https://travis-ci.org/WeDevBrasil/abrace)

Requirementos
------------

  * PHP 7.0 ou maiosr;
  * extensão PDO-SQLite do PHP habilitado;
  * e [todos os requerimentos do Symfony](http://symfony.com/doc/current/reference/requirements.html).

Se não tiver certeza sobre como atender a esses requisitos, baixe o codigo e 
navegue no script `http://localhost:8000/config.php` para obter mais detalhes
em formação.

Instalação
------------

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

Uso
-----

Não é necessário configurar um virtual host em servidor Web para acessar o aplicativo.
Basta usar o servidor web integrado:

```bash
$ cd abrace/
$ php bin/console server:run
```

Este comando iniciará um servidor web para o aplicativo Symfony. Agora você pode
acessar o aplicativo no seu navegador em <http://localhost:8000>. Você pode
parar o servidor web incorporado pressionando `Ctrl + C` enquanto estiver no
terminal.

> **NOTA**
>
> Se você quiser usar um servidor web com todas as características (como Nginx ou Apache) para executar
> Symfony Demo, configure-o para apontar para o diretório `web /` do projeto. Para mais detalhes, veja:
> For more details, see:
> http://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html

Possíveis Problemas
---------------

