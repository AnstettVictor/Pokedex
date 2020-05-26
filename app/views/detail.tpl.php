<?php
$pokemon = $viewVars['findAllFromPokemonByNumero'];
?>

<!-- <img src="<?= $_SERVER['BASE_URI'] ?>/../resultat/detail.png" alt="image"> -->

<h2 class="text-center" >Détails de <?= $pokemon->getNom() ?></h2>

<div class="container">
    <div class="row">
        <div class="col">
            <div class=" imagePokemon ">
                <!-- une image  -->
                <img src="<?= $_SERVER['BASE_URI'] ?>/../public/img/<?= $pokemon->getNumero(); ?>.png" class=" card-img-top" alt="...">
            </div>
        </div>    
            <!-- le nom  -->
            <div class="col">
                <div class=" cardPokemon card-body">

                    <h5>#<?= $pokemon->getNumero(); ?><?= $pokemon->getNom(); ?></h5>
                    <!-- type -->
                    <?php foreach ($viewVars['getTypeByPokemon'] as $types ) : ?>
                    <span class="badge badge-primary" style="background-color: #<?= $types->getColor()?>"><?= $types->getName() ?></span>
                    <?php endforeach ?>
                    <h5>Statistiques</h5>
                    <!-- Stats -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            PV
                            <?= $pokemon->getPv(); ?>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:<?= (($pokemon->getPv() * 100) / 255) ?>%" aria-valuenow="<?= $pokemon->getPv() ?>" aria-valuemin="0" aria-valuemax="255"></div>
                        </li>
                        <li class="list-group-item">
                            Attaque
                            <?= $pokemon->getAttaque(); ?>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= (($pokemon->getAttaque() * 100) / 255) ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="255"></div>
                        </li>
                        <li class="list-group-item">
                            Défense
                            <?= $pokemon->getDefense(); ?>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= (($pokemon->getDefense() * 100) / 255) ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="255"></div>
                        </li>
                        <li class="list-group-item">
                            Attaque spé.
                            <?= $pokemon->getAttaque_spe(); ?>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= (($pokemon->getAttaque_spe() * 100) / 255) ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="255"></div>
                        </li>
                        <li class="list-group-item">
                            Défense spé.
                            <?= $pokemon->getDefense_spe(); ?>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= (($pokemon->getDefense_spe() * 100) / 255) ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="255"></div>
                        </li>
                        <li class="list-group-item">
                            Vitesse
                            <?= $pokemon->getVitesse(); ?>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= (($pokemon->getVitesse() * 100) / 255) ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="255"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
<a href="<?= $_SERVER['BASE_URI'] ?>/" class="text-white " >Revenir a la liste</a>
</div>
