<!doctype html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name=“viewport” content=“width=device-width, initial-scale=1.0” />
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.css">
    <link rel="stylesheet" href="../css/support.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <script src="../js/jQuery.js"></script>
    <script src="../js/javascript.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <title>admin</title>
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

        .status {
            position: absolute;
            left: 0;
            margin-top: 10px;
            padding: 0 10px;
        }
        
    </style>

</head>

<body>
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
                            <a class="nav-link" href="admin-key.php" style="color:lightgray;">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-search.php" style="color:lightgray;">เรื่องสอบถาม</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle style" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    คลังข้อมูล
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="padding: 5px;">
                                    <a class="dropdown-item" href="information-search.php" style="padding: 5px;">รายละเอียดผู้แนะนำ</a>
                                    <a class="dropdown-item" href="information.php" style="padding: 5px;">รายละเอียดผู้วิจัย</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="user">
                    <?php
                    if ($_SESSION["username"]) {
                    ?>
                        <h6 style="text-transform: uppercase; color:#ffffff">สถานะ :&nbsp;<?php echo $_SESSION["status"]; ?>&nbsp;<i class="fas fa-user-cog" style="font-size: 18px; color: #46F700;"></i></h6>
                        <center><a href="../php/logout.php" onclick="return confirm('ต้องการออกจากระบบ!');">ออกจากระบบ</a></center>
                    <?php
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "alert('กรุณาเข้าสู่ระบบ');";
                        echo "window.location = '../index.html'; ";
                        echo "</script>";
                    }
                    ?>
                </div>
            </div>
        </nav>
        <!-- จบ nav -->
    </header>
    <!-- จบ header (จบส่วนหัว) -->

    <section>
        <div class="container">
            <form action="../php/admin-key.php" method="POST">
                <div class="form-group">
                    <div class="logo-form">
                        <h1>กรอกข้อมูลเรื่องที่สอบถาม</h1>
                    </div>
                    <!-- จบ logo-form (จัดรูปแบบตัวหนังสือ) -->
                    <div class="form-lo">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" style="border-radius: 40px;" name="cu_phone" id="inlineFormInputGroupUsername" placeholder="เบอร์โทรศัพท์" required>
                                <input type="text" class="form-control" style="border-radius: 40px;" name="cu_name" id="inlineFormInputGroupUsername" placeholder="ชื่อ-นามสกุล" required>
                                <div class="radio-group" style="display: flex; flex-direction: row; margin: 5px 10px; 
                                         background-color: #FFFFFF; border-radius: 40px; padding: 2px 10spx;">
                                    <label style="font-family: TH Sarabun New; font-size: 14px; font-weight: bold; margin-top: 6px; color: #6c757d; justify-items: center; text-align: center;">ช่องทางการรับข้อมูล : </label>
                                    <div style="margin-top: 5px; justify-items: left; text-align: left; padding: 0 10px;">
                                        <input type="radio" name="contact" value="facebook" id="inlineRadio1" required>
                                        <label style="font-family: TH Sarabun New; font-weight: bold; color: #6c757d;" for="facebook">Facebook</label>
                                    </div>
                                    <div style="margin-top: 5px; justify-items: left; text-align: left; padding: 0 10px;">
                                        <input type="radio" name="contact" value="line" id="inlineRadio2" required>
                                        <label style="font-family: TH Sarabun New; font-weight: bold; color: #6c757d;" for="line">Line</label>
                                    </div>
                                    <div style="margin-top: 5px; justify-items: left; text-align: left; padding: 0 10px;">
                                        <input type="radio" name="contact" value="phone" iid="inlineRadio3" required>
                                        <label style="font-family: TH Sarabun New; font-weight: bold; color: #6c757d;" for="phone">Phone</label>
                                    </div>
                                </div>
                                <textarea class="form-control" name="cu_case" id="exampleFormControlTextarea1" placeholder="เรื่องที่สอบถาม" rows="5" style="border-radius: 20px; margin-top: 5px;" required></textarea>
                                <div class="status">
                                    <label for="check" style="font-family: TH Sarabun New; font-weight: bold; color: #6c757d;">สถานะ : </label>
                                    <input type="radio" name="check" value="ยังไม่ดำเนินการ" checked>
                                    <label for="ckeck" style="font-family: TH Sarabun New; font-weight: bold; color: #6c757d;">&nbsp;ยังไม่ได้ดำเนินการ</label>
                                </div>
                                <input class="btn btn-primary" style="width: 100%; border-radius: 40px; font-family: TH Sarabun New; font-weight: bold; padding: 14px; margin-top: 50px;" type="submit" value="ตกลง" onclick="return confirm('ต้องการเพิ่มข้อมูล!');">
                            </div>
                        </div>
                        <!-- จบ row (จัดกลุ่มให้ item ใน row) -->
                    </div>
                </div>
                <!-- จบ form-group (จัดกลุ่มให้ form) -->
            </form>
            <!-- จบ form -->
        </div>
        <!-- จบ container -->
    </section>
    <!-- จบ section (จบส่วนตรงกลาง) -->

    <footer style="background:#222255; color:#aaa; font-size:0.7rem;">
        <div class="container">
            <div class="row">
                <div class="col-5 text-left" style="margin-top: 2rem;">
                    <a href="https://www.tistr.or.th/tistrnew/main/index.php">
                        <img src="../img/tistr-logo-sw.png" height="40" align="left" style="margin-right:20px;" border="0">
                        <h5 style="color: white;">สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย (วว.)</h5>
                        <p style="font-size:0.8rem; margin-top:-8px; color:lightgray;">Thailand Institute of Scientific and Technological Research (TISTR)</p>
                    </a>
                </div>
                <div class="col-7 text-right" style="font-size:0.7rem; margin-top: 2rem;">
                    <font style="font-size:0.5rem;">หน่วยงานในกำกับ</font>
                    <img src="../img/mhesilogo.png" height="35" style="margin-left: 10px;">
                    <br>
                    <b>กระทรวงการอุดมศึกษา วิทยาศาสตร์ วิจัยและนวัตกรรม</b>
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
                        <a href="https://www.tistr.or.th/tistrnew/main/org_contact.php" target="_blank" style="color:lightgray;">สาขา และการติดต่อ วว.</a>
                    </li>
                    <li>
                        <a href="https://www.tistr.or.th/tistrnew/main/page_onestop.php" target="_blank" style="color:lightgray;">รวมข้อมูลบริการ (One-stop Services)</a>
                    </li>
                    <li>
                        <a href="https://www.tistr.or.th/services/complain/complain_form.php" target="_blank" style="color:lightgray;">การรับข้อร้องเรียน</a>
                        <a href="https://www.tistr.or.th/services/QA/qa_show.php" target="_blank" style="color:lightgray;">ถามตอบ Q&A</a>
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
                            "35 หมู่ 3 เทคโนธานี ถ.เลียบคลองห้า ต.คลองห้า อ.คลองหลวง จ.ปทุมธานี
                            12120, ประเทศไทย"
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
    <!-- จบ footer (จบส่วนท้าย) -->
    <div style="padding:10px 0; background:#8888bb; font-size:0.6rem;">
        <div class="container">
            <div class="row">
                <div class="col-5 text-left">
                    <span class="copyright">
                        "Copyright ©2020 "
                        <b>
                            <font color="navy">
                                <font style="font-size:0.7rem;">วว•</font>
                                "TISTR"
                            </font>
                        </b>
                    </span>
                    <br>
                    "
                    วว. เป็นองค์กรของรัฐ ที่จัดตั้งขึ้นเพื่อการวิจัย
                    วิทยาศาสตร์และเทคโนโลยี เพื่อการพัฒนาประเทศ โดย"
                    <u>ไม่มี</u>"วัตถุประสงค์เพื่อแสวงหากำไร. หากพบการละเมิดทรัพย์สินทางปัญญาใน
                    เว็บไซต์นี้โปรดแจ้ง วว. แก้ไขโดยเร็วที่สุดต่อไป. "
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

</html>