
// UPDATE VIEWS BERITA
function updateViews(id)
{
  var id_news = id;

  $.ajax({
    type: "POST",
    url: "../action/update-views.php",
    data: {
      id : id_news
    },
    // dataType: "dataType",  
    success: function (response) {
      // alert(response)
      console.log(response)
      // console.log("updated")
      // window.location.href = ("http://localhost/newsportal/pages/single_page.php?id="+id)
    }
  });
}

//   $(document).ready(function() {
//     $(document).on('click', '#btn_load_comment', function() {
//       var last_id = $(this).data("id");
//       $('#btn_load_comment').html("Loading...");
//       $.ajax({
//         url: "single_page.php",
//         method: "POST",
//         data: {
//           last_id: last_id
//         },
//         dataType: "text",
//         success: function(data) {
//           $('#remove_comment').remove();
//           $('#load_comment').append(data);
//         }
//       });
//     });
//   });
