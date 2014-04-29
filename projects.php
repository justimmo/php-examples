<?php

include_once('config.php');

$mapper = new \Justimmo\Model\Mapper\V1\ProjectMapper();
$q = new \Justimmo\Model\ProjectQuery($api, new \Justimmo\Model\Wrapper\V1\ProjectWrapper($mapper), $mapper);

$projects = $q->setLimit(100)
    ->set('alle', 1)
    ->find();
?>

<h1>Projekte</h1>

<ul>
    <?php foreach ($projects as $project): ?>
        <li>
            <a href="project.php?id=<?php echo $project->getId() ?>"><?php echo $project->getTitle(); ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<hr />
<pre>
<?php print_r($projects); ?>
</pre>
