$(document).ready(function(){
    $.ajaxSetup({ cache: false });
    $('#search').keyup(function(){
        $('#suggestion').html('');
        $('#state').val('');
        var searchField = $('#search').val();
        var expression = new RegExp(searchField, "i");
        $.getJSON('data.json', function(data) {
            $.each(data, function(key, value){
                if (value.nom.search(expression) != -1 || value.prenom.search(expression) != -1)
                {
                    console.log(value.code);
                    $('#suggestion').append('<li class="list-group-item link-class"><a href="student.view.php?id='+value.code+'"> '+value.nom+' | <span class="text-muted">'+value.prenom+'</span></a></li>');
                
                }
            });   
        });
    });
    
    $('#suggestion').on('click', 'li', function() {
    var click_text = $(this).text().split('|');
    $('#search').val($.trim(click_text[0]));
    $("#suggestion").html('');
    });
    alert("fekflk");
});