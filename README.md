# 📅 Agenda Pessoal - Laravel + Vite

Este é um sistema de **agenda pessoal** desenvolvido em **Laravel**, com autenticação completa, gerenciamento de tarefas e exportação de dados.  
O projeto foi totalmente **dockerizado manualmente**, utilizando containers separados para **PHP**, **MySQL**, **Nginx** e **Vite**.

---

## 🚀 Funcionalidades

- 🔐 Autenticação completa:
  - Registro de usuários
  - Login/Logout
  - Redefinição de senha
  - Confirmação de e-mail
- 📝 CRUD de tarefas:
  - Cadastrar título, descrição, local, data de início e fim
  - Editar e excluir tarefas
  - Paginação da listagem
- 📤 Exportação de tarefas em **Excel** (Laravel Excel)
- 🎨 Frontend moderno com **Bootstrap + Vite**
- 🔍 Pesquisa de tarefas por título
- 🐳 Totalmente **Dockerizado**

---

## 🛠️ Tecnologias utilizadas

- **PHP 8+**
- **Laravel 10**
- **Laravel UI (Bootstrap Auth)**
- **Laravel Excel**
- **Vite** (build do frontend)
- **MySQL**
- **Docker & Docker Compose**

---

## 📦 Estrutura Docker

O projeto utiliza os seguintes containers:

- **agenda_php** → PHP-FPM com Laravel  
- **agenda_mysql** → Banco de dados MySQL  
- **agenda_nginx** → Servidor Nginx para servir a aplicação  
- **agenda_vite** → Build e hot reload do frontend  

---

## ⚙️ Como rodar o projeto

### 1. Clone o repositório
```bash
git clone https://github.com/seu-usuario/agenda-pessoal.git
cd agenda-pessoal
```

### 2. Configure o `.env`
Copie o arquivo de exemplo:
```bash
cp .env.example .env
```
Edite as variáveis conforme necessário (DB, Mail, etc).

### 3. Suba os containers
```bash
docker-compose up -d --build
```

### 4. Instale as dependências
```bash
docker exec -it agenda_php composer install
docker exec -it agenda_php php artisan key:generate
```

### 5. Rode as migrações
```bash
docker exec -it agenda_php php artisan migrate
```

### 6. Build do frontend
```bash
docker exec -it agenda_vite npm install
docker exec -it agenda_vite npm run dev
```

### 7. Acesse o sistema
- Backend: 👉 [http://localhost:8000](http://localhost:8000)  
- Vite (dev server): 👉 [http://localhost:5173](http://localhost:5173)

---

## 📤 Exportação Excel

As tarefas podem ser exportadas clicando no botão **Exportar Excel** na listagem.

---

## 📧 Notificações por e-mail

O sistema utiliza o serviço de e-mail configurado no `.env` para:
- Confirmação de cadastro
- Redefinição de senha  

Sugestão: utilize o [Mailtrap](https://mailtrap.io/) para testes em ambiente de desenvolvimento.

---

## 📸 Screenshots

### Tela inicial
![Agenda](docs/screenshot-home.png)

---

## 🤝 Contribuições

Contribuições são bem-vindas!  
Para contribuir:
1. Faça um fork
2. Crie uma branch (`git checkout -b minha-feature`)
3. Commit suas mudanças (`git commit -m 'Adiciona nova feature'`)
4. Push para a branch (`git push origin minha-feature`)
5. Abra um Pull Request

---

## 📜 Licença

Este projeto está sob a licença MIT.
