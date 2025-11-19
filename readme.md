# Gestionnaire de tâches ultra-simple (PHP + MySQL)

> Une micro-application « Todo » en **~60 lignes** de PHP sans framework : ajoutez une tâche, cliquez pour la marquer comme terminée, fini.

---

## 🚀 Aperçu
![demo](demo.gif) *(remplacez par une capture d’écran de votre choix)*

- Une seule page `index.php`
- Pas de JavaScript
- 2 routes : `POST /` (créer) et `GET ?done=id` (marquer terminée)
- Design minimal via `style.css`

---

## 📦 Prérequis
- PHP ≥ 7.4
- MySQL / MariaDB
- Un serveur web (Apache, Nginx, PHP-built-in…)

---

## ⚙️ Installation en 30 secondes

1. Clonez ou téléchargez le repo
```bash
git clone https://github.com/YOU/simple-todo.git
cd simple-todo
```

2. Importez le schéma SQL
```sql
CREATE DATABASE todo CHARACTER SET utf8mb4;
USE todo;

CREATE TABLE tasks (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  title      VARCHAR(255) NOT NULL,
  description TEXT,
  is_done    TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

3. Créez `db.php` (non versionné) :
```php
<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=todo;charset=utf8mb4',
    'USER',           // changez
    'PASSWORD',       // changez
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
```

4. Pointez la racine du projet sur `index.php` ou lancez :
```bash
php -S localhost:8000
```

5. Ouvrez http://localhost:8000 → enjoy !

---

## 📁 Arborescence
```
.
├── index.php      # logique + rendu
├── db.php         # connexion PDO (à créer)
├── style.css      # quelques styles
└── README.md
```

---


## 📄 Licence
MIT – faites-en ce que vous voulez.

---

