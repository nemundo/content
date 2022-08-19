import ActionView from "../../../Action/ActionView.js";
import LogTable from "../Com/LogTable.js";


export default class LogActionView extends ActionView {

    render() {

        let table = new LogTable(this);
        table.content = this.contentId;
        table.render();


    }

}