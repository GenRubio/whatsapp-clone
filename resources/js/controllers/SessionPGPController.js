const Utils = require("../objects/Utils");

const SessionPGPController = {
    chatPageEl: {
        selector: "#chat-page",
    },
    keysModalEl:{
        selector: "#userPrivateKeys"
    },
    saveKeysFormEl:{
        selector: "#save-session-private-keys"
    },
    init() {
        if (!Utils.checkSection(this.chatPageEl.selector)) {
            return false;
        } else {
            this.setListeners();
            this.launchModal();
        }
    },
    setListeners(){
        $(document).on('submit', this.saveKeysFormEl.selector, (e) => {
            this.savePrivateKeysHandler(e);
        });
    },
    savePrivateKeysHandler(e){
        e.preventDafult();
        const $this = this;
        const item = $(e.currentTarget);

        $.ajax({
            url: Utils.getUrl('savePrivateKeys'),
            method: "POST",
            data: item.serialize(),
            success:function(data){
                if (data.success){
                    toastr.success(data.message);
                    $$($this.keysModalEl.selector).modal('hide');
                }
                else{
                    toastr.error(data.message);
                }
            }
        })
    },
    launchModal(){
        if (!window.privateKey && !window.privateKeyPassword){
            $(this.keysModalEl.selector).modal('show');
        }
    }
};

module.exports = SessionPGPController;