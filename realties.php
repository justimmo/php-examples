<?php

require_once 'config.php';

$page = !empty($_GET['page']) ? $_GET['page'] : 1;

$mapper  = new \Justimmo\Model\Mapper\V1\RealtyMapper();
$q       = new \Justimmo\Model\RealtyQuery($api, new \Justimmo\Model\Wrapper\V1\RealtyWrapper($mapper), $mapper);
$pager = $q->paginate($page, 10);

?>
<h1>Objektanzahl: <?php echo $pager->getNbResults(); ?></h1>

<ul style="list-style: none">
    <?php /** @var \Justimmo\Model\Realty $objekt */ ?>
    <?php foreach ($pager as $objekt): ?>
        <li>
            <?php /** @var \Justimmo\Model\Attachment $picture */ ?>
            <?php foreach ($objekt->getPictures() as $picture): ?>
                <img src="<?php echo $picture->calculateUrl('small'); ?>" width="100" height="75"/>
                <?php break; ?>
            <?php endforeach; ?>
            <a href="realty.php?id=<?php echo $objekt->getId(); ?>">
                <?php echo $objekt->getTitle(); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php if($pager->haveToPaginate()) : ?>
    <ul>
        <?php if ($page != $pager->getFirstPage()) : ?>
            <li><a href="realties.php?page=<?php echo $page - 1 ?>">vorherige Seite</a></li>
        <?php endif; ?>
        <?php if ($page != $pager->getLastPage()) : ?>
            <li><a href="realties.php?page=<?php echo $page + 1 ?>">nächste Seite</a></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>

<hr/>
<pre>
<?php print_r($pager); ?>
</pre>
