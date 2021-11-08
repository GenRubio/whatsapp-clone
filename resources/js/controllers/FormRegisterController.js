const Utils = require("../objects/Utils");

const FormRegisterController = {
    registerFormEl:{
        selector: "#register-form"
    },
    loginFormEl: {
        selector: "#login-form",
    },
    yesAccountButtonEl: {
        selector: ".yes-acount-button-js",
    },
    submitButtonEl: {
        selector: ".submit-register-button-js"
    },
    modalRegsiterEl: {
        selector: "#registerFormModal"
    },
    encryptMessageButtonEl:{
        selector: ".get-encrypt-message-js"
    },
    resultEncriptContainerEl:{
        selector: ".result-encription-container-js"
    },
    init() {
        if (!Utils.checkSection(this.registerFormEl.selector)) {
            return false;
        } else {
            this.setListeners();
        }
    },
    setListeners() {
        $(document).on('submit', this.registerFormEl.selector, (e) => {
            this.submitRegisterFormHandler(e);
        });

        $(document).on('click', this.encryptMessageButtonEl.selector, (e) => {
            this.getMessageEncrypted(e);
        });
    },
    getMessageEncrypted(e){
        $(this.resultEncriptContainerEl.selector).removeClass('d-none');
    },
    submitRegisterFormHandler(e){
        e.preventDefault();
        const $this = this;
        const item = $(e.currentTarget);
        this.blockSendButton(true);

        $.ajax({
            url: Utils.getUrl("homeRegister"),
            method: "POST",
            data: item.serialize(),
            success:function(data){
                if (data.success){
                    toastr.success(data.message);
                    $($this.modalRegsiterEl.selector).modal('hide')
                }
                else{
                    toastr.error(data.message);
                }
                $this.blockSendButton(false);
            }
        })
    },
    blockSendButton(success){
        if (success){
            $(this.submitButtonEl.selector).attr('disabled', true);
            $(this.submitButtonEl.selector).text('Cargando...');
        }
        else{
            $(this.submitButtonEl.selector).attr('disabled', false);
            $(this.submitButtonEl.selector).text('SING UP');
        }
    }
};

module.exports = FormRegisterController;