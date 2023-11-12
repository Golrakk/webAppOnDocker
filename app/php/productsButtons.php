<div class="table_of_buttons">
    <table>
        <tr>
            <td>
                <?php
                    if ($_GET["page"] != "Power Nine" && isset($_SESSION["rank"])) {
                        if($_SESSION["rank"] == 2){
                            echo "<div id='show_button'>
                                    <input type='button' value='Show Stock' onclick='show()' />
                                  </div>
                                  <div id='hide_button'>
                                    <input type='button' value='Hide Stock' onclick='hide()' />
                                  </div>";
                        }
                    }
                ?>
            </td>
            <td></td>
            <td></td>
            <td>
                <?php
                    if (isset($_SESSION["rank"])) {
                        if($_SESSION["rank"] != 2) {
                            echo "<div>
                                    <input type='button' value='Add to Cart' onclick='addToCart(\"".$_GET["page"]."\")'/>
                                  </div>";
                        }
                    } else {
                        echo "<p>Please log in before adding a product to your basket.</p>";
                    }
                ?>
            </td>
            <td>
            </td>
        </tr>
    </table>
</div>