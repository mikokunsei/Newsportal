<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2022 <a href="https://github.com/mikokunsei">Mikokunsei</a>.</strong>
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

<!-- DataTables  & Plugins -->
<script src="template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="template/plugins/jszip/jszip.min.js"></script>
<script src="template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Preview Image -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->

<!-- CDN CKEditor -->
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/super-build/ckeditor.js"></script>
<!-- <script type="text/javascript" src="../ckeditor/ckeditor.js"></script> -->

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Modal -->
<!-- Javascript untuk popup modal Delete-->
<script type="text/javascript">
  function confirm_modal(delete_url) {
    $('#modal_delete').modal('show', {
      backdrop: 'static'
    });
    document.getElementById('delete_user').setAttribute('href', delete_url);
    // document.getElementById('delete_comment').setAttribute('href', delete_url);
    document.getElementById('delete_berita').setAttribute('href', delete_url);
  }
</script>

<!-- Highchart CDN-->
<script>
  // Create the chart using cdn highchart

  <?php

  include('../config/connection.php');

  $get_data_media = mysqli_query($conn, "SELECT media_name, COUNT(media_name) AS jumlah_media FROM news_content WHERE media = 'news' GROUP BY media_name ");
  // $data = mysqli_fetch_assoc($get_data_media);
  $result_media = [];

  while ($data_media = mysqli_fetch_assoc($get_data_media)) {

    //   var_dump($data_media);
    $asoc_media = array('name' => $data_media['media_name'], 'y' => intval($data_media['jumlah_media']));
    array_push($result_media, $asoc_media);
  }
  ?>

  //---------------
  //---------------
  //----HIGHCHART----

  var data_media = <?php echo json_encode($result_media); ?>;
  console.log(data_media);

  //CHART BAR
  Highcharts.chart('highchart_bar', {
    chart: {
      type: 'column'
    },
    title: {
      align: 'center',
      text: 'Data Berita by Media. Tahun 2022'
    },
    subtitle: {
      align: 'center',
      // text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
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

  <?php

  $get_data_kategori = mysqli_query($conn, "SELECT c_canal, COUNT(c_canal) AS jumlah_kategori FROM news_content WHERE media = 'news' GROUP BY c_canal");

  $result_kategori = [];

  while ($data_kategori = mysqli_fetch_assoc($get_data_kategori)) {

    // print_r($data_kategori);

    $asoc_kategori = array('name' => $data_kategori['c_canal'], 'y' => intval($data_kategori['jumlah_kategori']));
    array_push($result_kategori, $asoc_kategori);
  }


  ?>


  var data_kategori = <?php echo json_encode($result_kategori); ?>;
  console.log(data_kategori);

  //CHART PIE
  Highcharts.chart('highchart_pie', {
    chart: {
      type: 'pie'
    },
    title: {
      text: 'Data Berita by Kategori. Tahun 2022'
    },
    subtitle: {
      // text: 'Click the slices to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      },
      point: {
        valueSuffix: '%'
      }
    },

    plotOptions: {
      series: {
        dataLabels: {
          enabled: true,
          format: '{point.name}: {point.y:.0f} berita'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} berita</b> of total<br/>'
    },

    series: [{
      name: "Media",
      colorByPoint: true,
      data: data_kategori
    }],
  });
</script>

<!-- Donutchart -->
<script>
  $(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */


    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.


    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    <?php
    $get_data1 = mysqli_query($conn, "SELECT c_canal, COUNT(c_canal) AS jumlah_kategori FROM news_content WHERE media = 'news' GROUP BY c_canal");
    // $data = mysqli_fetch_array($get_data);
    $get_jumlah = mysqli_query($conn, "SELECT COUNT(c_canal) AS jumlah_kategori FROM news_content WHERE media = 'news' GROUP BY c_canal ");

    ?>


    var donutData = {
      labels: [
        <?php
        while ($data1 = mysqli_fetch_array($get_data1)) {

          // print_r($data1);

          echo '"' . $data1['c_canal'] . '",';
          // echo $data['jumlah_kategori'];
          // default "....", "....",
        }
        ?>
      ],
      datasets: [{
        data: [
          // 700,500,400,600,300,100
          <?php
          while ($data1 = mysqli_fetch_array($get_jumlah)) {
            // $cat_int = $data['jumlah_kategori'];
            // echo intval($cat_int).',' ;
          ?>
            <?php echo $data1['jumlah_kategori'] . ','; ?>
          <?php
          }
          ?>
        ],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#FF0000', '#800000', '#FFFF00', '#808000', '#00FF00', '#008000', '#00FFFF', '#008080', '#0000FF', ],
      }]
    }

    console.log(donutData);
    var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
  })
</script>


<!-- DROPDOWN UPDATE STATUS -->
<script>
  $(document).on("change", "#datastatus", function(e) {
    var status = $(this).val();
    var id = $(this).data('id');

    $.ajax({
      url: '../admin/action/update-komentar-ajax.php',
      type: "POST",
      data: {
        status: status,
        id: id
      },
      success: function(result) {
        alert("Data Komentar ID : "+id+" Berhasil di Update");
        // $("#display").html(result);
        // setTimeout(function() { // wait for 5 secs(2)
        //   location.reload(); // then reload the page.(3)
        // }, 4000);
      }
    });
  });

  // function selected(id) { 
  //   var statusname = $("#statusSelect_"+id).val();
  //   // var dataStatus = document.getElementById("#statusSelect_"+id).value; 
  //   alert(statusname+id);
  //   $.ajax({
  //     type: "POST",
  //     url: "../admin/action/update-komentar-ajax.php",
  //     data: {
  //       status = statusname,
  //       id = id
  //     },
  //     // dataType: "dataType",
  //     success: function (response) {

  //     }
  //   });
  // }



  // $(document).ready(function() {
  //   $(".selectstatusxx").change(function() {
  //     var statusname = $(this).val();
  //     var getid = $('.selectstatusxx option:selected').attr("data-id");
  //     $.ajax({
  //       type: 'POST',
  //       url: '../admin/action/update-komentar-ajax.php',
  //       data: {
  //         status: statusname,
  //         id: getid
  //       },
  //       success: function(result) {

  //         if (result == '1') {
  //           // window.location.reload();
  //           alert(statusname, getid);
  //         } else {
  //           alert('Gagal update');
  //         }

  //       }
  //     });

  //     console.log(statusname, getid);
  //   });
  // });
</script>

<!-- Script Preview Image -->
<script>
  $("#inputFile").change(function(event) {
    fadeInAdd();
    getURL(this);
  });

  $("#inputFile").on('click', function(event) {
    fadeInAdd();
  });

  function getURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var filename = $("#inputFile").val();

      filename = filename.substring(filename.lastIndexOf('\\') + 1);
      reader.onload = function(e) {

        debugger;

        $('#imgView').attr('src', e.target.result);
        $('#imgView').hide();
        $('#imgView').fadeIn(500);
        // $('.custom-file-label').text(filename);

      }
      reader.readAsDataURL(input.files[0]);
    }
    $(".alert").removeClass("LoadAnimate").hide();
  }

  function fadeInAdd() {
    fadeInAlert();
  }

  function fadeInAlert(text) {
    $(".alert").text(text).addClass("loadAnimate");
  }
</script>

<!-- CKEditor Classic -->
<!-- <script>
    ClassicEditor
        .create( document.querySelector( '#isi' ) )
        .catch( error => {
            console.error( error );
        } );
</script> -->

<script>
  // This sample still does not showcase all CKEditor 5 features (!)
  // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
  CKEDITOR.ClassicEditor.create(document.getElementById("isi"), {
    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
    toolbar: {
      items: [
        'exportPDF', 'exportWord', '|',
        'findAndReplace', 'selectAll', '|',
        'heading', '|',
        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
        'bulletedList', 'numberedList', 'todoList', '|',
        'outdent', 'indent', '|',
        'undo', 'redo',
        '-',
        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
        'alignment', '|',
        'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
        'textPartLanguage', '|',
        'sourceEditing'
      ],
      shouldNotGroupWhenFull: true
    },
    // Changing the language of the interface requires loading the language file using the <script> tag.
    // language: 'es',
    list: {
      properties: {
        styles: true,
        startIndex: true,
        reversed: true
      }
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
    heading: {
      options: [{
          model: 'paragraph',
          title: 'Paragraph',
          class: 'ck-heading_paragraph'
        },
        {
          model: 'heading1',
          view: 'h1',
          title: 'Heading 1',
          class: 'ck-heading_heading1'
        },
        {
          model: 'heading2',
          view: 'h2',
          title: 'Heading 2',
          class: 'ck-heading_heading2'
        },
        {
          model: 'heading3',
          view: 'h3',
          title: 'Heading 3',
          class: 'ck-heading_heading3'
        },
        {
          model: 'heading4',
          view: 'h4',
          title: 'Heading 4',
          class: 'ck-heading_heading4'
        },
        {
          model: 'heading5',
          view: 'h5',
          title: 'Heading 5',
          class: 'ck-heading_heading5'
        },
        {
          model: 'heading6',
          view: 'h6',
          title: 'Heading 6',
          class: 'ck-heading_heading6'
        }
      ]
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
    placeholder: 'Welcome to CKEditor 5!',
    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
    fontFamily: {
      options: [
        'default',
        'Arial, Helvetica, sans-serif',
        'Courier New, Courier, monospace',
        'Georgia, serif',
        'Lucida Sans Unicode, Lucida Grande, sans-serif',
        'Tahoma, Geneva, sans-serif',
        'Times New Roman, Times, serif',
        'Trebuchet MS, Helvetica, sans-serif',
        'Verdana, Geneva, sans-serif'
      ],
      supportAllValues: true
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
    fontSize: {
      options: [10, 12, 14, 'default', 18, 20, 22],
      supportAllValues: true
    },
    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
    htmlSupport: {
      allow: [{
        name: /.*/,
        attributes: true,
        classes: true,
        styles: true
      }]
    },
    // Be careful with enabling previews
    // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
    htmlEmbed: {
      showPreviews: true
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
    link: {
      decorators: {
        addTargetToExternalLinks: true,
        defaultProtocol: 'https://',
        toggleDownloadable: {
          mode: 'manual',
          label: 'Downloadable',
          attributes: {
            download: 'file'
          }
        }
      }
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
    mention: {
      feeds: [{
        marker: '@',
        feed: [
          '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
          '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
          '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
          '@sugar', '@sweet', '@topping', '@wafer'
        ],
        minimumCharacters: 1
      }]
    },
    // The "super-build" contains more premium features that require additional configuration, disable them below.
    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
    removePlugins: [
      // These two are commercial, but you can try them out without registering to a trial.
      // 'ExportPdf',
      // 'ExportWord',
      'CKBox',
      'CKFinder',
      'EasyImage',
      // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
      // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
      // Storing images as Base64 is usually a very bad idea.
      // Replace it on production website with other solutions:
      // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
      // 'Base64UploadAdapter',
      'RealTimeCollaborativeComments',
      'RealTimeCollaborativeTrackChanges',
      'RealTimeCollaborativeRevisionHistory',
      'PresenceList',
      'Comments',
      'TrackChanges',
      'TrackChangesData',
      'RevisionHistory',
      'Pagination',
      'WProofreader',
      // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
      // from a local file system (file://) - load this site via HTTP server if you enable MathType
      'MathType'
    ]
  });
</script>

</body>

</html>