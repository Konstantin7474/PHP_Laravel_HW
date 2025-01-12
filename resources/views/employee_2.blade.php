<html>

<body>
    <form name="employee" method="post" action="{{ Route('store_employee') }}">
        @csrf
        <label>Firs name</label><input type="text" name="first_name" value="@if($employee) {{ $employee->first_name }} @endif"><br>
        <label>Last name</label><input type="text" name="last_name" value="@if($employee) {{ $employee->last_name }} @endif"><br>
        <label>Department</label>
        <!-- <select name="department"><br>
            <option value="finance">Finance</option>
            <option value="it">IT</option>
            <option value="internal service">Internal service</option>
        </select> -->
        <input type="checkbox" name="department[]" value="finance" @if($employee && in_array('finance', unserialize($employee->department))) checked @endif>Finance</input>
        <input type="checkbox" name="department[]" value="it" @if($employee && in_array('it', unserialize($employee->department))) checked @endif>IT</input>
        <input type="checkbox" name="department[]" value="internal service" @if($employee && in_array('internal service', unserialize($employee->department))) checked @endif>Internal service</input>
        <input type="submit" value="Send">
    </form>
</body>

</html>