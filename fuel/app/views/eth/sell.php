<div class="trade-content " ui-view="" style="">
<page-header class="page-header-title ">
    <h1 class="">Bán ETH</h1>
</page-header>
<form action="" method="post" class="form-horizontal" name="sellForm" id="sell-form">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="text-muted ">Giao dịch tự động trong vòng 5s qua Vietcombank 24/7<br>(kể cả ban đêm &amp; cuối tuần)</span>
        </div>
        <div class="panel-body">
            <div class="form-group required has-error" id="eth-div">
                <label class="col-md-4 control-label ">Số lượng ETH bán</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input class="form-control" min="0.01" name="quantity" placeholder="e.g.: 10" required="required"
                            step="any" type="number" style="" id="eth-input">
                        <span class="input-group-addon">ETH</span>
                    </div>
                    <div class="help-block">Số lượng tối thiểu là 0.01 ETH</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Ngân hàng nhận tiền</label>
                <div class="col-md-8">
                    <bank-select bank-name="vm.bankName" bank-names="vm.bankNames" class="ng-isolate-scope">
                        <div class="bank-select btn-group" role="group">
                            <button class="btn btn-primary" type="button">Vietcombank</button>
                        </div>
                    </bank-select>
                </div>
            </div>
            <div class="form-group required has-feedback account-number has-error" id="accountNumber-div">
                <label class="col-md-4 control-label">Số tài khoản nhận tiền</label>
                <div class="col-md-8">
                    <input class="form-control" name="accountNumber" placeholder="Số tài khoản VCB. Vd: 05010000xxxxx" required type="text" id="accountNumber">
                    <span id="accountNumber-sign-span" class="form-control-feedback glyphicon glyphicon-remove"></span>
                    <span class="help-block" style="display: none;" id="accountNumber-span">Số tài khoản không chính xác</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label ">Tên tài khoản nhận tiền</label>
                <div class="col-md-8">
                    <input class="form-control" disabled="" name="accountNameDisable" required="" type="text" id="accountName-input" value="">
                    <input type="hidden" value="" name="accountName" id="accountNameHidden">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label ">Số tiền nhận</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input class="form-control" type="text" value="0" disabled="" id="money-count">
                        <input type="hidden" id="price-hidden" value="<?php echo $price; ?>">
                        <span class="input-group-addon">VND</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Chúng tôi còn</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input class="form-control text-success" disabled="" name="vnd_reserve" type="text" value="300,000,000">
                        <span class="input-group-addon">VND</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <span class="ng-hide" id="processing" style="display: none;">
                <i class="fa-2x ">Đang xử lý...</i>
                <i class="fa fa-spinner fa-spin fa-2x"></i>
            </span>
            <button class="btn btn-primary" type="button" id="submit-btn">Tiếp tục</button>
        </div>
    </div>
</form>
<div class="panel panel-default panel-instructions ">
    <div class="panel-body">
        <h5 class="lg-title">
            <strong translate="INSTRUCTIONS" class="">Hướng dẫn giao dịch</strong>
        </h5>
        <ul ng-class="{'hidden': ('TRANSLATION_ID'|translate) != 'vi'}">
            <li class="">Nhập số lượng ETH muốn bán</li>
            <li ng-if="vm.bankName.key != 'card'" class="">
                <span class="">Điền số tài khoản ngân hàng VCB</span>
                <br>
                <strong class="text-danger">(Hiện chúng tôi chỉ hỗ trợ tài khoản Vietcombank-VCB)</strong>
            </li>
            <li>Bấm vào nút "Tiếp tục"</li>
            <li ng-if="vm.currency.code!='btce'" class=" ">Đăng nhập và thanh toán bằng tài khoản ETH của bạn</li>
            <li>Hệ thống sẽ chuyển tiền cho bạn trong giây lát</li>
        </ul>
        <ul ng-class="{'hidden': ('TRANSLATION_ID'|translate) == 'vi'}" class="hidden">
            <li class="">Input amount of ETH to sell</li>
            <li ng-if="vm.bankName.key != 'card'" class=" ">Input your bank account number VCB</li>
            <li>Click "Continue"</li>
            <li ng-if="vm.currency.code!='btce'" class=" ">Login and pay with your ETH account</li>
            <li>Wait for our system to transfer the money to you shortly</li>
        </ul>
        <h5 class="lg-title">
            <strong translate="WARNING" class="">Chú ý</strong>
        </h5>
        <ul ng-class="{'hidden': ('TRANSLATION_ID'|translate) != 'vi'}">
            <li>Tuyệt đối không đưa link đơn hàng cho người khác.</li>
        </ul>
        <ul ng-class="{'hidden': ('TRANSLATION_ID'|translate) == 'vi'}" class="hidden">
            <li>Do not provide order information to other person.</li>
        </ul>
    </div>
</div>
</div>
<script>
$(document).ready(function () {
    $('#eth-input').on('keyup keypress blur change', function(e) {
        if(isNaN($(this).val()) || $(this).val() <= 0) {
            $("#eth-div").addClass('has-error');
            $("#money-count").val(0);
        } else {
            $("#eth-div").removeClass('has-error');
            //price
            var money = $("#price-hidden").val() * $(this).val();
            $("#money-count").val(money.format());
        }
    });

    $("#accountNumber").change(function(){
        $.ajax({
            url: "/ajax/check_bank_account.json",
            type: 'GET',
            data: {"bank_account" : $("#accountNumber").val()},
        }).done(function(data) {
            if (data.state != 'error') {
                $("#accountNumber-div").removeClass('has-error');
                $("#accountNumber-sign-span").removeClass('glyphicon-remove').addClass('glyphicon-ok');
                $("#accountName-input").val(data.account_name);
                $("#accountNameHidden").val(data.account_name);
                $("#accountNumber-span").hide();
            } else {
                $("#accountNumber-div").addClass('has-error');
                $("#accountNumber-sign-span").removeClass('glyphicon-ok').addClass('glyphicon-remove');
                $("#accountNumber-span").show();
            }
        });
    });

    $("#submit-btn").click(function () {
        if ($("#accountNumber").val() == '') {
            $("#accountNumber-span").show();
            return false;
        } else {
            $("#accountNumber-span").hide();
        }

        if ($("#eth-input").val() > 0) {

        } else {
            return false;
        }

        $("#processing").show();
        $("#submit-btn").hide();

        $.ajax({
            url: "/ajax/check_bank_account.json",
            type: 'GET',
            data: {"bank_account" : $("#accountNumber").val()},
        }).done(function(data) {
            if (data.state != 'error') {
                $("#sell-form").submit();
            } else {
                $("#accountNumber-span").show();
                $("#processing").hide();
                $("#submit-btn").show();
            }
        });
    });
});
</script>