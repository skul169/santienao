<div id="thanhtoan" class="table-responsive">
    <table class="table table-bordered">
        <tbody><tr>
            <td width="150px">Mã giao dịch</td>
            <td><?php echo $transaction_id; ?></td>
        </tr>
        <tr>
            <td>Hướng dẫn</td>
            <td>
                <div>
                    <div>
                        <div class="order-info-buy">

                            <div id="qrcode" title="ethereum:0x39742C8C5cD2564f9B9C39973730Aa57110dc23B?amount=0.1">
                                <canvas width="128" height="128" style="display: none;"></canvas>
                                <img src="data:image/png;base64,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" style="display: block;">
                            </div>
                            <script>
                                qrCode("qrcode", "0x39742C8C5cD2564f9B9C39973730Aa57110dc23B", "<?php echo $coin_number; ?>");
                            </script>

                            <p>Vui lòng chuyển đúng <b class="content_btc"><?php echo $coin_number; ?> ETH</b> vào địa chỉ</p>
                            <p>
                                <input id="wallet_btc" type="text" readonly="true" value="0x39742C8C5cD2564f9B9C39973730Aa57110dc23B" size="45" style="padding: 7px 20px;">
                                <button class="btn btn-copy" data-clipboard-target="#wallet_btc">copy</button>
                            </p>

                        </div>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <h6>
                    Chú ý : Sau khi bạn chuyển ethereum, chúng tôi sẽ thanh toán ngay khi có 1 xác nhận trên ví coinbase. Việc xác nhận được hoàn toàn tự động bởi hệ thống Etherium network trên thế giới nên bạn không cần phải làm gì thêm.
                    <br>Chú ý rằng giá ethereum biến động liên tục. Chúng tôi sẽ chốt giá và chuyển khoản ngân hàng cho bạn ngay khi đủ 1 xác nhận (confirmation) trên Etherium network.
                </h6>
            </td>
        </tr>
        <tr>
            <td class="td-w">Thời gian còn lại</td>
            <td><strong><span id="countdown_pay">29 phút : 59 giây</span></strong></td>
        </tr>
        <tr>
            <td>Địa chỉ nhận tiền</td>
            <td><strong><?php echo $bank_number; ?></strong> - <strong><?php echo $bank_acc_name; ?></strong> - Vietcombank</td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td id="status_after_sell">
                <span class="text-warning txt-status">Đang chờ nhận Ethereum</span><span id="status_load" style=""><i class="fa fa-spinner fa-spin fa-3x fa-fw margin-bottom"></i></span>
            </td>
        </tr>
        <tr>
            <td>Bạn trả</td>
            <td><strong><?php echo $coin_number; ?></strong> ETH</td>
        </tr>
        <tr>
            <td>Bạn nhận</td>
            <td><small><?php echo number_format($money); ?></small> VNĐ</td>
        </tr>
        <tr>
            <td>Tỉ giá</td>
            <td><strong><?php echo number_format($price); ?></strong> VND</td>
        </tr>
        <tr>
            <td>Thời gian giao dịch</td>
            <td><?php echo $transaction_time; ?></td>
        </tr>

        <tr id="review" style="display: none;">

            <td colspan="2">
                <div class="col-lg-8">
                    <form class="form-horizontal" name="formReview" id="formReview">

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Đánh giá đơn hàng</label>


                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tên của bạn</label>
                            <div class="col-sm-8">
                                <input type="text" id="nameReview" required="" class="form-control" placeholder="Mr A">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" id="emailReview" class="form-control" required="" placeholder="contact@buyselleth.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nội dung đánh giá</label>
                            <div class="col-sm-8">
                                <input type="text" id="contentReview" maxlength="300" required="" class="form-control" placeholder="Tuyệt vời. Hệ thống giao dịch rất nhanh.">

                            </div>
                        </div>
                        <input type="hidden" id="orderRef" value="BSE989Z2YE7CA">


                        <div class="form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <button type="submit" id="btnReview" class="btn btn-warning">Gửi</button>
                            </div>
                        </div>

                    </form>

                </div>
            </td>
        </tr>
        </tbody></table>
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

    var today = new Date();
    var countDownDate = today.setMinutes(today.getMinutes() + 30);
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("countdown_pay").innerHTML = minutes + " phút : " + seconds + " giây";

        // If the count down is over, write some text
        if (distance < 0) {
            //$("#done-btn").trigger('click');
            clearInterval(x);
        }
    }, 1000);
</script>