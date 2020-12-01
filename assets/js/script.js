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
        k = event.which;
        if ((k >= 96 && k <= 105) || k == 8) {
            if ($(this).val().length == 10) {
                if (k == 8) {
                    return true;
                } else {
                    event.preventDefault();
                    return false;
                }
            }
        } else {
            event.preventDefault();
            return false;
        }

    });


});