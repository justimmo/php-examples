<?php

require_once 'config.php';

$mapper  = new \Justimmo\Model\Mapper\V1\RealtyMapper();
$q       = new \Justimmo\Model\RealtyQuery($api, new \Justimmo\Model\Wrapper\V1\RealtyWrapper($mapper), $mapper);
$objekte = $q->setLimit(100)
    ->find();

?>
<h1>Objekte</h1>

<ul style="list-style: none">
    <?php /** @var \Justimmo\Model\Realty $objekt */ ?>
    <?php foreach ($objekte as $objekt): ?>
        <li>
            <?php /** @var \Justimmo\Model\Attachment $picture */ ?>
            <?php foreach ($objekt->getPictures() as $picture): ?>
                <img src="<?php echo $picture->calculateUrl('small'); ?>" width="100" height="75"/>
                <?php break; ?>
            <?php endforeach; ?>
            <a href="realty.php?id=<?php echo $objekt->getId() ?>">
                <?php echo $objekt->getTitle(); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<hr/>
<pre>
<?php print_r($objekte); ?>
</pre>
