/* menu icon */
function menuIcon(x) {
    x.classList.toggle("change");
    $('body').toggleClass('overflowHidden');
    $(document).scrollTop(0);
    $('#menu').scrollTop(0);
    $('#menu').fadeToggle(200);
}

/* Phone Input Mask */
var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
onKeyPress: function(val, e, field, options) {
    field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

// Globals
window['globalSettings'] = {realTimeInterval: 1000,
                            defaultMoneyMask: "#.##0,00"
                        };