<?php 
    require("partials/header.php");
    require ('config/db.php');
?>
        <div class="container">            
            <?php require("partials/searchbar.php") ?>                             
                <!-- Editable table -->
                <div class="clearfix"></div>
                <ul class="list-group" id="suggestion"></ul>
                <ul class="list-group" id="suggestion_fil"></ul>
            <div class="card mb-4 animated slideInUp text-dark" style="">
                <h3 class="card-header text-center text-dark font-weight-bold text-uppercase py-4" id="fil_name" style="background-color: white!important; position : sticky">Classe Etudiant</h3>
                <form action="marquage.php" method="POST" style="position: relative">                           
                    
                    
                    <?php
                    
                    if(isset($_SESSION["flash"]["info"])){?>
                    <div class="alert alert-success alert-dismissible fade show text-center col-4 m-auto animated fadeInLeft" role="alert" >
                        <?= $_SESSION["flash"]["info"] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                            
                    </div><?php
                        unset($_SESSION["flash"]["info"]);
                        // var_dump($_SESSION);
                    }else if(isset($_SESSION["flash"]["warning"])){?>
                    <div class="alert alert-warning alert-dismissible fade show text-center col-4 m-auto animated fadeInLeft">
                        <?= $_SESSION["flash"]["warning"] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div><?php
                            unset($_SESSION["flash"]["warning"]);
                            // var_dump($_SESSION);
                    }else if(isset($_SESSION["flash"]["data"])){?>
                    <div class="alert alert-danger alert-dismissible fade show text-center  col-4 m-auto animated fadeInLeft">
                        <?= $_SESSION["flash"]["data"] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div><?php
                        unset($_SESSION["flash"]["data"]);
                        // var_dump($_SESSION);
                    }
                    ?>
                    <div class="card-body">
                        
                        <div id="table" class="table-editable">
                                
                            <span class="table-add float-left mb-3 mr-2" style="color: #47ff95!important"><a href="liste.view.php" class="text-success"><i class="fa fa-eye fa-2x" aria-hidden="true" ></i></a></span>
                                                                                    
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-lg-3 my-3"></div>    
                                    <div class="form-group col-lg-3 my-3">
                                        <label for="month">Selectionner mois:</label>
                                        <select class="form-control" id="month" name="month">
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

                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3 my-3">
                                        
                                        
                                        <label for="week">Selectionner la semaine:</label>
                                        <select class="form-control" id="week" name="week">                                            
                                            <?php 
                                                $db = Database::connect();
                                                $statement_week = $db->query("SELECT nom from semaine");                                                       
                                                while($rows = $statement_week->fetch()){?>                                                    
                                                    <option value="<?= $rows['nom']?>" <?php if(!empty($_SESSION["week"]) && $_SESSION["week"] == $rows['nom']){echo "selected";} ?>> <?= $rows['nom']?></option>
                                                    <?php
                                                }

                                                Database::disconnect();

                                            ?>  

                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3 my-3"></div>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table bordered table-hover">
                                    <tr>
                                        <!-- <th>code</th> -->
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th> Heure Mois </th>
                                        <th class="text-center">Modifer</th>
                                        <th class="text-center"> Plus d'info </th>
                                    </tr>
                                    <tbody id="result"></tbody>
                                </table>
                            </div>
                        </div>                                                        
                    </div>
                    <button type="submit" name="submit" class="btn btn-success col-3 btn-submit my-button" style="">Envoyer</button>
                </form>
            </div>		
        </div>
    </div>
</div>
<?php require("partials/footer.php") ?>
<script>

    $(document).ready(function(){
     $filiere= $("#search_fil").val();

    function load_data(query_month, query_week,filiere)
    {
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
    
        $old_month= $("#month option:selected").text();
        $old_week= $("#week option:selected").text();
  
        load_data($old_month, $old_week,$filiere);
        
        $("#month").change(function(){
            
            $new_month= $("#month option:selected").text();            
            if($old_month !== $new_month) {
                $filiere= $("#search_fil").val();
                load_data($new_month, $old_week,$filiere);                

                $old_month = $new_month;
            }
            $("#week").change(function(){                    
                $new_week = $("#week option:selected").text();
                if($new_week !== $old_week)
                {
                    $filiere= $("#search_fil").val();
                    load_data($new_month, $new_week,$filiere);               
                    $old_week = $new_week;
                }                    
                
            });        
        });   
        $("#week").change(function(){                    
            $new_week = $("#week option:selected").text();
            if($new_week !== $old_week)
            {
                $filiere= $("#search_fil").val();
                load_data($old_month, $new_week, $filiere);           
                $old_week = $new_week;
            }            
        });
        $(".alert").alert();        
    });
    
</script>
</body>
</html>