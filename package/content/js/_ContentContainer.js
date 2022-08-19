import DocumentContainer from "../html/Document/Document.js";
import BodyContainer from "../html/Document/Body.js";
import AdminRow from "../framework/Layout/AdminRow.js";
import AdminColumn from "../framework/Layout/AdminColumn.js";
import ContentTable from "./ContentTable.js";
import Debug from "../core/Debug/Debug.js";
import FavoriteAction from "../content_app/Favorite/Favorite.js";
import FavoriteTable from "../content_app/Favorite/FavoriteTable.js";
import AdminButton from "../framework/AdminButton.js";
import ServiceRequest from "../framework/Service/ServiceRequest.js";
import ImageUrlForm from "../content_app/File/ImageUrlForm.js";
import ImageTable from "../content_app/File/ImageTable.js";


let document = new DocumentContainer();
document.title = "Content Test";

let body = new BodyContainer();


//(new ImageUrlForm(body)).render();

let table = new ImageTable(body);  //)->render();
table.render();




/*

let btn = new AdminButton(body);
btn.label = "New";
btn.onClick = function () {


    let service = new ServiceRequest();
    service.service = "favorite-list";
    //service.addParameter("content",contentId);

    //(new Debug()).write(service._data.entries());

/*    for(var pair of service._data.entries()) {
        console.log(pair[0]+ ' = '+ pair[1]);
    }*/

/*
    service.onItem=function (item) {
        (new Debug()).write(item.subject);
    };

    service.sendRequest();
    service.onFinished = function () {
        (new Debug()).write("finished");
    };




    /*
    (new Debug()).write("favorite");

    let favorite = new FavoriteAction();
    favorite.saveFavorite(110);*/

//};





/*
let row = new AdminRow(body);

let col1 = new AdminColumn(row);
let col2 = new AdminColumn(row);


let favoriteTable = new FavoriteTable(col2);
favoriteTable.render();

*/




/*
let table = new ContentTable(col1);
table.editIcon = true;
table.deleteIcon = false;
table.paginationLimit = 200;


table.onItemClick = function (id) {

    /*(new Debug()).write("item"+id);

    let img = new AdminImage();
    img.src= "https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Space_Shuttle_Columbia_launching.jpg/600px-Space_Shuttle_Columbia_launching.jpg";

    (new AdminModal()).show(img);*/

/*
};


table.onEditClick = function (id) {

    (new Debug()).write("edit" + id);
    (new FavoriteAction()).saveFavorite(id);


};


table.onDeleteClick = function (id) {
    (new Debug()).write("delete" + id);
};


table.loadTable(0);


//new DeleteIcon(body);


/*
let icon = new IconContainer(body);
icon.icon = "edit";

let icon2 = new IconContainer(body);
icon2.icon = "trash";*/

/*
let row = new AdminRow(body);
row.addCssClass("nemundo-height-100");

let col1 = new AdminColumn(row);
col1.addCssClass("menu-left");


/*
let video = new VideoPlayer(col1);
video.videoUrl = "/web/data/file_image/image/auto_1200/dbc116d6-aa74-43eb-be11-8aacca21e838.mov";
*/


/*
let btn = new AdminButton(col1);
btn.label = "New";
btn.onClick = function () {


    /*let img = new AdminImage();
    img.src= "https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Space_Shuttle_Columbia_launching.jpg/600px-Space_Shuttle_Columbia_launching.jpg";
    img.addCssClass("nemundo-width-100");*/

/*    let modal =new AdminModal();
    modal.modalTitle = "Image";

    modal.onClose=function() {
        (new Debug()).write("close");
        table.loadTable(0);
    };

    //modal.show(new ImageContentForm());
    modal.show(new TextContentForm());

};


let table = new ContentTable(col1);


table.onContentClick=function (content) {

    (new Debug()).write(content);

};

table.loadTable(0);



let col2 = new AdminColumn(row);
col2.addCssClass("nemundo-height-100");


let div = new DivContainer(col2);
//div.addCssClass("nemundo-blue");
div.addCssClass("nemundo-width-100");
div.text="hello";


/*
let img = new AdminImage(body);
img.src= "https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Space_Shuttle_Columbia_launching.jpg/600px-Space_Shuttle_Columbia_launching.jpg";
img.addCssClass("nemundo-width-100");
*/


/*
let input=new AdminTextBox(body);
input.label="Number";
input.value=1;


let btn = new AdminButton(body);
btn.label = "New";
btn.onClick = function () {
    document.title = "New";

    document.changeUrl("test?id="+input.value);

};


 */




