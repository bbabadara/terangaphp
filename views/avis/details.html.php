<div class="p-4 border-1 border-gray-200  rounded-lg dark:border-gray-700 ">

<h1 class="text-2xl font-bold mb-4">Détails de l'Avis</h1>

<div class="bg-white p-4 rounded-lg shadow-md">
    <p><strong>Date :</strong> <?= date("d/m/Y H:i", strtotime($avis->datea)) ?></p>
    <p><strong>Titre :</strong> <?= htmlspecialchars($avis->titrea) ?></p>
    <p><strong>Contenu :</strong></p>
    <pre class="whitespace-pre-wrap"><?= nl2br(htmlspecialchars($avis->contenu)) ?></pre>
    <p><strong>État :</strong> <?= ucfirst(htmlspecialchars($avis->etata)) ?></p>
    <p><strong>Soumis par :</strong> <?= htmlspecialchars($avis->nom . ' ' . $avis->prenom) ?></p>
    <p><strong>Loi :</strong> <?= htmlspecialchars($avis->titrel) ?></p>
</div>

<h2 class="text-xl font-bold mt-6 mb-2">Actions</h2>
<form action="" method="post" class="space-y-4">
    <div>
        <input type="hidden" name="ida" value="<?= $avis->ida ?>">
        <input type="hidden" name="controller" value="avis">
        <input type="hidden" name="action" value="details">
        <button name="etat" value="approved" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Approuver</button>
        <button name="etat" value="rejected" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Rejeter</button>
    </div>
</form>
</div>