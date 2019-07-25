$(document).ready(function(){
    // var taille = 0;
    var fil=$('#search_fil').val();
        $('#fil_name').text(fil);
        $("#suggestion_fil").html('');
    function load_data(query_month, query_week,filiere){
     $.ajax({
      url:"fetch.liste.php",
      method:"POST",
      data : {
          query_month: query_month, 
          query_week : query_week,
          filiere:filiere
          },
           success:function(data)
           {
               $('#result').html(data);
           }
       });
    }

    function load_data_view(query='', filiere){
        $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{
                query:query,
                filiere : filiere  
            },
            success:function(data)
            {
            $('tbody').html(data);
            }
        })
    }

    $.ajaxSetup({ cache: false });
    $('#search').keyup(function(){
                
        $('#suggestion').html('');
        // $('#state').val('');
        var searchField = $('#search').val();
        if(searchField.length >= 3){
        var expression = new RegExp(searchField, "i");
        $.getJSON('data.json', function(data) {
            $.each(data, function(key, value){
                if (value.nom.search(expression) != -1 || value.prenom.search(expression) != -1)
                {                    
                    $('#suggestion').fadeIn(2000).append('<li class="list-group-item link-class"><a href="student.view.php?id='+value.code+'"> '+value.nom+' | <span class="text-muted">'+value.prenom+'</span></a></li>');                    
                    // $('#suggestion li').c(2000);                
                }
            }); 
            if($('#search').val() == ""){    
                $('#suggestion').hide(1000);
            }
        });
    }
    });    
    $('#suggestion').on('click', 'li', function() {
        var click_text = $(this).text().split('|');
        $('#search').val($.trim(click_text[0]));
        $("#suggestion").html('');
    });
    

    // RECHERCHE PAR FILIERE

    // var taille_fil = 0;
    $.ajaxSetup({ cache: false });
    $('#search_fil').keyup(function(){
        
        $filiere = $(this).val();
        $new_week = $("#week option:selected").text();
        $new_month= $("#month option:selected").text(); 
        
        load_data($new_month, $new_week, $filiere);

        $('#hidden_country').val($('#multi_search_filter').val());
        var query = $('#hidden_country').val();
        // load_data_view(query, $filiere)
        $('#suggestion_fil').html('');
        // $('#state').val('');
        var searchField = $('#search_fil').val();
        if(searchField.length >= 2){
        var expression = new RegExp(searchField, "i");
        $.getJSON('filiere.json', function(data) {
            $.each(data, function(key, value){
                if (value.filiere.search(expression) != -1 || value.desc.search(expression) != -1)
                {                    
                 setTimeout(() => {
                    $('#suggestion_fil').fadeIn(2000).append('<li class="list-group-item link-class" style="cursor:pointer">'+value.filiere+' | <span class="text-muted">'+value.desc+'</span></li>');    
                 }, 400);
                    // $('#suggestion li').c(2000);                
                }
            }); 
            if($('#search_fil').val() == ""){    
                $('#suggestion_fil').hide(1000);
            }
        });
    }
    });    
    $('#suggestion_fil').on('click', 'li', function() {
        var click_text = $(this).text().split('|');
        $('#search_fil').val($.trim(click_text[0]));
        var fil=$('#search_fil').val();
        $('#fil_name').text(fil);
        $("#suggestion_fil").html('');
        // load_data($old_month, $old_week,$filiere);
        $new_week = $("#week option:selected").text();
        $new_month= $("#month option:selected").text();                
        load_data($new_month, $new_week, fil);
        $('#hidden_country').val($('#multi_search_filter').val());
        var query = $('#hidden_country').val();
        // load_data_view(query, $filiere)
    });
    
});