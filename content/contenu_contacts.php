<style>
    .container {
        width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<div class="container pt-3">
    <form autocomplete="off">
        <fieldset>
            <h2>Contact us</h2>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
                <input autocomplete="off" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="sport_section" class="form-label mt-4">Where do you come from?</label>
                <select class="form-select" id="sport_section">
                    <option>Crossfit</option>
                    <option>Tennis</option>
                    <option>Football</option>
                    <option>Boxing</option>
                    <option>Volleyball</option>
                    <option>Rugby</option>
                    <option>Natation</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleTextarea" class="form-label mt-4">Your message:</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
            </div>
            <br>
            <center><button type="submit" class="btn btn-primary">Submit</button> We will reply as soon as possible.</center>
            </br>
        </fieldset>
    </form>
</div>