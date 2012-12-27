import Rpi.GPIO as GPIO, time

GPIO.setmode(GPIO.BCM)
GREEN_LED = 22
RED_LED = 21
GPIO.setup(GREEN_LED, GPIO.OUT)
GPIO.setup(RED_LED, GPIO.OUT)

GPIO.output(GREEN_LED, True)
time.sleep(5)
GPIO.output(GREEN_LED, False)
