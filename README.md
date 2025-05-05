
# 📚 Facilita - Sistema de Empréstimos de Livros

Facilita é uma aplicação web desenvolvida em Laravel para gerenciar empréstimos de livros. Permite o cadastro de usuários, livros, gêneros e o controle completo dos empréstimos com datas, status e muito mais.

## ⚙️ Tecnologias

- PHP 8.2.x
- Laravel 12.x
- Tailwind CSS
- Lucide Icons
- Vite
- MySQL (ou qualquer banco compatível com Laravel)

---

## 🚀 Como rodar o projeto localmente

### 1. Clone o repositório usando SSH

```bash
git clone git@github.com:vgabrielk/facilita-app-backend.git
cd facilita-app-backend
```

### 2. Instale as dependências do PHP

```bash
composer install
```

### 3. Instale as dependências do Node

```bash
npm install
```

### 4. Copie o arquivo `.env` e configure

```bash
cp .env.example .env
```

Edite o arquivo `.env` com suas credenciais do banco de dados:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=facilita
DB_USERNAME=root
DB_PASSWORD=password
```

### 4. Gere a chave da aplicação

```bash
php artisan key:generate
```

### 5. Rode as migrations e seeders

```bash
php artisan migrate --seed
```

> ⚠️ As seeds são essenciais para popular a aplicação com alguns dados.

### 6. Rode o projeto (Backend e frontend)

```bash
composer run dev
```

> Isso compila os assets e inicia o Vite em modo de desenvolvimento, e inicia o servidor Laravel.


Acesse: [http://localhost:8000](http://localhost:8000)

---


## ✅ Funcionalidades

- Cadastro de usuários
- Cadastro e listagem de livros e gêneros
- Registro de empréstimos com data de devolução e status (`Devolvido`, `Atrasado`)
- Validações e mensagens em português

---
