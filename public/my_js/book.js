$(document).on('click', '.order_book', function () {
    let room_id= $(this).val();
    // alert(room_id);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}",
        },
         url:'/room/order_for_book',
        method: "GET",
        data:{room_id:room_id},


    }).done(function(data) {
        $('#order_for_book').html(data.book_rooms);
        var calendarEl = document.getElementById('calendar');


        let events = [];
        for (let i = 0; i < data.book.length; i++) {
            events.push({
                id:data.book[i].room_id ,
                  title: 'Busy',
                start:data.book[i].start,
                end:data.book[i].end+"T23:59:00",
            })
        }
        $(document).ready(function() {
            $('.book').on('click', function () {
                // let busy_date=data.book;
                let user_name= $('#user_name').val();
                let user_email= $('#user_email').val();
                let user_phone= $('#user_phone').val();
                let check_in= $('#check_in').val();
                let check_out= $('#check_out').val();


                let book= confirm('Are you sure you want book this room where check in -' +check_in+ ' '+ 'check out-' + check_out );

                if(book){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}",
                        },
                        url:'/book',
                        method: "GET",
                        data:{room_id:room_id,user_name:user_name,user_email:user_email,user_phone:user_phone,check_in:check_in,check_out:check_out},
                    }).done(function(data) {

                        // console.log(data.my);

                        if ($.isEmptyObject(data.book_error)) {
                            if ($.isEmptyObject(data.error)) {
                                $(".print-error-msg").find("ul");
                                $(".print-error-msg").css('display', 'block');
                                calendar.addEvent({
                                    title: 'You Book this days',
                                    start: check_in,
                                    end: check_out+"T23:59:00",
                                    allDay: false
                                });
                                alert(data.success);

                            } else {
                                printErrorMsg(data.error);
                            }

                        } else {
                            printError(data.book_error);
                        }

                    });
                    function printErrorMsg (msg) {
                        $(".print-error-msg").find("ul").html('');
                        $(".print-error-msg").css('display','block');
                        $.each( msg, function( key, value ) {
                            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                        });
                    }  function printError (msg) {
                        $(".print-error-msg").find("ul").html('');
                        $(".print-error-msg").css('display','block');
                        $(".print-error-msg").find("ul").append('<li>'+msg+'</li>');

                    }

                }


            });

        });


        var calendar = new FullCalendar.Calendar(calendarEl, {

            plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list'],
            // header: {
            //     center: 'addEventButton'
            // },
            initialView: 'timeGridWeek',
            events: events,
            // eventColor: '#378006',
             displayEventTime: false,
        });
        calendar.render();
    });

});