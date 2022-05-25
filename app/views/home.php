<?php
require APPROOT . '/views/includes/header.php';
// need to add session

?>
<div class="d-flex" id="wrapper">
    <?php
    require APPROOT . '/views/includes/sidebar.php';
    ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <?php
        require APPROOT . '/views/includes/wrapperheader.php';
        // needs connection to database
        ?>
        <div class="bg-yellow container-fluid px-4" style="height:87vh;">
            <div class="bg-whiter container-fluid">
                <div class="row g-3 pt-3">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="p-3 bg1card shadow-sm rounded d-flex justify-content-between">
                            <div>
                                <img style="height: 30px;" src="<?php echo URLROOT; ?>/public/img/icons/St.svg" alt="">
                                <p class="mb-0 py-2 ps">Students</p>
                            </div>
                            <div>
                                <h2 class="fw-bold mb-0 text-end">
                                    <?php
                                    if (count($data['students']) > 0) {
                                        $num_rows = count($data['students']);
                                        echo $num_rows;
                                    }
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="p-3 bg2card shadow-sm rounded d-flex justify-content-between">
                            <div>
                                <img style="height: 30px;" src="<?php echo URLROOT; ?>/public/img/icons/Co.svg" alt="">
                                <p class="mb-0 py-2 ps">Teachers</p>
                            </div>
                            <div>
                                <h2 class="fw-bold mb-0 text-end">
                                    <?php
                                    if (count($data['teachers']) > 0) {
                                        $num_rows = count($data['teachers']);
                                        echo $num_rows;
                                    }
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="p-3 bg3card shadow-sm rounded d-flex justify-content-between">
                            <div>
                                <img style="height: 30px;" src="<?php echo URLROOT; ?>/public/img/icons/parents.svg" alt="">
                                <p class="mb-0 py-2 ps">Parents</p>
                            </div>
                            <div>
                                <h2 class="fw-bold mb-0">
                                    <?php
                                    if (count($data['parents']) > 0) {
                                        $num_rows = count($data['parents']);
                                        echo $num_rows;
                                    }
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="p-3 bg4card shadow-sm rounded d-flex justify-content-between">
                            <div>
                                <img style="height: 30px;" src="<?php echo URLROOT; ?>/public/img/icons/Pro.svg" alt="">
                                <p class="mb-0 py-2 ps">Admins</p>
                            </div>
                            <div>
                                <h2 class="fw-bold mb-0 text-end">
                                    <?php
                                    if (count($data['admins']) > 0) {
                                        $num_rows = count($data['admins']);
                                        echo $num_rows;
                                    }
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 pt-1 justify-content-center">
                    <div class="col-12 col-sm-12 col-lg-5">
                        <canvas id="myChart" style="width:100%;max-width:400px"></canvas>

                        <script>
                            var xValues = ["Male", "Female"];
                            var yValues = [<?= count($data['students_m']) ?>, <?= count($data['students_f']) ?>];
                            var barColors = [
                                "#23a7ff",
                                "#ff5ec1",
                            ];

                            new Chart("myChart", {
                                type: "doughnut",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "Chart of gender"
                                    }
                                }
                            });
                        </script>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-5">

                        <canvas id="myChart3" style="width:100%;max-width:400px"></canvas>

                        <script>
                            var xValues = ["Teachers", "Students"];
                            var yValues = [<?= count($data['teachers']) ?>, <?= count($data['students']) ?>];
                            var barColors = ["#ffe6ab", "#82cdff"];

                            new Chart("myChart3", {
                                type: "horizontalBar",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    title: {
                                        display: true,
                                        text: "Number of Teachers & Students"
                                    },
                                    scales: {
                                        xAxes: [{
                                            ticks: {
                                                min: 0,
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="row g-3 pt-1 justify-content-center">
                    <div class="col-12 col-sm-12 col-lg-5">

                        <canvas id="myChart2" style="width:100%;max-width:400px"></canvas>
                        <script>
                            var xValues = <?= $data['x_students_by_class'] ?>;
                            var yValues = <?= $data['y_students_by_class'] ?>;
                            var barColors = ["#ffde23", "#48ff23", "#23fff0", "#f562ff"];

                            new Chart("myChart2", {
                                type: "bar",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    title: {
                                        display: true,
                                        text: "Number of Students by Classes"
                                    },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                min: 0,
                                                max: 20
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-5">

                        <canvas id="myChart4" style="width:100%;max-width:400px"></canvas>

                        <script>
                            var xValues = ["Class"];
                            var yValues = [<?= count($data['count_class']) ?>];
                            var barColors = ["#82cdff"];

                            new Chart("myChart4", {
                                type: "horizontalBar",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    title: {
                                        display: true,
                                        text: "Number of Classes"
                                    },
                                    scales: {
                                        xAxes: [{
                                            ticks: {
                                                min: 1,
                                                max: 6
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");
    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>