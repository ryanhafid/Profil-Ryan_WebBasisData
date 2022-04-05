$(document).ready(function () {
  // hilangkan tombol cari
  $("#tombol-cari").hide();

  // event ketika keyword ditulis
  $("#keyword").on("keyup", function () {
    // munculkan icone loader
    $(".loader").show();

    // Menggunakan load ==>.load hanya bisa untuk get, gk bisa untuk post
    // $('#container').load('ajax/kondisi_kandang.php?keyword=' + $('#keyword').val());

    //    Menggunakan $.get()
    $.get(
      "../ajax/kondisi_kandang.php?keyword=" + $("#keyword").val(),
      function (data) {
        $("#container").html(data);
        $(".loader").hide();
      }
    );
  });
});
