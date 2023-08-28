import Dropzone from "dropzone";

Dropzone.autoDiscover = false; //Busca por defecto un elemento con clase dropzone
                               //lo ponemos en falso porque nosotros le asignaremos al ruta y eso

                               
//Configuracion de dropzone
const dropzone = new Dropzone('dropzone', {
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,
})