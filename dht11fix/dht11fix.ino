#include <ESP8266WiFi.h>
#include <WiFiUdp.h>
#include <DHT.h>

const char* ssid = "Dimas";
const char* password ="dddddddd";

unsigned int Port = 1223;
WiFiUDP Udp;
char packetBuffer[UDP_TX_PACKET_MAX_SIZE];

#define DHTPIN 5
#define DHTTYPE DHT11

DHT dht (DHTPIN, DHTTYPE);

void setup() {
  Serial.begin(9600);
    WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED){
    Serial.print(".");
    delay(1000);
  }
  Serial.println(WiFi.localIP());

  Udp.begin(Port);
  dht.begin();
  
}

void loop() {

  float suhu, kelembapan;

  suhu = dht.readTemperature();
  kelembapan = dht.readHumidity();

  Serial.println("Suhu : " + String(suhu));
  Serial.println("Kelembapan : " + String(kelembapan));

  String dataKirim = String(suhu) + "#" + String(kelembapan);
  char buff[15];
  dataKirim.toCharArray(buff, dataKirim.length());

  int packetSize = Udp.parsePacket();

  if(packetSize){
    Udp.read(packetBuffer, UDP_TX_PACKET_MAX_SIZE);
    Serial.println(packetBuffer);

    if(String(packetBuffer)=="minta")
    {

    Udp.beginPacket(Udp.remoteIP(), Udp.remotePort());

    Udp.write(buff);

    Udp.endPacket();
    }
    
    } 
  delay(2000);
}
