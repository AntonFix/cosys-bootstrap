<template>

    <div>

        <FullCalendar :options="calendarOptions"/>

    </div>

</template>

<script>

import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import nlLocale from '@fullcalendar/core/locales/nl';
import momentTimezonePlugin from '@fullcalendar/moment-timezone';

export default {

    components: {
        FullCalendar // make the <FullCalendar> tag available
    },

    data() {

        return {
            calendarOptions: {
                plugins: [dayGridPlugin, interactionPlugin, momentTimezonePlugin],
                locale: nlLocale,
                timeZone: 'Europe/Brussels',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay,dayGridYear'
                },
                weekNumbers: true,
                themeSystem: 'bootstrap5',
                initialView: 'dayGridMonth',
                events: '/json/calendar-appointments.json',
                dateClick: this.handleDateClick,
                firstDay: 1,
                eventTimeFormat: { // like '14:30:00'
                    hour: '2-digit',
                    minute: '2-digit'
                }
            }
        }
    },

    methods: {
        handleDateClick: function (arg) {
            alert('date click! ' + arg.dateStr)
        }
    }
}

</script>
