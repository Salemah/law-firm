<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Meta -->

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @php
        $dashboard_settings = \Illuminate\Support\Facades\DB::table('dashboard_settings')->first();
    @endphp
    <title>User Dashbord ARC</title>
    <link rel="icon"href=" {{ asset('image/AdminLTELogo.png') }}"type="image/x-icon">
    <!-- vendor css -->
    <link href="{{ asset('userf/lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('userf/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('userf/lib/typiconsfont/typicons.css') }}" rel="stylesheet">
    <link href="{{ asset('userf/lib/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- azia CSS -->
    <link rel="stylesheet" href="{{ asset('userf/css/azia.css') }}">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>

<body>

    @include('frontend.user.nav')

    @yield('content')

    <div class="az-footer ht-40">
        <div class="container ht-100p pd-t-0-f">
            {{-- <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © myarc.pw 2022</span> --}}
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Copyright © 2023<a
                    href="https://www.myarc.pw.com" target="_blank">myarc.pw</span>
        </div><!-- container -->
    </div><!-- az-footer -->


    <script src="{{ asset('userf/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('userf/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('userf/lib/ionicons/ionicons.js') }}"></script>
    <script src="{{ asset('userf/lib/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('userf/lib/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('userf/lib/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('userf/lib/peity/jquery.peity.min.js') }}"></script>

    <script src="{{ asset('userf/js/azia.js') }}"></script>
    <script src="{{ asset('userf/js/chart.flot.sampledata.js') }}"></script>
    <script src="{{ asset('userf/js/dashboard.sampledata.js') }}."></script>
    <script src="{{ asset('userf/js/jquery.cookie.js') }}" type="text/javascript"></script>



    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script> --}}
    <script>
        $(function() {
            'use strict'

            var plot = $.plot('#flotChart', [{
                data: flotSampleData3,
                color: '#007bff',
                lines: {
                    fillColor: {
                        colors: [{
                            opacity: 0
                        }, {
                            opacity: 0.2
                        }]
                    }
                }
            }, {
                data: flotSampleData4,
                color: '#560bd0',
                lines: {
                    fillColor: {
                        colors: [{
                            opacity: 0
                        }, {
                            opacity: 0.2
                        }]
                    }
                }
            }], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 8
                },
                yaxis: {
                    show: true,
                    min: 0,
                    max: 100,
                    ticks: [
                        [0, ''],
                        [20, '20K'],
                        [40, '40K'],
                        [60, '60K'],
                        [80, '80K']
                    ],
                    tickColor: '#eee'
                },
                xaxis: {
                    show: true,
                    color: '#fff',
                    ticks: [
                        [25, 'OCT 21'],
                        [75, 'OCT 22'],
                        [100, 'OCT 23'],
                        [125, 'OCT 24']
                    ],
                }
            });

            $.plot('#flotChart1', [{
                data: dashData2,
                color: '#00cccc'
            }], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.2
                            }]
                        }
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 0
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 35
                },
                xaxis: {
                    show: false,
                    max: 50
                }
            });

            $.plot('#flotChart2', [{
                data: dashData2,
                color: '#007bff'
            }], {
                series: {
                    shadowSize: 0,
                    bars: {
                        show: true,
                        lineWidth: 0,
                        fill: 1,
                        barWidth: .5
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 0
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 35
                },
                xaxis: {
                    show: false,
                    max: 20
                }
            });


            //-------------------------------------------------------------//


            // Line chart
            $('.peity-line').peity('line');

            // Bar charts
            $('.peity-bar').peity('bar');

            // Bar charts
            $('.peity-donut').peity('donut');

            var ctx5 = document.getElementById('chartBar5').getContext('2d');
            new Chart(ctx5, {
                type: 'bar',
                data: {
                    labels: [0, 1, 2, 3, 4, 5, 6, 7],
                    datasets: [{
                        data: [2, 4, 10, 20, 45, 40, 35, 18],
                        backgroundColor: '#560bd0'
                    }, {
                        data: [3, 6, 15, 35, 50, 45, 35, 25],
                        backgroundColor: '#cad0e8'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        enabled: false
                    },
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [{
                            display: false,
                            ticks: {
                                beginAtZero: true,
                                fontSize: 11,
                                max: 80
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.6,
                            gridLines: {
                                color: 'rgba(0,0,0,0.08)'
                            },
                            ticks: {
                                beginAtZero: true,
                                fontSize: 11,
                                display: false
                            }
                        }]
                    }
                }
            });

            // Donut Chart
            var datapie = {
                labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
                datasets: [{
                    data: [25, 20, 30, 15, 10],
                    backgroundColor: ['#6f42c1', '#007bff', '#17a2b8', '#00cccc', '#adb2bd']
                }]
            };

            var optionpie = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false,
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            };

            // For a doughnut chart
            var ctxpie = document.getElementById('chartDonut');
            var myPieChart6 = new Chart(ctxpie, {
                type: 'doughnut',
                data: datapie,
                options: optionpie
            });

        });
    </script>
    @yield('script')
</body>

<!-- Mirrored from demo.bootstrapdash.com/azia-free/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Dec 2023 16:44:23 GMT -->

</html>
