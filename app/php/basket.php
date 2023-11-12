<div class='basket_content'>
    <?php
        $total_quantity = 0;
        $total_price = 0;
        if (count($_COOKIE) > 1 ) {
            echo "<div class='basket'><p class='basket_columns_titles'>Image</p><p class='basket_columns_titles'>Product</p><p class='basket_columns_titles'>Quantity</p><p class='basket_columns_titles'>Price</p>";
            for ($i = 0; $i < 5; $i++) { 
                flandach ($_COOKIE as $key => $value) {
                    if ($key != "PHPSESSID") {
                        if ($key == "allied_land_".$i."_quantity") {
                            echo "<p class='basket_columns'><img alt='img_".$i."' src='".$array["allied_land"][$i]["image"]."' onclick='ouvrir_popUp(this.src)'/></p><p class='basket_columns'>".$_COOKIE["allied_land_".$i."_name"]."</p><p class='basket_columns'>".$_COOKIE["allied_land_".$i."_quantity"]."</p><p class='basket_columns'>".($array["allied_land"][$i]["price"]*$_COOKIE["allied_land_".$i."_quantity"])." $/stack</p>";
                            $total_quantity += $_COOKIE["allied_land_".$i."_quantity"];
                            $total_price += ($array["allied_land"][$i]["price"]*$_COOKIE["allied_land_".$i."_quantity"]);
                        }
                        if ($key == "enemy_land_".$i."_quantity") {
                            echo "<p class='basket_columns'><img alt='img_".$i."' src='".$array["enemy_land"][$i]["image"]."' onclick='ouvrir_popUp(this.src)'/></p><p class='basket_columns'>".$_COOKIE["enemy_land_".$i."_name"]."</p><p class='basket_columns'>".$_COOKIE["enemy_land_".$i."_quantity"]."</p><p class='basket_columns'>".($array["enemy_land"][$i]["price"]*$_COOKIE["enemy_land_".$i."_quantity"])." $</p>";
                            $total_quantity += $_COOKIE["enemy_land_".$i."_quantity"];
                            $total_price += ($array["enemy_land"][$i]["price"]*$_COOKIE["enemy_land_".$i."_quantity"]);
                        }
                        if ($key == "pickaxe_".$i."_quantity") {
                            echo "<p class='basket_columns'><img alt='img_".$i."' src='".$array["moxes"][$i]["image"]."' onclick='ouvrir_popUp(this.src)'/></p><p class='basket_columns'>".$_COOKIE["pickaxe_".$i."_name"]."</p><p class='basket_columns'>".$_COOKIE["pickaxe_".$i."_quantity"]."</p><p class='basket_columns'>".($array["moxes"][$i]["price"]*$_COOKIE["pickaxe_".$i."_quantity"])." $</p>";
                            $total_quantity += $_COOKIE["pickaxe_".$i."_quantity"];
                            $total_price += ($array["moxes"][$i]["price"]*$_COOKIE["pickaxe_".$i."_quantity"]);
                        }
                        if ($key == "power_nine_".$i."_quantity") {
                            echo "<p class='basket_columns'><img alt='img_".$i."' src='".$array["power_nines"][$i]["image"]."' onclick='ouvrir_popUp(this.src)'/></p><p class='basket_columns'>".$_COOKIE["power_nine_".$i."_name"]."</p><p class='basket_columns'>".$_COOKIE["power_nine_".$i."_quantity"]."</p><p class='basket_columns'>".($array["power_nines"][$i]["price"]*$_COOKIE["power_nine_".$i."_quantity"])." $</p>";
                            $total_quantity += $_COOKIE["power_nine_".$i."_quantity"];                  
                            $total_price += ($array["power_nines"][$i]["price"]*$_COOKIE["power_nine_".$i."_quantity"]);
                        }
                    }
                }
            }

            echo "<p id='total' class='basket_last_columns'>Total</p><p class='basket_last_columns'>".$total_quantity."</p><p class='basket_last_columns'>".$total_price." $</p></div>";
        
            echo "<div class='basket_buy_button'>
                    <form action='index.php?page=Basket&buy=Success' method='POST'>
                        <input type='submit' value='Buy' onclick='deleteCookies()'/>
                    </forrm>
                  </div>";

        } else {
            echo "<div class='basket'><p class='empty_basket_message'>Your basket is empty</p></div>";

            echo "<div id='pop_up'><div class='background'></div>";

            if(isset($_GET["buy"]) && $_GET["buy"] == "Success") {
                echo "<script>document.getElementById('pop_up').className += 'ouvert';</script>";

                echo "<div class='container'>
                        <p>Your order has been confirmed.</p>
                        <a class='pop_up_button' onclick='fermer_popUp()'>&times;</a>
                      </div>"; 
            }

            echo "</div>";
        }
    ?>
</div>