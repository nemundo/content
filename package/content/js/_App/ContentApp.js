import AppType from "../../framework/App/Type/AppType.js";
import ContentAppContainer from "./ContentAppContainer.js";

export default class ContentApp extends AppType {

    constructor() {

        super();

        this.app = "Content";
        this.appIcon = "search";
        this.appContainer = new ContentAppContainer();

    }

}