<div class="content">
    <h1 class="content_title">How to contact us</h1>
    <form action="php/sent.php" method="POST">
        <div class="email_indication">
            <p>Fill the following information in blank spaces  to send us a mail.</p>
        </div>
        <div class="email_informations">
            <p id="your_name">Your Name :</p>
            <input id="last_name" name="lastname" type="text" placeholder="Last Name" required pattern="[a-zA-ZÀ-ÿ -']{1,}" />
            <input id="first_name" name="firstname" type="text" placeholder="First Name" required pattern="[a-zA-ZÀ-ÿ -']{1,}" />

            <p id="your_gender">Gender :</p>
            <div id="woman_gender">
                <input class="gender_radio" type="radio" name="genre" value="woman" required/>
                <label class="gender_label">Woman</label>
            </div>
            <div id="man_gender">
                <input type="radio" name="genre" value="man" required />
                <label>Man</label>
            </div>
            <div id="other_gender">
                <input type="radio" name="genre" value="other" required />
                <label>Other</label>
            </div>

            <p id="your_birthdate">Date of birth :</p>
            <input id="birthdate" name="birthdate" type="date" required />

            <p id="your_job">Job :</p>
            <select id="select_job" name="job">
                <option id="job1" value="unemployed">Unemployed</option>
                <option id="job2" value="miner">Miner</option>
                <option id="job3" value="builder">Builder</option>
                <option id="job4" value="redstoner">Redstoner</option>
                <option id="job5" value="explorer">Explorer</option>
                <option id="job6" value="other">Other</option>
            </select>
        
            <p id="your_email">Email address :</p>
            <input id="email" name="email" type="text" placeholder="exemple@mine4mine.co" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required />
            
            <input id="date" name="todaydate" type="date" readonly/>

            <p id="your_object">Object :</p>
            <input id="object" name="object" type="text" placeholder="Email object" pattern="[a-zA-ZÀ-ÿ0-9 .-]{1,25}" required />

            <textarea id="message" name="emailcontent" rows="10" cols="40" placeholder="Content of your email" required></textarea>
        </div>
        <div class="email_button">
            <input type="submit" value="Send" onclick="verif('last_name','first_name', 'email', 'object')"/>
        </div>
    </form>

    <div id='pop_up'>
        <div class='background'></div>
        <?php
            if(isset($_GET["message"]) && $_GET["message"] == "Sent") {
                echo "<script>document.getElementById('pop_up').className += 'ouvert';</script>";

                echo "<div class='container'>
                        <p>Your message has been sent to an administrator.</p>
                        <a class='pop_up_button' onclick='fermer_popUp()'>&times;</a>
                      </div>";      
            }
        ?>
    </div>
</div>

<script>
    document.getElementById("date").valueAsDate = new Date();
</script>