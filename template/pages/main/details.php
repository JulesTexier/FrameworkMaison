<div class="container">
  <div class="grid">
    <div>
      <h1><?= $data['agenda']->getTitle() ?></h1>
      <h3>Date Details</h3>
      <p><?= $data['agenda']->getDetails() ?></p>
    </div>
    <div>
      <h2><?= date('d/m/y', $data['agenda']->getDatetime()) ?></h2>

      <a href="?page=remove&id=<?=$data['agenda']->getId() ?> " role="button" class="contrast outline">Supprimer</a>
    </div>
  </div>