import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube tu imagen aquí',
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function (){
        if (document.querySelector('[name="imagen"]').value.trim()){
            const imgPublicada = {}
            imgPublicada.size = 1234
            imgPublicada.name = document.querySelector('[name="imagen"]').value

            this.options.addedfile.call(this, imgPublicada)
            this.options.thumbnail.call(this, imgPublicada, `/uploads/${imgPublicada.name}`)

            imgPublicada.previewElement.classList.add('dz-success', 'dz-complete')
        }
    }
});

dropzone.on('success', function(file, response){
    document.querySelector('[name="imagen"]').value = response.imagen
    console.log('Se subió correctamente...')
});

dropzone.on('removedfile', function(){
    document.querySelector('[name="imagen"]').value = ""
    console.log('Archivo eliminado...')
});