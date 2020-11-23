#include <ESP8266WiFi.h> 
#include <ESP8266HTTPClient.h> 
#include <dht11.h>

dht11 DHT11;

//const char* ssid = "telenet-B47AD6F"; 
//const char* password = "Pb4f7rzdjuyU"; 

const char* ssid = "telenet-3B7B2"; 
const char* password = "j2cmrCd4pfpu";

const char* host = "http://11901508.pxl-ea-ict.be/collector.php"; //edit the host adress, ip address etc. 
String url = "/post/"; int adcvalue=0; 
void setup() 
{ 
Serial.begin(115200); 
delay(10); // We start by connecting to a WiFi network 
Serial.println(); 
Serial.println(); Serial.print("Connecting to "); 
Serial.println(ssid); 
/* Explicitly set the ESP8266 to be a WiFi-client, otherwise, it by default, would try to act as both a client and an access-point and could cause network-issues with your other WiFi-devices on your WiFi-network. */ 
WiFi.mode(WIFI_STA); 
WiFi.begin(ssid, password); 
while (WiFi.status() != WL_CONNECTED) 
{ 
delay(500); 
Serial.print("."); 
} 
Serial.println(""); 
Serial.println("WiFi connected"); 
Serial.println("IP address: "); 
Serial.println(WiFi.localIP()); } 


 
void loop() 
{ 
  int chk = DHT11.read(4);

  Serial.print("Humidity (%): ");
  float merker1 = DHT11.humidity;
  Serial.println(merker1, 0);

  Serial.print("Temperature (C): ");
  float merker2 = DHT11.temperature;
  Serial.println(merker2, 0);

  HTTPClient http;    //Declare object of class HTTPClient
String postData;
String merker3 = String(merker1);
String merker4 = String(merker2);
  //Post Data
  postData = "status=" + merker3;
  
  http.begin("http://11901508.pxl-ea-ict.be/collector.php");              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload

  Serial.println(httpCode);   //Print HTTP return code
  Serial.println(payload);    //Print request response payload

  http.end();  //Close connection

  
  delay(300000);  //Post Data at every 10 seconds

    postData = "status2=" + merker4;
  
  http.begin("http://11901508.pxl-ea-ict.be/collector.php");              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

   httpCode = http.POST(postData);   //Send the request
   payload = http.getString();    //Get the response payload

  Serial.println(httpCode);   //Print HTTP return code
  Serial.println(payload);    //Print request response payload

  http.end();  //Close connection

  delay(120000);  //Post Data at every 10 seconds
 
}
