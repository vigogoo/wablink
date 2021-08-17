<div id="search_main">


<input class="searchi" autocomplete="on"  type="text" placeholder="Search here..." value="" maxlength="70" class="" id="search_box" type="text" onkeyup="do_search()"  name="search" >


<div id="searchresults">
<div style="position: absolute; top: 0px; left: 0px; z-index: 1000; width: 100%; max-height: 400px; overflow: auto; background-color: #f9f9f9; display: none;" id="results"></div>
</div>
</div>

<style type="text/css">
	
/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
    
}	
</style>
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript">
function do_search(){ //alert("here we are");
         // getting the value that user typed
        var searchString    = $("#search_box").val();
    
        // forming the queryString
        var data            = 'search='+ searchString;
     
        

     
         
        // if searchString is not empty
        if(searchString) {    
            // ajax call
            $.ajax({
                type: "POST",
                url: "search_results.php",
                data: data,
                beforeSend: function(html) { // this happens before actual call
                    //$("#results").html(''); 
                    //alert("here");
                    $("#searchresults").show();
                    //$(".word").html(searchString);
               },
               success: function(html){ // this happens after we get results
                   //alert(html);
                $("#results").html('');
                    $("#results").show();
                    $("#results").append(html);
              }
            });    
        }
        return true;
}

</script>