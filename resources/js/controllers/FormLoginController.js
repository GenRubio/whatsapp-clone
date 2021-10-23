const Utils = require('../objects/Utils');

const FormLoginController = {
    loginFormEl: {
        selector: "#validation-form"
    },
    init(){
        if (!Utils.checkSection(this.loginFormEl.selector)) {
            return false;
          } else {
            this.setListeners();
          }
    },
    setListeners(){
        $(document).on('submit', this.loginFormEl.selector, (e) => {
            this.validationHandler(e);
        });
    },
    validationHandler(e){
        e.preventDefault();

        const item = e.currentTarget;
        $.ajax({
            url: Utils.getUrl("homeLogin"),
            method: "POST",
            data: $(item).serialize(),
            success:function(data){
                if (data.success){
                    location.href = Utils.getUrl("home")
                }
                else{
                    toastr.error('Este nombre de usuario ya esta en uso.');
                }
            }
        })
    }
};

module.exports = FormLoginController;