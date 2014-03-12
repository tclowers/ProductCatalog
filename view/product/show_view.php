<h2><?php echo $result->getName(); ?></h2>
<div>
   <dl class="dl-horizontal">
     <dt>Description</dt>
     <dd><?php echo $result->getDescription(); ?></dd>
     <dt>Width</dt>
     <dd><?php echo $result->getWidth(); ?>cm</dd>
     <dt>Length</dt>
     <dd><?php echo $result->getLength(); ?>cm</dd>
     <dt>Height</dt>
     <dd><?php echo $result->getHeight(); ?>cm</dd>
     <dt>Weight</dt>
     <dd><?php echo $result->getWeight(); ?>kg</dd>
     <dt>Value</dt>
     <dd>$<?php echo $result->getDollarValue(); ?> (USD)</dd>
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
<a href='index.php' class="btn btn-default">Back to Catalog</a> | <a href='index.php?resource=product&action=destroy&id=<?php echo $result->getId(); ?>' class="btn btn-danger delete-link">Delete</a> | <a
href='index.php?resource=product&action=edit&id=<?php echo $result->getId(); ?>' class="btn btn-primary">Edit</a>