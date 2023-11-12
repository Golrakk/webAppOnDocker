<div class="left_div">
  <div class="menu_buttons">
      <form action="index.php" method="GET">
        <input type="submit" name="page" value="Home">
      </form>
  </div>
  <div class="menu_buttons">
      <form action="index.php" method="GET">
        <input type="submit" name="page" value="Allied Land">
      </form>
  </div>
  <div class="menu_buttons">
      <form action="index.php" method="GET">
        <input type="submit" name="page" value="Enemy Land">
      </form>
  </div>
  <div class="menu_buttons">
      <form action="index.php" method="GET">
        <input type="submit" name="page" value="Moxes">
      </form>
  </div>
  <div class="menu_buttons">
      <form action="index.php" method="GET">
        <input type="submit" name="page" value="Power Nine">
      </form>
  </div>
  <div class="menu_buttons">
      <?php
        if (isset($_SESSION["rank"])){
          if($_SESSION["rank"] == 2) {
            echo "<form action='index.php' method='GET'>
                    <input type='submit' name='page' value='Courier Service'>
                  </form>";
          } else {
            echo "<form action='index.php' method='GET'>
                      <input type='submit' name='page' value='Contact Us'>
                    </form>";
          }
        } else {
          echo "<form action='index.php' method='GET'>
                    <input type='submit' name='page' value='Contact Us'>
                  </form>";
        }
      ?>
  </div>
  <div class="bottom_buttons">
    <div class="menu_buttons">
      <?php
        if (isset($_SESSION["ID"])) {
          if($_SESSION["rank"] != 2) {
            echo "<form action='' method='GET'>
                    <input type='submit' name='page' value='Basket'>
                  </form>";
          }
        }
      ?>
    </div>
    <div class="menu_buttons">
      <?php 
        if (!isset($_SESSION["ID"])) {
          echo "<form action='' method='GET'>
                  <input type='submit' name='page' value='Sign In'>
                </form>";
        } else {
          echo "<form action='index.php?OUT=true' method='post'>
                  <input type='submit' name='page' value='Sign Out'>
                </form>";
        }
      ?>
    </div>
  </div>
</div>