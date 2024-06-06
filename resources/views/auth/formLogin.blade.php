<form action="{{ route('login') }}" class="row g-3" method="POST">
  @csrf
  <div class="col-auto">
    <label for="name" class="visually-hidden">Email</label>
    <input type="text" class="form-control-plaintext" id="name" name="email" placeholder="email@example.com">
  </div>
  <div class="col-auto">
    <label for="password" class="visually-hidden">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
  </div>
</form>