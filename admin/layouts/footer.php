  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="template/https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="template/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="template/plugins/raphael/raphael.min.js"></script>
<script src="template/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="template/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="template/plugins/chart.js/Chart.min.js"></script>
<!-- Highchart CDN-->
<script>
  // Create the chart using cdn highchart

  <?php

  include('../config/connection.php');

  $get_data = mysqli_query($conn, "SELECT media_name, COUNT(media_name) AS jumlah_media FROM news_content WHERE media = 'news' GROUP BY media_name ");
  // $data = mysqli_fetch_assoc($get_data);
  $result = [];

  while ($data = mysqli_fetch_assoc($get_data)) {
    //   # code...
    //   var_dump($data);
    $asoc = array('name' => $data['media_name'], 'y' => intval($data['jumlah_media']));
    array_push($result, $asoc);
  }
  ?>

  var data_media = <?php echo json_encode($result); ?>;
  console.log(data_media);


  Highcharts.chart('highchart_media', {
    chart: {
      type: 'column'
    },
    title: {
      align: 'center',
      text: 'Data Berita by Media. January, 2022'
    },
    subtitle: {
      align: 'center',
      text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    },
    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },
    yAxis: {
      title: {
        text: 'Total Berita '
      }

    },
    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 0,
        dataLabels: {
          enabled: true,
          format: '{point.y:.0f}'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>:Total <b>{point.y:.0f}</b> berita<br/>'
    },

    series: [{
      name: "Media",
      colorByPoint: true,
      data: data_media
    }]

  });
</script>

</body>
</html>
