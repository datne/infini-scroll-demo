 eData = [];
 var is_busy = false;
 var page = 0;
 var stopped = false;
 getData(eData,page);
 console.log(eData);
 $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                
                if (is_busy == true){
                        return false;
                }

                if (stopped == true){
                        return false;
                }

                var is_busy = true;               
                page++;
                getData(eData,page);
                console.log(eData);
        }

});

 function getData(eDataPr,page) {
        $("#loading").removeClass('hidden');
        $.ajax({
                type: "GET",
                url: "data.php",
                data:{eData : JSON.stringify(eDataPr),page:page},                    
                success: function(r) {
                        $("#loading").addClass('hidden');
                        is_busy = false;                       
                        if (r.length > 0) {
                            r = JSON.parse(r);
                            eData = eData.concat(r);                           
                            for (var i = 0; i < r.length; i++) {
                                // eData.push(r[i]);
                                $('#content').
                                append("<div class='col-sm-3'><h2>"+r[i].id+"</h2><img src='https://www.w3schools.com/bootstrap/cinqueterre.jpg' class='img-thumbnail' alt=''/></div>");
                        }       
                }else{
                        stopped = true;
                }
        },
        error: function(r) {
                console.log("Something went wrong!");
        }
});
        return false;;
}