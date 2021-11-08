<div class="form-group mt-3">
    <label for="exampleFormControlTextarea1"><b>PGP Public Key</b></label>
    <div>
        You can generate your PGP here: <a href="https://pgpkeygen.com/" target="_blank">Click</a>
    </div>
    <textarea class="form-control" id="user-public-pgp" rows="5"></textarea>
</div>
<button class="btn btn-primary get-encrypt-message-js">Get message</button>
<div class="result-encription-container-js d-none">
    <div class="descipt-test-message-container">
        <div class="form-group mt-3">
            <label for="exampleFormControlTextarea1">
                <b>
                    Please decrypt this message
                </b>
            </label>
            <div>
                To decrypt the message you can use this website: <a href="https://8gwifi.org/pgpencdec.jsp"
                    target="_blank">Click</a>
            </div>
            <textarea name="message-encrypted" class="form-control" id="message-encrypted" rows="5"
                required></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">
            <b>Message</b>
        </label>
        <input name="message-decrypted" type="text" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="Enter test message">
    </div>

</div>
