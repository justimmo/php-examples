<?php

require_once 'config.php';

$mapper = new \Justimmo\Model\Mapper\V1\RealtyMapper();
$q = new \Justimmo\Model\RealtyQuery($api, new \Justimmo\Model\Wrapper\V1\RealtyWrapper($mapper), $mapper);

$objekt = $q->findPk($_GET['id']);
?>

<h1>Objektdetail</h1>

<h2><?php echo $objekt->getTitle(); ?></h2>

<?php echo $objekt->getDescription(); ?>
<?php echo $objekt->getCategories(); ?>
<?php foreach ($objekt->getAttachments() as $attachment): ?>
    <img src="<?php echo $attachment->getUrl() ?>" style="max-width: 150px;" />
<?php endforeach; ?>

<hr />
<pre>
<?php print_r($objekt); ?>
</pre>
