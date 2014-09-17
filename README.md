# Projeto Interdisciplinar IV e V

Este é o projeto que será usado para obtenção da nota de Projeto Interdisciplinar IV e V no Curso Superior de Técnologia em Análise e Desenvolvimento pelo Centro de Ciências Exatas da Universidade Tuiuti do Paraná


## Instalação

1. Clone o repositório: `git clone https://github.com/wellintonperazzoli/ProjetoInterdisciplinar.git` ou utilize a ferramenta do GitHub.
2. Verifique se as configurações do banco de dados no arquivo `app/config/database.php` estão de acordo com o banco urilizado.
3. Caso use o apache, configure-o para que o DocumentRoot seja a pasta `Public` do projeto. Caso não queira utilizar Se preferir, execute o arquivo `start.bat` caso windows ou `start.sh` caso linux dentro da pasta raíz do projeto, no caso exclusivo do windows, o arquivo bat está configurado para executar o php dentro da pasta do xampp da máquina fazendo assim com que, dependendo, você tenha que mudar esse caminho. No caso de usuários linux, é necessário possuir instalado o `php 5.4+`.
4. Execute os script de criação do banco de dados que se encontram na pasta do projeto.
5. Veja sua aplicação no navegador pelo localhost, ou no caso de execução por script: `localhost:9000`
