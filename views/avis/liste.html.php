<div class="p-4 border-1 border-gray-200  rounded-lg dark:border-gray-700 ">

<h1 class="text-2xl font-bold mb-4">Liste des Avis</h1>
        
        <?php if (!empty($avis)): ?>
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Date</th>
                        <th class="py-2 px-4 border-b">Titre</th>
                        <th class="py-2 px-4 border-b">État</th>
                        <th class="py-2 px-4 border-b">Soumis par</th>
                        <th class="py-2 px-4 border-b">Loi</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($avis as $item): ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($item->datea) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($item->titrea) ?></td>
                            <td class="py-2 px-4 border-b"><?= ucfirst(htmlspecialchars($item->etata)) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($item->nom . ' ' . $item->prenom) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($item->titrel) ?></td>
                            <td class="py-2 px-4 border-b">
                                <a href=" <?=$this->path("avis","details",["key"=>$item->ida])?>" class="text-blue-500 hover:text-blue-700">Détails</a></td>
                               
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-gray-500">Aucun avis disponible.</p>
        <?php endif; ?>
    </div>