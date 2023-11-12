<?php
    session_start();

    if (!isset($_GET["page"])) {
        $_GET["page"] = "";
    }

    if(isset($_GET['OUT']) && $_GET['OUT']=='true'){
        session_destroy();
        header("location: index.php");
        exit();
    }
?>

<html>
    <head>
        <title>Magic The Shop</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="shortcut icon" type="image/png" href="img/logo.png" />
        <script src="js/functions.js"></script>
    </head>
    <body>
        <?php
            echo "<div class='top_div'>
                    <div class='logo_div'>
                        <img id='logo_img' alt='MTS Logo' src='img/logo.png' />
                    </div>
                    <header>
                        <h2>Magic The Shop</h2>
                    </header>
                </div>";

            echo "<div class='bottom_div'>";

            include("php/menu.php");


            $servername = "db";
            $username = "user";
            $password = "password";
            $dbname = "db";

            $cnx = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            echo "<div class='right_div'>";

            switch ($_GET['page']) {
                case 'Allied Land':
                    $sql= "SELECT * FROM allied_land";
                    $result = $cnx->query($sql);
                    break;
                case 'Enemy Land':
                    $sql= "SELECT * FROM enemy_land";
                    $result = $cnx->query($sql);
                    break;
                case 'Moxes':
                    $sql= "SELECT * FROM moxes";
                    $result = $cnx->query($sql);
                    break;
                case 'Power Nine':
                    $sql= "SELECT * FROM power_nines";
                    $result = $cnx->query($sql);
                    break;
                case 'Sign In' :
                    include("php/signInPage.php");
                    break;
                case 'Contact Us':
                    include("php/contact.php");
                    break;
                case 'Courier Service':
                    $chercheur = scandir("messages");
                    echo "<div class='messages_content'>";
                    if (sizeof($chercheur) == 2) {
                        echo "<div class='message_indication'>
                                <p>You don't have any messages.</p>
                              </div>";
                    }
                    for ($i = 2; $i < sizeof($chercheur); $i++) {
                        if ($handle = fopen("messages/".$chercheur[$i], "r")) {
                            while ($tab = fgetcsv($handle, 1000, ";")) {
                                echo "<div class='div_message_".($i % 2)."'>
                                        <div class='message_informations'>
                                            <p class='message_date'>Date : ".$tab[0]."</p>
                                            <p class='message_sender'>Sender : ".$tab[1]."</p>
                                            <p class='message_object'>Object : ".$tab[7]."</p>
                                        </div>
                                        <div class='message_buttons'>
                                            <form action='index.php?page=Read&name=".$chercheur[$i]."' method='POST'>
                                                <input type='submit' value='Read' />
                                            </form>
                                            <form action='php/deleteMessage.php?name=messages/".$chercheur[$i]."' method='POST'>
                                                <input id='delete_button' type='submit' value='Delete'/></input>
                                            </form>
                                        </div>
                                      </div>";
                            }
                            fclose($handle);
                        }
                    }
                    echo "</div>";

                    echo "<div id='pop_up'><div class='background'></div>";

                        if(isset($_GET["delete"]) && $_GET["delete"] == "Success") {
                            echo "<script>document.getElementById('pop_up').className += 'ouvert';</script>";
            
                            echo "<div class='container'>
                                    <p>The message has been deleted.</p>
                                    <a class='pop_up_button' onclick='fermer_popUp()'>&times;</a>
                                  </div>"; 
                        }

                    echo "</div>";

                    break;
                case 'Read':
                    echo "<div class='messages_content'>";
                    if ($handle = fopen("messages/".$_GET['name'], "r")) {
                        while ($tab = fgetcsv($handle, 1000, ";")) {
                            echo "<div class='div_message'>
                                    <div class='message_detailed_informations'>
                                        <p class='message_sender'>Sender: ".$tab[1]." ".$tab[2]."</p>
                                        <p class='message_gender'>Gender: ".$tab[4]."</p>
                                        <p class='message_birthdate'>Birthdate : ".$tab[5]."</p>
                                        <p class='message_job'>Job: ".$tab[6]."</p>
                                    </div>
                                    <div class='message_email_informations'>
                                        <p class='message_email'>Email: ".$tab[3]."</p>
                                        <p class='message_sent_date'>Sent on : ".$tab[0]."</p>
                                    </div>
                                    <div class='email_content'>
                                        <p class='message_email_object'>Object : ".$tab[7]."</p>
                                        <p class='message_email_content'>Content: </p><p class='detailed_email_content'>".$tab[8]."</p>
                                    </div>
                                  </div>";
                            echo "<div class='message_back_button'>
                                    <form action='index.php?page=Courier+Service' method='POST'>
                                        <input class='back_button' type='submit' value='Back' />
                                    </form>
                                  </div>";
                        }
                    }
                    echo "</div>";
                    break;
                case 'Basket':
                    include("php/basket.php");
                    break;
                default:
                    include("php/home.php");
                    break;
            }
            if (!$result) {
                die("Error in the query: " . $cnx->error);
            }
            
            if (isset($result)) {
                echo "<div class='table'><table><tbody><tr class='columns_titles'><td>Image</td><td>Name</td><td>Price</td><td>Quantity</td>";
                if ($_GET['page'] != 'Destruction Services') {
                    echo "<td id='stock_label'>Stock</td></tr>";
                }
                
                while ($data = $result->fetch_assoc()) {
                    $i = $data['productId']-1;

                    echo "<tr>
                            <td><img alt='product_img_".$i."' src='".$data['image']."' onclick='ouvrir_popUp(this.src)'/></td>
                            <td id='product_name_".$i."' >".$data['name']."</td>
                            <td>".$data['price']." $/stack</td>
                            <td>
                                <div>
                                    <input type='button' value='-' onclick='minus(\"product_quantity\", ".$i.")' />
                                    <input type='text' id='product_quantity_".$i."' value='0' />";
                                    if ($_GET['page'] != 'Destruction Services') {
                                        echo "<input type='button' value='+' onclick='plus(\"product_quantity\", true, ".$i.")' />";
                                    } else {
                                        echo "<input type='button' value='+' onclick='plus(\"product_quantity\", false, ".$i.")' />";
                                    }
                                echo "</div>
                            </td>";

                            if ($_GET['page'] != 'Destruction Services') {
                                echo "<td class='stocks' id='product_stock_".$i."'>".$data['stock']."</td>";
                            }
                            
                        echo "</tr>";
                }

                echo "</tbody></table>";

                include("php/productsButtons.php");
                    
                echo "</div>";

                mysqli_free_result($result);
            }
            
            mysqli_close($cnx);

            echo "</div>";

            echo "<div id='pop_up'>
                    <div class='background'></div>
                    <div class='container'>
                        <img alt='big_picture' class='image' src='' />
                        <a class='pop_up_button' onclick='fermer_popUp()'>&times;</a>
                    </div>
                 </div>";

            echo "</div>";

        ?>
        <footer>
            <p>©SCHWAAR Simon</p>
        </footer>
    </body>
</html>
