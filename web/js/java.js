$(document).on('ready', function () {

    $('.each_student').on('click', function (event) {
        event.preventDefault();

        $('.student_name').toggle(400);

    });


    $('#adminmenu').on('click', function (event) {
        event.preventDefault();
        $('.logreg').toggle(2000);
        $('.adminreg').toggle(2000);
        $( "#adminmenu" ).toggleClass( 'blue' );
    });

    var myTextEl = document.getElementById( 'td' );
    myTextEl.innerHTML = Autolinker.link( myTextEl.innerHTML );

});
