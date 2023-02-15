<!DOCTYPE html>
<?php
include_once "../DB/Database.php";
$db = new Database;
?>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="../assets/img/avatars/icon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                        <span>V0RT3X Panel</span>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-fluid flex-grow-1 container-p-y">

                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">V0RT3X Data</span></h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Assign Values</h5>
                                <small class="text-muted float-end">(Insert Each Value)</small>
                            </div>
                            <div class="card-body">
                                <?php

                                if (isset($_POST["btn"])) {
                                    $UUID = $_POST["UUID"];
                                    $DCID = $_POST["DCID"];
                                    $MCTrades = $_POST["MCTrades"];
                                    $IRLTrades = $_POST["IRLTrades"];

                                    if (strlen($UUID) == 32) {
                                        $msg = $db->RunDML("INSERT INTO buyers values(Default, '" . $UUID . "', '" . $DCID . "', '" . $MCTrades . "', '" . $IRLTrades . "');");

                                        if ($msg == "ok") {
                                            echo "<div class='alert alert-success'>Has been added successfully</div>";
                                        } else
                                            echo "<div class='alert alert-danger'>" . $msg . "</div>";
                                    } else
                                        echo "<div class='alert alert-danger'>UUID Must contain 32 Characters</div>";
                                }

                                ?>
                                <?php

                                if (isset($_POST["btnedit"])) {
                                    $UUID = $_POST["UUID"];
                                    $DCID = $_POST["DCID"];
                                    $MCTrades = $_POST["MCTrades"];
                                    $IRLTrades = $_POST["IRLTrades"];

                                    if (strlen($UUID) == 32) {
                                        $msg = $db->RunDML("UPDATE buyers SET UUID='" . $UUID . "', DCID='" . $DCID . "', MCTrades='" . $MCTrades . "', IRLTrades=" . $IRLTrades . " WHERE SerialNo='" . $_GET["id"] . "' ");
                                        if ($msg == "ok") {
                                            echo "<div class='alert alert-success'>Has been added successfully</div>";
                                        } else
                                            echo "<div class='alert alert-danger'>" . $msg . "</div>";
                                    } else
                                        echo "<div class='alert alert-danger'>UUID Must contain 32 Characters</div>";
                                }

                                ?>
                                <form method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">UUID</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" name="UUID" <?php if (isset($_GET["action"])) {
                                                echo "value='" . $_GET["UUID"] . "'";
                                            } ?>
                                                required placeholder="" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">DC-ID</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" name="DCID" <?php if (isset($_GET["action"])) {
                                                echo "value='" . $_GET["DCID"] . "'";
                                            } ?>
                                                required placeholder="" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">MC-Trades</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" name="MCTrades" <?php if (isset($_GET["action"])) {
                                                echo "value='" . $_GET["MCTrades"] . "'";
                                            } ?>
                                                required placeholder="" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">IRL-Trades</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" name="IRLTrades" <?php if (isset($_GET["action"])) {
                                                echo "value='" . $_GET["IRLTrades"] . "'";
                                            } ?>
                                                required placeholder="" />
                                        </div>
                                    </div>
                                    <center><button type="submit"
                                            name="btn<?php if (isset($_GET["action"])) {
                                                echo "edit";
                                            } ?>"
                                            class="btn btn-primary">Submit</button></center>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid flex-grow-1 container-p-y">

                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Search</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rd" id="inlineRadio1"
                                            value="UUID" />
                                        <label class="form-check-label" for="inlineRadio1">UUID</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rd" id="inlineRadio1"
                                            value="DCID" />
                                        <label class="form-check-label" for="inlineRadio1">DC-ID</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Search Key</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control" name="txtkey" placeholder="" />
                                        </div>
                                    </div>
                                    <center><button type="submit" name="btnkey" class="btn btn-primary">Search</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid flex-grow-1 container-p-y">
                        <div class="card">
                            <h5 class="card-header">Data</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table" style="min-height:220px;">
                                    <thead>
                                        <tr>
                                            <th>Buyers</th>
                                            <th>UUID</th>
                                            <th>DCID</th>
                                            <th>MC-Trades</th>
                                            <th>IRL-Trades</th>
                                            <th>Buttons</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0" id="table">
                                        <?php
                                        $msg = $db->GetData("SELECT * from buyers");

                                        while ($row = mysqli_fetch_assoc($msg)) {
                                            echo '
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>' . $row["SerialNo"] . '</strong></td>
                                                        <td>' . $row["UUID"] . '</td>
                                                        <td>' . $row["DCID"] . '</td>
                                                        <td>' . $row["MCTrades"] . '</td>
                                                        <td>' . $row["IRLTrades"] . '</td>
                                                        <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="../Home/index.php?action=' . "Edit" . '&id=' . $row["SerialNo"] . '&UUID=' . $row["UUID"] . '&DCID=' . $row["DCID"] . '&MCTrades=' . $row["MCTrades"] . '&IRLTrades=' . $row["IRLTrades"] . '"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                                                        <a class="dropdown-item" href="delete.php?id=' . $row["SerialNo"] . '"><i class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                        </td>
                                                    </tr>
                                                ';
                                        }
                                        if (isset($_POST["btnkey"])) {
                                            if ($_POST["rd"] == "UUID") {
                                                $msg = $db->GetData("SELECT * FROM buyers WHERE UUID = '" . $_POST["txtkey"] . "';");
                                                echo "<script>var table = document.getElementById('table');table.innerHTML = ''</script>";
                                                while ($row = mysqli_fetch_assoc($msg)) {
                                                    echo '
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>' . $row["buyers"] . '</strong></td>
                                                        <td>' . $row["UUID"] . '</td>
                                                        <td>' . $row["DCID"] . '</td>
                                                        <td>' . $row["MCTrades"] . '</td>
                                                        <td>' . $row["IRLTrades"] . '</td>
                                                        <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="../Home/index.php?action=' . "Edit" . '&id=' . $row["id"] . '&UUID=' . $row["UUID"] . '&DCID=' . $row["DCID"] . '&MCTrades=' . $row["MCTrades"] . '&IRLTrades=' . $row["IRLTrades"] . '"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                                                        <a class="dropdown-item" href="delete.php?id=' . $row["id"] . '"><i class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                        </td>
                                                    </tr>
                                                ';
                                                }
                                            } elseif ($_POST["rd"] == "DCID") {
                                                $msg = $db->GetData("SELECT * FROM buyers WHERE DCID = '" . $_POST["txtkey"] . "';");
                                                echo "<script>var table = document.getElementById('table');table.innerHTML = ''</script>";
                                                while ($row = mysqli_fetch_assoc($msg)) {
                                                    echo '
                                                    <tr>
                                                        <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="../Home/index.php?action=' . "Edit" . '&id=' . $row["SerialNo"] . '&UUID=' . $row["UUID"] . '&DCID=' . $row["DCID"] . '&MCTrade=' . $row["MCTrade"] . '&IRLTrade=' . $row["IRLTrade"] . '"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                                                        <a class="dropdown-item" href="delete.php?id=' . $row["SerialNo"] . '"><i class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                        </td>
                                                    </tr>
                                                ';
                                                }
                                            } else {
                                                echo '<div class="alert alert-danger">Choose Selector</div>';
                                            }
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../assets/vendor/libs/popper/popper.js"></script>
        <script src="../assets/vendor/js/bootstrap.js"></script>
        <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="../assets/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->

        <!-- Main JS -->
        <script src="../assets/js/main.js"></script>

        <!-- Page JS -->

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>