<div class="row">
    <div class="col-md-6">
        <?php echo \Lang::get('fields.you_want'); ?> <label style="font-size: 22px; font-weight: bold; color: #0000BB;"><?php echo \Lang::get('fields.buy'); ?></label>
        <div class="row">
            <a class="btn btn-primary btn-lg" href="eth/buy" role="button"><?php echo number_format($price['buy']); ?> VND</a>
        </div>
    </div>
    <div class="col-md-6">
        <?php echo \Lang::get('fields.you_want'); ?> <label style="font-size: 22px; font-weight: bold; color: #953b39"><?php echo \Lang::get('fields.sell'); ?></label>
        <div class="row">
            <a class="btn btn-primary btn-lg" href="eth/sell" role="button"><?php echo number_format($price['sell']); ?> VND</a>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div id="price-chart" style="min-width: 500px; width: 95%; height: 600px; margin: 0 auto"></div>
</div>