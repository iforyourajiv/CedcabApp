$(document).ready(function() {
    $("select#cab").change(function() {
        var type = $(this).children("option:selected").val();
        if (type == "CedMicro") {
            $("#luggage").val("0");
            $("#luggage").attr("disabled", "disabled");
        } else {
            $("#luggage").removeAttr("disabled");
        }
    });

    $("select#pickup").change(function() {
        $("#calculatedPrice").html("");
        var pickup = $(this).children("option:selected").val();
        $("#drop option[value='" + pickup + "']")
            .attr("disabled", "disabled")
            .siblings()
            .removeAttr("disabled");
    });

    $("select#drop").change(function() {
        $("#calculatedPrice").html("");
        var drop = $(this).children("option:selected").val();
        $("#pickup option[value='" + drop + "']")
            .attr("disabled", "disabled")
            .siblings()
            .removeAttr("disabled");
    });

    $("#luggage").keydown(function(event) {
        var num = event.keyCode;
        if ((num > 95 && num < 106) || (num > 36 && num < 41) || num == 9) {
            return;
        }
        if (event.shiftKey || event.ctrlKey || event.altKey) {
            event.preventDefault();
        } else if (num != 46 && num != 8) {
            if (isNaN(parseInt(String.fromCharCode(event.which)))) {
                event.preventDefault();
            }
        }
    });


});