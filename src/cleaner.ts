document.addEventListener('DOMContentLoaded', () => {
    const oldMsg = document.querySelector('.msg') as HTMLDivElement || null;
    if (oldMsg) {
        console.log('MSG EXISTS', oldMsg);

        setTimeout( () => {
            oldMsg.remove();
            console.log('MSG REMOVED');
        },10000)
    } else {
        console.log('no msg found');
        return;
    }
});