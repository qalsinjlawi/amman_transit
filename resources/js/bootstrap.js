import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '2013e182d7448cc8663f',
    cluster: 'ap2',
    forceTLS: true,
});

window.Echo.channel('chat')
    .listen('message.sent', (event) => {
        console.log(event.message);
    });