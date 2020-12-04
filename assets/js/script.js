$(document).ready(function () {
  $("select#cab").change(function () {
    var type = $(this).children("option:selected").val();
    if (type == "CedMicro") {
      $("#luggage").val("0");
      $("#luggage").attr("disabled", "disabled");
    } else {
      $("#luggage").removeAttr("disabled");
    }
  });

  $("select#pickup").change(function () {
    $("#calculatedPrice").html("");
    $("#bookingbtn").attr("hidden", true);
    var pickup = $(this).children("option:selected").val();
    $("#drop option[value='" + pickup + "']")
      .attr("disabled", "disabled")
      .siblings()
      .removeAttr("disabled");
  });

  $("select#drop").change(function () {
    $("#calculatedPrice").html("");
    $("#bookingbtn").attr("hidden", true);
    var drop = $(this).children("option:selected").val();
    $("#pickup option[value='" + drop + "']")
      .attr("disabled", "disabled")
      .siblings()
      .removeAttr("disabled");
  });

  $("select#cab").change(function () {
    $("#bookingbtn").attr("hidden", true);
    $("#calculatedPrice").html("");
  });

  $("#luggage").keyup(function () {
    $("#bookingbtn").attr("hidden", true);
    $("#calculatedPrice").html("");
  });

  $("#luggage").keyup(function (event) {
    let check = $("#luggage").val();
    if (isNaN(check) == true) {
      alert("Interger Value Needed");
      event.preventDefault();
      $("#luggage").val("");
    }
  });
});
