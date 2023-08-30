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

    //Para rescatar la imagen en caso de error
    //Se ejecuta cuando se inicializa dropzone
    init: function() {

        //Selecciona la imagen del name anterior, y llena los atributos de dropzone, solo se ejecuta cuando haya un name previo
        if(document.querySelector('[name="imagen"]').value.trim()) {
            const ImagenPublicada = {}; //Creacion de obj imagen
            ImagenPublicada.size = 1234; //atributo obligatorio, no importa el numero
            ImagenPublicada.name = document.querySelector('[name="imagen"]').value; //Tiene el valor de la imagen

            //opciones de dropzone
            this.options.addedfile.call(this,ImagenPublicada); 
            //Extraer la imagen de la carpeta para mostrarla   (solo asi me funciono lol)
            this.options.thumbnail.call(this, ImagenPublicada, '../../public/uploads/' + ImagenPublicada.name);

            ImagenPublicada.previewElement.classList.add("dz-success","dz-complete");

        }
    },
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
    document.querySelector('[name="imagen"]').value = response.imagen;

    /* mostrar alertas etc, cuando se sube */
});

//Eliminar el nombre/value de la imagen al eliminarlo en la interfaz
dropzone.on('removedfile',function() {
    document.querySelector('[name="imagen"]').value = "";
});

/*
dropzone.on('error',function(file,message) {
    console.log(message);
});

dropzone.on('removedfile',function() {
    console.log('Archivo eliminado');
});
*/