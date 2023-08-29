import Dropzone from "dropzone";

Dropzone.autoDiscover = false; //Busca por defecto un elemento con clase dropzone
                               //lo ponemos en falso porque nosotros le asignaremos al ruta y eso

                               
//Configuracion de dropzone
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,
})

/* Eventos de dropzone */

/*
dropzone.on('sending', function(file,xhr,formData) {
    console.log(file);
});
*/

dropzone.on('success',function(file,response) {
    console.log(response.imagen); //imprime el nombre del archivo al subirse

    //asignamos ese nombre, al elemento que esta oculto en create.blade.php
    //ya que necesitamos el nombre del archivo que se genera para poder enviarlo por post a su controlador
    Document.querySelector('[name="imagen"]').value = response.imagen;

    /* mostrar alertas etc, cuando se sube */
});

/*
dropzone.on('error',function(file,message) {
    console.log(message);
});

dropzone.on('removedfile',function() {
    console.log('Archivo eliminado');
});
*/