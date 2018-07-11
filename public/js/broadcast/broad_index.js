
detailFocus()
function detailFocus(){
    var lists = $('.hc-list-data-ul').find('a');
    var win_href = window.location.href;
    $(lists).each(function(index,item){
        if(win_href==$(item).attr('href')){
            $(item).css("color",'#EA5B25')
        }
    })
}