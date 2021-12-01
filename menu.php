<section>
    <div class="container">
        <div class="row">
            <div class="products-block">
                <div class="features_items"><!--features_items-->
                    <div class="fancy">
                        <span class="label-title text-center ">Products</span>

                    </div>
                    <div class="row">

                    <?php
                    if (isset($_POST['search'])) {
                        $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 
                AND ( `CATEGORIES` LIKE '%{$_POST['search']}%' OR `PRODESC` LIKE '%{$_POST['search']}%' or `PROQTY` LIKE '%{$_POST['search']}%' or `PROPRICE` LIKE '%{$_POST['search']}%')";
                    } elseif (isset($_GET['category'])) {
                        $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 AND CATEGORIES='{$_GET['category']}'";
                    } else {
                        $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                          WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 ";
                    }
                    $mydb->setQuery($query);
                    $res = $mydb->executeQuery();
                    $maxrow = $mydb->num_rows($res);

                    if ($maxrow > 0) {
                        $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                            ?>
                            <form method="POST" class="col-6 col-md-3 col-sm-2 g-1" action="cart/controller.php?action=add">
                                <input type="hidden" name="PROPRICE" value="<?php echo $result->PROPRICE; ?>">
                                <input type="hidden" id="PROQTY" name="PROQTY" value="<?php echo $result->PROQTY; ?>">

                                <input type="hidden" name="PROID" value="<?php echo $result->PROID; ?>">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo">
                                                <img class="product-image" src="<?php echo web_root . 'admin/products/' . $result->IMAGES; ?>"
                                                     alt=""/>
                                                <p class="product-name align-left"><?php echo $result->PRODNAME; ?></p>
                                                <p class="product-desc align-left"><?php echo $result->PRODESC; ?></p>
                                                <div class="price-amount align-left">
                                                    <div class="price-block">
                                                        <img alt="" class="currency" src="/images/shop/UZS 1.svg"/>
                                                        <span class="product-price"><?php 
                                                            $productPrice = substr($result->PRODISPRICE,0, strlen($result->PRODISPRICE) - 3)."<sup>".substr($result->PRODISPRICE, -3)."</sup>"; 
                                                            echo $productPrice;
                                                        ?></span>
                                                    </div>
                                                    <span class="product-amount"><?php echo $result->PRODMEAS; ?></span>
                                                </div>
                                                <div class="product-buttons">
                                                    <button type="submit" name="btntobuy"
                                                            class="btn btn-default add-to-cart">Buy now
                                                    </button>
                                                    <button type="submit" name="btnorder"
                                                            class="btn btn-default add-to-cart">Add to cart
                                                    </button>

                                                </div>
                                            </div>
                                               
                                        </div>
                                    </div>
                            </form>
                        <?php }
                    } else {

                        echo '<p class="text-center text-danger">No Products Available</p>';

                    } ?>
                    </div>

                </div><!--features_items-->
            </div>

            <div class="sidebar-block">
                <?php include 'sidebar.php'; ?>
            </div><!--/category-productsr-->
        </div>
    </div>
</section>
  