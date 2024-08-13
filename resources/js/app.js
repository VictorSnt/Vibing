import './bootstrap';
import { Notifier } from './notification';


window.addEventListener('alert::show', (e) => {
    const [eventData] = e.detail;
    const notifier = new Notifier();
    notifier.alert.fire(
        eventData
    )
});

window.addEventListener('notify::show', (e) => {
    const [eventData] = e.detail;
    const notifier = new Notifier();
    notifier.notification.fire(
        eventData
    )
});

window.addEventListener('dialog::show', (e) => {
    const [eventData] = e.detail;
    const returnEventName = eventData.returnEventName;
    delete eventData.returnEventName;
    const notifier = new Notifier();
    notifier.alert.fire(
        eventData
    ).then(result => {
        if (result.isConfirmed) {
            const customEvent = new CustomEvent(returnEventName);
            window.dispatchEvent(customEvent);
        }
    })
});

