export default class ActionCollection {

    static _actionList = [];

    addAction(action) {

        ActionCollection._actionList.push(action);
        return this;

    }


    getActionList() {

        return ActionCollection._actionList;

    }


}