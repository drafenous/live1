/* menu icon */
function menuIcon(x) {
    x.classList.toggle("change");
    $('body').toggleClass('overflowHidden');
    $(document).scrollTop(0);
    $('#menu').scrollTop(0);
    $('#menu').fadeToggle(200);
}