<?php
require_once 'lib/functions.php';
Utils::requireLogin();

$redmine = new Redmine();
 
// Getting all Projects
$projects = $redmine->getProjects();
$projects = $redmine->processProjects($projects);


?>
<?php include 'html/head.html.php'; ?>
<form method="post" action="<?php echo Utils::getProcessLink(__FILE__); ?>" class="niceform">

<h2>Create a new project</h2>
<p>Will not work if you have any custom fields set to required.</p>
<table cellpadding="5" class="rows" width="900" align="center" cellspacing="0">
	<tr class="row0">
		<td align="right">Name *</td>
		<td align="left"><input type="text" name="project[name]" size="30"/></td>
	</tr>
	
	<tr class="row1">
		<td align="right">Parent</td>
		<td align="left"><?php echo Utils::Select($projects, 'project[parent_id]'); ?></td>
	</tr>

	<tr class="row0">
		<td align="right">Identifer *</td>
		<td align="left"><input type="text" name="project[identifier]" size="30"/></td>
	</tr>
		
	<tr class="row1">
		<td align="right">Description</td>
		<td align="left"><textarea name="project[description]" cols="28"></textarea></td>
	</tr>
	
	<tr class="row0">
		<td align="right">Homepage</td>
		<td align="left"><input type="text" name="project[homepage]" size="30" /></td>
	</tr>

	<tr class="row1">
		<td align="right">Public</td>
		<td align="left"><input type="checkbox" name="project[is_public]" value="1" /></td>
	</tr>

	<?php //echo Utils::customFieldRow($custom_fields['project'], 0); ?>
	
</table>
<p></p>
<table width="900" align="center">
<tr>
<td align="right">
	<input type="submit" name="project[submit" value="Save!" />
</td>
</tr>
</table>

</form>

<?php require 'html/footer.html.php'; ?>
