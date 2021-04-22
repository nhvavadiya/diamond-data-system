function print_today() {
    // ***********************************************
    // AUTHOR: WWW.CGISCRIPT.NET, LLC
    // URL: http://www.cgiscript.net
    // Use the script, just leave this message intact.
    // Download your FREE CGI/Perl Scripts today!
    // ( http://www.cgiscript.net/scripts.htm )
    // ***********************************************
    var now = new Date();
    var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
    var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
    function fourdigits(number) {
        return (number < 1000) ? number + 1900 : number;
    }
    var today =  months[now.getMonth()] + " " + date + ", " + (fourdigits(now.getYear()));
    return today;
}

// from http://www.mediacollege.com/internet/javascript/number/round.html
function roundNumber(number,decimals) {
    var newString;// The new rounded number
    decimals = Number(decimals);
    if (decimals < 1) {
        newString = (Math.round(number)).toString();
    } else {
        var numString = number.toString();
        if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
            numString += ".";// give it one at the end
        }
        var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
        var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
        var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
        if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
            if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
                while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
                    if (d1 != ".") {
                        cutoff -= 1;
                        d1 = Number(numString.substring(cutoff,cutoff+1));
                    } else {
                        cutoff -= 1;
                    }
                }
            }
            d1 += 1;
        }
        if (d1 == 10) {
            numString = numString.substring(0, numString.lastIndexOf("."));
            var roundedNum = Number(numString) + 1;
            newString = roundedNum.toString() + '.';
        } else {
            newString = numString.substring(0,cutoff) + d1.toString();
        }
    }
    if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
        newString += ".";
    }
    var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
    for(var i=0;i<decimals-decs;i++) newString += "0";
    //var newNumber = Number(newString);// make it a number if you like
    return newString; // Output the result to the form field (change for your purposes)
}

function updateCaratTotal() {
    var caratTotal1 = 0;
    $('.qty').each(function(i){
        caratQty = $(this).val();
        if (!isNaN(caratQty)) caratTotal1 += Number(caratQty);
    });
    caratTotal1 = roundNumber(caratTotal1,2);
    $('#total-carat').html(caratTotal1);
    $('#total-carat-value').val(caratTotal1);
}

function getBranch() {
    $.ajax({
        type: "GET",
        url:'getbranch',
        success: function(data) {
            var branch = data.branch;
            var option = '';
            if(data.status == true) {
                $.each(branch, function (key, index) {
                    option += '<option'+index.id+'>'+index.name+'</option>';
                    // reportData += index.reportname+', ';
                });

                $('#branch').html(option);
            } else {
              
            }
        }
    });
}

function update_total() {
    var total = 0;
    $('.price').each(function(i){
        price = $(this).html().replace("$","");
        if (!isNaN(price)) total += Number(price);
    });
    total = roundNumber(total,2);
    $('#subtotal').html(total);
    $('#total').html(total);

    updateCaratTotal();
    update_balance();
}

function update_balance() {
    var due = $("#total").html().replace("$","") - $("#paid").val().replace("$","");
    due = roundNumber(due,2);

    $('.due').html(due);
    $('#total-due-value').val(due);
}

function update_price() {
    var row = $(this).parents('.item-row');
    var price = row.find('.cost').val().replace("$","") * row.find('.qty').val();
    price = roundNumber(price,2);
    isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html(price);
    isNaN(price) ? row.find('.final_amt').val("0") : row.find('.final_amt').val(price);
    update_total();
}

function bind() {
    $(".cost").blur(update_price);
    $(".qty").blur(update_price);
}

var giaArray = [];
var noGiaArray = [];
$(document).ready(function() {
    $('input').click(function(){
        $(this).select();
    });

    $("#paid").blur(update_balance);

    // $("#addrow").click(function(){
    //     var giaTypeVal = $("#add_gia").val();
    //     var addGiaDetails = $("#add_gia_details").val();
    //     if (giaTypeVal && addGiaDetails) {
    //         var carat = $("#add_gia_details").find(':selected').attr('data-carat');
    //         if (typeof carat === "undefined") {
    //             carat = 0;
    //         }
    //         var pcs = $("#add_gia_details").find(':selected').attr('data-pcs');
    //         if (typeof pcs === "undefined") {
    //             pcs = 0;
    //         }
    //         var giaTypeName = (giaTypeVal == 1) ? 'Gia' : 'No Gia';
    //         var giaId = $("#add_gia_details").find(':selected').attr('data-id');
    //         if (giaTypeVal == 1) {
    //             if ($.inArray(parseInt(giaId), giaArray) != -1) {
    //                 return;
    //             }
    //         }
    //         if (giaTypeVal == 2) {
    //             if ($.inArray(parseInt(giaId), noGiaArray) != -1) {
    //                 return;
    //             }
    //         }

    //         (giaTypeVal == 1) ? giaArray.push(parseInt(giaId)) : noGiaArray.push(parseInt(giaId));
    //         // $(".item-row").length;
    //         $(".item-row:last").after('<tr class="item-row">\n' +
    //             '<td class="item-name text-center"><input type="checkbox" name="record" data-id="'+ giaId +'"  data-type="'+giaTypeVal+'" ></td>\n' +
    //             '<td class="item-name"> '+ $(".item-row").length +'</td>\n' +
    //             '<td class="item-name">'+
    //             '<select name="branch" id="branch"></select>'+
    //             '</td>\n' +
    //             '<td class="description"><input type="hidden" name="gia_type[]" readonly value="'+giaTypeVal+'"> '+giaTypeName+'</td>\n' +
    //             '<td class="description"><input type="text" name="gia_details[]" readonly value="'+addGiaDetails+'"></td>\n' +
    //             '<td class="description"><input type="text" name="pcs[]" required value="'+pcs+'"></td>\n' +
    //             '<td><input type="text" class="qty allownumericwithdecimal" name="carat[]" required value="'+carat+'"></td>\n' +
    //             '<td class="text-right"><input type="text" name="unit_price[]"  required class="cost allownumericwithdecimal" value="00"></td>\n' +
    //             '<input type="hidden" name="final_amt[]" class="final_amt" value="0">\n' +
    //             '<input type="hidden" name="gia_id[]" class="gia_id" value="'+giaId+'">\n' +
    //             '<td class="text-right"><span class="price"">00.00</span></td>\n' +
    //             '</tr>');
    //         if ($(".delete").length > 0) $(".delete").show();
    //         bind();
    //         updateCaratTotal();
    //         // $("#add_gia_details").find(':selected').remove();
    //     }

    //     getBranch();
    // });

    bind();

    $(".delete-row").click(function(){
        $("table tbody").find('input[name="record"]').each(function(){
            if($(this).is(":checked")){
                $(this).parents("tr").remove();
                update_total();
                // Find & Remove value from giaArray or noGiaArray
                var dataId = $(this).attr('data-id');
                var dataType = $(this).attr('data-type');
                if (dataType == 1) {
                    giaArray = jQuery.grep(giaArray, function(value) {
                        return value != dataId;
                    });
                }
                if (dataType == 2) {
                    noGiaArray = jQuery.grep(noGiaArray, function(value) {
                        return value != dataId;
                    });
                }
            }
        });
    });

    $("#date").val(print_today());

});
