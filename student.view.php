<!-- traitemant -->
<?php
    require("partials/header.php");
    require 'config/db.php';
     if(!empty($_GET['id'])) 
     {
        $id = checkInput($_GET['id']);
     }
    $db = Database::connect();
    $_SESSION['id'] = $id;
    //  on recupère toutes les occurence de l'id 
    $statement = $db->prepare("SELECT * FROM  etudiant where code = ?");
    $statement->execute(array($id));
    $student = $statement->fetch();
    
    $statement_hour = 
    $db->prepare("SELECT marquer.months, SUM(marquer.HOUR) AS heure
                from marquer LEFT JOIN etudiant
                ON marquer.student_id = etudiant.CODE 
                WHERE marquer.HOUR IS NOT NULL AND 
                etudiant.CODE = ? GROUP BY months order by marquer.months");
    $statement_hour->execute(array($id));    

    //Requete pour obtenir une heure justifiée dans le pour un mois donné
    $statement_sum_hour = 
    $db->prepare("SELECT SUM(marquer.HOUR) AS 'heure_total' 
    FROM marquer INNER JOIN etudiant 
    ON marquer.student_id = etudiant.CODE WHERE etudiant.CODE = ? order by marquer.months asc");
    $statement_sum_hour->execute(array($id));
    $result_sum_hour = $statement_sum_hour->fetch();
    
     //Requete pour obtenir une heure justifiée dans le pour un mois donné
     $query_justifiy_hour = "SELECT hour, months FROM justifier 
     WHERE student_id = ?";
     
    Database::disconnect();
   
?>
<div class="container">
           
    <div class="clearfix"></div>
    <ul class="list-group" id="suggestion"></ul>
    <ul class="list-group" id="suggestion_fil"></ul>							
    <section id="filiere">
        
        <div class="card p-5 wow fadeInUp " data-wow-delay="0.6s" style="bacground-color: transparent!important">
            
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <a href="liste.view.php"><i class="fa fa-arrow-left fa-2x"></i></a><br>
                    <div class="text-left h5 text-success" style="float: left;">Informatique - Licence 3</div>
                    <div class="text-right h5 text-success"  style="float: right;">Année-universitaire</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-1">
                    <div class="card">
                        <h5 class="card-header h5 text-white wow fadeInUp " data-wow-delay="0.6s" style="background-color: #3FDBAB">Tableau de bord</h5>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?= $student["nom"] . " " . $student["prenom"]; ?></li>
                                <li class="list-group-item">Née le <?= $student["date_naissance"]; ?> A Bouaké</li>
                                    
                            </ul>
                            
                        </div>
                    </div>
                    <div class="card mt-1">
                        <h5 class="card-header h5 text-white" style="background-color: #3FDBAB">Justifieur</h5>
                        <div class="card-body">
                        <!-- <label for="month">Selectionner mois:</label> -->

                        <select class="form-control" id="month" name="month">                                                                                  
                        <?php while($rows = $statement_hour->fetch()){?>
                            <option value="<?= $rows["months"] ?>"><?= $rows["months"]?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <div class="form-group mt-3 slidecontainer" id="justification">

                            <!-- formulaire de soumission des heures -->                                                           
                        </div>
                        
                        
                        <form action="" id="myform" method="post" style="display:block">
                            <div id="message">

                            </div>                                                                         
                            <div class="form-group">
                                <input type="text" id="hour_justified"  name="hour_justified" class="form-control">
                            </div>                                        
                            <div class="form-group">
                                <input type="submit" class="btn btn-info col-12" id="enregistrer" value="Enregistrer">
                            </div>
                        </form>                                
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card wow fadeInUp" data-wow-delay="0.6s" style="box-shadow : 0 4px 8px  0" >
                    <h5 class="card-header h5 text-white" style="background-color: #3FDBAB">Bilan Général</h5>
                    <div class="card-body bilan">
                            <table class="table table-default table-hover" style="overflow-y : scroll!important;">
                                <thead class="">
                                    <tr>                        
                                    <th >Mois</th>
                                    <th >Heures Acc.</th>
                                    <!-- <th >Heures Just.</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                    $db = Database::connect();
                                    $statement_hour = $db->prepare("SELECT marquer.months, SUM(marquer.HOUR) AS heure
                                    from marquer LEFT JOIN etudiant
                                    ON marquer.student_id = etudiant.CODE 
                                    WHERE marquer.HOUR IS NOT NULL AND 
                                    etudiant.CODE = ? GROUP BY months order by marquer.months");
                                    $statement_hour->execute(array($id));

                                    $statement_justifiy_hour = $db->prepare($query_justifiy_hour);
                                    $statement_justifiy_hour->execute([$id]);
                                    $rowss = $statement_justifiy_hour->fetchAll();
                                    // echo count($rowss);
                                    $i=0;
                                        while($row = $statement_hour->fetch()){
                                        // empty($rowss[$i]["hour"]) || 
                                        // while(!empty($rowss[$i]["hour"]) || ($rowss[$i]["months"] != $row["months"]) && $i <= count($rowss)){
                                        //     $i++;
                                        //     // if(isset($rowss[$i]["months"])) {
                                        //     //     echo $rowss[$i]["months"] . "  " .  $row["months"] . "<br>";
                                        //     // }else{
                                        //     //     echo "Null  " .  $row["months"] . "<br>";
                                        //     // }
                                        // }
                                        
                                            // $heure = (!empty($rowss[$i]["hour"])) ? $rowss[$i]["hour"] : 0;                                                
                                        // $i++;
                                        ?>

                                        <tr>                                                                                                            
                                            <td style="font-weight: bold"><?= $row["months"]?></td>
                                            <td><span class="badge badge-warning ml-2"><?= $row["heure"] ?></span></td>
                                            <!-- <td><span class="badge badge-warning ml-2"> //$heure </span></td> -->
                                        </tr><?php Database::disconnect();
                                    }
                                            
                                    ?>
                                </tbody>
                            </table>
                            <div class="total  col-lg-2 p-1 mx-auto my-2 bg-success text-center text-white"><span class="red h1"><?= $result_sum_hour["heure_total"];?></span></div>
                            <a href="#" class="btn btn-danger">Convoquer</a>

                    </div>
                </div>
            </div>
        </div>

    </section>

    </div>

	</div>
    <?php require("partials/footer.php") ?>

    <script>
        $(document).ready(function(){
        
        $("#month option:eq(0)").prop("selected", true);
        $query = $("#month option:eq(0)").val();
        load_data($query);

        function load_data(query)
        {
            $.ajax({
            url:"fetch_justify.php",
            method:"POST",
            data:{query:query},
            success:function(data){
                $('#justification').html(data)
                }
            })
        }

        


        $('#month').change(function(){
            var query = $('#month option:selected').val();
            load_data(query);
        });

         $("#myform").submit(function(){
             event.preventDefault();
            var gethour = $("#hour_justified").val();
                // alert(gethour);
                $.ajax({
             url:"fetch_send_data.php",
             method:"POST",
             data : {
                 gethour : gethour
                },                
                beforeSend : function(){                    
                    $('#hour_justified').val("");
                    $('#hour_justified').toggleClass("animated bounceInLeft");
                    $("#enregistrer").toggleClass("animated bounceIn");
                    $("#enregistrer").val("Validé...");
                    $("#flash").removeClass("animated bounceIn");
                    $("#flashM").removeClass("animated bounceIn");
                },
            success:function(data){
                // $("#hour_justified").val = "";
                 $('#message').html(data)
                 $("#enregistrer").val("Enregister");
                }        
                
         });
        //  return false;
        });
                

        // ---------------IMPRESSION -------------------
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