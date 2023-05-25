requirejs(['lib/framework', 'app/config', 'app/api'],
function () {
    print(`Tutaj będzie frontend,
        backend z którym trzeba się połączyć to <a href='${serverAddress}'>${serverAddress}</a>`);
});
