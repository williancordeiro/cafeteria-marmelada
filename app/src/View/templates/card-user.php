<?php
if (!isset($_SESSION))
    session_start();
?>

<div class="card">
    <div class="card-header">
        <h2>Seja bem-vindo(a)! <?php echo htmlspecialchars($user->getName()); ?></h2>
    </div>
    <div class="card-body">
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($user->getName()); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user->getEmail()); ?></p>
        <h2>☕</h2>
    </div>
</div>