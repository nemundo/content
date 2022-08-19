import ViewContainer from "../../../framework/Com/View/ViewContainer.js";

export default class ContentAdmin extends ViewContainer {

    contentType;


    NEW_VIEW = 10;

    ITEM_VIEW = 20;




    render() {

        this.addHomeView();
        this.addView(this.ITEM_VIEW);

        let homeView=this.showHomeView();


        let search = this.contentType.getSearch();






    }








}