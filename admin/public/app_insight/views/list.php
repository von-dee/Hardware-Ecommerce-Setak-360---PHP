<?php 

    $result = $paging;

?>

<style type="text/css">
    .apexcharts-legend {
        display: flex;
        overflow: auto;
        padding: 0 10px;
    }

    .apexcharts-legend.position-bottom,
    .apexcharts-legend.position-top {
        flex-wrap: wrap
    }

    .apexcharts-legend.position-right,
    .apexcharts-legend.position-left {
        flex-direction: column;
        bottom: 0;
    }

    .apexcharts-legend.position-bottom.left,
    .apexcharts-legend.position-top.left,
    .apexcharts-legend.position-right,
    .apexcharts-legend.position-left {
        justify-content: flex-start;
    }

    .apexcharts-legend.position-bottom.center,
    .apexcharts-legend.position-top.center {
        justify-content: center;
    }

    .apexcharts-legend.position-bottom.right,
    .apexcharts-legend.position-top.right {
        justify-content: flex-end;
    }

    .apexcharts-legend-series {
        cursor: pointer;
        line-height: normal;
    }

    .apexcharts-legend.position-bottom .apexcharts-legend-series,
    .apexcharts-legend.position-top .apexcharts-legend-series {
        display: flex;
        align-items: center;
    }

    .apexcharts-legend-text {
        position: relative;
        font-size: 14px;
    }

    .apexcharts-legend-text *,
    .apexcharts-legend-marker * {
        pointer-events: none;
    }

    .apexcharts-legend-marker {
        position: relative;
        display: inline-block;
        cursor: pointer;
        margin-right: 3px;
    }

    .apexcharts-legend.right .apexcharts-legend-series,
    .apexcharts-legend.left .apexcharts-legend-series {
        display: inline-block;
    }

    .apexcharts-legend-series.no-click {
        cursor: auto;
    }

    .apexcharts-legend .apexcharts-hidden-zero-series,
    .apexcharts-legend .apexcharts-hidden-null-series {
        display: none !important;
    }

    .inactive-legend {
        opacity: 0.45;
    }
</style>

