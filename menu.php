<!-- <section id="advertisement">
    <div class="container">
        <img src="images/shop/advertisement.jpg" alt=""/>
    </div>
</section> -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php include 'sidebar.php'; ?>
            </div><!--/category-productsr-->

            <div class="products-block">
                <div class="features_items"><!--features_items-->
                    <p class="title text-center">Products</p>
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
                            <form method="POST" action="cart/controller.php?action=add">
                                <input type="hidden" name="PROPRICE" value="<?php echo $result->PROPRICE; ?>">
                                <input type="hidden" id="PROQTY" name="PROQTY" value="<?php echo $result->PROQTY; ?>">

                                <input type="hidden" name="PROID" value="<?php echo $result->PROID; ?>">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo">
                                                <img src="<?php echo web_root . 'admin/products/' . $result->IMAGES; ?>"
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
                                        <!-- <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li>
                                                    <?php
                                                    if (isset($_SESSION['CUSID'])) {

                                                        echo ' <a href="' . web_root . 'customer/controller.php?action=addwish&proid=' . $result->PROID . '" title="Add to wishlist"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';

                                                    } else {
                                                        echo '<a href="#" title="Add to wishlist" class="proid"  data-target="#smyModal" data-toggle="modal" data-id="' . $result->PROID . '"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';
                                                    }
                                                    ?>

                                                </li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                            </form>
                        <?php }


                    } else {

                        echo '<p class="text-center text-danger">No Products Available</p>';

                    } ?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
  