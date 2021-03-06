$(document).ready(function() {
    $("#content").find("[id^='tab']").hide(); // Hide all content
    // $("#tabs li:first").attr("id","current"); // Activate the first tab
    $("#tabs li").each(function(){
      if($(this).attr("id") == "current") {
        var tab_curr = "#" + $(this).find("a").attr("name");
        $("#content " + tab_curr).fadeIn();
        return;
      }
    });
    
    $('#tabs a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return;       
        }
        else{             
          $("#content").find("[id^='tab']").hide(); // Hide all content
          $("#tabs li").attr("id",""); //Reset id's
          $(this).parent().attr("id","current"); // Activate this
          $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
        }
    });
});