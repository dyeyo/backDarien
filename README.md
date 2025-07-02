# 🧰 Laravel Tasks API

Este es un proyecto de **API REST desarrollada con Laravel 11** para la gestión de tareas personales por usuario, utilizando autenticación vía **Laravel Sanctum**.

---

## 📋 Requisitos

- **PHP >= 8.1**
- **Composer**
- **Base de datos MySQL o MariaDB**

---

## 🚀 Instalación

1. **Clona el repositorio**:

   ```bash
   git clone https://github.com/dyeyo/FrontDarien-.git
   cd laravel-tasks-api
   ```

2. **Instala las dependencias**:

   ```bash
   composer install
   ```

3. **Copia el archivo de entorno y genera la clave**:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configura el archivo `.env` con los datos de tu base de datos**:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Crea la base de datos** (si aún no existe):

   ```sql
   CREATE DATABASE task_db;
   ```

6. **Ejecuta las migraciones**:

   ```bash
   php artisan migrate
   ```

7. **(Opcional) Poblar con datos de prueba**:

   ```bash
   php artisan db:seed
   ```

---

## 🔐 Autenticación

Usa **Laravel Sanctum**. Regístrate o inicia sesión en:

- `POST /api/register`
- `POST /api/login`

Usa el token recibido como:

```
Authorization: Bearer TU_TOKEN
```

---

## 📡 Rutas Disponibles

- `GET /api/tasks` – Listar tareas
- `POST /api/tasks` – Crear tarea
- `GET /api/tasks/{id}` – Ver tarea
- `PUT /api/tasks/{id}` – Actualizar tarea
- `DELETE /api/tasks/{id}` – Eliminar tarea

> ⚠️ Todas las rutas están protegidas con el middleware `auth:sanctum`.

---

## 🧪 Pruebas

1. **Configura el entorno de pruebas en `phpunit.xml`**:

   ```xml
   <env name="APP_ENV" value="testing"/>
   <env name="DB_CONNECTION" value="mysql"/>
   <env name="DB_DATABASE" value="task_db"/>
   <env name="DB_USERNAME" value="root"/>
   <env name="DB_PASSWORD" value=""/>
   ```

2. **Prepara la base de datos de testing**:

   ```bash
   php artisan migrate --env=testing
   ```

3. **Ejecuta las pruebas**:

   ```bash
   php artisan test
   ```

4. **Filtra una prueba específica**:

   ```bash
   php artisan test --filter=TaskControllerTest
   ```

---

## 🏗️ Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/   # Controladores
│   ├── Requests/      # Validaciones
│   └── Services/      # Lógica de negocio
├── Models/            # Modelos Eloquent
tests/
└── Feature/           # Pruebas Feature
```

---

## 🧱 Tecnologías

- Laravel 11
- Sanctum
- Eloquent ORM
- PHPUnit

---

## 👤 Autor

**Diego Vallejo**  
📧 Contacto: [diegovallejob@gmail.com](mailto:diegovallejob@gmail.com)  
🔗 Repositorio: [hhttps://github.com/dyeyo](hhttps://github.com/dyeyo)
---