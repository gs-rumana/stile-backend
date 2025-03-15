@extends('layouts.dashboard')

@section('content')
    <h5 class="ms-4">Overview</h5>
    <div class="card card-body rounded-7 bg-body-secondary shadow-sm">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <x-dashboard.insight-card value="1000" icon="ri-shopping-basket-2-fill" title="Total Orders" />
            </div>
            <div class="col">
                <x-dashboard.insight-card value="$1000" icon="ri-money-dollar-circle-fill" title="Total Earnings" />
            </div>
            <div class="col">
                <x-dashboard.insight-card value="1000" icon="ri-shopping-bag-3-fill" title="Total Products" />
            </div>
            <div class="col">
                <x-dashboard.insight-card value="1000" icon="ri-user-3-fill" title="Total Users" />
            </div>
        </div>
    </div>
    <h5 class="ms-4 mt-4">Analytics</h5>
    <div class="card card-body rounded-7 bg-body-secondary shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-6">
                <h6 class="ms-3">Sales by Category</h6>
                <div class="card card-body rounded-5">
                    <canvas id="myChart"></canvas>
                </div>
                <h6 class="ms-3 mt-3">Sales by Month</h6>
                <div class="card card-body mt-2 rounded-5">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            <div class="col-6">
                <h6 class="ms-3">Sales</h6>
                <div class="card card-body rounded-5">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script defer>
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('myChart');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: 'Orders',
                        data: [12, 19, 3, 5, 2, 3],
                        // backgroundColor: [
                        //     'rgba(255, 99, 132, 0.2)',
                        //     'rgba(54, 162, 235, 0.2)',
                        //     'rgba(255, 206, 86, 0.2)',
                        //     'rgba(75, 192, 192, 0.2)',
                        //     'rgba(153, 102, 255, 0.2)',
                        //     'rgba(255, 159, 64, 0.2)'
                        // ],
                        backgroundColor: [
                            'hsl(16, 80%, 75%)',
                        ],
                    }],
                    legend: {
                        display: true,
                        labels: {
                            font: {
                                size: 20,
                                weight: 600,
                            }
                        }
                    }
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    borderRadius: 10,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                },
            });
            const ctx2 = document.getElementById('myChart2');
            const myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                    }],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },

                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                }
            });

            const pieCtx = document.getElementById('pieChart');
            const pieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                    }],
                },
            });
        });
    </script>
@endsection
