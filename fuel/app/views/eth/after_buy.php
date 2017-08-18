<div class="container">
    <div class="row">
        <div class="col-md-4">Mã Giao Dịch</div>
        <div class="col-md-8"><?php echo $transaction_id; ?></div>
    </div>
    <div class="row">
        <div class="col-md-12">Vui lòng chuyển cho tài khoản <b>Vietcombank</b> sau:</div>
    </div>
    <div class="row"><div class="col-md-12">Số tài khoản: <b>001198535465</b></div></div>
    <div class="row"><div class="col-md-12">Tên Chủ Tài Khoản: NGUYEN VAN TRUONG</div></div>
    <div class="row"><div class="col-md-12">(Chi nhánh: <b>Hanoi</b> nếu chuyển liên ngân hàng)</div></div>
    <div class="row"><div class="col-md-12">Số tiền: <b><?php  echo number_format($money); ?></b> VND </div></div>
    <div class="row"><div class="col-md-12">Nội dung chuyển khoản (memo): <b>giao dich <?php echo $transaction_id; ?> tai STA</b></div></div>
    <div class="row">
        <div class="col-md-4">Địa chỉ nhận tiền</div>
        <div class="col-md-8"><b><?php echo $coin_address; ?></b></div>
    </div>
    <div class="row">
        <div class="col-md-4">Trạng thái</div>
        <div class="col-md-8" id="status_after_buy">Đang chờ thanh toán từ Vietcombank, bạn vui lòng chuyển tiền theo hướng dẫn trên</div>
    </div>
</div>
<script>
    var myVar = setInterval(function(){
        $.ajax({
            url: "/ajax/check_status_buy.json",
            type: 'GET',
            data: {"id" : <?php echo $id; ?>},
        }).done(function(data) {
            if (data.status == '1') {
                $("#status_after_buy").html('Đã chuyển ETH vào tài khoản của bạn thành công !');
                clearInterval(myVar);
            }
        });
    }, 10000);
</script>