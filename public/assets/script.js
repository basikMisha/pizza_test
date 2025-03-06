$(document).ready(function () {
    $("#order-form").on("submit", function (e) {
        e.preventDefault();

        let orderData = {
            pizza: $("#pizza").val(),
            size: $("#size").val(),
            sauce: $("#sauce").val(),
        };

        $.ajax({
            url: "../api/order.php",
            type: "POST",
            data: JSON.stringify(orderData),
            contentType: "application/json",
            success: function (response) {
                let data = JSON.parse(response);
                $('#receipt').text(data.message);
            },
            error: function () {
                $("#receipt").text("Ошибка оформления заказа");
            },
        });
    });
});
