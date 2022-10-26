<?php $query = "SELECT usertype, count(*) as number FROM user_tbl GROUP BY usertype";
$result = mysqli_query($mysqli, $query);   ?>

<?php $gender_query = "SELECT gender, count(*) as gender_number FROM student_faculty_profile_tbl GROUP BY gender";
$gender_result = mysqli_query($mysqli, $gender_query);   ?>

<?php
$assessmentNo = "select COUNT(assessment_id) from assessment_tbl";
$assessmentNoResult = mysqli_query($mysqli, $assessmentNo);
while ($row = mysqli_fetch_array($assessmentNoResult)) {

  $count_assessment = $row['COUNT(assessment_id)'];
}
?>

<?php
$questionNo = "select COUNT(question_id) from assessment_question_tbl";
$questionNoResult = mysqli_query($mysqli, $questionNo);
while ($row = mysqli_fetch_array($questionNoResult)) {

  $count_questions = $row['COUNT(question_id)'];
}
?>

<?php
$topicNo = "select COUNT(lesson_id) from lesson_tbl";
$topicNoResult = mysqli_query($mysqli, $topicNo);
while ($row = mysqli_fetch_array($topicNoResult)) {

  $count_topics = $row['COUNT(lesson_id)'];
}
?>

<?php
$topicNo = "select COUNT(lesson_id) from lesson_tbl";
$topicNoResult = mysqli_query($mysqli, $topicNo);
while ($row = mysqli_fetch_array($topicNoResult)) {

  $count_topics = $row['COUNT(lesson_id)'];
}
?>

<?php
$assessmentTakerNo = "select COUNT(user_id) from assessment_chosen";
$assessmentTakerNoResult = mysqli_query($mysqli, $assessmentTakerNo);
while ($row = mysqli_fetch_array($assessmentTakerNoResult)) {

  $count_takers = $row['COUNT(user_id)'];
}
?>

<?php /* $institution_no = " SELECT SUM(status='Active') AS active, SUM(status='INACTIVE') AS inactive
FROM institution_tbl";
$institution_result = mysqli_query($mysqli, $institution_no); */

$institution_no = " SELECT status, count(*) as stat FROM institution_tbl GROUP BY status";
$institution_result = mysqli_query($mysqli, $institution_no); ?>


