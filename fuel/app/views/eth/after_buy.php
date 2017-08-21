<div id="thanhtoan" class="table-responsive">
    <table class="table table-bordered">
        <tbody><tr>
            <td width="150px">Mã giao dịch</td>
            <td><?php echo $transaction_id; ?></td>
        </tr>
        <tr>
            <td>Hướng dẫn thanh toán</td>
            <td>
                Vui lòng chuyển khoản cho tài khoản Vietcombank sau: <br>
                Số tài khoản: <strong>0011003743647</strong><br>
                Tên chủ tài khoản: <strong>VUONG THI LUYEN</strong><br>
                (Chi nhánh: <strong>Ha Noi</strong>- nếu bạn chuyển liên ngân hàng)<br>
                Số tiền: <strong></strong><?php  echo number_format($money); ?><br>
                Nội dung chuyển khoản (memo):<br>
                <i><b>giao dich <?php echo $transaction_id; ?> tai STA</b></i> <br>
            </td>
        </tr>

        <tr>
            <td class="td-w">Thời gian còn lại</td>
            <td><strong><span id="countdown_pay">29 phút : 59 giây</span></strong></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <h6>Chú ý: Bạn hãy chuyển chính xác số tiền (kể cả số lẻ) và nội dung chuyển tiền như hướng dẫn
                    (phần in đậm). Nếu không chúng tôi sẽ không xử lý.</h6><br>
                <h6><b><i>Bạn hãy kiểm tra thật kỹ địa chỉ ví nhận ETH trước khi chuyển tiền. Hệ thống hoàn toàn tự động, chúng tôi sẽ không chịu trách nhiệm trong trường hợp địa chỉ ví sai.</i></b></h6>
            </td>
        </tr>
        <tr>
            <td>Địa chỉ nhận tiền</td>
            <td><small><?php echo $coin_address; ?></small></td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td id="status_after_buy">
                <span class="text-warning txt-status">Đang chờ nhận tiền</span><span id="status_load" style=""><i class="fa fa-spinner fa-spin fa-3x fa-fw margin-bottom"></i></span>
            </td>
        </tr>
        <tr>
            <td>Bạn trả</td>
            <td><strong><?php  echo number_format($money); ?></strong> VND</td>
        </tr>
        <tr>
            <td>Bạn nhận</td>
            <td><small><?php echo $coin_number; ?></small> ETH</td>
        </tr>
        <tr>
            <td>Tỉ giá</td>
            <td><strong><?php echo number_format($price); ?></strong> VND</td>
        </tr>
        <tr>
            <td>Thời gian giao dịch</td>
            <td><?php echo $transaction_time; ?></td>
        </tr>
        <tr>
            <td colspan="2">
                Chúng tôi sẽ chuyển ETH vào tài khoản của bạn ngay sau khi nhận được đúng số tiền với nội dung như trên.
                Chú ý rằng giá ETH biến động liên tục, chúng tôi sẽ chốt lại số lượng ETH ngay khi nhận được thanh toán của bạn.
            </td>
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
                                <input type="email" id="emailReview" class="form-control" required="" placeholder="websieu@gmail.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nội dung đánh giá</label>
                            <div class="col-sm-8">
                                <input type="text" id="contentReview" maxlength="300" required="" class="form-control" placeholder="Tuyệt vời">

                            </div>
                        </div>
                        <input type="hidden" id="orderRef" value="BSEC4BD2Z4144">


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