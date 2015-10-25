$(document).ready(function() {
    $(".select2-tags").select2({
        tags: true
    });
    $(".select2-tags-token").select2({
        tags: true,
        tokenSeparators: [',', ';'],
    });
});
