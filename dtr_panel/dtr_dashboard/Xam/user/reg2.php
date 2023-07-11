<?php
// Assuming you have a database connection established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $reg_type = $_POST['reg_type'];
    $semester = $_POST['sem'];
    $rc = $_POST['rc'];
    $category = $_POST['categry'];
    $rollno = $_POST['rno'];
    $department = $_POST['dept'];
    $selectedSubjects = $_POST['subject'];
    $reg_date = date('Y-m-d');
    $amount = $_POST['amt'];

    // Convert the selected subjects array to a string
    $selectedSubjectsString = implode(", ", $selectedSubjects);

    // Insert the form data into the database
    $stmt = $con->prepare("INSERT INTO exam_reg (reg_type, sem, rc, categry, selected_subjects, rno, dept, reg_date, amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssd", $reg_type, $semester, $rc, $category, $selectedSubjectsString, $rollno, $department, $reg_date, $amount);
    $stmt->execute();

    // Display success message or redirect to another page
    echo "Form submitted successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Form</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: auto;
            width: 450px;
            padding: 30px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .form-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-field {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-field label {
            display: block;
            font-weight: bold;
            width: 120px;
            margin-right: 10px;
        }

        .form-field input[type="text"],
        .form-field select {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-field .button {
            background-color: #17a2b8;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
        }

        .form-field .button:hover {
            background-color: #138496;
        }

        .form-field .button:disabled {
            background-color: #94d3a2;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <div class="container">
        <form name="register" method="post" class="myform" action="" enctype="multipart/form-data">
            <h1 class="form-title">Exam Form</h1>
            <?php echo @$err; ?>
            <hr>
            <?php if (isset($row)) { ?>
                <div class="form-field">
                    <label class="required">Exam Type</label>
                    <select name="reg_type" required>
                        <option name="s1" selected>Regular</option>
                        <option name="s2">Repeat</option>
                    </select>
                </div>
                <div class="form-field">
                    <label class="required">Semester</label>
                    <select id="sem" name="sem" onchange="showSubjects(this.value);" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
                <div class="form-field">
                    <label class="required">RC</label>
                    <input type="text" name="rc" value="<?php echo $row['rc']; ?>" />
                </div>
                <div class="form-field">
                    <label class="required">Category</label>
                    <input type="text" name="categry" value="<?php echo $row['categry']; ?>" readonly />
                </div>
                <div class="form-field">
                    <label class="required">Roll Number</label>
                    <input type="text" name="rno" autocomplete="off" readonly value="<?php echo $row['rno']; ?>" />
                </div>
                <div class="form-field">
                    <label class="required">Department</label>
                    <input type="text" name="dept" autocomplete="off" readonly value="<?php echo $row['dept']; ?>" />
                </div>
                <div class="form-field">
                    <label class="required">Subjects</label>
                    <div id="subjectList" name="sub_name"></div>
                </div>
                <div class="form-field">
                    <label class="required">Amount</label>
                    <input type="text" id="amt" name="amt" readonly />
                </div>
                <div class="form-field">
                    <input type="submit" name="submit" value="Submit" class="button" />
                </div>
            <?php } ?>
        </form>
    </div>

    <!-- Bootstrap JS -->
    
    <script>
        function showSubjects(sem) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("subjectList").innerHTML = this.responseText;

      // Calculate amount when subjects are loaded
      calculateAmount();
    }
  };
  xmlhttp.open("GET", "getSubjects.php?sem=" + sem, true);
  xmlhttp.send();
}

function calculateAmount() {
    var selectedSubjects = [];
    var subjectOptions = document.getElementById("subjectList").getElementsByTagName("input");
    for (var i = 0; i < subjectOptions.length; i++) {
        if (subjectOptions[i].checked) {
            selectedSubjects.push(subjectOptions[i].value);
        }
    }

    var category = "<?php echo $row['categry']; ?>";
    var totalCredits = 0;
    var amount = 0;

    selectedSubjects.forEach(function (subject) {
        var credits = parseInt(document.getElementById(subject + "_credits").value);
        totalCredits += credits;
    });

    if (category === 'General' || category === 'Tuition Waiver') {
        amount = 525 + (totalCredits * 210);
    } else if (category === 'OBC' || category === 'SC/ST') {
        amount = 525 + (totalCredits * 105);
    }
    var currentDate = new Date();
            var lateFeeDate = new Date("2023-06-30"); // Set your late fee deadline date here
            if (currentDate > lateFeeDate) {
                var daysDifference = Math.floor((currentDate - lateFeeDate) / (1000 * 60 * 60 * 24));
                var lateFee = daysDifference * 100; // Set your late fee amount here
                amount += lateFee;
            }
    document.getElementById("amt").value = amount;
}
    </script>
</body>

</html>
