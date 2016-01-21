<?php

require_once 'config.php';

$page = !empty($_GET['page']) ? $_GET['page'] : 1;

$mapper = new \Justimmo\Model\Mapper\V1\RealtyMapper();
$q = new \Justimmo\Model\RealtyQuery($api, new \Justimmo\Model\Wrapper\V1\RealtyWrapper($mapper), $mapper);
$pager = $q->paginate($page, 10);

?>
<h1>Objektanzahl: <?php echo $pager->getNbResults(); ?></h1>

<table border="1">
    <?php /** @var \Justimmo\Model\Realty $realty */ ?>
    <?php foreach ($pager as $realty): ?>
        <tr>
            <td>
                <?php /** @var \Justimmo\Model\Attachment $picture */ ?>
                <?php foreach ($realty->getPictures() as $picture): ?>
                    <img src="<?php echo $picture->calculateUrl('small'); ?>" width="100" height="75"/>
                    <?php break; ?>
                <?php endforeach; ?>
            </td>
            <td>
                <a href="realty.php?id=<?php echo $realty->getId(); ?>">
                    <?php echo $realty->getTitle(); ?><br>
                    <?php echo $realty->getZipCode(); ?>
                    <?php echo $realty->getPlace(); ?><br>
                    <?php echo $realty->getNetRent() ?><br>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php if ($pager->haveToPaginate()) : ?>
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
