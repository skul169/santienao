<page-header class="page-header-title ng-scope">
    <h1 class="ng-binding"><?php echo \Lang::get('fields.buy_eth'); ?></h1>
</page-header>
<form action="" class="form-horizontal ng-pristine ng-scope ng-valid-min ng-invalid ng-invalid-required" name="sellForm" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="text-muted"><?php echo \Lang::get('fields.vietcombank'); ?><br><?php echo \Lang::get('fields.vietcomabank_note'); ?></span>
        </div>
        <div class="panel-body">
            <div class="form-group required">
                <label class="col-md-4 control-label"><?php echo \Lang::get('fields.eth_want_to_buy'); ?></label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input class="form-control" min="0.01" name="quantity" placeholder="e.g.: 10" required="required" step="any" type="number" style="">
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
                    <input class="form-control" name="accountNumber" placeholder="Vd: 1JyW3CWQRZtX98NVMvqTBu6SKt75BuxZVg" required type="text">
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
                          <span ng-show="vm.submitting" style="display: none;">
                            <i class="fa-2x ng-scope" translate="PROCESSING"><?php echo \Lang::get('fields.processing'); ?></i>
                            <i class="fa fa-spinner fa-spin fa-2x"></i>
                          </span>
            <button class="btn" type="submit"><?php echo \Lang::get('fields.next'); ?></button>
        </div>
    </div>
</form>