
<?php
$types = $viewVars['findAllForTypesButton'];
?>

<div class="container ">
  <div class="row d-flex ">
<?php foreach ($types as $type ) : ?>
<a href="<?= $_SERVER['BASE_URI'] ?>/list/<?= $type->getId(); ?>"   class=" col-2 type-badge badge " style="background-color:#<?= $type->getColor() ?>;"><?= $type->getName() ?></a>
<?php endforeach ?>
  </div>
</div>