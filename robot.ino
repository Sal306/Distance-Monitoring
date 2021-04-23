// Include the required libraries
#include <WiFi.h>
#include <HTTPClient.h>
#include <WiFiClientSecure.h>
#include <DHT.h>

// Wifi Network Information
char ssid[] = "AB9";
char pass[] = "2020303000";

int status = WL_IDLE_STATUS; // the Wifi radio's status

String postData; // Data  will be sent using post
//Name of the variables
String postVariable = "dist=";
String postVariable2 = "temp=";
String postVariable3 = "hum=";

const int trigPin = 2; // Trig in ultrasonic sensor connected to pin 2
const int echoPin = 5; // Echo in ultrasonic sensor connected to pin 5

// defines variables
long duration;
int distance;
const int buzzer = 19; // The buzzer connected to pin 19

#define DHTPIN 4 //Digital pin4 connected to the DHT sensor.
#define DHTTYPE DHT11 //Specify the DHT sensor type.
DHT dht(DHTPIN, DHTTYPE); // Initialize DHT sensor.

WiFiClientSecure client; // Declare object of WifiClientSecure

void setup() {

  pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the echoPin as an Input
  pinMode(buzzer,OUTPUT);  // Sets the buzzerPin as an Output
  Serial.begin(9600); // Starts the serial communication
   dht.begin(); // Initialize the DHT 11 Sensor

  // Connect to WIFI network
   while(status != WL_CONNECTED) {
    Serial.print("Attempting to connect to Network named: ");
    Serial.println(ssid);
    status = WiFi.begin(ssid, pass);
    delay(10000);
  }

  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());
  IPAddress ip = WiFi.localIP();
  IPAddress gateway = WiFi.gatewayIP();
  Serial.print("IP Address: ");
  Serial.println(ip);

}

void loop() {
  // Clears the trigPin
digitalWrite(trigPin, LOW);
delayMicroseconds(5);

// Sets the trigPin on HIGH state for 10 micro seconds
digitalWrite(trigPin, HIGH);
delayMicroseconds(10);
digitalWrite(trigPin, LOW);

// Reads the echoPin, returns the sound wave travel time in microseconds
duration = pulseIn(echoPin, HIGH); 
// duration is the time (in microseconds) from the sending

// Calculating the distance
distance= duration*0.034/2;

  // Add the calculated distance to the PostData.
 postData = postVariable + "<div id='dist'>"+distance+"</div>";

 // The active Piezo Buzzer will make a sound if the distance is less than 100cm
 if (distance < 100){

digitalWrite(buzzer,HIGH);
delay(2000);
digitalWrite(buzzer,LOW);

} 

delay(500);

 float humadity = dht.readHumidity(); // Measure humidity
 float tempreture = dht.readTemperature();  // Measure temperature as Celsius
 // Check if any reads failed and exit early (to try again).
  if (isnan(humadity) || isnan(tempreture)) {
    Serial.println(F("Failed to read from DHT sensor!"));
    return;
  }
  // Include the values of humadity and tempreature to the postData
   postData = postData + "<div id ='hum'>"+humadity+"</div>" + "<div id='temp'>"+tempreture+"</div>" ;
    
  if(WiFi.status()== WL_CONNECTED)
  {   //Check WiFi connection status

    HTTPClient client;    //Declare object of class HTTPClient

    client.begin("https://evening-caverns-03959.herokuapp.com/FetchData.php");      //Specify request destination
    client.addHeader("Content-Type", "application/x-www-form-urlencoded");  //Specify content-type header
    int httpCode = client.POST(postData);   //Send the request
    
    String payload = client.getString();     //Get the response payload
    
    Serial.println(httpCode);   //Print HTTP return code
    Serial.println(payload);
    
    client.end();  //Close connection

  }
  else
  {

    Serial.println("Error in WiFi connection");   

  }

    Serial.println(postData); // Print the data on the serial monitor
   

 delay(600);


}