<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Users', 'Number'],
        <?php
        while ($row = mysqli_fetch_array($result)) {
          echo "['" . $row["usertype"] . "', " . $row["number"] . "],";
        }
        ?>
      ]);
      var options = {
        title: 'Total Percentage of System Users',
        //is3D:true,  
        pieHole: 0.3,
        animation: {
          duration: 1000,
          easing: 'out',
        },
        'backgroundColor': 'white',
        'is3D': true

      };
      var chart = new google.visualization.PieChart(document.getElementById('piechart_user'));
      chart.draw(data, options);
    }
  </script>


  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Status', 'Number'],
        <?php
        while ($row = mysqli_fetch_array($institution_result)) {
          //echo "[' Active ','" . $row["active"] . "', ' Inactive ', " . $row["inactive"] . "],";
          echo "['" . $row["status"] . "', " . $row["stat"] . "],";
        }
        ?>

      ]);
      var options = {
        title: 'Total Percentage of Participating Institution',
        //is3D:true,  
        pieHole: 0.3,
        animation: {
          duration: 1000,
          easing: 'out',
        },
        colors: ['#36A420', '#F70500'],

        'backgroundColor': 'white',
        'is3D': true

      };
      var chart = new google.visualization.PieChart(document.getElementById('piechart_institution'));
      chart.draw(data, options);
    }
  </script>

  <script>
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Male', 'Female'],
        <?php
        while ($row = mysqli_fetch_array($gender_result)) {
          //echo "[' Active ','" . $row["active"] . "', ' Inactive ', " . $row["inactive"] . "],";
          echo "['" . $row["gender"] . "', " . $row["gender_number"] . "],";
        }
        ?>
      ]);

      var options = {
        title: 'Students and Faculty Gender Percentage',
        is3D: true,
        colors: ['#F710E9', '#007CF7'],
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_gender'));
      chart.draw(data, options);
    }
  </script>

  <script>
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Passed', 'Failed'],
        ['Passed', 67],
        ['Failed', 40]
      ]);

      var options = {
        title: 'Percentage of Passing Rate',
        is3D: true,
        colors: ['#36A420', '#F70500']

      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_passfail'));
      chart.draw(data, options);
    }
  </script>


  <script>
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Students', 'Faculties'],
        ['2022', 1000, 400],
        ['2023', 1170, 460],
        ['2024', 660, 1120],
        ['2025', 1030, 540]
      ]);

      var options = {
        title: 'Student and Faculty Registration Trend',
        curveType: 'function',
        legend: {
          position: 'bottom'
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
  </script>

</head>
<main id="main" class="main">
  <div class="pagetitle">
    <section class="main-section" id="admin-dashboard">
      <div class="main-content">
      <div class="container page-container">

        <!-- <h1>Welcome Home Admin</h1>
                <a href="logout.php">Logout</a>
                SAMPLE PAGE 1
                <div>HELLO THERE</div> -->
        <div class="row">
        <h1 class="mb-4">Admin Dashboard</h1>

          <div class="col-md-3 mb-4">
            <div class="admin-card p-1 shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h5>Total: <?php echo "$count_topics" ?></h5>
                <p>Topics</p>
              </div>
              <i class="fa-solid fa-person-chalkboard fs-1 primary-text border rounded-full bg-cyan p-3"></i>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="admin-card p-1 shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h5>Total: <?php echo "$count_assessment" ?></h5>
                <p style="font-size: 15px;">Assessments</p>
              </div>
              <i class="fa-solid fa-file-lines fs-1 primary-text border rounded-full bg-red p-3"></i>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="admin-card p-1 shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h5>Total: <?php echo "$count_questions" ?></h5>
                <p>Question Bank</p>
              </div>
              <i class="fa-solid fa-circle-question fs-1 primary-text border rounded-full bg-orange p-3"></i>
            </div>
          </div>

          <div class="col-md-3 mb-4">
            <div class="admin-card p-1 shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h5>Total: <?php echo "$count_takers" ?></h5>
                <p>Assessment Takers</p>
              </div>
              <i class="fa-solid fa-person fs-1 primary-text border rounded-full bg-blue p-3"></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 mb-4">
            <div id="piechart_user" class="admin-piechart"></div>
          </div>
          <div class="col-6 mb-4">
            <div id="piechart_gender" class="admin-piechart"></div>
          </div>
          <div class="col-6 mb-4">
            <div id="piechart_institution" class="admin-piechart"></div>
          </div>

          <div class="col-6 mb-4">
            <div id="piechart_passfail" class="admin-piechart"></div>
          </div>
          <div class="col-12">
            <div id="curve_chart" class="admin-piechart"></div>
          </div>
        </div>
        <!-- Bar Chart -->
        <canvas id="barChart" style="max-height: 400px;"></canvas>
        <script>
          document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.querySelector('#barChart'), {
              type: 'bar',
              data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                  label: 'Bar Chart',
                  data: [65, 59, 80, 81, 56, 55, 40],
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                  ],
                  borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                  ],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          });
        </script>
        <!-- End Bar CHart -->

        <!-- Line Chart -->
        <canvas id="lineChart" style="max-height: 400px;"></canvas>
        <script>
          document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.querySelector('#lineChart'), {
              type: 'line',
              data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                  label: 'Line Chart',
                  data: [65, 59, 80, 81, 56, 55, 40],
                  fill: false,
                  borderColor: 'rgb(75, 192, 192)',
                  tension: 0.1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          });
        </script>
        <!-- End Line CHart -->
      </div>
      </div>

    </section>
</main>