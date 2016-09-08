var arrayPrice = [];

function loadprice(inp) {
    $obj = $(inp);

    if ($obj.prop('checked')) {
        arrayPrice.push(inp.value);
    } else {
        unset(inp.value, 1)

    }
    loadlistajx();
    // appel de la fonction js

}
function loadlistajx(){
    $.ajaxSetup({async: false});
    $(".last").remove();

    price=$('#ex2').val();
    $.ajax({
        type: "POST",
        url: urlajx,
        data: "price="+price+"&category="+arrayCategory,
        success: function(msg){
            $("#shows").html(msg);
            $(".jscroll-added").remove();
           // console.log(msg)
        }
    });
}
function loadcategory(link, val) {
    $obj = $("#" + link);
    if ($obj.attr('style') == '' || $obj.attr('style')=='text-decoration:none') {
        $obj.attr('style', 'color:#E10079; text-decoration:none');
        arrayCategory.push(val);
    } else {
        $obj.attr('style', 'text-decoration:none');
        unset(val, 2)
    }
    loadlistajx();

}
function unset(val, type) {
    if (type == 1) {
        for (var key in arrayPrice) {
            if (arrayPrice[key] == val) {
                arrayPrice.splice(key, 1);
            }
        }
    }
    if (type == 2) {
        for (var key in arrayCategory) {
            if (arrayCategory[key] == val) {
                arrayCategory.splice(key, 1);
            }
        }
    }
}