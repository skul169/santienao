<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <section class="title_center_main" style="text-align: center;">
            <h1 style="margin-top: 15px; text-transform: uppercase; font-family: UTM_HelvetIns;"><?php echo \Lang::get('fields.eth_market'); ?></h1>
            <p style="font-size: 17px; margin: 14px 0 25px;"><?php echo \Lang::get('fields.eth_market_desc'); ?></p>
        </section>
        <section id="on_out" style="margin-right: -15px; margin-left: -15px;">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <article style="text-align: center;">
                    <h4 style="text-transform: uppercase; font-weight: bold; font-size: 15px;"><?php echo \Lang::get('fields.you_want'); ?> <?php echo \Lang::get('fields.buy'); ?>:</h4>
                    <h6 id="buy-price-text" class="green txt-price-buy" style="font-size: 20px; font-weight: bold; margin: 10px 0 20px; color: #449d44;"><?php echo number_format($price['buy']); ?> VNĐ</h6>
                    <div class="text-center" style="text-align: center;">
                        <a style="border-radius: 0; padding: 10px 25px; font-weight: bold; font-size: 16px; background-color: #5cb85c; border-color: #4cae4c; background-image: none;"
                           class="btn btn-success" href="eth/buy"><?php echo \Lang::get('fields.buy_directly'); ?></a>
                    </div>
                </article>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <article style="text-align: center;">
                    <h4 style="text-transform: uppercase; font-weight: bold; font-size: 15px;"><?php echo \Lang::get('fields.you_want'); ?> <?php echo \Lang::get('fields.sell'); ?>:</h4>
                    <h6 id="sell-price-text" class="red txt-price-sell" style="font-size: 20px; font-weight: bold; margin: 10px 0 20px; color: #c9302c;"><?php echo number_format($price['sell']); ?> VNĐ</h6>
                    <div class="text-center" style="text-align: center;">
                        <a style="border-radius: 0; padding: 10px 25px; font-weight: bold; font-size: 16px; background-color: #d9534f; border-color: #d43f3a; background-image: none;"
                            class="btn btn-danger" href="eth/sell"><?php echo \Lang::get('fields.sell_directly'); ?></a>
                    </div>
                </article>
            </div>
        </section>
    </div>
</div>
<hr>
<div class="row">
    <div id="price-chart" style="min-width: 300px; width: 95%; height: 600px; margin: 0 auto"></div>
</div>