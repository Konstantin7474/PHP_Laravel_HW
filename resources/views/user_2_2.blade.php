<form name="employee-form" id="employee-form" method="post" action="{{ Route('store-user_2') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" required="true">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>