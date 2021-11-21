@if (!session()->has('privateKey') && !session()->has('privateKeyPassword') && config('app.pgp_encryption'))
    <div class="modal fade" id="userPrivateKeys" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">PGP Keys</h5>
                </div>
                <form id="save-session-private-keys">
                    @csrf
                    <div class="modal-body">
                        <div>
                            The keys are stored in the user session. <br>
                            Every time you open the session and reopen it, you must place the keys. <br>
                            We <b>DO NOT</b> store your private keys in the database!<br>
                            *If the messages do not load correctly close the session and start it again and verify that
                            the
                            keys
                            are correct.<br>
                            Learn more about PGP: <a
                                href="https://www.goanywhere.com/blog/everything-you-need-to-know-about-pgp-encryption"
                                target="_blank">Here</a>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label><b>Private Key</b></label>
                            <div class="alert-error-key-container-js"></div>
                            <textarea name="privateKey" class="form-control" rows="10" cols="50"
                                placeholder="{!! view('components.placeholders.private-key')->render() !!}" required></textarea>
                        </div>
                        <div class="form-group">
                            <label><b>Private key password</b></label>
                            <input name="privateKeyPassword" type="password" class="form-control"
                                placeholder="Passphrase" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary save-private-key-button-js">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
