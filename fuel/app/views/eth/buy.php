<page-header class="page-header-title ng-scope">
    <h1 class="ng-binding"><?php echo \Lang::get('fields.buy_eth'); ?></h1>
</page-header>
<form action="" class="form-horizontal ng-pristine ng-scope ng-valid-min ng-invalid ng-invalid-required" name="sellForm" method="post" id="buy-form">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="text-muted"><?php echo \Lang::get('fields.vietcombank'); ?><br><?php echo \Lang::get('fields.vietcomabank_note'); ?></span>
        </div>
        <div class="panel-body">
            <div class="form-group required">
                <label class="col-md-4 control-label"><?php echo \Lang::get('fields.eth_want_to_buy'); ?></label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input class="form-control" min="0.01" name="quantity" placeholder="e.g.: 10" required="required" step="any" type="number" style="" id="coin_number">
                        <span class="input-group-addon">ETH</span>
                    </div>
                    <div class="help-block">Số lượng tối thiểu là 0.01 BTC</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"><?php echo \Lang::get('fields.pay_via'); ?></label>
                <div class="col-md-8">
                    <bank-select bank-name="vm.bankName" class="ng-isolate-scope">
                        <div class="bank-select btn-group" role="group">
                            <button class="btn ng-binding ng-scope btn-primary" type="button">Vietcombank</button>
                        </div>
                    </bank-select>
                </div>
            </div>
            <div class="form-group required has-feedback account-number">
                <label class="col-md-4 control-label"><?php echo \Lang::get('fields.your_eth_address'); ?></label>
                <div class="col-md-8">
                    <input class="form-control" name="accountNumber" placeholder="Eg: 1JyW3CWQRZtX98NVMvqTBu6SKt75BuxZVg" required type="text" id="accountNumber">
                    <span class="has-error" style="display: none;" id="accountNumber-span">Số tài khoản không chính xác</span>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <span style="display: none;" id="processing">
                <i class="fa-2x ng-scope"><?php echo \Lang::get('fields.processing'); ?></i>
            </span>
            <button class="btn" type="button" id="submit-btn"><?php echo \Lang::get('fields.next'); ?></button>
        </div>
    </div>
</form>
<script>
    var isAddress = function (address) {
        if (!/^(0x)?[0-9a-f]{40}$/i.test(address)) {
            // check if it has the basic requirements of an address
            return false;
        } else if (/^(0x)?[0-9a-f]{40}$/.test(address) || /^(0x)?[0-9A-F]{40}$/.test(address)) {
            // If it's all small caps or all all caps, return true
            return true;
        } else {
            // Otherwise check each case
            return true;
        }
    };

    $(document).ready(function () {
        $("#submit-btn").click(function () {
            var walletAddress = $("#accountNumber").val();
            if (walletAddress == '' || !isAddress(walletAddress)) {
                $("#accountNumber-span").show();
                return false;
            } else {
                $("#accountNumber-span").hide();
            }

            if ($("#coin_number").val() > 0) {

            } else {
                return false;
            }

            $("#processing").show();
            $("#submit-btn").hide();
            $("#buy-form").submit();
        });
    });
</script>