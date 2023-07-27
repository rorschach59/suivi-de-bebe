import './bootstrap';
import 'flowbite';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

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

let channel = window.Echo.channel('refresh-application');
channel.listen('.refresh-application', function(data) {
    console.log(JSON.stringify(data))
    Livewire.emit('render');
});
