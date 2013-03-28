
<section>
  <div class="one-col-big slider">
    <div id="collection-tabs" class="royalSlider contentSlider rsDefault">
      <div>
        <? $s_id = $row['id']; ?>
        <div class="collect-toppart">
          <p><? echo $row['title']; ?></p>
          <p><? echo $row['content']; ?></p>
          <div class="image-back" data-move-effect="bottom"><img src="media/collection/season/<? echo $row['image']; ?>" /></div>
          <span class="rsTmb"><? echo $row['title']; ?></span> </div>
        <div class="row">
          <div class="collectionImg floatL"> <a class='inline<? echo $prodindex; ?>' href="#inline_content">
            <figure> <img src="media/collection/product/<?php echo $row2['thumb']; ?>" /> </figure>
            </a>
            <div style='display:none;'>
              <div id='inline_content' style='padding:10px; background:#fff;'>
                <div class="main mT20">
                  <div class="floatL"><img src="media/images/collection_02.jpg" /></div>
                  <div class="contentR">
                    <div class="close" onClick="displayHideBox('1'); return false;" style="cursor:pointer;" align="right"> 
                      <!--  <img src="media/images/popup/popup_Closebutton.png" /> --></div>
                    <div class="cpopbigcont">Preveleged Life</br>
                      Fall 2012 - <? echo $row2['title']; ?></div>
                    <div class="smallcont floatL pT10"><? echo $row2['description']; ?>
                      <div class="buyButton mT10"><a href="#">BUY NOW</a></div>
                    </div>
                    <div class="popup_social floatL mT20">Spread the word: &nbsp;&nbsp; <a href="#"><img src="media/images/popup/facebook_32.png" /></a> <a href="#"><img src="media/images/popup/twitter_32.png" /></a> </div>
                  </div>
                  <div class="img_slide floatL"> Slider </div>
                </div>
              </div>
            </div>
            <!-- END INLINE CONTENT --> 
          </div><!-- END COLLECTION THUMB -->
        </div>
      </div>
    </div>
  </div>
  <div class="row mini-row" id="newsletter">
    <div class="one-col-big box">
      <article><img src="media/images/home/live-the-life.png" /></article>
      <form>
        <input type="email" />
        <input type="submit" value="subscribe" />
      </form>
    </div>
  </div>
</section>
