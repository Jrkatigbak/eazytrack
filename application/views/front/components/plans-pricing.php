<section class="dark-bg3 call_to_action  reveal animated" id="plans&pricing" data-delay="0.2s" data-anim="fadeInUpShort">
    <!-- container starts -->
    <div class="container">
    <div id="generic_price_table">   
    <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--PRICE HEADING START-->
                        <div class="price-heading text-white">
                            <h1>Choose your pricing plan</h1>
                        </div>
                        <!--//PRICE HEADING END-->
                    </div>
                </div>
            </div>
            <div class="container">
                
                <!--BLOCK ROW START-->
                <div class="row equal ">
                    <?php
                    if(isset($plans)){
                    ?>   
                    <?php foreach($plans as $plan): ?>
                    <?php
                        $active = '';
                        if($plan->best_seller == 1){
                            $active = 'active';
                        };
                    ?>
                    <div class="col-md-4 equal">
                        <!--PRICE CONTENT START-->
                        <div class="generic_content <?= $active ?> clearfix" style="height: 550px;">
                            
                            <!--HEAD PRICE DETAIL START-->
                            <div class="generic_head_price clearfix">
                            
                                <!--HEAD CONTENT START-->
                                <div class="generic_head_content clearfix">
                                
                                    <!--HEAD START-->
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span><?= $plan->name?></span>
                                    </div>
                                    <!--//HEAD END-->
                                    
                                </div>
                                <!--//HEAD CONTENT END-->
                                
                                <!--PRICE START-->
                                <div class="generic_price_tag clearfix">	
                                    <span class="price">
                                        <span class="sign">£</span>
                                        <span class="currency"><?= number_format($plan->actual_price)?></span>
                                        <!-- <span class="cent">.99</span>
                                        <span class="month">/MON</span> -->
                                    </span>
                                </div>
                                <!--//PRICE END-->
                                
                            </div>                            
                            <!--//HEAD PRICE DETAIL END-->
                            
                            <!--FEATURE LIST START-->
                            <div class="generic_feature_list">
                                <ul>    
                                    <?php $parsed_json = json_decode($plan->description, true); ?>
                                    <?php foreach($parsed_json as $desc => $value): ?>
                                        <li> <?= $value['description']?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <!--//FEATURE LIST END-->
                            
                            <!--BUTTON START-->
                            <div class="generic_price_btn clearfix">
                                <?php
                                $class = "subscribe";
                                $href = '';

                                if($plan->id == 3){
                                    $class = ""; 
                                    $href = 'href="'.base_url(). 'claims"';
                                }
                                if(empty($_SESSION['id_user'])){
                                    $class = "cannotsubscribe";
                                    $href = '';
                                }
                                ?>
                                <a class="<?= $class?> buy-now-button" <?= $href?> name="subscribe" data-id="<?= $plan->id?>">Buy Now</a>
                            </div>
                            <!--//BUTTON END-->
                        </div>
                        <!--//PRICE CONTENT END-->
                    </div>
                    <?php endforeach; ?>
                    <?php
                    }else{
                        ?>
                        <div class="price-heading text-white">
                            <h1>No plans found.</h1>
                        </div>
                        <?php
                    }
                    ?>  
                </div>

            </div>
        </section>             
    </div>
    </div><!-- /.container ends -->
</section>