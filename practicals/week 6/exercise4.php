<?php
// Form processing logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $street = isset($_POST['street']) ? $_POST['street'] : '';
    $suburb = isset($_POST['suburb']) ? $_POST['suburb'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $streams = isset($_POST['streams']) ? implode(', ', $_POST['streams']) : 'None selected';
    $emaillist = isset($_POST['emaillist']) ? $_POST['emaillist'] : 'No';
}
else {
    $street = $suburb = $state = $streams = $emaillist = '';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Week 6 Practical Class 7 Exercise 2 Form</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h1>Practical Class 7 Exercise 3 Form</h1>
    <form id="userinfo" method=post action="<?PHP echo $_SERVER["PHP_SELF"];?>">
      <p>Please fill in the following form. All fields are mandatory.</p>

      <fieldset>
        <legend>Address Details</legend>


        <p>
          <label for="address">Street</label>
          <input type="text" id="street" name="street">
        </p>

        <p>
          <label for="suburb">Suburb</label>
          <input type="text" id="suburb" name="suburb">
        </p>

        <p>
          <label for="state">State</label>
          <select name="state" id="state">
            <option value="" selected disabled>Select State</option>
            <option value="NSW">NSW</option>
            <option value="QLD">QLD</option>
            <option value="VIC">VIC</option>
            <option value="TAS">TAS</option>
            <option value="SA">SA</option>
            <option value="WA">WAS</option>
            <option value="NT">NT</option>
          </select>
        </p>
      </fieldset>

      <fieldset>
        <legend>Subscriptions</legend>
        <p>
          <input type="checkbox" name="streams[]" value="Netflix" id="netflix"> <label for="netflix">Netflix</label>
        </p>
        <p>
          <input type="checkbox" name="streams[]" value="Paramount+" id="paramount"> <label for="paramount">Paramount+</label>
        </p>
        <p>
          <input type="checkbox" name="streams[]" value="Stan" id="stan"> <label for="stan">Stan</label>
        </p>
        <p>
          <input type="checkbox" name="streams[]" value="Disney+" id="disney"> <label for="disney">Disney+</label>
        </p>
        <p>
          <input type="checkbox" name="streams[]" value="Amazon Prime" id="prime"> <label for="prime">Amazon Prime</label>
        </p>
        
      </fieldset>
      <p>
        <label>Join mailing list:</label><br>
        <input type="radio" id="Ylist" name="emaillist" value="Yes"> <label for="Ylist" class="simple-label">Yes</label>
        <input type="radio" id="Nlist" name="emaillist" value="No"> <label for="Nlist" class="simple-label">No</label>
      </p>
      
      <p><input type="submit" value="submit"></p>
    </form>

    <section id="output">
    <h2>The following information was received from the form:</h2>
       <!-- make sure there are no **undefined indexes** present -->
       
       <p><strong>Street:</strong> <?php echo $street; ?></p>
       <p><strong>Suburb:</strong> <?php echo $suburb; ?></p>
       <p><strong>State:</strong> <?php echo $state; ?></p>
       <p><strong>Streams:</strong> <?php echo $streams; ?></p>
       <p><strong>Email list:</strong> <?php echo $emaillist; ?></p>

       <!--output the other form inputs here -->
    </section>
  </body>
</html>
