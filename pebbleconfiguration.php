<!DOCTYPE html>
<html>
  <head>
    <title>Configuration for Roberto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
  </head>
  <body>
    <div data-role="page" id="main">
      <div data-role="header" class="jqm-header">
        <h1>Configuration options</h1>
      </div>

       <?php echo $_GET['theme'] == 'light' ? ' selected="selected"' : ''; ?>

      <div data-role="content">

        <div data-role="fieldcontain">
          <label for="text">Text:</label>
          <textarea maxlength="4" cols="10" rows="1" name="text" id="text"><?php echo isset($_GET['text']) ? $_GET['text'] : ''; ?></textarea>
        </div>

        <div data-role="fieldcontain">
          <label for="images">Images:</label>
          <select name="images" id="images" data-role="slider">
            <option value="0"<?php echo $_GET['images'] == '0' ? ' selected="selected"' : ''; ?>>Off</option>
            <option value="1" <?php echo $_GET['images'] == '1' ? ' selected="selected"' : ''; ?>>On</option>
          </select>
        </div>

<!--
        <div data-role="fieldcontain">
          <fieldset data-role="controlgroup">
            <legend>Choose as many snacks as you'd like:</legend>
            <input type="checkbox" name="checkbox-cheetos" id="checkbox-cheetos" class="custom" checked />
            <label for="checkbox-cheetos">Cheetos</label>

            <input type="checkbox" name="checkbox-doritos" id="checkbox-doritos" class="custom" />
            <label for="checkbox-doritos">Doritos</label>
            </fieldset>
          </div>
        </div>
-->

        <div class="ui-body ui-body-b">
          <fieldset class="ui-grid-a">
              <div class="ui-block-a"><button type="submit" data-theme="d" id="b-cancel">Cancel</button></div>
              <div class="ui-block-b"><button type="submit" data-theme="a" id="b-submit">Submit</button></div>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    <script>
      function saveOptions() {
        var options = {
          'text': $("#text").val(),
          'images': $("#images").val()
           //TODO: using - breaks parser on jskit
          //'checkbox-doritos': $("#checkbox-doritos").is(':checked'),
          //'checkbox-fritos': $("#checkbox-fritos").is(':checked'),
          //'checkbox-sunchips': $("#checkbox-sunchips").is(':checked')
        }
        return options;
      }

      $().ready(function() {
        $("#b-cancel").click(function() {
          console.log("Cancel");
          document.location = "pebblejs://close";
        });

        $("#b-submit").click(function() {
          console.log("Submit");

          var location = "pebblejs://close#" + encodeURIComponent(JSON.stringify(saveOptions()));
          console.log("Warping to: " + location);
          console.log(location);
          document.location = location;
        });

      });
    </script>
  </body>
</html>
