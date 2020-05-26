<!-- <body> -->


   <!--  <img src="<?php echo $_SERVER['BASE_URI']; ?>/../resultat/home.png" alt="image"> -->

    <div class="  row mt-4 d-flex justify-content-center text-center ">
  <?php foreach ($viewVars['findAllFromPokemon'] as $allPokemon) : ?>
<!-- Ta card est parametre pour certaines colonne et avec le mr-5 et mb-5 on lui rajoute un margin right et bottom ce qui fait qu'il n'y a plus que 3 card par lignes et qu'elles sont toutes bien expacées -->
    <div class=" pokemonCard card col-xl-3 col-lg-4 col-sm-6 shadow p-3 mr-5 mb-5" >
      <div class="card-body">
        <div>
          <?= $allPokemon->getNom(); ?>
          <a href="<?= $router->generate('detail_by_name', ['pokemonId' => $allPokemon->getNumero()]) ?>"><img class="card-img-top" src="<?= $_SERVER['BASE_URI'] ?>/../public/img/<?= $allPokemon->getNumero(); ?>.png" alt="image"></a>

          #<?= $allPokemon->getNumero(); ?> <?= $allPokemon->getNom(); ?>
        </div>
      </div>
    </div>

  <?php endforeach; ?>
    </div>

   
<!-- </body> -->