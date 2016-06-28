$(document).ready(function(){

    function getRandomPosition(element) {
        var x = 400;
        var y = 400;
        var randomX = Math.floor(Math.random()*x+50);
        var randomY = Math.floor(Math.random()*y-200);
        return [randomX,randomY];
    }
    window.onload = function() {
        
        var liDecorate = document.getElementsByClassName('container');
        for (i=0; i<liDecorate.length; i++) {
            liDecorate[i].setAttribute("style", "position:absolute;");
            var xy = getRandomPosition(liDecorate[i]);
            liDecorate[i].style.top = xy[0] + 'px';
            liDecorate[i].style.right = xy[1] + 'px';
        }  
    }
    $(".formBox").on("submit", function () {
        var liDecorate = document.getElementsByClassName('container');
        for (i=0; i<liDecorate.length; i++) {
            liDecorate[i].setAttribute("style", "position:absolute;");
            var xy = getRandomPosition(liDecorate[i]);
            liDecorate[i].style.top = xy[0] + 'px';
            liDecorate[i].style.right = xy[1] + 'px';
        }  
    });

    $( ".bulb" ).hover(
        function() {
            $( this ).parent('.container').find('.feedback').css("display", "block");
            $( this ).parent('.container').css("z-index", 4);
        }, function() {
            $( this ).parent('.container').find('.feedback').css("display", "none");
            $( this ).parent('.container').css("z-index", 1);
        }
    );

});