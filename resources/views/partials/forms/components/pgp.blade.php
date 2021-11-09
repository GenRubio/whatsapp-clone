<div class="form-group mt-3">
    <label for="exampleFormControlTextarea1"><b>PGP Public Key</b></label>
    <div>
        You can generate your PGP here: <a href="https://pgpkeygen.com/" target="_blank">Click</a>
    </div>
    <textarea name="public_key" class="form-control" id="user-public-pgp" rows="5" 
    placeholed="-----BEGIN PGP PUBLIC KEY BLOCK-----
    Version: Keybase OpenPGP v1.0.0

    xo0EYYoNDwEEAKw9D69mGj4VSNnJOHrK4SjutgeAqWCFvfQB/EoPZKqnNZQlUQLG
    gJ0TMH2Wes1ioOdUDNm0/HgruyJQxLn0iZX0yhMh/E7vCv62DKVVqHRSfIHKcyjG
    hDCPoqIJ6odaWKLxzetkkr/kFEZTrWxqmVX9tsroYBSZKk5AsQwjeLkpABEBAAHN
    J0V1Z2VueSBMeXViZXpueXkgPGtleWxvcnViaW9AZ21haWwuY29tPsKtBBMBCgAX
    BQJhig0PAhsvAwsJBwMVCggCHgECF4AACgkQOAbBWAeMSGQxPwQAqbzKWatXyTC3
    4YX7Qs+NUcmupn0IBPf7sn8TEsGXd9veBH+kPRYkzyPaIqwEs8zgh/r1nYNqYso6
    zg==
    =cCId
    -----END PGP PUBLIC KEY BLOCK-----
    " required></textarea>
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
            <textarea name="message_encrypted" class="form-control" id="message-encrypted" rows="5"
                required></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">
            <b>Message</b>
        </label>
        <input name="message_decrypted" type="text" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="Enter test message">
    </div>
</div>
