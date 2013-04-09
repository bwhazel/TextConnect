/* 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Title : open.js
Author : Bobby Hazel
Description : Loads wookmark plugin for masonry type layout
 - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
*/

$(document).ready(new function() {
   
    $('#main').imagesLoaded(function(){
        // Prepare layout options.
        var options = {
            autoResize: true, // This will auto-update the layout when the browser window is resized.
            container: $('#main'), // Optional, used for some extra CSS styling
            offset: 27, // Optional, the distance between grid items
            itemWidth: 210 // Optional, the width of a grid item
        };

        // Get a reference to your grid items.
        var handler = $('#tiles li');

        // Call the layout function.
        handler.wookmark(options);

    });

    //Adds tile options on hover
    $('#tiles li').on({
        hover: function() {
            var buttonDiv = $(this).children('.btn-list');
            buttonDiv.fadeToggle("fast");
        }
    });
});
