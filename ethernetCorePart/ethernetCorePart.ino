#include <SPI.h>
#include <Ethernet.h>
#include <EthernetClient.h>

byte mac[] = {  0x90, 0xA2, 0xDA, 0x0D, 0x4E, 0xD7 }; // MAC de la tarjeta ethernet shield
byte ip[] = { 192,168,0,101 }; // Direccion ip local
byte server[] = { 192,168,0,100 }; // Direccion ip del servidor

EthernetClient client;


// pinos

int lm35 = 0;  
int groove = 1;
int ldr = 2;
int dht = 3;

//recebe dos pinos
int valorLm35 = 0;
int valorGrove = 0;
int valorLdr = 0;
int valorUmid = 0;


void setup()
{
  Serial.begin(9600);
  Ethernet.begin(mac, ip); // inicializa ethernet shield
  delay(1000); // espera 1 segundo despues de inicializar
}

void loop()
{
  valorLm35 = analogRead(lm35);
  float celsius =  (valorLm35 * 500L) /1024.0; 
  
  
  valorGrove = analogRead(groove);
  Serial.println(valorGrove);
  Serial.println(celsius);
  

  if (client.connect(server, 80)) {  // Se conecta al servidor
    client.print("GET /arduino.php?temperatura="); // Envia los datos utilizando GET
    client.println(celsius);
    client.print("GET /arduino.php?soloUmid="+valorGrove);
    
    client.println(" HTTP/1.0");
    client.println("User-Agent: Arduino 1.0");       
  }
  else
  {
    Serial.println("Falla en la conexion");
  }
  if (client.connected()) {}
  else {
    Serial.println("Desconectado");
  }
  client.stop();
  client.flush();
  delay(1000); // espera 5 minutos antes de volver a sensar la temperatura
}
