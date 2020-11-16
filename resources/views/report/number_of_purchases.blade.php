@extends('template')
@section('page_title')
@lang('messages.reports')
@stop
@section('content')
@include('errors')
<!-- BEGIN Content -->
<style>
#canvas-holder {
    width: 100%;
    margin-top: 50px;
    text-align: center;
}

#chartjs-tooltip {
    opacity: 1;
    position: absolute;
    background: rgba(0, 0, 0, .7);
    color: white;
    border-radius: 3px;
    -webkit-transition: all .1s ease;
    transition: all .1s ease;
    pointer-events: none;
    -webkit-transform: translate(-50%, 0);
    transform: translate(-50%, 0);
}

.chartjs-tooltip-key {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin-right: 10px;
}
</style>
<div id="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-black">
                <div class="box-title">
                    <h3><i class="fa fa-table"></i> @lang('messages.number_of_purchases')</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="btn-toolbar pull-right">
                        <div class="btn-group">

                        </div>
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="#0">
                                            <div class="tile tile-green">
                                                <div class="img">
                                                    <i class="fa fa-copy"></i>
                                                </div>
                                                <div class="content">
                                                    <p class="big">+{{$count_orders}}</p>
                                                    <p class="title">@lang('messages.number_of_purchases')</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 7%;">
                                <div class="table-responsive width_m_auto" style="overflow-x: hidden;">
                                    <table class="table table-striped table-bordered ">
                                        <tbody>
                                            <tr style="background: #ff3d67;">
                                                <td width='30%' class='label-view text-left' style="font-weight: bold">
                                                @lang('messages.cash')
                                              </td>
                                                <td style="font-weight: bold">{{$order_cash}}</td>
                                            </tr>
                                            <tr style="background: #ff9f40;">
                                                <td width='30%' class='label-view text-left' style="font-weight: bold">
                                                @lang('messages.Visa_After_Deliver')
                                              </td>
                                                <td style="font-weight: bold">{{$order_visa_after_deliver}}</td>
                                            </tr>
                                            <tr style="background: #4bc0c0;">
                                                <td width='30%' class='label-view text-left' style="font-weight: bold">
                                                NBE VISA
                                              </td>
                                                <td style="font-weight: bold">{{$order_NBE_VISA}}</td>
                                            </tr>
                                            <tr style="background: #059bff;">
                                                <td width='30%' class='label-view text-left' style="font-weight: bold">
                                                CIB VISA</td>
                                                <td style="font-weight: bold">{{$order_CIB_VISA}}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="canvas-holder" style="width: 300px;">
                                    <canvas id="chart-area" width="300" height="300"></canvas>
                                    <div id="chartjs-tooltip">
                                        <table></table>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@section('script')
<script type="text/javascript" src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>
<script type="text/javascript" src="https://www.chartjs.org/samples/latest/utils.js"></script>

<script>
Chart.defaults.global.tooltips.custom = function(tooltip) {
    // Tooltip Element
    var tooltipEl = document.getElementById('chartjs-tooltip');

    // Hide if no tooltip
    if (tooltip.opacity === 0) {
        tooltipEl.style.opacity = 0;
        return;
    }

    // Set caret Position
    tooltipEl.classList.remove('above', 'below', 'no-transform');
    if (tooltip.yAlign) {
        tooltipEl.classList.add(tooltip.yAlign);
    } else {
        tooltipEl.classList.add('no-transform');
    }

    function getBody(bodyItem) {
        return bodyItem.lines;
    }

    // Set Text
    if (tooltip.body) {
        var titleLines = tooltip.title || [];
        var bodyLines = tooltip.body.map(getBody);

        var innerHtml = '<thead>';

        titleLines.forEach(function(title) {
            innerHtml += '<tr><th>' + title + '</th></tr>';
        });
        innerHtml += '</thead><tbody>';

        bodyLines.forEach(function(body, i) {
            var colors = tooltip.labelColors[i];
            var style = 'background:' + colors.backgroundColor;
            style += '; border-color:' + colors.borderColor;
            style += '; border-width: 2px';
            var span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
            innerHtml += '<tr><td>' + span + body + '</td></tr>';
        });
        innerHtml += '</tbody>';

        var tableRoot = tooltipEl.querySelector('table');
        tableRoot.innerHTML = innerHtml;
    }

    var positionY = this._chart.canvas.offsetTop;
    var positionX = this._chart.canvas.offsetLeft;

    // Display, position, and set styles for font
    tooltipEl.style.opacity = 1;
    tooltipEl.style.left = positionX + tooltip.caretX + 'px';
    tooltipEl.style.top = positionY + tooltip.caretY + 'px';
    tooltipEl.style.fontFamily = tooltip._bodyFontFamily;
    tooltipEl.style.fontSize = tooltip.bodyFontSize;
    tooltipEl.style.fontStyle = tooltip._bodyFontStyle;
    tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
};

var config = {
    type: 'pie',
    data: {
        datasets: [{
            data: ["{{$order_cash}}", "{{$order_visa_after_deliver}}",
                "{{$order_NBE_VISA}}","{{$order_CIB_VISA}}"
            ],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.green,
                window.chartColors.blue,
                // window.chartColors.blue,
            ],
        }],
        labels: [
            'Cash',
            'Visa After Deliver',
            'NBE VISA',
            'CIB VISA',

        ]
    },
    options: {
        responsive: true,
        legend: {
            display: false
        },
        tooltips: {
            enabled: false,
        }
    }
};

window.onload = function() {
    var ctx = document.getElementById('chart-area').getContext('2d');
    window.myPie = new Chart(ctx, config);
};
</script>
<script>
$('#report').addClass('active');
$('#report_count').addClass('active');
</script>
@stop
