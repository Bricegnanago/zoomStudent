<?php     
    $mois  = array('', "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
    require("partials/header.php");
    require "config/db.php";
 ?>
        <div class="container">
            <?php require("partials/searchbar.php") ?>
                            
            <div class="clearfix"></div>                   
            <ul class="list-group" id="suggestion"></ul>
            <ul class="list-group" id="suggestion_fil"></ul>
            <div class="card mb-4 animated slideInLeft text-dark" style="background-color: #fff!important;">
                <div class="m-3 " style="display : inline-flex" >
                    <a class="btn btn-success mr-2 bout"  id="print" style="cursor: pointer; background-color: #111111; color: white; border: none;">
                        <i class="fas fa-print"></i>                    
                    </a>
                    <a  href="liste.php" class="btn btn-success mr-2 bout" id="edit"  style="cursor: pointer; background-color: #111111; color: white; border: none;" >
                        <i class="fas fa-pen-alt"></i>
                    </a>
                </div>
                
            
                
                
            <h3 class="card-header font-weight-bold text-uppercase my-1 text-center" style="position: relative; background-color: rgb(255, 255, 255)!important; color: #111111!important; " id="fil_name">LP1 Info</h3>
                
                
                <div class="container">                                
                        
                    <div class="card-body">                            
                        <div id="table" class="table-editable">                                                                                                        
                            <div class="col-auto">
                                    
                                <label class="sr-only" for="search_text">Recherche</label>
                                
                                <div class="form-group col-lg-12 my-3 m-auto ">
                                    <!-- <label for="month" style="float: left" style="font-size: 1.3rem;">Selectionner mois:</label> -->
                                    <select name="multi_search_filter" id="multi_search_filter" multiple class="form-control" style="font-size: 1.2rem; background-color: #fff; color: black;">
                                        <!-- <option value=""></option> -->  
                                        <?php 
                                                $db = Database::connect();
                                                $statement = $db->query("SELECT nom from mois");       
                                                
                                                while($row = $statement->fetch()){?>
                                                    
                                                    <option value="<?= $row['nom']?>" <?php if(!empty($_SESSION["month"]) && $_SESSION["month"] == $row['nom']){echo "selected";} ?>> <?= $row['nom']?></option>
                                                    <?php
                                                }

                                                Database::disconnect();

                                            ?>                                                            
                                        <!-- <option value="Decembre">Decembre</option>
                                        <option value="Janvier">Janvier</option>
                                        <option value="Fevrier">Fevrier</option>
                                        <option value="Mars">Mars</option>
                                        <option value="Avril">Avril</option>
                                        <option value="Mai">Mai</option>
                                        <option value="Juin">Juin</option>
                                        <option value="Juillet">Juillet</option>
                                        <option value="Aout">Aout</option>
                                        <option value="Septembre">Septembre</option>
                                        <option value="Octobre">Octobre</option>
                                        <option value="Novembre">Novembre</option> -->
                                    </select>
                                    <input type="hidden" name="hidden_country" id="hidden_country" />
                                    <div style="clear:both"></div>
                                    <div class="table-responsive">
                                        <table class="table table-striped  table-hover">
                                            <thead style="font-size: 1.2rem!important;" >
                                            <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th class="add_text text-center"><?= $mois[date('n')]?></th>
                                            <th class="text-center">Heure just.</th>
                                            <th class="text-center">Heure rest.</th>
                                            </tr>
                                            </thead>
                                            <tbody style="font-size: 1.1rem!important;">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <br/>
                        </div>                          
            
                    </div>
                    
                </div>
            
            </div>

        </div>

    </div>
</div>
<?php require("partials/footer.php") ?>

<script>

$(document).ready(function(){

    load_data_view();

function load_data_view(query='', filiere)
{
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
    $('#multi_search_filter').change(function(){
        $('#hidden_country').val($('#multi_search_filter').val());
        var query = $('#hidden_country').val();
        $(".add_text").html( $('#hidden_country').val())
        var filiere = $("#search_fil").val()
        // alert(filiere);
        setTimeout(function(){load_data_view(query, filiere)}, 200);
    });

    
    //partie impression
    $("#print").click(function(){
        $(this).toggleClass("animated tada");
        $(".logo").toggle("slow");
        $(".searchbar").toggle("slow");
        $("#multi_search_filter").toggle("slow");
        $("#edit").toggle("slow");
        $("#table").prepend("<img src='images/logo_AGITEL.png' alt='' class='logo' style='position: absolute; top: 0px; left: 67%; width: 250px;'>");      

    });

});
</script>
</body>
</html>