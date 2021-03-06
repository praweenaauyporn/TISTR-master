<?php

session_start();

include('../php/include.php');

$sql = "SELECT * FROM customer";

$sql .= " ORDER BY date DESC ";
$result = $conn->query($sql);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.css">
    <link rel="stylesheet" href="../css/support.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

    <script src="../js/jQuery.js"></script>
    <script src="../js/javascript.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>

    <title>search</title>
    <style>
        .style {
            background: transparent;
            position: relative;
            top: 2px;
            outline: none;
            border: none;
            color: #cccccc;
        }

        .style:hover {
            outline: none;
            background: none;
            border: none;
            color: #cccccc;
        }

        .style:focus {
            outline: none;
            background: none;
            border: none;
            color: #cccccc;
        }

        .form-control:hover {
            background: #E6E0EF;
        }

        .user {
            display: grid;
            grid-template-rows: 1fr;
        }

        input.input {
            margin: unset;
            padding: unset;
            width: 60%;
            border: none;
            padding: 2px;
        }

        input.input2 {
            margin: unset;
            padding: 3.5px;
            position: relative;
            top: 1px;
            width: 30%;
            border: none;
        }

        input.input:hover {
            background: #E6E0EF;
            border: none;
        }

        input.input2:hover {
            background: #86CCD9;
            border: none;
        }

        input.input:focus,
        input.input2:focus {
            outline: none;

        }

        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 1px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 1px 1px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 1px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 1px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }

        .form-group {
            text-align: left;
        }
    </style>
</head>

