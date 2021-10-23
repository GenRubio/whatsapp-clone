<form id="validation-form">
    @csrf
    <div class="form-group">
        <label>User name</label>
        <input name="name" type="text" class="form-control" aria-describedby="emailHelp"
            placeholder="User name">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" class="form-control"  placeholder="Password">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input">
        <label class="form-check-label">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Go to chat</button>
</form>