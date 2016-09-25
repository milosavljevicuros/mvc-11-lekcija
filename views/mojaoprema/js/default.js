$(function() {
    
    $.get('mojaoprema/xhrPrikazi', function(o) {
        
        for (var i = 0; i < o.length; i++)
        {   //console.log(o[i].opremaid);
            $('#listInserts').append('<div>' + o[i].ime + '&nbsp&nbsp&nbsp&nbsp<a class="del" rel="'+o[i].opremaid+'" href="#"> Obrisi </a>&nbsp&nbsp&nbsp&nbsp<a class="conn" rel="'+o[i].opremaid+'" href="#"> Connect</a><span class="reply" rel="'+o[i].opremaid+'" style="padding-right:4px; padding-top: 4px; ;display:inline-block;><img src="f" alt="nema slike" style="width:30px;height:30px;"></span></div>');
        }
        
        $('.del').live('click', function() {
            delItem = $(this);
            var opremaid = $(this).attr('rel');
            $.post('mojaoprema/xhrObrisi', {'opremaid': opremaid}, function(o) {
                delItem.parent().remove();
            }, 'json');
            
            return false; 
        });
        $('.conn').live('click', function() {
            //delItem = $(this);
            var opremaid = $(this).attr('rel');
            //$('span.reply[rel='+opremaid+']').attr('src','/mvc-11-lekcija/public/images/spin.gif');
            $.post('mojaoprema/xhrKonektuj', {'opremaid': opremaid}, function(o) {
                //console.log(o);
                //console.log("conected");
                $('span.reply[rel='+opremaid+']').text(o[opremaid]);
                //
            }, 'json');
          
            return false; 
        });        
        
    }, 'json');
    
    
    $('#randomInsert').submit(function() {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.post(url, data, function(o) {
            $('#listInserts').append('<div>' + o.ime + '&nbsp&nbsp&nbsp&nbsp<a class="del" rel="'+ o.opremaid +'" href="#"> Obrisi </a>&nbsp&nbsp&nbsp&nbsp<a class="conn" rel="'+ o.opremaid +'" href="#"> Connect</a><span class="reply" rel="'+o.opremaid+'"></span></div>');        
        }, 'json');
        
        return false;
    });

});