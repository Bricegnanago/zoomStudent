<!-- traitemant -->
<?php
    require 'partials/functions.php';
    require 'config/db.php';
    logged_only();

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
                etudiant.CODE = ? GROUP BY months");
    $statement_hour->execute(array($id));    

    $statement_sum_hour = 
    $db->prepare("SELECT SUM(marquer.HOUR) AS 'heure_total' 
    FROM marquer INNER JOIN etudiant 
    ON marquer.student_id = etudiant.CODE WHERE etudiant.CODE = ?");
    $statement_sum_hour->execute(array($id));
    $result_sum_hour = $statement_sum_hour->fetch();
    
    Database::disconnect();

     


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/fontawesome.css">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,400|Oxygen|Roboto" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/search_bar.css">
	<title>Zoom Student</title>
</head>
<body>
	<div class="page">

		<div class="wrapper">
            <img src="images/logo_AGITEL.png" alt="" class="animated bounce infinite logo mt-3" alt="Transparent MDB Logo" id="animated-img1 " style=" width: 200px; float: left"><a href="logout.php" class="float-right mr-5 logout text-white"><i class="fas fa-lock fa-3x"></i></a>	
			<div class="container">

            <div class="searchbar mb-2 mt-3">
                <div class="searchbar-query">
                    <div class="searchbar-input-wrapper br-right">
                        <i class="fas fa-search"></i> 
                        <div class="searchbar-input">
                            <input class="searchbar-input searchbar-query-input searchbar-query-input-opened valid" placeholder="Quel(le) classe, Institut…">
                        </div>
                    </div>
                </div>
                <div class="searchbar-query">
                    <div class="searchbar-input-wrapper">
                        <i class="fas fa-user-graduate"></i>
                        <div class="searchbar-input">
                            <input class="searchbar-input searchbar-place-input" placeholder="Quel étudiant?">
                        </div>
                        <button class="dl-button btn-icon Tappable-inactive searchbar-place-around-me-button  dl-button-size-normal"
                            role="button" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="searchbar-place-around-me-icon">
                                <path d="M0 0h24v24H0z" fill="none"></path><path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm8.94 3c-.46-4.17-3.77-7.48-7.94-7.94V1h-2v2.06C6.83 3.52 3.52 6.83 3.06 11H1v2h2.06c.46 4.17 3.77 7.48 7.94 7.94V23h2v-2.06c4.17-.46 7.48-3.77 7.94-7.94H23v-2h-2.06zM12 19c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z">

                                </path>
                            </svg><i class="icon-dm-delete-form searchbar-place-around-me-clear"></i>
                        </button>
                    </div>
                </div>
                <button class="br-btn Tappable-inactive dl-button-primary searchbar-submit-button dl-button dl-button-size-normal" 
                    role="button" type="submit">
                    <span class="dl-button-label">
                        <span class="searchbar-submit-button-label">Rechercher</span>     
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </button>
            </div>
                               
            <div class="clearfix"></div>
                
								
            <section id="filiere">
                
                <div class="card p-5">
                    
                    <div class="row">
                        <div class="col-lg-12 mb-1">
                            <a href="liste.view.php"><i class="fa fa-arrow-left fa-2x"></i></a><br>
                            <div class="text-left h5 text-success" style="float: left;">Informatique - Licence 3</div>
                            <div class="text-right h5 text-success"  style="float: right;">Année-universitaire</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 mb-5">
                            <div class="card">
                                <h5 class="card-header h5 text-success">Tableau de bord</h5>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><?= $student["nom"] . " " . $student["prenom"]; ?></li>
                                        <li class="list-group-item">Née le <?= $student["date_naissance"]; ?> A Bouaké</li>
                                            
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="card mt-5">
                                <h5 class="card-header h5 text-success">Justifieur</h5>
                                <div class="card-body">
                                <label for="month">Selectionner mois:</label>

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
                               
                                
                                <?php if(empty($_SESSION['input_status']['comp'])):?>
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
                                <?php endif;?>                                                                                   
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card" style="box-shadow : 0 4px 8px  0">
                            <h5 class="card-header h5 text-white" style="background-color: #3FDBAB">Bilan Général</h5>
                            <div class="card-body bilan">
                                    <table class="table table-default table-hover text-center" style="overflow-y : scroll!important; height: 500px!important;">
                                        <thead>
                                            <tr>                        
                                            <th>Mois</th>
                                            <th>Heures Acc.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $statement_hour = 
                                            $db->prepare("SELECT marquer.months, SUM(marquer.HOUR) AS heure
                                            from marquer LEFT JOIN etudiant
                                            ON marquer.student_id = etudiant.CODE 
                                            WHERE marquer.HOUR IS NOT NULL AND 
                                            etudiant.CODE = ? GROUP BY months");
                                            $statement_hour->execute(array($id));    ?>
                                            <?php while($row = $statement_hour->fetch()){?>
                                                <tr>                                                                                                            
                                                    <td style="font-weight: bold"><?= $row["months"]?></td>
                                                    <td><span class="badge badge-warning ml-2"><?= $row["heure"] ?></span></td>
                                                </tr><?php
                                            }
                                                    
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="total  col-lg-3 p-2 mx-auto my-2 bg-success text-center text-white rounded "><span class="red h1"><?= $result_sum_hour["heure_total"];?></span></div>
                                    
                                    <a href="#" class="btn btn-danger">Convoquer</a>

                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>

	</div>
	
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- <script src="js/popper.min.js"></script> -->
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="js/script.js"></script>

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

                },
            success:function(data){
                // $("#hour_justified").val = "";
                 $('#message').html(data)
                
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