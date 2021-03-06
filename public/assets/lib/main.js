(function(undefined) {
    "use strict";
    function Q(el) {
        if (typeof el === "string") {
            var els = document.querySelectorAll(el);
            return typeof els === "undefined" ? undefined : els.length > 1 ? els : els[0];
        }
        return el;
    }
    var play = Q("#play"),
    args = {
        resultFunction: function(res) {
            $('#barcode').val('');
            $('.notify').text('Wait..');
            var id = res.code;
            $.post('check',{
                id:id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },function(response){
                    if(response == 'Ok')
                        $('#barcode').val(id);
                    $('.notify').text(response);                
            });
        }
        
    };
    var decoder = new WebCodeCamJS("#webcodecam-canvas").buildSelectMenu("#camera-select", "environment|back").init(args);
    play.addEventListener("click", function() {
        decoder.play();
    }, false);
  
    document.querySelector("#camera-select").addEventListener("change", function() {
        if (decoder.isInitialized()) {
            decoder.stop().play();
        }
    });
}).call(window.Page = window.Page || {});