<?php
    require_once('../connection.php');
    $query1 = "SELECT * FROM subject";
    $result = mysqli_query($con, $query1);
    $rr = mysqli_num_rows($result);
    if (!$rr) {
        echo "<h2 style='color:black;position:relative;top:35px;left:30%;'>No Students Have Registered For Exams Yet.</h2>";
    }
?>

<style type="text/css">
    /* @import url('https://fonts.googleapis.com/css?family=Acme&display=swap'); */

    .mcon {
        /* font-family: 'Acme', sans-serif; */
    }

    .mtab {
        /* font-family: 'Acme', sans-serif; */
        margin-top: 0;
    }

    .mybtn {
        background-color: rgba(127, 0, 128, 0.2);
        border: 2px solid black;
        border-radius: 5px;
        color: black;
    }

    .mybtn:hover {
        width: 15%;
        background-color: rgba(0, 128, 128, 0.9);
        cursor: pointer;
        border: 3px solid black;
        color: white;
    }

    table th {
        text-align: center;
    }
</style>

<div class="main_content">
    <div>
        <!-- <h1 class="page-header label1" ">Dashboard</h1> -->
        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <h3 style="color:black;" class="page-header"><u>Subjects :</u></h3>

                    <div class="col-lg-12 mcon text-center">
                        <table id="mytab1" width="100%" class="mtab table table-bordered table-hover table-responsive">
                            <tr align='center' style="background-color:rgba(23,162,184,255);color:black;text-align:center;">
                                <th>Sr.No</th>
                                <th>Subject Id</th>
                                <th>Subject Name</th>
                                <th>Subject Code</th>
                                <th>Credits</th>
                                <th>Semester</th>
                                <th>RC</th>
                                <th>Dept</th>
                            </tr>
                            <?php
                            $i = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr style='color:black;border-bottom:2px solid black;border-right:2px solid black;border-top:2px solid black;border-left:2px solid black;'>";
                                echo "<td align='center'>" . $i . "</td>";
                                echo "<td align='center'>" . $row['sub_id'] . "</td>";
                                echo "<td align='center'>" . $row['sub_name'] . "</td>";
                                echo "<td align='center'>" . $row['sub_code'] . "</td>";
                                echo "<td align='center'>" . $row['credits'] . "</td>";
                                echo "<td align='center'>" . $row['sem'] . "</td>";
                                echo "<td align='center'>" . $row['rc'] . "</td>";
                                echo "<td align='center'>" . $row['dept'] . "</td>";
                                echo "</tr>";
                                $i++;
                            }
                            ?>
                        </table>
                        <!-- <button id="mbtn-a" class="mybtn" style="padding:5px;font-size:20px;">Create Excel</button> -->
                    </div>
                    <script>
                        var wb = XLSX.utils.table_to_book(document.getElementById('mytab1'), {
                            sheet: "Sheet JS"
                        });
                        var wbout = XLSX.write(wb, {
                            bookType: 'xlsx',
                            bookSST: true,
                            type: 'binary'
                        });

                        function s2ab(s) {
                            var buf = new ArrayBuffer(s.length);
                            var view = new Uint8Array(buf);
                            for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                            return buf;
                        }
                        $("#mbtn-a").click(function () {
                            saveAs(new Blob([s2ab(wbout)], {
                                type: "application/octet-stream"
                            }), 'Sub_list.xlsx');
                        });
                    </script>
                </div>
            </div>
        </section>
    </div>
</div>
