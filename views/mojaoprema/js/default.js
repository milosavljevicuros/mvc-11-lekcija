$(function() {
    
    $.get('mojaoprema/xhrPrikazi', function(o) {
        
        for (var i = 0; i < o.length; i++)
        {   //console.log(o[i].opremaid);
            $('#listInserts').append('<div>' + o[i].ime + '<a class="del" rel="'+o[i].opremaid+'" href="#">X</a></div>');
        }
        
        $('.del').live('click', function() {
            delItem = $(this);
            var opremaid = $(this).attr('rel');
            
            $.post('mojaoprema/xhrObrisi', {'opremaid': opremaid}, function(o) {
                delItem.parent().remove();
            }, 'json');
            
            return false; 
        });
        
    }, 'json');
    
    
    $('#randomInsert').submit(function() {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.post(url, data, function(o) {
            $('#listInserts').append('<div>' + o.ime + '<a class="del" rel="'+ o.opremaid +'" href="#">X</a></div>');        
        }, 'json');
        
        
        return false;
    });

});