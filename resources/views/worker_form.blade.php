<form name="employee-form" id="employee-form" method="post" action="{{ Route('store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" id="lastname" name="lastname" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <input type="text" id="position" name="position" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="workData">workData</label>
        <textarea name="workData" class="form-control" required="true"></textarea>
    </div>
    <div class="form-group">
        <label for="json_data">JSON Data:</label>
        <textarea name="json_data" class="form-control" required="true"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>