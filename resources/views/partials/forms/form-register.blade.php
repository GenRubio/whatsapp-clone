<form id="register-form" class="d-none" autocomplete="off">
    @csrf
    <div class="validation-form-title">
        Register
    </div>
    <hr>
    <div class="form-group">
        <label>User name</label>
        <input name="name" type="text" class="form-control" placeholder="User name" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input name="email" type="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
    </div>
    <button type="submit" class="btn submit-register-button-js btn-primary btn-block mt-2">SING UP</button>
    <div class="change-validate-view yes-acount-button-js d-flex justify-content-center mt-3">
        ¿Ya tienes cuenta? Click aqui
    </div>
</form>
