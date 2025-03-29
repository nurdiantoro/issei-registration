(() => {

    const password = document.getElementById('password');
    const togglePasswordOn = document.getElementById('togglePasswordOn');
    const togglePasswordOff = document.getElementById('togglePasswordOff');

    togglePasswordOn.addEventListener('click', () => {
        console.log('ON Clicked');
        password.type = 'text';
        togglePasswordOn.classList.toggle("hidden");
        togglePasswordOff.classList.toggle("hidden");
    })

    togglePasswordOff.addEventListener('click', () => {
        console.log('OFF Clicked');
        password.type = 'password';
        togglePasswordOn.classList.toggle("hidden");
        togglePasswordOff.classList.toggle("hidden");
    })
})();
