import './bootstrap';
import 'flowbite';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import {Modal} from 'flowbite';

import.meta.glob([
    '../images/**'
]);

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});

let channel = window.Echo.channel(import.meta.env.VITE_PUSHER_CHANNEL);
channel.listen('.refresh-application', function (data) {
    console.log(JSON.stringify(data))
    Livewire.emit('refreshApplication');
});

const updateReminderModal = document.getElementById('updateReminderModal');
const modal = new Modal(updateReminderModal);
const reminder = document.getElementById('reminderTextarea');
const closeModal = document.getElementById('closeModal');

if(reminder !== null) {
    reminder.addEventListener("click", event => {
        modal.show();
    })
}

if(closeModal !== null) {
    closeModal.addEventListener("click", event => {
        modal.hide();
    })
}
