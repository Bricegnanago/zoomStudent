<div class="searchbar mt-3 mb-5 animated bounceInRight" style="" >
    <div class="searchbar-query">
        <div class="searchbar-input-wrapper br-right">
            <i class="fas fa-search"></i> 
            <div class="searchbar-input">
                <input class="searchbar-input searchbar-query-input searchbar-query-input-opened valid" id="search_fil" placeholder="Quel(le) classe, Institut…" value="<?php echo (!empty($_SESSION['fil']) && strlen($_SESSION['fil']) < 8 && strlen($_SESSION['fil']) > 5)  ? $_SESSION['fil'] : 'lp3info' ; ?>">
            </div>
        </div>
    </div> 
                  
    <div class="searchbar-query">
        <div class="searchbar-input-wrapper">
            <i class="fas fa-user-graduate"></i>
            <div class="searchbar-input">
                <input class="searchbar-input searchbar-place-input" id="search" placeholder="Quel étudiants ?">
            </div>
            <button class="dl-button btn-icon Tappable-inactive searchbar-place-around-me-button  dl-button-size-normal"
                role="button" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="searchbar-place-around-me-icon">
                        <path d="M0 0h24v24H0z" fill="none"></path><path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm8.94 3c-.46-4.17-3.77-7.48-7.94-7.94V1h-2v2.06C6.83 3.52 3.52 6.83 3.06 11H1v2h2.06c.46 4.17 3.77 7.48 7.94 7.94V23h2v-2.06c4.17-.46 7.48-3.77 7.94-7.94H23v-2h-2.06zM12 19c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z">

                </path>
                </svg><i class="icon-dm-delete-form searchbar-place-around-me-clear"></i></button>
        </div>
    </div>
    <!-- <button class="br-btn Tappable-inactive dl-button-primary searchbar-submit-button dl-button dl-button-size-normal" 
        role="button" type="submit">
        <span class="dl-button-label">
            <span class="searchbar-submit-button-label">Rechercher</span> &nbsp;&nbsp;
            <i class="fas fa-chevron-right"></i>
        </span>
    </button>								 -->
</div>  