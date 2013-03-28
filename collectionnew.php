<?php require('includes/connectDB.php'); ?>
 <div class="collectionPopupHide">
                    <div id='inline_content<? echo $prodindex.$seasonIndex; ?>' style='padding:10px; background:#fff; position:relative;'>
                      <div class="main mT20">
                        <div id="gallery-2" class="royalSlider rsMinW fwImage">
                        <?php
$imageindex = 1;
$p_id = $_REQUEST['id'];
mysql_select_db($database_tes, $tes);
$selectSQL3="SELECT * FROM product_gallery WHERE p_id = $p_id";
$queryset3='';
$queryset3=mysql_query($selectSQL3,$tes);
while($row3 = mysql_fetch_assoc($queryset3))
{
$i_id = $row3['id'];
?>
                        <a class="rsImg"  data-rsDelay="1000" href="media/collection/gallery/image/<?php echo $row3['image']; ?>"><img class="rsTmb" src="media/collection/gallery/thumb/<?php echo $row3['thumb']; ?>" height="106" width="106"></a>
                        <?php } ?></div>
                      </div>
                      <div class="contentR">
                        <div class="cpopbigcont">Preveleged Life</br>
                          Fall 2012 - Red Jacket</div>
                        <div class="smallcont floatL mT20 mL20">Item description goes here:</br>
                          </br>
                          Item Description #1</br>
                          Item Description #1</br>
                          Item Description #1</br>
                          <div class="buyButton mT10"><a href="#">BUY NOW</a></div>
                        </div>
                        <div class="popup_social floatL"><div class="popupSocialTitle">Spread the word:</div><div class="popupSocialIcon"><a href="#"><img src="media/images/popup/fIcon.png" /></a> <a href="#"><img src="media/images/popup/tIcon.png" /></a> <a href="#"><img src="media/images/popup/pIcon.png" /></a></div> </div>
                      </div>
                    </div>
                  </div>
