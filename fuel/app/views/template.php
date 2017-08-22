<!DOCTYPE html>
<html lang="en" id="santienao_com">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <style>
        input.has-error {
            border: #b94a48;
            color: #b94a48;
        }
        span.has-error {
            color: #b94a48;
        }
    </style>

    <title>ETH sell-buy</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/eth.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>

</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#" style="color: #fff !important;">ETH</a>
    <button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/" style="color: #fff !important;"><?php echo \Lang::get('fields.home'); ?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/static/term" style="color: #fff !important;"><?php echo \Lang::get('fields.term'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/static/manual" style="color: #fff !important;"><?php echo \Lang::get('fields.manual'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/static/news" style="color: #fff !important;"><?php echo \Lang::get('fields.news'); ?></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" style="color: #fff !important;"><?php echo \Lang::get('fields.language'); ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="/welcome/language/vi"><?php echo \Lang::get('fields.vietnamese'); ?></a>
                    <a class="dropdown-item" href="/welcome/language/en"><?php echo \Lang::get('fields.english'); ?></a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav mr-auto navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="/user/register" style="color: #fff !important;"><?php echo \Lang::get('fields.register'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/login" style="color: #fff !important;"><?php echo \Lang::get('fields.login'); ?></a>
            </li>
        </ul>
    </div>
</nav>
<div>
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-8">
                <?php echo empty($content) ? '' : $content; ?>
            </div>
            <div class="col-md-4">
                <h2><?php echo \Lang::get('fields.funds'); ?></h2>
                <div class="row"><?php echo \Lang::get('fields.total_transaction'); ?></div>
                <ul>
                    <li><?php echo \Lang::get('fields.buy_transaction'); ?>: <?php echo isset($count['buy']) ? number_format($count['buy']) : 0; ?> ETH</li>
                    <li><?php echo \Lang::get('fields.sell_Transaction'); ?>: <?php echo isset($count['sell']) ? number_format($count['sell']) : 0; ?> ETH</li>
                </ul>
                <div class="row"><?php echo \Lang::get('fields.total_transaction_24'); ?></div>
                <ul>
                    <li><?php echo \Lang::get('fields.buy_transaction'); ?>: <?php echo isset($count['buy24']) ? number_format($count['buy24']) : 0;?> ETH</li>
                    <li><?php echo \Lang::get('fields.sell_Transaction'); ?>: <?php echo isset($count['sell24']) ? number_format($count['sell24']) : 0; ?> ETH</li>
                </ul>
                <h2><?php echo \Lang::get('fields.support'); ?></h2>
                <h5>Live chat:</h5>
                <h5>Email: admin@gmail.com</h5>
            </div>
        </div>
    </div> <!-- /container -->
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"-->
<!--        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"-->
<!--        crossorigin="anonymous"></script>-->
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
    Number.prototype.format = function(n, x) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
        return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
    };
    $(function () {
        Highcharts.setOptions({
            lang: {
                numericSymbols: [" k", " M", " B", " T", " P", " E"]
            }
        });
        $('#price-chart').highcharts({
            chart: {
                zoomType: 'x',
                resetZoomButton: {
                    position: {
                        align: 'right', // right by default
                        verticalAlign: 'top',
                        x: -55,
                        y: 10
                    },
                    relativeTo: 'chart'
                }
            },
            title: {
                text: ' Ether Historical Prices (USD) '
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Source: Etherscan.io<br>Click and drag in the plot area to zoom in' :
                    'Pinch the chart to zoom in'
            },
            xAxis: {
                type:'datetime',
                minRange: 14 * 24 * 3600000

            },
            yAxis: {
                title: {
                    text: 'Ether Price (USD)  '
                },
                min: 0,
                //
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
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
            credits: {
                enabled: false
            },
            tooltip: {
                formatter: function () {
                    return '<span style="font-size:10px">' + this.point.dt + '</span><br><table><tr><td style="padding:0">' +

                        '[ <span style="color:' + this.series.color + '">Ether Price : </a></span><b>' + this.point.y + '</b> ]<br>' +

                        '</td></tr></table>';
                }
            },
            series: [{
                type: 'area',
                turboThreshold: 7000,
                name: 'Daily Transaction Count',
                pointInterval: 24 * 3600 * 1000,
                pointStart: Date.UTC(2015, 6, 30) ,
                data: [{y : 230.47, dt : 'Saturday, July 22, 2017',  },{y : 228.32, dt : 'Sunday, July 23, 2017',  },{y : 225.48, dt : 'Monday, July 24, 2017',  },{y : 203.59, dt : 'Tuesday, July 25, 2017',  },{y : 202.88, dt : 'Wednesday, July 26, 2017',  },{y : 202.93, dt : 'Thursday, July 27, 2017',  },{y : 191.21, dt : 'Friday, July 28, 2017',  },{y : 206.14, dt : 'Saturday, July 29, 2017',  },{y : 196.78, dt : 'Sunday, July 30, 2017',  },{y : 201.33, dt : 'Monday, July 31, 2017',  },{y : 225.90, dt : 'Tuesday, August 1, 2017',  },{y : 218.12, dt : 'Wednesday, August 2, 2017',  },{y : 224.39, dt : 'Thursday, August 3, 2017',  },{y : 220.60, dt : 'Friday, August 4, 2017',  },{y : 253.09, dt : 'Saturday, August 5, 2017',  },{y : 264.56, dt : 'Sunday, August 6, 2017',  },{y : 269.94, dt : 'Monday, August 7, 2017',  },{y : 296.51, dt : 'Tuesday, August 8, 2017',  },{y : 295.28, dt : 'Wednesday, August 9, 2017',  },{y : 298.28, dt : 'Thursday, August 10, 2017',  },{y : 309.32, dt : 'Friday, August 11, 2017',  },{y : 308.02, dt : 'Saturday, August 12, 2017',  },{y : 296.62, dt : 'Sunday, August 13, 2017',  },{y : 299.16, dt : 'Monday, August 14, 2017',  },{y : 286.52, dt : 'Tuesday, August 15, 2017',  },{y : 301.38, dt : 'Wednesday, August 16, 2017',  },{y : 300.30, dt : 'Thursday, August 17, 2017',  },{y : 292.62, dt : 'Friday, August 18, 2017',  },{y : 293.02, dt : 'Saturday, August 19, 2017',  },{y : 298.20, dt : 'Sunday, August 20, 2017',  },{y : 317.86, dt : 'Monday, August 21, 2017',  },
                ]
            }]
        });
    });

</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/599af4ab1b1bed47ceb05cfe/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>