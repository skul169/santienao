<div class="container">
    <div class="row">
        <div class="col-md-4">Mã Giao Dịch</div>
        <div class="col-md-8"><?php echo $transaction_id; ?></div>
    </div>
    <div class="row">
        <div class="col-md-12">Vui lòng chuyển cho tài khoản <b>Vietcombank</b> sau:</div>
    </div>
    <div class="row"><div class="col-md-12">Số tài khoản: <b>0011003743647</b></div></div>
    <div class="row"><div class="col-md-12">Tên Chủ Tài Khoản: VUONG THI LUYEN</div></div>
    <div class="row"><div class="col-md-12">Số tiền: <b><?php  echo number_format($money); ?></b> VND </div></div>
    <div class="row"><div class="col-md-12">Nội dung chuyển khoản (memo): <b>giao dich <?php echo $transaction_id; ?> tai STA</b></div></div>
    <div class="row">
        <div class="col-md-4">Địa chỉ nhận tiền</div>
        <div class="col-md-8"><b><?php echo $coin_address; ?></b></div>
    </div>
    <div class="row">
        <div class="col-md-4">Trạng thái</div>
        <div class="col-md-8" id="status_after_buy">
            Đang chờ thanh toán từ Vietcombank, bạn vui lòng chuyển tiền theo hướng dẫn trên
        </div>
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
                $("#status_after_buy").html('Đã nhận tiền qua Vietcombank, đang tiếp tục xử lý!');
            } else if (data.status == '2') {
                $("#status_after_buy").html('Đã chuyển tiền qua Vietcombank, đang tiếp tục xử lý!');
            } else if (data.status == '3') {
                $("#status_after_buy").html('Đã nhận ETH!');
                clearInterval(myVar);
            } else if (data.status == '4') {
                $("#status_after_buy").html('Đã chuyển ETH!');
                clearInterval(myVar);
            }
        });
    }, 10000);
</script>