$(document).ready(function() {
   $('.close1').click(function(event) {
    var id = $(this).next('.del').val();
        console.log(id);
        if (confirm("Вы действительно хотите удалить это?")) {
            $.post("/controllers.php", {
                action: "close1",
                id: id
            }, function(data) {
                alert("Удалено успешно");
            });
        }
        location.reload(true);
    });
});