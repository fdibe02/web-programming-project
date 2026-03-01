# Web Programming Project

## Descrizione
Applicazione web (clode "base" di Medium) sviluppata in Laravel che permette la gestione di articoli con sistema di autenticazione utenti.

Il progetto implementa architettura MVC e gestione delle rotte tramite controller dedicati.

## Funzionalità principali
- Registrazione e login utenti
- Creazione articoli
- Modifica articoli
- Visualizzazione profili
- Aggiunta di like/preferiti
- Sezione articoli preferiti
- Ricerca articoli per nome o categoria
- Nascondi articoli/Dislike
- Routing strutturato
- Separazione logica / view tramite Blade

## Stack Tecnologico
- PHP
- Laravel
- MySQL
- Blade templating
- JavaScript
- CSS

## Struttura del Progetto
- `app/Http/Controllers` → Logica applicativa
- `app/Models` → Modelli Eloquent
- `resources/views` → Template Blade
- `routes/web.php` → Definizione routes

## Installazione

```bash
git clone <repo-url>
cd nome-progetto
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
