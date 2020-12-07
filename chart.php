<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pablo Jenne - Chart</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=94b35d3973d4270f77b2f22463b3c4b8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css?h=b077f3d66f4dd45a76529f02462151f3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=c264dfd6a98b434d362fe1438d40ce85">
    <link rel="icon" type="image/png" href="assets/favicon/chart.ico">
</head>

<body onload='Loadchart()' id="page-top" style="background-color: rgb(245,246,249);">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper" style="background-color: rgb(245,246,249);">
            <div id="content" style="background-color: rgb(245,246,249);">
                <div class="d-md-flex justify-content-md-center align-items-md-center" data-aos="fade-down" data-aos-delay="300" data-aos-once="true" style="margin-top: 2rem;align-items: center;justify-content: center;display: flex !important;"><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="tabel" style="font-size: 20px;border-width: 0px;border-radius: 6px;display: block !important;width: 7rem;"><i class="fa fa-table fa-sm" style="font-size: 20px;"></i>&nbsp;Table</a></div>
                <div
                    class="container-fluid mt-5" style="background-color: rgb(245,246,249);">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4" data-aos="fade-up" data-aos-delay="250" data-aos-once="true">
                        <h3 class="text-dark mb-0"><strong class='text-primary'>Pablo Jenne</strong></h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" data-aos="fade-right" id='downloadtag' style="font-size: 20px;border-radius: 7px;display: block !important;margin-top: 1rem;"><i class="fas fa-download fa-sm"></i>&nbsp;Download Chart (PNG)</a></div>
                    <!-- Start: Chart -->
                    <div class="row">
                        <div class="col-lg-7 col-xl-8 col-lg-12 col-xl-12" data-aos="fade-up" data-aos-delay="50" data-aos-once="true">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Chart.Js</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart1" style="display: block; max-width: 100% !important;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End: Chart -->
                    <?php require_once('./chart_js_config.php'); ?>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="assets/js/script.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script>
    <script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.7"></script>
</body>

</html>