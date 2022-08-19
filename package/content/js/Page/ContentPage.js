import BootstrapPage from "../../framework/Bootstrap/Page/BootstrapPage.js";
import ContentViewContainer from "../Com/Container/ContentViewContainer.js";

export default class ContentPage extends BootstrapPage {

    constructor(parentContainer) {

        super(parentContainer);
        this.pageTitle = "Content";
        this.pageIcon = "file-earmark";

    }


    render() {

        let container = new ContentViewContainer(this);
        container.render();

    }

}
