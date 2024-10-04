<?php
$errors = [];
if ($this->session->isset("errors")) {
    $errors = $this->session->get("errors");
    $this->session->unset("errors");
}
?>
<div class="p-4  rounded-lg  bg-white shadow-sm">
    <h1 class="text-2xl font-bold mb-4"><?= htmlspecialchars($loi->titrel) ?></h1>
    <p class="text-gray-700 mb-4"><strong>Description:</strong> <?= nl2br(htmlspecialchars($loi->description)) ?></p>
    <p class="text-sm text-gray-500 mb-4"><strong>Date de création:</strong> <?= htmlspecialchars($loi->datel) ?></p>
    <p class="text-sm text-gray-500 mb-4"><strong>Statut:</strong> <?= ucfirst(htmlspecialchars($loi->etatl)) ?></p>

    <h2 class="text-xl font-bold mt-6 mb-2">Avis Associés</h2>
    <?php if (!empty($avis)): ?>
        <div class="space-y-4">
            <?php foreach ($avis as $item): ?>
                <div class="p-4 border rounded-lg bg-gray-50 shadow-md">
                    <p><strong>Date:</strong> <?= htmlspecialchars($item->datea) ?></p>
                    <p><strong>Contenu:</strong></p>
                    <pre class="whitespace-pre-wrap text-sm text-gray-700"><?= nl2br(htmlspecialchars($item->contenu)) ?></pre>
                    <p><strong>Soumis par:</strong> <?= htmlspecialchars($item->nom) . ' ' . htmlspecialchars($item->prenom) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-gray-500">Aucun avis disponible pour cette loi.</p>
    <?php endif; ?>

    <h2 class="text-xl font-bold mt-6 mb-2">Donner un Avis</h2>
<form action="" method="post" class="space-y-4">
    <input type="hidden" name="idl" value="<?= $loi->idl ?>">
    <input type="hidden" name="idu" value="<?= $_SESSION['userConnect']->idu ?>">
    <input type="hidden" name="controller" value="lois">

    <div>
        <label for="titrea" class="block text-sm font-medium text-gray-700">Titre</label>
        <input type="text" name="titrea" id="titrea" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?= htmlspecialchars($_POST['titrea'] ?? '') ?>">
        <p class="text-sm text-red-600 dark:text-red-400"> <?= $errors["titrea"] ?? "" ?> </p>
    </div>
    <div>
        <label for="contenu" class="block text-sm font-medium text-gray-700">Contenu </label>
        <textarea id="contenu" name="contenu" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500"></textarea>
        <p class="text-sm text-red-600 dark:text-red-400"> <?= $errors["contenu"] ?? "" ?> </p>
    </div>

    <button name="addavis" type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Soumettre l'Avis</button>
</form>
</div>


