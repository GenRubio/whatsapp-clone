<form id="login-form" autocomplete="off">
    @csrf
    <div class="validation-form-title">
        Login
    </div>
    <hr>
    <div class="form-group">
        <label>User name</label>
        <input name="name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="User name"
            required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input">
        <label class="form-check-label">Check me out</label>
    </div>
    <button type="submit" class="submit-login-button-js btn btn-primary btn-block mt-2">Go to chat</button>
    <div class="change-validate-view not-acount-button-js d-flex justify-content-center mt-3" data-toggle="modal" data-target="#registerFormModal">
        ¿No tienes cuenta? Click aqui
    </div>
</form>
