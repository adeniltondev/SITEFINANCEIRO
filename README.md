# Sistema de Controle Financeiro Pessoal (PHP)

Sistema completo para controle financeiro pessoal, pronto para hospedagem na Hostinger.

## Funcionalidades
- Cadastro e login de usuários
- Dashboard com resumo financeiro
- Cadastro, edição e exclusão de receitas e despesas
- Gerenciamento de categorias
- Relatórios mensais e por categoria
- Exportação para Excel e PDF
- Interface responsiva (Bootstrap)
- Segurança: hash de senha, CSRF, sessões seguras

## Requisitos
- PHP 7.4+
- MySQL 5.7+
- Hospedagem compatível (ex: Hostinger)

## Instalação
1. **Suba todos os arquivos para o seu domínio na Hostinger**
   - Aponte o diretório público do domínio para a pasta `public`.
2. **Crie um banco de dados MySQL**
   - Anote usuário, senha, host e nome do banco.
3. **Configure a conexão**
   - Edite `config/database.php` com os dados do seu banco.
4. **Crie as tabelas**
   - Importe o arquivo `config/schema.sql` no seu banco de dados (via phpMyAdmin ou terminal).
5. **Acesse o sistema**
   - Abra o domínio no navegador e cadastre o primeiro usuário.

## Estrutura de Pastas
- `public/` — arquivos acessíveis pelo navegador (index.php, login.php, etc)
- `src/` — código PHP principal (modelos, bootstrap, segurança)
- `config/` — configurações e schema SQL
- `templates/` — arquivos de interface HTML/PHP
- `assets/` — CSS, JS, imagens

## Observações
- O sistema utiliza Bootstrap via CDN para responsividade.
- Para exportação PDF, o navegador pode exibir como HTML para impressão. Para PDF real, utilize uma biblioteca como dompdf (opcional).
- Recomenda-se usar HTTPS para maior segurança.

## Suporte
Dúvidas? Entre em contato com o desenvolvedor ou consulte a documentação da Hostinger para detalhes de hospedagem PHP/MySQL.
