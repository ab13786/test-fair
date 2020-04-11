<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kiwanis Fair - Vendors</title>
        <link rel="stylesheet" type="text/css" href="/stylesheets/vendors.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="/views/main.html" >Home</a></li>
                    <li><a href="/views/Vendors.php">Vendors</a></li>
                    <li><a href="/views/News.php">News</a></li>
                    <li><a href="/views/Applications.php">Applications</a></li>
                    <li><a href="/views/Shows.php">Shows</a></li>
                    <li><a href="/views/Map.php">Map</a></li>
                    <li><a href="/views/Sponsors.php">Sponsors</a></li>
                </ul>
            </nav>
        </header>

        <div class="tab">
            <button class="tablinks" onclick="opentab(event,'all')">All Vendors</button>
            <button class="tablinks" onclick="opentab(event,'verify')">Verify Vendors</button>
            <button class="tablinks" onclick="opentab(event,'message')">Message Vendors</button>
        </div>

        <script>
            function opentab(evt, tabName) {

              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(tabName).style.display = "block";
              evt.currentTarget.className += " active";
            }
        </script>

        <div id="all" class="tabcontent">
            <h1>Query for all vendors in database</h1>
        </div>

        <div id="verify" class="tabcontent">
            <section>
                <fieldset>
                    <legend>Verify Vendor</legend>

                    <p>
                        <strong>Vendor 1:</strong><br>
                        <label>Yes
                            <input name = "Option 1" type = "radio"
                                value = "Yes"></label>
                        <label>No
                            <input name = "Option 1" type = "radio"
                            value = "No"></label>
                        <label for = "email">E-mail: ______________________</label>
                        <label for = "email">Company Name: ______________________</label>
                        <label for = "email">Type: ______________________</label>
                    </p>

                    <p>
                        <strong>Vendor 2:</strong><br>
                        <label>Yes
                            <input name = "Option 2" type = "radio"
                                value = "Yes"></label>
                        <label>No
                            <input name = "Option 2" type = "radio"
                                value = "No"></label>
                        <label for = "email">E-mail: ______________________</label>
                        <label for = "email">Company Name: ______________________</label>
                        <label for = "email">Type: ______________________</label>
                    </p>

                    <p>
                        <strong>Vendor 3:</strong><br>
                        <label>Yes
                        <input name = "Option 3" type = "radio"
                            value = "Yes"></label>
                        <label>No
                        <input name = "Option 3" type = "radio"
                            value = "No"></label>
                        <label for = "email">E-mail: ______________________</label>
                        <label for = "email">Company Name: ______________________</label>
                        <label for = "email">Type: ______________________</label>
                    </p>

                    <section id="submitButtons">
                        <input  id="submit" value ="Verify" type="submit" class="submission">
                    </section>
                </fieldset>
            </section>
        </div>

        <div id="message" class="tabcontent">
            <section>
                <fieldset>
                    <legend> Message Vendor</legend>
                    <p>
                        <label for = "VType"> Vendor type</label>
                        <select id = "Vtype">
                            <option value = "Vendor 1"> Vendor 1 </option>
                            <option value = "Vendor 2"> Vendor 2 </option>
                            <option value = "Vendor 3"> Vendor 3 </option>
                        </select>
                    </p>
                    <p>
                        <label for = "Vendor"> Vendor </label>
                        <select id = "Vendor">
                            <option value = "Vendor 1"> Vendor 1 </option>
                            <option value = "Vendor 2"> Vendor 2 </option>
                            <option value = "Vendor 3"> Vendor 3 </option>
                        </select>
                    </p>
                    <p>
                        <label for = "Subject"> Subject: </label>
                        <input type="text" id="Subject" placeholder="Enter Subject">
                    </p>
                    <p>
                        <textarea  id="text" placeholder="Enter message here"></textarea>
                    </p>

                    <section id="submitButtons">
                        <input  id="submit" value ="Send" type="submit" class="submission">
                    </section>
                </fieldset>
            </section>
        </div>


    </body>
</html>