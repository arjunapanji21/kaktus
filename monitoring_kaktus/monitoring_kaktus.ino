#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

#define SENSOR_TANAH  A0
#define RELAY         D4

const char* ssid = "ROY LINDRA"; // nama WIFI anda
const char* password = "ROYLINDRA03"; // password WiFi anda

//Web/Server address to read/write from
const char *host = "192.168.43.134";
const char *link = "http://"+String(host)+"/kaktus/post-data.php";

WiFiServer server(80);

int n_tanah;
float persen;
void setup() {
  // put your setup code here, to run once:
  HTTPClient http;    //Declare object of class HTTPClient
  pinMode(SENSOR_TANAH, INPUT);
  pinMode(RELAY, OUTPUT);
  digitalWrite(RELAY, HIGH);
  Serial.begin(115200);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  // put your main code here, to run repeatedly:
  n_tanah = analogRead(A0);
  n_tanah = 1024 - n_tanah;

  if(n_tanah < 120){
    digitalWrite(RELAY, LOW);
    Serial.println("RELAY AKTIF");
  }
  else{
    digitalWrite(RELAY, HIGH);
    Serial.println("RELAY MATI");
  }
  
  persen = (n_tanah / 1023.0) * 23.0;
  Serial.print("Kelembapan: ");
  Serial.println(n_tanah);

  // Check WiFi connection status
  if (WiFi.status() == WL_CONNECTED) {
    WiFiClient client;
    HTTPClient http;

    // Specify content-type header
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    //Post Data
    String postData = "humid=" + String(n_tanah);
    http.begin(link); //Specify request destination
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

    int httpCode = http.POST(postData);   //Send the request
    String payload = http.getString();    //Get the response payload

    Serial.println(httpCode);   //Print HTTP return code
    Serial.println(payload);    //Print request response payload

    http.end();  //Close connection

    delay(2000);  //Post Data at every 5 seconds
  }
  else {
    Serial.println("WiFi Disconnected");
  }
}
