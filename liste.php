<?php 
    
    require "partials/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,400|Oxygen|Roboto" rel="stylesheet">

    <link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/app.css">

	<title>Coming Soon</title>
</head>
<body>
	<div class="page">

		<div class="wrapper">
			<img src="images/logo_AGITEL.png" alt="" class="logo">				
			<div class="container">

				<div class="searchbar mb-1" style="margin-top: 20px;">
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

								</path></svg><i class="icon-dm-delete-form searchbar-place-around-me-clear"></i></button>
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
                

                <!-- Editable table -->
               
                    <div class="card mb-4">
                         <form action="marquage.php" method="POST" style="position:relative">                           
                            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Classe Etudiant</h3>
                            
                            <?php
                            session_start();
                            if(isset($_SESSION["flash"]["info"])){
                                ?><div class="alert alert-info alert-dismissible fade show text-center"  role="alert" >
                                    <?= $_SESSION["flash"]["info"] ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div><?php
                                unset($_SESSION["flash"]["info"]);
                                // var_dump($_SESSION);
                            }else if(isset($_SESSION["flash"]["warning"])){
                                    ?>
                                    <div class="alert alert-warning alert-dismissible fade show text-center">
                                        <?= $_SESSION["flash"]["warning"] ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div><?php
                                    unset($_SESSION["flash"]["warning"]);
                                    // var_dump($_SESSION);
                            }

                            
                            ?>
                            <div class="card-body">
                                
                                <div id="table" class="table-editable">
                                        
                                    <span class="table-add float-left mb-3 mr-2"><a href="liste.view.php" class="text-success"><i class="fa fa-eye fa-2x" aria-hidden="true" ></i></a></span>
                                    <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
                                        aria-hidden="true"></i></a></span>                                 
                                        <div class="container">
                                            <div class="row">
                                                <div class="form-group col-lg-3 my-3"></div>    
                                                <div class="form-group col-lg-3 my-3">
                                                    <label for="month">Selectionner mois:</label>
                                                    <select class="form-control" id="month" name="month">
                                                        <!-- <option value=""></option> -->
                                                        <option value="Janvier" selected>Janvier</option>
                                                        <option value="Fevrier">Fevrier</option>
                                                        <option value="Mars">Mars</option>
                                                        <option value="Avril">Avril</option>
                                                        <option value="Mai">Mai</option>
                                                        <option value="Juin">Juin</option>
                                                        <option value="Juillet">Juillet</option>
                                                        <option value="Aout">Aout</option>
                                                        <option value="Septembre">Septembre</option>
                                                        <option value="Octobre">Octobre</option>
                                                        <option value="Novembre">Novembre</option>
                                                        <option value="Decembre">Decembre</option>                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-3 my-3">
                                                    <label for="week">Selectionner la semaine:</label>
                                                    <select class="form-control" id="week" name="week">
                                                        <!-- <option value=""></option> -->
                                                        <option value="Semaine 1" >Semaine 1</option>
                                                        <option value="Semaine 2" selected >Semaine 2</option>
                                                        <option value="Semaine 3">Semaine 3</option>
                                                        <option value="Semaine 4">Semaine 4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-3 my-3"></div>
                                            </div>
                                        </div>
                                        <button class="affiche"></button>                                
                                        <div class="table-responsive">
                                        <table class="table table bordered">
                                            <tr>
                                            <th>code</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th> Heure Mois </th>
                                            <th> Plus d'info </th>
                                            
                                            </tr>
                                            <tbody id="result">

                                            </tbody>
                                        </table>
                            </div>
                            </div>
                                             
                    
                        </div>
                           <button type="submit" name="submit" class="btn btn-success btn- col-3" style="position:fixed; bottom:10px!important; right:50px!important; width: 150px!important;">Envoyer</button>
                        </form>
                    </div>
                    

      <!-- Editable table -->
				
	  <!-- Grid row -->
				</section>

			</div>
	</div>
    <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
    <script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
  <!-- <script src="js/script.js"></script> -->

   
<script>

    $(document).ready(function(){        
     load_data();

     function load_data(query_month, query_week)
     {
      $.ajax({
       url:"fetch.liste.php",
       method:"POST",
       data : {
           query_month: query_month, 
           query_week : query_week
           },
            success:function(data)
            {
                $('#result').html(data);
            }
        });
     }

    /////
        $old_month= $("#month option:selected").text();
        $old_week= $("#week option:selected").text();       
        // alert($old_month + $old_week);
        $("#month").change(function(){
            
            $new_month= $("#month option:selected").text();
            
            if($old_month !== $new_month) { 
                load_data($new_month, $old_week);
                // alert($new_month + $old_week);
                // alert("humm");
                $old_month = $new_month;
            }
            $("#week").change(function(){                    
                $new_week = $("#week option:selected").text();
                if($new_week !== $old_week)
                {
                    load_data($new_month, $new_week);
                    // alert($new_month + " et " + $new_week);
                    // alert("ok");
                    $old_week = $new_week;
                }                    
                
            });

            
            console.log("old_month = " + $old_month);
            console.log("new_month = " + $new_month);
            console.log("old_week = " + $old_week);
            console.log("old_week = " + $old_week);
        });   

        $("#week").change(function(){                    
                $new_week = $("#week option:selected").text();
                if($new_week !== $old_week)
                {
                    load_data($old_month, $new_week);
                    // alert($old_month + " et " + $new_week);
                    // alert("ok");
                    $old_week = $new_week;
                }                    
                
            });
        $(".alert").alert();
        // $(".alert").alert('close');
    });
    </script>
</body>
</html>