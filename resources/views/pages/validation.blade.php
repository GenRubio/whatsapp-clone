<div class="validation-container">
    <div class="validation-login-container d-flex flex-wrap justify-content-between align-items-center">
        <div class="validation-login-title text-center"></div>
        <div class="validation-image">
            <img src="{{ asset('/images/home/chat.png') }}">
        </div>
        <div class="validation-form">
           @include('partials.forms.form-login')
           @include('partials.forms.form-register')
        </div>
    </div>
</div>
