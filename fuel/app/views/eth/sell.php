<page-header class="page-header-title ng-scope">
    <h1 class="ng-binding">Bán ETH</h1>
</page-header>
<form action="" class="form-horizontal ng-pristine ng-scope ng-valid-min ng-invalid ng-invalid-required" name="sellForm" method="post" id="sell-form">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="text-muted">Giao dịch tự động trong vòng 5s qua Vietcombank 24/7<br>(kể cả ban đêm &amp; cuối tuần)</span>
        </div>
        <div class="panel-body">
            <div class="form-group required">
                <label class="col-md-4 control-label">Số lượng ETH bán</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input class="form-control" min="0.01" name="quantity" placeholder="e.g.: 10" required="required" step="any" type="number" style="" id="coin_number">
                        <span class="input-group-addon">ETH</span>
                    </div>
                    <div class="help-block">Số lượng tối thiểu là 0.01 ETH</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Ngân hàng nhận tiền</label>
                <div class="col-md-8">
                    <bank-select bank-name="vm.bankName" class="ng-isolate-scope">
                        <div class="bank-select btn-group" role="group">
                            <button class="btn ng-binding ng-scope btn-primary" type="button">Vietcombank</button>
                        </div>
                    </bank-select>
                </div>
            </div>
            <div class="form-group required has-feedback account-number">
                <label class="col-md-4 control-label">Số tài khoản nhận tiền</label>
                <div class="col-md-8">
                    <input class="form-control" name="accountNumber" placeholder="Số tài khoản VCB. Vd: 05010000xxxxx" required type="text" id="accountNumber">
                    <span class="has-error" style="display: none;" id="accountNumber-span">Số tài khoản không chính xác</span>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <span style="display: none;" id="processing">
                <i class="fa-2x ng-scope">Đang xử lý...</i>
            </span>
            <button class="btn" type="button" id="submit-btn">Tiếp tục</button>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        $("#submit-btn").click(function () {
            if ($("#accountNumber").val() == '') {
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