document.addEventListener('DOMContentLoaded', function () {
    // Initialize all input of type date
    var calendars = bulmaCalendar.attach('.art-bar', {
        // type: 'datetime'
        weekStart: '1',
        disabledWeekDays: '1,2,3,4,5,6',
        showHeader: 'false',
        // disabledDates: ['12/19/2022', '12/26/2022'],
        startDate: '01/01/2022',
        endDate: '01/01/2023'

    });

    // Loop on each calendar initialized
    for(var i = 0; i < calendars.length; i++) {
        // Add listener to date:selected event
        calendars[i].on('select', date => {
            console.log(date);
        });
    }

    // To access to bulmaCalendar instance of an element
    var element = document.querySelector('#my-element');
    if (element) {
        // bulmaCalendar instance is available as element.bulmaCalendar
        element.bulmaCalendar.on('select', function(datepicker) {
            console.log(datepicker.data.value());
        });
    }
});

var bulmaCalendar=require('bulma-calendar');
