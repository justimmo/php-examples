<?php

require_once 'config.php';

use Justimmo\Model\RealtyQuery;
use Justimmo\Model\Wrapper\V1\RealtyWrapper;
use Justimmo\Model\Mapper\V1\RealtyMapper;

?>

<?php
// Ausgabe aller Objekte in der Kategorie Büros mittels einer RealtyQuery und sortieren nach netRent
$mapper = new RealtyMapper();
$wrapper = new RealtyWrapper($mapper);
$query = new RealtyQuery($api, $wrapper, $mapper);

$page = !empty($_GET['page']) ? $_GET['page'] : 1;
$pager = $query
    ->orderByPrice()
    ->filterByRent(true)
    ->paginate($page, 10)
?>

Result: <?php echo $pager->getNbResults(); ?><br><br>

<?php /** @var \Justimmo\Model\Realty $realty */ ?>
<table border="1">
    <tr>
        <th>Title</th>
        <th>Zip / Place</th>
        <th>Property number</th>
        <th>Total Rent</th>
    </tr>
<?php foreach ($pager as $realty): ?>
    <tr>
        <td><?php echo $realty->getTitle(); ?></td>
        <td><?php echo $realty->getZipCode(); ?> <?php echo $realty->getPlace(); ?></td>
        <td><?php echo $realty->getPropertyNumber(); ?></td>
        <td><?php echo $realty->getTotalRent(); ?></td>
    </tr>
<?php endforeach; ?>
</table>
<pre>
<?php //print_r($pager); ?>
</pre>

<?php if ($pager->haveToPaginate()) : ?>
    <ul>
        <?php if ($page != $pager->getFirstPage()) : ?>
            <li><a href="?page=<?php echo $page - 1 ?>">previous page</a></li>
        <?php endif; ?>
        <?php if ($page != $pager->getLastPage()) : ?>
            <li><a href="?page=<?php echo $page + 1 ?>">next page</a></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
