

<div class="p-4 border-1 border-gray-200  rounded-lg dark:border-gray-700 ">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    
      <?php foreach ($lois as $loi): ?>
            <a href="<?=$this->path("lois","details",["key"=>$loi->idl])?>" class="block">
                <div class="bg-white rounded-lg shadow-lg p-5 card">
                    <img src="images/sceau.png" alt="sceau" class="rounded-t-lg mb-4 h-48 w-full object-cover">
                    <h2 class="text-lg font-bold mb-2"><?= $loi->titrel ?></h2>
                    <p class="text-gray-700 mb-2"><?= $loi->description ?></p>
                    <p class="text-sm text-gray-500">Statut: <?= ucfirst($loi->etatl) ?></p>
                </div>
            </a>
        <?php endforeach; ?>
</div>
</div>



