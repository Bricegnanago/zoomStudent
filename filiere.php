<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,400|Oxygen|Roboto" rel="stylesheet">

	
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/mdb.min.css">
	<link rel="stylesheet" href="css/style.css">

	<title>Coming Soon</title>
</head>
<body>
<div id="preloder">
		<div class="loader"></div>
	</div>

	<div class="page">

		<div class="wrapper">
			<img src="images/logo_AGITEL.png" alt="" class="logo">			

	
			<div class="container" style="">
				<!-- navbar -->
				<div class="searchbar" style="margin-top: 100px;">
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
				<!--End navbar -->			

				<!-- section des filieres -->

				<div id="accordion" class="mt-5"> 
					<div class="card">
					  <div class="card-header">
						<a class="card-link" data-toggle="collapse" href="#collapseOne">
							LICENCES
						</a>
					  </div>
					  <div id="collapseOne" class="collapse show" data-parent="#accordion">
						<div class="card-body">
						  <a href="liste.php?id='.$classroom[id].' " class="btn btn-warning">
							  Licence 1
						  </a>
						  <a href="" class="btn btn-warning">
							 Licence 2
						  </a>
						  <a href="" class="btn btn-warning">
							 Licence 3
						 </a>
						</div>
					  </div>
					</div>
					<div class="card">
					  <div class="card-header">
						<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
						MASTERS
					  </a>
					  </div>
					  <div id="collapseTwo" class="collapse" data-parent="#accordion">
						<div class="card-body">
							<a href="" class="btn btn-warning">
								Master 1
							</a>
							<a href="" class="btn btn-warning">
								Master 2							
							</a>
						</div>
					  </div>
					</div>
					<div class="card">
					  <div class="card-header">
						<a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
						  BTS
						</a>
					  </div>
					  <div id="collapseThree" class="collapse" data-parent="#accordion">
						<div class="card-body">
							<a href="" class="btn btn-warning">
								BTS 1
							</a>
							<a href="" class="btn btn-warning">
								BTS 2
							</a>
						</div>
					  </div>
					</div>
				  </div>
			</div>



	</div>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>