<body style="background-color: #CCCCCC; background-position: center; background-size: cover; height:100vh">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark" style="background:#222255; color:#aaa;">
            <div class="container">
                <a class="navbar-brand">
                    <h1 style="color:white;"><img src="../img/tistr-logo-sw.png" width="70" height="70"> TISTR</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="admin-key.php" style="color:lightgray;">?????????????????????</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-search.php" style="color:lightgray;">????????????????????????????????????</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle style" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ??????????????????????????????
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="padding: 5px;">
                                    <a class="dropdown-item" href="information-search.php" style="padding: 5px;">??????????????????????????????????????????????????????</a>
                                    <a class="dropdown-item" href="information.php" style="padding: 5px;">??????????????????????????????????????????????????????</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="user">
                    <?php
                    if ($_SESSION["username"]) {
                    ?>
                        <center>
                            <h6 style="text-transform: uppercase; color:#ffffff">??????????????? :&nbsp;<?php echo $_SESSION["status"]; ?>&nbsp;<i class="fas fa-user-cog" style="font-size: 18px; color: #46F700;"></i>
                                &nbsp;&nbsp;<a href="../php/logout.php" onclick="return confirm('???????????????????????????????????????????????????!');">??????????????????????????????</a></h6>
                        </center>
                    <?php
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "alert('????????????????????????????????????????????????');";
                        echo "window.location = '../index.html'; ";
                        echo "</script>";
                    }
                    ?>
                    <div class="search">
                        <FORM action="http://www.google.com/custom" method="get" target="_blank"">
                            <input type="hidden" name="ie" value="utf-8">
                            <input type="hidden" name="oe" value="utf-8">
                            <input type="hidden" name="domains" value="tistr.or.th">
                            <input type="hidden" name="sitesearch" value="tistr.or.th">
                            <INPUT type="text" name="q" class="input">
                            <INPUT type="submit" name="sa" VALUE="??????????????????????????????????????????" class="input2">
                        </FORM>
                    </div>
                </div>
            </div>
        </nav>
        <!-- ?????? nav -->
    </header>
    <!-- ?????? header (???????????????????????????) -->

    <nav class="navbar" style="margin-top: 5px; background-color: #CCCCCC"> </nav>

    <section>
        <div class="container-fluid">
            <div class="lo-table">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover">
                        <thead class="thead" style="color: #fff; background-color: #007bff; border-color: #a1c5ec;">
                            <th scope="col" nowrap>?????????????????? - ???????????? ???????????????????????????</th>
                            <th scope="col" nowrap>????????????-?????????????????????</th>
                            <th scope="col" nowrap>?????????????????????????????????????????????</th>
                            <th scope="col" nowrap>?????????????????????????????????????????????????????????</th>
                            <th scope="col" nowrap>?????????????????????????????????????????????</th>
                            <th scope="col" nowrap>???????????????</th>
                            <th scope="col" nowrap>?????????????????????????????????????????????</th>
                            <th scope="col" nowrap>?????????????????????????????????????????????</th>
                            <th scope="col" nowrap>????????????????????????????????????</th>
                        </thead>
                        <tbody style="background-color: #FFFFFF;">
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td class="text-left"><?= $row['date'] ?></td>
                                    <td class="text-left"><?= $row['cu_name'] ?></td>
                                    <td class="text-left"><?= $row['cu_phone'] ?></td>
                                    <td class="text-left"><?= $row['contact'] ?></td>
                                    <td class="text-left"><?= $row['cu_case'] ?></td>
                                    <td class="text-left"><?= $row['status'] ?></td>
                                    <td class="text-left"><?= $row['respondent'] ?></td>
                                    <td class="text-left"><?= $row['answer'] ?></td>
                                    <td>
                                        <center>
                                            <a href="#editEmployeeModal" class="edit" 
                                            data-toggle="modal" 
                                            data-id="<?= $row['ID']; ?>" 
                                            data-name="<?= $row['cu_name']; ?>" 
                                            data-phone="<?= $row['cu_phone']; ?>" 
                                            data-contact="<?= $row['contact']; ?>" 
                                            data-case="<?= $row['cu_case']; ?>"
                                            data-respondent="<?= $row['respondent']; ?>"
                                            data-answer="<?= $row['answer']; ?>" 
                                            data-status="<?= $row['status']; ?>">
                                                <i class="fas fa-user-edit" data-toggle="tooltip" title="???????????????" style="font-size: 20px; color:green">&#xE254;</i></a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="<?= $row['ID']; ?>"><i class="fas fa-trash" data-toggle="tooltip" title="Delete" style="font-size: 20px; color:red">&#xE872;</i></a></center>
                                    </td>
                                </tr>
                                <!-- Edit Modal HTML -->
                                <div id="editEmployeeModal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form enctype="multipart/form-data" method="POST" action="../php/update.php">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">?????????????????????????????????</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>????????????-?????????????????????</label>
                                                        <input type="text" id="cu_name" class="form-control" value="<?php echo $row['cu_name']; ?>" name="cu_name" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>?????????????????????????????????????????????</label>
                                                        <input type="text" id="cu_phone" class="form-control" value="<?php echo $row['cu_phone']; ?>" name="cu_phone" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>?????????????????????????????????????????????????????????</label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="contact1" name="contact" class="custom-control-input" value="facebook" <?php if($row['contact']=="facebook"){ echo "checked";}?>>
                                                            <label class="custom-control-label" for="contact1">Facebook</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="contact2" name="contact" class="custom-control-input" value="line" <?php if($row['contact']=="line"){ echo "checked";}?>>
                                                            <label class="custom-control-label" for="contact2">Line</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="contact3" name="contact" class="custom-control-input" value="phone" <?php if($row['contact']=="phone"){ echo "checked";}?>>
                                                            <label class="custom-control-label" for="contact3">Phone</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>?????????????????????????????????????????????</label>
                                                        <input type="text" id="cu_case" class="form-control" value="<?php echo $row['cu_case']; ?>" name="cu_case" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>?????????????????????????????????????????????</label>
                                                        <input type="text" id="respondent" class="form-control" name="respondent" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>?????????????????????????????????????????????</label>
                                                        <!-- <input type="text" id="answer" class="form-control" name="answer" /> -->
                                                        <textarea name="answer" class="form-control" id="answer" rows="5"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>???????????????</label><br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="status1" name="status" class="custom-control-input" value="?????????????????????????????????????????????" <?php if($row['status']=="?????????????????????????????????????????????"){ echo "checked";}?>>
                                                            <label class="custom-control-label" for="status1">?????????????????????????????????????????????</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="status2" name="status" class="custom-control-input" value="?????????????????????????????????????????????" <?php if($row['status']=="?????????????????????????????????????????????"){ echo "checked";}?>>
                                                            <label class="custom-control-label" for="status2">?????????????????????????????????????????????</label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="ID" id="ID">
                                                </div>
                                                <div class="modal-footer" id="edit">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
                                                    <button class="btn btn-info" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal HTML -->
                                <div id="deleteEmployeeModal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="../php/delete.php">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">????????????????????????</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                        &times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                    <p class="text-warning">
                                                        <small>?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</small>
                                                    </p>
                                                    <input type="hidden" name="id" id="id">
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="??????????????????" />
                                                    <button class=" btn btn-danger" type="submit">????????????????????????</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </section>

    <footer style="background:#222255; color:#aaa; font-size:0.7rem;">
        <div class="container">
            <div class="row">
                <div class="col-5 text-left" style="margin-top: 2rem;">
                    <a href="https://www.tistr.or.th/tistrnew/main/index.php">
                        <img src="../img/tistr-logo-sw.png" height="40" align="left" style="margin-right:20px;" border="0">
                        <h5 style="color: white;">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? (??????.)</h5>
                        <p style="font-size:0.8rem; margin-top:-8px; color:lightgray;">Thailand Institute of Scientific and Technological Research (TISTR)</p>
                    </a>
                </div>
                <div class="col-7 text-right" style="font-size:0.7rem; margin-top: 2rem;">
                    <font style="font-size:0.5rem;">?????????????????????????????????????????????</font>
                    <img src="../img/mhesilogo.png" height="35" style="margin-left: 10px;">
                    <br>
                    <b>????????????????????????????????????????????????????????? ????????????????????????????????? ????????????????????????????????????????????????</b>
                    <br>
                    "
                    Ministry of Higher Education, Science, Research and
                    Innovation
                    "
                </div>
            </div>
            <!-- row -->
            <div class="row" style="margin-top: 10px;">
                <div class="col-3 text-left" style="border-right:1px solid gray; margin-bottom: 2rem;">
                    <h6 style="color:lightgray;">Navigation</h6>
                    <li>
                        <a href="https://www.tistr.or.th/en/" target="_blank" style="color:lightgray;">TISTR in English version</a>
                    </li>
                    <li>
                        <a href="https://www.tistr.or.th/tistrnew/main/org_contact.php" target="_blank" style="color:lightgray;">???????????? ???????????????????????????????????? ??????.</a>
                    </li>
                    <li>
                        <a href="https://www.tistr.or.th/tistrnew/main/page_onestop.php" target="_blank" style="color:lightgray;">????????????????????????????????????????????? (One-stop Services)</a>
                    </li>
                    <li>
                        <a href="https://www.tistr.or.th/services/complain/complain_form.php" target="_blank" style="color:lightgray;">??????????????????????????????????????????????????????</a>
                        <a href="https://www.tistr.or.th/services/QA/qa_show.php" target="_blank" style="color:lightgray;">?????????????????? Q&A</a>
                    </li>
                </div>
                <!-- Navigation -->
                <div class="col-3 text-left" style="border-right:1px solid gray; margin-bottom: 2rem;">
                    <h6 style="color:lightgray;">
                        <a href="http://128.1.99.199/" title="intranet" target="blank" style="color:lightgray;">TISTR INTRANET</a>
                    </h6>
                    <li>
                        <a href="http://hris.tistr.or.th/" target="_blank" style="color:lightgray;">TISTR HRIS</a>
                    </li>
                    <li>
                        <a href="https://accounts.mail.go.th/" target="_blank" style="color:lightgray;">TISTR e-Mail</a>
                    </li>
                    <li>
                        <a href="http://opac.tistr.or.th/" target="_blank" style="color:lightgray;">TISTR e-Library</a>
                    </li>
                    <li>
                        <a href="http://164.115.40.72/login/" target="_blank" style="color:lightgray;">TISTR e-Meeting</a>
                    </li>
                </div>
                <!-- TISTR INTRANET -->
                <div class="col-4 text-left" style="border-right:1px solid gray; margin-bottom: 2rem;">
                    <h6 style="color:lightgray;">Address</h6>
                    <ul style="padding-left: 20px;">
                        <li>
                            "35 ???????????? 3 ??????????????????????????? ???.???????????????????????????????????? ???.????????????????????? ???.???????????????????????? ???.????????????????????????
                            12120, ???????????????????????????"
                        </li>
                        <li>
                            "35 Mu 3 Technopolis, Tambon Khlong Ha, Amphoe Khlong Luang,
                            Pathum Thani 12120, THAILAND"
                        </li>
                    </ul>
                </div>
                <!-- ADDRESS -->
                <div class="col-2 text-right" style="margin-bottom: 2rem;">
                    <h6 style="color:lightgray;">
                        <a href="https://www.tistr.or.th/tistrnew/main/org_contact.php" target="_blank" style="color:lightgray;">Contact us</a>
                    </h6>
                    "
                    Tel : 0 2577 9000"
                    <br>
                    "
                    Fax : 0 2577 9009"
                    <br>
                    "
                    Call Center : 0 2577 9300"
                    <br>
                    "
                    E-mail : tistr@tistr.or.th"
                </div>
                <!-- Contact us -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </footer>
    <!-- ?????? footer (??????????????????????????????) -->
    <div style="padding:10px 0; background:#8888bb; font-size:0.6rem;">
        <div class="container">
            <div class="row">
                <div class="col-5 text-left">
                    <span class="copyright">
                        "Copyright ??2020 "
                        <b>
                            <font color="navy">
                                <font style="font-size:0.7rem;">?????????</font>
                                "TISTR"
                            </font>
                        </b>
                    </span>
                    <br>
                    "
                    ??????. ???????????????????????????????????????????????? ?????????????????????????????????????????????????????????????????????????????????
                    ????????????????????????????????????????????????????????????????????? ????????????????????????????????????????????????????????? ?????????"
                    <u>???????????????</u>"?????????????????????????????????????????????????????????????????????????????????. ???????????????????????????????????????????????????????????????????????????????????????????????????
                    ????????????????????????????????????????????????????????? ??????. ?????????????????????????????????????????????????????????????????????. "
                    <br>
                    "(TISTR is a non-profit organization)
                    "
                </div>
                <!-- Copyright 2020 -->
                <div class="col-2 text-right"></div>
                <div class="col-5 item-right">
                    <div class="row pull-right" style="padding-right:5px; ">
                        <div class="text-center" style="padding-right:15px; margin-top:0px;">
                            <a href="https://www.tistr.or.th/tistrnew/images/tistr_qrcode-bk.png" target="_blank">
                                <img src="../img/tistr_qrcode-bk.png" height="35" border="0">
                                <br>
                                <font style="font-size:6px; color:white;">
                                    www.tistr.or.th
                                </font>
                            </a>
                        </div>
                        <!-- QR Code -->
                        <div class="text-center" style="padding-right:15px; margin-top:0px;">
                            <img src="../img/line-oa.png" height="35" border="0" title=" LINE Official Account ">
                            <br>
                            <font style="font-size:10px; color:white;">
                                @tistr
                            </font>
                        </div>
                        <!-- Line-OA -->
                        <div>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item text-center" style="margin-top: 2px;">
                                    <a href="https://www.facebook.com/tistr.or.th" target="_blank">
                                        <img src="../img/icons8-facebook-144.png" height="30">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item text-center" style="margin-left: 2px;">
                                    <a href="https://www.youtube.com/tistr2506" target="_blank">
                                        <img src="../img/icons8-youtube-squared-150.png" height="35">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item text-center" style="margin-top: -2.2px; margin-left: -1px;">
                                    <a href="https://www.twitter.com/tistr" target="_blank">
                                        <img src="../img/icons8-twitter-192.png" height="39">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- row pull-right -->
                </div>
                <!-- Contact -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- Copyright -->
</body>
<script type="text/javascript">
    $('#editEmployeeModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var ID = button.data('id')
        var cu_name = button.data('name')
        var cu_phone = button.data('phone')
        var respondent = button.data('respondent')
        var answer = button.data('answer')
        // var contact = button.data('contact')
        var cu_case = button.data('case')
        var modal = $(this)
        modal.find('.modal-body #ID').val(ID)
        modal.find('.modal-body #cu_name').val(cu_name)
        modal.find('.modal-body #cu_phone').val(cu_phone)
        modal.find('.modal-body #respondent').val(respondent)
        modal.find('.modal-body #answer').val(answer)
        // modal.find('.modal-body #contact').val(contact)
        modal.find('.modal-body #cu_case').val(cu_case)
    })

    $('#deleteEmployeeModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id)
    })
</script>

</html>