$(function() {
    $('.task').on('click', function() {
        $(this).find(".task_description").toggle('slow');
    });

    $('.note').on('click', function() {
        $(this).find(".note_description").toggle('slow');
    });
});

function shownotedesc(id) {
    $("#notedesc"+id+"").toggle('slow');
}