<?php     
    require "partials/functions.php";
    $mois  = array('', "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");

    logged_only();
    // debug($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,400|Oxygen|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/search_bar.css">
    <link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/app.css">

	<title>ZOOM STUDENT</title>
</head>
<body>
	<div class="page">

		<div class="wrapper">
			<img src="images/logo_AGITEL.png" alt="" class="animated bounce infinite logo mt-3" alt="Transparent MDB Logo " id="animated-img1 " style=" width: 200px; float: left">

	
			<div class="container">

				<div class="searchbar mt-3 mb-5" style="">
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
                                </svg><i class="icon-dm-delete-form searchbar-place-around-me-clear"></i></button>
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
               
                <div class="card mb-4 animated slideInLeft">
                        
                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4" style="position: relative">
                    <i class="fas fa-print"></i>
                        <i class="fa fa-print mr-3 float-left btn btn-success" aria-hidden="true" style="cursor: pointer;"></i>
                        <a  href="liste.php" class="btn btn-success float-left mb-3 mx-auto mr-2" id="edit"><i class="fas fa-pen-alt"></i>
                        </a>
                        LP1 Info
                    </h3>
                    
                    <div class="container">                                
                            
                        <div class="card-body">                            
                            <div id="table" class="table-editable ">                                                                                                        
                                <div class="col-auto">
                                        
                                    <label class="sr-only" for="search_text">Recherche</label>
                                    
                                    <div class="form-group col-lg-12 my-3 m-auto ">
                                        <!-- <label for="month" style="float: left" style="font-size: 1.3rem;">Selectionner mois:</label> -->
                                        <select name="multi_search_filter" id="multi_search_filter" multiple class="form-control" style="font-size: 1.2rem;">
                                            <!-- <option value=""></option> -->                                            
                                            <option value="Decembre">Decembre</option>
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
                                            <option value="Novembre">Novembre</option>
                                        </select>
                                        <input type="hidden" name="hidden_country" id="hidden_country" />
                                        <div style="clear:both"></div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead style="font-size: 1.6rem!important;">
                                                <tr>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th class="add_text"><?= $mois[date('n')]?></th>
                                                </tr>
                                                </thead>
                                                <tbody style="font-size: 1.5rem!important;">
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <br/>
                            </div>                          
                
                        </div>
                        
                    </div>
                

                        <!-- Editable table -->
                    
                        <!-- Grid row -->
                </div>

			</div>
        </div>
	</div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/mdb.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  
<script>

$(document).ready(function(){

load_data();

function load_data(query='')
{
 $.ajax({
  url:"fetch.php",
  method:"POST",
  data:{query:query},
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
        load_data(query);
    });

    $(".fa-print").click(function(){
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


<!-- SELECT * FROM etudiant LEFT JOIN marquer ON etudiant.CODE = marquer.student_id WHERE marquer.id IS NOT NULL; -->