<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Get informed on activities on Setak.</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Insight</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba"><i class="feather icon-refresh-cw"></i> &nbsp; Refresh</button>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-4">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">Sales by Category</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link l-h-20 p-0 font-18 float-right" type="button"
                                            id="widgetCategory" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetCategory">
                                            <a class="dropdown-item font-13" href="#">Refresh</a>
                                            <a class="dropdown-item font-13" href="#">Export</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="position: relative;">
                            <div id="apex-pie-chart" class="my-4" style="min-height: 240px;">
                                <div id="apexcharts3zbwuued" class="apexcharts-canvas apexcharts3zbwuued light"
                                    style="width: 240px; height: 240px;"><svg id="SvgjsSvg1006" width="240" height="240"
                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <foreignObject x="0" y="0" width="240" height="240">
                                            <div class="apexcharts-legend center position-bottom"
                                                xmlns="http://www.w3.org/1999/xhtml"
                                                style="right: 0px; position: absolute; left: 0px; top: auto; bottom: 10px;">
                                                <div class="apexcharts-legend-series" rel="1" data:collapsed="false"
                                                    style="margin: 0px 5px;"><span class="apexcharts-legend-marker"
                                                        rel="1" data:collapsed="false"
                                                        style="background: rgb(0, 128, 255); color: rgb(0, 128, 255); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                        class="apexcharts-legend-text" rel="1" data:collapsed="false"
                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">Gadget</span>
                                                </div>
                                                <div class="apexcharts-legend-series" rel="2" data:collapsed="false"
                                                    style="margin: 0px 5px;"><span class="apexcharts-legend-marker"
                                                        rel="2" data:collapsed="false"
                                                        style="background: rgb(24, 210, 107); color: rgb(24, 210, 107); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                        class="apexcharts-legend-text" rel="2" data:collapsed="false"
                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">Fashion</span>
                                                </div>
                                                <div class="apexcharts-legend-series" rel="3" data:collapsed="false"
                                                    style="margin: 0px 5px;"><span class="apexcharts-legend-marker"
                                                        rel="3" data:collapsed="false"
                                                        style="background: rgb(212, 216, 222); color: rgb(212, 216, 222); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                        class="apexcharts-legend-text" rel="3" data:collapsed="false"
                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">Food</span>
                                                </div>
                                            </div>

                                        </foreignObject>
                                        <g id="SvgjsG1008" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(37, 0)">
                                            <defs id="SvgjsDefs1007">
                                                <clipPath id="gridRectMask3zbwuued">
                                                    <rect id="SvgjsRect1009" width="170" height="182" x="-1" y="-1"
                                                        rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMask3zbwuued">
                                                    <rect id="SvgjsRect1010" width="170" height="182" x="-1" y="-1"
                                                        rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0"></rect>
                                                </clipPath>
                                            </defs>
                                            <g id="SvgjsG1012" class="apexcharts-pie" data:innerTranslateX="0"
                                                data:innerTranslateY="-25">
                                                <g id="SvgjsG1013" transform="translate(0, -5) scale(1)">
                                                    <circle id="SvgjsCircle1014" r="64.55853658536586" cx="84" cy="84"
                                                        fill="transparent"></circle>
                                                    <g id="SvgjsG1015">
                                                        <g id="apexcharts-series-0"
                                                            class="apexcharts-series apexcharts-pie-series"
                                                            seriesName="Gadget" rel="1">
                                                            <path id="apexcharts-donut-slice-0"
                                                                d="M 84 8.048780487804876 A 75.95121951219512 75.95121951219512 0 0 1 102.17631655101108 157.74421510889576 L 99.44986906835942 146.6825828425614 A 64.55853658536586 64.55853658536586 0 0 0 84 19.441463414634143 L 84 8.048780487804876 z"
                                                                fill="rgba(0,128,255,1)" fill-opacity="1"
                                                                stroke="#ffffff" stroke-opacity="1"
                                                                stroke-linecap="butt" stroke-width="2"
                                                                stroke-dasharray="0" class="apexcharts-pie-area"
                                                                index="0" j="0" data:angle="166.15384615384616"
                                                                data:startAngle="0" data:strokeWidth="2" data:value="60"
                                                                data:pathOrig="M 84 8.048780487804876 A 75.95121951219512 75.95121951219512 0 0 1 102.17631655101108 157.74421510889576 L 99.44986906835942 146.6825828425614 A 64.55853658536586 64.55853658536586 0 0 0 84 19.441463414634143 L 84 8.048780487804876 z">
                                                            </path>
                                                        </g>
                                                        <g id="apexcharts-series-1"
                                                            class="apexcharts-series apexcharts-pie-series"
                                                            seriesName="Fashion" rel="2">
                                                            <path id="apexcharts-donut-slice-1"
                                                                d="M 102.17631655101108 157.74421510889576 A 75.95121951219512 75.95121951219512 0 0 1 12.984376104332142 57.06732638413525 L 23.63671968868232 61.10722742651496 A 64.55853658536586 64.55853658536586 0 0 0 99.44986906835942 146.6825828425614 L 102.17631655101108 157.74421510889576 z"
                                                                fill="rgba(24,210,107,1)" fill-opacity="1"
                                                                stroke="#ffffff" stroke-opacity="1"
                                                                stroke-linecap="butt" stroke-width="2"
                                                                stroke-dasharray="0" class="apexcharts-pie-area"
                                                                index="0" j="1" data:angle="124.61538461538461"
                                                                data:startAngle="166.15384615384616"
                                                                data:strokeWidth="2" data:value="45"
                                                                data:pathOrig="M 102.17631655101108 157.74421510889576 A 75.95121951219512 75.95121951219512 0 0 1 12.984376104332142 57.06732638413525 L 23.63671968868232 61.10722742651496 A 64.55853658536586 64.55853658536586 0 0 0 99.44986906835942 146.6825828425614 L 102.17631655101108 157.74421510889576 z">
                                                            </path>
                                                        </g>
                                                        <g id="apexcharts-series-2"
                                                            class="apexcharts-series apexcharts-pie-series"
                                                            seriesName="Food" rel="3">
                                                            <path id="apexcharts-donut-slice-2"
                                                                d="M 12.984376104332142 57.06732638413525 A 75.95121951219512 75.95121951219512 0 0 1 83.98674401155336 8.048781644608098 L 83.98873240982036 19.441464397916874 A 64.55853658536586 64.55853658536586 0 0 0 23.63671968868232 61.10722742651496 L 12.984376104332142 57.06732638413525 z"
                                                                fill="rgba(212,216,222,1)" fill-opacity="1"
                                                                stroke="#ffffff" stroke-opacity="1"
                                                                stroke-linecap="butt" stroke-width="2"
                                                                stroke-dasharray="0" class="apexcharts-pie-area"
                                                                index="0" j="2" data:angle="69.23076923076923"
                                                                data:startAngle="290.7692307692308" data:strokeWidth="2"
                                                                data:value="25"
                                                                data:pathOrig="M 12.984376104332142 57.06732638413525 A 75.95121951219512 75.95121951219512 0 0 1 83.98674401155336 8.048781644608098 L 83.98873240982036 19.441464397916874 A 64.55853658536586 64.55853658536586 0 0 0 23.63671968868232 61.10722742651496 L 12.984376104332142 57.06732638413525 z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                            <line id="SvgjsLine1022" x1="0" y1="0" x2="168" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs">
                                            </line>
                                            <line id="SvgjsLine1023" x1="0" y1="0" x2="168" y2="0" stroke-dasharray="0"
                                                stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                        </g>
                                    </svg>
                                    <div class="apexcharts-tooltip dark">
                                        <div class="apexcharts-tooltip-series-group"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(0, 128, 255);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-label"></span><span
                                                        class="apexcharts-tooltip-text-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(24, 210, 107);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-label"></span><span
                                                        class="apexcharts-tooltip-text-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(212, 216, 222);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-label"></span><span
                                                        class="apexcharts-tooltip-text-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 333px; height: 329px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                        <div class="card-footer py-3 text-center">
                            <div class="row">
                                <div class="col-6 border-right">
                                    <p class="mb-1">Total Sale</p>
                                    <h4 class="mb-0">250</h4>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1">Total Profit</p>
                                    <h4 class="mb-0">$495</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <h5 class="card-title mb-0">Average <br>Revenue</h5>
                                </div>
                                <div class="col-7 text-right">
                                    <h4 class="mb-0">$2075 <span
                                            class="badge badge-secondary-inverse font-14 v-a-m">+23</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-8">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">Quick Summary</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link l-h-20 p-0 font-18 float-right" type="button"
                                            id="widgetSummary" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetSummary">
                                            <a class="dropdown-item font-13" href="#">Refresh</a>
                                            <a class="dropdown-item font-13" href="#">Export</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-0">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="revenue-box border-bottom mb-2">
                                        <h4>$1598</h4>
                                        <p>Total Earning <a href="#">Withdraw</a></p>
                                    </div>
                                    <div class="revenue-box">
                                        <h4>$1285</h4>
                                        <p>To be Paid <a href="#">Pay</a></p>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div id="apex-stacked-bar-chart" style="min-height: 275px;">
                                        <div id="apexchartsimxpb281" class="apexcharts-canvas apexchartsimxpb281 light"
                                            style="width: 483px; height: 260px;"><svg id="SvgjsSvg1024" width="483"
                                                height="260" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG1026" class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(49.25, 30)">
                                                    <defs id="SvgjsDefs1025">
                                                        <linearGradient id="SvgjsLinearGradient1029" x1="0" y1="0"
                                                            x2="0" y2="1">
                                                            <stop id="SvgjsStop1030" stop-opacity="0.4"
                                                                stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                            <stop id="SvgjsStop1031" stop-opacity="0.5"
                                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                            <stop id="SvgjsStop1032" stop-opacity="0.5"
                                                                stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                        </linearGradient>
                                                        <clipPath id="gridRectMaskimxpb281">
                                                            <rect id="SvgjsRect1045" width="423.75" height="187.348"
                                                                x="0" y="0" rx="0" ry="0" fill="#ffffff" opacity="1"
                                                                stroke-width="0" stroke="none" stroke-dasharray="0">
                                                            </rect>
                                                        </clipPath>
                                                        <clipPath id="gridRectMarkerMaskimxpb281">
                                                            <rect id="SvgjsRect1046" width="425.75" height="189.348"
                                                                x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1"
                                                                stroke-width="0" stroke="none" stroke-dasharray="0">
                                                            </rect>
                                                        </clipPath>
                                                    </defs>
                                                    <rect id="SvgjsRect1033" width="8.541194255479969" height="187.348"
                                                        x="0" y="0" rx="0" ry="0" fill="url(#SvgjsLinearGradient1029)"
                                                        opacity="1" stroke-width="0" stroke-dasharray="3"
                                                        class="apexcharts-xcrosshairs" y2="187.348" filter="none"
                                                        fill-opacity="0.9"></rect>
                                                    <g id="SvgjsG1153" class="apexcharts-xaxis"
                                                        transform="translate(0, 0)">
                                                        <g id="SvgjsG1154" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, -4)"><text id="SvgjsText1155"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                x="19.573570168808267" y="216.348" text-anchor="middle"
                                                                dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                                class="apexcharts-xaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1156"
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    Jan '10</tspan>
                                                                <title>Jan '10</title>
                                                            </text><text id="SvgjsText1157"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                x="104.98551272360797" y="216.348" text-anchor="middle"
                                                                dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                                class="apexcharts-xaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1158"
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    03 Jan</tspan>
                                                                <title>03 Jan</title>
                                                            </text><text id="SvgjsText1159"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                x="190.39745527840768" y="216.348" text-anchor="middle"
                                                                dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                                class="apexcharts-xaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1160"
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    05 Jan</tspan>
                                                                <title>05 Jan</title>
                                                            </text><text id="SvgjsText1161"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                x="275.80939783320736" y="216.348" text-anchor="middle"
                                                                dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                                class="apexcharts-xaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1162"
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    07 Jan</tspan>
                                                                <title>07 Jan</title>
                                                            </text><text id="SvgjsText1163"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                x="361.22134038800704" y="216.348" text-anchor="middle"
                                                                dominant-baseline="auto" font-size="12px" fill="#373d3f"
                                                                class="apexcharts-xaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1164"
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    09 Jan</tspan>
                                                                <title>09 Jan</title>
                                                            </text></g>
                                                        <line id="SvgjsLine1165" x1="-15" y1="188.348" x2="423.75"
                                                            y2="188.348" stroke="rgba(0,0,0,0.05)" stroke-dasharray="0"
                                                            stroke-width="1"></line>
                                                    </g>
                                                    <g id="SvgjsG1174" class="apexcharts-grid">
                                                        <g id="SvgjsG1175" class="apexcharts-gridlines-horizontal">
                                                            <line id="SvgjsLine1182" x1="0" y1="0" x2="423.75" y2="0"
                                                                stroke="rgba(0,0,0,0.05)" stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1183" x1="0" y1="37.4696" x2="423.75"
                                                                y2="37.4696" stroke="rgba(0,0,0,0.05)"
                                                                stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1184" x1="0" y1="74.9392" x2="423.75"
                                                                y2="74.9392" stroke="rgba(0,0,0,0.05)"
                                                                stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1185" x1="0" y1="112.4088" x2="423.75"
                                                                y2="112.4088" stroke="rgba(0,0,0,0.05)"
                                                                stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1186" x1="0" y1="149.8784" x2="423.75"
                                                                y2="149.8784" stroke="rgba(0,0,0,0.05)"
                                                                stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1187" x1="0" y1="187.348" x2="423.75"
                                                                y2="187.348" stroke="rgba(0,0,0,0.05)"
                                                                stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG1176" class="apexcharts-gridlines-vertical"></g>
                                                        <line id="SvgjsLine1177" x1="19.573570168808267" y1="188.348"
                                                            x2="19.573570168808267" y2="194.348"
                                                            stroke="rgba(0,0,0,0.05)" stroke-dasharray="0"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1178" x1="104.98551272360797" y1="188.348"
                                                            x2="104.98551272360797" y2="194.348"
                                                            stroke="rgba(0,0,0,0.05)" stroke-dasharray="0"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1179" x1="190.39745527840768" y1="188.348"
                                                            x2="190.39745527840768" y2="194.348"
                                                            stroke="rgba(0,0,0,0.05)" stroke-dasharray="0"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1180" x1="275.80939783320736" y1="188.348"
                                                            x2="275.80939783320736" y2="194.348"
                                                            stroke="rgba(0,0,0,0.05)" stroke-dasharray="0"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1181" x1="361.22134038800704" y1="188.348"
                                                            x2="361.22134038800704" y2="194.348"
                                                            stroke="rgba(0,0,0,0.05)" stroke-dasharray="0"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <rect id="SvgjsRect1188" width="423.75" height="37.4696" x="0"
                                                            y="0" rx="0" ry="0" fill="transparent" opacity="0.2"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            class="apexcharts-gridRow"></rect>
                                                        <rect id="SvgjsRect1189" width="423.75" height="37.4696" x="0"
                                                            y="37.4696" rx="0" ry="0" fill="transparent" opacity="0.2"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            class="apexcharts-gridRow"></rect>
                                                        <rect id="SvgjsRect1190" width="423.75" height="37.4696" x="0"
                                                            y="74.9392" rx="0" ry="0" fill="transparent" opacity="0.2"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            class="apexcharts-gridRow"></rect>
                                                        <rect id="SvgjsRect1191" width="423.75" height="37.4696" x="0"
                                                            y="112.4088" rx="0" ry="0" fill="transparent" opacity="0.2"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            class="apexcharts-gridRow"></rect>
                                                        <rect id="SvgjsRect1192" width="423.75" height="37.4696" x="0"
                                                            y="149.8784" rx="0" ry="0" fill="transparent" opacity="0.2"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            class="apexcharts-gridRow"></rect>
                                                        <line id="SvgjsLine1194" x1="0" y1="187.348" x2="423.75"
                                                            y2="187.348" stroke="transparent" stroke-dasharray="0">
                                                        </line>
                                                        <line id="SvgjsLine1193" x1="0" y1="1" x2="0" y2="187.348"
                                                            stroke="transparent" stroke-dasharray="0"></line>
                                                    </g>
                                                    <g id="SvgjsG1048"
                                                        class="apexcharts-bar-series apexcharts-plot-series">
                                                        <g id="SvgjsG1049" class="apexcharts-series"
                                                            seriesName="Earning" rel="1" data:realIndex="0">
                                                            <path id="apexcharts-bar-area-0"
                                                                d="M14.947089947089948 187.348L14.947089947089948 124.89866666666667L23.488284202569915 124.89866666666667L23.488284202569915 187.348L14.947089947089948 187.348C14.947089947089948 187.348 14.947089947089948 187.348 14.947089947089948 187.348 "
                                                                fill="rgba(0,128,255,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="0"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 14.947089947089948 187.348L 14.947089947089948 124.89866666666667L 23.488284202569915 124.89866666666667L 23.488284202569915 187.348L 14.947089947089948 187.348"
                                                                pathFrom="M 14.947089947089948 187.348L 14.947089947089948 187.348L 23.488284202569915 187.348L 23.488284202569915 187.348L 23.488284202569915 187.348L 14.947089947089948 187.348"
                                                                cy="124.89866666666667" cx="23.48828420256992" j="0"
                                                                val="5" barHeight="62.44933333333334"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-0"
                                                                d="M57.6530612244898 187.348L57.6530612244898 99.91893333333334L66.19425547996977 99.91893333333334L66.19425547996977 187.348L57.6530612244898 187.348C57.6530612244898 187.348 57.6530612244898 187.348 57.6530612244898 187.348 "
                                                                fill="rgba(0,128,255,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="0"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 57.6530612244898 187.348L 57.6530612244898 99.91893333333334L 66.19425547996977 99.91893333333334L 66.19425547996977 187.348L 57.6530612244898 187.348"
                                                                pathFrom="M 57.6530612244898 187.348L 57.6530612244898 187.348L 66.19425547996977 187.348L 66.19425547996977 187.348L 66.19425547996977 187.348L 57.6530612244898 187.348"
                                                                cy="99.91893333333334" cx="66.19425547996977" j="1"
                                                                val="7" barHeight="87.42906666666667"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-0"
                                                                d="M100.35903250188963 187.348L100.35903250188963 87.42906666666667L108.9002267573696 87.42906666666667L108.9002267573696 187.348L100.35903250188963 187.348C100.35903250188963 187.348 100.35903250188963 187.348 100.35903250188963 187.348 "
                                                                fill="rgba(0,128,255,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="0"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 100.35903250188963 187.348L 100.35903250188963 87.42906666666667L 108.9002267573696 87.42906666666667L 108.9002267573696 187.348L 100.35903250188963 187.348"
                                                                pathFrom="M 100.35903250188963 187.348L 100.35903250188963 187.348L 108.9002267573696 187.348L 108.9002267573696 187.348L 108.9002267573696 187.348L 100.35903250188963 187.348"
                                                                cy="87.42906666666667" cx="108.9002267573696" j="2"
                                                                val="8" barHeight="99.91893333333334"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-0"
                                                                d="M143.06500377928947 187.348L143.06500377928947 112.4088L151.60619803476945 112.4088L151.60619803476945 187.348L143.06500377928947 187.348C143.06500377928947 187.348 143.06500377928947 187.348 143.06500377928947 187.348 "
                                                                fill="rgba(0,128,255,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="0"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 143.06500377928947 187.348L 143.06500377928947 112.4088L 151.60619803476945 112.4088L 151.60619803476945 187.348L 143.06500377928947 187.348"
                                                                pathFrom="M 143.06500377928947 187.348L 143.06500377928947 187.348L 151.60619803476945 187.348L 151.60619803476945 187.348L 151.60619803476945 187.348L 143.06500377928947 187.348"
                                                                cy="112.4088" cx="151.60619803476945" j="3" val="6"
                                                                barHeight="74.93920000000001"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-0"
                                                                d="M185.77097505668934 187.348L185.77097505668934 99.91893333333334L194.31216931216932 99.91893333333334L194.31216931216932 187.348L185.77097505668934 187.348C185.77097505668934 187.348 185.77097505668934 187.348 185.77097505668934 187.348 "
                                                                fill="rgba(0,128,255,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="0"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 185.77097505668934 187.348L 185.77097505668934 99.91893333333334L 194.31216931216932 99.91893333333334L 194.31216931216932 187.348L 185.77097505668934 187.348"
                                                                pathFrom="M 185.77097505668934 187.348L 185.77097505668934 187.348L 194.31216931216932 187.348L 194.31216931216932 187.348L 194.31216931216932 187.348L 185.77097505668934 187.348"
                                                                cy="99.91893333333334" cx="194.31216931216932" j="4"
                                                                val="7" barHeight="87.42906666666667"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-0"
                                                                d="M228.47694633408918 187.348L228.47694633408918 124.89866666666667L237.01814058956916 124.89866666666667L237.01814058956916 187.348L228.47694633408918 187.348C228.47694633408918 187.348 228.47694633408918 187.348 228.47694633408918 187.348 "
                                                                fill="rgba(0,128,255,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="0"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 228.47694633408918 187.348L 228.47694633408918 124.89866666666667L 237.01814058956916 124.89866666666667L 237.01814058956916 187.348L 228.47694633408918 187.348"
                                                                pathFrom="M 228.47694633408918 187.348L 228.47694633408918 187.348L 237.01814058956916 187.348L 237.01814058956916 187.348L 237.01814058956916 187.348L 228.47694633408918 187.348"
                                                                cy="124.89866666666667" cx="237.01814058956916" j="5"
                                                                val="5" barHeight="62.44933333333334"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-0"
                                                                d="M271.1829176114891 187.348L271.1829176114891 112.4088L279.72411186696905 112.4088L279.72411186696905 187.348L271.1829176114891 187.348C271.1829176114891 187.348 271.1829176114891 187.348 271.1829176114891 187.348 "
                                                                fill="rgba(0,128,255,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="0"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 271.1829176114891 187.348L 271.1829176114891 112.4088L 279.72411186696905 112.4088L 279.72411186696905 187.348L 271.1829176114891 187.348"
                                                                pathFrom="M 271.1829176114891 187.348L 271.1829176114891 187.348L 279.72411186696905 187.348L 279.72411186696905 187.348L 279.72411186696905 187.348L 271.1829176114891 187.348"
                                                                cy="112.4088" cx="279.72411186696905" j="6" val="6"
                                                                barHeight="74.93920000000001"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-0"
                                                                d="M313.8888888888889 187.348L313.8888888888889 112.4088L322.4300831443689 112.4088L322.4300831443689 187.348L313.8888888888889 187.348C313.8888888888889 187.348 313.8888888888889 187.348 313.8888888888889 187.348 "
                                                                fill="rgba(0,128,255,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="0"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 313.8888888888889 187.348L 313.8888888888889 112.4088L 322.4300831443689 112.4088L 322.4300831443689 187.348L 313.8888888888889 187.348"
                                                                pathFrom="M 313.8888888888889 187.348L 313.8888888888889 187.348L 322.4300831443689 187.348L 322.4300831443689 187.348L 322.4300831443689 187.348L 313.8888888888889 187.348"
                                                                cy="112.4088" cx="322.4300831443689" j="7" val="6"
                                                                barHeight="74.93920000000001"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-0"
                                                                d="M356.59486016628875 187.348L356.59486016628875 99.91893333333334L365.13605442176873 99.91893333333334L365.13605442176873 187.348L356.59486016628875 187.348C356.59486016628875 187.348 356.59486016628875 187.348 356.59486016628875 187.348 "
                                                                fill="rgba(0,128,255,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="0"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 356.59486016628875 187.348L 356.59486016628875 99.91893333333334L 365.13605442176873 99.91893333333334L 365.13605442176873 187.348L 356.59486016628875 187.348"
                                                                pathFrom="M 356.59486016628875 187.348L 356.59486016628875 187.348L 365.13605442176873 187.348L 365.13605442176873 187.348L 365.13605442176873 187.348L 356.59486016628875 187.348"
                                                                cy="99.91893333333334" cx="365.13605442176873" j="8"
                                                                val="7" barHeight="87.42906666666667"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-0"
                                                                d="M399.3008314436886 187.348L399.3008314436886 137.38853333333333L407.8420256991686 137.38853333333333L407.8420256991686 187.348L399.3008314436886 187.348C399.3008314436886 187.348 399.3008314436886 187.348 399.3008314436886 187.348 "
                                                                fill="rgba(0,128,255,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="0"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 399.3008314436886 187.348L 399.3008314436886 137.38853333333333L 407.8420256991686 137.38853333333333L 407.8420256991686 187.348L 399.3008314436886 187.348"
                                                                pathFrom="M 399.3008314436886 187.348L 399.3008314436886 187.348L 407.8420256991686 187.348L 407.8420256991686 187.348L 407.8420256991686 187.348L 399.3008314436886 187.348"
                                                                cy="137.38853333333333" cx="407.8420256991686" j="9"
                                                                val="4" barHeight="49.95946666666667"
                                                                barWidth="8.541194255479969"></path>
                                                            <g id="SvgjsG1050" class="apexcharts-datalabels">
                                                                <g id="SvgjsG1053" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1055"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="19.217687074829932" y="163.12333333333333"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="19.217687074829932" cy="163.12333333333333"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">5</text>
                                                                </g>
                                                                <g id="SvgjsG1058" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1060"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="61.923658352229786" y="150.63346666666666"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="61.923658352229786" cy="150.63346666666666"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">7</text>
                                                                </g>
                                                                <g id="SvgjsG1063" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1065"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="104.6296296296296" y="144.38853333333333"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="104.6296296296296" cy="144.38853333333333"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">8</text>
                                                                </g>
                                                                <g id="SvgjsG1068" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1070"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="147.33560090702946" y="156.8784"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="147.33560090702946" cy="156.8784"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">6</text>
                                                                </g>
                                                                <g id="SvgjsG1073" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1075"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="190.04157218442933" y="150.63346666666666"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="190.04157218442933" cy="150.63346666666666"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">7</text>
                                                                </g>
                                                                <g id="SvgjsG1078" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1080"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="232.74754346182917" y="163.12333333333333"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="232.74754346182917" cy="163.12333333333333"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">5</text>
                                                                </g>
                                                                <g id="SvgjsG1083" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1085"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="275.4535147392291" y="156.8784"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="275.4535147392291" cy="156.8784"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">6</text>
                                                                </g>
                                                                <g id="SvgjsG1088" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1090"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="318.15948601662893" y="156.8784"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="318.15948601662893" cy="156.8784"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">6</text>
                                                                </g>
                                                                <g id="SvgjsG1093" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1095"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="360.8654572940288" y="150.63346666666666"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="360.8654572940288" cy="150.63346666666666"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">7</text>
                                                                </g>
                                                                <g id="SvgjsG1098" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1100"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="403.5714285714286" y="169.36826666666667"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="403.5714285714286" cy="169.36826666666667"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">4</text>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1101" class="apexcharts-series" seriesName="Paid"
                                                            rel="2" data:realIndex="1">
                                                            <path id="apexcharts-bar-area-1"
                                                                d="M14.947089947089948 124.89866666666667L14.947089947089948 62.44933333333333L23.488284202569915 62.44933333333333L23.488284202569915 124.89866666666667L14.947089947089948 124.89866666666667C14.947089947089948 124.89866666666667 14.947089947089948 124.89866666666667 14.947089947089948 124.89866666666667 "
                                                                fill="rgba(212,216,222,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="1"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 14.947089947089948 124.89866666666667L 14.947089947089948 62.44933333333333L 23.488284202569915 62.44933333333333L 23.488284202569915 124.89866666666667L 14.947089947089948 124.89866666666667"
                                                                pathFrom="M 14.947089947089948 124.89866666666667L 14.947089947089948 124.89866666666667L 23.488284202569915 124.89866666666667L 23.488284202569915 124.89866666666667L 23.488284202569915 124.89866666666667L 14.947089947089948 124.89866666666667"
                                                                cy="62.44933333333333" cx="23.48828420256992" j="0"
                                                                val="5" barHeight="62.44933333333334"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-1"
                                                                d="M57.6530612244898 99.91893333333334L57.6530612244898 49.95946666666667L66.19425547996977 49.95946666666667L66.19425547996977 99.91893333333334L57.6530612244898 99.91893333333334C57.6530612244898 99.91893333333334 57.6530612244898 99.91893333333334 57.6530612244898 99.91893333333334 "
                                                                fill="rgba(212,216,222,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="1"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 57.6530612244898 99.91893333333334L 57.6530612244898 49.95946666666667L 66.19425547996977 49.95946666666667L 66.19425547996977 99.91893333333334L 57.6530612244898 99.91893333333334"
                                                                pathFrom="M 57.6530612244898 99.91893333333334L 57.6530612244898 99.91893333333334L 66.19425547996977 99.91893333333334L 66.19425547996977 99.91893333333334L 66.19425547996977 99.91893333333334L 57.6530612244898 99.91893333333334"
                                                                cy="49.95946666666667" cx="66.19425547996977" j="1"
                                                                val="4" barHeight="49.95946666666667"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-1"
                                                                d="M100.35903250188963 87.42906666666667L100.35903250188963 37.4696L108.9002267573696 37.4696L108.9002267573696 87.42906666666667L100.35903250188963 87.42906666666667C100.35903250188963 87.42906666666667 100.35903250188963 87.42906666666667 100.35903250188963 87.42906666666667 "
                                                                fill="rgba(212,216,222,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="1"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 100.35903250188963 87.42906666666667L 100.35903250188963 37.4696L 108.9002267573696 37.4696L 108.9002267573696 87.42906666666667L 100.35903250188963 87.42906666666667"
                                                                pathFrom="M 100.35903250188963 87.42906666666667L 100.35903250188963 87.42906666666667L 108.9002267573696 87.42906666666667L 108.9002267573696 87.42906666666667L 108.9002267573696 87.42906666666667L 100.35903250188963 87.42906666666667"
                                                                cy="37.4696" cx="108.9002267573696" j="2" val="4"
                                                                barHeight="49.95946666666667"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-1"
                                                                d="M143.06500377928947 112.4088L143.06500377928947 49.95946666666666L151.60619803476945 49.95946666666666L151.60619803476945 112.4088L143.06500377928947 112.4088C143.06500377928947 112.4088 143.06500377928947 112.4088 143.06500377928947 112.4088 "
                                                                fill="rgba(212,216,222,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="1"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 143.06500377928947 112.4088L 143.06500377928947 49.95946666666666L 151.60619803476945 49.95946666666666L 151.60619803476945 112.4088L 143.06500377928947 112.4088"
                                                                pathFrom="M 143.06500377928947 112.4088L 143.06500377928947 112.4088L 151.60619803476945 112.4088L 151.60619803476945 112.4088L 151.60619803476945 112.4088L 143.06500377928947 112.4088"
                                                                cy="49.95946666666666" cx="151.60619803476945" j="3"
                                                                val="5" barHeight="62.44933333333334"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-1"
                                                                d="M185.77097505668934 99.91893333333334L185.77097505668934 62.449333333333335L194.31216931216932 62.449333333333335L194.31216931216932 99.91893333333334L185.77097505668934 99.91893333333334C185.77097505668934 99.91893333333334 185.77097505668934 99.91893333333334 185.77097505668934 99.91893333333334 "
                                                                fill="rgba(212,216,222,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="1"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 185.77097505668934 99.91893333333334L 185.77097505668934 62.449333333333335L 194.31216931216932 62.449333333333335L 194.31216931216932 99.91893333333334L 185.77097505668934 99.91893333333334"
                                                                pathFrom="M 185.77097505668934 99.91893333333334L 185.77097505668934 99.91893333333334L 194.31216931216932 99.91893333333334L 194.31216931216932 99.91893333333334L 194.31216931216932 99.91893333333334L 185.77097505668934 99.91893333333334"
                                                                cy="62.449333333333335" cx="194.31216931216932" j="4"
                                                                val="3" barHeight="37.46960000000001"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-1"
                                                                d="M228.47694633408918 124.89866666666667L228.47694633408918 74.9392L237.01814058956916 74.9392L237.01814058956916 124.89866666666667L228.47694633408918 124.89866666666667C228.47694633408918 124.89866666666667 228.47694633408918 124.89866666666667 228.47694633408918 124.89866666666667 "
                                                                fill="rgba(212,216,222,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="1"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 228.47694633408918 124.89866666666667L 228.47694633408918 74.9392L 237.01814058956916 74.9392L 237.01814058956916 124.89866666666667L 228.47694633408918 124.89866666666667"
                                                                pathFrom="M 228.47694633408918 124.89866666666667L 228.47694633408918 124.89866666666667L 237.01814058956916 124.89866666666667L 237.01814058956916 124.89866666666667L 237.01814058956916 124.89866666666667L 228.47694633408918 124.89866666666667"
                                                                cy="74.9392" cx="237.01814058956916" j="5" val="4"
                                                                barHeight="49.95946666666667"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-1"
                                                                d="M271.1829176114891 112.4088L271.1829176114891 74.9392L279.72411186696905 74.9392L279.72411186696905 112.4088L271.1829176114891 112.4088C271.1829176114891 112.4088 271.1829176114891 112.4088 271.1829176114891 112.4088 "
                                                                fill="rgba(212,216,222,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="1"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 271.1829176114891 112.4088L 271.1829176114891 74.9392L 279.72411186696905 74.9392L 279.72411186696905 112.4088L 271.1829176114891 112.4088"
                                                                pathFrom="M 271.1829176114891 112.4088L 271.1829176114891 112.4088L 279.72411186696905 112.4088L 279.72411186696905 112.4088L 279.72411186696905 112.4088L 271.1829176114891 112.4088"
                                                                cy="74.9392" cx="279.72411186696905" j="6" val="3"
                                                                barHeight="37.46960000000001"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-1"
                                                                d="M313.8888888888889 112.4088L313.8888888888889 49.95946666666666L322.4300831443689 49.95946666666666L322.4300831443689 112.4088L313.8888888888889 112.4088C313.8888888888889 112.4088 313.8888888888889 112.4088 313.8888888888889 112.4088 "
                                                                fill="rgba(212,216,222,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="1"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 313.8888888888889 112.4088L 313.8888888888889 49.95946666666666L 322.4300831443689 49.95946666666666L 322.4300831443689 112.4088L 313.8888888888889 112.4088"
                                                                pathFrom="M 313.8888888888889 112.4088L 313.8888888888889 112.4088L 322.4300831443689 112.4088L 322.4300831443689 112.4088L 322.4300831443689 112.4088L 313.8888888888889 112.4088"
                                                                cy="49.95946666666666" cx="322.4300831443689" j="7"
                                                                val="5" barHeight="62.44933333333334"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-1"
                                                                d="M356.59486016628875 99.91893333333334L356.59486016628875 49.95946666666667L365.13605442176873 49.95946666666667L365.13605442176873 99.91893333333334L356.59486016628875 99.91893333333334C356.59486016628875 99.91893333333334 356.59486016628875 99.91893333333334 356.59486016628875 99.91893333333334 "
                                                                fill="rgba(212,216,222,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="1"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 356.59486016628875 99.91893333333334L 356.59486016628875 49.95946666666667L 365.13605442176873 49.95946666666667L 365.13605442176873 99.91893333333334L 356.59486016628875 99.91893333333334"
                                                                pathFrom="M 356.59486016628875 99.91893333333334L 356.59486016628875 99.91893333333334L 365.13605442176873 99.91893333333334L 365.13605442176873 99.91893333333334L 365.13605442176873 99.91893333333334L 356.59486016628875 99.91893333333334"
                                                                cy="49.95946666666667" cx="365.13605442176873" j="8"
                                                                val="4" barHeight="49.95946666666667"
                                                                barWidth="8.541194255479969"></path>
                                                            <path id="apexcharts-bar-area-1"
                                                                d="M399.3008314436886 137.38853333333333L399.3008314436886 62.449333333333314L407.8420256991686 62.449333333333314L407.8420256991686 137.38853333333333L399.3008314436886 137.38853333333333C399.3008314436886 137.38853333333333 399.3008314436886 137.38853333333333 399.3008314436886 137.38853333333333 "
                                                                fill="rgba(212,216,222,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="0" stroke-dasharray="0"
                                                                class="apexcharts-bar-area" index="1"
                                                                clip-path="url(#gridRectMaskimxpb281)"
                                                                pathTo="M 399.3008314436886 137.38853333333333L 399.3008314436886 62.449333333333314L 407.8420256991686 62.449333333333314L 407.8420256991686 137.38853333333333L 399.3008314436886 137.38853333333333"
                                                                pathFrom="M 399.3008314436886 137.38853333333333L 399.3008314436886 137.38853333333333L 407.8420256991686 137.38853333333333L 407.8420256991686 137.38853333333333L 407.8420256991686 137.38853333333333L 399.3008314436886 137.38853333333333"
                                                                cy="62.449333333333314" cx="407.8420256991686" j="9"
                                                                val="6" barHeight="74.93920000000001"
                                                                barWidth="8.541194255479969"></path>
                                                            <g id="SvgjsG1102" class="apexcharts-datalabels">
                                                                <g id="SvgjsG1105" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1107"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="19.217687074829932" y="100.674"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="19.217687074829932" cy="100.674"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">5</text>
                                                                </g>
                                                                <g id="SvgjsG1110" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1112"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="61.923658352229786" y="81.9392"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="61.923658352229786" cy="81.9392"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">4</text>
                                                                </g>
                                                                <g id="SvgjsG1115" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1117"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="104.6296296296296" y="69.44933333333333"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="104.6296296296296" cy="69.44933333333333"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">4</text>
                                                                </g>
                                                                <g id="SvgjsG1120" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1122"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="147.33560090702946" y="88.18413333333334"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="147.33560090702946" cy="88.18413333333334"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">5</text>
                                                                </g>
                                                                <g id="SvgjsG1125" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1127"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="190.04157218442933" y="88.18413333333334"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="190.04157218442933" cy="88.18413333333334"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">3</text>
                                                                </g>
                                                                <g id="SvgjsG1130" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1132"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="232.74754346182917" y="106.91893333333334"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="232.74754346182917" cy="106.91893333333334"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">4</text>
                                                                </g>
                                                                <g id="SvgjsG1135" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1137"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="275.4535147392291" y="100.674"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="275.4535147392291" cy="100.674"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">3</text>
                                                                </g>
                                                                <g id="SvgjsG1140" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1142"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="318.15948601662893" y="88.18413333333334"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="318.15948601662893" cy="88.18413333333334"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">5</text>
                                                                </g>
                                                                <g id="SvgjsG1145" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1147"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="360.8654572940288" y="81.9392"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="360.8654572940288" cy="81.9392"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">4</text>
                                                                </g>
                                                                <g id="SvgjsG1150" class="apexcharts-data-labels"><text
                                                                        id="SvgjsText1152"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="403.5714285714286" y="106.91893333333331"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="12px" fill="#ffffff"
                                                                        class="apexcharts-datalabel"
                                                                        cx="403.5714285714286" cy="106.91893333333331"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">6</text>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <line id="SvgjsLine1195" x1="0" y1="0" x2="423.75" y2="0"
                                                        stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line id="SvgjsLine1196" x1="0" y1="0" x2="423.75" y2="0"
                                                        stroke-dasharray="0" stroke-width="0"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG1197" class="apexcharts-yaxis-annotations"></g>
                                                    <g id="SvgjsG1198" class="apexcharts-xaxis-annotations"></g>
                                                    <g id="SvgjsG1199" class="apexcharts-point-annotations"></g>
                                                </g>
                                                <g id="SvgjsG1166" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(16.25, 0)">
                                                    <g id="SvgjsG1167" class="apexcharts-yaxis-texts-g"><text
                                                            id="SvgjsText1168"
                                                            font-family="Helvetica, Arial, sans-serif" x="20" y="31.5"
                                                            text-anchor="end" dominant-baseline="auto" font-size="11px"
                                                            fill="#373d3f" class="apexcharts-yaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">15</text><text
                                                            id="SvgjsText1169"
                                                            font-family="Helvetica, Arial, sans-serif" x="20"
                                                            y="69.06960000000001" text-anchor="end"
                                                            dominant-baseline="auto" font-size="11px" fill="#373d3f"
                                                            class="apexcharts-yaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">12</text><text
                                                            id="SvgjsText1170"
                                                            font-family="Helvetica, Arial, sans-serif" x="20"
                                                            y="106.63920000000002" text-anchor="end"
                                                            dominant-baseline="auto" font-size="11px" fill="#373d3f"
                                                            class="apexcharts-yaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">9</text><text
                                                            id="SvgjsText1171"
                                                            font-family="Helvetica, Arial, sans-serif" x="20"
                                                            y="144.20880000000002" text-anchor="end"
                                                            dominant-baseline="auto" font-size="11px" fill="#373d3f"
                                                            class="apexcharts-yaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">6</text><text
                                                            id="SvgjsText1172"
                                                            font-family="Helvetica, Arial, sans-serif" x="20"
                                                            y="181.77840000000003" text-anchor="end"
                                                            dominant-baseline="auto" font-size="11px" fill="#373d3f"
                                                            class="apexcharts-yaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">3</text><text
                                                            id="SvgjsText1173"
                                                            font-family="Helvetica, Arial, sans-serif" x="20"
                                                            y="219.34800000000004" text-anchor="end"
                                                            dominant-baseline="auto" font-size="11px" fill="#373d3f"
                                                            class="apexcharts-yaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">0</text>
                                                    </g>
                                                </g>
                                            </svg>
                                            <div class="apexcharts-legend"></div>
                                            <div class="apexcharts-tooltip light">
                                                <div class="apexcharts-tooltip-title"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                </div>
                                                <div class="apexcharts-tooltip-series-group"><span
                                                        class="apexcharts-tooltip-marker"
                                                        style="background-color: rgb(0, 128, 255);"></span>
                                                    <div class="apexcharts-tooltip-text"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                class="apexcharts-tooltip-text-label"></span><span
                                                                class="apexcharts-tooltip-text-value"></span></div>
                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                                    </div>
                                                </div>
                                                <div class="apexcharts-tooltip-series-group"><span
                                                        class="apexcharts-tooltip-marker"
                                                        style="background-color: rgb(212, 216, 222);"></span>
                                                    <div class="apexcharts-tooltip-text"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                class="apexcharts-tooltip-text-label"></span><span
                                                                class="apexcharts-tooltip-text-value"></span></div>
                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="resize-triggers">
                                        <div class="expand-trigger">
                                            <div style="width: 514px; height: 276px;"></div>
                                        </div>
                                        <div class="contract-trigger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">Storage</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link l-h-20 p-0 font-18 float-right" type="button"
                                            id="widgetStorage" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetStorage">
                                            <a class="dropdown-item font-13" href="#">Refresh</a>
                                            <a class="dropdown-item font-13" href="#">Export</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-xl-7">
                                    <p><i class="feather icon-arrow-up text-primary mr-1"></i>Used: <strong>17.2
                                            GB</strong></p>
                                    <p><i class="feather icon-arrow-down mr-1"></i>Free: <strong>7.8 GB</strong></p>
                                </div>
                                <div class="col-lg-6 col-xl-5 text-center">
                                    <img src="media/images/ecommerce/storage.png" class="img-fluid" alt="storage">
                                    <p class="storage-num">25 GB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Best Selling Product</h5>
                        </div>
                        <div class="card-body">
                            <div class="best-product-slider slick-initialized slick-slider"><i
                                    class="feather icon-chevron-left slick-arrow" style=""></i>
                                <div class="slick-list draggable" style="height: 126px;">
                                    <div class="slick-track"
                                        style="opacity: 1; width: 2044px; transform: translate3d(-292px, 0px, 0px);">
                                        <div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true"
                                            tabindex="-1" style="width: 292px;">
                                            <div>
                                                <div class="best-product-slider-item"
                                                    style="width: 100%; display: inline-block;">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <img src="media/images/ecommerce/produc_slider_03.png"
                                                                class="img-fluid" alt="product">
                                                        </div>
                                                        <div class="col-8">
                                                            <span class="font-12 text-uppercase">New</span>
                                                            <h5 class="mt-2 mb-4 font-16">Hyper Car</h5>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item pr-3 border-right">
                                                                    <h4 class="mb-0">55</h4>
                                                                    <p class="mb-0">Sold</p>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <h4 class="mb-0">31</h4>
                                                                    <p class="mb-0">In Stock</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide slick-current slick-active" data-slick-index="0"
                                            aria-hidden="false" style="width: 292px;">
                                            <div>
                                                <div class="best-product-slider-item"
                                                    style="width: 100%; display: inline-block;">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <img src="media/images/ecommerce/produc_slider_01.png"
                                                                class="img-fluid" alt="product">
                                                        </div>
                                                        <div class="col-8">
                                                            <span class="font-12 text-uppercase">Sports</span>
                                                            <h5 class="mt-2 mb-4 font-16">Black Shoes</h5>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item pr-2 border-right">
                                                                    <h4 class="mb-0">205</h4>
                                                                    <p class="mb-0">Sold</p>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <h4 class="mb-0">52</h4>
                                                                    <p class="mb-0">In Stock</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1"
                                            style="width: 292px;">
                                            <div>
                                                <div class="best-product-slider-item"
                                                    style="width: 100%; display: inline-block;">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <img src="media/images/ecommerce/produc_slider_02.png"
                                                                class="img-fluid" alt="product">
                                                        </div>
                                                        <div class="col-8">
                                                            <span class="font-12 text-uppercase">Fashion</span>
                                                            <h5 class="mt-2 mb-4 font-16">Red Lipstic</h5>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item pr-3 border-right">
                                                                    <h4 class="mb-0">121</h4>
                                                                    <p class="mb-0">Sold</p>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <h4 class="mb-0">35</h4>
                                                                    <p class="mb-0">In Stock</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1"
                                            style="width: 292px;">
                                            <div>
                                                <div class="best-product-slider-item"
                                                    style="width: 100%; display: inline-block;">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <img src="media/images/ecommerce/produc_slider_03.png"
                                                                class="img-fluid" alt="product">
                                                        </div>
                                                        <div class="col-8">
                                                            <span class="font-12 text-uppercase">New</span>
                                                            <h5 class="mt-2 mb-4 font-16">Hyper Car</h5>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item pr-3 border-right">
                                                                    <h4 class="mb-0">55</h4>
                                                                    <p class="mb-0">Sold</p>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <h4 class="mb-0">31</h4>
                                                                    <p class="mb-0">In Stock</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide slick-cloned" data-slick-index="3" aria-hidden="true"
                                            tabindex="-1" style="width: 292px;">
                                            <div>
                                                <div class="best-product-slider-item"
                                                    style="width: 100%; display: inline-block;">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <img src="media/images/ecommerce/produc_slider_01.png"
                                                                class="img-fluid" alt="product">
                                                        </div>
                                                        <div class="col-8">
                                                            <span class="font-12 text-uppercase">Sports</span>
                                                            <h5 class="mt-2 mb-4 font-16">Black Shoes</h5>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item pr-2 border-right">
                                                                    <h4 class="mb-0">205</h4>
                                                                    <p class="mb-0">Sold</p>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <h4 class="mb-0">52</h4>
                                                                    <p class="mb-0">In Stock</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide slick-cloned" data-slick-index="4" aria-hidden="true"
                                            tabindex="-1" style="width: 292px;">
                                            <div>
                                                <div class="best-product-slider-item"
                                                    style="width: 100%; display: inline-block;">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <img src="media/images/ecommerce/produc_slider_02.png"
                                                                class="img-fluid" alt="product">
                                                        </div>
                                                        <div class="col-8">
                                                            <span class="font-12 text-uppercase">Fashion</span>
                                                            <h5 class="mt-2 mb-4 font-16">Red Lipstic</h5>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item pr-3 border-right">
                                                                    <h4 class="mb-0">121</h4>
                                                                    <p class="mb-0">Sold</p>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <h4 class="mb-0">35</h4>
                                                                    <p class="mb-0">In Stock</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true"
                                            tabindex="-1" style="width: 292px;">
                                            <div>
                                                <div class="best-product-slider-item"
                                                    style="width: 100%; display: inline-block;">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <img src="media/images/ecommerce/produc_slider_03.png"
                                                                class="img-fluid" alt="product">
                                                        </div>
                                                        <div class="col-8">
                                                            <span class="font-12 text-uppercase">New</span>
                                                            <h5 class="mt-2 mb-4 font-16">Hyper Car</h5>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item pr-3 border-right">
                                                                    <h4 class="mb-0">55</h4>
                                                                    <p class="mb-0">Sold</p>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <h4 class="mb-0">31</h4>
                                                                    <p class="mb-0">In Stock</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><i class="feather icon-chevron-right slick-arrow" style=""></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-4">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-6">
                    <div class="card text-center m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Orders</h5>
                        </div>
                        <div class="card-body px-0 pb-0">
                            <p class="dash-analytic-icon"><i
                                    class="feather icon-shopping-bag success-rgba text-success"></i></p>
                            <h4 class="mb-3">79</h4>
                            <p>60% Target</p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6">
                    <div class="card text-center m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Users</h5>
                        </div>
                        <div class="card-body px-0 pb-0">
                            <p class="dash-analytic-icon"><i class="feather icon-users primary-rgba text-primary"></i>
                            </p>
                            <h4 class="mb-3">125</h4>
                            <p>80% Target</p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->

    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->