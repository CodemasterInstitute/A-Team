<?php

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php";

    print
    '<div class="row">
        <div class="col-0 col-md-1 col-lg-2 aside-left">

        
    
    

    </div>
        <div class="col-12 col-md-10 col-lg-8 middle">
            <div class="row">
                <div class="col-12">
                    <h3>Members/Index</h3>
                </div>
                <div class="col-3">';
                
                include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/memdash.php";
                
                print
                '</div>
            </div>
        </div>
        <div class="col-0 col-md-1 col-lg-2 aside-right">

        </div>
    </div>';

    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php"; 

?>