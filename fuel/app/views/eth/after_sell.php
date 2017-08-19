<div class="container">
    <div class="row">
        Vui lòng chuyển đúng <?php  echo $coin_number; ?> ETH vào địa chỉ
    </div>
    <div class="row">1EXNbPY1AEoGv3qeseXm9zSBpi5Q6rwTdL</div><br>

    <div class="row">
        <div class="col-md-4">Trạng thái</div>
        <div class="col-md-8" id="status_after_sell" style="font-weight: bold;">
            Đang chờ chuyển ETH
        </div>
    </div><br>

    <div class="row">Sau khi chuyển ETH, bạn có thể kiểm tra giao dịch của bạn tại</div>
    <div class="row">https://blockchain.info/address/1EXNbPY1AEoGv3qeseXm9zSBpi5Q6rwTdL</div>
    <div class="row">
        Chúng tôi sẽ thanh toán ngay khi có 1 xác nhận trong link blockchain trên. Việc xác nhận được hoàn toàn tự động bởi hệ thống ETH network trên thế giới nên bạn không cần phải làm gì thêm.
    </div>
    <div class="row">
        Chú ý rằng giá ETH biến động liên tục. Chúng tôi sẽ chốt giá và chuyển khoản ngân hàng cho bạn ngay khi đủ 1 xác nhận (confirmation) trên ETH network .
    </div>
</div>

<script>
    var myVar = setInterval(function(){
        $.ajax({
            url: "/ajax/check_status_sell.json",
            type: 'GET',
            data: {"id" : <?php echo $id; ?>},
        }).done(function(data) {
            if (data.status == '1') {
                $("#status_after_sell").html('Đã nhận tiền qua Vietcombank!');
            } else if (data.status == '2') {
                $("#status_after_sell").html('Đã chuyển tiền qua Vietcombank!');
            } else if (data.status == '3') {
                $("#status_after_sell").html('Đã nhận ETH!');
            } else if (data.status == '4') {
                $("#status_after_sell").html('Đã chuyển ETH!');
            }
        });
    }, 10000);
</script>