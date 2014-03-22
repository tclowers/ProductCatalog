<h2><?php echo $result->getName(); ?></h2>
<div>
   <dl class="dl-horizontal">
     <dt>Address</dt>
     <dd><?php echo $result->getAddress1(); ?></dd>
     <dt> </dt>
     <dd><?php echo $result->getAddress2(); ?></dd>
     <dt>City</dt>
     <dd><?php echo $result->getCity(); ?></dd>
     <dt>State</dt>
     <dd><?php echo $result->getState(); ?></dd>
     <dt>Zip Code</dt>
     <dd><?php echo $result->getZip(); ?></dd>
     <dt>Phone</dt>
     <dd><?php echo $result->getPhone(); ?></dd>
     <dt>Last Updated: </dt>
     <dd>
     <?php
        if($result->getLastUpdate()) {
            $date_string = $result->getLastUpdate()->format('Y-m-d');
            echo $date_string;
        } else {
            echo "0-0-0";
        }
     ?>
     </dd>
   </dl>
<div>
<a href='index.php?resource=customer&action=index' class="btn btn-default">Back to Customers</a> | <a href='index.php?resource=customer&action=destroy&id=<?php echo $result->getId(); ?>' class="btn btn-danger delete-link">Delete</a> | <a
href='index.php?resource=customer&action=edit&id=<?php echo $result->getId(); ?>' class="btn btn-primary">Edit</a>