<p>Dit zijn alle recepten:</p>
<table id='tabel'>
  <tr>
    <th>naam</th>
    <th>boek</th>
    <th>pagina</th>


  </tr>

  <?php foreach($recipes as $recipe) {
  ?>
  <tr>
    <td><?php echo $recipe->receptNaam; ?></td>
    <td><?php echo $recipe->boekNaam; ?></td>
    <td><?php echo $recipe->pagina; ?></td>
    <td><a href='?controller=recipes&action=show&receptID=<?php echo $recipe->receptID; ?>'>meer informatie</a></td>

  </tr>

  <?php }
  ?>
</table>
