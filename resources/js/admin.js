$(document).ready(function() {
    $('.form').each(function(index, element) {
        $(this).submit(function(e) {
            var CheckSubmit = confirm('آیا از عملیات خود مطمعن هستید؟');
            if (!CheckSubmit) {
                e.preventDefault();
            }
        });
    });
});