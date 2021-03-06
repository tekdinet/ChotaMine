<?php
require_once 'lib/functions.php';

$redmine = new Redmine();
print_r($_POST['project']);
//unset($_POST['project']['custom_field_values']);
$project = $redmine->saveProject($_POST['project']);

?>
<?php require 'html/head.html.php'; ?>
<table width="100%" cellspacing="0" cellpadding="5">
<?php 
$i = 0;

// Header row
$span = count($issues[0]);
$class = 'row' . ($i & 1);
$i++;
echo '<tr class="'.$class.'"><td colspan="'.$span.'"><h2>Here\'s what happened!</h2></td></tr>'."\n";

// Field names
$fields = array_keys($issues[0]);
$class = 'row' . ($i & 1);
$i++;
echo '<tr class="'.$class.'">';
array_walk($fields, 'issues_result');
echo '</tr>'."\n";

foreach ($issues as $line) {
	$class = 'row' . ($i & 1);
	echo '<tr class="'.$class.'"><td>';
	echo implode('</td><td>', $line);
	echo '</td></tr>'."\n";
	
	$i++;
}
?>
</table>

<?php require 'html/footer.html.php'; ?>
