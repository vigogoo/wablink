<?php
include'connect.php';

$photo="select * from cart";
$results=mysql_query($photo);
while($row=mysql_fetch_array($results)){
?>
<li class="item even"> <a class="product-image" href="#" title="Downloadable Product "><img alt="Downloadable Product " src="images/products/<?php echo str_replace(".","_thumb.",$row['ItemPhoto']);; ?>"  width="80"></a>
                      <div class="detail-item">
                        <div class="product-details"> <a href="#" title="Remove This Item" onClick="" class="glyphicon glyphicon-remove">&nbsp;</a> <a class="glyphicon glyphicon-pencil" title="Edit item" href="#">&nbsp;</a>
                          <p class="product-name"> <a href="product_detail.html" title="Downloadable Product"><?php echo $row['item_name'];?> </a> </p>
                        </div>
                        <div class="product-details-bottom"> <span class="price"><?php echo $row['unitP'];     ?></span> <span class="title-desc">Qty:</span> <strong><?php echo $row['unitP'];?></strong> </div>
                      </div>
                    </li>

<?php




}

?>