<?php ?>
<form method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" />
        </div>
        <div></div>
    </div>

    <fieldset>
        <legend>Address</legend>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="street">Street:</label>
                <input type="text" name="street" id="street" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="streetnumber">Street number:</label>
                <input type="text" id="streetnumber" name="streetnumber" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="zipcode">Zipcode</label>
                <input type="text" id="zipcode" name="zipcode" class="form-control">
            </div>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Order!</button>
</form>