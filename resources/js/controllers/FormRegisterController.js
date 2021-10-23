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
    init() {
        if (!Utils.checkSection(this.registerFormEl.selector)) {
            return false;
        } else {
            this.setListeners();
        }
    },
    setListeners() {
        $(document).on("click", this.yesAccountButtonEl.selector, (e) => {
            this.openLoginFormHandler();
        });
        
        $(document).on('submit', this.registerFormEl.selector, (e) => {
            this.submitRegisterFormHandler(e);
        });
    },
    submitRegisterFormHandler(e){
        e.preventDefault();
        const item = $(e.currentTarget);
        this.blockSendButton(true);

        $.ajax({
            url: Utils.getUrl("homeRegister"),
            method: "POST",
            data: item.serialize(),
            success:function(data){
                if (data.success){
                    toastr.success(data.message);
                    FormRegisterController.openLoginFormHandler();
                }
                else{
                    toastr.error(data.message);
                }
                FormRegisterController.blockSendButton(false);
            }
        })
    },
    openLoginFormHandler(){
        $(this.registerFormEl.selector).addClass('d-none');
        $(this.loginFormEl.selector).removeClass('d-none');
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