<?php

require_once 'config.php';

use Justimmo\Model\EmployeeQuery;
use Justimmo\Model\Mapper\V1\EmployeeMapper;
use Justimmo\Model\Wrapper\V1\EmployeeWrapper;

$eq = new EmployeeQuery($api, new EmployeeWrapper(new EmployeeMapper()), new EmployeeMapper());

?>

<pre>
<?php print_r($eq->find()); ?>
</pre>
