<div class="form-group mt-4">
   <div class="d-flex flex-column" style="padding: 0 5rem;">
   <label for="sensor">
      <b class='text-primary h4'><strong>Search</strong></b>
    </label>
    <select class="form-control" name="sensor" id="sensor">
    <option value='' >Select a sensor:</option>
    <option value="1">1 (temperatuur)</option>
    <option value="2">2 (vochtigheid)</option>
    <option value="3">3 (api temperatuur)</option>
    </select>
    <br>
    <label for="waarde">Geef een waarde in:</label><input class="form-control" id="waarde" type="text" name="waarde">
    <br>
      <label for="tijd">Geef timestamp in:</label>
      <input class="form-control" id="tijd" type="date" name="tijd">
    <br>
    <div class="d-flex justify-content-center align-items-center flex-column">
    <button class="btn btn-primary mt-2" onclick="Load()">Search</button>
    <button class="btn btn-primary mt-5" onclick="Reload()">Reset table</button>
    </div>
   </div>
</div>