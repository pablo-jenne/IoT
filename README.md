# IoT
Project IoT

week1: upload van sql code voor de tabellen 

week2: upload van php code voor de database connection en php code voor in tabel 1 data te steken 

week3: form gemaakt voor manueel data in tabel toe te voegen en ook een search toegevoegd alleen geeft deze nog een error 

week4: data via api binnen halen en in de database steken en flowchart/schema gemaakt

week5: search maken met ajax het filteren lukt op sensor en waarde maar timestamp nog niet

week6: rss feed gemaakt en werkt ook + evaluatie





![](schema_iot.jpg)

links boven:

Links boven in het schema zijn de sensoren die verzamelen data en sturen deze via een ESP8266 door. Via een http transfer wordt deze data verstuurt deze wordt dan vervolgens via een collectior.php pagina gesampled en in mijn database gezet.

links onder:

Hier is de client. Hier speelt zich dan ook de client side af, dit is wat de gebruiker te zien krijgt met andere woorden de front end van de website. Hier bevindt zich dan ook het form.php dit is voor handmatig data te inserten in de database 

midden onder:

Dit is het ajax gedeelte wat hier gedaan wordt is een search creëren. Wat specifiek is aan deze search is dat de pagina niet helemaal gerefreshed moet worden zodra er specifieke data gezocht wordt. Deze gaat via een eigen gemaakte browser de pagina refreshen. 

rechts onder:

HIer is de webserver. Hier wordt alle data opgeslagan



