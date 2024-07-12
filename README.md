Инструкция по установке и запуску

Шаг 1: Клонирование репозитория
git clone https://github.com/GGDelivery/ToDoList.git
cd ToDoList

Шаг 2: Установка зависимостей
composer install

Шаг 3: Настройка окружения
Скопируйте файл .env.example в .env:
Введите в терминале "cp .env.example .env"
Отредактируйте .env файл, настроив подключение к базе данных и другие параметры.

Шаг 4: Миграция базы данных
php artisan migrate

Шаг 5: Запуск приложения
php artisan serve
