<?php 
session_start();
require_once 'config/db.php';
$stmt = $pdo->query("SELECT * FROM consultas ORDER BY data_consulta ASC");
$consultas = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>PetHealth - Gestão de Consultas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen p-4 md:p-10">
    <div class="max-w-5xl mx-auto">
        <header class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-800">🐾 PetHealth</h1>
                <p class="text-slate-500">Controle de Agendamentos Veterinários</p>
            </div>
            <a href="views/cadastrar.php" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition shadow-lg">
                + Nova Consulta
            </a>
        </header>

        <?php if(isset($_SESSION['success'])): ?>
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6 text-center font-medium">
                <?= $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 border-b">
                    <tr>
                        <th class="p-4 text-slate-600 font-semibold">Animal</th>
                        <th class="p-4 text-slate-600 font-semibold">Data</th>
                        <th class="p-4 text-slate-600 font-semibold">Sala</th>
                        <th class="p-4 text-slate-600 font-semibold text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($consultas)): ?>
                        <tr>
                            <td colspan="4" class="p-10 text-center text-slate-400 italic">
                                Nenhuma consulta agendada no momento.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($consultas as $c): ?>
                            <tr class="border-b hover:bg-slate-50 transition">
                                <td class="p-4 font-medium text-slate-800"><?= htmlspecialchars($c['nome_animal']) ?></td>
                                <td class="p-4 text-slate-600"><?= date('d/m/Y', strtotime($c['data_consulta'])) ?></td>
                                <td class="p-4 text-slate-600"><?= $c['numero_sala'] ?></td>
                                <td class="p-4 flex justify-center gap-2">
                                    <a href="views/detalhes.php?id=<?= $c['id'] ?>" class="text-xs bg-slate-200 text-slate-700 px-3 py-1 rounded hover:bg-slate-300">Visualizar</a>
                                    <a href="views/editar.php?id=<?= $c['id'] ?>" class="text-xs bg-blue-100 text-blue-600 px-3 py-1 rounded hover:bg-blue-200">Editar</a>
                                    <a href="actions/process.php?action=delete&id=<?= $c['id'] ?>" 
                                       onclick="return confirm('Deseja realmente excluir este agendamento?')" 
                                       class="text-xs bg-red-100 text-red-600 px-3 py-1 rounded hover:bg-red-200">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
