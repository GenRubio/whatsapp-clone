<div class="modal fade" id="registerFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="register-form" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label>
                                <b>User name</b>
                            </label>
                            <input name="name" type="text" class="form-control" placeholder="User name" required>
                        </div>
                        <div class="col">
                            <label>
                                <b>Password</b>
                            </label>
                            <input name="password" type="password" class="form-control" placeholder="Password"
                                required>
                        </div>
                    </div>
                   @include('partials.forms.components.pgp')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn submit-register-button-js btn-primary ">
                        SING UP
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
