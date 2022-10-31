<div class="container">
  <?php
  include('/Applications/MAMP/htdocs/AgendaCool/template/_searchBar.php'); ?>


  <h2>Les RDV</h2>
  <table>
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Details</th>
        <th><a href="">DateTime</a></td>
        <th scope="col">Important ?</th>
        <th scope="col">Details</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['agendas'] as $agenda) { ?>
        <tr>
          <td><?= $agenda->getTitle() ?></td>
          <td><?= $agenda->getDetails() ?></td>
          <td><?= date('m/d/y', $agenda->getDatetime()) ?></td>
          <td><?= $agenda->getImportant() ?></td>
          <td><a href="?page=details&id=<?= $agenda->getId() ?>"><button>Voir le détail</button></a></td>
          <td><a href="/?page=remove&id=<?= $agenda->getId() ?>" role="button" class="contrast outline">Supprimer</a></td>
        </tr>
        <?php } ?>
  </table>
</div>