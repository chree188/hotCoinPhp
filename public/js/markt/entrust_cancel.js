

$(".cancelEntrustBtc").on("click", function () {
    var id = $(this).data().fid;
    cancelEntrustBtc(this, id);
});


function cancelEntrustBtc(ele, id) {
    var url = "/trade/cny_cancel.html";
    var param = {
        id: id
    };
    var callback = function (data) {
        if (data.code == 200) {
            if (window.location.pathname.indexOf("cny_coin") >= 0) {
                $(ele).parents('tr').remove();
                alert('撤单成功');
            } else {
                alert('撤单成功');
                //window.location.reload(true);
                $(ele).parents('tr').remove();
            }
        }
    };
    util.network({url: url, param: param, success: callback});
}