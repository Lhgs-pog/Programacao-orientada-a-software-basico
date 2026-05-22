<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Torneio Infinito - Lobby</title>
    <style>
        body { font-family: system-ui, sans-serif; background-color: #121212; color: #e0e0e0; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; background-color: #1e1e1e; }
        th, td { border: 1px solid #333; padding: 12px; text-align: left; }
        th { background-color: #2c2c2c; }
        .paginacao { display: flex; gap: 10px; justify-content: flex-start; }
        .btn { padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .btn:hover { background-color: #0056b3; }
        .btn.desativado { background-color: #555; pointer-events: none; color: #888; }
    </style>
</head>
<body>

    <h1>Lobby de Jogadores</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Pontuação</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($jogadores)): ?>
                <?php foreach ($jogadores as $jogador): ?>
                    <tr>
                        <td><?= htmlspecialchars($jogador['id']) ?></td>
                        <td><?= htmlspecialchars($jogador['nome']) ?></td>
                        <td><?= htmlspecialchars($jogador['pontuacao']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Nenhum jogador encontrado nesta página.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="paginacao">
        <?php if ($pagina > 1): ?>
            <a class="btn" href="?pagina=<?= $pagina - 1 ?>">Página Anterior</a>
        <?php else: ?>
            <a class="btn desativado" href="#">Página Anterior</a>
        <?php endif; ?>

        <a class="btn" href="?pagina=<?= $pagina + 1 ?>">Próxima Página</a>
    </div>

</body>
</html>