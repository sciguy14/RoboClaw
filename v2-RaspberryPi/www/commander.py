#!/usr/bin/env python

import wiringpi, time

io = wiringpi.GPIO(wiringpi.GPIO.WPI_MODE_SYS)
GREEN_LED = 22
RED_LED = 21

io.pinMode(GREEN_LED, io.OUTPUT)

io.digitalWrite(GREEN_LED,io.HIGH)
time.sleep(5)
io.digitalWrite(GREEN_LED,io.LOW)
