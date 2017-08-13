<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">ETH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Điều Khoản</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Hướng Dẫn</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tin Tức</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Ngôn ngữ</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Tiếng Việt</a>
                    <a class="dropdown-item" href="#">Tiếng Anh</a>
                </div>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <a class="nav-link" href="#">Đăng ký</a>
            <a class="nav-link" href="#">Đăng nhập</a>
        </div>
    </div>
</nav>
<div class="jumbotron">
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        Bạn muốn <label style="font-size: 22px; font-weight: bold; color: #0000BB;">MUA</label>
                        <div class="row">
                            <a class="btn btn-primary btn-lg" href="eth/buy" role="button">22,000,000 VND</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        Bạn muốn <label style="font-size: 22px; font-weight: bold; color: #953b39">BÁN</label>
                        <div class="row">
                            <a class="btn btn-primary btn-lg" href="eth/sell" role="button">21,000,000 VND</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div id="price-chart" style="min-width: 500px; width: 95%; height: 600px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-md-4">
                <h2>Vốn hóa</h2>
                <div class="row">Tổng khối lượng giao dịch</div>
                <ul>
                    <li>Khối lượng giao dịch MUA: 3,000 ETH</li>
                    <li>Khối lượng giao dịch BÁN: 2,000 ETH</li>
                </ul>
                <div class="row">Tổng khối lượng giao dịch 24h</div>
                <ul>
                    <li>Khối lượng giao dịch MUA: 1,000 ETH</li>
                    <li>Khối lượng giao dịch BÁN: 500 ETH</li>
                </ul>
                <h2>Hỗ trợ</h2>
                <h5>Live chat:</h5>
                <h5>Email: admin@gmail.com</h5>
            </div>
        </div>
    </div> <!-- /container -->
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"-->
<!--        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"-->
<!--        crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
    $( document ).ready(function() {
        $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=usdeur.json&callback=?', function (data) {

            Highcharts.chart('price-chart', {
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: 'USD to EUR exchange rate over time'
                },
                subtitle: {
                    text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                },
                xAxis: {
                    type: 'datetime'
                },
                yAxis: {
                    title: {
                        text: 'Exchange rate'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, Highcharts.getOptions().colors[0]],
                                [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },

                series: [{
                    type: 'area',
                    name: 'USD to EUR',
                    data: data
                }]
            });
        });
    });

</script>
</body>
</html>