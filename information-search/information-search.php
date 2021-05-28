<!doctype html>

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
    <!-- <link rel="stylesheet" href="../css/support.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <script src="../js/jQuery.js"></script>
    <script src="../js/javascript.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

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
            padding: 2.5px;
            position: relative;
            width: 35%;
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
    </style>

</head>

<body style="background-color: #CCCCCC; background-position: center; background-size: cover;">
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
                                    คลังขอมูล
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="padding: 5px;">
                                    <a class="dropdown-item" href="information-search.php" style="padding: 5px;">ค้นหาผู้แนะนำ</a>
                                    <a class="dropdown-item" href="information.php" style="padding: 5px;">รายละเอียดผู้วิจัย</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="user">
                    <div class="search">
                        <FORM action="http://www.google.com/custom" method="get" target="_blank"">
                            <input type="hidden" name="ie" value="utf-8">
                            <input type="hidden" name="oe" value="utf-8">
                            <input type="hidden" name="domains" value="tistr.or.th">
                            <input type="hidden" name="sitesearch" value="tistr.or.th">
                            <INPUT type="text" name="q" class="input">
                            <INPUT type="submit" name="sa" VALUE="ค้นหาเพิ่มเติม" class="input2">
                        </FORM>
                    </div>
                </div>
            </div>
        </nav>
        <!-- จบ nav -->
    </header>
    <!-- จบ header (จบส่วนหัว) -->
    <section style="min-height:80vh;">
        <div class="container-fluid">
            <div class="row>
                <div class=" col-lg" style="margin: 50px 0 50px 0;">
                <h2 align="center">ค้นหาข้อมูล</h2>
                <br />
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">ค้นหา&nbsp;<i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" name="search_text" id="search_text" placeholder="ค้นหาข้อมูลเรื่องวิจัย" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
                <div id="result"></div>
            </div>
        </div>
        </div>
        <div style="clear:both"></div>
    </section>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script>
        $(document).ready(function() {
            load_data();

            function load_data(query) {
                $.ajax({
                    url: "search.php",
                    method: "post",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            }

            $('#search_text').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });

        $(function () {
                
                $('#container').highcharts({
                    data: {
                        //กำหนดให้ ตรงกับ id ของ table ที่จะแสดงข้อมูล
                        table: 'datatable'
                    },
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'ข้อมูลจำนวนประชากร ของ แต่ละ จังหวัดประเทศใน ไทย'
                    },
                    yAxis: {
                        allowDecimals: false,
                        title: {
                            text: 'Units'
                        }
                    },
                    
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.series.name + '</b><br/>' +
                                this.point.y; + ' ' + this.point.name.toLowerCase();
                        }
                    }
                });
            });
    </script>
</body>

</html>