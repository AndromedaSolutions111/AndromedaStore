# AndromedaStore
**Loja Virtual Escolar**

## Sobre
Este projeto utiliza o framework **Laravel** para criar uma loja virtual voltada para instituições de ensino. Oferecemos um sistema robusto e escalável com suporte para múltiplas funcionalidades.

## Tecnologias
- **Laravel**: Framework PHP.
- **MySQL**: Banco de dados relacional.
- **React**: Biblioteca JavaScript para interfaces dinâmicas e componentes reutilizáveis.

## Documentação
- Para mais detalhes sobre o **Laravel**, veja a [documentação oficial](https://laravel.com/docs).
- Para aprender mais sobre **React**, consulte a [documentação oficial do React](https://react.dev).

## Instalação e Configuração
Siga os passos abaixo para configurar o projeto:

1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/AndromedaStore.git
   ```

2. Instale as dependências do PHP com o Composer:
   ```bash
   composer install
   ```

3. Configure o arquivo `.env` com suas credenciais:
   ```bash
   cp .env.example .env
   ```

4. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

5. Instale as dependências do React com npm ou Yarn:
   ```bash
   npm install
   ```
   ou
   ```bash
   yarn install
   ```

6. Execute as migrações do banco de dados:
   ```bash
   php artisan migrate
   ```

7. Compile os assets front-end:
   ```bash
   npm run dev
   ```
   ou
   ```bash
   yarn dev
   ```

8. Inicie o servidor local:
   ```bash
   php artisan serve
   ```

## Licença
Este projeto segue a licença [MIT](https://opensource.org/licenses/MIT).
