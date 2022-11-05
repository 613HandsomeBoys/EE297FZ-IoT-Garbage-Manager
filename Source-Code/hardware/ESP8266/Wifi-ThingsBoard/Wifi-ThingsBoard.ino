#include <AuthenticatedCipher.h>
#include <BLAKE2b.h>
#include <NoiseSource.h>
#include <ChaCha.h>
#include <XOF.h>
#include <BLAKE2s.h>
#include <Poly1305.h>
#include <SHA3.h>
#include <KeccakCore.h>
#include <ChaChaPoly.h>
#include <SHA256.h>
#include <RNG.h>
#include <EAX.h>
#include <GHASH.h>
#include <Cipher.h>
#include <Crypto.h>
#include <SHA512.h>
#include <BlockCipher.h>
#include <SHAKE.h>
#include <AES.h>
#include <BigNumberUtil.h>
#include <Ed25519.h>
#include <GCM.h>
#include <Curve25519.h>
#include <XTS.h>
#include <GF128.h>
#include <CTR.h>
#include <Hash.h>
#include <P521.h>
#include <OMAC.h>

#include <IoTtweetESP32.h>
/* 依赖 PubSubClient 2.4.0 */
#include <PubSubClient.h>
/* 依赖 ArduinoJson 5.13.4 */
#include <ArduinoJson.h>


#define Trig 5 //引脚Tring 连接 IO D2

#define Echo 4 //引脚Echo 连接 IO D3 

/* 连接您的WIFI SSID和密码 */
#define WIFI_SSID         "CMCC-6Jdk"
#define WIFI_PASSWD       "Ykn7W7N6"


/* 设备的三元组信息*/
#define PRODUCT_KEY       "h2fl2bDEEHd"
#define DEVICE_NAME       "IoT_01_Connect"
#define DEVICE_SECRET     "98422181afc48fe3ae9949f628e8a7f2"

#define REGION_ID         "cn-shanghai" //固件版本信息

/* 线上环境域名和端口号，不需要改 */
#define MQTT_SERVER       PRODUCT_KEY ".iot-as-mqtt." REGION_ID ".aliyuncs.com"
#define MQTT_PORT         1883
#define MQTT_USRNAME      DEVICE_NAME "&" PRODUCT_KEY

#define CLIENT_ID         "gx4ikemRxLC.613Light|securemode=2,signmethod=hmacsha256,timestamp=1647932961208|"
#define MQTT_PASSWD       "475e59c94dcebf95195ce1a657e4b2c5c4a9c66ca0eb5ccb4f5941ef4e00d075"

#define ALINK_BODY_FORMAT         "{\"id\":\"ESP8266\",\"version\":\"1.0\",\"method\":\"thing.event.property.post\",\"params\":%s}"
#define ALINK_TOPIC_PROP_POST     "/sys/" PRODUCT_KEY "/" DEVICE_NAME "/thing/event/property/post"

int  cm; //距离变量
int  temp;
unsigned long lastMs = 0;


WiFiClient espClient;
PubSubClient  client(espClient);


void callback(char *topic, byte *payload, unsigned int length)
{
    Serial.print("Message arrived [");
    Serial.print(topic);
    Serial.print("] ");
    payload[length] = '\0';
    Serial.println((char *)payload);

}

void wifiInit()
{
    WiFi.mode(WIFI_STA);
    WiFi.begin(WIFI_SSID, WIFI_PASSWD);   //连接WiFi
    while (WiFi.status() != WL_CONNECTED)
    {
        delay(1000);
        Serial.println("WiFi not Connect");
    }
    Serial.println("Connected to AP");
    Serial.println("IP address: ");
    Serial.println(WiFi.localIP());    
    Serial.print("espClient [");
    client.setServer(MQTT_SERVER, MQTT_PORT);   /* 连接WiFi之后，连接MQTT服务器 */
    client.setCallback(callback);
}


void mqttCheckConnect()
{
    while (!client.connected())
    {
        Serial.println("Connecting to MQTT Server ...");
        if (client.connect(CLIENT_ID, MQTT_USRNAME, MQTT_PASSWD))

        {

            Serial.println("MQTT Connected!");

        }
        else
        {
            Serial.print("MQTT Connect err:");
            Serial.println(client.state());
            delay(5000);
        }
    }
}


void mqttIntervalPost(int input)
{
    char param[32];
    char jsonBuf[128];
    Serial.print(input);
    sprintf(param, "{\"height\":%d}",input);
    sprintf(jsonBuf, ALINK_BODY_FORMAT, param);
    Serial.println(jsonBuf);
    boolean d = client.publish(ALINK_TOPIC_PROP_POST, jsonBuf);
    if(d){
      Serial.println("publish  success"); 
    }else{
      Serial.println("publish  fail"); 
    }
   

}

int measure(){
  //给Trig发送一个低高低的短时间脉冲,触发测距
  digitalWrite(Trig, LOW); //给Trig发送一个低电平
  delayMicroseconds(2);    //等待 2微妙
  digitalWrite(Trig,HIGH); //给Trig发送一个高电平
  delayMicroseconds(10);    //等待 10微妙
  digitalWrite(Trig, LOW); //给Trig发送一个低电平
  
  temp = float(pulseIn(Echo, HIGH)); //存储回波等待时间,
  //pulseIn函数会等待引脚变为HIGH,开始计算时间,再等待变为LOW并停止计时
  //返回脉冲的长度
  
  //声速是:340m/1s 换算成 34000cm / 1000000μs => 34 / 1000
  //因为发送到接收,实际是相同距离走了2回,所以要除以2
  //距离(厘米)  =  (回波时间 * (34 / 1000)) / 2
  //简化后的计算公式为 (回波时间 * 17)/ 1000
  
  cm = (temp * 17 )/1000; //把回波时间换算成cm
  return cm;
}


void setup() 
{
    /* initialize serial for debugging */
    Serial.begin(115200);
    Serial.println("Demo Start");
    wifiInit();
    unsigned char i=0;
    pinMode(Trig, OUTPUT);
    pinMode(Echo, INPUT);
    
}


// the loop function runs over and over again forever
void loop()
{
  delay(1000);                  //延时1000毫秒

////给Trig发送一个低高低的短时间脉冲,触发测距
//  digitalWrite(Trig, LOW); //给Trig发送一个低电平
//  delayMicroseconds(2);    //等待 2微妙
//  digitalWrite(Trig,HIGH); //给Trig发送一个高电平
//  delayMicroseconds(10);    //等待 10微妙
//  digitalWrite(Trig, LOW); //给Trig发送一个低电平
//  
//  temp = float(pulseIn(Echo, HIGH)); //存储回波等待时间,
//  //pulseIn函数会等待引脚变为HIGH,开始计算时间,再等待变为LOW并停止计时
//  //返回脉冲的长度
//  
//  //声速是:340m/1s 换算成 34000cm / 1000000μs => 34 / 1000
//  //因为发送到接收,实际是相同距离走了2回,所以要除以2
//  //距离(厘米)  =  (回波时间 * (34 / 1000)) / 2
//  //简化后的计算公式为 (回波时间 * 17)/ 1000
  
  cm = measure(); //把回波时间换算成cm

  Serial.println(cm);
  
  if (millis() - lastMs >= 30000)
  {
    lastMs = millis();
    mqttCheckConnect(); 

    /* 上报 */
    mqttIntervalPost(cm);
  }
  client.loop();
}
