    <form action="/tasks/create" method="POST">
        <input type="text" name="title" placeholder="Titre de la tâche" required>
        <textarea name="description" placeholder="Description de la tâche"></textarea>
        <select name="priority_id">
            <option value="1">Haute</option>
            <option value="2">Moyenne</option>
            <option value="3">Basse</option>
        </select>
        <button type="submit">Créer la tâche</button>
    </form>

    <?php if (isset($tasks) && !empty($tasks)): ?>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <?= htmlspecialchars($task['title']) ?> - <?= htmlspecialchars($task['priority_name']) ?>
                    <a href="/tasks/edit/<?= $task['id'] ?>">Modifier</a>
                    <a href="/tasks/delete/<?= $task['id'] ?>">Supprimer</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune tâche trouvée.</p>
    <?php endif; ?>
