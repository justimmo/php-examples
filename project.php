<?php

include_once('config.php');

$mapper = new \Justimmo\Model\Mapper\V1\ProjectMapper();
$q = new \Justimmo\Model\ProjectQuery($api, new \Justimmo\Model\Wrapper\V1\ProjectWrapper($mapper), $mapper);

$project = $q->findPk($_GET['id']);
?>

<h1>Projektdetail</h1>

<h2><?php echo $project->getTitle() ?></h2>

<?php echo $project->getDescription() ?>

<?php foreach ($project->getAttachments() as $attachment): ?>
    <img src="<?php echo $attachment->getUrl() ?>" style="max-width: 150px;" />
<?php endforeach; ?>

<hr />
<pre>
<?php print_r($project); ?>
</pre>
