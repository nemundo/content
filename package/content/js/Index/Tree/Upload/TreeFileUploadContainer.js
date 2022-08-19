import ServiceFileUpload from "../../../../framework/Com/Upload/ServiceFileUpload.js";


export default class TreeFileUploadContainer extends ServiceFileUpload {


    //parentId=null;

    constructor(parentContainer) {

        super(parentContainer);
        this.serviceName = "tree-file-upload";

    }

    /*set parent(value) {
        this.addPara
    }*/

}