<?php
  include("split.php");
  if (isset($_POST['submit'])) {
    $results = (empty($_POST['decimals'])) ? splitMoney($_POST['amount'], $_POST['divider']) : splitMoney($_POST['amount'], $_POST['divider'], $_POST['decimals']);
  }
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Split Cash Script</title>
  </head>
  <body>
    <form action="example.php" method="post">
      <label for="amount">Amount to be splitted</label> <input id="amount" type="number" step="any" name="amount" <?=(isset($_POST['amount']))?"value=\"{$_POST['amount']}\" ":''?> required><br/>
      <label for="divider">People</label> <input id="divider" type="number" name="divider" <?=(isset($_POST['divider']))?"value=\"{$_POST['divider']}\" ":''?> required><br/>
      <label for="decimals">Decimals</label> <input id="decimals" type="number" name="decimals" placeholder="Leave blank for default of 2" <?=(isset($_POST['decimals']))?"value=\"{$_POST['decimals']}\" ":''?>><br/>
      <input type="submit" name="submit" value="Calculate"><br/>
    </form>
  <?php if (isset($results)) : ?>
    <table>
      <tr><th>Person</th><th>Amount</th></tr>
    <?php foreach ($results as $key => $value) : ?>
      <tr>
        <td><?=$key+1?></td>
        <td><?=$value?></td>
      </tr>
    <?php endforeach; ?>
      <tr><td>Total</td><td><?=array_sum($results)?></td></tr>
    </table>
  <?php endif; ?>
  </body>
</html>
