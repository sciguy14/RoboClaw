RoboClaw Web-Controlled Robotic Claw
====================================
The project was Developed by Jeremy E. Blum <www.jeremyblum.com>
More info is available at http://www.jeremyblum.com/portfolio/web-controlled-roboclaw/

This is Open Source Hardware and Software Licensed via a Creative Commons Attribution Share-Alike License
http://creativecommons.org/licenses/by-nc-sa/3.0/us/

There are two Versions of the RoboClaw.  Version 1 was completed in 2009.  Version 2 is currently under development using the Raspberry Pi.

Version 1 (2009) - Propeller Prop Stick + Netburner TCP/IP Ethernet Module + Ethernet Network Webcam
----------------------------------------------------------------------------------------------------
The code is written in Spin for use on the Parallax propeller chip.  The chip communicates via serial with an PINK module (http://www.netburner.com/pink/index.html) to connect to the internet.  Solid-State Relays interface with the "EDGE" robotic claw to enable hardware control.  A Network Webcam stream is fed into the control page.

Version 2 (2013/In development) - Raspberry Pi + USB Webcam
-----------------------------------------------------------
Version 2 is currently in development using a Raspberry Pi Micro Linux Computer.  The Raspberry Pi has built in Ethernet connectivity and uses a Python Script to command the GPIO based on instructions from the Web Interface.  A USB Webcam provides the live video stream.  This is still UNDER DEVELOPMENT, and is not working yet.