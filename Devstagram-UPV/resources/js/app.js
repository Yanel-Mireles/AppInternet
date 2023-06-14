//configuracion de dropzone

import Dropzone from 'dropzone';
Dropzone.autoDiscover = false;
const dropzone = new Dropzone ('#dropzone',{
    dictDefaultMessage: "Sube tu imagen aqui",
    acceptedFiles:".png,.jpg,.jpeg,.gif",
    addRemoveLinks:true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,
    //trabajando con imagen en el contenedor de dropzone
    init: function(){
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imagenPublicada = {};
            imagenPublicada.size =1234
            imagenPublicada.name= document.querySelector('[name="imagen"]').value;
            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada,'/uploads/{$imagenPublicada}');
            imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
        }

    },
});

//eventos del dropzone
// dropzone.on("sending", function(file,xhr,formdata){
//     console.log(file);
// });

//evento de envio correo de imagen
dropzone.on('success', function(file,response){
    //console.log(response);
    document.querySelector('[name="imagen"]').value=response.imagen;
});
//envio cuando hay error
dropzone.on('error', function(file,message){
    console.log(message);
});
//remover un archivo
dropzone.on('removedfile', function(){
    console.log('El archivo se elimino');
});

dropzone.on('removedfile', function(){
    document.querySelector(['name="imagen"]']).value='';
});