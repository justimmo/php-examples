<?php

require_once 'config.php';

$mapper = new \Justimmo\Model\Mapper\V1\RealtyMapper();
$q = new \Justimmo\Model\RealtyQuery($api, new \Justimmo\Model\Wrapper\V1\RealtyWrapper($mapper), $mapper);

$realty = $q->findPk($_GET['id']);
?>

<h1>Realty detail</h1>

<h2><?php echo $realty->getTitle(); ?></h2>

<?php echo $realty->getDescription(); ?>
<?php echo $realty->getCategories(); ?>
<?php foreach ($realty->getAttachments() as $attachment): ?>
    <img src="<?php echo $attachment->getUrl() ?>" style="max-width: 150px;" />
<?php endforeach; ?>

<hr />

<pre>
<?php print_r($realty); ?>
</pre>
