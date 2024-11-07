<div class="container-fluid py-3">
    <div class="row">
        {{-- dataph --}}
        <div class="col-xl-4 col-sm-6 mb-xl-4 mb-3 rounded-lg">
            <div class="card rounded-lg-9" style="margin: 0;">
                <div class="card-body p-0 rounded-lg" style="padding: 0;">
                    <div class="row m-0" style="margin: 0;">
                        <div class="col-12 rounded-lg" style="padding: 0;">
                            <div class="numbers text-center rounded-lg" style="background-color: #ffffff;">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"
                                    style="text-align: left; padding: 10px; position: absolute; top: 0; left: 0;">
                                    Data Ph</p>
                                <div id="phchart" class="rounded-lg"
                                    style="width: 100%; height: 100px; margin: 0; padding: 0;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- data humidity --}}
        <div class="col-xl-4 col-sm-6 mb-xl-4 mb-3 rounded-lg">
            <div class="card rounded-lg-9" style="margin: 0;">
                <div class="card-body p-0 rounded-lg" style="padding: 0;">
                    <div class="row m-0" style="margin: 0;">
                        <div class="col-12 rounded-lg" style="padding: 0;">
                            <div class="numbers text-center rounded-lg" style="background-color: #ffffff;">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"
                                    style="text-align: left; padding: 10px; position: absolute; top: 0; left: 0;">
                                    Data Humidity</p>
                                <div id="humiditychart" class="rounded-lg"
                                    style="width: 100%; height: 100px; margin: 0; padding: 0;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- heat index --}}
        <div class="col-xl-4 col-sm-6 mb-xl-4 mb-3 rounded-lg">
            <div class="card rounded-lg-9" style="margin: 0;">
                <div class="card-body p-0 rounded-lg" style="padding: 0;">
                    <div class="row m-0" style="margin: 0;">
                        <div class="col-12 rounded-lg" style="padding: 0;">
                            <div class="numbers text-center rounded-lg" style="background-color: #ffffff;">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"
                                    style="text-align: left; padding: 10px; position: absolute; top: 0; left: 0;">
                                    Data Heat index</p>
                                <div id="heatchart" class="rounded-lg"
                                    style="width: 100%; height: 100px; margin: 0; padding: 0;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- tds --}}
        <div class="col-xl-4 col-sm-6 mb-xl-4 mb-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Data TDS</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <ul>
                                        <table border="1">
                                            <tbody>
                                                @if ($sensors)
                                                    <tr>
                                                        <t>
                                                            <h1>{{ $sensors->tds }} Ppm</h1>
                                                            </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>tidak ada data</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </ul>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- water temp temp --}}
        <div class="col-xl-4 col-sm-6 mb-xl-4 mb-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Data water temp</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <ul>
                                        <table border="1">
                                            <tbody>
                                                @if ($sensors)
                                                    <tr>
                                                        <t>
                                                            <h1> {{ $sensors->water_temp }}&deg;c</h1>
                                                            </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>tidak ada data</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </ul>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- air temp --}}
        <div class="col-xl-4 col-sm-6 mb-xl-4 mb-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Data air temp</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <ul>
                                        <table border="1">
                                            <tbody>
                                                @if ($sensors)
                                                    <tr>
                                                        <t>
                                                            <h1> {{ $sensors->air_temp }} &deg;c</h1>
                                                            </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>tidak ada data</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </ul>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    {{-- container chart --}}

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="col-lg">
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>Suhu</h6>
                        <div id="astagachart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-md-6 ">
            <div class="col-lg">
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>Ph</h6>
                        <div id="chartdataph"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-6 mt-4 ">
            <div class="col-lg">
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>Humidity</h6>
                        <div id="chartdatahumidity"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="col-lg">
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>TDS</h6>
                        <div id="chartdatatds"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ph --}}
    <script>
        var maxValue = 14; // Maksimum nilai yang ingin ditampilkan sebagai penuh

        var options = {
            series: [({{ $sensors->ph }} / maxValue) * 100], // Sesuaikan nilai awal sebagai persentase dari maxValue
            chart: {
                height: 300,
                type: 'radialBar',
                offsetY: -10

            },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,
                    hollow: {
                        margin: 0,
                        size: '40%'
                    },
                    dataLabels: {
                        name: {
                            show: false
                        },
                        value: {
                            fontSize: '22px',
                            color: '#333',
                            formatter: function(val) {
                                return Math.round((val / 100) * maxValue).toFixed(
                                    0); // Menampilkan nilai sebenarnya
                            }
                        }
                    },
                    track: {
                        background: '#f0f0f0',
                        strokeWidth: '100%'
                    }
                }
            },
            labels: ['Data Ph']
        };

        var chart = new ApexCharts(document.querySelector("#phchart"), options);
        chart.render();

        // Fungsi untuk meng-update chart ketika nilai berubah
        function updateChart(newValue) {
            var percentage = (newValue / maxValue) * 100; // Hitung persentase dari nilai maksimum
            chart.updateSeries([percentage]);
        }
    </script>
    {{-- humidity --}}
    <script>
        var maxValue2 = 100; // Maksimum nilai yang ingin ditampilkan sebagai penuh

        var options2 = {
            series: [({{ $sensors->humidity }} / maxValue2) *
                100
            ], // Sesuaikan nilai awal sebagai persentase dari maxValue
            chart: {
                height: 300,
                type: 'radialBar',
                offsetY: -10

            },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,
                    hollow: {
                        margin: 0,
                        size: '40%'
                    },
                    dataLabels: {
                        name: {
                            show: false
                        },
                        value: {
                            fontSize: '22px',
                            color: '#333',
                            formatter: function(val) {
                                return Math.round((val / 100) * maxValue2).toFixed(
                                    0); // Menampilkan nilai sebenarnya
                            }
                        }
                    },
                    track: {
                        background: '#f0f0f0',
                        strokeWidth: '100%'
                    }
                }
            },
            labels: ['Data Ph']
        };

        var chart = new ApexCharts(document.querySelector("#humiditychart"), options2);
        chart.render();

        // Fungsi untuk meng-update chart ketika nilai berubah
        function updateChart(newValue) {
            var percentage = (newValue / maxValue) * 100; // Hitung persentase dari nilai maksimum
            chart.updateSeries([percentage]);
        }
    </script>

    {{-- heatindex --}}
    <script>
        var maxValue3 = 100; // Maksimum nilai yang ingin ditampilkan sebagai penuh

        var options3 = {
            series: [({{ $sensors->heat_index }} / maxValue2) *
                100
            ], // Sesuaikan nilai awal sebagai persentase dari maxValue
            chart: {
                height: 300,
                type: 'radialBar',
                offsetY: -10

            },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,
                    hollow: {
                        margin: 0,
                        size: '40%'
                    },
                    dataLabels: {
                        name: {
                            show: false
                        },
                        value: {
                            fontSize: '22px',
                            color: '#333',
                            formatter: function(val) {
                                return Math.round((val / 100) * maxValue2).toFixed(
                                    0); // Menampilkan nilai sebenarnya
                            }
                        }
                    },
                    track: {
                        background: '#f0f0f0',
                        strokeWidth: '100%'
                    }
                }
            },
            labels: ['Data Ph']
        };

        var chart = new ApexCharts(document.querySelector("#heatchart"), options3);
        chart.render();

        // Fungsi untuk meng-update chart ketika nilai berubah
        function updateChart(newValue) {
            var percentage = (newValue / maxValue) * 100; // Hitung persentase dari nilai maksimum
            chart.updateSeries([percentage]);
        }
    </script>

    {{-- chart untuk menampilpkan water temp dan air temp --}}
    <script>
        var options6 = {
            series: [{
                    name: 'Water Temp',
                    data: @json($waterTemp)
                }, {
                    name: 'Water Temp',
                    data: @json($airTemp)
                },
                {
                    name: 'heat index',
                    data: @json($dataheatindex)
                }
            ],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: @json($label)
            },
            tooltip: {
                x: {
                    format: 'd/M/y H:m'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#astagachart"), options6);
        chart.render();
    </script>

    {{-- semua data chart ph --}}
    <script>
        var options7 = {
            series: [{
                name: 'Water Temp',
                data: @json($dataph)
            }, ],
            chart: {
                height: 350,
                type: 'area'

            },
            colors: ['#FF5733', '#33FF57'], // Warna khusus untuk garis
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: @json($label)
            },
            tooltip: {
                x: {
                    format: 'd/M/y H:m'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartdataph"), options7);
        chart.render();
    </script>

    {{-- semua data humidity --}}
    <script>
        var options8 = {
            series: [{
                name: 'Humidity',
                data: @json($datahumidity)
            }, ],
            chart: {
                height: 350,
                type: 'area'
            },
            colors: ['#11ab4c', '#87d6a5'],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: @json($label)
            },
            tooltip: {
                x: {
                    format: 'd/M/y H:m'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartdatahumidity"), options8);
        chart.render();
    </script>


    {{-- semua data tds --}}
    <script>
        var options10 = {
            series: [{
                name: 'TDS',
                data: @json($datatds)
            }, ],
            chart: {
                height: 350,
                type: 'area'
            },
            colors: ['#890dfc', '#bc7cf7'],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: @json($label)
            },
            tooltip: {
                x: {
                    format: 'd/M/y H:m'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartdatatds"), options10);
        chart.render();
    </script>
