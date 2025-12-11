@extends('profile.dashboard')

@section('admin')
    <main>
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h1>Analytics Dashboard</h1>
                <small>Check reporting and review insights</small>
            </div>
            <div class="header-actions">
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="las la-file-export"></span>
                    Гарах
                </button>
                <a href="{{route('payment.paymentCreate')}}">
                <button>
                    <span class="las la-file-export"></span>
                    Төлбөр
                </button>
                </a>
            </div>
        </div>

        <!-- Cards Section -->
        <div class="cards">
            <div class="card-single">
                <div class="card-flex">
                    <div class="card-info">
                        <div class="card-head">
                            <span>Purchases</span>
                            <small>Number of purchases</small>
                        </div>
                        <h2>$17,633</h2>
                        <small>8% less purchase</small>
                    </div>
                    <div class="card-chart danger">
                        <span class="las la-chart-line"></span>
                    </div>
                </div>
            </div>
            <div class="card-single">
                <div class="card-flex">
                    <div class="card-info">
                        <div class="card-head">
                            <span>Refunds value of refunded orders</span>
                            <small>Number of visitors</small>
                        </div>
                        <h2>44,623</h2>
                        <small>10% less visitors</small>
                    </div>
                    <div class="card-chart success">
                        <span class="las la-chart-line"></span>
                    </div>
                </div>
            </div>
            <div class="card-single">
                <div class="card-flex">
                    <div class="card-info">
                        <div class="card-head">
                            <span>Unique Visitors</span>
                            <small>Number of visitors</small>
                        </div>
                        <h2>78,633</h2>
                        <small>2% less visitors</small>
                    </div>
                    <div class="card-chart yellow">
                        <span class="las la-chart-line"></span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Jobs Grid Section -->
        <div class="jobs-grid">
            <div class="analytics-card">
                <div class="analytics-head">
                    <h3>Actions needed</h3>
                    <span class="las la-ellipsis-h"></span>
                </div>
                <div class="analytics-chart">
                    <div class="chart-circle">
                        <h1>74$</h1>
                    </div>
                    <div class="analytics-note">
                        <small>Note: Current sprint requires stakeholders</small>
                    </div>
                </div>
                <div class="analytics-btn">
                    <button>Generate report</button>
                </div>
            </div>

            <!-- Jobs Table -->
            <div class="jobs">
                <h2>Jobs <small>See all jobs <span class="las la-arrow-right"></span></small></h2>
                <div class="table-responsive">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <div><span class="indicator"></span></div>
                            </td>
                            <td><div>Customer experience designer</div></td>
                            <td><div>Design</div></td>
                            <td><div>Copenhagen DK</div></td>
                            <td><div>Posted 6 days ago</div></td>
                            <td><div><button>8 applicants</button></div></td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <span class="indicator even"></span>
                                </div>
                            </td>
                            <td><div>Software developer</div></td>
                            <td><div>Development</div></td>
                            <td><div>Copenhagen DK</div></td>
                            <td><div>Posted 6 days ago</div></td>
                            <td><div><button>8 applicants</button></div></td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <span class="indicator"></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    Front-end developer
                                </div>
                            </td>
                            <td>
                                <div>
                                    development
                                </div>
                            </td>
                            <td>
                                <div>
                                    Copenhagen DK
                                </div>
                            </td>
                            <td>
                                <div>
                                    Posted 6 days ago
                                </div>
                            </td>
                            <td>
                                <div>
                                    <button>8 applicants</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <span class="indicator even"></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    Software engineer
                                </div>
                            </td>
                            <td>
                                <div>
                                    Software
                                </div>
                            </td>
                            <td>
                                <div>
                                    Copenhagen DK
                                </div>
                            </td>
                            <td>
                                <div>
                                    Posted 6 days ago
                                </div>
                            </td>
                            <td>
                                <div>
                                    <button>8 applicants</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
