var titleElement = document.querySelector('#editModalTitle');
var descriptionElement = document.querySelector('#editModalDescription');
var idElement = document.querySelector('#editID');
var idDeleteElement = document.querySelector('#deleteID');

function openModalEdit(id, title, description ){
    titleElement.value = title;
    descriptionElement.value = description;
    idElement.value = id;
}

function openModalDelete(id) {
    
    idDeleteElement.value = id;

}