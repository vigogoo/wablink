

<!-- The overlay -->
<div id="myNav" class="overlay" style="overflow: hidden;">

  <!-- Button to close the overlay navigation -->
  <a style="z-index: 100" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <!-- Overlay content -->
  <div class="overlay-content" >
    <iframe id="overlay-data" style="border: 0px;" width="90%" height="90%"  border="0"></iframe>

  </div>

</div>

<!-- Use any element to open/show the overlay navigation menu -->


<style type="text/css">
/* The Overlay (background) */
.overlay {
    /* Height & width depends on how you want to reveal the overlay (see JS below) */    
    height: 100%;
    width: 0;
    position: fixed; /* Stay in place */
    z-index: 2000; /* Sit on top */
    left: 0;
    top: 0;
    background-color: #c41a5c; /* Black w/opacity */
    overflow-x: hidden; /* Disable horizontal scroll */
    transition: 0.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
}

/* Position the content inside the overlay */
.overlay-content {
    position: relative;
    top: 2%; /* 25% from the top */
    width: 100%; /* 100% width */
    text-align: center; /* Centered text/links */
    margin-top: 30px; /* 30px top margin to avoid conflict with the close button on smaller screens */
}

/* The navigation links inside the overlay */
.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #e0e0e0;
    display: block; /* Display block instead of inline */
    transition: 0.3s; /* Transition effects on hover (color) */
}

/* When you mouse over the navigation links, change their color */
.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}

/* Position the close button (top right corner) */
.overlay .closebtn {
    position: absolute;
    top: 3px;
    right: 20px;
    font-size: 60px;
}

/* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
@media screen and (max-height: 450px) {
    .overlay a {font-size: 20px}
    .overlay .closebtn {
        font-size: 40px;
        top: 15px;
        right: 35px;
    }
}   

</style>


<script type="text/javascript">
/* Open when someone clicks on the span element */
function openNav(link) { //alert(link); 

    var h = window.innerHeight;
    h=h*0.9;//height is 90% the actual height
    document.getElementById("overlay-data").height=h;


    document.getElementById("myNav").style.width = "100%";
    //document.getElementById("overlay-data").innerHTML='<object style="min-height:500px" width="100%" height="100%" type="text/html" data="'+link+'" ></object>';
   document.getElementById("overlay-data").src=link;
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    location.reload();//reload current page
    document.getElementById("myNav").style.width = "0%";
}   

</script>