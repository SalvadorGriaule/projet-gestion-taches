<?php
require_once __DIR__ . '/db.php';
if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['title'])){
 $stmt=$pdo->prepare('INSERT INTO tasks (title,description) VALUES (:t,:d)');
 $stmt->execute([':t'=>$_POST['title'],':d'=>$_POST['description']??'']);
 header('Location: index.php'); exit;
}
if (isset($_GET['done'])){
 $stmt=$pdo->prepare('UPDATE tasks SET is_done=1 WHERE id=:id');
 $stmt->execute([':id'=>(int)$_GET['done']]);
 header('Location: index.php'); exit;
}
$tasks=$pdo->query('SELECT * FROM tasks ORDER BY created_at DESC')->fetchAll();
?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Gestion tâches</title>
<link rel="stylesheet" href="style.css"></head><body><div class="container">
<h1>Gestion de tâches</h1>
<form method="post">
<input name="title" required placeholder="Titre">
<textarea name="description" placeholder="Description"></textarea>
<button>Ajouter</button>
</form>
<ul>
<?php foreach($tasks as $t): ?>
<li><?=htmlspecialchars($t['title'])?> - <?= $t['is_done']?'✔':'❌'?>
<?php if(!$t['is_done']): ?>
 <a href="?done=<?=$t['id']?>">Terminer</a>
<?php endif; ?>
</li>
<?php endforeach; ?>
</ul>
</div></body></html>
